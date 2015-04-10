<?php
//function __autoload($className){
	include_once("../models/pasien.php");	
//}

$users=new Pasien();

if(!isset($_POST['action'])) {
	print json_encode(0);
	return;
}
switch($_POST['action']) {
	case 'getdata':
		//$pageindex = $_POST['pageindex'];
		print $users->getdata();		
	break;
	
	case 'showdata':
		$pagesize = $_REQUEST['pagesize'];
		print $users->showData($_REQUEST,$pagesize,$pagesize);
	break;
	
	case 'getpoli':
		print $users->bindpoli();
	break;
	
	case 'getdatapager':
		$pageindex = $_POST['pageindex'];
		print $users->getdatapager($pageindex);		
	break;
	
	case 'add_user':
		$user = new stdClass;
		$user = json_decode($_POST['user']);
		print $users->add($user);		
	break;
	
	case 'delete_user':
		$user = new stdClass;
		$user = json_decode($_POST['user']);
		print $users->delete($user);		
	break;
	
	case 'update_field_data':
		$user = new stdClass;
		$user = json_decode($_POST['user']);
		print $users->updateValue($user);				
	break;
}

exit();