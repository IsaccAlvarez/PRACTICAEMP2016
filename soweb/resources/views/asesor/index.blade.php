@extends('layouts.admin')
@section('title','Asesores')
@section('content')
  @include('alerts.success')
  <div id="message-save" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardo correctamente.</strong>
      </div>
  <div id="message-update" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardo correctamente.</strong>
      </div>
  <div id="message-delete" class="alert alert-success glyphicon glyphicon-trash" role="alert" style="display:none">
           <strong> La información se elimino correctamente.</strong>
       </div>

       <div class="panel panel-success ">
         <div class="panel-heading"><b class="text-center">Asesores</b>
           <div class="navbar-btn pull-right">
             <button id="crear" class=" btn btn-warning navbar-btn  glyphicon glyphicon-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" data-toggle='modal' data-target='#myModalCreate'> Nuevo</button>
           </div>
           <form class="navbar-form navbar-center">
               <div class="form-group" >
                  <input id="filtrar" type="text" class="form-control" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" placeholder="Buscar">
                </div>
           </form>



         </div>
      </div>

<div id="lista"> </div>
@include('asesor.modelEditar')
@include('asesor.modelCreate')
@endsection

@section('script')
  {!!Html::script('js/Asesor.js')!!}


@endsection
