<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Sistema de Control Vehicular</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css" media="all">
  <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Rubik:500&display=swap" rel="stylesheet">
</head>

<body id="iniciar">
  <div id="logo">
    <a href="../html/FAcceso.php">
      Sistema de Control Vehicular
    </a>
  </div>
  <div id="login" class="bloque">
    <h3>Identificate</h3>
    <form id="inicio" name="form1" method="post" action="../php/ValidaAcceso.php" enctype="multipart/form-data">
      <label>
        <input name="username" type="text" id="username" placeholder="Username" class="texto"/>
      </label>
      <label>
        <input name="password" type="password" id="password" placeholder="Password" class="texto"/>
      </label>
      <label id="file">
        <input name="llave" type="file" id="key" hidden/>
        <button type="button" id="customButton">Selecciona un archivo</button>
        <span id="customText">Key</span>
      </label>
      <label>
        <input type="submit" name="Submit" value="Entrar" required id="entrar"/>
      </label>
    </form>
  </div>
</body>
<script type="text/javascript">
  const key = document.getElementById('key');
  const customButton = document.getElementById('customButton');
  const customText = document.getElementById('customText');

  customButton.addEventListener("click", function(){
    key.click();
  });

  key.addEventListener("change", function(){
    if(key.value){
      customText.innerHTML = key.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
    }
    else{
      customText.innerHTML = "Ningun archivo seleccionado";
    }
  });
</script>
</html>