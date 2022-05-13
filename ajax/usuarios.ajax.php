<?php 

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

// EDIAR USUARIOS

	public $idUsuario;

	public function AjaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_decode($respuesta);

	}



}


// EDIAR USUARIOS

if(isset($_POST["idUsuario"])){ 



}

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> AjaxEditarUsuario();