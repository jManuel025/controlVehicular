<?php include("headerNav.php") ?>
<div class="contenido">
  <form method="post" action="../php/PMultas.php" enctype="multipart/form-data">
    <h1>Multas</h1>
    <label>
      <p>Vehiculo:</p>
      <input name="vehiculo" type="number" id="vehiculo" required />
    </label>
    <label>
      <p>Licencia:</p>
      <input name="licencia" type="number" id="licencia" required />
    </label>
    <label>
      <p>Monto:</p>
      <input name="monto" type="number" id="monto" required step=".01" />
    </label>
    <label>
      <p>Lugar:</p>
      <input name="lugar" type="text" id="lugar" required />
    </label>
    <label>
      <p class="date">Fecha:</p>
      <input name="fecha" type="date" id="fecha" required />
    </label>
    <label>
      <p>Motivo:</p>
      <input name="motivo" type="text" id="motivo" required />
    </label>
    <label>
      <p>ID Oficial:</p>
      <input name="idOficial" type="number" id="idOficial" required />
    </label>
    <label>
      <p class="time">Hora:</p>
      <input name="hora" type="time" id="hora" />
    </label>
    <input type="submit" name="Submit" value="Registrar" class="btnRegistra" />
  </form>
</div>
</body>

</html>