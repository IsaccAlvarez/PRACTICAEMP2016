

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/icono.ico" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambio de clave</title>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet ' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <script src='../libs/jquery-3.1.0.min.js'></script>
    <script src="../libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../libs/alertifyjs/alertify.min.js"></script>
    <script type="text/javascript" src="../js/validarCambClave.js"></script>


    <link rel="stylesheet" href='../libs/bootstrap-3.3.7-dist/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/styleCambioClave.css">
    <link rel="stylesheet" href="../libs/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" href="../libs/alertifyjs/css/themes/default.min.css">
    <link rel="stylesheet" href="../libs/alertifyjs/css/themes/semantic.min.css">
    <link rel="stylesheet" href="../libs/alertifyjs/css/themes/bootstrap.min.css">



</head>
<body>

        <div class="form">
                <form class="formCambioClave" id="formCambioClave" action="../controlador/seguridadCambClave.php" method="post" >
                    <legend>Cambio de Clave</legend>
                    <!--<div class="form-group">-->
                    <label for="email">Correo: </label>
                     <input value='' id="email" name="email"  type="email"  class="form-control" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"
                            title="email@example.com" required autofocus oninvalid="setCustomValidity('Campos vacíos')"
                            oninput="setCustomValidity('')" />
                 <!--</div>-->
                    <!--<div class="form-group">-->
                       <label for="claveAct">Clave Actual: </label>
                       <input id="claveAct" value='' name="claveAct" type="password" class="form-control"required  oninvalid="setCustomValidity('Campos vacíos')"
                              oninput="setCustomValidity('')" />
                    <!--</div>-->
                    <!--<div class="form-group">-->
                       <label for="passNew">Nueva Clave: </label>
                       <input id="passNew" value='' type="password" name="passNew" class="form-control" required  oninvalid="setCustomValidity('Campos vacíos')"
                              oninput="setCustomValidity('')"/>
                   <!-- </div>-->
                    <!--<div class="form-group">-->
                       <label for="pass2">Confirmar Nueva Clave: </label>
                       <input id="pass2" value=''  type="password" name="pass2" class="form-control" required  oninvalid="setCustomValidity('Debes Confirmar la nueva clave')"
                              oninput="setCustomValidity('')"/>
                    <!--</div>-->
                    <div class="form-group botones ">
                       <input id="guardar" type="submit" class="btn btn-success btn-login-submit boton " value="Guardar"  />
                       <button id="cancelar" class="btn btn-danger btn-cancel-action boton2 " onclick="return btnCancelar()">Cancelar</button>
                   </div>
               </form>
            <div class="container" id="resultado" >

            </div>
        </div>

</body>
</html>
