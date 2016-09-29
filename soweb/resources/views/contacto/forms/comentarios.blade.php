{!!Form::open(['route'=>'comentario.store','method'=>'POST','class'=>"form"])!!}
<input type="hidden" name="idContacto" id="idContacto">
<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
<div class="form-group">
  {!!Form::text('comentario',null,['class'=>'form-control', 'id'=>'comentar'])!!}
</div>
 <button type="submit" id="grabar" class="btn btn-success" name="agregar">Guardar Comentario</button>
 <input type="hidden" name="idUser" id="idUs" value="{!!Auth::user()->id!!}">
{!!Form::close()!!}
