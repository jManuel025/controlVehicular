<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
    <label>IdVehiculo
      <input name="id" type="text" id="id" />
    </label>
    <p>
      <label>
        <input name="buscar" type="submit" id="buscar" value="buscar" />
      </label>
    </p>
  </form>
    
</body>
</html>
<?php

if(isset($_GET["hecho"])){
if($_GET["hecho"]==1){
  print("Cambio realizado con éxito");

}elseif ($_GET["hecho"]==0) {
  print("Error en el cambio");
} } 


if (isset($_POST['id'])) {
    $id=$_POST['id'];
    include("conexion.php");
    $Con=Conectar();
    $SQL="Select * FRom vehiculos where idvehiculo LIKE '$id';";
    $Query=Consulta($Con,$SQL);
    $array=mysqli_fetch_row($Query);
    var_dump($array);
  print("<form method='post' action='../php/PUVehiculos.php' enctype='multipart/form-data'>
    <h1>Vehículos</h1>
    <label>
      <p>ID Vehiculo Antiguo:</p>
      <input name='idVehiculoV' type='number' id='idVehiculoV' value='".$array[0]."'  required />
    </label>
    <label>
      <p>ID Vehiculo Nuevo:</p>
      <input name='idVehiculoN' type='number' id='idVehiculoN' value='".$array[0]."'  required />
    </label>
    <label>
      <p>Propietario:</p>
      <input name='propietario' type='text' id='propietario'  value='".$array[1]."' required />
    </label>
    <label>
      <p>Placa:</p>
      <input name='placa' type='text' id='placa'  value='".$array[2]."' required />
    </label>
    <label>
      <p>Tipo:</p>
      <input name='tipo' type='text' id='tipo'  value='".$array[3]."' required />
    </label>
    <label>
      <p>Modelo:</p>
      <input name='modelo' type='text' id='modelo'  value='".$array[4]."' required />
    </label>
    <label>
      <p>Año:</p>
      <input name='year' type='number' id='year'  value='".$array[5]."' required min='1900' max='2100' step='1' />
    </label>
    <div class='uso'>
      <p>Uso:</p>
      <div class='radio'>
        <input name='uso' type='radio' value='Particular' id='particular' checked  />
        <label for='particular'>Particular</label>
        <input name='uso' type='radio' value='Comercial' id='comercial' />
        <label for='comercial'>Comercial</label>
      </div>
    </div>
    <label>
      <p>Color:</p>
      <input name='color' type='text' id='color'  value='".$array[7]."' required />
    </label>
    <label>
      <p>Puertas:</p>
      <input name='puertas' type='number' id='puertas'  value='".$array[8]."' min='1' max='4' />
    </label>
    <label>
      <p>Marca:</p>
      <input name='marca' type='text' id='marca'  value='".$array[9]."' />
    </label>
    <div class='uso'>
      <p>Transmisión:</p>
      <div class='radio'>
        <input name='transmision' type='radio' value='Automático' id='auto' checked />
        <label for='auto'>Automatico</label>
        <input name='transmision' type='radio' value='Estándar' id='stan' />
        <label for='stan'>Estandar</label>
      </div>
    </div>
    <label>
      <p>Capacidad de carga:</p>
      <input name='capCarga' type='number' id='capCarga'  value='".$array[11]."' />
    </label>
    <label>
      <p>Serie:</p>
      <input name='serie' type='text' id='serie' value='".$array[12]."' />
    </label>
    <label>
      <p>Numero de motor:</p>
      <input name='numMotor' type='text' id='numMotor' value='".$array[13]."' />
    </label>
    <label>
      <p>Línea:</p>
      <input name='linea' type='text' id='linea' value='".$array[14]."' />
    </label>
    <label>
      <p>Sublinea:</p>
      <input name='sublinea' type='text' id='sublinea' value='".$array[15]."' />
    </label>
    <label>
      <p>Cilindraje:</p>
      <input name='cilindraje' type='number' id='cilindraje' value='".$array[16]."' />
    </label>
    <label>
      <p class='select'>Combustible:</p>
      <select name='combustible' id='combustible'>
        <option>Gasolina</option>
        <option>Diesel</option>
        <option>Electrico</option>
        <option>Otro</option>
      </select>
    </label>
    <label>
      <p>Origen:</p>
      <input type='text' name='origen' id='origen'  value='".$array[18]."' />
    </label>
    <br>
    <br>
    <input type='submit' name='Submit' value='Cambiar' class='btnRegistra' />
  </form>
    ");
  
  
  
  Desconectar($Con);
}
?>