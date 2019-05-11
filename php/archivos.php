<?php
    // copy("data.txt", "Archivos/data1.txt");
    // rename("Archivos/data1.txt", "Archivos/datosAlumno.txt");
    // unlink("Archivos/datosAlumno.txt")
    print("imprime archivo");
    // $manejador = fopen("Archivos/data1.txt", "r");
    // $datos = fpassthru($manejador);
    // print($datos);
    // print(readfile("Archivos/data1.txt"));
    function listarDirectorio($ruta){
        if (is_dir($ruta)){
            $manejador = opendir($ruta);
            $contador = 1;
            while(($fichero = readdir($manejador)) !== false){
                if(is_dir($fichero)){
                    print("Archivo #".$contador.": ".$fichero."</br>");
                }
                else{
                    print("Directorio #".$contador.": ".$fichero."</br>");
                }
                $contador++;
            }
            print("Total de archivos: ".$contador);
        }
        else{
            print("Ruta no valida");
        }
    }
    $ruta = "Archivos/";
    listarDirectorio($ruta);

?>