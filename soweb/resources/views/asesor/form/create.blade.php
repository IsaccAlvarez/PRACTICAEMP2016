<div class="container">
  <form class="form-horizontal" role="form">
    <div class="form-group">

       <label for="nomb" class="col-sm-2 control-label">Nombre Completo</label>
       <div class="col-sm-3">
         <input type="text" class="form-control col-sm-2" name="nombre" id="nombe" autofocus>
       </div>
    </div>
    <div class="form-group">
        <label for="ini" class="col-sm-2 control-label">Iniciales</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="iniciales" id="inic">
        </div>

    </div>
    <div class="form-group">
        <label for="telef" class="col-sm-2 control-label">Telefono</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" name="telefono" id="telefe">
        </div>
    </div>
    <div class="form-group">
        <label for="correoP" class="col-sm-2 control-label">Correo Personal</label>
        <div class="col-sm-3">
          <input type="email" class="form-control" name="emailPersonal" id="correoPe">
        </div>
    </div>
    <div class="form-group">
      <label for="correoE" class="col-sm-2 control-label">Correo de Empresa</label>
      <div class="col-sm-3">
        <input type="email" class="form-control" name="emailEmpresa" id="correoEm">
      </div>
    </div>
    <div class="form-group">
     <label for="estado" class="col-sm-2 control-label">Estado</label>
     <div class="col-sm-3">
       <select class=" form-control" name="estado" aria-describedby="basic-addon1" id="estad">
         <option value="activo">Activo</option>
         <option value="inactivo">Inactivo</option>
       </select>
     </div>
   </div>
      <div class="form-group ">

        <label for="fechaI" class="col-sm-2 control-label">Fecha de Entrada a la Empresa</label>
        <div class="col-sm-3 ">
          <input type="date"  class="form-control col-sm-4 " id="fechaIn" value"" name="fechaIngreso">
        </div>
       </div>
       <div class="form-group">
         <input type="hidden" name="idUser" id="iU" value="{!!Auth::user()->id!!}">
       </div>
    <div class="form-group">
      <input type="hidden" name="idUserUltimaModificacion" id="iaumd" value="{!!Auth::user()->id!!}">
    </div>
  </form>

</div>
