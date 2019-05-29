<?php 
error_reporting(0);
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	$Donador = $_POST["donador"];
	$tSangre = $_POST["tSangre"];
	$Restriccion = $_POST["restriccion"];
	$telEmergencia = $_POST["telEmergencia"];
	$fNacimiento = $_POST["fNacimiento"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE conductores SET CURP='$CURP',nombre='$Nombre',direccion='$Direccion',donador='$Donador',tSangre='$tSangre',restriccion='$Restriccion',tEmergencia='$telEmergencia',fNacimiento='$fNacimiento' WHERE curp ='$CURP';";
	$cambio = Consulta($Con, $SQL);
	if($cambio == True){
		print("Cambio exitoso");
		header("Location:FUConductores.php?hecho=1");	
	}
	else{
		print(" 0 tablas afectadas. Cambio fallido");	
		header("Location:FUConductores.php?hecho=0");	
	}
	Desconectar($Con);
 ?>