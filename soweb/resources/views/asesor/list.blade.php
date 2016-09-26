<div class="table-responsive">
<table class="table table-striped  table-responsive  " >
  <thead >
    <th>Id</th>
    <th>Nombre</th>
    <th>Estado</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Operaciones</th>
  </thead>
  @foreach($asesores as $asesor)
    {{--*/ @$nombre = str_replace(' ','&nbsp;', $asesor->nombre) /*--}}
    <tbody id="datos" class="buscar">
      <tr>
        <td>{{$asesor->idAsesor}}</td>
        <td>{{$asesor->nombre}}</td>
        <td>{{$asesor->estado}}</td>
        <td>{{$asesor->telefono}}</td>
        <td>{{$asesor->emailEmpresa}}</td>
        <td>
          <button id="edit" class='btn btn-primary glyphicon glyphicon-pencil' onClick="Mostrar({{$asesor->idAsesor}});" data-toggle='modal' data-target='#myModal'> Editar</button>
          @if(Auth::user()->tipoUser == 'admin')
            <button class='btn btn-danger glyphicon glyphicon-remove' onClick="Eliminar('{{$asesor->idAsesor}}','{{$asesor->nombre}}');"> Eliminar</button>
          @endif
        </td>
      </tr>
    </tbody>
  @endforeach
</table>
</div>
{{-- <div class="text-center">
  {!!$asesores->render()!!}
</div> --}}
