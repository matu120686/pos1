<?php
session_start();

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {
				$encriptar = crypt($_POST['ingPassword'],'$2a$07$usesomesillystringforsalt$');

				$tabla = "usuarios";

				$item = "usuario";

				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				var_dump($respuesta);


				if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["pass"] == $encriptar) {

					$_SESSION["iniciarSesion"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["usuario"] = $respuesta["usuario"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["foto"] = $respuesta["foto"];
					$_SESSION["perfil"] = $respuesta["perfil"];
					

					//var_dump($_SESSION);
					//die("Hasta aca");
					echo '<br><div class="alert alert-succsses">Error al ingresar, vuelve a intentarlo</div>';

					echo '<script>	window.location ="inicio"; </script>';
				} else {

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	static public function ctrCrearUsuario()
	{
		if (isset($_POST['nuevoNombre'])) {

			if (
				preg_match('/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]+$/', $_POST['nuevoNombre']) &&
				preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoUsuario']) &&
				preg_match('/^[a-zA-Z0-9 ]+$/', $_POST['nuevoPassword'])
			) {
				/*=============================================
					             VALIDAR IMAGEN
					=============================================*/
				$ruta = "";

				if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;
					/*=============================================
					             CREAR DIRECTORIO PARA IMAGEN
					=============================================*/

					$directorio = "vistas/img/usuarios/" . $_POST['nuevoUsuario'];

					mkdir($directorio, 0755);
					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/


					if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);


						var_dump(imagejpeg($destino, $ruta));
					}

					if ($_FILES["nuevaFoto"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "vistas/img/usuarios/" . $_POST["nuevoUsuario"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}
				//die("Hasta aca");

				$tabla = "usuarios";
				$encriptar = crypt($_POST['nuevoPassword'],'$2a$07$usesomesillystringforsalt$');

				$datos = array(

					"nombre" => $_POST['nuevoNombre'],
					"usuario" => $_POST['nuevoUsuario'],
					"password" => $encriptar,
					"perfil" => $_POST['nuevoPerfil'],
					"foto"   => $ruta
				);

				$respuesta = ModeloUsuarios::MdlIngresarUsuarios($tabla, $datos);

				//var_dump($respuesta);

				if ($respuesta == "ok") {
					echo '<script>

							Swal.fire({
								icon: "success",
								title: "Genial!!...",
								text: "Los datos ingresados son correctos",
								
							}).then(function(result){
 
									if(result.value){
									
										window.location = "usuarios";
									}
								});				

						</script>';
				}
			} else {
				echo    '<script>
								Swal.fire({
									icon: "error",
									title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
									
									
								}).then(function(result){

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

	static public function ctrmostrarUsuario($item,$valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
		
		return $respuesta;



	}



	//FIN DE LA
}
