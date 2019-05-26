<?php 
	//$idTenencia = $_POST["idTenencia"];
	$Vehiculo  = $_POST["vehiculo"];
	$Year = $_POST["year"];
	$Monto = $_POST["monto"];
	
	//print("ID Tenencia = ".$idTenencia."<br>");
	print("Vehiculo = ".$Vehiculo."<br>");
	print("Año = ".$Year."<br>");
	print("Monto = ".$Monto."<br>");

	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Tenencias (vehiculo,anio,monto) VALUES ('$Vehiculo','$Year','$Monto');";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Registro exitoso");	
		header("Location:../html/FTenencias.php?hecho=1");
	}
	else{
		$cont = mysqli_affected_rows($Con);
		print($cont + 1);
		print(" tablas afectadas. Registro fallido");	
		header("Location:../html/FTenencias.php?hecho=0");
	}
	Desconectar($Con);
?>