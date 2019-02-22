<?php
require('fpdf181/fpdf.php');
require('conectt.php');

//-----

$dni= $_GET['id'];

$con = new DB;
$docente = $con->conectar();	

$strConsulta = "SELECT * from docente where dni =  '$dni'";

$result = mysqli_query($con->conect,$strConsulta);

$fila = mysqli_fetch_array($result);

//----



$pdf = new FPDF('P','mm','A4');
$pdf->AddPage('L','A4',	0);  // Orientación

$pdf->Image('ugel.jpg',0,0,300,211); // FONDO DE CERTIFICADO!!
$pdf->Image('codigo.png',250,180);  // imrimi código de barra...

$pdf->SetFont('Arial','B',20);
$pdf->Ln(114);
$pdf->Cell(0,6,' '.$fila['nombres']." ".$fila['apellidos'],0,0,'C');
$pdf->Output();
?>