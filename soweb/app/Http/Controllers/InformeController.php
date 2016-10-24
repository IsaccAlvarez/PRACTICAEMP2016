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
      $anio=date("Y");
      $mes=date("m");
      return view("informe.graficos")
             ->with("anio",$anio)
             ->with("mes",$mes);
    }
    public function listaTabla()
    {
      $asesores = Asesores::all()->count();
      $contactos = Contactos::all()->count();
      $solicitud = Solicitudes::all()->count();

      $tipoContact = DB::table('contactos')
                         ->select('tipoContacto',DB::raw('count(*) as total'))
                         ->groupBy('tipoContacto')
                         ->get();
      $pendienteC = DB::table('solicitudes as s')
                        ->join('contactos as c','c.idContacto','=','s.idContacto')
                        ->where('s.estado', 'nuevo')
                        ->select('c.nombre as nameC', DB::raw('count(s.estado) as pen'))
                        ->groupBy('c.nombre','s.estado')
                        ->get();
      $pendienteA = DB::table('solicitudes as s')
                        ->join('asesores as a','a.idAsesor','=','s.idAsesor')
                        ->where('s.estado', 'nuevo')
                        ->select('a.nombre as nameA', DB::raw('count(s.estado) as pend'))
                        ->groupBy('a.nombre','s.estado')
                        ->get();
      $cobradoA = DB::table('solicitudes as s')
                      ->join('asesores as a','a.idAsesor','=','s.idAsesor')
                      ->select('a.nombre as nameA', DB::raw('sum(s.precioCobrado) as TotalA'))
                      ->groupBy('a.nombre')
                      ->get();
      $cobradoC = DB::table('solicitudes as s')
                      ->join('contactos as c','c.idContacto','=','s.idContacto')
                      ->select('c.nombre as nameC', DB::raw('sum(s.precioCobrado) as TotalC'))
                      ->groupBy('c.nombre')
                      ->get();

                      $fecha1=date("Y-m-d");
                      $fecha2=date("Y-m-d");

      return view('informe.listas', compact('asesores','contactos','solicitud','tipoContact','pendienteC','pendienteA','cobradoA','cobradoC','fecha1','fecha2'));
    }
    public function pendientesEntreFecha($anio,$mes)
    {
      $primer_dia=1;
      $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
      $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
      $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
      $solicitudes=Solicitudes::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                            ->where('estado', 'nuevo')
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
                                      ->groupBy('fecha')
                                      ->get();
         return response()->json($solicitudes);

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
