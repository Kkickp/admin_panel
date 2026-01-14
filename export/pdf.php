<?php
require('../fpdf/fpdf.php');
include "../config/db.php";
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$q=$conn->query("SELECT * FROM jual");
while($r=$q->fetch_assoc()){
$pdf->Cell(40,10,$r['tanggal']);
$pdf->Cell(40,10,$r['total']);
$pdf->Ln();
}
$pdf->Output();
?>