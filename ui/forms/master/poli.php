<script src="ui/js/application/poli.js"></script>
<div class="page-header">
    <h3>
        Data Referensi Poli
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
		<h3 id="myModalLabel">Add Poli</h3>
	</div>
	
	<div class="modal-body">
		<table>
			<tr>
				<td>
					Nama Poli
				</td>
				<td></td>
				<td>
					<input type="text" id="m_oTbNama" maxlength="30"/>
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
		<button class="btn btn-primary delete" id="m_oBtnSave">Save</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	</div>
</div>