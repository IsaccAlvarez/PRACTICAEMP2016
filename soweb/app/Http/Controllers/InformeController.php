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
       $asesores = DB::table('asesores')
                       ->select(DB::raw('count(*) as asesores'))
                       ->get();
      $contactos = DB::table('contactos')
                      ->select(DB::raw('count(*) as contactos'))
                      ->get();
      $solicitud = DB::table('solicitudes')
                      ->select(DB::raw('count(*) as solicitud'))
                      ->get();

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
                      ->get();
      $cobradoC = DB::table('solicitudes as s')
                      ->join('contactos as c','c.idContacto','=','s.idContacto')
                      ->select('c.nombre as nameC', DB::raw('sum(s.precioCobrado) as TotalC'))
                      ->get();
      return view('informe.listas', compact('asesores','contactos','solicitud','tipoContact','pendienteC','pendienteA','cobradoA','cobradoC'));
    }
    public function pendientesEntreFecha(Request $request)
    {
       $entreFecha = DB::table('solicitudes')
                         ->where('estado', 'nuevo')
                         ->whereBetween('fecha',[$request->fecha1 ,$request->fecha2])
                         ->select('fecha',DB::raw('count(estado) as pendie'))
                         ->groupBy('fecha')
                         ->get();
      return view('informe.lista' ,compact('entreFecha'));
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
