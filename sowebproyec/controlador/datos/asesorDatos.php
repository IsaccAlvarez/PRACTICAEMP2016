<?php
include "conexion.php";

class asesorDatos{

    function consultaAsesor($email,$pass){

        $cnn = new conexion();
        $con = $cnn->conectar();
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $pass = mysqli_real_escape_string($con, $_POST["pass"]);
        $contra = sha1($pass);
        $sql = "SELECT emailEmpresa, clave FROM ASESORES WHERE emailEmpresa = '$email'";
        $consulta = mysqli_query($con,$sql);
              $fila = mysqli_fetch_array($consulta);
        if($fila["emailEmpresa"] != $email){
        {
             echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> La cuenta no existe</div>";

        }
        }else{
            if($fila["clave"] == $contra){
                return true;
            }else{
                echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> Correo o Clave de acceso incorrectos</div>";

            }
        }
    }
    function cambiarClave($email, $pass, $passNew, $pass2){
        if ($passNew == $pass2){
            $cnn = new conexion();
            $con = $cnn->conectar();
            $email = mysqli_real_escape_string($con, $email);
            $pass = mysqli_real_escape_string($con, $pass);
            $contraAct = sha1($pass);
            $passNueva = mysqli_real_escape_string($con, $passNew);
            $contraNueva = sha1($passNueva);

            $sql = "SELECT  * FROM ASESORES WHERE emailEmpresa = '$email'";
            $consulta = mysqli_query($con,$sql);
            $fila = mysqli_fetch_array($consulta);
            if($fila["emailEmpresa"] != $email){

                echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> La cuenta no existe</div>";
            }else{
                if($fila["clave"] == $contraAct){
                  $sql2 = "UPDATE Asesores SET clave = '{$contraNueva}' WHERE emailEmpresa = '$email'";
                  mysqli_query($con,$sql2);
                  return true;
                }else{
                       echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> Correo o Clave de acceso incorrectos</div>";

                }

            }
        }else{
            echo "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> Las Claves no coinciden</div>";
        }
      }
}
?>
