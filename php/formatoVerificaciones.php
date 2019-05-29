<?php
  error_reporting(0);
  session_start();
  if ($_SESSION['validacion']) {
      header("refresh:600;url=../html/cerrarSesion.php");
  } else {
      header("Location: ../html/FAcceso.php");
  }
  require('fpdf.php');
  $sql = "SELECT m.idverificacion, m.vehiculo, m.fecha, m.dictamen, m.periodo,v.propietario,v.placa, v.modelo, v.anio, v.serie
          FROM verificaciones m, vehiculos v
          WHERE  m.idverificacion = $idVerificacion AND m.vehiculo=v.idvehiculo ;";
  $query = Consulta($Con, $sql);
  $fila = mysqli_fetch_row($query);
  $idverificacion = $fila[0];
  $vehiculo = $fila[1];
  $fecha = $fila[2];
  $dictamen = $fila[3];
  if ($dictamen == 1) {$dictamen = "Aprobado";} else {$dictamen = "Reprobado";}
  $periodo = $fila[4];
  $propietario = $fila[5];
  $placa = $fila[6];
  $modelo = $fila[7];
  $year = $fila[8];
  $serie = $fila[9];
  $pdf = new FPDF();
  $pdf->AddPage('P', 'A5');
  // FRONTAL-------------------------------
  $pdf->Image('../temp/verificaciones/segob.jpg', 12, 10, 37);
  $pdf->Image('../temp/verificaciones/qro.png', 61, 15, 27);
  $pdf->Image('../temp/verificaciones/veri.png', 95, 16, 33);
  $pdf->Image('../temp/verificaciones/qroEsta.png', 55, 109, 38);
  $pdf->SetLeftMargin(23);
  $pdf->SetFont('Arial', 'B', 11);
  $pdf->SetXY(18, 12);
  $pdf->Cell(40, 69, 'Verificacion', 0, 1, 'L');
  $pdf->Cell(40, 1, '', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 5.5);
  $pdf->SetXY(95, 12);
  $pdf->Cell(40, 65, 'Fecha: ', 0, 1, 'L');
  $pdf->SetXY(103, 12);
  $pdf->Cell(40, 65, $fecha, 0, 1, 'L');
  $pdf->SetXY(95, 12);
  $pdf->Cell(40, 75, 'Periodo: ', 0, 1, 'L');
  $pdf->SetXY(105, 12);
  $pdf->Cell(40, 75, $periodo, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(30, 12);
  $pdf->Cell(40, 129, 'Folio:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 7.5);
  $pdf->SetXY(34, 12);
  $pdf->Cell(40, 139, $idverificacion, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(44, 12);
  $pdf->Cell(40, 129, 'Vehiculo:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 7.5);
  $pdf->SetXY(50, 12);
  $pdf->Cell(40, 139, $vehiculo, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(64, 12);
  $pdf->Cell(40, 129, 'Placas:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 7.5);
  $pdf->SetXY(66, 12);
  $pdf->Cell(40, 139, $placa, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(81, 12);
  $pdf->Cell(40, 129, 'Propietario:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 7.5);
  $pdf->SetXY(81, 12);
  $pdf->Cell(40, 139, $propietario, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 9);
  $pdf->SetXY(105, 12);
  $pdf->Cell(40, 129, 'Modelo:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 7.5);
  $pdf->SetXY(111, 12);
  $pdf->Cell(40, 139, $modelo, 0, 1, 'L');
  $pdf->SetFont('Arial', 'B', 10);
  $pdf->SetXY(58, 12);
  $pdf->Cell(40, 165, 'Dictamen:', 0, 1, 'L');
  $pdf->SetFont('Arial', '', 8);
  $pdf->SetXY(65, 12);
  $pdf->Cell(40, 177, $dictamen, 0, 1, 'L');
  $pdf->Output('F', $rutaVerificaciones . $idVerificacion . '.pdf', true);
?>