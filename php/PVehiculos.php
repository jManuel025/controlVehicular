<?php 
	$idVehiculo = $_POST["idVehiculo"];
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
	
	print("ID Vehiculo = ".$idVehiculo."<br>");
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
	$SQL = "INSERT INTO Vehiculos VALUES ('$idVehiculo','$Propietario','$Placa','$Tipo','$Modelo','$Year','$Uso','$Color','$Puertas','$Marca','$Transmision','$capCarga','$Serie','$numMotor','$Linea','$Sublinea','$Cilindraje','$Combustible','$Origen');";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Registro exitoso");	
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
	}
	Desconectar($Con);
?>