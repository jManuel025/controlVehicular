<?php
session_start();
if ($_SESSION['validacion']) {
    header("refresh:600;url=/html/cerrarSesion.php");
} else {
    header("Location: ../html/FAcceso.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistema de Control Vehicular</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/-Filterable-Cards-.css">
    <link rel="stylesheet" href="../assets/css/News-Cards.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-2.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-3.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div class="flex-grow-0" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a class="text-center logo" href="../index.php" style="color: #8fb8e4;">Sistema de control vehicular</a></li>
                <li> <a href="../HTML/menuConductores.php">Conductores</a></li>
                <li> <a href="../HTML/menuLicencias.php">Licencias</a></li>
                <li> <a href="../HTML/menuMultas.php">Multas</a></li>
                <li> <a href="../HTML/menuPropietarios.php">Propietarios</a></li>
                <li> <a href="../HTML/menuTenencias.php">Tenencias</a></li>
                <li> <a href="../HTML/menuVehiculos.php">Vehiculos</a></li>
                <li> <a href="../HTML/menuVerificaciones.php">Verificaciones</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                <div class="d-flex justify-content-between align-items-center up-bar" style="background-color: #6387A6;height: 50px;"><a class="btn btn-link flex-grow-0" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars" style="color: #ffffff;font-size: 32px;"></i></a>
                    <div class="dropdown" style="margin-right: 10px;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgba(0,0,0,0);border-color: rgba(0,0,0,0);font-size: 28px;height: 49px;"><i class="fa fa-user"></i></button>
                        <div
                            class="dropdown-menu dropdown-menu-left" role="menu" style="padding-right: 0px;margin-right: 50px;"><a class="dropdown-item" role="presentation" href="#">Ver usuario</a><a class="dropdown-item" role="presentation" href="../html/cerrarSesion.php">Cerrar sesion</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="margin: 10px 0px 0px 10px;">
                        <h1>Vehiculos</h1>
                        <h4 style="color: rgb(122,125,129);">Consultas</h4>
                    </div>
                </div>
            </div>
            <div><div class="contenido">
	<form id="form1" name="form1" method="post" action="">
		<label>Criterio
			<input name="criterio" type="text" id="criterio">
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
				<input type="submit" name="Submit" value="Buscar" class="btn btn-primary">
			</label>
		</p>
	</form>
</div>
<?php
error_reporting(0);
if (isset($_POST['criterio']) && isset($_POST['atributo'])) {
	$criterio = $_POST['criterio'];
	$atributo = $_POST['atributo'];
	include("conexion.php");
	$con = Conectar();
	$SQL = "SELECT * FROM Vehiculos WHERE $atributo LIKE '$criterio';";
	$query = Consulta($con, $SQL);
	print_r($SQL);
	?><div class="table-responsive">
<table class="tableC">
		<thead><tr>
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
            </tr></thead><tbody><?php
	$cantFilas = mysqli_num_rows($query);
	for ($f = 0; $f < $cantFilas; $f++) {
		?><tr><?php
		$fila = mysqli_fetch_row($query);
		foreach ($fila as $columna) {
			echo "<td> $columna </td>";
		}
		?></tr><?php
	}
?></tbody></table></div><?php
	print($cantFilas . " fila encontrada");
}
?></div>
        </div>
    </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Cards-.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>