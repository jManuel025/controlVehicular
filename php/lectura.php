<?php
    //TEMA: XML-Lectura
    $alumnos = simplexml_load_file('alumnos.xml');
    //individualmente
    print($alumnos->alumno[1]->nombre.'<br>');
    print($alumnos->alumno[1]->expediente.'<br>');
    print($alumnos->alumno[1]->sexo.'<br>');
    //grupal
    print("<table border = '1' cellpadding = '10'>\n");
    print(
        "<tr>
            <th>Nombre</th>
            <th>Expediente</th>
            <th>Sexo</th>
        </tr>"
    );
    //numero de elementos
    $totalAlumnos = count($alumnos->alumno);
    for($i = 0; $i < $totalAlumnos; $i++){
        print(
            "<tr>
                <td>".$alumnos->alumno[$i]->nombre."</td>
                <td>".$alumnos->alumno[$i]->expediente."</td>
                <td>".$alumnos->alumno[$i]->sexo."</td>
            </tr>"
        );
    }
?>