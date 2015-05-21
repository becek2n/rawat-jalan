<link href="ui/assets/jquery.ui/jquery-ui.css" rel="stylesheet" media="screen"/>

<script src="ui/assets/jquery.ui/jquery-ui.js"></script>
<div class="container">			
<div class="navbar">
	<div class="navbar-inner">    
		<ul class="nav">
			<li><a href="javascript:void(0);" id="pembayaran"><i class="icon-plus-sign icon-black"></i> Pembayaran</a></li>
			<li><a href="javascript:void(0);" id="listcheckup"><i class="icon-th icon-black"></i> List Data</a></li>
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
			From 
			<input type="text" id="m_oTbFrom" name="m_oTbFrom" class="input-small"/>
			To 
			<input type="text" id="m_oTbTo" name="m_oTbTo" class="input-small"/>
			
				Filter by : 
				<select name="m_oDdlFilter" id="m_oDdlFilter">
					<option value="idpasien">ID</option>
					<option value="nama">Nama</option>
					<option value="alamat">Alamat</option>
					<option value="agama">Tanggal</option>
				</select>
				<input type="text" id="m_oTbSearch" name="m_oTbSearch" placeholder="Search"/>
			</td>
		</tr>
		<tr>
			<td>
				Page Size
				<select name="m_oDdlPageSize" id="m_oDdlPageSize" class="input-small">
					<option value="10">10</option>
					<option value="50">50</option>
					<option value="100">100</option>
				</select>
			</td>
		</tr>
	</table>
	
</div>

<div id="divcontent"></div>
<input type="hidden" id="m_oHfField" value="<?php echo $_SESSION['user']; ?>"></input>
<script src="ui/js/application/pembayaran.js"></script>

</div>
