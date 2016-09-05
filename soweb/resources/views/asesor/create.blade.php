@extends('layouts.admin')
@section('content')
    @include('alerts.request')
    {!!Form::open(['route'=>'asesor.store', 'method'=>'POST'])!!}
    @include('asesor.form.aser')
    {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
    {!!Form::close()!!}
@endsection