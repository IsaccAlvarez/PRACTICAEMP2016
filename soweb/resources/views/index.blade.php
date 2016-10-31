@extends('layouts.principal')

@section('content')

  <div class="container">
     <div class="row">
         <div class="col-md-4 col-md-offset-4">
           <br>
           <br>
           @include('alerts.success')
           @include('alerts.errors')
           @include('alerts.request')
             <div class="login-panel panel panel-default">
                 <div class="panel-heading">
                   <div class="text-center">
                     <h2 class="text-right"><img class="img-responsive "  src="img/logotipo4.png" alt="" /></h2>
                   </div>

                 </div>
                 <div class="panel-body">
                     {!!Form::open(['route'=>'log.store', 'method'=>'POST','class'=>'form'])!!}
                         <fieldset>
                             <div class="form-group">
                                  {!!Form::email('email',null,['class'=>'form-control ', 'placeholder'=>'Correo','autofocus'])!!}
                             </div>
                             <div class="form-group">
                                 {!!Form::password('password',['class'=>'form-control','id'=>'pass', 'placeholder'=>'Contraseña'])!!}
                             </div>
                             <div class="checkbox">
                                 <label>
                                   <input type="checkbox" class=" from-control" onchange="document.getElementById('pass').type = this.checked ? 'text' : 'password' ">Ver clave de acceso
                                 </label>
                             </div>
                             <!-- Change this to a button or input when using this as a form -->
                              {!!Form::submit('Iniciar Sesion',['class'=>'btn btn-lg btn-success btn-block'])!!}
                         </fieldset>
                     {!!Form::close()!!}
                 </div>
             </div>
         </div>
     </div>
 </div>

@endsection

  <script type="text/javascript">
  window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove();
      });
  }, 4000);
  </script>
