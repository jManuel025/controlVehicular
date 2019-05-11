<?php 
	//recibimos variables desde el formulario
	$RFC = $_POST["rfc"];
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
	$SQL = "INSERT INTO Propietarios VALUES ('$RFC','$CURP','$Nombre','$Direccion');";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Registro exitoso");	
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
	
	}
	Desconectar($Con);
?>