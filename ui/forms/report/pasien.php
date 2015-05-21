<?php
require('../../../global/fpdf.php');

class PDF extends FPDF
{
// Load data
function LoadData()
{
	include_once('../../../db/dbconnection.php');
	$oconn = new dbconnection();
	$service = $oconn->opendb();
	
	$sql = 'select idpasien, nama, alamat, jeniskelamin, agama, tempatlahir, tanggallahir, usia from refpasien';
	
	$execute = $service->prepare($sql);
	$execute->execute();
	
	return $execute->fetchAll();
	$oconn = null;
}

// Colored table
function FancyTable($header, $data)
{
	
	// Header
	$this->SetFont('Arial','B', 15);
	$this->Cell(85);
	$this->Cell(30,10,'Data Pasien',0,0,'C');
	$this->Ln();
	
	$this->SetFont('Arial','B', 10);
	$this->Cell(85);
	$this->Cell(30,10,'Rumah Sakit AZRA BOGOR',0,0,'C');
	$this->Ln();
	
	
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B', 9);
	
	$w = array(10, 20, 35, 40, 25, 20, 20, 25, 10);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	$this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	
	// Data
	$fill = false;
	$iNumber = 1;
	foreach($data as $row)
	{
		$this->Cell($w[0], 6, $iNumber, 'LR', 0, 'L', $fill);
		$this->Cell($w[1],6,$row['idpasien'],'LR',0,'L',$fill);
		$this->Cell($w[2],6,$row['nama'],'LR',0,'L',$fill);
		$this->Cell($w[3],6,$row['alamat'],'LR',0,'L',$fill);
		$this->Cell($w[4],6,$row['jeniskelamin'],'LR',0,'L',$fill);
		$this->Cell($w[5],6,$row['agama'],'LR',0,'L',$fill);
		$this->Cell($w[6],6,$row['tempatlahir'],'LR',0,'L',$fill);
		$this->Cell($w[7],6,$row['tanggallahir'],'LR',0,'L',$fill);
		$this->Cell($w[8],6,$row['usia'],'LR',0,'L',$fill);
		$this->Ln();
		$fill = !$fill;
		$iNumber += 1;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
$header = array('No', 'ID', 'Nama', 'Alamat', 'Jenis Kelamin', 'Agama', 'Tempat Lahir', 'Tanggal Lahir', 'Usia');
// Data loading
$data = $pdf->LoadData();
$pdf->SetFont('Arial','', 9);
$pdf->SetLeftMargin(2);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();
?>
