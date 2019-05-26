<?php include("../html/headerNav.php") ?>
<div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>ID Tenencia
			<input name="idTenencia" type="text" id="idTenencia" />
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
if (isset($_POST['idTenencia'])) {
	$idTenencia = $_POST['idTenencia'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "DELETE FROM Tenencias WHERE idTenencia = '$idTenencia';";
	Consulta($con, $SQL);
	$eliminacion = mysqli_affected_rows($con);
	if ($eliminacion == 0) {
		
		print($eliminacion . " eliminaciones realizadas, Eliminación fallida");
	} else {
		print($eliminacion . " eliminaciones realizadas, Eliminación exitosa");
	}
	Desconectar($con);
}
?>