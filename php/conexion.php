<?php 
function conectarse(){
	$servidor ="localhost";
	$usuario="root";
	$password="root";
	$bd="mis_contactos";

	$conectar = new mysqli($servidor, $usuario, $password, $bd);
	return $conectar;
}

$conexion = conectarse();
?>