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
         <td>{{$contacto->nombre}}</td>
         <td>{{$contacto->telefono}}</td>
         <td>{{$contacto->email}}</td>
         <td>{{$contacto->tipoContacto}}</td>
         <td>
           <button id="edit" class='btn btn-primary btn-circle glyphicon glyphicon-pencil' onClick="Mostrar({{$contacto->idContacto}});" data-toggle='modal' data-target='#myModal'></button>
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
});
</script>
