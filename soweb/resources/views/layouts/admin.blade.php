<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    {{-- <link rel="shortcut icon" href="img/icono.ico" /> --}}
    <link src="img/icono.ico" type="image/x-icon" rel="shortcut icon" />
    <title>SoWeb::@yield('title')::</title>
     {!!Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
    {!!Html::style('js/jquery-alertable-master/jquery.alertable.css')!!}
    {!!Html::style('css/datepiker/css/bootstrap-datepicker3.min.css')!!}





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
                    <li><a href="{!!URL::to('/cambiarClave')!!}"><i class="fa fa-key"></i> Cambiar Clave</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{!!URL::to('/logout')!!}"><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesión</a>
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
                <li><a href="{!!URL::to('/solicitud')!!}" class="fa fa-list-alt"> Solicitud</a></li>
                @if(Auth::user()->tipoUser == 'admin')
                <li>
                  <a href="#" class="fa fa-file-text-o"> Informes<span class="fa arrow"></span></a>
                  <ul class="nav nav-second-level">
                      <li>
                        <a href="{!!URL::to('/lista')!!}" class="fa fa-list"> Listas</a>
                      </li>
                      <li>
                        <a href="{!!URL::to('/informe')!!}" class="fa fa-pie-chart"> Graficas</a>
                      </li>
                    </ul>
                </li>
                @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
      <div id="page-wrapper">
          @yield('content')
          <div class="footer">
            <footer>
              <p class="text-center">© <?php echo date('Y'); ?> SeeSoft-Costa Rica.</p>
            </footer>
          </div>
      </div>

      @section('modal')

      @show


</div>


{!!Html::script('js/jquery-3.1.0.min.js')!!}
{!!Html::script('//code.jquery.com/jquery-1.12.4.js')!!}
{!!Html::script('js/bootstrap.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}
{!!Html::script('js/jquery-alertable-master/jquery.alertable.js')!!}
{!!Html::script('js/datepiker/js/bootstrap-datepicker.min.js')!!}
{!!Html::script('js/datepiker/locales/bootstrap-datepicker.es.min.js')!!}


@section('script')

@show

</body>

</html>
