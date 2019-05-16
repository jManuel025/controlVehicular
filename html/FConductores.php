<?php include("headerNav.php")?>
    <div class="contenido">
    <form method="post" action="../php/PConductores.php" enctype="multipart/form-data">
        <h1>Conductores</h1>
            <label>
                <p>CURP:</p>
                <input name="curp" type="text" id="curp" required placeholder="AAAA000000AAAAAA00"/>
            </label>
            <label>
                <p>Nombre:</p>
                <input name="nombre" type="text" id="nombre" required placeholder="Miguel de Cervantes Saavedra"/>
            </label>
            <label>
                <p>Dirección:</p>
                <input name="direccion" type="text" id="direccion" required placeholder="Enrique Segoviano, Col. Chespirito #8"/>
            </label>
            <div class="firma">
                <p>Firma:</p>
                <div class="file">
                    <p>Seleccionar archivo</p>
                    <!-- <label for="firma">Seleccionar archivo</label> -->
                    <input type="file" name="firma" id="firma" required/>
                </div>
            </div>

            <div class="donador">
                <p>Donador:</p>
                <div class="radio">
                    <input name="donador" type="radio" value="Si" id="si" checked/>
                    <label for="si">Si</label>
                    <input name="donador" type="radio" value="No" id="no"/>
                    <label for="no">No</label>
                </div>
            </div>
            
            <!-- <label>
                <p>Donador:</p>
                <p>Si <input name="donador" type="radio" value="Si" /></p>
                <p>No <input name="donador" type="radio" value="No" /></p>
            </label> -->
            <label>
                <p class="select">Grupo sanguíneo:</p>
                <select name="tSangre" id="tipo">
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
              <input name="restriccion" type="text" id="restriccion" placeholder="Ninguna"/>
          </label>
            <label>
                <p>Teléfono de emergencia:</p>
                <input name="telEmergencia" type="tel" id="telEmergencia" pattern="[0-9]{10}" placeholder="8743516948"/>
            </label>
            <label>
                <p class="date">Fecha de nacimiento:</p>
                <input name="fNacimiento" type="date" id="fNacimiento" />
            </label>
            <input type="submit" name="Submit" value="Registrar" class="btnRegistra"/>
      </form>
    </div>
</body>
</html>