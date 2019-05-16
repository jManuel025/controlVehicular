<?php include("headerNav.php")?>
  <div class="contenido">
  <form method="post" action="../php/PTenencias.php" enctype="multipart/form-data">
      <h1>Tenencias</h1>
      <!-- <label>
        <p>ID Tenencia:</p>
        <input name="idTenencia" type="number" id="idTenencia" required/ disabled="disabled">
      </label> -->
      <label>
        <p>Vehiculo:</p>
        <input name="vehiculo" type="number" id="vehiculo" required/>
      </label>
      <label>
        <p>Año:</p>
        <input name="year" type="date" id="year" required min="1900" max="2100"/>
      </label>
      <label>
        <p>Monto:</p>
        <input name="monto" type="number" id="monto" required step=".01"/>
      </label>
      <input type="submit" name="Submit" value="Registrar" class="btnRegistra"/>
    </form>
  </div>
</body>
</html>
