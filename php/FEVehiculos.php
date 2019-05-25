<?php include("../html/headerNav.php") ?>
<div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>ID Vehiculo
			<input name="idVehiculo" type="text" id="idVehiculo" />
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
if (isset($_POST['idVehiculo'])) {
	$idVehiculo = $_POST['idVehiculo'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "DELETE FROM Vehiculos WHERE idVehiculo = '$idVehiculo';";
	Consulta($con, $SQL);
	$eliminacion = mysqli_affected_rows($con);
	if ($eliminacion < 0) {
		// $eliminacion += 1;
		print($eliminacion . " eliminaciones realizadas, Eliminación fallida");
	} else {
		// $eliminacion += 1;
		print($eliminacion . " eliminaciones realizadas, Eliminación exitosa");
		$vehiculosB = new SimpleXMLElement('C:\xampp\htdocs\controlVehicular\temp\XML\vehiculosB.xml', null, true);
		$bajaVehiculo = $vehiculosB->addChild('bajasID');
		$bajaVehiculo->addChild('idBaja', $idVehiculo);
		$vehiculosB->asXML('C:\xampp\htdocs\controlVehicular\temp\XML\vehiculosB.xml');
	}
	Desconectar($con);
}
?>