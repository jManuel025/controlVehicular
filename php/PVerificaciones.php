<?php 
	//$Folio = $_POST["folio"];
	$Vehiculo = $_POST["vehiculo"];
	$Fecha = date("Y/m/d");
	$Dictamen = $_POST["dictamen"];
	$Periodo = $_POST["periodo"];
	
	//print("Folio = ".$Folio."<br>");
	print("Vehiculo = ".$Vehiculo."<br>");
	print("Fecha = ".$Fecha."<br>");
	print("Dictamen = ".$Dictamen."<br>");
	print("Periodo = ".$Periodo."<br>");

	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Verificaciones (vehiculo,fecha,periodo,dictamen) VALUES ('$Vehiculo','$Fecha','$Periodo','$Dictamen');";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Registro exitoso");	
		$idVerificacion = mysqli_insert_id($Con);
		$verificaciones = new SimpleXMLElement($rutaXML.'verificaciones.xml', null, true);
		$nuevaVerificacion = $verificaciones->addChild('verificacion');
		$nuevaVerificacion->addChild('id', $idVerificacion);
		$nuevaVerificacion->addChild('vehiculo', $Vehiculo);
		$nuevaVerificacion->addChild('fecha', $Fecha);
		$nuevaVerificacion->addChild('dictamen', $Dictamen);
		$nuevaVerificacion->addChild('periodo', $Periodo);
		$verificaciones->asXML($rutaXML.'verificaciones.xml');
		include('formatoVerificaciones.php');
		header("Location:../html/Fverificaciones.php?hecho=1");
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
		header("Location:../html/Fverificaciones.php?hecho=0");
	}
	Desconectar($Con);
?>