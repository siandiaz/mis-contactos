<?php 

function borrar_imagenes($ruta,$extension){
	switch ($extension) {
		case ".jpg":
			if (file_exists($ruta.".png")) 
				unlink($ruta.".png");
			if (file_exists($ruta.".gif")) 
				unlink($ruta.".gif");
			break;
		case ".gif":
			if (file_exists($ruta.".png")) 
				unlink($ruta.".png");
			if (file_exists($ruta.".jpg")) 
				unlink($ruta.".jpg");
			break;
		case ".png":
			if (file_exists($ruta.".jpg")) 
				unlink($ruta.".jpg");
			if (file_exists($ruta.".gif")) 
				unlink($ruta.".gif");
			break;	
	}
}


//Funciones para subir la imagen del perfil del usuario
function subir_imagen($tipo, $imagen, $email){
	if(strstr($tipo,"image")){
		//Para saber de que tipo de extenion es la imagen
		if(strstr($tipo, "jpeg"))
			$extension = ".jpg";
		else if (strstr($tipo,"gif"))
			$extension = ".gif";
		else if(strstr($tipo,"png"))
			$extension = ".png";
		
		//Para saber si la imagen tiene el ancho correcto que es de 420px
		$tam_img = getimagesize($imagen);
		$ancho_img = $tam_img[0];
		$alto_img = $tam_img[1];
		$ancho_img_deseado = 420;

		//Si la imagen es mayor en su ancho que 420px, reajusto el tamaño 
		if ($ancho_img > $ancho_img_deseado) {
			//Reajustamos
			//Por una regla de 3 obtengo el alto de la imagen de manera proporcional al ancho que será de 420
			$nuevo_ancho_img = $ancho_img_deseado;
			$nuevo_alto_img = ($alto_img / $ancho_img) * $nuevo_ancho_img;

			//Creo una imagen en color real con la nuevas dimensiones
			$img_reajustada = imagecreatetruecolor($nuevo_ancho_img, $nuevo_alto_img);

			//Creo una imagen basada en la original, dependiendo de la extension es el tipo que creare
			switch ($extension) {
				case ".jpg":
					$img_original = imagecreatefromjpeg($imagen);
					//Reajusto la imagen nueva con respecto a la original
					imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext = "../img/fotos/".$email.$extension;
					$nombre_img = "../img/fotos/".$email;
					imagejpeg($img_reajustada,$nombre_img_ext,100);
					//Ejecuto la funcion para borrar posibles imagenes dobles para el perfil
					borrar_imagenes($nombre_img,".jpg");
					break;
				case ".gif":
					$img_original = imagecreatefromgif($imagen);
					//Reajusto la imagen nueva con respecto a la original
					imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext = "../img/fotos/".$email.$extension;
					$nombre_img = "../img/fotos/".$email;
					imagegif($img_reajustada,$nombre_img_ext,100);
					//Ejecuto la funcion para borrar posibles imagenes dobles para el perfil
					borrar_imagenes($nombre_img,".gif"); 
					break;
				case ".png":
					$img_original = imagecreatefrompng($imagen);
					//Reajusto la imagen nueva con respecto a la original
					imagecopyresampled($img_reajustada, $img_original, 0, 0, 0, 0, $nuevo_ancho_img, $nuevo_alto_img, $ancho_img, $alto_img);
					//Guardo la imagen reescalada en el servidor
					$nombre_img_ext = "../img/fotos/".$email.$extension;
					$nombre_img = "../img/fotos/".$email;
					imagepng($img_reajustada,$nombre_img_ext,100);
					//Ejecuto la funcion para borrar posibles imagenes dobles para el perfil
					borrar_imagenes($nombre_img,".png"); 
					break;	
			}

		}else{
			//no se reajusta y se sube
			//guardo la ruta que tendra en el servidor la imagen
			$destino = "../img/fotos/".$email.$extension;

			//se sube la foto
			move_uploaded_file($imagen, $destino) or die("No se pudo subir la imagen al servidor :(");

			//ejecuto la funcion para borrar posibles imagenes dobles para el perfil
			$nombre_img = "../img/fotos/".$email;	
			borrar_imagenes($nombre_img,$extension);	
		}
		//Asigno el nombre de la foto que se guardará en la DB como una cadena de texto
		$imagen = $email.$extension;
		return $imagen;
	}else{
		return false;
	}
}
?>