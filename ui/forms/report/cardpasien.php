<?php 
include_once('../../../models/data/checkup.php');
$oPasien = new Checkup();
$oPasien->_setRegNumber($_GET['idpasien']);
$odata = $oPasien->GetPasienCard();

?>
<table width="30%">
	<tr>
		<td colspan="3" width="5%" align="center">
			<h3> RUMAH SAKIT AZRA BOGOR </h3>
			<h4> RAWAT JALAN</h4>
		</td>
	</tr>
	<tr>
		<td>
			NO
		</td>
		<td width="1%" align="center">:</td>
		<td align="left">
			<?php echo $odata[0]['idpasien']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Nama
		</td>
		<td align="center">:</td>
		<td>
			<?php echo $odata[0]['nama']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Jenis Kelamin
		</td>
		<td align="center">:</td>
		<td>
			<?php echo $odata[0]['jeniskelamin']; ?>
		</td>
	</tr>
	<tr>
		<td>
			Tempat, Tanggal Lahir
		</td>
		<td align="center">:</td>
		<td>
			<?php echo $odata[0]['tempatlahir']; ?>
		</td>
	</tr>
</table>