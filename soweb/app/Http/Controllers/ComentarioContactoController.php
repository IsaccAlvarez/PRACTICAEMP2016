<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;

use soweb\Http\Requests;
use soweb\Http\Requests\CreateComentarioRequest;
use soweb\Http\Controllers\Controller;
use soweb\Models\Contactos\ComentarioContacto;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Asesores\Asesores;
use soweb\User;
use Carbon\Carbon;
use Auth;
use Mail;
class ComentarioContactoController extends Controller
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
    public function index(Request $request)
    {

    }
     public function getList(Request $request, $idContacto)
     {

         $contactos = Contactos::select('contactos.*', 'users.name as name')
                       ->join('users','users.id','=','contactos.idUser')
                       ->where('contactos.idContacto', $idContacto)
                       ->get();


         $comentarios = ComentarioContacto::where('idContacto', $idContacto)
                                            ->orderby('created_at','DESC')
                                            ->paginate(3);

            return view('contacto/showContact')->with('contactos', $contactos)
                                               ->with('comentarios', $comentarios);


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
              $datos =Contactos::find($request->idContacto);
              $user = User::find($request->idUser);

              $coment['comentario'] = $comentario =$request->comentario;
           $result = ComentarioContacto::create($request->all());
           if ($result) {
             foreach ($asesores as $asesor) {
               Mail::send('contacto.notificacionEmail',['datos'=> $datos, 'user'=>$user, 'coment'=>$coment],function($msj) use ($asesor) {
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
