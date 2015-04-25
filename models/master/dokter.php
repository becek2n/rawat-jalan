<?php
class Dokter 
{
	private $oService;
	private $IdPoli;
	private $IdDokter;
	private $NamaDokter;
	private $HariPraktek;
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
	
	public function _getIdDokter()
	{
		return $this->IdDokter;
	}
	
	public function _setIdDokter($iIdDokter)
	{
		$this->IdDokter = $iIdDokter;
	}
	
	public function _getIDPoli()
	{
		return $this->IDPoli;
	}
	
	public function _setIDPoli($iID)
	{
		$this->IDPoli = $iID;
	}
	
	public function _getNamaDokter()
	{
		return $this->NamaDokter;
	}
	
	public function _setNamaDokter($sNamaDokter)
	{
		$this->NamaDokter = $sNamaDokter;
	}
	
	public function _getHariPraktek()
	{
		return $this->HariPraktek;
	}
	
	public function _setHariPraktek($sHariPraktek)
	{
		$this->HariPraktek = $sHariPraktek;
	}
	
	public function _getJamPraktekFrom()
	{
		$this->JamPraktekFrom;
	}
	
	public function _setJamPraktekFrom($sJamPraktekFrom)
	{
		$this->JamPraktekFrom = $sJamPraktekFrom;
	}
	
	public function _getJamPraktekTo()
	{
		$this->JamPraktekTo;
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

			$str ='<table style="margin: auto; width: 80%; height: auto;" width="600" cellpadding="5"  width="600" cellpadding="5" class="table table-hover table-bordered"><thead></th><th scope="col">ID</th><th scope="col">Nama Dokter</th><th scope="col">Action</th></tr></thead><tbody>';
			if($data->rowCount()>0)
			{
				
				while ($row = $data->fetch(PDO::FETCH_ASSOC))
				{
					$iddokter = $row['iddokter'];
					$str.="<div id=".$iddokter." style=' cursor:pointer;'><tr onclick='detail(".$iddokter.")' style='cursor:pointer'><td align='center' colspan=''>".$row['iddokter']."</td><td class='namadokter'>".$row['namadokter']."</td>";
					$str.='<td><a href="javascript:void(0);" iddokter="'.$row['iddokter'].'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
					$str.='</tr></div>';

					//looping detail by id Dokter
					$str.='<tr id="'.'d'.$row['iddokter'].'" style="display:none"><td colspan="3">';
					$sqldetail = "select * from refdokterdetailpraktek where iddokter = ".$iddokter;
					$execute = $this->oService->prepare($sqldetail);
					$execute->execute();
					
					//table detail 
					$str .= '<table class="table table-hover table-bordered"><thead><tr><th scope="col">Hari</th><th scope="col">Jam Pratek Dari</th><th scope="col">Jam Praktek Sampai</th></tr></thead><tbody>';
					
					while($rowdetail = $execute->fetch(PDO::FETCH_ASSOC))
					{	
						$str .= '<tr><td>'.$rowdetail['hari'].'</td><td>'.$rowdetail['jamdari'].'</td><td>'.$rowdetail['jamsampai'].'</td></tr>';
					}
					
					$str .= '</tbody></table>';
					$str .= '</td></tr>';
					$execute= null;
				}
				
			}
			else
			{
				$str .= "<tr><td colspan='4' align='center'>No Data Available</td></tr>";
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
			echo $this->_getMsgErr();
		}
	}
	
