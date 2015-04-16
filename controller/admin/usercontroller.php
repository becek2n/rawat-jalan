<?php

include_once('/models/admin/user.php');
class UserController extends user
{
	
	public function saveUser()
	{
		$bResult = true;
		try
		{
			if (isset($_POST['m_oBtnSave']))
			{
				$this->_setGroupID(trim($_POST['m_oDdlGroup']));
				$this->_setUserName(trim($_POST['m_oTbUser']));
				$this->_setFullName(trim($_POST['m_oTbFullName']));
				$this->_setPassword(trim($_POST['m_oTbPassword']));
				
				$this->Add();
				$this->_setGroupID('');
				$this->_setUserName('');
				$this->_setFullName('');
				$this->_setPassword('');
			}
		} 
		catch (Exception $ex) 
		{
			$bResult = false;
			$this->_setMsgErr($ex->getMessage());
		}
		
		return $bResult;
	}
	
	public function BindGroup()
	{
		$data = $this->GetGroup();
		return $data;
	}
	
	public function GetDataUser($sLink)
	{
		try
		{
			$pageIndex = $_GET['pageindex'];
			if ($pageIndex == '')
			{
				$pageIndex = 1;
			}	
			
			echo $this->ListUser($pageIndex, 10, 10, $sLink,'');
			
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
		}
	}
	public function Delete($ID)
	{
		$bResult = true;
		
		try
		{
			$this->_setIDUser($ID);
			$this->DeleteById();
		} 
		catch (Exception $ex) 
		{
			$bResult = false;
			$this->_setMsgErr($ex->getMessage());
		}
		
		return $bResult;
	}
}
?>