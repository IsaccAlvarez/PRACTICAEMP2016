<div class="container">

<div class="input-group col-sm-3">
   <span class="input-group-addon col-sm-3" id="basic-addon1">Nombre </span>
   <input type="text" class="form-control col-sm-2" name="nombre" id="nomb">
</div>
<div class="input-group col-sm-3">
    <span class="input-group-addon col-sm-3">Iniciales</span>
    <input type="text" class="form-control" name="iniciales" id="ini">
</div>
<div class="input-group col-sm-3">
    <span class="input-group-addon col-sm-3">Telefono</span>
    <input type="text" class="form-control" name="telefono" id="telef">
</div>

<div class="input-group col-sm-6">
    <span class="input-group-addon col-sm-3">Correo Personal</span>
    <input type="email" class="form-control" name="correoPersonal" id="correoP">
</div>
<div class="input-group col-sm-6">
  <span class="input-group-addon col-sm-3">Correo de Empresa</span>
  <input type="email" class="form-control" name="emailEmpresa" id="correoE">
</div>
<div class="input-group input-horizontal col-sm-3">
 <span class="input-group-addon col-sm-3" id="basic-addon1">Estado </span>
  <select class=" form-control" name="estado" aria-describedby="basic-addon1">
    <option value="activo">Activo</option>
    <option value="inactivo">Inactivo</option>
  </select>
</div>
  <div class="input-group col-sm-3">
    <span class="input-group-addon col-sm-3">Fecha de Entrada a la Empresa</span>
    <input type="date"  class="form-control" id="fechaI" name="fechaIngreso" value="<?php echo date(DATE_ATOM);?>">
  </div>
<div class="">
  <?php $time = time();
  $fecha = date("d-m-Y (H:i:s)", $time); ?>
  <input type="hidden" name="fechaCreacion" value="<?php $fecha ?>">
  <input type="hidden" name="fechaUltimaModificacion" value="<?php $fecha ?>">
  <input type="hidden" name="idAsesorUltimaModificacion" value="{!!Auth::user()->id!!}">
</div>
<div class="input-group col-sm-3 btn btn-group-horizontal">
{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
{!!Form::button('Cancelar',['class'=>'btn btn-danger'])!!}
</div>

</div>
