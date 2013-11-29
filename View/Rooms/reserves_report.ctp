<?php

$this->layout= "login";
$user = $this->Session->read('User');
if($user!=null && $user['users']['rol']!='Admin')
$this->redirect('/proyecto_sisweb');
require('../lib/fpdf17/fpdf.php');
	// Simple table
function BasicTable($topUsers,$pdf)
{
    // Header
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(20,7,'User',1);
    $pdf->Cell(35,7,'Amount',1);
    $pdf->Ln();
    // Data
    $pdf->SetFont('Arial','',9);
    $total = 0;
    foreach($topUsers as $user)
    {
        
		$pdf->Cell(20,6,$user['User']['username'],1);
		$pdf->Cell(35,6,$user['0']['cantidad'],1);
          $pdf->Ln();
  
    }
}
$pdf = new FPDF('P','mm',array(100,450));
$pdf->SetFont('Arial','B',16);
$pdf->AddPage();
$pdf->Image('../webroot/img/appbar.pokeball.png' , 35,8, 30, 30,'PNG');
$pdf->SetXY(35, 45);
$pdf->Cell(5,5,"Clients",0);
$pdf->Image('../webroot/img/bill_image.jpg' , 58,40, 15, 10,'JPG');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5,"-----------------------------------------",0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$date = date('m/d/Y h:i:s a', time());
$pdf->Cell(5,5,"Date:".$date,0);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$total=BasicTable($users,$pdf);
$pdf->Ln();
$pdf->Cell(5,5,"-----------------------------------------------------------------------------",0);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(5,5,"Clients  with more reservations ",0);
$pdf->Ln();
$pdf->Cell(5,5,"in the hotel history",0);
$pdf->Ln();
$pdf->Output("file.pdf");
?>