<?php 
include("conexion.php");
$consulta="SELECT * FROM pais ORDER BY pais";
$ejecutar_consulta = $conexion->query($consulta);

while ($registro = $ejecutar_consulta->fetch_assoc()) {
	//$nombre_pais = utf8_encode($registro["pais"]);
	$nombre_pais = $registro["pais"];
	echo "<option value='$nombre_pais'>$nombre_pais</option>";
}
?>