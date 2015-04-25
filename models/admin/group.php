<?php

class group{
	private $oService;
	
	private $IdGroup;
	private $GroupName;
	private $User;
	
	public function _getID()
	{
		$this->IdGroup;
	}
	
	public function _setID($ID)
	{
		$this->IdGroup = $ID;
	}
	
	public function _getGroupName()
	{
		$this->GroupName;
	}
	
	public function _setGroupName($sGroupName)
	{
		$this->GroupName= $sGroupName;
	}
	
	public function _getUser()
	{
		$this->User;
	}
	
	public function _setUser($sUser)
	{
		$this->User = $sUser;
	}
	
	function getdata($id){
		//include('./db/dbconnection.php');
		$objconn = new dbconnection();
		$this->oService = $objconn->opendb();
		try{
			if ($id == 0){
				$sql = 'select * from refgroup';	
			}
			else{
				$sql = "select * from refgroup where idgroup =$id";
			}
			
			$exec = $this->oService->prepare($sql);
			$exec->execute();
			$table = '';
			while($row = $exec->fetch(PDO::FETCH_ASSOC)){
				$table .= "<tr>";
				$table .= '<td>'.$row['idgroup'].'</td><td><a href="index.php?page=group&'. base64_encode('ref') . '='. base64_encode($row['idgroup']).'&'. base64_encode('groupname') . '=' . base64_encode($row['namagroup']).'">'.$row['namagroup'].'</a></td>';
				$table .= '</tr>';
			}
			
			$this->oService = null;
			$objconn = NULL;
			return $table;
		} catch (Exception $ex) {
			echo 'srj.models.user.getdata : ' .$ex;
		}
	}
	
	function save($idgroup, $datagroup){
		include_once('../../db/dbconnection.php');
		$objconn= new dbconnection();
		$this->oService = $objconn->opendb();
		try{
			$sqlcheck = "delete from refrole where idgroup =".$datagroup['id'];
			$data = $this->oService->prepare($sqlcheck);
			if ($data->execute())
			{

				foreach($idgroup as $rows){
				//check table role, if result null then insert to table else if result grather than 0 next looping
				//$sqlcheck = 'select * from refrole where idgroup ='. $datagroup['id'].' and idmenu = '.$rows;
				
				//$hasil = $data->rowCount();
					//if ($data->rowCount() == 0){
						$sth = $this->oService->prepare("insert into refrole (idgroup, idmenu, datecreate, createby) VALUES (?, ?, ?, ?)");
						$sth->execute(array($datagroup['id'], $rows, time(), $datagroup['user']));
					//}
				}
			}
			$objconn = null;
			$this->oService = null;
			return json_encode('Data successfully save');
			
		} 
		catch (Exception $ex) 
		{
			echo 'srj.models.group.save : ' . $ex;	
		}
	}
	
	public function GetGroup()
	{
		try
		{
			include_once('/db/dbconnection.php');
			$oConn = new dbconnection();
			$this->oService = $oConn->opendb();	
			
			$sql = 'select idgroup, namagroup from refgroup ';
			
			$execute = $this->oService->prepare($sql);
			$execute->execute();
			$html = '';
			while($data = $execute->fetch(PDO::FETCH_ASSOC))
			{
				$html .= '<option value="'.$data["idgroup"].'">' .$data['namagroup']. '</option>';
			}
			
			return $html;
		} 
		catch (Exception $ex) 
		{
			
		}
	}
}
?>