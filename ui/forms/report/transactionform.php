<link href="ui/assets/jquery.ui/jquery-ui.css" rel="stylesheet" media="screen"/>
<script src="ui/assets/jquery.ui/jquery-ui.js"></script>
<script>
$(document).ready(function(){
	//date 
    $("#m_oTbFrom").datepicker({
        onSelect: function (value, ui) {
        	var today = new Date(),
            dob = new Date(value),
            yearNow = today.getFullYear(),
            age = yearNow - ui.selectedYear; //This is the update
        },
        yearRange: '2015:2050',
        changeMonth: true,
        changeYear: true
    });
    $("#m_oTbTo").datepicker({
        onSelect: function (value, ui) {
        	var today = new Date(),
            dob = new Date(value),
            yearNow = today.getFullYear(),
            age = yearNow - ui.selectedYear; //This is the update
        },
        yearRange: '2015:2050',
        changeMonth: true,
        changeYear: true
    });
})
</script>
<div class="container">	
	<div class="page-header">
		<h3>Report Rekam Medis</h3>
	</div>
	<form method="post" action="ui/forms/report/transaction.php" target="_blank">
		<table width="80%">
			<tr>
				<td>
					From
				</td>
				<td>:</td>
				<td>
					<input type="text" name="m_oTbFrom" id="m_oTbFrom" class="input-small"/>
				</td>
			</tr>
			<tr>
				<td>
					To
				</td>
				<td>:</td>
				<td>
					<input type="text" name="m_oTbTo" id="m_oTbTo" class="input-small"/>
				</td>
			</tr>
			<tr>
				<td valign="top">
					Filter by
				</td>
				<td valign="top">:</td>
				<td>
					<select name="m_oDdlFilter" id="m_oDdlFilter">
						<option value="all">All</option>
						<option value="idpasien">ID</option>
						<option value="nama">Nama Pasien</option>
						<option value="poli">Poli</option>
						<option value="dokter">Dokter</option>
					</select><br/>
					<input type="text" name="m_oTbFilter" id="m_oTbFilter" class="input-xlarge"/>
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td colspan="3" align="left">
					<button type="submit" id="m_oBtnCetak" name="m_oBtnCetak" class="btn btn-success">
					<i class="icon-download"></i> Cetak</button>
				</td>
			</tr>
		</table>
	</form>
</div>