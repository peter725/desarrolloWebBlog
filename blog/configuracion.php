<?php
	$dbhost='localhost';//hosting de servidor
	$db ='megacursos';//nombre de la base de datos
	$dbuser ='root';//usuario para la base de datos
	$dbpass ='';//contraseña para la base de datos

	//conectamos y seleccionamos la base de datos
		$conn =  new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	//verificamos la conexion
	if ($conn->connect_error) {
		die('conexion fallida: '.$conn->connect_error);
	}

	//comenzamos la sesion
	session_start();
	
?>