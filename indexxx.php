<?php
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$row=file('toys.txt');
$pdf->SetFont('Arial','B',12);	
foreach($row as $rowValue) {
	$data=explode(';',$rowValue);
	foreach($data as $columnValue)
		$pdf->Cell(90,12,$columnValue,1);
		$pdf->SetFont('Arial','',12);		
		$pdf->Ln();
}
$pdf->Output();
?>