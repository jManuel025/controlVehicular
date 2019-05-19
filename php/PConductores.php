<?php 
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	
	$Firma = $_FILES['firma']; //Se guarda como arreglo asociativo
	$tipo = $_FILES['firma']['type'];
	// if(strpos($tipo,'image')!==false){ VALIDACION
	// 	print("Es imagen :D <br />");
	// }
	$_FILES['firma']['name'] = $CURP.".png";
	$name = $_FILES['firma']['name'];
	$location = "C:/xampp/htdocs/DAAD267795/Archivos/firmas/";
	$tmp_name = $_FILES['firma']['tmp_name'];
	move_uploaded_file($tmp_name, $location.$name);
	$location2=$location.$CURP;

	
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
		$conductores = new SimpleXMLElement('conductores.xml', null, true);
		$nuevoConductor = $conductores->addChild('conductor');
		$nuevoConductor->addChild('curp', $CURP);
		$nuevoConductor->addChild('nombre', $Nombre);
		$nuevoConductor->addChild('direccion', $Direccion);
		$nuevoConductor->addChild('firma', $location2);
		$nuevoConductor->addChild('donador', $Donador);
		$nuevoConductor->addChild('sangre', $tSangre);
		$nuevoConductor->addChild('restriccion', $Restriccion);
		$nuevoConductor->addChild('telEmergencia', $telEmergencia);
		$nuevoConductor->addChild('fNacimiento', $fNacimiento);
		$conductores->asXML('conductores.xml');
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
	}
	Desconectar($Con);
?>