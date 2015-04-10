
<table style="margin-left:5%">
	<tr>
		<td align="center">
			Data Pasien
		</td>
		<td></td>
		<td align="center">
			Data Check Up
		</td>
	</tr>
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
				 		<select name="m_oDdlPoli">
				 		<?php 
				 			include('../../../models/pasien.php');
				 			$oData = new Pasien();
				 			while($data = $oData->bindpoli()){
								echo '<option values="'.$data['idpoli'].'"/>sasa';
							}
				 		?>
				 			<option value="1">1</option>
				 		</select>
				 	</td>
			 	</tr>
			 </table>
		 </td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<div class="control-group">
				<div class="">		
					<button type="button" id="add" class="btn btn-primary"><i class="icon-ok icon-white"></i> Add</button>
				</div>
			</div>
		</td>
	</tr>
</table>