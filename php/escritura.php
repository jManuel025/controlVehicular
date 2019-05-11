<?php
    $alumnos = new SimpleXMLElement('alumnos.xml', null, true);
    print($alumnos->alumno[0]->nombre);
    //modificar solo un valor
    $alumnos->alumno[0]->nombre = "Misael"; //con eso no se modifica el xml
    print($alumnos->alumno[0]->nombre);
    //añadir nuevo alumno
    $nuevoAlumno = $alumnos->addChild('alumno');
    $nuevoAlumno->addChild('nombre', 'Alejandro');
    $nuevoAlumno->addChild('expediente', '242756');
    $nuevoAlumno->addChild('sexo', 'M');
    //guardar cambios xml
    $alumnos->asXML('alumnos.xml')
    //nviar tarea asuento pdf / actual xml
?>

