<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Http\Requests\CambioClaveRequests;
use Hash;

class CambioClaveController extends Controller
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
        //
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
    public function store(CambioClaveRequests $request)
    {


       if (Hash::check($request['passActual'], Auth::user()->password)) {

         Auth::User()->where('email','=', Auth::user()->email)->update(['password'=>bcrypt($request['password'])]);
           Session::flash('message','Cambio de clave exitoso');
           return view('/password.changePass');
       }
       else {
        Session::flash('message-error','Credenciales incorrectos');
        return view('/password.changePass');
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
    public function update(Requests $request, $id)
    {


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
    public function password(){
      return View('password.changePass');
    }


}
