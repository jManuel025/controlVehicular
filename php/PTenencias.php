<?php 
error_reporting(0);
	$Vehiculo  = $_POST["vehiculo"];
	$Year = $_POST["year"];
	$Monto = $_POST["monto"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Tenencias (vehiculo,anio,monto) VALUES ('$Vehiculo','$Year','$Monto');";
	$cambio = Consulta($Con, $SQL);
	session_start();
	if ($_SESSION['validacion']) {
	header("refresh:600;url=/html/cerrarSesion.php");
		if ($cambio == True){
			print("Registro exitoso");	
			header("Location:../html/FTenencias.php?hecho=1");
		}
		else{
			$cont = mysqli_affected_rows($Con);
			print($cont + 1);
			print(" tablas afectadas. Registro fallido");	
			header("Location:../html/FTenencias.php?hecho=0");
		}
	} else {
			header("Location: ../html/FAcceso.php");
	}
	Desconectar($Con);
?>