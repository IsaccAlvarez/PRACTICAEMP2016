
  <form class="form" role="form">
    <div class="form-group">
       <label for="nombre">Nombre Completo</label>
       <input type="text" class="form-control" name="nombre" id="nomb" autofocus>
    </div>
    <div class="form-group">
        <label for="iniciales">Iniciales</label>
        <input type="text" class="form-control" name="iniciales" id="ini">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono" id="telef" data-mask="(999) 9999-9999" data-mask-selectonfocus="true">
    </div>
    <div class="form-group">
        <label for="emailPersonal">Correo Personal</label>
        <input type="email" class="form-control" name="emailPersonal" id="correoP">
    </div>
    <div class="form-group">
      <label for="emailEmpresa">Correo de Empresa</label>
      <input type="email" class="form-control" name="emailEmpresa" id="correoE">
    </div>
    <div class="form-group">
     <label for="estado">Estado</label>
     <select class=" form-control" name="estado" aria-describedby="basic-addon1" id="estado">
         <option value="activo">Activo</option>
         <option value="inactivo">Inactivo</option>
       </select>
    </div>
      <div class="form-group">
        <label for="fechaIngreso">Fecha de Entrada a la Empresa</label>
        <input type="date"  class="form-control" id="fechaI" name="fechaIngreso">
       </div>
    <div class="form-group">
      <input type="hidden" name="userUltimaModificacion" id="iaum" value="{!!Auth::user()->name!!}">
    </div>
  </form>
