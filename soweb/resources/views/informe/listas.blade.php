@extends('layouts.admin')
@section('title','Informes')
  {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
  {!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}
  {!!Html::style('css/informe.css')!!}
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
                <i class="fa fa-user fa-5x"></i>
                <p class="text-right">

                    <b class="huge">{{$asesores}}</b> <br>

                  <i>Asesores con Pendientes</i>
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

                  <i>Contactos con Pendientes</i>
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

                  <i>Solicitudes Pendientes</i>
                </p>

              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="panel panel-yellow">
              <div class="panel-heading">
                <i class="fa fa-list-alt fa-5x"></i>
                <p class="text-right">

                    <b class="huge">{{$solicitudAct}}</b> <br>

                  <i>Solicitudes Activas</i>
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
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Tipo de Contacto</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                  <th>Correo</th>
                  <th>Tipo de Contacto</th>
                </tr>
              </tfoot>
              <tbody>
                  @foreach ($tipoContact as $contact)
                <tr>
                  <td>{{$contact->nombre}}</td>
                  <td>{{$contact->telefono}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->tipoContacto}}</td>
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
              <th class="text-left">Contacto</th>
              <th class="text-left">Asesor</th>
              <th class="text-left">Titulo</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($pendienteC as $pendienteC)
            <tr>
              <td class="text-left">{{$pendienteC->contactos->nombre}}</td>
              <td class="text-left">{{$pendienteC->asesores->nombre}}</td>
              <td class="text-left">{{$pendienteC->tituloSolicitud}}</td>
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
              <th class="text-left">Asesor</th>
              <th class="text-left">Contacto</th>
              <th class="text-left">Titulo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pendienteA as $pendienteA)
              <tr>
                <td class="text-left">{{$pendienteA->asesores->nombre}}</td>
                <td class="text-left">{{$pendienteA->contactos->nombre}}</td>
                <td class="text-left">{{$pendienteA->tituloSolicitud}}</td>
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
              <th class="text-left">Contacto</th>
              <th class="text-left">Cantidad</th>
              <th class="text-left">Tipo de Solicitud</th>
              <th class="text-left">Total</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="3" style="text-align:right">Total:</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($cobradoC as $cobradoC)
              <tr>
                <td class="text-left">{{$cobradoC->nameC}}</td>
                <td class="text-left">{{$cobradoC->tiposC}}</td>
                <td class="text-left">{{$cobradoC->tipoSolicitud}}</td>
                <td class="text-left">${{$cobradoC->TotalC}}</td>
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
              <th class="text-left">Asesor</th>
              <th class="text-left">Cantidad</th>
              <th class="text-left">Tipo de Solicitud</th>
              <th class="text-left">Total</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th colspan="3" style="text-align:right">Total:</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($cobradoA as $cobradoA)
              <tr>
                <td class="text-left">{{$cobradoA->nameA}}</td>
                <td class="text-left">{{$cobradoA->tiposA}}</td>
                <td class="text-left">{{$cobradoA->tipoSolicitud}}</td>
                <td class="text-left">${{$cobradoA->TotalA}}</td>
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
              <th>Titulo</th>
              <th>Contacto</th>
              <th>Asesor</th>
              <th>Tipo</th>
              <th>Creación</th>
              <th>Cierre</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($solucion as $s)
              <tr>
                <td>{{$s->tituloSolicitud}}</td>
                <td>{{$s->contactos->nombre}}</td>
                <td>{{$s->asesores->nombre}}</td>
                <td>{{$s->tipoSolicitud}}</td>
                <td>{{$s->created_at}}</td>
                <td>{{$s->fechaCerrado}}</td>
                <td>{{$s->dias}}</td>
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

@endsection
