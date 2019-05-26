<?php include("headerNav.php") ?>
<div class="contenido">
  <form method="post" action="../php/PVehiculos.php" enctype="multipart/form-data">
    <h1>Vehículos</h1>
    <label>
      <p>ID Vehiculo:</p>
      <input name="idVehiculo" type="number" id="idVehiculo" disabled/>
    </label>
    <label>
      <p>Propietario:</p>
      <input name="propietario" type="text" id="propietario" required />
    </label>
    <label>
      <p>Placa:</p>
      <input name="placa" type="text" id="placa" required />
    </label>
    <label>
      <p>Tipo:</p>
      <input name="tipo" type="text" id="tipo" required />
    </label>
    <label>
      <p>Modelo:</p>
      <input name="modelo" type="text" id="modelo" required />
    </label>
    <label>
      <p>Año:</p>
      <input name="year" type="number" id="year" required min="1900" max="2100" step="1" />
    </label>
    <div class="uso">
      <p>Uso:</p>
      <div class="radio">
        <input name="uso" type="radio" value="Particular" id="particular" />
        <label for="particular">Particular</label>
        <input name="uso" type="radio" value="Comercial" id="comercial" />
        <label for="comercial">Comercial</label>
      </div>
    </div>
    <label>
      <p>Color:</p>
      <input name="color" type="text" id="color" required />
    </label>
    <label>
      <p>Puertas:</p>
      <input name="puertas" type="number" id="puertas" min="1" max="4" />
    </label>
    <label>
      <p>Marca:</p>
      <input name="marca" type="text" id="marca" />
    </label>
    <div class="uso">
      <p>Transmisión:</p>
      <div class="radio">
        <input name="transmision" type="radio" value="Automático" id="auto" />
        <label for="auto">Automatico</label>
        <input name="transmision" type="radio" value="Estándar" id="stan" />
        <label for="stan">Estandar</label>
      </div>
    </div>
    <label>
      <p>Capacidad de carga:</p>
      <input name="capCarga" type="number" id="capCarga" />
    </label>
    <label>
      <p>Serie:</p>
      <input name="serie" type="text" id="serie" />
    </label>
    <label>
      <p>Numero de motor:</p>
      <input name="numMotor" type="text" id="numMotor" />
    </label>
    <label>
      <p>Línea:</p>
      <input name="linea" type="text" id="linea" />
    </label>
    <label>
      <p>Sublinea:</p>
      <input name="sublinea" type="text" id="sublinea" />
    </label>
    <label>
      <p>Cilindraje:</p>
      <input name="cilindraje" type="number" id="cilindraje" />
    </label>
    <label>
      <p class="select">Combustible:</p>
      <select name="combustible" id="combustible">
        <option>Gasolina</option>
        <option>Diesel</option>
        <option>Electrico</option>
        <option>Otro</option>
      </select>
    </label>
    <label>
      <p>Origen:</p>
      <input type="text" name="origen" id="origen" />
    </label>
    <input type="submit" name="Submit" value="Registrar" class="btnRegistra" />
  </form>
</div>
</body>

</html>
<?php 
if(isset($_GET["hecho"])){
if($_GET["hecho"]==1){
  print("Registro realizado con éxito");

}elseif ($_GET["hecho"]==0) {
  print("Error en el registro");
} } 
?>