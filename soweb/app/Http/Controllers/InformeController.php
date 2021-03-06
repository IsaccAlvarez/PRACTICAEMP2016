<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Models\Asesores\Asesores;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use DB;

class InformeController extends Controller
{

     public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin');

      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //obtiene el ultimo dia del mes
     public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    public function index()
    {
      $rendimiento = Solicitudes::select('tipoSolicitud', DB::raw('count(tipoSolicitud) as totals'))
                               ->where(DB::raw('month(fecha)'), '=',date('m'))
                                ->groupBy('tipoSolicitud')
                                ->get();
      $solicitudes= Solicitudes::select('*',DB::raw('count(estado) as total'))
                                ->where('estado','cerrada')
                                ->where(DB::raw('month(fechaCerrado)'), '=',date('m'))
                                ->groupBy('idAsesor')
                                ->get();
      $anio=date("Y");
      $mes=date("m");
      return view("informe.graficos")
             ->with("anio",$anio)
             ->with("mes",$mes)
             ->with('rendimiento', $rendimiento)
             ->with('solicitudes', $solicitudes);
    }
    public function listaTabla()
    {
      $asesores = Asesores::whereIn('idAsesor', function($query){
                            $query->select('idAsesor')
                            ->from(with(new Solicitudes)->getTable())
                            ->where('estado', 'nuevo');
                          })->count();

      $contactos = Contactos::whereIn('idContacto', function($query){
                                 $query->select('idContacto')
                                 ->from(with(new Solicitudes)->getTable())
                                 ->where('estado', 'nuevo');
                                })->count();
      $solicitud = Solicitudes::where('estado', 'nuevo')->count();
      $solicitudAct = Solicitudes::where('estado', 'activa')->count();


      $tipoContact = Contactos::all();

      $pendienteC = Solicitudes::where('estado','!=','cerrada')->get();

      $pendienteA = Solicitudes::where('estado','!=','cerrada')->get();
      $cobradoA = Solicitudes::select('a.nombre as nameA','solicitudes.tipoSolicitud', DB::raw('sum(solicitudes.precioCobrado) as TotalA'),
                                    DB::raw('count(solicitudes.tipoSolicitud) as tiposA'))
                              ->join('asesores as a','a.idAsesor','=','solicitudes.idAsesor')
                              ->where('solicitudes.precioCobrado','>', 0)
                              ->groupBy('solicitudes.idAsesor','solicitudes.tipoSolicitud')
                              ->get();

      $cobradoC = Solicitudes::select('c.nombre as nameC','solicitudes.tipoSolicitud', DB::raw('sum(solicitudes.precioCobrado) as TotalC'),
                                      DB::raw('count(solicitudes.tipoSolicitud) as tiposC'))
                              ->join('contactos as c','c.idContacto','=','solicitudes.idContacto')
                              ->where('solicitudes.precioCobrado','>', 0)
                              ->groupBy('solicitudes.idContacto','solicitudes.tipoSolicitud')
                              ->get();

      $solucion = Solicitudes::select('*',DB::raw('DATEDIFF(fechaCerrado,created_at) as dias'))
                               ->where('estado', 'cerrada')
                               ->where(DB::raw('year(fechaCerrado)'), '=',date('Y'))
                               ->groupBy('created_at')
                               ->get();
                      $fecha1=date("Y-m-d");
                      $fecha2=date("Y-m-d");

      return view('informe.listas', compact('asesores','contactos','solicitud','tipoContact','pendienteC','pendienteA','cobradoA','cobradoC','fecha1','fecha2','solucion','solicitudAct'));
    }
    public function pendientesEntreFecha($anio,$mes)
    {
      $primer_dia=1;
      $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
      $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
      $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
      $solicitudes=Solicitudes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                            ->where('estado','!=', 'cerrada')
                            ->get();
      $ct=count($solicitudes);

      for($d=1;$d<=$ultimo_dia;$d++){
          $registros[$d]=0;
      }

      foreach($solicitudes as $solicitudes){
      $diasel=intval(date("d",strtotime($solicitudes->created_at) ) );
      $registros[$diasel]++;
      }

      $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
      return   json_encode($data);
    }

    public function cobradoAlMes(Request $request)
    {
          $solicitudes = Solicitudes::select('fecha',DB::raw('sum(precioCobrado) as total'))
                                      ->whereBetween('fecha',[$request->desde,$request->hasta])
                                      ->where('precioCobrado','>', 0)
                                      ->groupBy('fecha')
                                      ->get();
         return response()->json($solicitudes);

    }

    public function generalAlMes($anio,$mes)
    {
      $primer_dia=1;
      $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
      $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
      $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
      $solicitudes=Solicitudes::whereBetween('fechaCerrado', [$fecha_inicial,  $fecha_final])
                            ->where('estado', 'cerrada')
                            ->get();
      $ct=count($solicitudes);

      for($d=1;$d<=$ultimo_dia;$d++){
          $cerradas[$d]=0;
      }

      foreach($solicitudes as $solicitudes){
      $diasel=intval(date("d",strtotime($solicitudes->fechaCerrado) ) );
      $cerradas[$diasel]++;
      }

      $dato=array("totald"=>$ultimo_dia, "registrosdia" =>$cerradas);
      return   json_encode($dato);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
