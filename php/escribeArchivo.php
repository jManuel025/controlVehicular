<?php
    $manejador = fopen("datax.txt","a");
    fputs($manejador, "Hola mundo"); //manejador, texto
    fclose($manejador);
?>