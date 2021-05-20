<?php

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
			ORDER BY R1.ID DESC
			";
	$registered=$mysqli->query($queryReg);
	$data = '<table>
		<tr>
		<td style="border: 1px solid black;">NOMBRE</td>
		<td style="border: 1px solid black;">ENTRADA</td>
		<td style="border: 1px solid black;">SALIDA</td>
		</tr>';
	while ($reg=$registered->fetch_assoc()) {
		$data .= '
		<tr>
		<td style="border: 1px solid black;">'.$reg['NOMBRE'].'</td>
		<td style="border: 1px solid black;">'.$reg['ENTRADA'].'</td>
		<td style="border: 1px solid black;">'.$reg['SALIDA'].'</td>
		</tr>';
	}
	$data .= '</table>';
	echo $data;
	return $data;

?>