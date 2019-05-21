<?php 
	//$Folio = $_POST["folio"];
	$Vehiculo = $_POST["vehiculo"];
	$Fecha = $_POST["fecha"];
	$Dictamen = $_POST["dictamen"];
	$Periodo = $_POST["periodo"];
	
	//print("Folio = ".$Folio."<br>");
	print("Vehiculo = ".$Vehiculo."<br>");
	print("Fecha = ".$Fecha."<br>");
	print("Dictamen = ".$Dictamen."<br>");
	print("Periodo = ".$Periodo."<br>");

	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Verificaciones (vehiculo,fecha,periodo,dictamen) VALUES ('$Vehiculo','$Fecha','$Dictamen','$Periodo');";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Registro exitoso");	
		$verificaciones = new SimpleXMLElement('C:\xampp\htdocs\controlVehicular\temp\XML\verificaciones.xml', null, true);
		$nuevaVerificacion = $verificaciones->addChild('verificacion');
		$nuevaVerificacion->addChild('vehiculo', $Vehiculo);
		$nuevaVerificacion->addChild('fecha', $Fecha);
		$nuevaVerificacion->addChild('dictamen', $Dictamen);
		$nuevaVerificacion->addChild('periodo', $Periodo);
		$verificaciones->asXML('C:\xampp\htdocs\controlVehicular\temp\XML\verificaciones.xml');
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
	}
	Desconectar($Con);
?>