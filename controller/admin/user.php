<?php
include('/models/admin/user.php');

$oDaUser = new user();

if ($_GET['pageindex'] == '' or $_GET['pageindex'] != ''){
	
	$pageindex = $_GET['pageindex'];
	if ($pageindex == ''){
	$pageindex = 1;
	}
	else{
		$pageindex= $pageindex;
	}

	echo $oDaUser->getdata($pageindex, 3, 3, 'index.php?page=group', $id);
	$oDaUser = null;
		
}

?>