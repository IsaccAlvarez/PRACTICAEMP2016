@extends('layouts.admin')

@section('content')
  @include('alerts.success')


       <div class="panel panel-success">
         <div class="panel-heading">
         Usuarios
          <p class="navbar-text navbar-right" style=" margin-top: 1px;" >
         <button id="crear" type="button" onclick='redirecionar()'  class="btn-primary navbar-btn fa fa-user-plus" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" > Nuevo Usuario</button>
         </p>
          </div>
      </div>


  <div class="">
    <table class="table table-striped  table-responsive table-condensed table-hover ">
    <thead>
    <th> Nombre</th>
    <th> Correo</th>
     <th>Tipo de Usuario</th>
    <th>Operacion</th>
    </thead>
    @foreach($users as $user)
    <tbody>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
       <td>{{$user->tipoUser}}</td>
      <td>
        {!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $user, $attributes = ['class'=>'btn btn-primary'])!!}
      </td>
    </tbody>
    @endforeach
    </table>
    {!!$users->render()!!}
  </div>

@endsection

@section('script')
  {!!Html::script('js/formCreate.js')!!}
@endsection
