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
    $sql = "SELECT uso, nombre, RFC, serie, marca, linea, sublinea, cilindraje, capCarga, puerta, combustible, transmision, placa, modelo, numMotor, origen, color
            FROM vehiculos v, propietarios p
            WHERE v.propietario = p.RFC AND idVehiculo = $idVehiculo;";
    $query = Consulta($Con, $sql);   
    $fila = mysqli_fetch_row($query);
    $uso = $fila[0];
    $nombre = $fila[1];
    $RFC = $fila[2];
    $serie = $fila[3];
    $marca = $fila[4];
    $linea = $fila[5];
    $sublinea = $fila[6];
    $cilindraje = $fila[7];
    $capCarga = $fila[8];
    $puertas = $fila[9];
    $combustible = $fila[10];
    $transmision = $fila[11];
    $placa = $fila[12];
    $modelo = $fila[13];
    $numMotor = $fila[14];
    $origen = $fila[15];
    $color = $fila[16];
    $pdf = new FPDF();
    $pdf->AddPage('L', 'A5');
    // columna1
    $pdf->SetFont('Courier', 'B', 3);
    $pdf->SetXY(16, 12);
    $pdf->Cell(15, 1.5, 'TIPO DE SERVICIO', 0, 1, 'L');
    $pdf->SetXY(16, 13.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $uso, 0, 1, 'L');
    $pdf->SetXY(16, 15);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'PROPIETARIO:', 0, 1, 'L');
    $pdf->SetXY(24, 15);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $nombre, 0, 1, 'L');
    $pdf->SetXY(16, 19);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'RFC', 0, 1, 'L');
    $pdf->SetXY(16, 20.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $RFC, 0, 1, 'L');
    $pdf->SetXY(16, 22);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'LOCALIDAD:', 0, 1, 'L');
    $pdf->SetXY(16, 23.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'SANTIAGO DE', 0, 1, 'L');
    $pdf->SetXY(16, 25);
    $pdf->Cell(15, 1.5, 'QUERÉTARO', 0, 1, 'L');
    $pdf->SetXY(16, 26.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'MUNICIPIO:', 0, 1, 'L');
    $pdf->SetXY(16, 28);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'QUERÉTARO', 0, 1, 'L');
    $pdf->SetXY(16, 30.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1, 'NÚMERO DE CONSTANCIA:', 0, 1, 'L');
    $pdf->SetXY(16, 31.5);
    $pdf->Cell(15, 1, 'DE INSCRIPCION (MCI):', 0, 1, 'L');
    $pdf->SetXY(16, 34.5);
    $pdf->Cell(15, 1.5, 'ORIGEN:', 0, 1, 'L');
    $pdf->SetXY(16, 36);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $origen, 0, 1, 'L');
    $pdf->SetXY(16, 37.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'COLOR:', 0, 1, 'L');
    $pdf->SetXY(16, 39);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $color, 0, 1, 'L');
    // columna2
    $pdf->SetXY(36.5, 12);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'HOLOGRAMA', 0, 1, 'L');
    $pdf->SetXY(33.5, 19);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'Número de serie', 0, 1, 'L');
    $pdf->SetXY(33.5, 20.5);
    $pdf->Cell(15, 1.5, $serie, 0, 1, 'L');
    $pdf->SetXY(33.5, 22);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'MARCA/LÍNEA/SUBLÍNEA', 0, 1, 'L');
    $pdf->SetXY(33.5, 23.5);
    $pdf->SetFontSize(4);
    $pdf->MultiCell(16, 1.25, $marca.'/'.$linea.'/'.$sublinea, 0, 'L');
    $pdf->SetXY(33.5, 30.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'CILINDRAJE', 0, 1, 'L');
    $pdf->SetXY(42.5, 30.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, $cilindraje, 0, 1, 'L');
    $pdf->SetXY(33.5, 32);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'CAPACIDAD', 0, 1, 'L');
    $pdf->SetXY(42.5, 32);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, $capCarga, 0, 1, 'L');
    $pdf->SetXY(33.5, 33.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'PUERTAS', 0, 1, 'L');
    $pdf->SetXY(42.5, 33.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, $puertas, 0, 1, 'L');
    $pdf->SetXY(33.5, 35);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'ASIENTOS', 0, 1, 'L');
    $pdf->SetXY(42.5, 35);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, '5', 0, 1, 'L');
    $pdf->SetXY(33.5, 36.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'COMBUSTIBLE', 0, 1, 'L');
    $pdf->SetXY(42.5, 36.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, $combustible, 0, 1, 'L');
    $pdf->SetXY(33.5, 38);
    $pdf->SetFontSize(3);
    $pdf->Cell(8, 1.5, 'TRANSMISIÓN', 0, 1, 'L');
    $pdf->SetXY(33.5, 39.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(8, 1.5, $transmision, 0, 1, 'L');
    // columna3
    $pdf->SetXY(51.5, 12);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'FOLIO', 0, 1, 'L');
    $pdf->SetXY(51.5, 13.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, '00100045', 0, 1, 'L');
    $pdf->SetXY(51.5, 30.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'CVE. VEHICULAR', 0, 1, 'L');
    $pdf->SetXY(51.5, 32);
    $pdf->SetFontSize(4);
    $pdf->Cell(11, 1.5, '5612', 0, 1, 'C');
    $pdf->SetXY(51.5, 33.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(5, 1.5, 'CLASE', 0, 1, 'L');
    $pdf->SetXY(57, 33.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(5, 1.5, '1', 0, 1, 'L');
    $pdf->SetXY(51.5, 35);
    $pdf->SetFontSize(3);
    $pdf->Cell(5, 1.5, 'TIPO', 0, 1, 'L');
    $pdf->SetXY(57, 35);
    $pdf->SetFontSize(4);
    $pdf->Cell(5, 1.5, '5', 0, 1, 'L');
    $pdf->SetXY(51.5, 36.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(5, 1.5, 'REC', 0, 1, 'L');
    $pdf->SetXY(57, 36.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(5, 1.5, '36', 0, 1, 'L');
    $pdf->SetXY(51.5, 38);
    $pdf->SetFontSize(3);
    $pdf->Cell(5, 1.5, 'RFA', 0, 1, 'L');
    // columna4
    $pdf->SetXY(75.5, 12);
    $pdf->Cell(15, 1.5, 'PLACA', 0, 1, 'L');
    $pdf->SetXY(75.5, 13.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $placa, 0, 1, 'L');
    $pdf->SetXY(68.5, 19);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'MODELO', 0, 1, 'L');
    $pdf->SetXY(68.5, 20.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $modelo, 0, 1, 'L');
    $pdf->SetXY(68.5, 22);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'OPERACION', 0, 1, 'L');
    $pdf->SetXY(68.5, 23.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'AD651', 0, 1, 'L');
    $pdf->SetXY(68.5, 25);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'FOLIO', 0, 1, 'L');
    $pdf->SetXY(68.5, 26.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'A-99990220', 0, 1, 'L');
    $pdf->SetXY(68.5, 28);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'PLACA ANT.', 0, 1, 'L');
    $pdf->SetXY(68.5, 29.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, '', 0, 1, 'L');
    $pdf->SetXY(68.5, 31);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'FECHA DE EXPEDICIÓN', 0, 1, 'L');
    $pdf->SetXY(68.5, 32.5);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, '30-DIC-15', 0, 1, 'L');
    $pdf->SetXY(68.5, 34);
    $pdf->SetFontSize(3);
    $pdf->Cell(13, 1.5, 'OFICINA EXPEDIDORA', 0, 1, 'L');
    $pdf->SetXY(81.5, 34);
    $pdf->SetFontSize(4);
    $pdf->Cell(3, 1.5, '1', 0, 1, 'L');
    $pdf->SetXY(68.5, 35.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'MOVIMIENTO', 0, 1, 'L');
    $pdf->SetXY(68.5, 37);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, 'TARJETA DE CIRCULACION', 0, 1, 'L'); 
    $pdf->SetXY(68.5, 38.5);
    $pdf->SetFontSize(3);
    $pdf->Cell(15, 1.5, 'NÚMERO DE MOTOR', 0, 1, 'L');
    $pdf->SetXY(68.5, 40);
    $pdf->SetFontSize(4);
    $pdf->Cell(15, 1.5, $numMotor, 0, 1, 'L');
    $pdf->SetFillColor(5, 58, 195);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 5);
    $pdf->SetXY(29, 56);
    $pdf->Cell(45, 6, 'TARJETA DE CIRCULACION VEHICULAR 2019', 0, 0, 'C', true);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 4);
    $pdf->SetXY(62, 47);
    $pdf->Cell(20, 1.5, 'PODER  EJECUTIVO  DEL', 0, 0, 'L');
    $pdf->SetXY(62, 48.5);
    $pdf->SetFontSize(3.95);
    $pdf->Cell(20, 1.4, 'ESTADO DE QUERÉTARO', 0, 0, 'L');
    $pdf->SetXY(62, 49.8);
    $pdf->SetFontSize(2.3);
    $pdf->Cell(20, 1.4, 'SECRETARIA DE PLANEACION Y FINANZAS', 0, 0, 'L');
    $pdf->Image('../temp/tarjetas/recursos/poderEjecutivo.jpg', 12, 43, 0, 12);
    $pdf->Image('../temp/tarjetas/recursos/qroEsta.png', 38, 46, 0, 6);
    $tempDir = $rutaQR.$RFC.".png"; //Guarda QR en dir
    $nivel = 'H';
    $tamaño = 5;
    $marco = 0;
    $informacion = "Propietario: ".$nombre."\n";
    $informacion .= "RFC: ".$RFC."\n";
    $informacion .= "VEHICULO: ".$marca." ".$modelo." ".$linea." ".$sublinea."\n";
    $informacion .= "Placa: ".$placa."\n";
    $informacion .= "Serie: ".$serie."\n";
    $informacion .= "Combustible: ".$combustible."\n";
    $informacion .= "Origen: ".$origen."\n";
    QRcode::png($informacion, $tempDir, $nivel, $tamaño);
    $pdf->Image($tempDir, 81, 50, 12.5); //obtiene imagen de carpeta usa RFC
    $pdf->Output('F', $rutaTarjeta.$idVehiculo.'.pdf', true); // 'F' Guarda pdf en dir tep
?>