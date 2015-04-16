<div class="page-header">
    <h3>
        User
    </h3>
</div>
<form name="oForm" method="post" action="">
	<table  style="margin: auto; width: 100%; height: auto;" width="600" cellpadding="5" >
		<tr>
			<td align="right">
				Group
			</td>
			<td>
				:
			</td>
			<td>
				<select name="m_oDdlGroup" id="m_oDdlGroup">
					<?php 
						include_once('/controller/admin/usercontroller.php');
						$oControlUser = new UserController();
						
						echo $oControlUser->BindGroup();
						
						if (isset($_POST['m_oBtnSave']) == 'save')
						{
							if ($oControlUser->saveUser() == true)
							{
								echo "<script>alert('Data successully save')</script>";
							}
							else
							{
								$errMsg = $oControlUser->_getMsgErr();
							}
						}
						$encodedelete = base64_encode('delete');
						$idUser = base64_decode($_GET[$encodedelete]);
						
						if ($idUser != '')
						{
							if ($oControlUser->Delete($idUser) == true)
							{
								echo "<script>alert('Data successully delete')</script>";
							}
							else
							{
								$errMsg = $oControlUser->_getMsgErr();
							}
						}
						
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">
				User Name
			</td>
			<td>
				:
			</td>
			<td>
				<input type="text" id="m_oTbUser" name="m_oTbUser" class="input-large" maxlength="20" value="<?php echo $oControlUser->_getUserName(); ?>"/>
			</td>
		</tr>
		<tr>
			<td align="right">
				Full Name
			</td>
			<td>
				:
			</td>
			<td>
				<input type="text" id="m_oTbFullName" name="m_oTbFullName" class="input-large" maxlength="30" value="<?php echo $oControlUser->_getFullName(); ?>"/>
			</td>
		</tr>
		<tr>
			<td align="right">
				Password
			</td>
			<td>
				:
			</td>
			<td>
				<input type="password" id="m_oTbPassword" name="m_oTbPassword" class="input-large" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td align="right">
				Confirm Password
			</td>
			<td>
				:
			</td>
			<td>
				<input type="password" id="m_oTbConfirm" name="m_oTbConfirm" class="input-large" maxlength="30"/>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<button type="submit" id="m_oBtnSave" name="m_oBtnSave" value="save" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
				<button type="reset" id="m_oBtnCancel" name="m_oBtnCancel" class="btn btn-primary"><i class="icon-remove icon-white"></i> Cancel</button>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="center">
				<label id="m_oLblMsg" style="color: red"><?php echo ($errMsg) ? $errMsg : ''; ?></label>
			</td>
		</tr>
	</table>
</form>

<table style="margin: auto; width: 80%; height: auto;" width="600" cellpadding="5" >
	<tr>
		<td>
			<?php
				$oControlUser->GetDataUser('index.php?page=user');
				$oControlUser = null;
			?>
		</td>
	</tr>
</table>

<script type="text/javascript" src="ui/js/application//user.js"></script>