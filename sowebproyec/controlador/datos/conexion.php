<?php

class conexion{
	function conectar(){
		return mysqli_connect("localhost","seesoftc_root","12345","seesoftc_soweb");
	}
}

?>
