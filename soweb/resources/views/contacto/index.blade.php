@extends('layouts.admin')
@section('title','Contactos')

@section('content')

  <div id="message-save" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardó correctamente.</strong>
  </div>
  <div id="message-update" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardó correctamente.</strong>
  </div>
  <div id="message-delete" class="alert alert-success glyphicon glyphicon-trash" role="alert" style="display:none">
           <strong>El registro se eliminó correctamente.</strong>
 </div>
  <div class="panel panel-success">
    <div class="panel-heading">
    <b>Contactos</b>
    <div class="navbar-btn pull-right">
     <button id="crear" type="button" class=" btn btn-warning navbar-btn fa fa-user-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalCreateContacto'> Nuevo Contacto</button>
    </div>


     </div>
  </div>

<div class="table-responsive">
  <table id="myTable" class="table table-striped table-responsive" >
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Tipo de Contacto</th>
        <th>Operaciones</th>
      </tr>
    </thead>
      <tbody id="datos"></tbody>
  </table>
</div>
@include('contacto.modalEdit')
@include('contacto.modalCreate')


@endsection
@section('script')

{!!Html::script('js/contacto.js')!!}

@endsection
