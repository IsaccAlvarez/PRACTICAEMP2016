@extends('layouts.admin')
@section('title','Enviar Solicitudes')
@section('content')
@include('alerts.request')
{!!Form::open(['route'=>'mail.store', 'method'=>'POST', 'id'=>'enviarListaSolicitud', 'action'=>'enviarSolicitud', 'class'=>'formSolicitud'])!!}
<link href="/assets/jqueryui/jquery-ui.theme.min.css" rel="stylesheet">
<link  href="/assets/jqueryui/jqueryui.ccs" >
<script src="/assets/jqueryui/external/jquery/jquery.js"></script>
<script src="/assets/jqueryui/jquery-ui.js"></script>

    <form name="form">
     <input type="hidden" name="_token" id="_token"  value="<?= csrf_token(); ?>">

    <div class="form-group">
      <div class="form-group">
        @foreach ($asesores as $asesor)
          <input type="checkbox" name="checkEmail" id="email" value="{{$asesor->emailEmpresa}}" onclick="anadir(this)" autofocus><label for="checkEmail"> {!!$asesor->emailEmpresa!!} </label>

        @endforeach
        <br>
      <label for="correo" >Correo</label>
        <input type="text" class="form-control " name="correo" id="correo" autofocus>
      </div>
      <div class="form-group">
       <label for="asunto" >Asunto</label>
         <input type="text" class="form-control " name="asunto" id="asunto" >
       </div>

    <div class="form-group">
        <label for="mensaje">Mensaje</label>
          <textarea rows="15" cols="50" class="form-control" name="mensaje" id="mensaje">
            <pre>
            @foreach ($solicitudes as $solicitud)

          Contacto: {{$solicitud->contactos->nombre}}
          Titulo: {{$solicitud->tituloSolicitud}}
          Estado: {{$solicitud->estado}}
          Asignado A: {{$solicitud->asesores->nombre}}
          Fecha: <?php echo date("d-m-Y", strtotime($solicitud->fecha));?>
          
          @endforeach</pre>
        </textarea>
        </div>
        <input type="hidden" class="form-control " name="formulario" id="formulario" value="enviarSolicitud" >

        {!!Form::submit('Enviar')!!}
      </form>
<script src="/assets/jqueryui/jquery-ui.min.js"></script>

{!!Html::script('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js')!!}

<script type="text/javascript">
    function anadir(obj) {
      $separador= ',';
      if (obj.checked)
      if (correo.value != 0) {
        obj.form.correo.value +=$separador += obj.value;
      }else {
        obj.form.correo.value += obj.value;
      }

      else {
        texto = obj.form.correo.value;
        texto = texto.split(obj.value).join('');
        obj.form.correo.value = texto;
      }
    }
</script>


{!!Form::close()!!}
@endsection