	public function ListHariKerja($ID)
	{
		try
		{
			require_once("../../db/dbconnection.php");
			$oConn =  new dbconnection();
			$this->oService = $oConn->opendb();
			
			$sql = "select * from refdokterdetailpraktek where iddokter = " . $ID;
			$execute = $this->oService->prepare($sql);
			$execute->execute();
			
			//table detail 
			$html = '<table class="table table-hover table-bordered"><thead><tr><th>ID</th><th scope="col">Hari</th><th scope="col">Jam Pratek Dari</th><th scope="col">Jam Praktek Sampai</th></tr></thead><tbody>';
			while($data = $execute->fetch(PDO::FETCH_ASSOC))
			{
				$html .= "<tr onclick=".'"' . "selectDay("."'".$data['iddetailprakter'] . "'". ", "."'".$data['hari'] ."'". ")" . '"'. " style='cursor:pointer'>";
				$html .= '<td idhari="' . $data['iddetailprakter'] . '">'. $data['iddetailprakter']. '</td>';
				$html .= '<td idhari="' . $data['iddetailpraktek'] . '">'. $data['hari']. '</td>';
				$html .= '<td idhari="' . $data['jamdari'] . '">'. $data['jamdari']. '</td>';
				$html .= '<td idhari="' . $data['jamsampai'] . '">'. $data['jamsampai']. '</td>';
				$html .= '</tr>';
			}
			$html .= '</tbody></table>';
			
			$oConn = null;
			$this->oService = null;
			
			echo $html;
			
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
			echo $this->_getMsgErr();
		}
	}
	
	public function Add($objHari, $objJamDari, $objJamKe)
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
				//insert intor table master dokter
				$sql = 'insert into refdokter (idpoli,namadokter,datecreate,createby ) values( ?, ?, ?, ?)';
				
				$date = date("Y-m-d H:i:s");

				//parameter values stored in array
				$param = array(
					$this->_getIDPoli(),
					$this->_getNamaDokter(),
					$date,
					$this->_getUser()
				);
				$execute = $this->oService->prepare($sql);
				$execute->execute($param);
				
				//get ID Dokter from last insert id then set id Dokter
				$this->_setIdDokter($this->oService->lastInsertId());
				//$execute = null;
				
				//insert into table detail master Dokter
				$sqlDetail = 'insert into refdokterdetailpraktek (iddokter, hari, jamdari, jamsampai) values (?, ?, ?, ?)';
				$i = 0;
				foreach($objHari as $hari)
				{	
					$this->_setHariPraktek($objHari[$i]);
					$this->_setJamPraktekFrom($objJamDari[$i]);
					$this->_setJamPraktekTo($objJamKe[$i]);
					
					$paramDetail = array(
							$this->_getIdDokter(),
							$this->_getHariPraktek(),
							$this->JamPraktekFrom,
							$this->JamPraktekTo
					);
					$execute = $this->oService->prepare($sqlDetail);
					$execute->execute($paramDetail);
					
					$i += 1;
				}
				
				include_once('../../global/audittrial.php');
				$oAudit = new AuditTrail($this->oService);
				$oAudit->_setTableName('Dokter');
				$oAudit->_setAction('Add');
				
				$objField = 'Nama Dokter : '.$this->_getNamaDokter() . ' | ';
				$objField .= 'Date Create : '. date("Y-m-d H:i:s") . ' | ';
				$objField .= 'Create By : '.$this->_getUser();
				
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
				return json_encode('Dokter name already exists ');
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
		include_once('../../db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		try
		{
			$sql = 'delete from refdokter where iddokter = ?';
			$param = array($this->_getIdDokter());
			$execute = $this->oService->prepare($sql);
			$execute->execute($param);
			
			//insert to audit trail
			include_once('../../global/audittrial.php');
			$oAudit = new AuditTrail($this->oService);
			$oAudit->_setTableName('Dokter');
			$oAudit->_setAction('Delete');
			
			$objField = 'ID Dokter : '.$this->_getIdDokter() . ' | ';
			$objField .= 'Date : '. date("Y-m-d H:i:s") . ' | ';
			$objField .= 'Delete By : '.$this->_getUser();
			
			$oAudit->_setObjectField($objField);
			$oAudit->_setUser($this->_getUser());
			$oAudit->Add();
			
			$oConn = null;
			$this->oService = null;
			$oAudit = null;
			
			return json_encode('Data successfully delete');
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
			return json_encode('Error in models.dokter.deletebyid : ' . $ex->getMessage());
		}
	}
	
}
?>