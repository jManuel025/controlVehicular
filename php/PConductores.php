<?php
error_reporting(0);
	$CURP = $_POST["curp"];
	$Nombre = $_POST["nombre"];
	$Direccion = $_POST["direccion"];
	$Firma = $_FILES['firma'];
	$prevExt = explode(".", $Firma['name']);
	$extension = end($prevExt);
	$Firma['name'] = $CURP.".".$extension;
	$name = $Firma['name'];
	$location = 'C:/xampp/htdocs/controlVehicular/firmas/';
	$tmp_name = $Firma['tmp_name'];
	move_uploaded_file($tmp_name, $location.$name);
	$location2=$location.$CURP.".".$extension;
	$Foto = $_FILES['foto'];
	$prevExtF = explode(".", $Foto['name']);
	$extensionF = end($prevExtF);
	$Foto['name'] = $CURP.".".$extensionF;
	$nameF = $Foto['name'];
	$locationF = 'C:/xampp/htdocs/controlVehicular/fotos/';
	$tmp_nameF = $Foto['tmp_name'];
	move_uploaded_file($tmp_nameF, $locationF.$nameF);
	$location2F = $locationF.$CURP.".".$extensionF;
	$Donador = $_POST["donador"];
	$tSangre = $_POST["tSangre"];
	$Restriccion = $_POST["restriccion"];
	$telEmergencia = $_POST["telEmergencia"];
	$fNacimiento = $_POST["fNacimiento"];
	include("conexion.php");
	$Con = Conectar();
	$SQL = "INSERT INTO Conductores VALUES ('$CURP','$Nombre','$Direccion','$location2','$Donador','$tSangre','$Restriccion','$telEmergencia','$fNacimiento', '$location2F');";
	$cambio = Consulta($Con, $SQL);
	session_start();
    if ($_SESSION['validacion']) {
		header("refresh:600;url=/html/cerrarSesion.php");
			if ($cambio == True){
				print("Registro exitoso");	
				header("Location:../html/FConductores.php?hecho=1");
			}
			else{
				$cont = mysqli_affected_rows($Con);
				print($cont + 1);
				print(" tablas afectadas. Registro fallido");	
				header("Location:../html/FConductores.php?hecho=0");
			}
    } else {
        header("Location: ../html/FAcceso.php");
    }
	Desconectar($Con);
?>