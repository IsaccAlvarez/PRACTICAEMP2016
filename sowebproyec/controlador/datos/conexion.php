<?php

class conexion{
	function conectar(){
		return mysqli_connect("localhost","root","","soweb_seesoft");
	}
}

?>
