<?php
include_once('../../models/master/dokter.php');
$oDokter = new Dokter();

switch ($_POST['action'])
{
	case 'getdata' :
		$iPageSize = $_POST['pagesize'];
		$oDokter->GetData($_REQUEST, $iPageSize, $iPageSize);
	break;
	
	case 'add' :
		$datajson = json_decode($_POST['datajson']);
		$oDokter->_setIDPoli($datajson->IdPoli);
		$oDokter->_setNamaDokter($datajson->NamaDokter);
		$oDokter->_setUser($datajson->User);
		print $oDokter->Add();
	break;
}
exit();
?>