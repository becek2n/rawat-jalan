<?php
session_start();
include_once('../../models/master/dokter.php');
$oDokter = new Dokter();

switch ($_POST['action'])
{
	case 'getdata' :
		$iPageSize = $_POST['pagesize'];
		$oDokter->GetData($_REQUEST, $iPageSize, $iPageSize);
	break;
	
	case 'add' :
		$jsonDokter = json_decode($_POST['jsonDokter']);
		$jsonPraktek = json_decode($_POST['jsonPraktek']);
		$objHariPraktek = $jsonPraktek->HariPraktek;
		$objJamDari = $jsonPraktek->JamDari;
		$objJamSampai = $jsonPraktek->JamSampai;
		
		$oDokter->_setIDPoli($jsonDokter->IdPoli);
		$oDokter->_setNamaDokter($jsonDokter->NamaDokter);
		$oDokter->_setUser($jsonDokter->User);
		
		//print $oDokter->Add($objHariPraktek, $objJamDari, $objJamSampai);
	break;
	
	case 'delete' :
		$jsonDokter = json_decode($_POST['dataJson']);
		$oDokter->_setIdDokter($jsonDokter->ID);
		$user = $_SESSION['user'];
		$oDokter->_setUser($_SESSION['user']);
		print $oDokter->DeleteById();
	break;
	
}
exit();
?>