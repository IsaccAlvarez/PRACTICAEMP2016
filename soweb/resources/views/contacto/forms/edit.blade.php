
  {!!Form::open(['role'=>'form', 'class'=>'form','name'=>'fEdit' ])!!}
  <div class="form-group">
    {!!Form::label('nombre','Nombre Completo')!!}
    {!!Form::text('nombre',null,['class'=>'form-control','id'=>'nomb'])!!}
  </div>
  <div  class="form-group" >
    <label>Es Empresa</label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpres" id="esEmpr1" value="0" >No
      </label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpres" id="esEmpr2" value="1" >Si
      </label>
  </div>
  <div id="radio" class="form-group" style="display: none;">
     {!!Form::label('nombreJuridico','Nombre Juridico')!!}
     {!!Form::text('nombreJuridico',null,['class'=>'form-control','id'=>'nombJuri'])!!}
  </div>
  <div id="rad" style="display: none;"class="form-group">
    {!!Form::label('nombreRepresentante','Nombre de Representante')!!}
    {!!Form::text('nombreRepresentante',null,['class'=>'form-control','id'=>'nomRepres'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('telefono','Teléfono')!!}
    {!!Form::text('telefono',null,['class'=>'form-control','id'=>'telefe'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('email','Correo')!!}
    {!!Form::text('email',null,['class'=>'form-control','id'=>'email'])!!}
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
    {!!Form::text('emailCobro',null,['class'=>'form-control', 'id'=>'correoC'])!!}
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
  <input type="hidden" name="userUltimaModificacion" id="iaum" value="{!!Auth::user()->name!!}">
  {!!Form::close()!!}
