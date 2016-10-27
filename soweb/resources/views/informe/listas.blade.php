@extends('layouts.admin')
@section('title','Informes')
  {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
  {!!Html::style('//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css')!!}
  {!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
@section('content')

      <div class="panel panel-primary">
        <div class="panel-heading">
          <b>INFORME POR TABLAS</b>
          <div class="  ">
            {!!Form::select('mostrar',[
              'tipoContacto'=>'Lista por tipo de Contactos',
              'pendientes'=>'Lista de Pendientes',
              'cobros'=>'Lista de Cobrados',
              'xFecha'=>'Cobrado por Fecha',
              'tiempoDeS'=>'Tiempo de Solucion en Días'
            ],null,['class'=>'form-control','id'=>'mostrarLista','placeholder'=>'Selecione'])!!}
          </div>

        </div>
        <div class="panel-body">
          <div class="col-md-3">
            <div class="panel panel-green">
              <div class="panel-heading">
                <i class="fa fa-users fa-5x"></i>
                <p class="text-right">

                    <b class="huge">{{$asesores}}</b> <br>

                  <i>Asesores</i>
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <i class="fa fa-users fa-5x"></i>
                <p class="text-right">

                    <b class="huge">{{$contactos}}</b> <br>

                  <i>Contactos</i>
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-red">
              <div class="panel-heading">
                <i class="fa fa-list-alt fa-5x"></i>
                <p class="text-right">

                    <b class="huge">{{$solicitud}}</b> <br>

                  <i>Solicitudes</i>
                </p>

              </div>
            </div>
          </div>

        </div>
      </div>

  <div id="tipoC" class="" style="Display:none;">
    <div class="panel panel-info">
      <div class="panel-heading"><b>Listado de Contactos por Tipo</b>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table id="Tables1" class="table table-responsive table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="text-center">Tipo</th>
                  <th class="text-center">Cantidad</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($tipoContact as $contact)
                <tr>
                    <td class="text-center">{{$contact->tipoContacto}}</td>
                    <td class="text-center">{{$contact->total}}</td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
  {{--primera tabla--}}

{{--segunda tabla--}}
<div id="penC" class="" style="Display:none;">
  <div class="panel panel-yellow">
    <div class="panel-heading"><b>Lista de pendientes por Contactos</b>
      </div>
      <div class="panel-body">
        <table id="Tables2" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Contacto</th>
              <th class="text-center">Pendientes</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pendienteC as $pendienteC)
            <tr>
              <td class="text-center">{{$pendienteC->nameC}}</td>
              <td class="text-center">{{$pendienteC->pen}}</td>
            </tr>
              @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
{{--tercera--}}
<div id="penA" class="" style="Display:none;">
  <div class="panel panel-yellow">
    <div class="panel-heading"><b>Lista de pendientes por Asesores</b>
      </div>
      <div class="panel-body">
        <table  id="Tables3" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Asesor</th>
              <th class="text-center">Pendientes</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pendienteA as $pendienteA)
              <tr>
                <td class="text-center">{{$pendienteA->nameA}}</td>
                <td class="text-center">{{$pendienteA->pend}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
{{--cuarta tabla--}}
<div id="cobraC" class="" style="display:none;">
  <div class="panel panel-info">
    <div class="panel-heading"><b>Total Cobrado por Contactos</b>
      </div>
      <div class="panel-body">
        <table  id="Tables4" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Contacto</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cobradoC as $cobradoC)
              <tr>
                <td class="text-center">{{$cobradoC->nameC}}</td>
                <td class="text-center">{{$cobradoC->TotalC}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
{{--quinta--}}
<div id="cobraD" class="" style="Display:none;">
  <div class="panel panel-info">
    <div class="panel-heading"><b>Total Cobrado por Asesores</b>
      </div>
      <div class="panel-body">
        <table id="Tables5" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Asesor</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($cobradoA as $cobradoA)
              <tr>
                <td class="text-center">{{$cobradoA->nameA}}</td>
                <td class="text-center">{{$cobradoA->TotalA}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
{{--sexta --}}
<div id="cobraF" class="" style="Display:none;">
  <div class="panel panel-info">
    <div class="panel-heading"><b>Total Cobrado por Fechas</b>
      <div  class="row" >
      <div class="col-md-6">
       Desde:  <input type="text" class="datepicker" name="fecha1" id='fecha1' value="{{$fecha1}}"  data-provide="datepicker">
            <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">
      </div>

      <div class="col-md-6">
           Hasta:  <input type="text" class="datepicker2" name="fecha2" id='fecha2' value="{{$fecha2}}" data-provide="datepicker">
      </div>
      </div>
      </div>
      <div class="panel-body">
        <table id="Tables6" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Fecha</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody id="datos">

          </tbody>
        </table>
      </div>
  </div>
</div>
{{--septima--}}
<div id="tiempSol" class="" style="Display:none;">
  <div class="panel panel-info">
    <div class="panel-heading"><b>Tiempo de Solucion en días de Solicitudes</b>
      </div>
      <div class="panel-body">
        <table id="Tables7" class="table table-responsive table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="text-center">Asesor</th>
              <th class="text-center">Tipo de Solicitud</th>
              <th class="text-center">Fecha de Creación</th>
              <th class="text-center">Fecha de Cierre</th>
              <th class="text-center">Total de Días</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($solucion as $s)
              <tr>
                <td class="text-center">{{$s->asesores->nombre}}</td>
                <td class="text-center">{{$s->tipoSolicitud}}</td>
                <td class="text-center">{{$s->created_at->format('d-m-Y h:m:s')}}</td>
                <td class="text-center"><?php echo date("d-m-Y h:m:s", strtotime($s->fechaCerrado));?></td>
                <td class="text-center">{{$s->dias}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
</div>
@endsection
@section('script')
  {!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
  {!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
  {!!Html::script('js/datepiker/js/bootstrap-datepicker.min.js')!!}
  {!!Html::script('js/datepiker/locales/bootstrap-datepicker.es.min.js')!!}

 {!!Html::script('js/informe.js')!!}
  <script type="text/javascript">



  </script>
@endsection
