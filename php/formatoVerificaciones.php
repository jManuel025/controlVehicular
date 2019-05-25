        <?php

         include('conexion.php');
                 $Con = Conectar();
        require('fpdf.php');
        $sql = "SELECT m.idverificacion, m.vehiculo, m.fecha, m.dictamen, m.periodo,v.propietario,v.placa, v.modelo, v.anio, v.serie
                FROM verificaciones m, vehiculos v
                WHERE  m.idverificacion = 1 AND m.vehiculo=v.idvehiculo ;";
        $query = Consulta($Con, $sql);   
        $fila = mysqli_fetch_row($query);
        //     $folio = $fila[0];
        $idverificacion = $fila[0];
        $vehiculo = $fila[1];
        $fecha = $fila[2];
        $dictamen = $fila[3];
        $periodo = $fila[4];
        $propietario = $fila[5]; 
        $placa = $fila[6];
        $modelo = $fila[7];
        $year = $fila[8];
        $serie = $fila[9];

        //     Desconectar($Con);
                
        
        $pdf = new FPDF();
        $pdf->AddPage('P', 'A5');

        // require('barcode.php');
        // $filepath = 'C:/xampp/htdocs/controlVehicular/barras/'.$folio.'.png';
        // $text=$folio;
        // $size=40;
        // $orientation="horizontal";
        // $code_type="Code128";
        // $print=true;
        // $sizefactor="1";
        // barcode($filepath, $text, $size, $orientation, $code_type, $print,$sizefactor);
        // FRONTAL-------------------------------
        $pdf->Image('../temp/verificaciones/segob.jpg', 12, 10, 37 );
        $pdf->Image('../temp/verificaciones/qro.png', 61, 15, 27);
        $pdf->Image('../temp/verificaciones/veri.png', 95, 16, 33 );
        $pdf->Image('../temp/verificaciones/qroEsta.png', 55, 109, 38);
        
        //$pdf AQUI VA EL CODIGO DE BARRAS     , 68,109,27);
        



        $pdf->SetLeftMargin(23);
        $pdf->SetFont('Arial','B',11);
        $pdf->SetXY(18, 12);
        $pdf->Cell(40,69,'Verificacion', 0, 1, 'L');
        
        $pdf->Cell(40,1,'', 0, 1, 'L');
        $pdf->SetFont('Arial','',5.5);
        $pdf->SetXY(95, 12);
        $pdf->Cell(40,65,'Fecha: ', 0, 1, 'L');
        $pdf->SetXY(103, 12);
        $pdf->Cell(40,65,$fecha, 0, 1, 'L');
       // $pdf->SetXY(95, 12);
     //   $pdf->Cell(40,65,'Dictamen: ', 0, 1, 'L');
   //     $pdf->SetXY(101.5, 12);
 //       $pdf->Cell(40,65,$dictamen, 0, 1, 'L');
        $pdf->SetXY(95, 12);
        $pdf->Cell(40,75,'Periodo: ', 0, 1, 'L');
        $pdf->SetXY(105, 12);
        $pdf->Cell(40,75,$periodo, 0, 1, 'L');
       // $pdf->SetXY(95, 12);
        //$pdf->Cell(40,85,'Lugar: ', 0, 1, 'L');
        //$pdf->SetXY(102, 12);
//        $pdf->Cell(40,85,$lugar, 0, 1, 'L');



//        $pdf->SetFont('Arial','B',9);
  //      $pdf->SetXY(65, 12);
    //    $pdf->Cell(40,95,'Motivo:', 0, 1, 'L');
      //  $pdf->SetFont('Arial','',7.5);
        //$pdf->SetXY(27, 12);
        //$pdf->Cell(40,105,$motivo, 0, 1, 'L');



        $pdf->SetFont('Arial','B',9);
        $pdf->SetXY(30, 12);
        $pdf->Cell(40,129,'Folio:', 0, 1, 'L');
        $pdf->SetFont('Arial','',7.5);
        $pdf->SetXY(34, 12);
        $pdf->Cell(40,139,$idverificacion, 0, 1, 'L');

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
        $pdf->SetXY(81, 12);
        $pdf->Cell(40,139,$propietario, 0, 1, 'L');

        $pdf->SetFont('Arial','B',9);
        $pdf->SetXY(105, 12);
        $pdf->Cell(40,129,'Modelo:', 0, 1, 'L');
        $pdf->SetFont('Arial','',7.5);
        $pdf->SetXY(111, 12);
        $pdf->Cell(40,139,$modelo, 0, 1, 'L');




        $pdf->SetFont('Arial','B',10);
        $pdf->SetXY(58, 12);
        $pdf->Cell(40,165,'Dictamen:', 0, 1, 'L');
        $pdf->SetFont('Arial','',8);
        $pdf->SetXY(65, 12);
        $pdf->Cell(40,177,$dictamen, 0, 1, 'L');
        
        
        

        $pdf->Output('i', 'C:/xampp/htdocs/controlVehicular/temp/verificaciones/'.'.pdf', true);
