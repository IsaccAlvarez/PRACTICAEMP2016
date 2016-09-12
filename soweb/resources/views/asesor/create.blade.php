@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    {!!Html::style('css/agregarUsuario.css')!!}
    {!!Form::open(['route'=>'asesor.store', 'method'=>'POST'])!!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
    @include('asesor.form.aser')
    {!!Form::close()!!}
@endsection
