<?php
    error_reporting(0);
    session_start();
    if ($_SESSION['validacion']) {
        header("refresh:600;url=../html/cerrarSesion.php");
    } else {
        header("Location: ../html/FAcceso.php");
    }
    require('fpdf.php');
    include('phpqrcode/qrlib.php');
    $sql = "SELECT idLicencia, nombre, fNacimiento, fExpedicion, fVencimiento, tipo, firma, direccion, restriccion, tSangre, donador, tEmergencia, c.foto
            FROM conductores c, licencias l
            WHERE l.conductor = c.CURP AND idLicencia = $idLicencia;";
    $query = Consulta($Con, $sql);   
    $fila = mysqli_fetch_row($query);
    $idLicencia = $fila[0];
    $nombre = $fila[1];
    $fNacimiento = $fila[2];
    $fExpedicion = $fila[3];
    $fVencimiento = $fila[4];
    $tipo = $fila[5];
    $firma = $fila[6]; 
    $direccion = $fila[7];
    $restriccion = $fila[8];
    $tSangre = $fila[9];
    $donador = $fila[10];
    if($donador == 1){$donador = "Si";} else{$donador = "No";}
    $tEmergencia = $fila[11];
    $foto = $fila[12]; 
    // Desconectar($Con);
    
    $pdf = new FPDF();
    $pdf->AddPage('P', 'A5');
    // FRONTAL-------------------------------
    $pdf->Image('../temp/licencias/recursos/mapaqro.png', 47, 76.5, 10);
    $pdf->Image('../temp/licencias/recursos/escudoqro.png', 12, 12, 10 );
    $pdf->SetLeftMargin(23);
    $pdf->SetFont('Arial','',5.5);
    $pdf->SetXY(23, 12);
    $pdf->Cell(40,2.5,'Estados Unidos Mexicanos', 0, 1, 'L');
    $pdf->Cell(40,2.5,'Poder ejecutivo del Estado de Querétaro', 0, 1, 'L');
    $pdf->Cell(40,1,'', 0, 1, 'L');
    $pdf->SetFont('Arial','B',4.5);
    $pdf->Cell(40,2.5,'Secretaría de seguridad ciudadana', 0, 1, 'L');
    $pdf->SetFontSize(7);
    $pdf->Cell(40,2.5,'Licencia para conducir', 0, 1, 'L');
    $pdf->Image($foto, 39, 24, 22);
    // $pdf->Cell(40,2.5,$foto, 0, 1, 'L');
    $pdf->SetFontSize(5);
    $pdf->SetXY(22, 40);
    $pdf->Cell(17, 4,'No. de Licencia', 0, 1, 'R');
    $pdf->SetFontSize(10.5);
    $pdf->SetXY(22, 44);
    $pdf->SetTextColor(220,20,60);
    $pdf->Cell(17, 4, $idLicencia, 0, 1, 'R');
    $pdf->SetFontSize(6.5);
    $pdf->SetXY(22, 48);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(17, 4, 'AUTOMOVILISTA', 0, 1, 'R');
    $pdf->SetFontSize(4);
    $pdf->SetXY(52, 52.5);
    $pdf->Cell(10, 2,'Nombre', 0, 1, 'R');
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetXY(46.5, 54.5);
    $pdf->MultiCell(15.5, 3, $nombre, 0, 'R');
    $pdf->SetFontSize(4);
    $pdf->SetXY(46, 66.6);
    $pdf->Cell(15, 2,'Observaciones', 0, 1, 'R');
    $pdf->SetXY(12,66.6);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 2,'Fecha de Nacimiento', 0, 1, 'L');
    $pdf->SetXY(12,68.6);
    $pdf->SetFontSize(6);
    $pdf->Cell(15, 2, $fNacimiento, 0, 1, 'L');
    $pdf->SetXY(12,70.6);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 2,'Fecha de Expedición', 0, 1, 'L');
    $pdf->SetXY(12,72.6);
    $pdf->SetFontSize(6);
    $pdf->Cell(15, 2, $fExpedicion, 0, 1, 'L');
    $pdf->SetXY(12,74.6);
    $pdf->SetFont('Arial','B',4);
    $pdf->Cell(15, 2,'Válida hasta', 0, 1, 'L');
    $pdf->SetXY(12,76.6);
    $pdf->SetFontSize(6);
    $pdf->Cell(15, 2, $fVencimiento, 0, 1, 'L');
    $pdf->SetXY(34.5,75.6);
    $pdf->SetFontSize(4);
    $pdf->Cell(8, 2,'Firma', 0, 1, 'L');
    $pdf->Image($firma, 31.5, 76.6, 12.5);
    // $pdf->Cell(8, 2,$firma, 0, 1, 'L');
    $pdf->SetXY(12,78.6);
    $pdf->SetFont('Arial','',4);
    $pdf->Cell(15, 2,'Antiguedad', 0, 1, 'L');
    $pdf->SetXY(12,80.6);
    $pdf->SetFontSize(6);
    $pdf->Cell(15, 2, '2', 0, 1, 'L');
    $pdf->SetFillColor(255, 230, 51);
    $pdf->RoundedRect(13, 82.8, 10, 10, 2, 'F');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetXY(13,82.8);
    $pdf->Cell(10, 10, $tipo, 0, 0, 'C');
    $pdf->SetFont('Arial', '', 4);
    $pdf->SetXY(23,86);
    $pdf->Cell(31, 2, 'AUTORIZO PARA QUE LA PRESENTE', 0, 1, 'C');
    $pdf->SetXY(23,88);
    $pdf->Cell(31, 2, 'SEA RECABADA COMO GARANTÍA DE', 0, 1, 'C');
    $pdf->SetXY(23,90);
    $pdf->Cell(31, 2, 'INFRACCION', 0, 1, 'C');
    // POSTERIOR --------------------------
    $pdf->Image('../temp/licencias/recursos/911.jpg', 86, 12, 10);
    $pdf->Image('../temp/licencias/recursos/089.jpg', 126, 12, 9.5);
    $pdf->SetFillColor(0, 0, 0);
    $pdf->RoundedRect(99, 13, 23, 5, 2.5, 'F');
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->SetXY(99,13);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(23, 5, 'B211125876', 0, 0, 'C');
    $pdf->SetXY(126,19);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Cell(10, 2,'Domicilio', 0, 1, 'R');
    $pdf->SetXY(119,21);
    $pdf->SetFont('Arial', '', 6);
    $pdf->MultiCell(17, 2, $direccion, 0, 'R');
    $pdf->Image('../temp/licencias/recursos/car1.png', 88, 32, 10);
    $pdf->Image('../temp/licencias/recursos/car2.png', 99.5, 32, 10);
    $pdf->Image('../temp/licencias/recursos/car3.png', 111, 32, 10);
    $pdf->Image('../temp/licencias/recursos/car1.png', 122.5, 32, 10);

    $pdf->SetXY(126, 41);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->Cell(10, 2,'Grupo sanguíneo', 0, 1, 'R');
    $pdf->SetXY(126, 43);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(10, 2, $tSangre, 0, 1, 'R');
    $pdf->SetXY(126, 45);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->Cell(10, 2,'Donador de organos', 0, 1, 'R');
    $pdf->SetXY(126, 47);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(10, 2, $donador, 0, 1, 'R');
    $pdf->SetXY(126, 49);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->Cell(10, 2,'Número de emergencias', 0, 1, 'R');
    $pdf->SetXY(126, 51);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(10, 2, $tEmergencia, 0, 1, 'R');
    $pdf->SetXY(86, 41);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->Cell(10, 2,'Restricciones', 0, 1, 'L');
    $pdf->SetXY(86, 43);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(10, 2, $restriccion, 0, 1, 'L');
    $pdf->Image('../temp/licencias/recursos/firma2.png', 125, 55, 10);
    $pdf->SetXY(96, 61.5);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->Cell(40, 2,'M. EN A.P JUAN MARCOS GRANADOS TORRES', 0, 1, 'R');
    $pdf->SetXY(96, 63.5);
    $pdf->Cell(40, 2,'SECRETARIO DE SEGURIDAD CIUDADANA', 0, 1, 'R');
    $pdf->SetXY(86, 64.5);
    $pdf->Cell(40, 2,'Fundamento Legal', 0, 1, 'L');
    $pdf->SetFont('Arial', '', 3.5);
    $pdf->SetXY(86, 66.5);
    $pdf->Cell(50, 1.5, 'Artículo 19 fracción XIII  y 33 fracción II de la Ley Orgánica del Poder Ejecutivo del', 0, 1, 'J');
    $pdf->SetXY(86, 68);
    $pdf->Cell(50, 1.5, 'Estado de Querétaro, artículo 9 fracción XII y 55 de la Ley de Tránsito del Estado', 0, 1, 'J');
    $pdf->SetXY(86, 69.5);
    $pdf->Cell(50, 1.5, 'de Querétaro, artículo 4 de la Ley de Procedimientos Administrativos del Estado', 0, 1, 'J');
    $pdf->SetXY(86, 71);
    $pdf->Cell(50, 1.5, 'de Querétaro, artículo 28 del Reglamento de Tránsito del Estado de Querétaro y', 0, 1, 'J');
    $pdf->SetXY(86, 72.5);
    $pdf->Cell(50, 1.5, 'artículo 6, fracción IV, inciso b) y 20, fracción IV de la Ley de la Secretaría de', 0, 1, 'J');
    $pdf->SetXY(86, 74);
    $pdf->Cell(50, 1.5, 'Seguridad Ciudadana del Estado de Querétaro', 0, 1, 'J');
    $pdf->Image("../temp/licencias/recursos/mapaqroR.png", 92, 76.5, 10);
    $pdf->Image('../temp/licencias/recursos/secSeg.jpg', 119, 82.5, 15);

    $tempDir = $rutaQR.$idLicencia.".png"; //Guarda QR en dir
    $nivel = 'H';
    $tamaño = 5;
    $marco = 0;
    
    $informacion = "ID: ".$idLicencia."\n";
    $informacion .= "Nombre: ".$nombre."\n";
    $informacion .= "Fecha de nacimiento: ".$fNacimiento."\n";
    $informacion .= "Fecha de expedición: ".$fExpedicion."\n";
    $informacion .= "Tipo: ".$tipo."\n";
    $informacion .= "Dirección: ".$direccion."\n";
    QRcode::png($informacion, $tempDir, $nivel, $tamaño);
    $pdf->Image($tempDir, 86, 45.5, 15);
    $pdf->Output('F', $rutaLicencia.$idLicencia.'.pdf', true);
    
?>