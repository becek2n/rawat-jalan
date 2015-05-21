<?php 
session_start();

?>
<?php include("ui/header.php"); ?>
<?php //include("ui/forms/master/pasien.php"); 
	$page=(isset($_GET['page']))?$_GET['page']:"";
		switch($page){
		case'pasien':include"ui/forms/data/pasien.php";break;
		case'pembayaran':include"ui/forms/data/pembayaran.php";break;
		case'group':include"ui/forms/admin/group.php";break;
		case'poli':include"ui/forms/master/poli.php";break;
		case'user':include"ui/forms/admin/user.php";break;
		case'dokter':include"ui/forms/master/dokter.php";break;
		case 'reporttransaction' : include "ui/forms/report/transactionform.php"; break;
		case 'logout' :
			$_SESSION['user'] = '';
			session_destroy();
			echo "<script>document.location= 'index.php';</script>";
		break;
		default:include"ui/footer.htm";
		}
					
?>
<div id="content">
	
</div>
<?php include("./ui/deleteconfirmmodal.htm"); ?>
<?php include("ui/footer.htm"); ?>	
