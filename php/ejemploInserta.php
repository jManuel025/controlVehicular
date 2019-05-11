<?php  
	include("conexion.php"); //va entre comilas
	$Con = Conectar();

	$SQL = "INSERT INTO Propietarios VALUES('2', '3', '4', '5')"; //implicito
	$SQL2 = "INSERT INTO Propietarios (direccion, nombre, CURP, RFC) VALUES ('2', '3', '4', '5')"; //explicito
	
	$Query = Consulta($Con, $SQL2);

	Desconectar($Con);
?>