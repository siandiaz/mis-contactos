<?php 
//asigno a variables de PHP los valores que vienen del formulario
$email = $_POST["email_txt"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

//dependiendo del sexo ponemos una imagen predeterminada
$imagen_generica = ($sexo=="M")?"img/fotos/amigo.png":"img/fotos/amiga.png";

//Verificamos que no existe previamente el email del usuario en la DB
include("conexion.php");
$consulta = "SELECT * FROM contactos WHERE email = '$email'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

//Si $num_regs es = a 0, insertamos los datos en la tabla, si no mandamos un mensaje que diga que el usuario exite
if($num_regs == 0){
	//Inserto el registro a la DB
	//se ejecuta la funcion para subir la imagen
	include("funciones.php");
	$tipo = $_FILES["foto_fls"]["type"];
	$archivo = $_FILES["foto_fls"]["tmp_name"];
	$se_subio_imagen = subir_imagen($tipo,$archivo,$email);

	//Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica, si no entonces el nombre de la foto que se subio.
	$imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;

	$consulta = "INSERT INTO contactos(email, nombre, sexo, nacimiento, telefono, pais, imagen) VALUES ('$email','$nombre','$sexo','$nacimiento','$telefono','$pais','$imagen')";

	//$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
	$ejecutar_consulta = $conexion->query($consulta);
	if ($ejecutar_consulta)
		$mensaje = "Se ingreso el contacto con el email <b>$email</b> :)";
	else
		$mensaje = "No se pudo ingresar el contacto con el email <b>$email</b> :(";

}else{
	$mensaje = "No se pudo dar de alta al contacto con el email <b>$email</b> porque ya existe :/";
}

$conexion->close();
header("Location: ../index.php?op=alta&mensaje=$mensaje");
?>