<?php

if( isset($_POST['name']) and isset($_POST['finger']) ){
	$nombre=$_POST['name'];
	$finger=$_POST['finger'];

	require_once("../conexion.php");
	if ($mysqli->connect_errno) {
	    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$response ="";
	if ($mysqli->query("INSERT INTO USUARIO(NOMBRE,FINGER) VALUES ('".$nombre."','".$finger."');")) {
	    $response .= 'Success insert';
	}
	else{
		$response .= 'Error';
	}
	echo $response;
	return $response;
}

?>