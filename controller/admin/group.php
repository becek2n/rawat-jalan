<?php
include('/models/admin/group.php');

$oDa = new group();

$id = base64_decode($_GET[base64_encode('ref')]);
if ($id == '' or $id != '') {
	
	echo $oDa->getdata($id);
	$oDa = null;
}

?>