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
                        <div class="dropdown-menu dropdown-menu-left" role="menu" style="padding-right: 0px;margin-right: 50px;"><a class="dropdown-item" role="presentation" href="#">Ver usuario</a><a class="dropdown-item" role="presentation" href="cerrarSesion.php">Cerrar sesion</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="margin: 10px 0px 0px 10px;">
                            <h1 class="text-center">Conductores</h1>
                        </div>
                    </div>
                </div>
                <div class="contenido">
                    <form method="post" action="../php/PConductores.php" enctype="multipart/form-data">
                        <h3>Proceso de Altas</h3>
                        <div class="datos-principales">
                            <label>
                                <p>CURP:</p>
                                <input name="curp" type="text" id="curp" required="" placeholder="AAAA000000AAAAAA00" class="input-style">
                            </label>
                            <label>
                                <p>Nombre:</p>
                                <input name="nombre" type="text" id="nombre" required="" placeholder="Miguel de Cervantes Saavedra" class="input-style">
                            </label>
                            <label>
                                <p>Dirección:</p>
                                <input name="direccion" type="text" id="direccion" required="" placeholder="Enrique Segoviano, Col. Chespirito #8" class="input-style">
                            </label>
                        </div>
                        <div class="firma">
                            <p>Firma:</p>
                            <div class="file">
                                <p>Seleccionar archivo con la firma</p>
                                <!-- <label for="firma">Seleccionar archivo</label> -->
                                <input type="file" name="firma" id="firma" required="" class="choose-file">
                            </div>
                        </div>

                        <div class="row sangre">
                            <div class="column col-md-3">
                            </div>
                            <div class="column col-md-3">
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

                            <div class="column col-md-3">
                                <label class="gpo-sang">
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
                            <div class="column col-md-3">
                            </div>
                        </div>
                        <div class="datos-final">
                            <label>
                                <p>Restricciones:</p>
                                <input name="restriccion" type="text" id="restriccion" placeholder="Ninguna" class="input-style">
                            </label>
                            <label>
                                <p>Teléfono de emergencia:</p>
                                <input name="telEmergencia" type="tel" id="telEmergencia" pattern="[0-9]{10}" placeholder="8743516948" class="input-style">
                            </label>
                            <label>
                                <p class="date">Fecha de nacimiento:</p>
                                <input name="fNacimiento" type="date" id="fNacimiento" class="input-style" style="line-height:20px">
                            </label>
                        </div>
                        <div class="row">
                            <div class="column col-md-12">
                                <input type="submit" name="Submit" value="Registrar" class="btn btn-primary contenido">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET["hecho"])) {
        if ($_GET["hecho"] == 1) {
            print("Registro realizado con éxito");
        } elseif ($_GET["hecho"] == 0) {
            print("Error en el registro");
        }
    }
    ?>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/-Filterable-Cards-.js"></script>
    <script src="../assets/js/Sidebar-Menu.js"></script>
</body>

</html>