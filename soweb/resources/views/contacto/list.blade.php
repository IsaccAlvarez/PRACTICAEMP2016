<div  class="table-responsive">
  <table id="myTable" class="table table-striped table-responsive" >
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Tipo de Contacto</th>
        <th>Operaciones</th>
      </tr>
    </thead>
      <tbody id="datos">
        @foreach($contactos as $contacto)
       <tr>
         <td>{{$contacto->idContacto}}</td>
         <td><a href="/comentarioDeContacto/{{$contacto->idContacto}}">{{$contacto->nombre}}</a></td>
         <td>{{$contacto->telefono}}</td>
         <td>{{$contacto->email}}</td>
         <td>{{$contacto->tipoContacto}}</td>
         <td>
           {{-- <a href="/coment/{{$contacto->idContacto)}}"  class="btn btn-info  fa fa-folder-open"> Ver Ficha</a> --}}
           <button id="edit"  class='btn btn-primary btn-circle fa fa-pencil-square-o' onClick="Mostrar({{$contacto->idContacto}});" data-toggle='modal' data-target='#myModal'></button>
           <button class='btn btn-danger glyphicon btn-circle glyphicon-remove' onClick="Eliminar('{{$contacto->idContacto}}','{{$contacto->nombre}}');"></button>
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
