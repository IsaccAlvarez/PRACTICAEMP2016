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
        <button class='btn btn-danger btn-circle fa fa-trash-o' onClick="Eliminar('{{$user->id}}','{{$user->name}}');"></button>
      </td>
    </tr>
  @endforeach
  </tbody>

  </table>
</div>

<script type="text/javascript">
$("#myTable").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
      }
});
</script>
