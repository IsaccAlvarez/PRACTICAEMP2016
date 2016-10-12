{!!Form::open(['class'=>'form'])!!}
<div class="form-group">
  {!!Form::label('searchNombre', 'Contacto')!!}
  {!!Form::text('searchNombre',null,['class'=>'typeahead form-control', 'id'=>'searchName','data-provide'=>'typeahead'])!!}
  <input type="hidden" name="idContacto" id="idContct">
</div>
<div class="form-group">
  {!!Form::label('tituloSolicitud', 'Titulo Solicitud')!!}
  {!!Form::text('tituloSolicitud',null,['class'=>'form-control', 'id'=>'tSoli'])!!}
</div>
<div class="form-group">
  {!!Form::label('asesor', 'Asignado A')!!}
  {!!Form::text('asesor',null,['class'=>'asesores form-control','id'=>'ases','data-provide'=>'typeahead'])!!}
  {!!Form::hidden('idAsesor',null,['class'=>'form-control','id'=>'idAses'])!!}
</div>
<div class="form-group">
  {!!Form::label('personaContacto', 'Persona Contacto')!!}
  {!!Form::text('personaContacto',null,['class'=>'form-control', 'id'=>'pCont', 'disabled'])!!}
</div>
<div class="form-group">
  {!!Form::label('descripcion', 'Descripcion')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control', 'id'=>'descr','size'=>'10x3'])!!}
</div>
<div class="form-group">
  {!!Form::label('fecha', 'Fecha de Solicitud')!!}
  {!!Form::date('fecha',null,['class'=>'form-control', 'id'=>'fech'])!!}
</div>
<div class="form-group">
  {!!Form::select('tipoSolicitud',[
    'bug'=>'BUG',
    'cambio'=>'Cambio',
    'soporte'=>'Soporte',
    'ventas'=>'Ventas'],null, ['class'=>'form-control','placeholder' => 'Tipo de Solicitud:','id'=>'tipoSolic'])!!}
</div>
<div class="form-group">
  {!!Form::select('estado',[
    'nuevo'=>'Nuevo',
    'activa'=>'Activa',
    'cerrada'=>'Cerrada'],null,['class'=>'form-control','placeholder' => 'Estado:','id'=>'estd'])!!}
</div>
<div class="form-group">
  {!!Form::label('precioCotizacion', 'Precio de Cotización')!!}
  {!!Form::text('precioCotizacion',null,['class'=>'form-control', 'id'=>'prCoti','placeholder'=>'₡ 0,00'])!!}
</div>
<div class="form-group">
  {!!Form::label('precioCobrado', 'Precio Cobrado')!!}
  {!!Form::text('precioCobrado',null,['class'=>'form-control', 'id'=>'pCobr','placeholder'=>'₡ 0,00'])!!}
</div>
<input type="hidden" name="idUser" id="iac" value="{!!Auth::user()->id!!}">
<input type="hidden" name="userUltimaModificacion" id="iaumd" value="{!!Auth::user()->name!!}">
{!!Form::close()!!}
