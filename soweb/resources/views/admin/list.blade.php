<div id="listP" class="table-responsive">
  <table id="myTable" class="table table-striped table-responsive" >
    <thead>
      <tr>
        <th>Id</th>
        <th>Contacto</th>
        <th>Titulo</th>
        <th>Estado</th>
        <th>Asignado a</th>
        <th>Fecha</th>
      </tr>
    </thead>
      <tbody id="datos">
        @foreach($solicitud as $solicitud)
       <tr>
         <td>{{$solicitud->idSolicitud}}</td>
         <td>{{$solicitud->nameC}}</td>
         <td>{{$solicitud->tituloSolicitud}}</td>
         <td>{{$solicitud->estado}}</td>
         <td>{{$solicitud->nameA}}</td>
         <td><?php echo date("d-m-Y", strtotime($solicitud->fecha));?></td>
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
        emptyTable:     "No Tienes Solicitudes Pendientes",
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
