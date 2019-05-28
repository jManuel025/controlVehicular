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
                <li> <a href="menuTenencias.php">Tenencias</a></li>
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
                        <h1 class="text-center">Conductores</h1>
                    </div>
                </div>
            </div><div class="contenido">
  <form method="post" action="../php/PVehiculos.php" enctype="multipart/form-data">
    <h3>Vehículos</h3>
    <div class="row datos-principales">
        <!-- <div class="col">
            <label>
            <p>ID Vehiculo:</p>
            <input name="idVehiculo" type="number" id="idVehiculo" disabled="">
            </label>
        </div> -->
        <div class="col">
            <label>
            <p>Propietario:</p>
            <input name="propietario" type="text" id="propietario" required="">
            </label>
        </div>
        <div class="col">
            <label>
            <p>Placa:</p>
            <input name="placa" type="text" id="placa" required="">
            </label>
        </div>
        <div class="col">
            <label>
            <p>Tipo:</p>
            <input name="tipo" type="text" id="tipo" required="">
            </label>
        </div>
     </div>
     <div class="row datos-principales">
         <div class="col">
    <label>
      <p>Modelo:</p>
      <input name="modelo" type="text" id="modelo" required="">
    </label>
         </div>
         <div class="col">
    <label>
      <p>Año:</p>
      <input name="year" type="number" id="year" required="" min="1900" max="2100" step="1">
    </label>
         </div>
    <div class="col uso">
      <p>Uso:</p>
      <div class="radio">
        <input name="uso" type="radio" value="Particular" id="particular">
        <label for="particular">Particular</label>
        <input name="uso" type="radio" value="Comercial" id="comercial">
        <label for="comercial">Comercial</label>
      </div>
    </div>
    <div class="col">
    <label>
      <p>Color:</p>
      <input name="color" type="text" id="color" required="">
    </label>
         </div>
      </div>
      <div class="row datos-principales">
          <div class="col">
    <label>
      <p>Puertas:</p>
      <input name="puertas" type="number" id="puertas" min="1" max="4">
    </label>
          </div>
          <div class="col">
    <label>
      <p>Marca:</p>
      <input name="marca" type="text" id="marca">
    </label>
          </div>
    <div class="col uso">
      <p>Transmisión:</p>
      <div class="radio">
        <input name="transmision" type="radio" value="Automático" id="auto">
        <label for="auto">Automatico</label>
        <input name="transmision" type="radio" value="Estándar" id="stan">
        <label for="stan">Estandar</label>
      </div>
    </div>
    <div class = "col">
    <label>
      <p>Capacidad de carga:</p>
      <input name="capCarga" type="number" id="capCarga">
    </label>
          </div>
      </div>
      <div class="row datos-principales">
          <div class="col">
    <label>
      <p>Serie:</p>
      <input name="serie" type="text" id="serie">
    </label>
          </div>
          <div class="col">
    <label>
      <p>Numero de motor:</p>
      <input name="numMotor" type="text" id="numMotor">
    </label>
          </div>
          <div class="col">
    <label>
      <p>Línea:</p>
      <input name="linea" type="text" id="linea">
    </label>
          </div>
          <div class="col">
    <label>
      <p>Sublinea:</p>
      <input name="sublinea" type="text" id="sublinea">
    </label>
          </div>
      </div>
      <div class="row datos-principales">
          <div class="col"></div>
          <div class="col">
    <label>
      <p>Cilindraje:</p>
      <input name="cilindraje" type="number" id="cilindraje">
    </label>
          </div>
          <div class="col">
    <label>
      <p class="select">Combustible:</p>
      <select name="combustible" id="combustible">
        <option>Gasolina</option>
        <option>Diesel</option>
        <option>Electrico</option>
        <option>Otro</option>
      </select>
    </label>
          </div>
          <div class="col">
    <label>
      <p>Origen:</p>
      <input type="text" name="origen" id="origen">
    </label>
          </div>
          <div class="col"></div>
      </div>
    <div class="row datos-final">
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