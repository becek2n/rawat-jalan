<?php
include('../models/menu.php');

$oData = new menu();

switch($_GET['action']) {
	
	case 'gettreeviewchecbox':
		print $oData->gettreeviewcheckbox($_GET['id']);
	break;
	
}

exit();
?>