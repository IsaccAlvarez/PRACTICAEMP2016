<?php
include "conexion.php";

class asesorDatos{

    function consultaAsesor($email,$pass){

        $cnn = new conexion();
        $con = $cnn->conectar();
        $sql = "SELECT emailEmpresa, clave FROM asesores WHERE emailEmpresa = '$email ' AND clave ='$pass'";



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
