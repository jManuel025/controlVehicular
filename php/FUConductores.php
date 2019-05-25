
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cambios Conductores</title>
</head>
<script src="jquery-3.4.1.js"></script>
<body>
    <form id="form1" name="form1" method="post" action="">
    <label>CURP
      <input name="id" type="text" id="id" />
    </label>
    <p>
      <label>
        
        <input name="buscar" type="submit" id="buscar" value="buscar"/>
      </label>
    </p>
  </form>
    
<?php
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
    
    <form method='post' action='../php/PUConductores.php' enctype='multipart/form-data'>
        <h1>Conductores</h1>
        <label>
            <p>CURP:</p>
            <input name='curp' type='text' id='curp' required placeholder='AAAA000000AAAAAA00' value=<?php echo $array[0];?> />
        </label>
        <label>
            <p>Nombre:</p>
            <input name='nombre' type='text' id='nombre' required placeholder='Miguel de Cervantes Saavedra' value=<?php echo $array[1];?> />
        </label>
        <label>
            <p>Dirección:</p>
            <input name='direccion' type='text' id='direccion' required placeholder='Enrique Segoviano, Col. Chespirito #8' value=<?php echo $array[2];?> />
        </label>
        <div class='firma'>
            <p>Firma:</p>
            <div class='file'>
                <p>Seleccionar archivo</p> value=<?php echo $array[3];?>
                <!-- <label for='firma'>Seleccionar archivo</label> -->
                <input type='file' name='firma' id='firma' required />
            </div>
        </div>

        <div class='donador'>
            <p>Donador:</p>
            <div class='radio'>
                <input name='donador' type='radio' value='Si' id='si' checked />
                <label for='si'>Si</label>
                <input name='donador' type='radio' value='No' id='no' />
                <label for='no'>No</label>
            </div>
        </div>

        <!-- <label>
                <p>Donador:</p>
                <p>Si <input name='donador' type='radio' value='Si' checked /></p>
                <p>No <input name='donador' type='radio' value='No' /></p>
            </label> -->
        <label>
            <p class='select'>Grupo sanguíneo:</p>
            <select name='tSangre' id='tipo'>
                <option>A+</option>
                <option>B+</option>
                <option>O+</option>
                <option>O-</option>
                <option>AB+</option>
                <option>AB-</option>
            </select>
        </label>
        <label>
            <p>Restricciones:</p>
            <input name='restriccion' type='text' id='restriccion' placeholder='Ninguna' value=<?php echo $array[6];?> />
        </label>
        <label>
            <p>Teléfono de emergencia:</p>
            <input name='telEmergencia' type='tel' id='telEmergencia' pattern='[0-9]{10}' placeholder='8743516948' value=<?php echo $array[7];?> />
        </label>
        <label>
            <p class='date'>Fecha de nacimiento:</p>
            <input name='fNacimiento' type='date' id='fNacimiento' value=<?php echo $array[8];?> />
        </label>
        <input type='submit' name='Submit' value='Registrar' class='btnRegistra' />
    </form>
</div>
<?php
} else {
    ?>
    <div id="formDiv"></div>
    <?php
}
?>

    
</body>
</html>