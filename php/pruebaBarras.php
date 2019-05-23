<?php
    require('barcode.php');
    $filepath='C:/xampp/htdocs/controlVehicular/barras/prueba.png';
    $text=$datos;
    $size=40;
    $orientation="horizontal";
    $code_type="Code128";
    $print=true;
    $sizefactor="1";
    barcode($filepath, $text, $size, $orientation, $code_type, $print,$sizefactor);
?>