<div id="listP" class="table-responsive">
  <table id="myTable" class="table table-striped table-responsive" >
    <thead>
      <tr>
        <th>#</th>
        <th>Contacto</th>
        <th>Titulo</th>
        <th>Estado</th>
        <th>Asignado a</th>
        <th>Fecha</th>
        <th></th>
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
         <td>{{$solicitud->fecha}}</td>
         <td>
           <button id="edit"  class='btn btn-primary btn-circle fa fa-pencil-square-o' onClick="mostrarS({{$solicitud->idSolicitud}});" data-toggle='modal' data-target='#myModalEdit'></button>
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
