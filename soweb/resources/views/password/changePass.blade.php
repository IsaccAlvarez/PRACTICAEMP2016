@extends('layouts.admin')
@section('title','Cambiar Clave')
@section('content')
    @include('alerts.errors')
    @include('alerts.request')
    @include('alerts.success')
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          {!!Form::open(['route'=>'cambio.store','method'=>'POST'])!!}
            <input type="hidden" name="token" id="token" value="{{csrf_token()}}">
            <div class="form-group">
              <label for="passActual">Clave Actual</label>
              <input type="password" name="passActual" class="form-control" placeholder="Clave Actual" autofocus>
            </div>
            <div class="form-group">
              <label for="password">Nueva Clave</label>
              <input type="password" name="password" class="form-control" placeholder="Nueva Clave">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirmar Nueva Clave</label>
              <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Nueva Clave">
            </div>

            {!!Form::submit('Guardar',['class'=>'btn btn-success'])!!}
         {!!Form::close()!!}
        </div>

      </div>
    </div>

@endsection
