<?php include("headerNav.php") ?>
<div class="contenido">
  <form action="../php/PConductores.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <h1>Licencias</h1>
    <!-- <label>
        <p>ID Licencia:</p>
        <input name="idLicencia" type="number" id="idLicencia" required />
      </label> -->
    <label>
      <p>Conductor:</p>
      <input name="conductor" type="text" id="conductor" required placeholder="AAAA000000AAAAAA00" />
    </label>
    <label>
      <p class="date">Fecha de expedicion:</p>
      <input name="fExpedicion" type="date" id="fExpedicion" required />
    </label>
    <label>
      <p class="select">Tipo</p>
      <select name="tipo" id="tipo">
        <option>A</option>
        <option>B</option>
        <option>C</option>
        <option>D</option>
        <option>E</option>
      </select>
    </label>
    <label>
      <p class="date">Fecha de vencimiento:</p>
      <input name="fVencimiento" type="date" id="fVencimiento" required />
    </label>
    <label>
      <p>Lugar:</p>
      <input name="lugar" type="text" id="lugar" required placeholder="Querétaro" />
    </label>
    <label>
      <p>Expide:</p>
      <input name="expide" type="text" id="expide" required placeholder="Gobierno de Querétaro" />
    </label>
    <input type="submit" name="Submit" value="Registrar" class="btnRegistra" />
  </form>
</div>
</body>

</html>