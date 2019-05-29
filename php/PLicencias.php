<?php 
error_reporting(0);
	$Conductor = $_POST["conductor"];
	$fExpedicion = date("Y/m/d");
	$Tipo = $_POST["tipo"];
	$mas=$_POST["duracion"];
	$Vfecha = strtotime ( $mas. 'year' , strtotime ( $fExpedicion ) ) ;
	$Vfecha = date ( 'Y/m/j' , $Vfecha );
	$fVencimiento = $Vfecha;
	$Lugar = $_POST["lugar"];
	$Expide = $_POST["expide"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Licencias (conductor,fExpedicion,tipo,fVencimiento,lugar,expide) VALUES ('$Conductor','$fExpedicion','$Tipo','$fVencimiento','$Lugar','$Expide');";
	$cambio = Consulta($Con, $SQL);
	$idLicencia = mysqli_insert_id($Con);
	print("ID asignado = ".$idLicencia."<br>");
	session_start();
	if ($_SESSION['validacion']) {
		header("refresh:600;url=/html/cerrarSesion.php");
		if ($cambio == True){
			print("Registro exitoso");
			$licencias = new SimpleXMLElement($rutaXML.'licencias.xml', null, true);
			$nuevaLicencia = $licencias->addChild('licencia');
			$nuevaLicencia->addChild('id', $idLicencia);
			$nuevaLicencia->addChild('conductor', $Conductor);
			$nuevaLicencia->addChild('fecExpedicion', $fExpedicion);
			$nuevaLicencia->addChild('tipo', $Tipo);
			$nuevaLicencia->addChild('fecVence', $fVencimiento);
			$nuevaLicencia->addChild('lugar', $Lugar);
			$nuevaLicencia->addChild('expide', $Expide);
			$licencias->asXML($rutaXML.'licencias.xml');
			include('formatoLicencia.php');
			header("Location:../html/FLicencias.php?hecho=1");
		}
		else{
			$cont = mysqli_affected_rows($Con);
			print($cont + 1);
			print(" tablas afectadas. Registro fallido");	
			header("Location:../html/FLicencias.php?hecho=0");
		}
	} else {
		header("Location: ../html/FAcceso.php");
	}
	Desconectar($Con);
?>