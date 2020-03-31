<?php

require_once "../controladores/usuario.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxUsuarios{

    //Editar Usuario

    public $idUsuario;

    public function ajaxEditarUsuario(){

        $item ="id";

        $valor = $this->idUsuario;
        
        $respuesta = ControladorUsuarios::ctrmostrarUsuario($item,$valor);

        echo json_encode($respuesta);

    }



}


/*=============================================
        EDITAR USUARIO
==============================================*/

if(isset($_POST["idUsuario"])){

	$editar = new AjaxUsuarios();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
       MOSTRAR USUARIO
==============================================*/
