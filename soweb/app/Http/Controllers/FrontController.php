<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;
use soweb\Models\Solicitudes\Solicitudes;
use soweb\Http\Requests;
use soweb\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['only' => 'admin']);
    }


    public function index()
    {
        return view('index');
    }
    public function admin(){
      $solicitud = Solicitudes::select('solicitudes.*','contactos.nombre as nameC','asesores.nombre as nameA','users.name as nameU')
                    ->join('users','users.id','=','solicitudes.idUser')
                    ->join('contactos','contactos.idContacto','=','solicitudes.idContacto')
                    ->join('asesores','asesores.idAsesor','=','solicitudes.idAsesor')
                    ->where('solicitudes.estado', 'nuevo')
                    ->get();
        return view('admin.index', compact('solicitud'));
    }
    public function cambioClave(){
       return view('cambioClave');
    }
}
