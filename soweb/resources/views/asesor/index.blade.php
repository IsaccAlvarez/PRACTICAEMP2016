@extends('layouts.admin')
@section('title','Asesores')
  {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
  {!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')
  @include('alerts.success')
  <div id="message-save" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información se guardo correctamente.</strong>
      </div>
  <div id="message-update" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
          <strong> La información se guardo correctamente.</strong>
      </div>
  <div id="message-delete" class="alert alert-success glyphicon glyphicon-trash" role="alert" style="display:none">
           <strong> La información se elimino correctamente.</strong>
       </div>

       <div class="panel panel-success ">
         <div class="panel-heading"><b>Asesores</b>
           <div class="navbar-btn pull-right">
             <button id="crear" class=" btn btn-warning navbar-btn  fa fa-user-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" data-toggle='modal' data-target='#myModalCreate'> Nuevo Asesor</button>

             <a id="enviar" class = 'btn btn-success navbar-btn fa fa-paper-plane' style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" href="{!!URL::to('/mail')!!}"> Enviar Lista</a>
           </div>

         </div>
      </div>

<div id="lista" class="table-responsive"> </div>

@section('modal')
  @include('asesor.modelCreate')
@endsection
@include('asesor.modelEditar')

@endsection

@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  {!!Html::script('js/Asesor.js')!!}


@endsection
