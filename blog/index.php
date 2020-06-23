<?php
	include('configuracion.php');

	//paginacion
	$registros = 2;
	$pagina="";

	if (isset($_GET['pagina'])) {
		$pagina = $_GET['pagina'];
	}
	if (!$pagina) {
		$inicio=0;
		$pagina=1;
	}else{
		$inicio = ($pagina-1)*$registros;
	}
	
	$sql1 = "SELECT * FROM contenidos ORDER BY ID DESC LIMIT $inicio, $registros";
	$result1 = $conn->query($sql1);
	$sql2="SELECT * FROM contenidos";
	$result2 = $conn->query($sql2);
	$tot_registros = $result2->num_rows; 
	$tot_paginas = ceil($tot_registros/$registros);

	//mostramos los resultados
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mi Blog</title>
	<link rel="stylesheet" href="estilos.css" type="text/css">

</head>
<body>
	<div class="container">
		<h1>Mi Blog</h1>
		<hr class="linea" />
		<main>
			<?php
				//if ($result2->num_rows > 0) {
					while ($row = $result1->fetch_assoc()) {
						$contenido = "<article>";
						$contenido .= "<h2>".$row['TITULO']."</h2>";
						$contenido .= "<span>".$row['FECHA']."</span>";
						$contenido .= "<p>".$row['COMENTARIO']."</p>";
						$contenido .= "<img src='".$row['IMAGEN']."'alt='".$row['TITULO']."'>";	
						$contenido .= "</article>";
						echo $contenido;
					}

					mysqli_free_result($result2); 

					if ($tot_registros) {
						echo '<div class="numeracion">';
							if (($pagina-1)>0) {
								echo '<a href="index.php?pagina='.($pagina-1).'">Anterior -</a>';
							}
							for ($i=1; $i <= $tot_paginas; $i++) { 
								if ($pagina == $i) {
										echo '<span class="destacar">'.$i.'</span>';
								}else{
									echo '<a href="index.php?pagina='.$i.'">'.$i.'</a>';
								}
							}
							if (($pagina + 1) >= $tot_paginas) {
								echo '<a href="index.php?pagina='.($pagina+1).'">- Siguiente</a>'; 
							}
						echo '</div';
					}
				//}
			?> 
		</main>
		<footer>
			<a href="formulario.php">Acceso Privado</a>
		</footer>
	</div><!--fin de container
</body>
</html>