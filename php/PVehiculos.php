<?php 
	// $idVehiculo = $_POST['idVehiculo'];
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
	
	// print("ID Vehiculo = ".$idVehiculo."<br>");
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
	$SQL = "INSERT INTO Vehiculos VALUES ('','$Propietario','$Placa','$Tipo','$Modelo','$Year','$Uso','$Color','$Puertas','$Marca','$Transmision','$capCarga','$Serie','$numMotor','$Linea','$Sublinea','$Cilindraje','$Combustible','$Origen');";
	$cambio = Consulta($Con, $SQL);
	session_start();
    if ($_SESSION['validacion']) {
		header("refresh:600;url=/html/cerrarSesion.php");
		if ($cambio == True){
			print("Registro exitoso");
			$idVehiculo = mysqli_insert_id($Con);
	
			//ODBC ACCESS
			$dsn = "respaldoVehiculos";
			$user = "";
			$pass = "";
			$odbcCon = odbc_connect($dsn, $user, $pass);
			$odbcSQL = "INSERT INTO vehiculos VALUES ('$idVehiculo','$Propietario','$Placa','$Tipo','$Modelo','$Year','$Uso','$Color','$Puertas','$Marca','$Transmision','$capCarga','$Serie','$numMotor','$Linea','$Sublinea','$Cilindraje','$Combustible','$Origen');";
			$odbcQuery = odbc_exec($odbcCon, $odbcSQL);
			odbc_close($odbcCon);
	
			$vehiculos = new SimpleXMLElement($rutaXML.'vehiculos.xml', null, true);
			$nuevoVehiculo = $vehiculos->addChild('vehiculo');
			$nuevoVehiculo->addChild('idVehiculo', $idVehiculo);
			$nuevoVehiculo->addChild('propietario', $Propietario);
			$nuevoVehiculo->addChild('placa', $Placa);
			$nuevoVehiculo->addChild('tipo', $Tipo);
			$nuevoVehiculo->addChild('modelo', $Modelo);
			$nuevoVehiculo->addChild('anio', $Year);
			$nuevoVehiculo->addChild('uso', $Uso);
			$nuevoVehiculo->addChild('color', $Color);
			$nuevoVehiculo->addChild('puertas', $Puertas);
			$nuevoVehiculo->addChild('marca', $Marca);
			$nuevoVehiculo->addChild('transmision', $Transmision);
			$nuevoVehiculo->addChild('capCarga', $capCarga);
			$nuevoVehiculo->addChild('serie', $Serie);
			$nuevoVehiculo->addChild('numMotor', $numMotor);
			$nuevoVehiculo->addChild('linea', $Linea);
			$nuevoVehiculo->addChild('sublinea', $Sublinea);
			$nuevoVehiculo->addChild('cilindraje', $Cilindraje);
			$nuevoVehiculo->addChild('combustible', $Combustible);
			$nuevoVehiculo->addChild('origen', $Origen);
			$vehiculos->asXML($rutaXML.'vehiculos.xml');
			include('formatoTarjeta.php');
			header("Location:../html/FVehiculos.php?hecho=1");
		}
		else{
			$cont = mysqli_affected_rows($Con);
			print($cont + 1);
			print(" tablas afectadas. Registro fallido");	
			header("Location:../html/FVehiculos.php?hecho=0");
		}
    } else {
        header("Location: ../html/FAcceso.php");
	}	
	Desconectar($Con);
?>