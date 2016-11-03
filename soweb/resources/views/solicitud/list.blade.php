
 <div class="center">
   <select name="choice" id="choice">
     <option value='1'>Mostrar Todo</option>
      <option value='2'>No Ver Cerradas</option>
    </select>
    <br>
 </div>
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
        <th></th>
      </tr>
    </thead>
      <tbody id="datos">
     @foreach ($solicitudes as $solicitud)
       <tr>
         <td><a href="/comentarioDeSolicitud/{{$solicitud->idSolicitud}}">{{$solicitud->idSolicitud}}</a></td>
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

$(document).ready(function() {
  var table = $("#myTables").DataTable({
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

  $("#choice").on("change",function(){

   var _val = $(this).val();

   if(_val == 2){
          table
          .columns(3)
          .search('^(?:(?!cerrada).)*$\r?\n?', true, false)
          .draw();
    }else{
          table
          .columns()
          .search('')
          .draw();
    }
  })
});
</script>
