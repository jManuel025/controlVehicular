<?php include("../html/headerNav.php") ?>
<div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>ID Verificacion
			<input name="idVerificacion" type="text" id="idVerificacion" />
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
if (isset($_POST['idVerificacion'])) {
	$idVerificacion = $_POST['idVerificacion'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "DELETE FROM Verificaciones WHERE idVerificacion = '$idVerificacion';";
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