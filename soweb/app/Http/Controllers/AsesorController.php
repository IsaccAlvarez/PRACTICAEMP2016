<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Http\Requests\AsesorCreateRequests;
use soweb\Http\Requests\AsesorUpdateRequest;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Asesores\Asesores;
use Session;
// use Illuminate\Support\Facades\Session;

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

        return view('asesor.index');
    }
    public function listall(Request $request){

      $asesores = Asesores::orderBy('nombre','ASC')->paginate();
      return view('asesor/list')->with('asesores', $asesores);
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
    public function store(AsesorCreateRequests $request)
    {
        if ($request->ajax()) {
          $result = Asesores::create($request->all());
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
    public function show($idAsesor)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idAsesor)
    {
      $asesores = Asesores::find($idAsesor);


      return response()->json($asesores);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsesorUpdateRequest $request, $idAsesor)
    {

        if ($request->ajax()) {
          $asesor = Asesores::findOrFail($idAsesor);
          $input = $request->all();
          $result = $asesor->fill($input)->save();
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAsesor)
    {
        $asesor = Asesores::findOrFail($idAsesor);
        $result = $asesor->delete();
        if ($result)
      {
          return response()->json(['success'=>'true']);
      }
      else
      {
          return response()->json(['success'=> 'false']);
      }
    }

}
