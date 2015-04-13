<?php
include_once('../models/admin/user.php');
$oUser = new user();

if ($_POST['m_oBtnLogin'] == 'Login')
{
	$oUser->_setUserName(trim($_POST['m_oTbUserName']));
	$oUser->_setPassword(trim($_POST['m_oTbPassword']));
	print $oUser->Login();
	$err =  $oUser->_getMsgErr();
	header('location: ../');
	//$oUser = null;
}

?>