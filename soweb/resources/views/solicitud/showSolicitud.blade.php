@extends('layouts.admin')
@section('title','Solicitudes')
  @section('content')
    <div id="message-coment" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
            <strong> La información se guardó correctamente.</strong>
    </div>
    <div class="panel panel-success">
       @foreach ($solicitud as $solicitud)
      <div class="panel-heading"><b>Solicitud: #{{$solicitud->idSolicitud}}</b>
      <div class="navbar-btn pull-right">
        <a id="enviar" class = 'btn btn-success navbar-btn fa fa-chevron-left' style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" href="{!!URL::to('/solicitud')!!}"> Volver</a>
       <button id="crear" type="button" class=" btn btn-warning navbar-btn fa fa-comment" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalComentario'> Comentario</button>
      </div>
      </div>
      <div class="panel-body">

          <div class="col-md-3">
            <p class="text-left"><b>Contacto:</b> {{$solicitud->nameC}} </p>
          </div>
          <div class="col-md-4">
            <p class="text-left"><b>Persona Contacto:</b><?php
               $cont;
               if ($solicitud->personaContacto != '') {
                 $cont = $solicitud->personaContacto;
               }else {
                 $cont = 'N/A';
               }

            ?> {{$cont}} </p>
          </div>
          <div class="col-md-3">
            <p class="text-left"><b>Asignado A:</b> {{$solicitud->nameA}} </p>
          </div>
           <div class="col-md-2">
             <p class="text-left"><b>Fecha de Solicitud:</b> <?php echo date("d-m-Y", strtotime($solicitud->fecha));?></p>
           </div>


          <div class="col-md-4">
            <p class="text-left"><b>Titulo de Solicitud:</b> {{$solicitud->tituloSolicitud}}</p>
          </div>
          <div class="col-md-4">
            <p class="text-left"><b>Descripción:</b> {{$solicitud->descripcion}}</p>
          </div>
          <div class="col-md-3">
            <p class="text-left"><b>Tipo de Solicitud:</b> {{$solicitud->tipoSolicitud}}</p>
          </div>


           <div class="col-md-5">
             <p class="text-left"><b>Precio de Cotización:</b> ₡{{$solicitud->precioCotizacion}}</p>
           </div>
           <div class="col-md-5">
             <p class="text-left"><b>Precio Cobrado:</b> ₡{{$solicitud->precioCobrado}}</p>
           </div>


          <div class="col-md-5">
            <p class="text-left"><b>Estado:</b> {{$solicitud->estado}}</p>
          </div>
          <div class="col-md-5">
            <?php
            $var;
             if ($solicitud->fechaCerrado != "0000-00-00 00:00:00") {
               $var =  date("d-m-Y h:m:s a", strtotime($solicitud->fechaCerrado));
             }else {
               $var = 'N/A';
             }
            ?>
            <p class="text-left"><b>Fecha de Cerrado:</b> {{$var}}</p>
          </div>


          <div class="panel-body " style="position:static; color:rgb(91, 196, 96);">
            <div class="col-md-4" style="font-size: 7pt; position: static">
              <p class="text-left">Creado por: {{$solicitud->nameU}} </P>
              <p class="text-left">Fecha de Creación: {{$solicitud->created_at->format('d/m/Y')}}</p>
              <p class="text-left">Ultima Modificacion: {{$solicitud->updated_at->format('d/m/Y  h:i A')}}</p>
              <p class="text-left">Modificado por: {{$solicitud->userUltimaModificacion}}</p>
            </div>
          </div>
        </div>
        @section('modal')
         @include('solicitud.modalComentario')
        @endsection
    @endforeach
      </div>
      <p class="text-center"><b>---------------------------------COMENTARIOS-----------------------------------</b></p>
      <div id="list-coment" class="">
        <ul class="list-group" style="font-size: 10pt;">
                @foreach ($comentarios as $comentario)
                  <li class="list-group-item">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        {{$comentario->user->name}} {{$comentario->created_at->format('d/m/Y  h:i A')}}
                      </div>
                      <div class="panel-body">
                          {{ $comentario->comentario }}
                      </div>
                    </div>
                  </li>
                @endforeach
           </ul>
           <div class="text-center">
             {!! $comentarios->render() !!}
           </div>
      </div>


      @section('modal')
       @include('solicitud.modalComentario')
      @endsection

  @endsection
@section('script')
{!!Html::script('js/comentS.js')!!}
@endsection
