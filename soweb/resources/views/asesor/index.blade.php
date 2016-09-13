@extends('layouts.admin')

@section('content')
  @include('alerts.success')
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
           <table class="table table-bordered table-responsive" >
             <thead >
               <th>Id</th>
               <th>Nombre</th>
               <th>Estado</th>
               <th>Telefono</th>
               <th>Correo</th>
               <th>Operaciones</th>
             </thead>
              @foreach($asesores as $asesor)
                <tbody id="datos">
                  <tr>
                    <td>{{$asesor->idAsesor}}</td>
                    <td>{{$asesor->nombre}}</td>
                    <td>{{$asesor->estado}}</td>
                    <td>{{$asesor->telefono}}</td>
                    <td>{{$asesor->emailEmpresa}}</td>
                    <td>
                      <button class='btn btn-primary'>Editar</button><button class='btn btn-danger'>Eliminar</button>
                    </td>
                  </tr>
                </tbody>
              @endforeach
           </table>
           {!!$asesores->render()!!}
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')

  {!!Html::script('js/formCreate.js')!!}
  

@endsection
