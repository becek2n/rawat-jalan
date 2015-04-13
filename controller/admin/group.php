<?php
include_once('/../../models/admin/group.php');

$oDa = new group();

$id = base64_decode($_GET[base64_encode('ref')]);
if ($id == '' or $id != '') {
	if ($_POST['action'] == ''){
		
		print $oDa->getdata($id);
	}
}
switch ($_POST['action']){
	case 'save' :
		$DataGroup = $_POST['group'];
		$IDGroup = $_POST['idgroup'];
		print $oDa->save($IDGroup, $DataGroup);
	break;
}

?>