<?php
include('datos/asesorDatos.php');

 class asesor{
	public $id;
	function POST_id(){
		return $this->id;
	}
	function set_id($id){
		$this->id = $id;
	}
	public $email;
	function POST_email(){
		return $this->email;
	}
	function set_email($email){
		$this->email = $email;
	}
	public $clave;
	function POST_clave(){
		return $this->clave;
	}
	function set_clave($clave){
		$this->clave = $clave;
	}
  function Validar($email,$pass){
//Hacer todas las validaciones
    $obj = new asesorDatos();
    return $obj->consultaAsesor($email,$pass);
  }
 }


?>
