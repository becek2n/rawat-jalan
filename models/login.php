
<?php
include('../db/dbconnection.php');
class Login {
	private $oService;
	private $IDGroup, $UserName, $FullName, $Password, $IsActive, $LastLogon, $LastLogoff, $CreateBy;
	
	public function _getIDGroup(){
		return $this->IDGroup;
	}
	public function _setIDGroup($iIdGroup){
		$this->IDGroup = $iIdGroup;
	}
	
	public function _getUserName(){
		return $this->UserName;
	}
	public function _setUserName($sUserName){
		$this->UserName = $sUserName;
	}
	
	public function _getFullName(){
		return $this->FullName;
	}
	public function _setFullName($sFullName){
		$this->FullName = $sFullName;
	}
	
	public function _getPassword(){
		return $this->Password;
	}
	public function _setPassword($sPassword){
		$this->Password = $sPassword;
	}
	
	public function _getIsActive(){
		return $this->IsActive;
	}
	public function _setIsActive($iIsActive){
		$this->IsActive = $sIsActive;
	}
	
	public function _getLastLogon(){
		return $this->LastLogon;
	}
	public function _setLastLogon($dtLastLogon){
		$this->LastLogon = $dtLastLogon;
	}
	
	public function _getLastLogoff(){
		return $this->LastLogoff;
	}
	public function _setLastLogoff($dtLastLogoff){
		$this->LastLogoff = $dtLastLogoff;
	}
	
	public function _getCreateBy(){
		return $this->CreateBy;
	}
	public function _setCreateBy($sCreateBy){
		$this->CreateBy = $sCreateBy;
	}
	
	public function Login(){
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		try{
			$sql = "select * from refuser where username = ? and password = ?";
			$execute = $this->oService->prepare($sql);
			$execute->execute(array($this->_getUserName(), $this->_getPassword()));
			$result = $execute->rowCount();
		}catch(Exception $ex){
			echo 'srj.models.login.login : ' . $ex->getMessage();
		}
	}
}
?>