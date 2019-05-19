<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body> -->

<?php include("../html/headerNav.php") ?>
<div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>Criterio
			<input name="criterio" type="text" id="criterio" />
		</label><br>
		<label>Buscar en:
			<select name="atributo">
				<option value="CURP">CURP</option>
				<option value="nombre">Nombre</option>
				<option value="direccion">Direccion</option>
				<option value="firma">Firma</option>
				<option value="donador">Donador</option>
				<option value="tSangre">Grupo sanguíneo</option>
				<option value="restriccion">Resticcion</option>
				<option value="tEmergencia">Teléfono de emergencia</option>
				<option value="fNacimiento">Fecha de nacimiento</option>
			</select>
		</label>
		<p>
			<label>
				<input type="submit" name="Submit" value="Buscar" />
			</label>
		</p>
	</form>
</div>
</body>

</html>
<!-- </body>
</html> -->

<?php
if (isset($_POST['criterio']) && isset($_POST['atributo'])) {
	$criterio = $_POST['criterio'];
	$atributo = $_POST['atributo'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "SELECT * FROM Conductores WHERE $atributo LIKE '$criterio';";
	$query = Consulta($con, $SQL);
	echo "<table border = 1px>";
	echo "<tr>
			<th>CURP</th>
		    <th>Nombre</th>
		    <th>Direccion</th>
		    <th>Firma</th>
		    <th>Donador</th>
		    <th>Grupo sanguíneo</th>
		    <th>Restricciones</th>
		    <th>Teléfono de emergencia</th>
		    <th>Fecha de nacimiento</th>
		</tr>";
	$cantFilas = mysqli_num_rows($query);
	for ($f = 0; $f < $cantFilas; $f++) {
		echo "<tr>";
		$fila = mysqli_fetch_row($query);
		foreach ($fila as $columna) {
			echo "<td> $columna </td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	print($cantFilas . " fila encontrada");
}
?>