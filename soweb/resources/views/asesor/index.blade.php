@extends('layouts.admin')

@section('content')

  <div class="row">
     <div class="col-md-8">
       <div class="panel panel-success">
         <div class="panel-heading">
         Asesores
          <p class="navbar-text navbar-right" style=" margin-top: 1px;" >
         <button id="crear" onclick='redirecionar()' type="button"   class="btn-primary navbar-btn" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo">Nuevo Asesor</button>
         </p>
          </div>
         <div class="panel-body">
            <table class="table table-bordered">
              <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Telefono</th>
                <th>Correo</th>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>


@endsection
