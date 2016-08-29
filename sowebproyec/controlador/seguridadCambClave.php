<?php


include "asesor.php";



    if(isset($_POST["email"]) || isset($_POST["claveAct"]) || isset($_POST["passNew"]) || isset($_POST["pass2"])){
        if(trim($_POST["email"]) == "" || trim($_POST["claveAct"]) == "" || trim($_POST["passNew"]) == "" || trim($_POST["pass2"])== ''){

            echo "false";
        }else{

            $asesorCon = new asesor();

            if($asesorCon->validarCambioClave($_POST["email"],$_POST["claveAct"],$_POST["passNew"],$_POST["pass2"])){

                echo "true";
            }else{
                //echo "false";
            }
        }
    }else{
        echo "false";
    }





?>