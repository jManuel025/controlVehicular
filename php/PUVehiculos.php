<?php 
error_reporting(0);
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
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE vehiculos SET idVehiculo='$idVehiculoN',propietario='$Propietario',placa='$Placa',tipo='$Tipo',modelo='$Modelo',anio='$Year',uso='$Uso',color='$Color',puerta='$Puertas',marca='$Marca',transmision='$Transmision',capCarga='$capCarga',serie='$Serie',numMotor='$numMotor',linea='$Linea',sublinea='$Sublinea',cilindraje='$Cilindraje',combustible='$Combustible',origen='$Origen' WHERE idVehiculo ='$id';";
	//ODBC
	$dsn = "respaldoVehiculos";
	$user = "";
	$pass = "";
	$odbcCon = odbc_connect($dsn, $user, $pass);
	$odbcSQL = "UPDATE vehiculos SET idVehiculo=$idVehiculoN,propietario='$Propietario',placa='$Placa',tipo='$Tipo',modelo='$Modelo',anio='$Year',uso='$Uso',color='$Color',puerta='$Puertas',marca='$Marca',transmision='$Transmision',capCarga='$capCarga',serie='$Serie',numMotor='$numMotor',linea='$Linea',sublinea='$Sublinea',cilindraje='$Cilindraje',combustible='$Combustible',origen='$Origen' WHERE idVehiculo =$id;";
	$odbcQuery = odbc_exec($odbcCon, $odbcSQL);
	odbc_close($odbcCon);
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