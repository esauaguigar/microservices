<?php
	$user=$_POST['finger'];
	$name=$_POST['name'];
	require_once("../conexion.php");
	if ($mysqli->connect_errno) {
	    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	if ($mysqli->query("UPDATE USUARIO SET NOMBRE='".$name."' WHERE FINGER='".$user."'")){
		$resultado = $mysqli->query("SELECT * FROM USUARIO WHERE FINGER='".$user."'");
		$resultado->data_seek(0);
		$response="";
		while ($fila = $resultado->fetch_assoc()) {
		    $response .= "ID: ".$fila['ID']." | Nombre: ".$fila['NOMBRE']." | FINGER: ".$fila['FINGER'];
		}
	}
	echo $response;
	return $response;

?>