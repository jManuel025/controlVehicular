<?php 
	//$Folio = $_POST["folio"];
	$Vehiculo = $_POST["vehiculo"];
	$Licencia = $_POST["licencia"];
	$Monto = $_POST["monto"];
	$Lugar = $_POST["lugar"];
	$Fecha = date("Y/m/d");
	$Motivo = $_POST["motivo"];
	$idOficial = $_POST["idOficial"];
	$Hora = $_POST["hora"];
	
	//print("Folio = ".$Folio."<br>");
	print("Vehiculo = ".$Vehiculo."<br>");
	print("Licencia = ".$Licencia."<br>");
	print("Monto = ".$Monto."<br>");
	print("Lugar = ".$Lugar."<br>");
	print("Fecha = ".$Fecha."<br>");
	print("Motivo = ".$Motivo."<br>");
	print("ID Oficial = ".$idOficial."<br>");
	print("Hora = ".$Hora."<br>");
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Multas VALUES ('','$Vehiculo','$Licencia','$Monto','$Lugar','$Fecha','$Motivo','$idOficial','$Hora');";
	$cambio = Consulta($Con, $SQL);
	session_start();
	if ($_SESSION['validacion']) {
		header("refresh:600;url=/html/cerrarSesion.php");
		if ($cambio == True){
			print("Registro exitoso");
			$folio = mysqli_insert_id($Con);
			$multas = new SimpleXMLElement($rutaXML.'multas.xml', null, true);
			$nuevaMulta = $multas->addChild('multa');
			$nuevaMulta->addChild('folio', $folio);
			$nuevaMulta->addChild('vehiculo', $Vehiculo);
			$nuevaMulta->addChild('licencia', $Licencia);
			$nuevaMulta->addChild('monto', $Monto);
			$nuevaMulta->addChild('lugar', $Lugar);
			$nuevaMulta->addChild('fecha', $Fecha);
			$nuevaMulta->addChild('idOficial', $Motivo);
			$nuevaMulta->addChild('hora', $Hora);
			$multas->asXML($rutaXML.'multas.xml');
	
			require('barcode.php');
			$filepath = $rutaBarras.$folio.'.png';
			$text=$folio;
			$size=40;
			$orientation="horizontal";
			$code_type="Code128";
			$print=true;
			$sizefactor="1";
			barcode($filepath, $text, $size, $orientation, $code_type, $print,$sizefactor);
			include('formatoMultas.php');
			header("Location:../html/FMultas.php?hecho=1");
		}
		else{
			$cont = mysqli_affected_rows($Con);
			print($cont + 1);
			print(" tablas afectadas. Registro fallido");	
			header("Location:../html/FMultas.php?hecho=0");
		}
	} else {
		header("Location: ../html/FAcceso.php");
	}
	
	Desconectar($Con);
