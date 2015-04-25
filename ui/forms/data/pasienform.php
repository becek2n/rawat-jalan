<script>
	$(document).ready(function(){
		$(document).on("click", "button#m_oBtnSave", function(){ alert("tes"); });
		$(document).on("change", "select#m_oDdlPoli", function(){ getDokter(); });
		$(document).on("click", "button#m_oBtnSelect", function(){ popupDayWorkDokter(); });
	})
	
	function selectDayWorkDokter()
	{
		try
		{
			
		}
		catch(ex)
		{
			alert(ex.message());
		}
	}
	
	
</script>
<table style="margin-left:5%">
	<tr>
		<td align="center">
			<strong> Data Pasien</strong>
		</td>
		<td></td>
		<td align="center">
			<strong> Data Check Up</strong>
		</td>
	</tr>
	<br>
	<tr>
		<td>
			<table>
				<tr>
					<td>
						Registration Number
					</td>
					<td>
						<input type="text" id="m_oTbRegNumber" name="m_oTbRegNumber" class="input-xlarge" readonly="true"/>
					</td>
				</tr>
    	 		<tr>
    	 			<td>
    	 				Nama
    	 			</td>
    	 			<td>
    	 				<input type="text" id="m_oTbNama" name="m_oTbNama" class="input-xlarge"/>
    	 			</td>
    	 		</tr>
    	 		<tr>
    	 			<td>
    	 				Tempat Lahir
    	 			</td>
    	 			<td>
    	 				<input type="text" id="m_oTbTampatLahir" name="m_oTbTampatLahir" class="input-large"/>
    	 			</td>
    	 		</tr>
    	 		<tr>
    	 			<td>
    	 				Tanggal Lahir
    	 			</td>
    	 			<td>
    	 				<input type="text" id="m_oTbTanggalLahir" name="m_oTbTanggalLahir" class="input-large"/>
    	 			</td>
    	 		</tr>
		    	 <tr>
		    	 	<td>
		    	 		Usia
		    	 	</td>
		    	 	<td>
		    	 		<input type="text" id="m_oTbUsia" name="m_oTbUsia" class="input-small"/>
		    	 	</td>
		    	 </tr>
		    	 <tr>
    	 			<td>
    	 				Jenis Kelamin
    	 			</td>
    	 			<td>
    	 				<input type="radio" value="Laki-laki" name="m_oRdJK"/>Laki-Laki<br>
    	 				<input type="radio" value="Perempuan" name="m_oRdJK"/>Perempuan<br>
    	 			</td>
    	 		</tr>
    	 		<tr>
    	 			<td valign="top">
    	 				Agama
    	 			</td>
    	 			<td>
    	 				<input type="radio" value="Islam" name="m_oRdAgama" id="m_oRdAgama"/>Islam <br>
		 				<input type="radio" value="Kristen" name="m_oRdAgama"/>Kristen <br>
		 				<input type="radio" value="Hindu" name="m_oRdAgama"/>Hindu <br>
					 <input type="radio" value="Budha" name="m_oRdAgama"/>Budha <br>
			    	 </td>
			    </tr>
			    <tr>
			    	<td valign="top">
			    		Status
			    	</td>
			    	<td>
    	 				<input type="radio" value="Menikah" name="m_oRdStatus"/> Menikah <br>
						 <input type="radio" value="Janda/Duda" name="m_oRdStatus"/> Janda/Duda <br>
						 <input type="radio" value="Belum Menikah" name="m_oRdStatus"/> Belum Menikah <br>
			    	 </td>
			    </tr>
			</table>
		</td>
		<td width="5%"></td>
		<td valign="top">
			<table>
				<tr>
					<td>
						Nomor Antrian
					</td>
					<td>
						<input type="text" id="m_oTbNoAntri" name="m_oTbNoAntri" readonly="true"/>
					</td>
				</tr>
			 	<tr>
				 	<td>
				 		Poli
				 	</td>
				 	<td>

				 		<?php 
				 			include('../../../models/data/registrationpasien.php');
				 			$oData = new Pasien();
				 			$data = $oData->bindDropPoli('../../../db/dbconnection.php');
				 		?>

				 	</td>
			 	</tr>
			 	<tr>
				 	<td>
				 		Dokter
				 	</td>
				 	<td>
				 		<select name="m_oDdlDokter" id="m_oDdlDokter"></select>
				 	</td>
			 	</tr>
			 	<tr>
				 	<td>
				 		Hari 
				 	</td>
				 	<td>
				 		<div class="input-append">
				 			<input type="text" id="m_oTbHari" readonly="true"/>
				 			<button type="button" id="m_oBtnSelect" class="btn btn-info"><strong>...</strong></button>
				 		</div>
				 	</td>
			 	</tr>
			 </table>
		 </td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<div class="control-group">
				<div class="">		
					<button type="button" id="m_oBtnSave" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<label id="m_oLblMsg" style="color: red;"></label>
		</td>
	</tr>
</table>

<div id="divHariKerja" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">		
		<h3 id="myModalLabel">Hari Kerja Dokter</h3>
	</div>
	<div class="modal-body" id="divContentHari"></div>
</div>