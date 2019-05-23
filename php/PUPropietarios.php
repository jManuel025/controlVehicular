<?php 
	//recibimos variables desde el formulario
	$id = $_POST["rfcV"];
	$RFC = $_POST["rfcN"];
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	//imprimimos contenido de variables
	print("RFC = ".$RFC."<br>");
	print("CURP = ".$CURP."<br>");
	print("Nombre = ".$Nombre."<br>");
	print("Direccion = ".$Direccion."<br>");
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE propietarios SET RFC='$RFC',CURP='$CURP',Nombre='$Nombre',Direccion='$Direccion' WHERE RFC ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
	}
	else{
		
		
		print(" 0 tablas afectadas. Cambio fallido");	
	}
	Desconectar($Con);
?>