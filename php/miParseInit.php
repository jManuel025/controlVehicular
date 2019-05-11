
<?php
    function miParseInit($archivo){
        $manejador = fopen("$archivo","r");
        $arreglo=array();
        while(!feof($manejador)){
            $linea = trim(fgets($manejador));
            $primerCaracter = substr($linea, 0, 1);
            // Retira comentarios y bloques
            if($primerCaracter != '[' AND $primerCaracter != ';' and $primerCaracter != ""){
                $linea = str_replace('"', '', $linea); //quita comillas
                $linea = str_replace(' ','',$linea);
                //print($linea."</br>");
                $linea = explode('=', $linea);
                $arreglo[$linea[0]] = $linea[1];
            }
        }
        fclose($manejador);
        return $arreglo;
    }
    $valores=miParseInit("configuracion.init");
?>
<pre>
<?php
    print_r($valores);
?></pre>
	