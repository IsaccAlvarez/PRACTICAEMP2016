<div class="table-responsive">
<table id="mytable" class="table table-striped  table-responsive  " >
  <thead >
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th></th>
    </tr>
  </thead>
    <tbody id="datos" class="buscar">
      @foreach($asesores as $asesor)
      <tr>
        <td>{{$asesor->idAsesor}}</td>
        <td>{{$asesor->nombre}}</td>
        <td>{{$asesor->estado}}</td>
        <td>{{$asesor->telefono}}</td>
        <td>{{$asesor->emailEmpresa}}</td>
        <td>
          <button id="edit" class='btn btn-primary btn-circle fa fa-pencil-square-o' onClick="Mostrar({{$asesor->idAsesor}});" data-toggle='modal' data-target='#myModal'></button>
          @if(Auth::user()->tipoUser == 'admin')
            <button class='btn btn-danger btn-circle fa fa-trash-o' onClick="Eliminar('{{$asesor->idAsesor}}','{{$asesor->nombre}}');"></button>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
</table>
</div>
<script type="text/javascript">
$("#mytable").DataTable({
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
