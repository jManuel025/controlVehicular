<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cambios Conductores</title>
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
                <li class="sidebar-brand"> <a class="text-center logo" href="../index.html" style="color: #8fb8e4;">Sistema de control vehicular</a></li>
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
                            class="dropdown-menu dropdown-menu-left" role="menu" style="padding-right: 0px;margin-right: 50px;"><a class="dropdown-item" role="presentation" href="#">Ver usuario</a><a class="dropdown-item" role="presentation" href="#">Cerrar sesion</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="margin: 10px 0px 0px 10px;">
                        <h1 class="text-center">Conductores</h1>
                        <h4 class="text-center" style="color: rgb(122,125,129);">Proceso de Cambios</h4>
                    </div>
                </div>
            </div><meta charset="UTF-8">
  <title>Cambios Conductores</title>

<script src="jquery-3.4.1.js"></script>

    <form id="form1" name="form1" method="post" action="">
    <label>CURP
      <input name="id" type="text" id="id">
    </label>
    <p>
      <label>
        
        <input name="buscar" type="submit" id="buscar" value="buscar" class="btn btn-primary">
      </label>
    </p>
  </form>
    
<?php

if (isset($_GET["hecho"])) {
    if ($_GET["hecho"] == 1) {
      print("Cambio realizado con éxito");
    } elseif ($_GET["hecho"] == 0) {
      print("Error en el cambio");
    }
  }

$DisplayForm = false;
if (isset($_POST['id'])) {
    $DisplayForm = true;
    $id=$_POST['id'];
    include("conexion.php");
    $Con=Conectar();
    $SQL="Select * FRom conductores where CURP LIKE '$id';";
    $Query=Consulta($Con,$SQL);
    $array=mysqli_fetch_row($Query);
    // var_dump($array);
    
}

if ($DisplayForm){
    ?>
    <div id="formDiv">
    
    <form id="form2" method="post" action="../php/PUConductores.php" enctype="multipart/form-data">
        <div class="row datos-principales">
        <div class="col">
        <label>
            <p>CURP:</p>
            <input name="curp" type="text" id="curp" required="" placeholder="AAAA000000AAAAAA00" value=<?php echo $array[0]; ?> />
        </label>
        </div>
        <div class="col">
        <label>
            <p>Nombre:</p>
            <input name="nombre" type="text" id="nombre" required="" placeholder="Miguel de Cervantes Saavedra" value=<?php echo $array[1]; ?> />
        </label>
        </div>

        <div class="col">
        <label>
            <p>Dirección:</p>
            <input name="direccion" type="text" id="direccion" required="" placeholder="Enrique Segoviano, Col. Chespirito #8" value=<?php echo $array[2]; ?> />
        </div>
        </div>
        <div class="row">
            <div class="col">
        <div class="firma">
            <p>Firma:</p>
            <div class="file">
                <p>Seleccionar archivo</p>
                <!-- <label for='firma'>Seleccionar archivo</label> -->
                <input type="file" name="firma" id="firma" required="">
            </div>
            </div>
        </div>
    </div>  

            
        <div class="row sangre">
            <div class="col sm-6">
                <div class="donador">
                    <p>Donador:</p>
                    <div class="radio">
                        <input name="donador" type="radio" value="Si" id="si" checked="">
                        <label for="si">Si</label>
                        <input name="donador" type="radio" value="No" id="no">
                        <label for="no">No</label>
                    </div>
                </div>
                </div>

        <!-- <label>
                <p>Donador:</p>
                <p>Si <input name='donador' type='radio' value='Si' checked /></p>
                <p>No <input name='donador' type='radio' value='No' /></p>
            </label> -->
            <div class="col sm-6">
                <label>
                 <p class="select">Grupo sanguíneo:</p>
                 <select name="tSangre" id="tipo">
                        <option>A+</option>
                        <option>B+</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                </label>
            </div>
        </div>
        <div class="row datos-final">
            <div class="col">
        <label>
            <p>Restricciones:</p>
            <input name="restriccion" type="text" id="restriccion" placeholder="Ninguna" value=<?php echo $array[6]; ?> />
        </label>
            </div>
            <div class="col">
        <label>
            <p>Teléfono de emergencia:</p>
            <input name="telEmergencia" type="tel" id="telEmergencia" pattern="[0-9]{10}" placeholder="8743516948" value=<?php echo $array[7]; ?> />
        </label>
            </div>
            <div class="col">
        <label>
            <p class="date">Fecha de nacimiento:</p>
            <input name="fNacimiento" type="date" id="fNacimiento" style="line-height: 20px;" value=<?php echo $array[8]; ?> />
        </label>
        </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <input type="submit" name="Submit" value="Cambiar" class="btn btn-warning">
            </div>
        </div>
        
    </form>
</div>
<?php
} else {
    ?>
    <div id="formDiv"></div>
    <?php
}
?></div>
    </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Cards-.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>