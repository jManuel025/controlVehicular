<?php
    //usar esto para separar la información que no debe ser pública
    $parametros = parse_ini_file("configuracion.init"); //Arreglo asociativo que devuelve la función
    print_r($parametros);
    print("</br>");
    print($parametros['DataBase']);
?>