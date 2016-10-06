<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;

use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Http\Requests\ContactoCreateRequest;
use soweb\Http\Requests\ContactoUpdateRequest;
use Session;
use soweb\Models\Contactos\Contactos;

class ContactoController extends Controller
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

      // if ($request->ajax()) {
      //     $contactos = Contactos::all()->take(10);
      //     return response()->json($contactos);
      // }
      // //  $contactos = Contactos::search($request->get('nombre'))->orderBy('nombre','ASC')->paginate(2);


        return View('contacto.index');
    }

    public function listAll(Request $request)
    {
      $contactos = Contactos::all()->take(10);

      return view ('contacto/list')->with('contactos', $contactos);
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
    public function store(ContactoCreateRequest $request)
    {
         if ($request->ajax()) {

           $result = Contactos::create($request->all());
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
    public function show($idContacto)
    {

        //   $contactos = Contactos::find($idContacto);
        // return View('contacto.showContact')->with('contactos', $contactos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idContacto)
    {
         $contactos = Contactos::find($idContacto);

         return response()->json($contactos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactoUpdateRequest $request, $idContacto)
    {
        if ($request->ajax()) {
          $contactos = Contactos::findOrFail($idContacto);
          $input = $request->all();
          $result = $contactos->fill($input)->save();
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
    public function destroy($idContacto)
    {
        $contactos = Contactos::findOrFail($idContacto);
        $result = $contactos->delete();
        if ($result) {
          return response()->json(['success'=>'true']);
        }
        else {
          return response()->json(['success'=>'false']);
        }
    }

    public function listComent($idContacto)
    {
       $comentarios = Contactos::find($idContacto)->comentariosContactos()->get();
       return view('contacto/modalEdit')->with('comentarios', $comentarios);
    }
}
