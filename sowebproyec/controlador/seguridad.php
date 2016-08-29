<?php

include "asesor.php";


if(isset($_POST["email"]) || isset($_POST["pass"])){
    if(trim($_POST["email"]) == "" || trim($_POST["pass"]) == ""){

        echo "false";
    }else{

         $asesorCon = new asesor();

        if($asesorCon->Validar($_POST["email"],$_POST["pass"])){
            session_start();
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["pass"] = $_POST["pass"];
            echo "true";
        }else{
            //echo "false";
        }
    }
}else{
    echo "false";
}





?>
