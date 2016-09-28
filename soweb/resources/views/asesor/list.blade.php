<div class="table-responsive">
<table id="mytable" class="table table-striped  table-responsive  " >
  <thead >
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Estado</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Operaciones</th>
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
          <button id="edit" class='btn btn-primary btn-circle glyphicon glyphicon-pencil' onClick="Mostrar({{$asesor->idAsesor}});" data-toggle='modal' data-target='#myModal'></button>
          @if(Auth::user()->tipoUser == 'admin')
            <button class='btn btn-danger btn-circle glyphicon glyphicon-remove' onClick="Eliminar('{{$asesor->idAsesor}}','{{$asesor->nombre}}');"></button>
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
});
</script>
