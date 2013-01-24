<?php 
$conexion = mysql_connect("localhost","root", "root") or die("No se pudo conectar con el servidor de DB");
echo "Estoy conectado a MySQL <br />";

mysql_select_db("mis_contactos") or die("No se pudo seleccionar la DB <br />");
echo "DB seleccionada: <b>mis_contactos<b/><br />";
echo "<h1>Las 4 operaciones b&aacute;sicas a una DB</h1>";

echo "<h2>1)INSERCI&Oacute;N DE DATOS</h2>";

//INSERT INTO
$consulta = "INSERT INTO contactos (email,nombre,sexo,nacimiento,telefono,pais,imagen) VALUES (
	'jonmircha@bextlan.com','Jonathan MirCha','M','1984-05-23','525555555555','México','jonmircha.png')";
$ejecutar_consulta = mysql_query($consulta,$conexion) or die("error al insertar");
echo "Se han insertado los datos =) <br />";

echo "<h2>2)ELIMINACI&Oacute;N DE DATOS<h2/>";
$consulta = "DELETE FROM contactos WHERE email = 'jon..mircha@bextlan.com'";
$ejecutar_consulta = mysql_query($consulta, $conexion) or die("error al borrar");
echo "Datos eliminados =( <br />";

echo "<h2>3)MODIFICACI&Oacute;N DE DATOS</h2>";
$consulta = "UPDATE contactos SET " email = 'cursos@bextlan.com';
$ejecutar_consulta=mysql_query($consulta,$conexion);
echo "Datos modificados <br />";

echo "<h2>4)CONSULTA DE DATOS</h2>";
$consulta = "SELECT * FROM contactos WHERE email ='cursos@bextlan.com'";
$ejecutar_consulta(mysql_query($consulta,$conexion);

echo "<h3>Consulta que trae todos los registros de la tabla</h3>";	
	while ($registro = mysql_fetch_array($ejecutar_consulta)) {
	echo $registro["email"]. " ---- ";
	echo $registro["nombre"]. " ---- ";
	echo $registro["sexo"]. " ---- ";
	echo $registro["nacimiento"]. " ---- ";
	echo $registro["telefono"]. " ---- ";
	echo $registro["pais"]. " ---- ";
	echo $registro["imagen"]. " ---- ";
	echo "<br />";
}
mysql_close($conexion);
echo "Conexi&oacute;n cerrada";
 ?>