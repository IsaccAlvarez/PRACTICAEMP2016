@extends('layouts.admin')
@section('content')
{!!Html::style('css/agregarUsuario.css')!!}
    @include('alerts.request')
    {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}
      @include('usuario.forms.usr')
    <div class="form-group btn-group-horizontal">
      {!!Form::submit('Registrar',['class'=>'btn-primary'])!!}
    </div>
    {!!Form::close()!!}


@endsection
