<?php 
	// $idLicencia = $_POST["idLicencia"];
	$Conductor = $_POST["conductor"];
	$fExpedicion = $_POST["fExpedicion"];
	$Tipo = $_POST["tipo"];
	$fVencimiento = $_POST["fVencimiento"];
	$Lugar = $_POST["lugar"];
	$Expide = $_POST["expide"];
	$Foto = $_FILES['foto']; //Se guarda como arreglo asociativo
	// $tipo = $_FILES['foto']['type'];
	// if(strpos($tipo,'image')!==false){ VALIDACION
	// 	print("Es imagen :D <br />");
	// }
	$prevExt = explode(".", $Foto['name']);
	$extension = end($prevExt);
	$Foto['name'] = $Conductor.".".$extension;
	$name = $Foto['name'];
	$location = 'C:/xampp/htdocs/controlVehicular/fotos/';
	$tmp_name = $Foto['tmp_name'];
	move_uploaded_file($tmp_name, $location.$name);
	$location2 = $location.$Conductor.".".$extension;

	// print("Id Licencia = ".$idLicencia."<br>");
	print("Conductor = ".$Conductor."<br>");
	print("Foto = ".$location2."<br>");
	print("Fecha de expedicion = ".$fExpedicion."<br>");
	print("Tipo = ".$Tipo."<br>");
	print("Fecha de vencimiento = ".$fVencimiento."<br>");
	print("Lugar = ".$Lugar."<br>");
	print("Expide = ".$Expide."<br>");
	// print("Tipo = ".$tipo." ".$extension);

	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Licencias (conductor,fExpedicion,tipo,fVencimiento,lugar,expide, foto) VALUES ('$Conductor','$fExpedicion','$Tipo','$fVencimiento','$Lugar','$Expide', '$location2');";
	$cambio = Consulta($Con, $SQL);
	
	$idLicencia = mysqli_insert_id($Con);
	
	print("ID asignado = ".$idLicencia."<br>");
	if ($cambio == True){
		print("Registro exitoso");
		$licencias = new SimpleXMLElement($rutaXML.'licencias.xml', null, true);
		$nuevaLicencia = $licencias->addChild('licencia');
		$nuevaLicencia->addChild('id', $idLicencia);
		$nuevaLicencia->addChild('conductor', $Conductor);
		$nuevaLicencia->addChild('foto', $location2);
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
	Desconectar($Con);
?>