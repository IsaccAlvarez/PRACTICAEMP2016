@extends('layouts.admin')
@section('title','Home')
{!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
{!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')
  @include('alerts.request')
  @include('alerts.errors')
         <div class="panel panel-success">
           <div class="panel-heading">
           <b>Solicitudes Pendientes</b>
            </div>
          </div>
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
@endsection
@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  <script type="text/javascript">
  $("#myTable").DataTable({
   responsive: true,
  });
  </script>
@endsection
