@extends('layouts.principal')

@section('content')

    <div class="header">

            <div class="container">
                       <div class="form-group-md  form">

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
                               <input type="checkbox" class=" from-control" onchange=
                               "document.getElementById('pass').type = this.checked ? 'text' : 'password' ">Ver clave de acceso<br>
                           </div>
                           <div class="form-group input-group">
                           {!!Form::submit('Iniciar Sesion',['class'=>'btn btn-success center boton'])!!}
                           </div>
                           @include('alerts.errors')
                           @include('alerts.request')

                           {!!Form::close()!!}

                       </div>
                </div>

    </div>

    @endsection
