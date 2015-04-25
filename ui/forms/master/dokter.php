<script src="ui/js/application/dokter.js"></script>
<div class="page-header">
    <h3>
        Data Dokter
    </h3>
</div>
<table style="margin: auto; width: 80%; height: auto;">
	<tr>
		<td>
			<button type="button" id="m_oBtnNew" class="btn btn-primary"><i class="icon-plus icon-white"></i> New</button>
		</td>
	</tr>
</table>
<br />
<table style="margin: auto; width: 80%; height: auto;">
	<tr>
		<td>
			<input type="text" id="m_oTbSearch" name="m_oTbSearch" placeholder="Search" onkeyup="getdata(1)" class="input-large"/>
		</td>
		<td>
			Page Size
			<select name="m_oDdlPageSize" id="m_oDdlPageSize" class="input-small" onchange="listdata()">
				<option value="10">10</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		</td>
	</tr>
</table>
<div id="divcontent"></div>
<!-- modal dialog -->
<div id="adddata" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">		
		<h3 id="myModalLabel">Add Dokter</h3>
	</div>
	
	<div class="modal-body">
		<table width="100%">
        	<tr>
				 	<td>
				 		Poli
				 	</td>
				 	<td></td>
				 	<td>
				 		
				 		<?php 
				 			include('/models/data/registrationpasien.php');
				 			$oPasien = new Pasien();
							echo $oPasien->bindDroppoli('db/dbconnection.php');
				 		?>
				 		
				 	</td>
			 	</tr>
			<tr>
				<td>
					Nama Dokter
				</td>
				<td></td>
				<td>
					<input type="text" id="m_oTbNama" maxlength="30"/>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<strong>Praktek Dokter </strong><br>
					<table width="100%">
						<tr>
							<td align="right">Hari Kerja</td>
							<td>:</td>
							<td>
								<select name="m_oDdlHariPraktek" id="m_oDdlHariPraktek">
									<option value="Senin">Senin</option>
									<option value="Selasa">Selasa</option>
									<option value="Rabu">Rabu</option>
									<option value="Kamis">Kamis</option>
									<option value="Jumat">Jumat</option>
									<option value="Sabtu">Sabtu</option>
									<option value="Minggu">Minggu</option>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Jam Kerja Dari</td>
							<td>:</td>
							<td>
								<select name="m_oDdlJamPrakterDari" id="m_oDdlJamPrakterDari">
								<?php 
									for($i= 1; $i<= 24; $i++)
									{
										echo '<option value="' . $i . ':00">' . $i . ':00</option>';
									}
								?>
								</select>
							</td>
						</tr>
						<tr>
							<td align="right">Jam Kerja Sampai</td>
							<td>:</td>
							<td>
								<select name="m_oDdlJamPrakterSampai" id="m_oDdlJamPrakterSampai">
								<?php 
									for($i= 1; $i<= 24; $i++)
									{
										echo '<option value="' . $i . ':00">' . $i . ':00</option>';
									}
								?>
								</select>
								<button class="btn btn-info save" id="m_oBtnAdd"><i class="icon-circle-arrow-down"></i>Add</button>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<table id="m_oTblData" class="table table-hover table-bordered preview-table">
									<thead>
										<tr>
											<th class="no">No</th>
											<th class="haripraktek">Hari Praktek</th>
											<th class="jampraktekdari">Jam Praktek Dari</th>
											<th class="jamprakteksampai">Jam Praktek Sampai</th>
											<th class="jamprakteksampai">Remove</th>
										</tr>
									</thead>
								</table>
							</td>
						</tr>	
					</table>
				</td>	
				
			</tr>
			<tr>
				<td colspan="3" align="center">
					<label id="m_oLblMsgChild" style="color: red"></label>
					<input type="hidden" id="m_oHfField" value="<?php echo $_SESSION['user']; ?>"></input>
				</td>
			</tr>
		</table>
	</div>
	<div class="modal-footer">
		<input type="hidden" id="user_id" value="" />
		<button class="btn btn-primary save" id="m_oBtnSave">Save</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	</div>
</div>