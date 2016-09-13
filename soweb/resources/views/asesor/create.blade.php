@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    @include('alerts.errors')
    {!!Html::style('css/agregarUsuario.css')!!}
    {!!Form::open(['route'=>'asesor.store', 'method'=>'POST'])!!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('asesor.form.aser')
    {!!Form::close()!!}

@endsection

@section('script')
  {!!Html::script('js/createAsesor.js')!!}
  {!!Html::script('js/btnCancelar.js')!!}
@endsection
