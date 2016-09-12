@extends('layouts.principal')
@section('content')
    @include('alerts.errors')
    @include('alerts.request')
    <div class="header">

            <div class="container">
                       <div class="form-group-lg  form">

                           <div class="img-rounded align-center">
                               <a><img src="img/iconoSW2.png" alt="" /></a>

                           </div>

                           {!!Form::open(['route'=>'log.store', 'method'=>'POST','class'=>'form-horizotal'])!!}
                           {!! csrf_field() !!}

                           <div class="form-group input-group ">
                               {!!Form::email('email',null,['class'=>'form-control ', 'placeholder'=>'Correo','autofocus'])!!}
                           </div>
                           <div class="form-group input-group">
                               {!!Form::password('password',['class'=>'form-control','id'=>'pass', 'placeholder'=>'Contraseña'])!!}
                           </div>
                           <div class="form-group input-group">
                               <input type="checkbox" class="mostrar" onchange=
                               "document.getElementById('pass').type = this.checked ? 'text' : 'password' ">Ver clave de acceso<br>
                           </div>
                           <div class="form-group input-group">
                           {!!Form::submit('Iniciar Sesion',['class'=>'btn btn-primary center boton'])!!}
                           </div>
                           
                           {!!Form::close()!!}

                       </div>
                </div>

    </div>

    @endsection
