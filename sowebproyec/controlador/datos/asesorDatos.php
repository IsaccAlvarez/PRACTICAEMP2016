<?php
include "conexion.php";

class asesorDatos{

    function consultaAsesor($email,$pass){

        $cnn = new conexion();
        $con = $cnn->conectar();
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $pass = mysqli_real_escape_string($con, $_POST["pass"]);
        $sql = "SELECT emailEmpresa, clave FROM ASESORES WHERE emailEmpresa = '$email' AND clave = '$pass'";
        $consulta = mysqli_query($con,$sql);
              $fila = mysqli_fetch_array($consulta);
        if($fila>0){
        {
           return true;
        }
        }else{
            return false;
        }
    }
}
?>
