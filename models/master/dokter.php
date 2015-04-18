<?php
class Dokter 
{
	private $oService;
	private $IdPoli;
	private $IdDokter;
	private $NamaDokter;
	private $JamPraktekFrom;
	private $JamPraktekTo;
	private $User;
	private $MsgErr;
	private $DTNow;
	
	public function _getDTNow()
	{
		$dt = new DateTime();
		$this->IDPoli = $dt->date;
	}
	
	public function _getIDPoli()
	{
		return $this->IDPoli;
	}
	
	public function _setIDPoli($iID)
	{
		$this->IDPoli = $iID;
	}
	
	public function _getIdDokter()
	{
		return $this->IdDokter;
	}
	
	public function _getNamaDokter()
	{
		return $this->NamaDokter;
	}
	
	public function _setNamaDokter($sNamaDokter)
	{
		$this->NamaDokter = $sNamaDokter;
	}
	public function _getJamPraktekFrom($sJamPraktekFrom)
	{
		$this->JamPraktekFrom = $sJaPraktekFrom;
	}
	public function _setJamPraktekTo($sJamPraktekTo)
	{
		$this->JamPraktekTo = $sJamPraktekTo;
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
			$sqlcount = "select * from refdokter";
			if ($valuesearch == ""){
				$sqlcount = $sqlcount;
			}
			else{
				$sqlcount .= " where namadokter like '%$valuesearch%' ";
			}
			$sth = $this->oService->prepare($sqlcount);
			$sth->execute();
			$rowscount = $sth->rowCount();
			
			$sql = "select * from refdokter";
			
			if ($valuesearch == ''){
				$sql .= " order by idpoli asc limit $start,$limit";
			}else{
				$sql .= " where namadokter like '%$valuesearch%' order by iddokter asc limit $start,$limit";
			}
			
			$data = $this->oService->prepare($sql);
			$data->execute();

			$str ='<table style="margin: auto; width: 80%; height: auto;" width="600" cellpadding="5"  width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">ID</th><th scope="col">Nama Dokter</th><th scope="col">Action</th></tr></thead><tbody>';
			if($data->rowCount()>0)
			{
				while ($row = $data->fetch(PDO::FETCH_ASSOC))
				{
			  
				  $str.="<tr><td class='iddokter' >".$row['iddokter']."</td><td class='namadokter'>".$row['namadokter']."</td>";
				  $str.='<td><a href="javascript:void(0);" iddokter="'.$row['iddokter'].'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
				  $str.='</tr>';
				}

			}
			else
			{
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
			//check
			//if poli name is already exists then exit process
			$sqlcheck = 'select * from refdokter where namadokter = ?';
			$executecheck = $this->oService->prepare($sqlcheck);
			$executecheck->execute(array($this->_getNamaDokter()));
			$resultcheck = $executecheck->rowCount();
			
			if ($resultcheck == 0)
			{
				//insert 
				$sql = 'insert into refdokter (idpoli,namadokter,datecreate,createby ) values( ?, ?, ?, ?)';
				
				//parameter values stored in array
				$param = array(
					$this->_getIDPoli(),
					$this->_getNamaDokter(),
					'',
					$this->_getUser()
				);
				$execute = $this->oService->prepare($sql);
				$execute->execute($param);
				
				include_once('../../global/audittrial.php');
				$oAudit = new AuditTrail($this->oService);
				$oAudit->_setTableName('Dokter');
				$oAudit->_setAction('Add');
				
				$objField = 'Nama Dokter : '.$this->_getNamaDokter() . ' | ';
				$objField .= 'Date Create : '. ' | ';
				$objField .= 'Create By : '.$this->_getUser() . ' | ';
				
				$oAudit->_setObjectField($objField);
				$oAudit->_setUser($this->_getUser());
				$oAudit->Add();
				$oConn = null;
				$this->oService = null;
				return json_encode($oAudit->_getMsgErr());
			}
			else
			{
				$this->oService = null;
				return json_encode('Poli name already exists ');
			}
			
		} 
		catch (Exception $ex) 
		{
			return json_encode($ex->getMessage());
		}
		return json_encode(1);
	}
	
	public function DeleteById()
	{
		include_once('/db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		
		try
		{
			$sql = 'delete from refuser where iduser = ?';
			$param = array($this->_getIDUser());
			$execute = $this->oService->prepare($sql);
			return $execute->execute($param);
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex);
		}
	}
	
}
?>