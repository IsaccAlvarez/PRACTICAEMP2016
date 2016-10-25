
  <form class="form" role="form">
    <div class="form-group">
       <label for="nombre">Nombre Completo</label>
         <input type="text" class="form-control" name="nombre" id="nombe" autofocus>
    </div>
    <div class="form-group">
        <label for="iniciales">Iniciales</label>
          <input type="text" class="form-control" name="iniciales" id="inic">
    </div>
    <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control" name="telefono" id="telefe" data-mask="(999) 9999-9999" data-mask-selectonfocus="true">
    </div>
    <div class="form-group">
        <label for="emailPersonal">Correo Personal</label>
        <input type="email" class="form-control" name="emailPersonal" id="correoPe">
    </div>
    <div class="form-group">
      <label for="emailEmpresa">Correo de Empresa</label>
      <input type="email" class="form-control" name="emailEmpresa" id="correoEm">
    </div>
    <div class="form-group">
     <label for="estado">Estado</label>
       <select class=" form-control" name="estado" aria-describedby="basic-addon1" id="estad">
         <option value="activo">Activo</option>
         <option value="inactivo">Inactivo</option>
       </select>
   </div>
      <div class="form-group ">
        <label for="fechaIngreso">Fecha de Entrada a la Empresa</label>
        <input type="date"  class="form-control col-sm-4 " id="fechaIn" value"" name="fechaIngreso">
        </div>
       </div>
       <div class="form-group">
         <input type="hidden" name="idUser" id="iU" value="{!!Auth::user()->id!!}">
       </div>
    <div class="form-group">
      <input type="hidden" name="userUltimaModificacion" id="iaumd" value="{!!Auth::user()->name!!}">
    </div>
  </form>
