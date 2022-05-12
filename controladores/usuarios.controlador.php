<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["perfil"] = $respuesta["perfil"];
					$_SESSION["foto"] = $respuesta["foto"];

					echo '<script>

						window.location = "inicio";

					</script>';

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}

			}	

		}

	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		// echo 'Entrando a crear usuario';

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
		    	preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

				$tabla = "usuarios";
				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datos = array("nombre" => $_POST["nuevoNombre"],
					          "usuario" => $_POST["nuevoUsuario"],
					          "password" => $encriptar,
					          "perfil" => $_POST["nuevoPerfil"]);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
				



				if($respuesta == "ok"){

				echo '<script>
				swal({

					type: "success",
					title: "¡El usuario ha sido guardado correctamente '.$respuesta.'",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
							window.location = "usuarios";
						}

						});

						console.log('.$respuesta.');
				</script>';
					
				}else{
					echo '<script>
				swal({

					type: "success",
					title: "¡El usuario no se guardo '.$respuesta.'",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
							window.location = "usuarios";
						}

						});

						console.log('.$respuesta.');
				</script>';
				}

			}else{
				print($_POST["nuevoNombre"]);
				echo '<script>
				swal({

					type: "error",
					title: "¡El usuario no puede ir vacío o llevar caracteres especiales",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					closeOnConfirm: false

					}).then((result)=>{

						if(result.value){
							window.location = "usuarios";
						}

						});

						
				</script>';
				}

		}

	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta; 
	}
}


	


