<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SoWeb</title>


    <link rel="stylesheet" href="css/reset.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
   <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
   <script src='libs/jquery-3.1.0.min.js'></script>
    <script src="libs/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/code.js"></script>

        <link rel="stylesheet" href="css/style.css">


  </head>

  <body>


<div class="container">
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>
  <form class="form-login" role="form" id="formLogin" method="post" action="controlador/seguridad.php">
    <input type="text" id='email' name='email'placeholder="Email"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="email@example.com" size="30" required autofocus >
    <input type="password" id='pass' name='pass' placeholder="Contraseña" required>
    <button type="submit" id="enviar">Iniciar Sesion</button>
    <p<a href="#">Cambiar Clave de Acceso</a></p>
  </form>
    <div class="container" id="resultado" style="background: #f10d0d">
  </div>
  </body>
</html>
