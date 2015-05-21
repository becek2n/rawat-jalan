<table width="100%">
	<tr>
		<td>
			ID Pasien
		</td>
		<td>
			<input type="text" id="m_oTbRegNumber" name="m_oTbRegNumber" class="input-large"/>
		</td>
	</tr>
	<tr>
		<td>
			Nama Pasien
		</td>
		<td>
			<input type="text" id="m_oTbNama" name="m_oTbNama" class="input-xlarge" maxlength="50" readonly="true"/>
		</td>
	</tr>
	<tr>
	 	<td>
	 		Poli
	 	</td>
	 	<td>
	 		<input type="text" id="m_oTbPoli" name="m_oTbPoli" class="input-large" readonly="true" />
	 	</td>
 	</tr>
	<tr>
		<td>
			Dokter
		</td>
		<td>
			<input type="text" id="m_oTbDokter" name="m_oTbDokter" class="input-xlarge" readonly="true"/>
		</td>
	</tr>
	<tr>
	 	<td valign="top">
	 		Tindakan
	 	</td>
	 	<td>
	 		<textarea id="m_oTbTindakan" name="m_oTbTindakan" class="input-xlarge"></textarea>
	 	</td>
 	</tr>
	<tr>
		<td>
			Harga
		</td>
		<td>
			<div class="input-append">
				<input type="text" id="m_oTbHarga" name="m_oTbHarga" class="input-large" onkeypress="return isNumberKey(event)"/>
				<button class="btn btn-info save" id="m_oBtnAdd"><i class="icon-circle-arrow-down"></i> Add</button>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" >
			<table id="m_oTblData" class="table table-hover table-bordered preview-table">
				<thead>
					<tr>
						<th class="no" width="5%">No</th>
						<th class="tindakan" width="50%">Tindakan</th>
						<th class="harga" align="center">Harga</th>
						<th class="remove" width="2%">Remove</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th colspan="2" align="right">Total</th>
						<th colspan="2" class="total" id="total"></th>
					</tr>
				</tfoot>
			</table>
		</td>
	</tr>	
	<tr>
		<td colspan="2" align="center">
			<label id="m_oLblMsg" style="color: red;"></label>
			
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
	
</table>

<div id="divHariKerja" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">		
		<h3 id="myModalLabel">Hari Kerja Dokter</h3>
	</div>
	<div class="modal-body" id="divContentHari"></div>
</div>