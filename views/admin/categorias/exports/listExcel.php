<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue("A1", "REPORTE DE CATEGORIAS");

$sheet->mergeCells("A1:D2");

// inicio de tabla
$inicio_tabla = 5;
$inicio = $inicio_tabla;

// cabecera de la tabla
$sheet->setCellValue('A' . $inicio_tabla, "Id");
$sheet->setCellValue('B' . $inicio_tabla, "Nombre");
$sheet->setCellValue('C' . $inicio_tabla, "Slug");
$sheet->setCellValue('D' . $inicio_tabla, "Imagen");


$inicio_tabla++;

foreach ($categorias as $categoria) {
    $sheet->setCellValue('A' . $inicio_tabla, $categoria->id);
    $sheet->setCellValue('B' . $inicio_tabla, $categoria->nombre);
    $sheet->setCellValue('C' . $inicio_tabla, $categoria->slug);
    $sheet->setCellValue('D' . $inicio_tabla, $categoria->imagen);
    $inicio_tabla++;
}

$fin = $inicio_tabla - 1;

$sheet->getStyle('A' . $inicio . ":" . 'D' . $fin)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

$sheet->getColumnDimension("A")->setAutoSize(true);
$sheet->getColumnDimension("B")->setAutoSize(true);
$sheet->getColumnDimension("C")->setAutoSize(true);
$sheet->getColumnDimension("D")->setAutoSize(true);






$writer = new Xlsx($spreadsheet);
$ruta = '';
// $write->save($ruta);
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=reporte_categorias.xlsx");
$writer->save("php://output");
