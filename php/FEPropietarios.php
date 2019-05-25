<?php include("../html/headerNav.php") ?>
<div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>Propietario
			<input name="RFC" type="text" id="RFC" />
		</label>
		<p>
			<label>
				<input name="eliminar" type="submit" id="eliminar" value="Eliminar" />
			</label>
		</p>
	</form>
</div>
</body>

</html>
<?php
if (isset($_POST['RFC'])) {
	$RFC = $_POST['RFC'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "DELETE FROM Propietarios WHERE RFC = '$RFC';";
	Consulta($con, $SQL);
	$eliminacion = mysqli_affected_rows($con);
	if ($eliminacion < 0) {
		$eliminacion += 1;
		print($eliminacion . " eliminaciones realizadas, Eliminación fallida");
	} else {
		print($eliminacion . " eliminaciones realizadas, Eliminación exitosa");
	}
	Desconectar($con);
}
?>