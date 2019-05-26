<?php 
	$id = $_POST["idVehiculoV"];
	$idVehiculoN = $_POST["idVehiculoN"];
	$Propietario = $_POST["propietario"];
	$Placa = $_POST["placa"];
	$Tipo = $_POST["tipo"];
	$Modelo = $_POST["modelo"];
	$Year = $_POST["year"];
	$Uso = $_POST["uso"];
	$Color = $_POST["color"];
	$Puertas = $_POST["puertas"];
	$Marca = $_POST["marca"];
	$Transmision = $_POST["transmision"];
	$capCarga = $_POST["capCarga"];
	$Serie = $_POST["serie"];
	$numMotor = $_POST["numMotor"];
	$Linea = $_POST["linea"];
	$Sublinea = $_POST["sublinea"];
	$Cilindraje = $_POST["cilindraje"];
	$Combustible = $_POST["combustible"];
	$Origen = $_POST["origen"];
	
	print("ID Vehiculo = ".$idVehiculoN."<br>");
	print("Propietario = ".$Propietario."<br>");
	print("Placa = ".$Placa."<br>");
	print("Tipo = ".$Tipo."<br>");
	print("Modelo = ".$Modelo."<br>");
	print("Año = ".$Year."<br>");
	print("Uso = ".$Uso."<br>");
	print("Color = ".$Color."<br>");
	print("Puertas = ".$Puertas."<br>");
	print("Marca = ".$Marca."<br>");
	print("Transmision = ".$Transmision."<br>");
	print("Capacidad de Carga = ".$capCarga."<br>");
	print("Serie = ".$Serie."<br>");
	print("Numero de motor = ".$numMotor."<br>");
	print("Linea = ".$Linea."<br>");
	print("Sublinea = ".$Sublinea."<br>");
	print("Cilindraje = ".$Cilindraje."<br>");
	print("Combustible = ".$Combustible."<br>");
	print("Origen = ".$Origen."<br>");
	
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE vehiculos SET idVehiculo='$idVehiculoN',propietario='$Propietario',placa='$Placa',tipo='$Tipo',modelo='$Modelo',anio='$Year',uso='$Uso',color='$Color',puerta='$Puertas',marca='$Marca',transmision='$Transmision',capCarga='$capCarga',serie='$Serie',numMotor='$numMotor',linea='$Linea',sublinea='$Sublinea',cilindraje='$Cilindraje',combustible='$Combustible',origen='$Origen' WHERE idVehiculo ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
		$vehiculosC = new SimpleXMLElement($rutaXML.'vehiculosC.xml', null, true);
		$cambioVehiculo = $vehiculosC->addChild('cambiosID');
		$cambioVehiculo->addChild('idCambio', $id);
		$vehiculosC->asXML($rutaXML.'vehiculosC.xml');
		header("Location:FUVehiculos.php?hecho=1");	
	}
	else{
		
		
		print(" 0 tablas afectadas. Cambio fallido");	
		header("Location:FUVehiculos.php?hecho=0");	
	}
	Desconectar($Con);
 ?>