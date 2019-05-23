<?php 
	//recibimos variables desde el formulario
	$id=$_POST["idA"];
	$idTenencia=$_POST["idN"];
	$Vehiculo  = $_POST["vehiculo"];
	$Year = $_POST["year"];
	$Monto = $_POST["monto"];
	
	print("ID Tenencia = ".$idTenencia."<br>");
	print("Vehiculo = ".$Vehiculo."<br>");
	print("Año = ".$Year."<br>");
	print("Monto = ".$Monto."<br>");
	//enviar instrucciones SQL al SMBD
	include("conexion.php");
	$Con = Conectar();
	$SQL = "UPDATE tenencias SET idTenencia='$idTenencia',vehiculo='$Vehiculo',anio='$Year',monto='$Monto' WHERE idTenencia ='$id';";
	$cambio = Consulta($Con, $SQL);
	if ($cambio == True){
		print("Cambio exitoso");	
	}
	else{
		
		
		print(" 0 tablas afectadas. Cambio fallido");	
	}
	Desconectar($Con);
?>