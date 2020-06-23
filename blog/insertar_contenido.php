<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Agregar Contenido</title>
</head>

<body>
<?php
	//llamada al archivo de conexion de base de datos
	include ('configuracion.php');

	$titulo = htmlentities(addslashes($_POST['titulo']), ENT_QUOTES);
	$comentario = htmlentities(addslashes($_POST['comentario']), ENT_QUOTES);
	$fecha = date("y-m-d H:i:s");

	//manejo de fotos
	if ($_FILES['foto']['error']) {
		switch ($_FILES['foto']['error']) {
			case 1:
				//UPLOAD_ERR_INI_SIZE
				echo("El tamaño del archivo es mayor al permitido");
				break;
			case 2:
				//UPLOAD_ERR_FORM_SIZE
				echo("El tamaño del archivo es mayor al permitido por nosotros");
				break;
			case 3:
				//UPLOAD_ERR_PARTIAL
				echo("El envio del archivo se ha interrumpido durante la transmision");
				break;
			case 4:
				//UPLOAD_ERR_NO_FILE
				echo("El tamaño del archivo es nulo");
				break;
			
		}
	}
	if (isset($_FILES['foto']['name']) && ($_FILES['foto']['error']==UPLOAD_ERR_OK)){
		$ruta_destino = 'fotos/';
		//desplazamos la foto del archivo temporal a la ruta destino
		move_uploaded_file($_FILES['foto']['tmp_name'], $ruta_destino.$_FILES['foto']['name']);
	}
	$url_foto = $ruta_destino.$_FILES['foto']['name'];
	$sql = "INSERT INTO contenidos (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES ('$titulo', '$fecha', '$comentario', '$url_foto')";
	$conn->query($sql);

	define('PAGINA_INICIO', 'formulario.php?titulo='.$titulo);
	header('Location: '.PAGINA_INICIO);
?>
</body>
</html>