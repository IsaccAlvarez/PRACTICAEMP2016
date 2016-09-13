<div class="container">

<div class="input-group col-sm-3">
   <span class="input-group-addon col-sm-3" id="basic-addon1">Nombre </span>
   <input type="text" class="form-control col-sm-2" name="nombre" id="nomb" autofocus>
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
    <input type="email" class="form-control" name="emailPersonal" id="correoP">
</div>
<div class="input-group col-sm-6">
  <span class="input-group-addon col-sm-3">Correo de Empresa</span>
  <input type="email" class="form-control" name="emailEmpresa" id="correoE">
</div>
<div class="input-group input-horizontal col-sm-3">
 <span class="input-group-addon col-sm-3" id="basic-addon1">Estado </span>
  <select class=" form-control" name="estado" aria-describedby="basic-addon1" id="estado">
    <option value="activo">Activo</option>
    <option value="inactivo">Inactivo</option>
  </select>
</div>
  <div class="input-group col-sm-4 date">
    <span class="input-group-addon label-info col-sm-6">Fecha de Entrada a la Empresa</span>
    <input type="date"  class="form-control col-sm-4 " id="fechaI" name="fechaIngreso" value="<?php date("d-m-y");?>">
   </div>
  </div>
<div class="input-group">
  <input type="hidden" name="idAsesorUltimaModificacion" id="iaum" value="{!!Auth::user()->id!!}">
</div>
<div class="input-group col-sm-3 btn btn-group-horizontal">
{!!link_to('#', $title='Guardar', $attributes = ['id'=>'guardar', 'class'=>'btn btn-primary'], $secure = null)!!}
<button type="button" onclick="bntCancell()" class="btn btn-danger"  name="button">Cancelar</button>

</div>

</div>
