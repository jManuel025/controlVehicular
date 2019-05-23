<?php
         include('conexion.php');
         $Con = Conectar();
    require('fpdf.php');
    $sql = "SELECT m.folio,m.vehiculo,m.Licencia,m.monto,m.lugar,m.fecha,m.motivo,m.idoficial,m.hora,v.propietario,v.placa
            FROM multas m, vehiculos v
            WHERE  m.folio = 3 AND m.vehiculo=v.idvehiculo ;";
    $query = Consulta($Con, $sql);   
    $fila = mysqli_fetch_row($query);
    $folio = $fila[0];
    $vehiculo = $fila[1];
    $licencia = $fila[2];
    $monto = $fila[3];
    $lugar = $fila[4];
    $fecha = $fila[5];
    $motivo = $fila[6]; 
    $idoficial = $fila[7];
    $hora = $fila[8];
    $propietario = $fila[9];
    $placa = $fila[10];

    Desconectar($Con);
    
    $pdf = new FPDF();
    $pdf->AddPage('P', 'A5');
    // FRONTAL-------------------------------
    $pdf->Image('../temp/multas/segob.jpg', 12, 10, 37 );
    $pdf->Image('../temp/multas/cns.jpg', 61, 12, 22);
    $pdf->Image('../temp/multas/federal.png', 95, 16, 45 );
    $pdf->Image('../temp/multas/qroEsta.png', 31, 109, 38);
    $pdf->Image('../temp/multas/barras.jpeg', 86, 110, 15);

    //$pdf AQUI VA EL CODIGO DE BARRAS     , 68,109,27);
    



    $pdf->SetLeftMargin(23);
    $pdf->SetFont('Arial','B',11);
    $pdf->SetXY(18, 12);
    $pdf->Cell(40,69,'MULTA', 0, 1, 'L');
    
    $pdf->Cell(40,1,'', 0, 1, 'L');
    $pdf->SetFont('Arial','',5.5);
    $pdf->SetXY(95, 12);
    $pdf->Cell(40,55,'Fecha: ', 0, 1, 'L');
    $pdf->SetXY(103, 12);
    $pdf->Cell(40,55,$fecha, 0, 1, 'L');
    $pdf->SetXY(95, 12);
    $pdf->Cell(40,65,'Hora: ', 0, 1, 'L');
    $pdf->SetXY(101.5, 12);
    $pdf->Cell(40,65,$hora, 0, 1, 'L');
    $pdf->SetXY(95, 12);
    $pdf->Cell(40,75,'N° Oficial: ', 0, 1, 'L');
    $pdf->SetXY(105, 12);
    $pdf->Cell(40,75,$idoficial, 0, 1, 'L');
    $pdf->SetXY(95, 12);
    $pdf->Cell(40,85,'Lugar: ', 0, 1, 'L');
    $pdf->SetXY(102, 12);
    $pdf->Cell(40,85,$lugar, 0, 1, 'L');



    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(65, 12);
    $pdf->Cell(40,95,'Motivo:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(27, 12);
    $pdf->Cell(40,105,$motivo, 0, 1, 'L');



    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(30, 12);
    $pdf->Cell(40,129,'Folio:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(34, 12);
    $pdf->Cell(40,139,$folio, 0, 1, 'L');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(44, 12);
    $pdf->Cell(40,129,'Vehiculo:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(50, 12);
    $pdf->Cell(40,139,$vehiculo, 0, 1, 'L');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(64, 12);
    $pdf->Cell(40,129,'Placas:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(66, 12);
    $pdf->Cell(40,139,$placa, 0, 1, 'L');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(81, 12);
    $pdf->Cell(40,129,'Propietario:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(79, 12);
    $pdf->Cell(40,139,$propietario, 0, 1, 'L');

    $pdf->SetFont('Arial','B',9);
    $pdf->SetXY(105, 12);
    $pdf->Cell(40,129,'Licencia:', 0, 1, 'L');
    $pdf->SetFont('Arial','',7.5);
    $pdf->SetXY(111, 12);
    $pdf->Cell(40,139,$licencia, 0, 1, 'L');




    $pdf->SetFont('Arial','B',10);
    $pdf->SetXY(64, 12);
    $pdf->Cell(40,165,'Monto:', 0, 1, 'L');
    $pdf->SetFont('Arial','',8);
    $pdf->SetXY(65, 12);
    $pdf->Cell(40,177,$monto, 0, 1, 'L');
    
    
    

    $pdf->Output('i', 'C:/xampp/htdocs/controlVehicular/temp/multas/'.'.pdf', true);
    
?>