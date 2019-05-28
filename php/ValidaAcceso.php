<?php
error_reporting(0);
// include("../html/FAcceso.php");
session_start();
include("conexion.php");
$Con = Conectar();
$username = $_POST['username'];
$password = $_POST['password'];
$key = $_FILES['llave'];
$tmp_name = $key['tmp_name'];
$manejador = fopen($tmp_name, "r");
if($manejador){
	while(!feof($manejador)){
		$llave = fgets($manejador);
	}
	fclose($manejador);
}
else{
	echo "<div id='error'>	
		  	<p>Selecciona un archivo</p>
		  </div>";
}
$SQL = "SELECT * FROM Usuarios WHERE username = '$username';";
$Consulta = Consulta($Con, $SQL);
$n = mysqli_num_rows($Consulta);
if ($n == 0) {
	echo "<div id='error'>
			<p>Usuario no encontrado</p>
		</div>";
} else {
	//print("Realizar validacion de contraseña <br>");
	$fila = mysqli_fetch_row($Consulta);
	if ($fila[1] == $password) {
		//print("Contraseña correcta<br>");
		if ($fila[4] == $llave) { //Valida key
			if ($fila[2] == 1) {
				//print("Inicio de sesion correcto");
				$SQL2 = "UPDATE usuarios SET intento='0' WHERE username='$username';";
				$Consulta2 = Consulta($Con, $SQL2);

				$_SESSION['username'] = $username;
				$_SESSION['validacion'] = True;
				$_SESSION['tiempo'] = time();
				header("Location:../index.php");
			} else {
				echo "<div id='error'>
					<p>Usuario bloqueado</p>
				</div>";
			}
		} else {
			echo "<div id='error'>
					<p>Clave incorrecta</p>
				</div>";
		}
	} else {
		//print("Contraseña incorrecta <br>");
		$intento = $fila[3];
		$intentos = $intento + 1;
		$intentosRes = 3 - $intentos;
		if ($fila[2] == 0) {
			echo "<div id='error'>
					<p>Usuario bloqueado</p>
				</div>";
		} else {
			if ($intentos < 3) {
				$SQL2 = "Update usuarios set intento='$intentos' where username='$username';";
				$Consulta2 = Consulta($Con, $SQL2);
				echo "<div id='error'>
						<p>Usuario o contraseña incorrecta quedan " . $intentosRes . " intentos </p>
					</div>";
			} else {
				$SQL2 = "Update usuarios set intento='0', estado='0' where username='$username';";
				$Consulta2 = Consulta($Con, $SQL2);
				echo "<div id='error'>
					<p>Usuario bloqueado</p>
					</div>";
			}
		}
	}
}
Desconectar($Con);
