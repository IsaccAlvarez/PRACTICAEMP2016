@extends('layouts.admin')
@section('content')
    @include('alerts.errors')
    @include('alerts.success')
    <div class="row">
       <div class="col-md-8">
         <div class="panel panel-success">
           <div class="panel-heading">
           Solicitudes Pendientes
            </div>
           <div class="panel-body">
              <table class="table table-bordered">
                <thead>
                  <th>Id</th>
                  <th>Contacto</th>
                  <th>Titulo</th>
                  <th>Estado</th>
                  <th>Asignado a</th>
                  <th>Fecha</th>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
