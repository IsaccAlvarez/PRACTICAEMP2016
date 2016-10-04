@extends('layouts.admin')
@section('title','Usuarios')
  {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
  {!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')

  @include('alerts.success')
  @include('alerts.errors')
  <div id="message-save" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardó correctamente.</strong>
  </div>
  <div id="message-update" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información de guardó correctamente.</strong>
  </div>
  <div id="message-delete" class="alert alert-success glyphicon glyphicon-trash" role="alert" style="display:none">
           <strong> El registro se eliminó correctamente.</strong>
  </div>
  <div id="message-delete-error" class="alert alert-warning fa fa-info-circle" role="alert" style="display:none">
           <strong> No se Puede eliminar un Administrador.</strong>
  </div>
       <div class="panel panel-success">
         <div class="panel-heading"><b>Usuarios</b>
             <div class="navbar-btn pull-right">
              <button id="crear" type="button"   class="btn btn-warning navbar-btn fa fa-user-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalCreateUser' > Nuevo Usuario</button>
            </div>
        </div>
      </div>


  <div id="listU" class="">

  </div>
  @section('modal')
    @include('usuario.modalCreate')
  @endsection
  @include('usuario.modalEdit')
@endsection

@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  {!!Html::script('js/users.js')!!}
@endsection
