<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use Eloquent;
use soweb\Http\Requests\SolicitudCreateRequest;
use soweb\Http\Requests\SolicitudUpdateRequest;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Models\Contactos\Contactos;
use soweb\Models\Asesores\Asesores;
use Seession;
use Input;
use DB;
use Carbon\Carbon;
class SolicitudesController extends Controller
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


    public function index()
    {
        return view('solicitud.index');
    }
    public function listSolitud(Request $request)
    {
      $solicitudes = Solicitudes::select('solicitudes.*','contactos.nombre as nameC','asesores.nombre as nameA')
                                  ->join('contactos','contactos.idContacto','=','solicitudes.idContacto')
                                  ->join('asesores','asesores.idAsesor','=','solicitudes.idAsesor')
                                  ->get();

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
    public function show($idSolicitud)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idSolicitud)
    {
        $solicitudes = Solicitudes::find($idSolicitud);
        $solicitudes->asesores;
        $solicitudes->contactos;
       return response()->json($solicitudes);
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
        if ($request->ajax()) {
          $solicitudes = Solicitudes::findOrFail($idSolicitud);
          $input = $request->all();
            $result = $solicitudes->fill($input)->save();
               if ($result) {
                  return response()->json(['success'=>'true']);
                }
              else {
                   return response()->json(['success'=>'false']);
                 }
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
        //
    }
}
