@extends('layouts.admin')
@section('title','Contactos')
  @section('content')
    <div id="message-coment" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
            <strong> La información de guardó correctamente.</strong>
    </div>
    <div class="panel panel-info">
      <div class="panel-heading"><b>Contacto: {{$contactos->idContacto}}</b> 
      <div class="navbar-btn pull-right">
        <a id="enviar" class = 'btn btn-success navbar-btn fa fa-chevron-left' style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" href="{!!URL::to('/contacto')!!}"> Volver</a>
       <button id="crear" type="button" class=" btn btn-warning navbar-btn fa fa-comment" style="margin-botton: 1px;margin-top: -5px;margin-rigth: 8px;padding: 3px 20px;" name="nuevo" data-toggle='modal' data-target='#myModalComent'> Comentario</button>
      </div>
      </div>
      <div class="panel-body">
        <div class="col-md-3">
          <p>Nombre: {{$contactos->nombre}} </p>
        </div>
        <div class="col-md-2">
          <p>Es empresa:<?php
          $var;
          if($contactos->esEmpresa == 1) {
            $var = 'Si';
          } else {
            $var = 'No';
          }?> {{$var}} </p>
        </div>
         <div class="col-md-3">
           <p>Nombre Juridico: {{$contactos->nombreJuridico}}</p>
         </div>
         <div class="col-md-3">
           <p>Representante: {{$contactos->nombreRepresentante}}</p>
         </div>
         <div class="col-md-2">
           <p>Teléfono: {{$contactos->telefono}}</p>
         </div>
         <div class="col-md-4">
           <p>Correo: {{$contactos->email}}</p>
         </div>
         <div class="col-md-4">
           <p>Dirección: {{$contactos->direccion}}</p>
         </div>
         <div class="col-md-4" style="font-size: 7pt;">
           <p>Creado por: </P>
           <p>Fecha de Creación: {{$contactos->created_at->format('d/m/Y')}}</p>
           <p>Ultima Modificacion: {{$contactos->updated_at->format('d/m/Y h:i  A')}}</p>
           <p>Modificado por:</p>
         </div>
      </div>

      </div>
      <div id="comentarios" class="">
        <ul class="list-group" style="font-size: 10pt;">
                @foreach ($comentarios as $comentarios)
                  <li class="list-group-item">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        {{$comentarios->user}} {{$comentarios->created_at->format('d/m/Y  h:i:s A')}}
                      </div>
                      <div class="panel-body">
                          {{ $comentarios->comentario }}
                      </div>
                    </div>
                  </li>
                @endforeach
           </ul>

      </div>
      @section('modal')
        @include('contacto.modalComent')
      @endsection

  @endsection
@section('script')
{!!Html::script('js/comentarioC.js')!!}
@endsection
