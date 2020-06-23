<?php
	$mensaje='';
	if (isset($_GET['titulo'])) {
		$mensaje = "Se ha publicado con exito su articulo con el titulo: <strong>".$_GET['titulo']."</strong>";
	}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gestor de contenidos</title>
	<link rel="stylesheet" href="estilos.css" type="text/css">
</head>
	
<body>
	<div class="container">
		<h1>Formulario para añadir contenido al blog</h1>
		<div class="formulario">
			<form action="insertar_contenido.php" method="post" enctype="multipart/form-data" id="form_home">
				<label for="titulo">Titulo</label>
				<input type="text" id="titulo" name="titulo">

				<label for="comentario">Comentario</label>
				<textarea id="comentario" name="comentario"></textarea>

				<p>Elija una foto de tamaño inferior a 2MB.</p>
				<input  type="file" id="foto" name="foto" class="enviar">
				<br>
				<input type="submit" name="ok" value="Enviar" class="b_inicio">
			</form>
		</div>
		<div class="boton">
			<a href="index.php">Ver Blog</a>
		</div>
	</div><!--fin de container-->
	<div class="mensaje"><?= $mensaje ?></div>
</body>
</html>