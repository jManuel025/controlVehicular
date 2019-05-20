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
	$SQL = "UPDATE vehiculos SET idVehiculo='$idVehiculoN',propietario='$Propietario',placa='$Placa',tipo='$Tipo',modelo='$Modelo',anio='$Year',uso='$Uso',color='$Color',puerta='$Puertas',marca='$Marca',transmision='$Transmision',capCarga='$capCarga',serie='$Serie',numMotor='$numMotor',linea='$Linea',sublinea='$Sublinea',cilindraje='$Cilindraje',combustible='$Combustible',origen='$Origen' WHERE idVehiculo ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
	}
	else{
		
		
		print(" 0 tablas afectadas. Cambio fallido");	
	}
	Desconectar($Con);
 ?>