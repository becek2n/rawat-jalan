<div class="page-header">
    <h1>
        Login
    </h1>
</div>
<div class="container">
    <div class="row-fluid">
        <div class="span12">
            <div class="span6">
                <div class="area">
                        <form class="form-horizontal" method="post" action="">
                            
                            <div class="control-group">
                                <label class="control-label" for=
                                "inputUsername">Username</label>

                                <div class="controls">
                                    <input type="text" id="m_oTbUserName" name="m_oTbUserName" maxlength="30" class="input-large" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for=
                                "inputPassword">Password</label>

                                <div class="controls">
                                    <input id="m_oTbPassword" name="m_oTbPassword" type="password" maxlength="30" class="input-large" />
                                </div>
                            </div>


                            <div class="control-group">
                                <div class="controls">
                                    
                                    <input type="submit" id="m_oBtnLogin" name="m_oBtnLogin" value="Login" class="btn btn-success"></input>
                                </div>
                            </div>
                            <div class="alert alert-error">
                                 <strong>Access Denied!</strong>
                                <label id="m_oLblMsg" style="color: red">
                                	<?php 
                                		include_once('/models/admin/user.php');
										$oUser = new user();
										if (isset($_POST['m_oBtnLogin']))
										{
											if ($_POST['m_oBtnLogin'] == 'Login')
											{
												$oUser->_setUserName(trim($_POST['m_oTbUserName']));
												$oUser->_setPassword(trim($_POST['m_oTbPassword']));
												print $oUser->Login();
												//$oUser = null;
											}
											echo $oUser->_getMsgErr();
	                                		$oUser = null;	
										}
										
                                		
                                	?>
                                </label>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
