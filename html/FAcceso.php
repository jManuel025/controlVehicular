<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sistema de Control Vehicular</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
</head>

<body id="iniciar">
  <div id="logo">
    <a href="FAcceso.html">
      Sistema de Control Vehicular
    </a>
  </div>
  <div id="login" class="bloque">
    <h3>Identificate</h3>
    <form id="inicio" name="form1" method="post" action="../php/ValidaAcceso.php" enctype="multipart/form-data">
      <label>Username
        <input name="username" type="text" id="username" />
      </label>
      <p>
        <label>Password
          <input name="password" type="text" id="password" />
        </label>
      </p>
      <p>
        <label>Key
          <input name="llave" type="file" id="key" />
        </label>
      </p>
      <p>
        <label>
          <input type="submit" name="Submit" value="Entrar" required/>
        </label>
      </p>
    </form>
  </div>
</body>

</html>