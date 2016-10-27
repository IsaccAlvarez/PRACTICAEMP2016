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
 language: {
        processing:     "Procesando...",
        search:         "Buscar",
        lengthMenu:     "Mostrar _MENU_ registros",
        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No se encontraron resultados",
        emptyTable:     "Ningún dato disponible en esta tabla",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Ultimo"
        },
        aria: {
            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
});
</script>
