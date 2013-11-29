<?php
require('../lib/fpdf17/fpdf.php');
function BasicTable($services,$pdf)
{
    // Header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,7,'Name',1);
    $pdf->Cell(35,7,'Lastname',1);
    $pdf->Cell(40,7,'Number of services',1);
    $pdf->Cell(40,7,'Total of money',1);
    $pdf->Ln();
    // Data
    $pdf->SetFont('Arial','',9);
    $total = 0;
    foreach($services as $service)
    {
        
		$pdf->Cell(20,6,$service['users']['name'],1);
		$pdf->Cell(35,6,$service['users']['lastname'],1);
		$pdf->Cell(40,6,$service['0']['used_services'],1);
		$pdf->Cell(40,6,$service['0']['total_money'],1);
       
    }
    return $total;
}
$pdf = new FPDF("P","mm",array(150,300));
$pdf->AddPage();
$pdf->Image('../webroot/img/appbar.pokeball.png' , 35,8, 30, 30,'PNG');
$pdf->SetXY(35, 45);
$pdf->Cell(5,5,"Poke-Bill",0);
$pdf->Image('../webroot/img/bill_image.jpg' , 58,40, 15, 10,'JPG');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5,"-----------------------------------------",0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','B',16);

BasicTable($services,$pdf);
$pdf->Output("file.pdf","D");
?>
