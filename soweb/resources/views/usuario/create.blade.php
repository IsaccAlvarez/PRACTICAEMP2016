@extends('layouts.admin')
@section('content')
{!!Html::style('css/agregarUsuario.css')!!}
    @include('alerts.request')
    {!!Form::open(['route'=>'usuario.store', 'method'=>'POST'])!!}

    @include('usuario.forms.usr')

@endsection
