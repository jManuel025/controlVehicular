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
    <title>Front Proyecto Final</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/-Filterable-Cards-.css">
    <link rel="stylesheet" href="../assets/css/News-Cards.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-1.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-2.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu-3.css">
    <link rel="stylesheet" href="../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div id="wrapper">
        <div class="flex-grow-0" id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> <a class="text-center logo" href="../index.php" style="color: #8fb8e4;">Sistema de control vehicular</a></li>
                <li> <a href="menuConductores.php">Conductores</a></li>
                <li> <a href="menuLicencias.php">Licencias</a></li>
                <li> <a href="menuMultas.php">Multas</a></li>
                <li> <a href="menuPropietarios.php">Propietarios</a></li>
                <li> <a href="FTenencias.php">Tenencias</a></li>
                <li> <a href="menuVehiculos.php">Vehiculos</a></li>
                <li> <a href="menuVerificaciones.php">Verificaciones</a></li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
                <div class="d-flex justify-content-between align-items-center up-bar" style="background-color: #6387A6;height: 50px;"><a class="btn btn-link flex-grow-0" role="button" id="menu-toggle" href="#menu-toggle"><i class="fa fa-bars" style="color: #ffffff;font-size: 32px;"></i></a>
                    <div class="dropdown" style="margin-right: 10px;"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background-color: rgba(0,0,0,0);border-color: rgba(0,0,0,0);font-size: 28px;height: 49px;"><i class="fa fa-user"></i></button>
                        <div
                            class="dropdown-menu dropdown-menu-left" role="menu" style="padding-right: 0px;margin-right: 50px;"><a class="dropdown-item" role="presentation" href="#">Ver usuario</a><a class="dropdown-item" role="presentation" href="cerrarSesion.php">Cerrar sesion</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="margin: 10px 0px 0px 10px;">
                        <h1 class="text-center">Licencias</h1>
                    </div>
                </div>
            </div><div class="contenido">
  <form action="../php/PLicencias.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <h3>Proceso de Altas</h3>
    <div class="row datos-principales">
        <div class="col">
        <label>
      <p>Conductor:</p>
      <input name="conductor" type="text" id="conductor" required="" placeholder="AAAA000000AAAAAA00">
    </label>
        </div>
      </div>
    <div class="firma">
      <p>Foto:</p>
      <div class="file">
        <p>Seleccionar archivo</p>
        <!-- <label for="firma">Seleccionar archivo</label> -->
        <input type="file" name="foto" id="foto" required="">
      </div>
    </div>
    <div class="row datos-principales">
        <div class="col"></div>
        
        <div class="col">
            <label>
            <p class="select">Tipo</p>
            <select name="tipo" id="tipo">
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>D</option>
                <option>E</option>
            </select>
            </label>
        </div>
        <div class="col"></div>
    </div>
    <div class="row datos-final">
        <div class="col"></div>
        <div class="col">
            <label>
            <p class="select">Duracion</p>
                 <input name="duracion" type="radio" value="3" id="3" checked="">
                 <label for="3">3 años</label>
                 <input name="duracion" type="radio" value="5" id="5">
                 <label for="3">5 años</label>
            </label>
        </div>
        <div class="col">    
            <label>
            <p>Lugar:</p>
            <input name="lugar" type="text" id="lugar" required="" placeholder="Querétaro">
            </label>
        </div>
        <div class="col">    
            <label>
            <p>Expide:</p>
            <input name="expide" type="text" id="expide" required="" placeholder="Gobierno de Querétaro">
            </label>
        </div>
        <div class="col"></div>
      </div>
    <div class="row">
        <div class="col">
            <input type="submit" name="Submit" value="Registrar" class="btn btn-primary">
        </div>
    </div>
  </form>
</div>



<?php 
if(isset($_GET["hecho"])){
if($_GET["hecho"]==1){
  print("Registro realizado con éxito");

}elseif ($_GET["hecho"]==0) {
  print("Error en el registro");
} } 
?>

</div>
    </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Cards-.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>