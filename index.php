<?php 
	session_start();
?>
<?php include("ui/header.php"); ?>
<?php //include("ui/forms/master/pasien.php"); 
	$page=(isset($_GET['page']))?$_GET['page']:"";
		switch($page){
		case'pasien':include"ui/forms/master/pasien.php";break;
		case'menu':include"ui/forms/admin/group.php";break;
		case'poli':include"ui/forms/master/poli.php";break;
		
		default:include"ui/footer.htm";
		}
					
?>
<div id="content"></div>
<?php include("./ui/deleteconfirmmodal.htm"); ?>
<?php include("ui/footer.htm"); ?>	
asdsa