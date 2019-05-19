<?php
    include("conexion.php");
    $Con = Conectar();
    $username = "jmanuel";
    

    $key = $_FILES['llave'];
    $key['name'] = $username.".txt";
    $name = $key['name'];
    $location = "C:/xampp/htdocs/controlVehicular/php/llaves/";
    $tmp_name = $key['tmp_name'];
	move_uploaded_file($tmp_name, $location.$name);
    $location2 = $location.$username.".txt";
    $manejador = fopen($location2, "r");
	if($manejador){
        while(!feof($manejador)){
            $llave = fgets($manejador);
        }
    }
    else{
        print("Selecciona un archivo");
    }
	fclose($manejador);
?>