<script type="text/javascript">
	$(document).ready(function(){
		$(document).on('click', 'button#m_oBtnNew', function(){ deleteConfirmation();});	
	})
	
	
	function deleteConfirmation(element) {	
		$("div#adddata").modal("show");
		
	}
</script>
<div class="page-header">
    <h3>
        Data Referensi Poli
    </h3>
</div>
<table style="margin: auto; width: 80%; height: auto;">
	<tr>
		<td>
			<button type="button" id="m_oBtnNew" class="btn btn-primary"><i class="icon-ok icon-white"></i> New</button>
		</td>
	</tr>
</table>

<div id="divTable"></div>
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
		</table>
	</div>
	<div class="modal-footer">
		<input type="hidden" id="user_id" value="" />
		<button class="btn btn-primary delete" id="m_oBtnSave">Save</button>
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
	</div>
</div>