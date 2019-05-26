<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <form id="form1" name="form1" method="post" action="">
    <label>RFC
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
    $SQL="Select * FRom propietarios where RFC LIKE '$id';";
    $Query=Consulta($Con,$SQL);
    $array=mysqli_fetch_row($Query);
    var_dump($array);
  print("<form method='post' action='../php/PUPropietarios.php' enctype='multipart/form-data'>
    <h1>Propietarios:</h1>
    <label>
      <p>RFC Antiguo:</p>
      <input name='rfcV' type='text' id='rfcV' required value='".$array[0]."'  />
    </label>
    <label>
      <p>RFC Nuevo:</p>
      <input name='rfcN' type='text' id='rfcN' required value='".$array[0]."' />
    </label>
    <label>
      <p>CURP:</p>
      <input name='curp' type='text' id='curp' required value='".$array[1]."' />
    </label>
    <label>
      <p>Nombre:</p>
      <input name='nombre' type='text' id='nombre' required value='".$array[2]."' />
    </label>
    <label>
      <p>Dirección:</p>
      <input name='direccion' type='text' id='direccion' required value='".$array[3]."' />
    </label>
    <input type='submit' name='Submit' value='Cambiar' class='btnRegistra' />
  </form>
    ");
  
  
  
  Desconectar($Con);
}
?>