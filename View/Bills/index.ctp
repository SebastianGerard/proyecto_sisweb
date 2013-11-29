<?php

$this->layout= "login";
$user = $this->Session->read('User');
if($user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');
require('../lib/fpdf17/fpdf.php');


	// Simple table
function BasicTable($services,$pdf)
{
    // Header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,7,'Name',1);
    $pdf->Cell(35,7,'Date',1);
    $pdf->Cell(25,7,'Price',1);
    $pdf->Ln();
    // Data
    $pdf->SetFont('Arial','',9);
    $total = 0;
    foreach($services as $service)
    {
        
		$pdf->Cell(20,6,$service['Service']['name'],1);
		$pdf->Cell(35,6,$service['Service']['date'],1);
		$pdf->Cell(25,6,$service['Service']['amount'],1);
        $pdf->Ln();
        $total = $total + $service['Service']['amount'];
    }
    return $total;
}

$pdf = new FPDF('P','mm',array(100,450));
$pdf->SetFont('Arial','B',16);
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
$user = $users[0];
$pdf->Cell(5,5,"NIT:".$user['User']['NIT'],0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5,"Name:".$user['User']['name'],0);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$date = date('m/d/Y h:i:s a', time());
$pdf->Cell(5,5,"Date:".$date,0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$total=BasicTable($services,$pdf);
$pdf->Ln();
$pdf->Cell(5,5,"Total:".$total,0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5,"-----------------------------------------------------------------------------",0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5," Total or partial reproduction and / or unauthorized ",0);
$pdf->Ln();
$pdf->Cell(5,5,"use of this invoice constitutes an offense punishable",0);
$pdf->Ln();
$pdf->Cell(5,5,"                conforms to Law",0);
$pdf->Ln();
$pdf->Output("file.pdf","D");
?>