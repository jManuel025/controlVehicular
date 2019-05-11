<?php 
	$idLicencia = $_POST["idLicencia"];
	$Conductor = $_POST["conductor"];
	$fExpedicion = $_POST["fExpedicion"];
	$Tipo = $_POST["tipo"];
	$fVencimiento = $_POST["fVencimiento"];
	$Lugar = $_POST["lugar"];
	$Expide = $_POST["expide"];
	
	print("Id Licencia = ".$idLicencia."<br>");
	print("Conductor = ".$Conductor."<br>");
	print("Fecha de expedicion = ".$fExpedicion."<br>");
	print("Tipo = ".$Tipo."<br>");
	print("Fecha de vencimiento = ".$fVencimiento."<br>");
	print("Lugar = ".$Lugar."<br>");
	print("Expide = ".$Expide."<br>");

	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Licencias (idLicencia,conductor,fExpedicion,tipo,fVencimiento,lugar,expide) VALUES ('$idLicencia','$Conductor','$fExpedicion','$Tipo','$fVencimiento','$Lugar','$Expide');";
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