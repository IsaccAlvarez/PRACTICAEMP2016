<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\User;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Routing\Route;
use soweb\Http\Requests\UserCreateRequests;
use soweb\Http\Requests\UserUpdateRequest;
use Hash;
use Crypt;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');

    }

    public function find(Route $route){
        $this->user = User::find($route->getParameter('usuario'));
    }
    public function index()
    {
       return view('usuario.index');
    }
     public function listUser(Request $request)
     {
       $users = User::all()->take(10);
       return view('usuario/list')->with('users', $users);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequests $request)
    {
     
     if ($request->ajax()) {

       $result = User::create($request->all());
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
      $users = User::find($id);

      return response()->json($users);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

        if ($request->ajax()) {
          $users = User::findOrFail($id);
          $input = $request->all();
          $result = $users->fill($input)->save();
          if ($result) {
            return response()->json(['success'=>'true']);
          }
          else {
            return response()->json(['success'=>'false']);
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
        $users = User::findOrFail($id);
        if ($users->tipoUser != 'admin') {
          $result = $users->delete();
          if ($result) {
            return response()->json(['success'=>'true']);
          }
          else {
            return response()->json(['success'=>'false']);
          }
        }else {
          return response()->json(['success'=>'false']);
        }

    }


}
