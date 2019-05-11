<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <label>Criterio
  <input name="criterio" type="text" id="criterio" />
  </label><br>
  <label>Buscar en:
  	<select name="atributo">
		<option value="idVehiculo">ID</option>
		<option value="propietario">Propietario</option>
		<option value="placa">Placa</option>
		<option value="tipo">Tipo</option>
		<option value="modelo">Modelo</option>
		<option value="anio">Año</option>
		<option value="uso">Uso</option>
		<option value="color">Color</option>
		<option value="puerta">Puertas</option>
		<option value="marca">Marca</option>
		<option value="transmision">Transmision</option>
		<option value="capCarga">Capacidad de carga</option>
		<option value="serie">Serie</option>
		<option value="numMotor">Número de motor</option>
		<option value="linea">Línea</option>
		<option value="sublinea">Sublínea</option>
		<option value="cilindraje">cilindraje</option>
		<option value="combustible">Combustible</option>
		<option value="origen">Origen</option>
	</select>
  </label>
  <p>
    <label>
    <input type="submit" name="Submit" value="Buscar" />
    </label>
  </p>
</form>
</body>
</html>

<?php 
	if(isset($_POST['criterio']) && isset($_POST['atributo'])){
		$criterio = $_POST['criterio'];
		$atributo = $_POST['atributo'];
		include("conexion.php");
		$con = Conectar();
		$SQL = "SELECT * FROM Vehiculos WHERE $atributo LIKE '$criterio';";
		$query = Consulta($con, $SQL);
		print_r($SQL);
		echo "<table border = 1px>";
		echo "<tr>
			<th>ID</th>
		    <th>Propietario</th>
		    <th>Placa</th>
		    <th>Tipo</th>
		    <th>Modelo</th>
		    <th>Año</th>
		    <th>Uso</th>
		    <th>Color</th>
		    <th>Puerta</th>
		    <th>Marca</th>
		    <th>Transmision</th>
		    <th>Capacidad de carga</th>
		    <th>Serie</th>
		    <th>#Motor</th>
		    <th>Línea</th>
		    <th>Sublínea</th>
		    <th>Cilindraje</th>
		    <th>Combustible</th>
		    <th>Origen</th>
		</tr>";
		$cantFilas = mysqli_num_rows($query);
		for($f = 0; $f < $cantFilas; $f++){
			echo "<tr>";
			$fila = mysqli_fetch_row($query);
			foreach ($fila as $columna) {
				echo "<td> $columna </td>";
			}
			echo "</tr>";
		}
		echo"</table>";
		print($cantFilas." fila encontrada");
	}
?>