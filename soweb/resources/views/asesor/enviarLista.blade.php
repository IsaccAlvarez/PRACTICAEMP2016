@extends('layouts.admin')
@section('title','Enviar Lista')
@section('content')

{!!Form::open(['route'=>'mail.store', 'method'=>'POST', 'class'=>'form'])!!}


    <div class="form-group">
      <label for="correo" >Correo</label>
        <input type="text" class="form-control " name="correo" id="correo" autofocus>
      </div>
      <div class="form-group">
       <label for="asunto" >Asunto</label>
         <input type="text" class="form-control " name="Asunto" id="asunto" autofocus>
       </div>

    <div class="form-group">
        <label for="InfoAsesor">Informacion del Asesor</label>
          <textarea rows="4" cols="50" class="form-control" name="informacionAsesor" id="InfoAsesor"></textarea>
        </div>


    <div class="form-group">
      <input type="hidden" name="idAsesorUltimaModificacion" id="iaum" value="{!!Auth::user()->id!!}">
    </div>




{!!Form::close()!!}
@endsection
