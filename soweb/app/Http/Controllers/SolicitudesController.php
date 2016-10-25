<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use Eloquent;
use soweb\Http\Requests\SolicitudCreateRequest;
use soweb\Http\Requests\SolicitudUpdateRequest;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Asesores\Asesores;
use soweb\User;
use Seession;
use Input;
use DB;
use Carbon\Carbon;
use Auth;
use Mail;
class SolicitudesController extends Controller
{

  public function __construct(){
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
        return view('solicitud.index');
    }
    public function listSolitud(Request $request)
    {
      $solicitudes = Solicitudes::select('solicitudes.*','contactos.nombre as nameC','asesores.nombre as nameA')
                                  ->join('contactos','contactos.idContacto','=','solicitudes.idContacto')
                                  ->join('asesores','asesores.idAsesor','=','solicitudes.idAsesor')
                                  ->get();

      return view('solicitud/list')->with('solicitudes', $solicitudes);
    }
    public function autocompleteC(Request $request)
    {

      $term=$request->term;
      $results=Contactos::select('nombre as name','idContacto','nombreRepresentante')->where('nombre', 'LIKE','%'.$term.'%')
      ->get();
      return response()->json($results);
    }
    public function autocompleteA(Request $request)
    {

      $term=$request->term;
      $data=Asesores::select('nombre as name','idAsesor')->where('nombre', 'LIKE','%'.$term.'%')
      ->get();
      return response()->json($data);
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
    public function store(SolicitudCreateRequest $request)
    {

         if ($request->ajax()) {
           $name = User::find($request->idUser);
           $asesor = Asesores::find($request->idAsesor);
           if ($asesor->emailEmpresa != $name->email) {
               $email = Asesores::select('emailEmpresa','nombre')->where('idAsesor', $request->idAsesor)->get();

               $contacto = Contactos::find($request->idContacto);
               $result = Solicitudes::create($request->all());
                 if ($result){
                    foreach ($email as $emails) {
                      Mail::send('solicitud.newSolicitud',['asesor'=> $asesor,'contacto'=>$contacto],function($msj) use ($emails){
                      $msj->from('notreply@seesoft-cr.com', 'SeeSoft-CR');
                      $msj->to($emails->emailEmpresa, $emails->nombre)->subject('Notificación SoWeb!');
                      });
                    }

                     return response()->json(['success'=>'true']);
                  }else{
                    return response()->json(['success'=>'false']);
                  }
           }else {
                    $result = Solicitudes::create($request->all());

                  if ($result){
                     return response()->json(['success'=>'true']);
                   }else{
                     return response()->json(['success'=>'false']);
                   }
           }
         }//fin primer if
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idSolicitud)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSolicitud)
    {
        $solicitudes = Solicitudes::find($idSolicitud);
        $solicitudes->asesores;
        $solicitudes->contactos;
       return response()->json($solicitudes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SolicitudUpdateRequest $request, $idSolicitud)
    {
        if ($request->ajax()) {
          $solicitudes = Solicitudes::find($idSolicitud);
            if($request->estado != 'cerrada'){
              $solicitudes->tituloSolicitud = $request->tituloSolicitud;
              $solicitudes->descripcion = $request->descripcion;
              $solicitudes->fecha = $request->fecha;
              $solicitudes->idContacto = $request->idContacto;
              $solicitudes->idAsesor = $request->idAsesor;
              $solicitudes->personaContacto = $request->personaContacto;
              $solicitudes->estado = $request->estado;
              $solicitudes->tipoSolicitud = $request->tipoSolicitud;
              $solicitudes->precioCotizacion = $request->precioCotizacion;
              $solicitudes->precioCobrado = $request->precioCobrado;
              $solicitudes->userUltimaModificacion = $request->userUltimaModificacion;
              $result = $solicitudes->save();

              if ($result) {
                 return response()->json(['success'=>'true']);
                }else {
                   return response()->json(['success'=>'false']);
                  }
              }//end del if estado
               else {
                 $solicitudes->tituloSolicitud = $request->tituloSolicitud;
                 $solicitudes->descripcion = $request->descripcion;
                 $solicitudes->fecha = $request->fecha;
                 $solicitudes->idContacto = $request->idContacto;
                 $solicitudes->idAsesor = $request->idAsesor;
                 $solicitudes->personaContacto = $request->personaContacto;
                 $solicitudes->estado = $request->estado;
                 $solicitudes->fechaCerrado = Carbon::now();
                 $solicitudes->tipoSolicitud = $request->tipoSolicitud;
                 $solicitudes->precioCotizacion = $request->precioCotizacion;
                 $solicitudes->precioCobrado = $request->precioCobrado;
                 $solicitudes->userUltimaModificacion = $request->userUltimaModificacion;
                 $result = $solicitudes->save();

                 if ($result) {
                    return response()->json(['success'=>'true']);
                   }else {
                      return response()->json(['success'=>'false']);
                     }
               }


         }


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
