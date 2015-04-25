<?php
//function __autoload($className){
	include_once("../../models/data/registrationpasien.php");	
//}

$users=new Pasien();

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
switch($_POST['action']) {

	case 'getdata':
		$pagesize = $_REQUEST['pagesize'];
		print $users->showData($_REQUEST,$pagesize,$pagesize);
	break;
	
	case 'getdokter':
		$idPoli = $_POST['data'];
		print $users->bindDropDokter($idPoli);
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
		print $users->getdatapager($pageindex);		
	break;
	
	
}

exit();