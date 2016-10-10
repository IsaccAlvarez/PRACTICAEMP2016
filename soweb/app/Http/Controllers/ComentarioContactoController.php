<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;

use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Contactos\ComentarioContacto;
use soweb\Models\Contactos\Contactos;
use soweb\User;
use Carbon\Carbon;
use Auth;
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

         $comentarios = ComentarioContacto::select('users.name as user','comentario_contactos.created_at', 'comentario_contactos.comentario')
                                               ->join('users','users.id','=','comentario_contactos.idUser')
                                               ->where('comentario_contactos.idContacto', $idContacto)
                                               ->get();


         return view('contacto/showContact', compact('contactos','comentarios'));
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
           $result = ComentarioContacto::create($request->all());
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
