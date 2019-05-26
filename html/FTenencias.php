<?php include("headerNav.php") ?>
<div class="contenido">
  <form method="post" action="../php/PTenencias.php" enctype="multipart/form-data">
    <h1>Tenencias</h1>
    <label>
      <p>Vehiculo:</p>
      <input name="vehiculo" type="number" id="vehiculo" required />
    </label>
    <label>
      <p>Año:</p>
      <input name="year" type="number" id="year" required min="1900" max="2100" />
    </label>
    <label>
      <p>Monto:</p>
      <input name="monto" type="number" id="monto" required step=".01" />
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