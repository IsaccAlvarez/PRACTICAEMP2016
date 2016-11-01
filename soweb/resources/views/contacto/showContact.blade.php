@extends('layouts.admin')
@section('title','Contactos')
  @section('content')
    <div id="message-coment" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
            <strong> La información se guardó correctamente.</strong>
    </div>
    <div class="panel panel-info">
      @foreach ($contactos as $contactos)


      <div class="panel-heading"><b>Contacto: {{$contactos->idContacto}}</b>
      <div class="navbar-btn pull-right">
        <a id="enviar" class = 'btn btn-success navbar-btn fa fa-chevron-left' style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" href="{!!URL::to('/contacto')!!}"> Volver</a>
       <button id="crear" type="button" class=" btn btn-warning navbar-btn fa fa-comment" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalComent'> Comentario</button>
      </div>
      </div>
      <div class="panel-body">
        <div class="col-md-3">
          <p class="text-left"><b>Nombre:</b> {{$contactos->nombre}} </p>
        </div>
        <div class="col-md-2">
          <p class="text-left"><b>Es empresa:</b><?php
          $var;
          if($contactos->esEmpresa == 1) {
            $var = 'Si';
          } else {
            $var = 'No';
          }?> {{$var}} </p>
        </div>
         <div class="col-md-3">
           <p class="text-left"><b>Nombre Juridico:</b><?php
            $var;
            if ($contactos->nombreJuridico != '') {
              $var = $contactos->nombreJuridico;
            }else {
              $var = 'N/A';
            }
           ?> {{$var}}</p>
         </div>
         <div class="col-md-3">
           <p class="text-left"><b>Representante:</b><?php
             $rep;
             if ($contactos->nombreRepresentante != '') {
               $rep = $contactos->nombreRepresentante;
             }else {
               $rep = 'N/A';
             }
           ?> {{$rep}}</p>
         </div>
         <div class="col-md-4">
           <p class="text-left"><b>Teléfono:</b> {{$contactos->telefono}}</p>
         </div>
         <div class="col-md-4">
           <p class="text-left"><b>Correo:</b> {{$contactos->email}}</p>
         </div>
         <div class="col-md-4">
           <p class="text-left"><b>Dirección:</b> {{$contactos->direccion}}</p>
         </div>
         <div class="panel-body " style="position:static; color:rgb(37, 91, 205);">
           <div class="col-md-8" style="font-size: 7pt; position: static">
             <p class="text-left">Creado por:</b>  {{$contactos->name}} | Fecha de Creación: {{$contactos->created_at->format('d/m/Y')}} | Ultima Modificacion: {{$contactos->updated_at->format('d/m/Y  h:i A')}} | Modificado por: {{$contactos->userUltimaModificacion}}</P>
           </div>
         </div>
      </div>
      @section('modal')
        @include('contacto.modalComent')
      @endsection
        @endforeach
      </div>
      <div id="list-coment" class="">
        <ul class="list-group" style="font-size: 10pt;">
                @foreach ($comentarios as $comentario)
                  <li class="list-group-item">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        {{$comentario->users->name}} {{$comentario->created_at->format('d/m/Y  h:i A')}}
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


  @endsection
@section('script')
{!!Html::script('js/comentarioC.js')!!}
@endsection
