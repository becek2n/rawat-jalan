<?php
require('../../../global/fpdf.php');

class PDF extends FPDF
{
	private $From;
	private $To;
	private $SearchBy;
	private $ValueSearch;
	
	public function _getFrom()
	{
		return $this->From;
	}
	
	public function _setFrom($sFrom)
	{
		$this->From = $sFrom;
	}
	
	public function _getTo()
	{
		return $this->To;
	}
	
	public function _setTo($sTo)
	{
		$this->To = $sTo;
	}
	
	public function _getSearchBy()
	{
		return $this->SearchBy;
	}
	
	public function _setSearchBy($sSearchBy)
	{
		$this->SearchBy = $sSearchBy;
	}
	
	public function _getValueSearch()
	{
		return $this->ValueSearch;
	}
	
	public function _setValueSearch($sValueSearch)
	{
		$this->ValueSearch = $sValueSearch;
	}
	
// Load data
function LoadData()
{
	include_once('../../../db/dbconnection.php');
	$oconn = new dbconnection();
	$service = $oconn->opendb();
	
	$sql = "select c.idpasien, p.nama pasien, po.namapoli poli, d.namadokter dokter, left(c.datecreate, 10) tglcheckup from refpasien p inner join datcheckup c on c.idpasien = p.idpasien inner join refpoli po on po.idpoli = c.idpoli inner join refdokter d on d.iddokter = c.iddokter where c.flagbayar = 1 ";
	
	$temp = "and left(c.datecreate, 10) between '" . $this->_getFrom() . "' and '" . $this->_getTo() . "'";
	
	if ($this->_getSearchBy() != 'all')
	{
		$FilterBy;
		if ($this->_getSearchBy() == 'idpasien')
		{
			$FilterBy = "c.idpasien";
		}
		if ($this->_getSearchBy() == 'nama')
		{
			$FilterBy = "p.nama";
		}
		if ($this->_getSearchBy() == 'poli')
		{
			$FilterBy = "po.namapoli";
		}
		if ($this->_getSearchBy() == 'dokter')
		{
			$FilterBy = "d.namadokter";
		}
		
		$sql .= " and " . $FilterBy . " like '%" . $this->_getValueSearch() . "%' ";
	}
	$execute = $service->prepare($sql);
	$execute->execute();
	
	return $execute->fetchAll();
	$oconn = null;
}

// Colored table
function FancyTable($header, $data)
{
	$this->SetFont('Arial','B', 15);
	$this->Cell(85);
	$this->Cell(30,10,'Data Rekam Medis',0,0,'C');
	$this->Ln();
	
	$this->SetFont('Arial','B', 10);
	$this->Cell(85);
	$this->Cell(30,10,'Rumah Sakit AZRA BOGOR',0,0,'C');
	$this->Ln();
	
	$this->SetFont('Arial','B', 10);
	$this->Cell(85);
	$this->Cell(30,10,'Periode : ' . $this->_getFrom() . ' s/d ' . $this->_getTo() ,0,0,'C');
	$this->Ln();
	
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	
	// Header
	$w = array(10, 20, 20, 30, 20, 20, 75);
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
		$this->Cell($w[0],6, $iNumber,'',0,'L',false);
		$this->Cell($w[1],6, $row['tglcheckup'],'',0,'L',false);
		$this->Cell($w[2],6, $row['idpasien'],'',0,'L',false);
		$this->Cell($w[3],6, $row['pasien'],'',0,'L',false);
		$this->Cell($w[4],6, $row['poli'],'',0,'L',false);
		$this->Cell($w[5],6, $row['dokter'],'',0,'L',false);
		
		include_once('../../../db/dbconnection.php');
		$oconn = new dbconnection();
		$service = $oconn->opendb();
		
		$sql = "select * from datcheckupdetail where idpasien = '" . $row['idpasien'] . "' and left(datecreate, 10) = '" . $row['tglcheckup'] . "'";
		
		$execute = $service->prepare($sql);
		$execute->execute();
		
		$datadetail = $execute->fetchAll();
		$oconn = null;
		
		$iLoop = 0;
		foreach ($datadetail as $detail)
		{
			if ($iLoop == 0)
			{
				//$this->Cell();
				$this->Cell($w[80],7,$detail['tindakan'],'',0,'L',false);
			}
			else
			{
				$this->Cell(120);
				$this->Cell($w[80],7,$detail['tindakan'],'',0,'L',false);
			}
			
			$this->Ln();
			$iLoop += 1;
		}
		//for($i=0; $i< 3; $i++)
		//{
		//	if ($i == 0)
		//	{
		//		//$this->Cell();
		//		$this->Cell($w[80],7,$header[$i],'',0,'L',false);
		//	}
		//	else
		//	{
		//		$this->Cell(120);
		//		$this->Cell($w[80],7,$header[$i],'',0,'L',false);
		//	}
			
		//	$this->Ln();
		//}
		//$this->Cell($w[6],6, '','LR',0,'L',$fill);
		//$this->Ln();
		$fill = !$fill;
		$iNumber += 1;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

if (isset($_POST['m_oBtnCetak']))
{
	$pdf = new PDF();
	
	$pdf->_setFrom($_POST['m_oTbFrom']);
	$pdf->_setTo($_POST['m_oTbTo']);
	$pdf->_setSearchBy($_POST['m_oDdlFilter']);
	$pdf->_setValueSearch($_POST['m_oTbFilter']);
	
	// Column headings
	$header = array('No', 'Tanggal', 'ID', 'Nama', 'Poli', 'Dokter', 'Tindakan');
	// Data loading
	$data = $pdf->LoadData();
	$pdf->SetFont('Arial','',14);
	
	$pdf->AddPage();
	$pdf->FancyTable($header,$data);
	$pdf->Output();
}

?>
