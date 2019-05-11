<?php
	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	print("Username: ".$username."</br>");
	print("Password: ".$password."</br>");
	
	include("conexion.php");
	$conexion = Conectar();
	$SQL = "SELECT * FROM Usuarios WHERE username = '$username';";
	$query = Consulta($conexion,$SQL);
	$n = mysqli_num_rows($query);
	if($n == 0){
		print("No se encontró ningun usuario");
		header("Location: error.html");
	}
	else{
		print("realiza validacion de contra</br>");
		$fila = mysqli_fetch_row($query);
		if($fila[1] == $password){
			print("Contraseña correcta</br>");
			$SQL4 = "UPDATE Usuarios SET intento = 0 WHERE username = '$username';";
			Consulta($conexion,$SQL4);
			if($fila[2] == 1){
				print("Acceso concedido</br>");
				$_SESSION['username'] = $username; //asigna valor a variable global
				$_SESSION['validacion'] = True;
				$_SESSION['tiempo'] = time();
				header("Location: menuPrincipal.php");
			}
			else{
				print("Usuario bloqueado</br>");
				header("Location: error.html");
			}
		}
		else{
			if($fila[2] == 1){
				if($fila[3] > 2){
					$SQL3 = "UPDATE Usuarios SET estado = 0, intento = 0 WHERE username = '$username'";
					Consulta($conexion,$SQL3);
					print("Se ha bloqueado tu acceso");
					header("Location: error.html");
				}
				else{
					print("Contraseña incorrecta</br>");
					$intentos = $fila[3] + 1;
					print("Intentos: ".$intentos."</br>");
					$SQL2 = "UPDATE Usuarios SET intento = '$intentos' WHERE username = '$username';";
					Consulta($conexion,$SQL2);
					header("Location: error.html");
				}
			}
			else{
				print("El usuario se encuentra bloqueado");
				header("Location: error.html");
			}
		}
	}
	Desconectar($conexion);
?> 