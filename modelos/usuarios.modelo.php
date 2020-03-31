<?php

require_once "conexion.php";

class ModeloUsuarios
{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarUsuarios($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
			
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");			

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt -> close();

		$stmt = null;
	}

	/*=============================================
	REGISTRO DE USUARIOS
	=============================================*/

	static public function MdlIngresarUsuarios($tabla, $datos)
	{

		//var_dump($tabla,$datos);
		$nombre = $datos['nombre'];
		$usuario = $datos['usuario'];
		$pass = $datos['password'];
		$perfil = $datos['perfil'];
		$foto = $datos['foto'];

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, pass, perfil,foto) VALUES ('$nombre','$usuario','$pass','$perfil','$foto')");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error al ajecutar";
		}
	}
}
