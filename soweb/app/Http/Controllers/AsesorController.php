<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests\AsesorCreateRequests;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;

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

    public function index()
    {
        return view('asesor.index');
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
    public function store(Request $request)
    {
        \soweb\Models\Asesores\Asesores::create([
            'nombre' => $request['nombre'],
            'iniciales'=>$request['inicales'],
            'tipoAsesor'=>$request['tipoAsesor'],
            'telefono'=>$request['telefono'],
            'clave' => bcrypt($request['clave']),
            'emailPersonal'=>$request['emailPersonal'],
            'emailEmpresa' => $request['emailEmpresa'],
            'estado' => $request['estado'],
        ]);
        return "Asesor registrado";
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
