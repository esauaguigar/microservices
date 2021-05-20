<?php
	require_once("../conexion.php");
	if ($mysqli->connect_errno) {
	    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if ($mysqli->query("SELECT * FROM USUARIO")){
		$resultado = $mysqli->query("SELECT * FROM USUARIO");
		$resultado->data_seek(0);
		$response = "";
		while ($fila = $resultado->fetch_assoc()) {
		    $response .= "ID: ".$fila['ID']." | Nombre: ".$fila['NOMBRE']." | FINGER: ".$fila['FINGER']."<br>";
		}
	}
	else{
		$response="Error";
	}
	echo $response;
	return $response;

?>