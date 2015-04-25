
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
	<table style="margin: auto; width: 80%; height: auto;">
		<tr>
			<td>
				Filter by : 
				<select name="m_oDdlFilter" id="m_oDdlFilter">
					<option value="nama">Nama</option>
					<option value="alamat">Alamat</option>
					<option value="agama">Religion</option>
					<option value="status">Status</option>
				</select>
				<input type="text" id="m_oTbSearch" name="m_oTbSearch" placeholder="Search" onkeyup="searchdata()"/>
			</td>
		</tr>
	</table>
	Page Size
	<select name="m_oDdlPageSize" id="m_oDdlPageSize" class="input-small" onchange="listdata()">
		<option value="10">10</option>
		<option value="50">50</option>
		<option value="100">100</option>
	</select>
</div>

<div id="divcontent"></div>
<div id="divHariDokterPraktek"></div>

<script src="ui/js/application/registrationpasien.js"></script>

</div>
