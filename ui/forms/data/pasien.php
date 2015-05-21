<link href="ui/assets/jquery.ui/jquery-ui.css" rel="stylesheet" media="screen">

<script src="ui/assets/jquery.ui/jquery-ui.js"></script>
<div class="container">			
<div class="navbar">
	<div class="navbar-inner">    
		<ul class="nav">
			<li><a href="javascript:void(0);" id="pasienlist"><i class="icon-th icon-black"></i> List Data</a></li>
			<li><a href="javascript:void(0);" id="pasienregistre"><i class="icon-plus-sign icon-black"></i> Registration</a></li>
			<li><a href="javascript:void(0);" id="pasiencheckup"><i class="icon-plus-sign icon-black"></i> Check Up</a></li>
		</ul>
	</div>
</div>
<br>	

<div id="indicator" style="display: none; text-align: center;" class="loading_img">
	<img src="ui/img/indicator.gif"/>
</div>
<div id="divSearch">
	<table style="margin: auto; width: 100%; height: auto;">
		<tr>
			<td>
			Page Size
				<select name="m_oDdlPageSize" id="m_oDdlPageSize" class="input-small">
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
				Filter by : 
				<select name="m_oDdlFilter" id="m_oDdlFilter">
					<option value="idpasien">ID</option>
					<option value="nama">Nama</option>
					<option value="alamat">Alamat</option>
					<option value="agama">Religion</option>
					<option value="status">Status</option>
				</select>
				<input type="text" id="m_oTbSearch" name="m_oTbSearch" placeholder="Search" />
				<form method="post" action="ui/forms/report/pasien.php" target="_blank">
					<button type="submit" class="btn btn-info">Cetak</button>
				</form>
			</td>
		</tr>
	</table>
</div>
<div id="divcontent"></div>
<div id="divHariDokterPraktek"></div>
<input type="hidden" id="m_oHfField" value="<?php echo $_SESSION['user']; ?>"></input>
<script src="ui/js/application/registrationpasien.js"></script>

</div>
