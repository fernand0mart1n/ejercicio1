<?php 
header('Content-Type: application/pdf; charset=UTF-8');

require('../vendor/setasign/fpdf/fpdf.php');
include "busquedaweb.php";

if (!isset($_SESSION['seleccion'])){
	$_SESSION['seleccion'] = "Error de datos";
} else {
	$var = $_SESSION['seleccion'];
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$var,'TRB',2,'L' );
$pdf->Output();
