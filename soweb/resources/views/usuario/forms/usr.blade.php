<div class="form-group col-sm-6 form">

  <div class="input-group">
   <span class="input-group-addon" id="basic-addon1">Nombre </span>
   <input type="text" name='name' class="form-control" placeholder="" aria-describedby="basic-addon1">
 </div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Correo</span>
  <input type="text"  name="email" class="form-control" placeholder="" aria-describedby="basic-addon1">
 </div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Tipo de Usuario:</span>
   <select class=" form-control" name="tipoUser" aria-describedby="basic-addon1">
     <option value="admin">Administrador</option>
     <option value="normal">Normal</option>
   </select>
 </div>
 <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Clave  </span>
  <input type="password" name="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="input-group">
 <span class="input-group-addon" id="basic-addon1">Confirmar Clave</span>
 <input type="password" name="password_confirmation" class="form-control" placeholder="" aria-describedby="basic-addon1">
</div>

    <div class="form-group btn-group-horizontal">
      {!!Form::submit('Registrar',['class'=>'btn-primary'])!!}
    </div>
  {!!Form::close()!!}
</div>
