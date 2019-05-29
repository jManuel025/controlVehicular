<?php
error_reporting(0);
	$RFC = $_POST["rfc"];
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Propietarios VALUES ('$RFC','$CURP','$Nombre','$Direccion');";
	$cambio = Consulta($Con, $SQL);
	session_start();
	if ($_SESSION['validacion']) {
		header("refresh:600;url=/html/cerrarSesion.php");
		if ($cambio == True){
			print("Registro exitoso");	
			header("Location:../html/FPropietarios.php?hecho=1");
		}
		else{
			$cont = mysqli_affected_rows($Con);
			print($cont + 1);
			print(" tablas afectadas. Registro fallido");	
			header("Location:../html/FPropietarios.php?hecho=0");
		
		}
	} else {
		header("Location: ../html/FAcceso.php");
	}
	
	Desconectar($Con);
?>