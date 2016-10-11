{!!Form::open(['class'=>'form'])!!}
<div class="form-group">
  {!!Form::label('searchNombre', 'Contacto')!!}
  {!!Form::text('searchNombre',null,['class'=>'typeaheadEdit form-control', 'id'=>'search','data-provide'=>'typeahead'])!!}
  <input type="hidden" name="idContacto" id="idContac">
</div>
<div class="form-group">
  {!!Form::label('tituloSolicitud', 'Titulo Solicitud')!!}
  {!!Form::text('tituloSolicitud',null,['class'=>'form-control', 'id'=>'titSoli'])!!}
</div>
<div class="form-group">
  {!!Form::label('asesor', 'Asignado A')!!}
  {!!Form::text('asesor',null,['class'=>'asesoresEdit form-control','id'=>'aseso','data-provide'=>'typeahead'])!!}
  {!!Form::hidden('idAsesor',null,['class'=>'form-control','id'=>'idAsesor'])!!}
</div>
<div class="form-group">
  {!!Form::label('personaContacto', 'Persona Contacto')!!}
  {!!Form::text('personaContacto',null,['class'=>'form-control', 'id'=>'perCont'])!!}
</div>
<div class="form-group">
  {!!Form::label('descripcion', 'Descripcion')!!}
  {!!Form::textarea('descripcion',null,['class'=>'form-control', 'id'=>'descripc','size'=>'10x3'])!!}
</div>
<div class="form-group">
  {!!Form::label('fecha', 'Fecha de Solicitud')!!}
  {!!Form::date('fecha',null,['class'=>'form-control', 'id'=>'fecha'])!!}
</div>
<div class="form-group">
  {!!Form::select('tipoSolicitud',[
    'bug'=>'BUG',
    'cambio'=>'Cambio',
    'soporte'=>'Soporte',
    'ventas'=>'Ventas'],null, ['class'=>'form-control','placeholder' => 'Tipo de Solicitud:','id'=>'tipSolicit'])!!}
</div>
<div class="form-group">
  {!!Form::select('estado',[
    'nuevo'=>'Nuevo',
    'activa'=>'Activa',
    'cerrada'=>'Cerrada'],null,['class'=>'form-control','placeholder' => 'Estado:','id'=>'estad'])!!}
</div>
<div class="form-group">
  {!!Form::label('precioCotizacion', 'Precio de Cotización')!!}
  {!!Form::text('precioCotizacion',null,['class'=>'form-control', 'id'=>'preCoti','placeholder'=>'₡ 0,00'])!!}
</div>
<div class="form-group">
  {!!Form::label('precioCobrado', 'Precio Cobrado')!!}
  {!!Form::text('precioCobrado',null,['class'=>'form-control', 'id'=>'prCobr','placeholder'=>'₡ 0,00'])!!}
</div>

<input type="hidden" name="userUltimaModificacion" id="iumd" value="{!!Auth::user()->name!!}">
{!!Form::close()!!}
