<?php include("headerNav.php") ?>
<div class="contenido">
  <form method="post" action="../php/PPropietarios.php" enctype="multipart/form-data">
    <h1>Propietarios:</h1>
    <label>
      <p>RFC:</p>
      <input name="rfc" type="text" id="rfc" required />
    </label>
    <label>
      <p>CURP:</p>
      <input name="curp" type="text" id="curp" required />
    </label>
    <label>
      <p>Nombre:</p>
      <input name="nombre" type="text" id="nombre" required />
    </label>
    <label>
      <p>Dirección:</p>
      <input name="direccion" type="text" id="direccion" required />
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