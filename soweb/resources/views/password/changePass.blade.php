@extends('layouts.admin')
@section('content')
    @include('alerts.errors')
    @include('alerts.request')
    @include('alerts.success')

    <div class="header">
        <div class="container form ">
           <div class="form-group col-sm-6 form">
             {!!Form::open(['route'=>'cambio.store','method'=>'POST'])!!}
             <div class="input-group">
              <span class="input-group-addon" id="basic-addon1">Clave Actual </span>
              <input type="password" name='passActual' class="form-control" placeholder="" aria-describedby="basic-addon1">
            </div>

            <div class="input-group">
             <span class="input-group-addon" id="basic-addon1">Nueva Clave     </span>
             <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
           </div>

           <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Confirmar Nueva Clave</span>
            <input type="password" name="password_confirmation" class="form-control" placeholder="" aria-describedby="basic-addon1">
          </div>

               <div class="form-group ">
                 {!!Form::submit('Guardar',['class'=>'btn-success center'])!!}

               </div>


             {!!Form::close()!!}
           </div>
        </div>

    </div>
@endsection
