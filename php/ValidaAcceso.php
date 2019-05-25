<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sistema de Control Vehicular</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css" media="all">
</head>

<body id="iniciar">
  <div id="logo">
        <a href="index.php">
          Sistema de Control Vehicular
        </a>
  </div>
  <div id="login" class="bloque">
    <h3>Identificate</h3>
    <form id="inicio" name="form1" method="post" action="ValidaAcceso.php">
      <label>Username
      <input name="username" type="text" id="username" />
      </label>
      <p>
        <label>Password
        <input name="password" type="text" id="password" />
        </label>
      </p>
      <p> 
        <label>
        <input type="submit" name="Submit" value="Entrar" />
        </label>
      </p>
    </form>
  </div>
</body>
</html>
 -->

<?php
include("../html/FAcceso.php");
session_start();
include("conexion.php");
$Con = Conectar();
$username = $_POST['username'];
$password = $_POST['password'];
$key = $_FILES['llave'];

// $key['name'] = $username.".txt";
// $name = $key['name'];
// $location = "C:/xampp/htdocs/controlVehicular/php/llaves/";
$tmp_name = $key['tmp_name'];
// move_uploaded_file($tmp_name, $location.$name);
// $location2 = $location.$username.".txt";
$manejador = fopen($tmp_name, "r");
if($manejador){
	while(!feof($manejador)){
			$llave = fgets($manejador);
	}
	fclose($manejador);
}
else{
	print("Selecciona un archivo");
}





//print("Userame: " . $username."<br>");
//print("Pass: " . $password."<br>");
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
				header("Location:../index1.php");
				//CAMBIAR A PLANTILLA
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
			//AQUI
			//print("Tu usuario está bloqueado<br>");
			//setcookie("intento",$intentosRes,time+5);
			//header("Location:error.html");
			echo "<div id='error'>
					<p>Usuario bloqueado</p>
				</div>";
		} else {
			if ($intentos < 3) {
				//AQUI
				$SQL2 = "Update usuarios set intento='$intentos' where username='$username';";
				$Consulta2 = Consulta($Con, $SQL2);
				//print("Te quedan: ".$intentosRes. " intentos<br>");
				echo "<div id='error'>
						<p>Usuario o contraseña incorrecta quedan " . $intentosRes . " intentos </p>
					</div>";
			} else {
				//AQUI
				//print("Tu usuario quedó Bloqueado");
				$SQL2 = "Update usuarios set intento='0', estado='0' where username='$username';";
				$Consulta2 = Consulta($Con, $SQL2);
				//header("Location:error.html");
				echo "<div id='error'>
					<p>Usuario bloqueado</p>
					</div>";
			}
		}
	}
}

Desconectar($Con);



?>