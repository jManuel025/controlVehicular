<?php 
	$Calle = $_POST['calle'];
	$Numero = $_POST['numero'];
	$Estado = $_POST['estado'];
	$Municipio = $_POST['municipio'];
	$Tipo = $_POST['tipo'];
	
	$Fecha = $_POST['fecha'];
	$Password = $_POST['password'];	
	print("Calle: ".$Calle."<br>");
	print("Numero: ".$Numero."<br>");
	print("Estado: ".$Estado."<br>");
	
	if(isset($_POST['agua']) || isset($_POST['drenaje']) || isset($_POST['luz'])){
		print("Servicios <br>");
		if(isset($_POST['agua'])){
		print("Agua <br>");
		}
		if(isset($_POST['drenaje'])){
			print("Drenaje <br>");
		}
		if(isset($_POST['luz'])){
			print("Luz <br>");
		}
	}
	else{
		print("No hay servicios <br>");
	}
	
		
	print("Domicilio: ");
	if($_POST['tipo'] != null){
		print($Tipo."<br>");
	}
	
?>