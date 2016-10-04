<div class="table-responsive">
  <table id="myTable" class="table table-striped  table-responsive table-condensed table-hover ">
  <thead>
    <tr>
      <th> Nombre</th>
      <th> Correo</th>
       <th>Tipo de Usuario</th>
      <th>Operacion</th>
    </tr>
  </thead>

  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
       <td>{{$user->tipoUser}}</td>
      <td>
        <button id="edit" class='btn btn-primary btn-circle fa fa-pencil-square-o' onClick="Mostrar({{$user->id}});" data-toggle='modal' data-target='#myModalEditUser'></button>
        <button class='btn btn-danger glyphicon btn-circle glyphicon-remove' onClick="Eliminar('{{$user->id}}','{{$user->name}}');"></button>
      </td>
    </tr>
  @endforeach
  </tbody>

  </table>
</div>

<script type="text/javascript">
$("#myTable").DataTable({
 responsive: true,
});
</script>
