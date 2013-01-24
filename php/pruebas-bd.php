<?php 
/*Pasos para conectarme a una DB MySQL con PHP
	1) Conectarme al BD, de mysql_connect necesita 3 datos:
		1)Servidor
		2)Usuario de la DB
		3)Password del usuario de la DB
*/
$conexion = mysql_connect("localhost:8888","root", "") or die("No se pudo conectar con el servidor de DB");
echo "Estoy conectado a MySQL <br />";

//2)Seleccionar la DB con la que vamos a trabajar
mysql_select_db("mis_contactos") or die("No se pudo Seleccionar la DB 'mis_contactos'");
echo "DB seleccionada: 'mis_contactos'<br />";

//3)Crear una consulta SQL
$consulta = "SELECT * FROM pais";

//4)Ejecutar la consulta SQL
$ejecutar_consulta = mysql_query($consulta, $conexion) or die("No se pudo ejecutar la consulta en la base de datos");
echo "Se eejecut&oacute; la consulta SQL <br />";

//5)mostrar el resultado de la consulta, destro de un ciclo y en una variable voy a ingresar la funcion mysql_fetch_array
while ($registro = mysql_fetch_array($ejecutar_consulta)) {
	echo $registro["id_pais"]. " - " .$registro["pais"]."<br />";
}

//6) cerrar la conexión a la DB
mysql_close($conexión) or die("Ocurrio un error al cerrar la conexión a la DB");
echo "Conexion cerrada";


?>