<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
    <label>Id Tenencia
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
if (isset($_POST['id'])) {
    $id=$_POST['id'];
    include("conexion.php");
    $Con=Conectar();
    $SQL="Select * FRom tenencias where idTenencia LIKE '$id';";
    $Query=Consulta($Con,$SQL);
    $array=mysqli_fetch_row($Query);
    var_dump($array);
  print("<form method='post' action='../php/PUTenencias.php' enctype='multipart/form-data'>
    <h1>Tenencias</h1>
    <label>
      <p>Id Antiguo:</p>
      <input name='idA' type='number' id='idA' required value='".$array[0]."' />
    </label>
    <label>
      <p>Id Nuevo:</p>
      <input name='idN' type='number' id='idN' required value='".$array[0]."' />
    </label>
    <label>
      <p>Vehiculo:</p>
      <input name='vehiculo' type='number' id='vehiculo' required value='".$array[1]."' />
    </label>
    <label>
      <p>Año:</p>
      <input name='year' type='number' id='year' required min='1900' max='2100' value='".$array[2]."' />
    </label>
    <label>
      <p>Monto:</p>
      <input name='monto' type='number' id='monto' required step='.01' value='".$array[3]."' />
    </label>
    <input type='submit' name='Submit' value='Registrar' class='btnRegistra' />
  </form>
    ");
  
  
  
  Desconectar($Con);
}
?>