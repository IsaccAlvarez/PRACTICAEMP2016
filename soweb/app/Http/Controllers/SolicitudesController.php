<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests\SolicitudCreateRequest;
use soweb\Http\Requests\SolicitudUpdateRequest;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Asesores\Asesores;
use Input;
class SolicitudesController extends Controller
{

  public function __construct(){
      $this->middleware('auth');

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
      $solicitudes = Solicitudes::all()->take(10);

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
           $result = Solicitudes::create($request->all());
           if ($result){
               return response()->json(['success'=>'true']);
             }
             else
             {
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
    public function edit($idSolicitud)
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
    public function update(SolicitudUpdateRequest $request, $idSolicitud)
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
