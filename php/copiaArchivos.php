<?php
    $manejador1 = fopen("data1.txt", "r");
    $manejador2 = fopen("data2.txt", "r");
    $manejador3 = fopen("data3.txt","w");//archivo 3
    while(!feof($manejador1)){ // lee e imprime
        $linea = fgets($manejador1); //cadena de numeros
        $lsinFormato = trim($linea);
        fwrite($manejador3, $lsinFormato." ");
    }
    fputs($manejador3, "\r\n");
    while(!feof($manejador2)){
        $linea = fgets($manejador2); //letras
        fwrite($manejador3, $linea);
    }
    fclose($manejador1);
    fclose($manejador2);
    fclose($manejador3);
?>