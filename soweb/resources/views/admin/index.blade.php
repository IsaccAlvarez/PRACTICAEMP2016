@extends('layouts.admin')
@section('title','Home')
{!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
{!!Html::style('//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css')!!}
{!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')
  @include('alerts.errors')
  <div id="message-save" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información se guardó correctamente.</strong>
  </div>
  <div id="message-update" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información se guardó correctamente.</strong>
  </div>
         <div class="panel panel-success">
           <div class="panel-heading">
           <b>Mis Solicitudes Pendientes</b>
           <div class="navbar-btn pull-right">
            <button id="crear" type="button" class=" btn btn-warning navbar-btn fa fa-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalCreateSolicitud'> Nueva Solicitud</button>
           </div>
            </div>
          </div>
          <div class="table-responsive" id="listPen"></div>
          @section('modal')
            @include('admin.modalCreate')
          @endsection
           @include('admin.modalEdit')
@endsection
@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js')!!}
  {!!Html::script('//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js')!!}
  {!!Html::script('//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js')!!}
  {!!Html::script('//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js')!!}
  {!!Html::script('//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js')!!}
  {!!Html::script('//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js')!!}
  {!!Html::script('//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  {!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js')!!}
  {!!Html::script('js/listPendientes.js')!!}
@endsection
