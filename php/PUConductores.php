<?php 
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	
	// $Firma = $_FILES['firma']; //Se guarda como arreglo asociativo
	// $tipo = $_FILES['firma']['type'];
	// // if(strpos($tipo,'image')!==false){ VALIDACION
	// // 	print("Es imagen :D <br />");
	// // }
	// $_FILES['firma']['name'] = $CURP.".png";
	// $name = $_FILES['firma']['name'];
	// $location = $rutaFirmas;
	// $tmp_name = $_FILES['firma']['tmp_name'];
	// move_uploaded_file($tmp_name, $location.$name);
	// $location2=$location.$CURP;

	$Donador = $_POST["donador"];
	$tSangre = $_POST["tSangre"];
	$Restriccion = $_POST["restriccion"];
	$telEmergencia = $_POST["telEmergencia"];
	$fNacimiento = $_POST["fNacimiento"];

	print("CURP = ".$CURP."<br>");
	print("Nombre = ".$Nombre."<br>");
	print("Direccion = ".$Direccion."<br>");
	// print("Firma = ".$location2."<br>");
	print("Donador = ".$Donador."<br>");
	print("Grupo sanguineo = ".$tSangre."<br>");
	print("Restriccion = ".$Restriccion."<br>");
	print("Telefono de emergencia = ".$telEmergencia."<br>");
	print("Fecha de nacimiento = ".$fNacimiento."<br>");
	
	
	
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE conductores SET CURP='$CURP',nombre='$Nombre',direccion='$Direccion',donador='$Donador',tSangre='$tSangre',restriccion='$Restriccion',tEmergencia='$telEmergencia',fNacimiento='$fNacimiento' WHERE curp ='$CURP';";
	$cambio = Consulta($Con, $SQL);
	if($cambio == True){
		print("Cambio exitoso");
		header("Location:FUConductores.php?hecho=1");	
	}
	else{
		
		
		print(" 0 tablas afectadas. Cambio fallido");	
		header("Location:FUConductores.php?hecho=0");	
	}
	Desconectar($Con);
 ?>