<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label>CURP
  <input name="curp" type="text" id="curp" />
  </label>
  <p>
    <label>
    <input name="eliminar" type="submit" id="eliminar" value="Eliminar" />
    </label>
  </p>
</form>
</body>
</html>

<?php
	if(isset($_POST['curp'])){
		$CURP = $_POST['curp'];
		include("conexion.php");
		$con = Conectar();
		$SQL = "DELETE FROM Conductores WHERE CURP = '$CURP';";
		Consulta($con, $SQL);
		$eliminacion = mysqli_affected_rows($con);
		if($eliminacion < 0){
			$eliminacion += 1;
			print($eliminacion." eliminaciones realizadas, Eliminación fallida");
		}
		else{
			print($eliminacion." eliminaciones realizadas, Eliminación exitosa");
		}
		Desconectar($con);
	}
?>
