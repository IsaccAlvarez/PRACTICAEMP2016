<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Solicitudes\ComentarioSolicitudes;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\User;
use Carbon\Carbon;
class ComentarioSolicitudController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function getListSolicitud(Request $request, $idSolicitud)
    {

      $solicitud = Solicitudes::select('solicitudes.*','contactos.nombre as nameC','asesores.nombre as nameA','users.name as nameU')
                    ->join('users','users.id','=','solicitudes.idUser')
                    ->join('contactos','contactos.idContacto','=','solicitudes.idContacto')
                    ->join('asesores','asesores.idAsesor','=','solicitudes.idAsesor')
                    ->where('solicitudes.idSolicitud', $idSolicitud)
                    ->get();

      $comentario = ComentarioSolicitudes::select('users.name as user','comentario_solicitudes.created_at', 'comentario_solicitudes.comentario')
                                            ->join('users','users.id','=','comentario_solicitudes.idUser')
                                            ->where('comentario_solicitudes.idSolicitud', $idSolicitud)
                                            ->get();



         return view('solicitud/showSolicitud', compact('solicitud','comentario'));
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
      if ($request->ajax()) {
         $result = ComentarioSolicitudes::create($request->all());
         if ($result) {
           return response()->json(['success'=>'true']);
         }else {
           return response()->json(['success'=>'false']);
         }
      }
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
