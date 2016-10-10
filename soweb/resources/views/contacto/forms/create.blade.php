
  {!!Form::open(['role'=>'form', 'class'=>'form', 'name'=>'fContacto'])!!}
  <div class="form-group">
    {!!Form::label('nombre','Nombre Completo')!!}
    {!!Form::text('nombre',null,['class'=>'form-control', 'id'=>'nombr', 'autofocus'])!!}
  </div>
  <div class="form-group">
    <label>Es Empresa</label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpresas" id="esEmp" onclick="mostrasDiv()" value="0" checked="checked">No
      </label>
      <label class="radio-inline">
      <input type="radio"  name="esEmpresas" id="esEmp"  onclick="mostrasDiv()" value="1">Si
      </label>
  </div>
  <div id="nomJud" style="display:none;" class="form-group">
     {!!Form::label('nombreJuridico','Nombre Juridico')!!}
     {!!Form::text('nombreJuridico',null,['class'=>'form-control','id'=>'nomJurid'])!!}
  </div>
  <div id="nRep" style="display:none;" class="form-group">
    {!!Form::label('nombreRepresentante','Nombre de Representante')!!}
    {!!Form::text('nombreRepresentante',null,['class'=>'form-control','id'=>'nomRepre'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('telefono','Teléfono')!!}
    {!!Form::text('telefono',null,['class'=>'form-control','id'=>'telef'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('email','Correo')!!}
    {!!Form::email('email',null,['class'=>'form-control','id'=>'correo'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('direccion','Dirección')!!}
    {!!Form::textarea('direccion',null,['class'=>'form-control', 'size'=>'10x3','id'=>'direc'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('telCobro','Teléfono Cobro')!!}
    {!!Form::text('telCobro',null,['class'=>'form-control','id'=>'tCobro'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('emailCobro','Correo Cobro')!!}
    {!!Form::email('emailCobro',null,['class'=>'form-control','id'=>'eCobro'])!!}
  </div>
  <div class="form-group">
    {!!Form::label('personaCobra','Persona cobra')!!}
    {!!Form::text('personaCobra',null,['class'=>'form-control','id'=>'perCob'])!!}
  </div>
  <div class="form-group">
    {!!Form::select('tipoContacto',[
      'prospecto'=>'Prospecto',
      'cliente'=>'Cliente',
      'lista negra'=>'Lista Negra',
      'proveedor'=>'Proveedor',
      'conocido'=>'Conocido',
      'otros'=>'Otros'],null, ['class'=>'form-control','placeholder' => 'Tipo de Contacto:','id'=>'tCont'])!!}
  </div>
  <div class="form-group">
    {!!Form::select('estado',[
      'activo'=>'Activo',
      'inactivo'=>'Inactivo'
    ],null,['class'=>'form-control','placeholder' => 'Estado:','id'=>'estd'])!!}
  </div>
  <input type="hidden" name="idUser" id="iac" value="{!!Auth::user()->id!!}">
  <input type="hidden" name="userUltimaModificacion" id="iaumd" value="{!!Auth::user()->name!!}">
  {!!Form::close()!!}
