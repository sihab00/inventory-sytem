<?php
include_once "../fpdf.php";

if (isset($_POST['order_date'])) {
	$pdf = new FPDF();
	$pdf->AddPage();

	$pdf->Output();
}
