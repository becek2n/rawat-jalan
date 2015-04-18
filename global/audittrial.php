<?php

class AuditTrail
{
	private $oService;
	private $TableName;
	private $Action;
	private $ObjectField;
	private $DTNow;
	private $User;
	private $MsgErr;
	
	public function _getTableName()
	{
		return $this->TableName;
	}
	
	public function _setTableName($sTableName)
	{
		$this->TableName = $sTableName;
	}
	
	public function _getAction()
	{
		return $this->Action;
	}
	
	public function _setAction($sAction)
	{
		$this->Action = $sAction;
	}
	
	public function _getObjectField()
	{
		return $this->ObjectField;
	}
	
	public function _setObjectField($sObjectField)
	{
		$this->ObjectField = $sObjectField;
	}
	
	public function _getDTNow()
	{
		$dtnow = new DateTime();
		return $this->DTNow = $dtnow->date;
	}
	
	public function _getUser()
	{
		return $this->User;
	}
	
	public function _setUser($sUser)
	{
		$this->User = $sUser;
	}
	
	public function _getMsgErr()
	{
		return $this->MsgErr;
	}
	
	public function _setMsgErr($sMsgErr)
	{
		$this->MsgErr = $sMsgErr;
	}
	
	public function __construct($obj)
	{
		//obj is object connection
		$this->oService = $obj;
	}
	
	public function Add()
	{
		try
		{
			$sql = 'insert into dataudittrail (tablename, action, objfield, datecreate, createby ) values(?, ?, ?, ?, ?)';
			$dtnow = new DateTime();
			//parameter values stored in array
			$param = array(
				$this->_getTableName(),
				$this->_getAction(),
				$this->_getObjectField(),
				'',
				$this->_getUser()
			);
			$execute = $this->oService->prepare($sql);
			$execute->execute($param);
			$this->_setMsgErr('Success');
		} 
		catch (Exception $ex) 
		{
			$this->_setMsgErr('Error'. $ex->getMessage());
		}
	}
	
}
?>