<?php 
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	
	$Firma = $_FILES['firma'];
	$prevExt = explode(".", $Firma['name']);
	$extension = end($prevExt);
	$Firma['name'] = $CURP.".".$extension;
	$name = $Firma['name'];
	$location = "C:/xampp/htdocs/controlVehicular/firmas/";
	$tmp_name = $Firma['tmp_name'];
	move_uploaded_file($tmp_name, $location.$name);
	$location2=$location.$CURP.".".$extension;

	
	$Donador = $_POST["donador"];
	$tSangre = $_POST["tSangre"];
	$Restriccion = $_POST["restriccion"];
	$telEmergencia = $_POST["telEmergencia"];
	$fNacimiento = $_POST["fNacimiento"];
	
	print("CURP = ".$CURP."<br>");
	print("Nombre = ".$Nombre."<br>");
	print("Direccion = ".$Direccion."<br>");
	print("Firma = ".$location2."<br>");
	print("Donador = ".$Donador."<br>");
	print("Grupo sanguineo = ".$tSangre."<br>");
	print("Restriccion = ".$Restriccion."<br>");
	print("Telefono de emergencia = ".$telEmergencia."<br>");
	print("Fecha de nacimiento = ".$fNacimiento."<br>");
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Conductores VALUES ('$CURP','$Nombre','$Direccion','$location2','$Donador','$tSangre','$Restriccion','$telEmergencia','$fNacimiento');";
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