
  {!!Form::open(['role'=>'form', 'class'=>'form' ])!!}
  <div class="form-group">
    {!!Form::label('nombre','Nombre')!!}
    {!!Form::text('nombre',null,['class'=>'form-control','id'=>'nomb'])!!}
  </div>
  <div class="form-group">
    <label>Es Empresa</label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpres" id="esEmpr"  value="si">Si
      </label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpres" id="esEmpr"   value="no" checked>No
      </label>
  </div>
  <div  class="form-group">
     {!!Form::label('nombreJuridico','Nombre Juridico')!!}
     {!!Form::text('nombreJuridico',null,['class'=>'form-control','id'=>'nombJuri'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('nombreRepresentante','Nombre de Representante')!!}
    {!!Form::text('nombreRepresentante',null,['class'=>'form-control','id'=>'nomRepres'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('telefono','Teléfono')!!}
    {!!Form::text('telefono',null,['class'=>'form-control','id'=>'telefe'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('email','Correo')!!}
    {!!Form::email('email',null,['class'=>'form-control','id'=>'email'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('direccion','Dirección')!!}
    {!!Form::textarea('direccion',null,['class'=>'form-control', 'size'=>'10x3','id'=>'direcc'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('telCobro','Teléfono Cobro')!!}
    {!!Form::text('telCobro',null,['class'=>'form-control', 'id'=>'teCobr'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('emailCobro','Correo Cobro')!!}
    {!!Form::email('emailCobro',null,['class'=>'form-control', 'id'=>'correoC'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('personaCobra','Persona cobra')!!}
    {!!Form::text('personaCobra',null,['class'=>'form-control','id'=>'persCobr'])!!}
  </div>
  <div class="form-group">
    {!!Form::select('tipoContacto',[
      'prospecto'=>'Prospecto',
      'cliente'=>'Cliente',
      'lista negra'=>'Lista Negra',
      'proveedor'=>'Proveedor',
      'conocido'=>'Conocido',
      'otros'=>'Otros'],null, ['class'=>'form-control','placeholder' => 'Tipo de Contacto:','id'=>'tipoC'])!!}
  </div>
  <div class="form-group">
    {!!Form::select('estado',[
      'activo'=>'Activo',
      'inactivo'=>'Inactivo'
    ],null,['class'=>'form-control','placeholder' => 'Estado:','id'=>'est'])!!}
  </div>
  <div class="form-group">
    <button type="button" name="comentarios" class="btn btn-info">Comentarios <span class="badge">0</span></button>
  </div>

  <input type="hidden" name="idAsesorUltimaModificacion" id="iaum" value="{!!Auth::user()->id!!}">
  {!!Form::close()!!}
