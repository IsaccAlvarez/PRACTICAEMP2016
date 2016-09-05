<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/bootstrap-theme.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}
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
            <a class="navbar-brand" href="index.html"> So<b>Web</b></a>
        </div>


        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {!!Auth::user()->name!!} <span class="glyphicon glyphicon-user" aria-hidden="true"></span>  <i class="glyphicon glyphicon-chevron-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Ajustes</a>
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
                    @if(Auth::user()->id == 1)
                    <li>
                        <a href="#"><i class="glyphicons glyphicons-group"></i> Usuario<span class="glyphicons-chevron-down"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/usuario/create')!!}"><i class='glyphicons glyphicons-plus'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/usuario')!!}"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-user"></i> Asesores<span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{!!URL::to('/asesor/create')!!}"><i class='glyphicon glyphicon-plus'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="{!!URL::to('/usuario')!!}"><i class='glyphicon glyphicon-th-list'></i> Asesores</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-film fa-fw"></i> Solicitudes<span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class='glyphicon glyphicon-plus'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="#"><i class='glyphicon glyphicon-th-list'></i> Solicitudes</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-child fa-fw"></i> Contactos<span class="glyphicon glyphicon-chevron-down"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#"><i class='glyphicon glyphicon-plus'></i> Agregar</a>
                            </li>
                            <li>
                                <a href="#"><i class='glyphicon glyphicon-th-list'></i> Contactos</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

    </nav>

    <div id="page-wrapper">
        @yield('content')
    </div>

</div>


{!!Html::script('js/jquery.min.js')!!}
{!!Html::script('js/bootstrap.min.js')!!}
{!!Html::script('js/metisMenu.min.js')!!}
{!!Html::script('js/sb-admin-2.js')!!}

</body>

</html>
