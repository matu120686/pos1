

<?php
require_once "controladores/categoria.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/plantilla.controlador.php";
require_once "controladores/producto.controlador.php";
require_once "controladores/usuario.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/categoria.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/plantilla.modelo.php";
require_once "modelos/producto.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";

$plantilla = new ControladorPlantilla();

//echo $plantilla->muestramensaje();
//echo " Hola a todos";
/************SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS*************/

$plantilla->ctrPlantilla(); 

/*DIMENSIONES PANTALLAS PORTATITEL
MOVIL 320px

TABLET PORTRAIT 768px

TABLET LANDSCAPE 1024 px

ESCRITORIO 1366px 

*/