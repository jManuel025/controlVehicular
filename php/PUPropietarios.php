<?php 
error_reporting(0);
	$id = $_POST["rfcV"];
	$RFC = $_POST["rfcN"];
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE propietarios SET RFC='$RFC',CURP='$CURP',Nombre='$Nombre',Direccion='$Direccion' WHERE RFC ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
		header("Location:FUPropietarios.php?hecho=1");	
	}
	else{
		print(" 0 tablas afectadas. Cambio fallido");	
		header("Location:FUPropietarios.php?hecho=0");	
	}
	Desconectar($Con);
?>