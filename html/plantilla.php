<?php
    session_start();
    if($_SESSION['validacion']){
        print($_SESSION['username']);
        header("refresh:600;url=cerrarSesion.php");
    }
    else{
        header("Location: FAcceso.php");
    }
    print("<br><a href = 'cerrarSesion.php'>Cerrar sesión</a>");
?>
<?php include("headerNav.php")?>
    <div class="contenido">

    </div>
</body>
</html> 