<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="img/icono.ico" />
    <title>SoWeb::@yield('title')::</title>
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('css/tablaSolicitud.css')!!}
    {!!Html::style('js/jquery-alertable-master/jquery.alertable.css')!!}
    {!!Html::style('css/datepiker/css/bootstrap-datepicker3.css')!!}
    {!!Html::style('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css')!!}
    {!!Html::style('//cdn.datatables.net/responsive/2.1.0/css/responsive.dataTables.min.css')!!}

</head>

<body>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!!URL::to('/admin')!!}"><img src="/img/logotipo.png" alt=""></a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {!!Auth::user()->name!!}  <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <i class="glyphicon glyphicon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Ajustes</a>
                    </li>
                    <li><a href="{!!URL::to('/password')!!}"><i class="glyphicon glyphicon-refresh"></i> Cambiar Clave</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{!!URL::to('/logout')!!}"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="navbar-left">
                @if(Auth::user()->tipoUser == 'admin')
                <li><a href="{!!URL::to('/usuario')!!}" class="fa fa-user"> Usuarios</a></li>
                @endif
                <li><a href="{!!URL::to('/contacto')!!}" class="fa fa-users"> Contactos</a></li>
                <li><a href="{!!URL::to('/asesor')!!}" class="fa fa-users"> Asesores</a></li>
                <li><a href="file.html" class="fa fa-cogs"> Panel Control</a></li>
                <li><a href="file.html" class="fa fa-list-alt"> Solicitud</a></li>
                @if(Auth::user()->tipoUser == 'admin')
                <li><a href="{!!URL::to('admin')!!}" class="fa fa-file-text-o"> Informes</a></li>
                <li><a href="{!!URL::to('admin')!!}" class="fa fa-bar-chart"> Metricas</a></li>
                <li><a href="{!!URL::to('admin')!!}" class="fa fa-pie-chart"> Graficos</a></li>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div id="page-wrapper">
          @yield('content')

      </div>
      @section('modal')

      @show
</div>


{!!Html::script('js/jquery-3.1.0.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}
{!!Html::script('js/jquery-alertable-master/jquery.alertable.js')!!}
{!!Html::script('js/datepiker/js/bootstrap-datepicker.js')!!}
{!!Html::script('js/datepiker/locales/bootstrap-datepicker.es.min.js')!!}
{!!Html::script('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js')!!}
{!!Html::script('//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js')!!}
@section('script')

@show

</body>

</html>
