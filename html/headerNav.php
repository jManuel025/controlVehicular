<?php
session_start();
if ($_SESSION['validacion']) {
    // print($_SESSION['username']);
    header("refresh:600;url=../html/cerrarSesion.php");
} else {
    header("Location: ../html/FAcceso.php");
}
// print("<br><a href = '../html/cerrarSesion.php'>Cerrar sesión</a>");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="../assets/css/estilos.css"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> -->
    <title>Control Vehicular</title>
</head>

<body>
    <div class="encabezado">
        <a href = '../html/cerrarSesion.php'>Cerrar sesión</a>
    </div>
    <div class="lateral">
        <a href="../html/menu.php">Inicio</a>
        <a href="../html/menuConductores.php">Conductores</a>
        <a href="../html/menuLicencias.php">Licencias</a>
        <a href="../html/menuMultas.php">Multas</a>
        <a href="../html/menuPropietarios.php">Propietarios</a>
        <a href="../html/menuTenencias.php">Tenencias</a>
        <a href="../html/menuVehiculos.php">Vehiculos</a>
        <a href="../html/menuVerificaciones.php">Verificaciones</a>
    </div>