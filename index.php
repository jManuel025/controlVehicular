<?php
session_start();
if ($_SESSION['validacion']) {
    header("refresh:600;url=html/cerrarSesion.php");
} else {
    header("Location: ./html/FAcceso.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistema de control vehicular</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/-Filterable-Cards-.css">
    <link rel="stylesheet" href="assets/css/News-Cards.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-2.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu-3.css">
    <link rel="stylesheet" href="assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="wrapper">
        <div class="flex-grow-0" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a class="text-center logo" href="#" style="color: #8fb8e4;">Sistema de control vehicular</a></li>
                <li> <a href="html/menuConductores.php">Conductores</a></li>
                <li> <a href="html/menuLicencias.php">Licencias</a></li>
                <li> <a href="html/menuMultas.php">Multas</a></li>
                <li> <a href="html/menuPropietarios.php">Propietarios</a></li>
                <li> <a href="html/menuTenencias.php">Tenencias</a></li>
                <li> <a href="html/menuVehiculos.php">Vehiculos</a></li>
                <li> <a href="html/menuVerificaciones.php">Verificaciones</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                <div class="d-flex justify-content-between align-items-center up-bar" style="background-color: #6387A6;height: 50px;"><a class="btn btn-link flex-grow-0" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars" style="color: #ffffff;font-size: 32px;"></i></a>
                    <div class="dropdown" style="margin-right: 10px;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgba(0,0,0,0);border-color: rgba(0,0,0,0);font-size: 28px;height: 49px;"><i class="fa fa-user"></i></button>
                        <div
                            class="dropdown-menu dropdown-menu-left" role="menu" style="padding-right: 0px;margin-right: 50px;"><a class="dropdown-item" role="presentation" href="#">Ver usuario</a><a class="dropdown-item" role="presentation" href="html/cerrarSesion.php">Cerrar sesion</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="margin: 10px 0px 0px 10px;">
                        <h1>Inicio</h1>
                    </div>
                    
                </div>
            </div>
            <div>
                <div class="card" style="height:85vh;">
                    <img src="./assets/img/escudo.png" alt="" style="width: 600px; margin:auto;">
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/-Filterable-Cards-.js"></script>
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>