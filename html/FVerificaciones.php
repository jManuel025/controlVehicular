<?php include("headerNav.php") ?>
<div class="contenido">
  <form method="post" action="../php/PVerificaciones.php" enctype="multipart/form-data">
    <h1>Verificaciones</h1>
    <!-- <label>
        <p>Folio:</p>
        <input name="folio" type="number" id="folio" required disabled="disabled"/>
      </label> -->
    <label>
      <p>Vehiculo:</p>
      <input name="vehiculo" type="number" id="vehiculo" required />
    </label>
    <label>
      <p class="date">Fecha:</p>
      <input name="fecha" type="date" id="fecha" required />
    </label>

    <div class="dictamen">
      <p>Dictamen:</p>
      <div class="radio">
        <input name="dictamen" type="radio" value="1" id="apueba" checked />
        <label for="aprueba">Aprobado</label>
        <input name="dictamen" type="radio" value="0" id="reprueba" />
        <label for="aprueba">Reprobado</label>
      </div>
    </div>

    <label>
      <p>Periodo:</p>
      <input name="periodo" type="number" id="periodo" required min="1" max="2" />
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