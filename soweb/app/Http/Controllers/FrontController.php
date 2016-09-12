<?php

namespace soweb\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.index');
    }
    public function cambioClave(){
       return view('cambioClave');
    }
}
