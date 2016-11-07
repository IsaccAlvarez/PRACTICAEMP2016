@extends('layouts.admin')
@section('title','Home')
{!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
{!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')
  @include('alerts.errors')
         <div class="panel panel-success">
           <div class="panel-heading">
           <b>Solicitudes Pendientes</b>
            </div>
          </div>
          <div class="table-responsive" id="listPen"></div>

@endsection
@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  {!!Html::script('js/listPendientes.js')!!}
@endsection
