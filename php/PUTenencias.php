<?php 
error_reporting(0);
	$id=$_POST["idA"];
	$idTenencia=$_POST["idN"];
	$Vehiculo  = $_POST["vehiculo"];
	$Year = $_POST["year"];
	$Monto = $_POST["monto"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE tenencias SET idTenencia='$idTenencia',vehiculo='$Vehiculo',anio='$Year',monto='$Monto' WHERE idTenencia ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
		header("Location:FUTenencias.php?hecho=1");	
	}
	else{
		print(" 0 tablas afectadas. Cambio fallido");	
		header("Location:FUTenencias.php?hecho=0");	
	}
	Desconectar($Con);
?>