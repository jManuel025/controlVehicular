<?php include("../html/headerNav.php")?>
    <div class="contenido">
		<form id="form1" name="form1" method="post" action="">
			<label>Criterio
			<input name="criterio" type="text" id="criterio" />
			</label><br>
			<label>Buscar en:
				<select name="atributo">
				<option value="RFC">RFC</option>
				<option value="CURP">CURP</option>
				<option value="nombre">Nombre</option>
				<option value="direccion">Dirección</option>
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
<?php 
	if(isset($_POST['criterio']) && isset($_POST['atributo'])){
		$criterio = $_POST['criterio'];
		$atributo = $_POST['atributo'];
		include("conexion.php");
		$con = Conectar();
		$SQL = "SELECT * FROM Propietarios WHERE $atributo LIKE '$criterio';";
		$query = Consulta($con, $SQL);
		print_r($SQL);
		echo "<table border = 1px>";
		echo "<tr>
			<th>RFC</th>
		    <th>CURP</th>
		    <th>Nombre</th>
		    <th>Direccion</th>
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