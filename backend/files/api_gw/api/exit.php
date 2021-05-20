<?php

if( isset($_POST['finger']) ){
	$finger=$_POST['finger'];
	require_once("../conexion.php");
	if ($mysqli->connect_errno) {
		echo "Falló la conexión con MySQL: (".$mysqli->connect_errno.")".$mysqli->connect_error;
	}
	$queryReg="SELECT
			R1.ID AS 'ID',
			U2.NOMBRE AS 'NOMBRE',
			R1.ENTRADA AS 'ENTRADA',
			R1.SALIDA AS 'SALIDA'
			FROM REGISTRO R1
			INNER JOIN USUARIO U2 ON U2.ID = R1.NOMBRE
			WHERE U2.FINGER='$finger'
			ORDER BY R1.ID DESC LIMIT 1
			";
	$registered=$mysqli->query($queryReg);
	$reg=$registered->fetch_assoc();
	$queryUpdate="UPDATE REGISTRO SET SALIDA='".date("Y-m-d h:i:sa")."' WHERE ID=".$reg['ID'];
	$response = "";
	if ($mysqli->query($queryUpdate)) {
		$response .= "Nombre:".$reg['NOMBRE']." | ENTRADA: ".$reg['ENTRADA']." | SALIDA: ".$reg['SALIDA'];
	}
	else{
		$response = "error";
	}
	echo $response;
	return $response;
}

?>