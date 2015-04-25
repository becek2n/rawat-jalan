<?php
include_once('../../models/master/poli.php');
$oPoli = new Poli();

switch ($_POST['action'])
{
	case 'getdata' :
		$iPageSize = $_POST['pagesize'];
		$oPoli->GetData($_REQUEST, $iPageSize, $iPageSize);
	break;
	
	case 'add' :
		$datajson = json_decode($_POST['datajson']);
		$oPoli->_setNamaPoli($datajson->PoliName);
		$oPoli->_setUser($datajson->User);
		print $oPoli->Add();
	break;
	
	case 'delete' :
		$datajson = json_decode($_POST['datajson']);
		$oPoli->_setIDPoli($datajson->Id);
		$oPoli->_setUser($datajson->User);
		print $oPoli->DeleteById();
	break;
}
exit();
?>