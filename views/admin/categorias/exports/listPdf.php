<?php

$pdf = new TCPDF();

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(20, 20, 20);
$pdf->AddPage();

// añadir un logo
$ruta_imagen = \Core\Application::$ROOT_DIR . "/storage/logo.png";
$pdf->Image($ruta_imagen, 20, 0, 20, 20);

$pdf->Cell(0, 10, 'REPORTE DE CATEGORÍAS', 0, 0, 'C');

$pdf->Ln(10);

// array de anchos de las columnas
$anchos = [20, 50, 50, 0];

// definimos el color del fondo de celda
$pdf->SetFillColor(85, 170, 226);

// cambiar el font
$pdf->SetFont('helvetica', 'BI', 12);
// $pdf->SetFontSize(12);

// cabecera de tabla
$pdf->Cell($anchos[0], 10, 'Id', 1, 0, 'C', true);
$pdf->Cell($anchos[1], 10, 'Nombre', 1, 0, 'C', true);
$pdf->Cell($anchos[2], 10, 'Slug', 1, 0, 'C', true);
$pdf->Cell($anchos[3], 10, 'Imagen', 1, 0, 'C', true);
$pdf->Ln();

$pdf->SetFont('helvetica', '', 10);

$contador = 1;
foreach ($categorias as $categoria) {
    $pdf->Cell($anchos[0], 10, $contador, 1, 0, 'L');
    $pdf->Cell($anchos[1], 10, $categoria->nombre, 1, 0, 'L');
    $pdf->Cell($anchos[2], 10, $categoria->slug, 1, 0, 'L');
    $pdf->Cell($anchos[3], 10, $categoria->imagen, 1, 0, 'L');
    $pdf->Ln();
    $contador++;
}




$pdf->Output('reporte_categorias.pdf', 'I');
