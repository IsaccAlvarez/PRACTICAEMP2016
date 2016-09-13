<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests\AsesorCreateRequests;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Asesores\Asesores;
use Session;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
         $this->middleware('auth');

     }

    public function index(Request $request)
    {

         $asesores = Asesores::paginate(7);
      /*if ($request->ajax()) {
        $asesores = Asesores::all();
        return response()->json($asesores->toArray());
      }*/
        return view('asesor.index', compact('asesores'));
    }
    public function listing(){
      /*$asesores = Asesores::Select('idAsesor','nombre','estado','telefono','emailEmpresa');
      return view('asesor.list')->with('asesores', $asesores);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsesorCreateRequests $request)
    {
        if ($request->ajax()) {
          Asesores::create($request->all());
          Session::flash('message','Se creo correctamente');
          return response()->json(["mensaje" => "creado"]);
        }
        return redirect()->route('asesor');
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
