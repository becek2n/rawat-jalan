<?php
include_once("../../models/data/checkup.php");	

$objCheckUp = new Checkup();

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
switch($_POST['action']) {

	case 'getdata':
		$pagesize = $_REQUEST['pagesize'];
		print $objCheckUp->showData($_REQUEST,$pagesize,$pagesize);
	break;
	
	case 'getdatapayment':
		$pagesize = $_REQUEST['pagesize'];
		print $objCheckUp->getDataPemabayaran($_REQUEST,$pagesize,$pagesize);
	break;
	
	case 'getdokter':
		$idPoli = $_POST['data'];
		print $objCheckUp->bindDropDokter($idPoli);
	break;
	
	case 'getharipraktek':
		require_once("../../models/master/dokter.php");
		$oDokter = new Dokter();
		$idDokter = $_POST['idDokter'];
		print $oDokter->ListHariKerja($idDokter);
		$oDokter = null;
	break;
	
	case 'getdatapager':
		$pageindex = $_POST['pageindex'];
		print $objCheckUp->getdatapager($pageindex);		
	break;
	
	case 'add':
		$objJson = json_decode($_POST['dataJson']);
		$objCheckUp->_setRegNumber($objJson->RegNumber);
		$objCheckUp->_setNama($objJson->Nama);
		$objCheckUp->_setTempatLahir($objJson->TempatLahir);
		$objCheckUp->_setTanggalLahir($objJson->TanggalLahir);
		$objCheckUp->_setUsia($objJson->Usia);
		$objCheckUp->_setJenisKelamin($objJson->JenisKelamin);
		$objCheckUp->_setAlamat($objJson->Alamat);
		$objCheckUp->_setAgama($objJson->Agama);
		$objCheckUp->_setStatus($objJson->Status);
		$objCheckUp->_setNoAntrian($objJson->NoAntrian);
		$objCheckUp->_setIdPoli($objJson->Poli);
		$objCheckUp->_setIdDokter($objJson->Dokter);
		$objCheckUp->_setIdHari($objJson->Hari);
		$objCheckUp->_setFlag(0);
		$objCheckUp->_setUser($objJson->User);
		print $objCheckUp->SaveRegistre();
	break;
	
	case 'getpaseienbyid' :
		$IDPasien = $_POST['ID'];
		$objCheckUp->_setRegNumber($IDPasien);
		print $objCheckUp->GetPasienById();
	break;
	
	case 'getpasien' :
		$IDPasien = $_POST['ID'];
		$objCheckUp->_setRegNumber($IDPasien);
		print $objCheckUp->GetPasienPembayaran();
	break;
	
	case 'addcheckup' :
		$objJson = json_decode($_POST['dataJson']);
		$objCheckUp->_setRegNumber($objJson->RegNumber);
		$objCheckUp->_setNoAntrian($objJson->NoAntrian);
		$objCheckUp->_setIdPoli($objJson->Poli);
		$objCheckUp->_setIdDokter($objJson->Dokter);
		$objCheckUp->_setIdHari($objJson->Hari);
		$objCheckUp->_setFlag(0);
		$objCheckUp->_setUser($objJson->User);
		if ($objCheckUp->SaveCheckup() == false)
		{
			return json_encode(0);
		}
		else
		{
			return json_encode(1);
		}
	break;
	
	case 'delete' :
		$jsonPasien = json_decode($_POST['dataJson']);
		$objCheckUp->_setRegNumber($jsonPasien->ID);
		$objCheckUp->_setUser($jsonPasien->User);
		print $objCheckUp->DeleteById();
	break;
	
	case 'payment' :
		$jsonData = json_decode($_POST['dataJson']);
		$objCheckUp->_setRegNumber($jsonData->RegNumber);
		$objCheckUp->_setUser($jsonData->User);
		$arrayTindakan = $jsonData->Tindakan;
		$arrayHarga = $jsonData->Harga;
		
		print $objCheckUp->SavePembayaran($arrayTindakan, $arrayHarga);
		
	break;
}
//$objCheckUp = null;
exit();