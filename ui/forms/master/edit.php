<?php
include('../phpclass/CMahasiswa');

$cm=new CMahasiswa();
$edit-$cm->getlist();
if($data =mysql_fetch_array($edit)){
?>
<form action="editbaraksi.php" method="post">
<table width="50%" border"1" align="center">
<tr>
	<td>NIM</td>
    <td><input name="nim1" type="text" value="<?php echo $data['nim'];?>"/></td>
</tr>
<tr>
 	<td>NAMA</td>
 	<td><input name="nama1" type="text" value="					<?php echo $data['nmmhs'];?>"/></td>
</tr>
<tr>
 	<td>Jenis Kelamin</td>
 	<td><input name="jnskel1" type="text" value="					<?php echo $data['jnskel'];?>"/></td>
</tr>
<tr>
 	<td>Agama</td>
 	<td><input name="agama1" type="text" value="					<?php echo $data['agama'];?>"/></td>
</tr>
<td colspan="2"><input name="submit" type="submit" value="update"/><a href="list.php">kembali</a>
	</td>
   </td>
   </tr>
  </table>
<?php
}
?>
</form>