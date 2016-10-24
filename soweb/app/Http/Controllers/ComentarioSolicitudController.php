<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests;
use soweb\Http\Requests\CreateComentarioRequest;
use soweb\Http\Controllers\Controller;
use soweb\Models\Solicitudes\ComentarioSolicitudes;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Models\Asesores\Asesores;
use soweb\User;
use Carbon\Carbon;
use Mail;
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

      $comentarios = ComentarioSolicitudes::where('idSolicitud',$idSolicitud)
                                            ->orderBy('created_at','DESC')
                                            ->paginate(3);


         return view('solicitud/showSolicitud', compact('solicitud','comentarios'));
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
    public function store(CreateComentarioRequest $request)
    {
       $asesores = Asesores::all();
      if ($request->ajax()) {

        $datos['idSolicitud'] = $idSolicitud = $request->idSolicitud;
        $user = User::find($request->idUser);
         $result = ComentarioSolicitudes::create($request->all());
         if ($result) {

           foreach ($asesores as $asesor) {
             Mail::send('solicitud.notificacionEmail',['datos'=> $datos,'user'=>$user],function($msj) use ($asesor) {
             $msj->from('notreply@seesoft-cr.com', 'SeeSoft-CR');
             $msj->to($asesor->emailEmpresa, $asesor->nombre)->subject('Notificación SoWeb!');
            });
           }
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
