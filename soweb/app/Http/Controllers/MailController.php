<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Asesores\Asesores;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Http\Requests\CorreoRequests;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $asesores = Asesores::all();
      return view('asesor.enviarLista', compact('asesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contactos = Contactos::all();
        $asesores = Asesores::all();
        return view('contacto.enviarListaContacto', compact('contactos', 'asesores'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function solicitud()
     {
       $solicitudes = Solicitudes::all();
       $asesores = Asesores::all();
       return view('solicitud.enviarSolicitud', compact('solicitudes', 'asesores'));
     }

     function cargarformulario($url){

       if ($url == "enviarContacto"){
       return Redirect::route('contacto.index');
       }

     		elseif($url == "enviarAsesor"){
          return Redirect::route('asesor.index');
        }
        elseif ($url == "enviarSolicitud") {
          return Redirect::route('solicitud.index');

        }
     }

    public function store(CorreoRequests $request)
    {
      $correo=$request->input("correo");
      $Asunto=$request->input("asunto");
      $contenido=$request->input("mensaje");
      $formulario=$request->input("formulario");

      $data = array('contenido' =>$contenido);



if( str_contains($correo,',')){

  $r=Mail::send('asesor.enviar', $data,

  function($msj) use ($correo, $Asunto){
    $correos_array = preg_split("/[\s,]+/", $correo);
   $msj->from('notreply@seesoft-cr.com', 'SeeSoft-CR');
     $primero=true;
    foreach($correos_array as $key=>$value){
      if($primero){
         $msj->to($value);

      }else {
      $msj->cc($value);
      }

    }
$msj  ->subject($Asunto);
 });

}
else {
  $r=Mail::send('asesor.enviar', $data, function($msj) use ($correo, $Asunto){
   $msj->from('notreply@seesoft-cr.com', 'SeeSoft-CR');
   $msj->to($correo)->subject($Asunto);
 });

}
if($r){
 Session::flash('message', 'Mensaje enviado correctamente');
 return $this->cargarformulario($formulario);
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
