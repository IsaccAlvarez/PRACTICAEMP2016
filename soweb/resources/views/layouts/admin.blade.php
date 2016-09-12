<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimum-scale=1.0">
    <title></title>
    {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-theme.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
     {!!Html::style('css/tablaSolicitud.css')!!}

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
          <ul class="nav navbar-nav">
              <li class="navbar-left">
              @if(Auth::user()->tipoUser == 'admin')
              <li><a href="{!!URL::to('/usuario/create')!!}"> Usuarios</a></li>
              @endif
              <li><a href="{!!URL::to('')!!}">Contactos</a></li>
              <li><a href="{!!URL::to('/asesor')!!}">Asesores</a></li>
              <li><a href="file.html">Panel Control</a></li>
              <li><a href="file.html">Solicitud</a></li>
              @if(Auth::user()->tipoUser == 'admin')
              <li><a href="{!!URL::to('admin')!!}">Informes</a></li>
              <li><a href="{!!URL::to('admin')!!}">Metricas</a></li>
              <li><a href="{!!URL::to('admin')!!}">Graficos</a></li>
              @endif
            </li>
          </ul>
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
      </nav>
     @yield('content')

</div>


{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}
{!!Html::script('js/formCreate.js')!!}

</body>

</html>
