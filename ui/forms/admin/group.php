<table width="70%">
	<tr>
		<td>
			GROUP

		</td>
		<td>
			Menu
		</td>
	</tr>
	<tr>
		<td valign="top">
			<table width="100%">
				<tr>
					<td valign="top">
						Group Name
					</td>
					<td>
						<input type="text" id="m_oTbGroupName" maxlength="30" value="<?php echo base64_decode($_GET[base64_encode('groupname')]) ?>"/>
						<input type="hidden" id="m_oHfIDGroup" name="m_oHfIDGroup" value="<?php echo base64_decode($_GET[base64_encode('ref')]) ?>" />
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<form id="frm" method="post" action="index.php?page=menu">
						<button type="button" id="m_oBtnSave" name="m_oBtnSave" class="btn btn-primary">
							<i class="icon-ok icon-white"></i>
							 Save
						</button>
						<button type="submit" id="m_oBtnCancel" name="m_oBtnCancel" class="btn btn-primary">
							<i class="icon-remove icon-white"></i>
							 Cancel
						</button>
						</form>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<label id="m_oLblMsg" style="color: red"></label>
					</td>
				</tr>
				<tr></tr>
				<tr>
					<td colspan="2">
						<table class="table table-hover table-bordered">
							<tr>
								<td>
									Id Group
								</td>
								<td>
									Group Name
								</td>
							</tr>
							
								<?php 
									include('/controller/admin/group.php');
								?>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						USER
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<?php 
							include('/controller/admin/user.php');
						?>
					</td>
				</tr>
			</table>
			
		</td>
		<td>
			
			<div id='jqxWidget'>
				<div style='float: left;'>
			        <div id='jqxTree' style='visibility: hidden; float: left; margin-left: 20px;'>
						<?php 
							//include('../../../models/admin/menu.php');
							$oDaMenu = new menu();
							
							$oDaMenu->gettreeviewcheckbox(0,$id);
							
							$oDaMenu = NULL;
						?>
					</div>
			</div>
			</div>
			<div style='margin-left: 60px; float: left; visibility: hidden;'>       
                <div style='margin-top: 10px;'>
                    <div id='jqxCheckBox'>Three Check States</div>
                </div>
            </div>

		</td>
	</tr>
</table>

<input type="button" value="testing"/>
<script src="ui/js/application/group.js" ></script>
<script type="text/javascript">
        $(document).ready(function () {
            // create jqxTree
            $('#jqxTree').jqxTree({ height: '400px', hasThreeStates: true, checkboxes: true, width: '330px'});
            $('#jqxTree').css('visibility', 'visible');
            $('#jqxCheckBox').jqxCheckBox({ width: '200px', height: '25px', checked: true });
            $('#jqxCheckBox').on('change', function (event) {
                var checked = event.args.checked;
                $('#jqxTree').jqxTree({ hasThreeStates: checked });
            });
            $("#jqxTree").jqxTree('selectItem', $("#home")[0]);
        });
        
		$("input").click(function () {
		    var items = $("#jqxTree").jqxTree('getItems');
		    var data = '';
		    $.each(items, function () {
		    	(this.checked == true)?
		        	data += $.param({ label: this.label, checked: this.checked }) + "," : '';
		        
		    });
		
		});
</script>