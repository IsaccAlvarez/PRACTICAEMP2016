
{!!Form::open(['id'=>'formCreate', 'method'=>'post', 'class'=>'form', 'role'=>'form'])!!}
  <div class="form-group">
   <label for="name">Nombre</label>
   <input type="text" name='name' id="name" class="form-control" placeholder="" aria-describedby="basic-addon1" autofocus>
 </div>
 <div class="form-group">
  <label for="email">Correo</label>
  <input type="text"  name="email" id="email" class="form-control" placeholder="" aria-describedby="basic-addon1">
 </div>
 <div class="form-group">
  <label for="tipoUser">Tipo de Usuario </label>
   <select class=" form-control" id="tUsers" name="tipoUser" aria-describedby="basic-addon1">
     <option value="admin">Administrador</option>
     <option value="normal">Normal</option>
   </select>
 </div>
 <div class="form-group">
  <label for="password">Clave</label>
  <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="basic-addon1">
</div>

<div class="form-group">
 <label for="password_confirmation">Confirmar Clave</label>
 <input type="password" name="password_confirmation" id="pas" class="form-control " placeholder="" aria-describedby="basic-addon1">
</div>
{!!Form::close()!!}
