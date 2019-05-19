<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body> -->
<?php include("../html/headerNav.php")?>
    <div class="contenido">
		<form id="form1" name="form1" method="post" action="">
			<label>Criterio
			<input name="criterio" type="text" id="criterio" />
			</label><br>
			<label>Buscar en:
				<select name="atributo">
				<option value="folio">Folio</option>
				<option value="vehiculo">Vehiculo</option>
				<option value="licencia">Licencia</option>
				<option value="monto">Monto</option>
				<option value="lugar">Lugar</option>
				<option value="fecha">Fecha</option>
				<option value="motivo">Motivo</option>
				<option value="idOficial">ID oficial</option>
				<option value="hora">Hora</option>
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
	if(isset($_POST['criterio']) && isset($_POST['atributo'])){
		$criterio = $_POST['criterio'];
		$atributo = $_POST['atributo'];
		include("conexion.php");
		$con = Conectar();
		$SQL = "SELECT * FROM Multas WHERE $atributo LIKE '$criterio';";
		$query = Consulta($con, $SQL);
		echo "<table border = 1px>";
		echo "<tr>
			<th>Folio</th>
		    <th>Vehiculo</th>
		    <th>Licencia</th>
		    <th>Monto</th>
		    <th>Lugar</th>
		    <th>Fecha</th>
		    <th>Motivo</th>
		    <th>ID oficial</th>
		    <th>Hora</th>
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