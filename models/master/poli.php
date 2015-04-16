<?php
class Poli 
{
	private $oService;
	private $IDPoli;
	private $PoliName;
	private $User;
	private $MsgErr;
	
	public function _getIDPoli()
	{
		$this->IDPoli;
	}
	
	public function _setIDPoli($iID)
	{
		$this->IDPoli = $iID;
	}
	
	public function _getNamaPoli()
	{
		$this->PoliName;
	}
	
	public function _setNamaPoli($sNamaPoli)
	{
		$this->PoliName = $sNamaPoli;
	}
	
	public function _getUser()
	{
		$this->User;
	}
	
	public function _setUser($sUser)
	{
		$this->User = $sUser;
	}
	
	public function _getMsgErr()
	{
		$this->MsgErr;
	}
	
	public function _setMsgErr($sMsgErr)
	{
		$this->MsgErr = $sMsgErr;
	}
		
	public function GetData($data,$limit,$adjacent){
		include('../../db/dbconnection.php');
		include('../../global/paging.php');
		$oConn =  new dbconnection();
		$this->oService = $oConn->opendb();
		try
		{	
			$page = $data['page'];
			if ($page == 1)
			{
				$start = 0;  
			}
			else
			{
				$start = ($page-1)*$limit;
			}
			
			$valuesearch = $data['valuesearch'];
			
			//get row count
			$sqlcount = "select * from refpoli";
			if ($valuesearch == ""){
				$sqlcount = $sqlcount;
			}
			else{
				$sqlcount .= " where namapoli like '%$valuesearch%' ";
			}
			$sth = $this->oService->prepare($sqlcount);
			$sth->execute();
			$rowscount = $sth->rowCount();
			
			$sql = "select * from refpoli";
			
			if ($valuesearch == ''){
				$sql .= " order by idpoli asc limit $start,$limit";
			}else{
				$sql .= " where namapoli like '%$valuesearch%' order by idpoli asc limit $start,$limit";
			}
			
			$data = $this->oService->prepare($sql);
			$data->execute();

			$str ='<table style="margin: auto; width: 80%; height: auto;" width="600" cellpadding="5"  width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">ID</th><th scope="col">Poli Name</th><th scope="col">Action</th></tr></thead><tbody>';
			if($data->rowCount()>0){
				while ($row = $data->fetch(PDO::FETCH_ASSOC)){
			  
			  $str.="<tr><td class='idpoli' >".$row['idpoli']."</td><td class='namapoli'>".$row['namapoli'];
			  $str.='<td><a href="javascript:void(0);" idpoli="'.$row['idpoli'].'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
			  $str.='</tr>';
			}

			}else{
			$str .= "<tr><td colspan='3' align='center'>No Data Available</td></tr>";
			}
		   
		   	$str .='</tbody></table>';
			echo $str; 
		   	
		   	pagination($limit,$adjacent,$rowscount,$page); 
		   	
			$sth = null;
			$this->oService = null;
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
		}
	}
	
	public function Add()
	{
		try
		{
			include_once('../../db/dbconnection.php');
			$oConn = new dbconnection();
			$this->oService = $oConn->opendb();
			
			$sql = 'insert into refpoli (namapoli, datecreate, createby ) values( ?, ?)';

			//parameter values stored in array
			$param = array(
				$this->PoliName,
				time,
				$this->User
			);
			$execute = $this->oService->prepare($sql);
			$execute->execute($param);
			return json_encode(1);
		} 
		catch (Exception $ex) 
		{
			return json_encode($ex->getMessage());
		}
	}
}
?>