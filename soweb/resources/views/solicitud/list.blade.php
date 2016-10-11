<div  class="table-responsive">
  <table id="myTables" class="table table-striped table-responsive" >
    <thead>
      <tr>
        <th>id</th>
        <th>Contacto</th>
        <th>Titulo</th>
        <th>Estado</th>
        <th>Asignado A</th>
        <th>Fecha</th>
        <th>Operaciones</th>
      </tr>
    </thead>
      <tbody id="datos">
     @foreach ($solicitudes as $solicitud)
       <tr>
         <td><a href="#">{{$solicitud->idSolicitud}}</a></td>
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
$("#myTables").DataTable({
 responsive: true,
});
</script>
