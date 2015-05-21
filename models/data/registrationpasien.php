<?php

class Pasien 
{		
	private $oService;
	private $RegistreNumber;
	private $Nama;
	private $TempatLahir;
	private $TanggalLahir;
	private $Usia;
	private $JenisKelamin;
	private $Alamat;
	private $Agama;
	private $Status;
	private $User;
	private $MsgErr;
	
	public function _getRegNumber()
	{
		return $this->RegistreNumber;
	}
	
	public function _setRegNumber($iRegNumber)
	{
		$this->RegistreNumber = $iRegNumber;
	}
	
	public function _getNama()
	{
		return $this->Nama;
	}
	
	public function _setNama($sNama)
	{
		$this->Nama = $sNama;
	}
	
	public function _getTempatLahir()
	{
		return $this->TempatLahir;
	}
	
	public function _setTempatLahir($sTempatLahir)
	{
		$this->TempatLahir = $sTempatLahir;
	}
	
	public function _getTanggalLahir()
	{
		return $this->TanggalLahir;
	}
	
	public function _setTanggalLahir($dtTanggalLahir)
	{
		$this->TanggalLahir = $dtTanggalLahir;
	}
	
	public function _getUsia()
	{
		return $this->Usia;
	}
	
	public function _setUsia($iUsia)
	{
		$this->Usia = $iUsia;
	}
	
	public function _getJenisKelamin()
	{
		return $this->JenisKelamin;
	}
	
	public function _setJenisKelamin($sJenisKelamin)
	{
		$this->JenisKelamin = $sJenisKelamin;
	}
	
	public function _getAlamat()
	{
		return $this->Alamat;
	}
	
	public function _setAlamat($sAlamat)
	{
		$this->Alamat = $sAlamat;
	}
	
	public function _getAgama()
	{
		return $this->Agama;
	}
	
	public function _setAgama($sAgama)
	{
		$this->Agama = $sAgama;
	}
	
	public function _getStatus()
	{
		return $this->Status;
	}
	
	public function _setStatus($sStatus)
	{
		$this->Status = $sStatus;
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
	
	function showData($data,$limit,$adjacent){
		include('../../db/dbconnection.php');
		include('../../global/paging.php');
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		
		$page = $data['page'];
		if($page==1){
			$start = 0;  
		}
		else{
			$start = ($page-1)*$limit;
		}
		$searchby = $data['searchby'];
		$valuesearch = $data['valuesearch'];
		
		$sqlcount = "select * from refpasien";
		if ($valuesearch == ""){
			$sqlcount = $sqlcount;
		}
		else{
			$sqlcount .= " where $searchby like '%$valuesearch%' ";
		}
		$sth = $this->oService->prepare($sqlcount);
		$sth->execute();
		//$sql = "select * from ajaxpage order by id asc";
		$rowscount = $sth->rowCount();
		
		$sql = "select * from refpasien";
		
		if ($valuesearch == ''){
			$sql .= " order by id asc limit $start,$limit";
		}else{
			$sql .= " where $searchby like '%$valuesearch%' order by id asc limit $start,$limit";
		}
		
		$data = $this->oService->prepare($sql);
		$data->execute();

		$str ='<table style="margin: auto; width: 100%; height: auto;" width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">ID Pasien</th><th scope="col">Name</th><th scope="col">Gender</th><th scope="col">Address</th><th scope="col">Religion</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead><tbody>';
		if($data->rowCount()>0){
			
			if ($searchby == 'nama'){
				$nama = $valuesearch;
			}
			else{
				$nama='';
			}
		while ($row = $data->fetch(PDO::FETCH_ASSOC)){
		  
		  $str.="<tr><td class='idpasien'>".$row['idpasien']."</td><td class='nama'>".$row['nama']."</td><td class='jeniskelamin'>".$row['jeniskelamin']."</td><td class='alamat'>".$row['alamat']."</td>";
		  $str.="<td class='agama'>".$row['agama']."</td><td>".$row['status']."</td>";
		  $str.='<td><a href="javascript:void(0);" idpasien="'.$row['idpasien'].'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
		  $str.='</tr>';
		}

		}else{
		$str .= "<tr><td colspan='6'>No Data Available</td></tr>";
		}
	   
	   	$str .='</tbody></table>';
		echo $str; 
	   	
	   	pagination($limit,$adjacent,$rowscount,$page); 
	   	
		$sth = null;
	}
	
	public function bindDropPoli($urlConn){
		require_once($urlConn);
		$objcon = new dbconnection();
		$this->oService = $objcon->opendb();
		
		try{
			
		  	$sqlpoli = "select * from refpoli order by idpoli asc";  
		  	$execpoli = $this->oService->prepare($sqlpoli);
		  	$execpoli->execute();
		  	$html = '<select name="m_oDdlPoli" id="m_oDdlPoli">';
		  	while($row = $execpoli->fetch(PDO::FETCH_ASSOC)){
				$html .= '<option value="'.$row['idpoli'].'">'.$row['namapoli'];	
			}
			$html .= '</select>';
			$objcon  = null;
			$this->oService = null;
			
			echo $html;
		} catch (Exception $ex) {
			echo 'srj.models.registrationpasien.bindpoli : '.$ex;
		}
		
	}
		
	public function getRegNumber()
	{
		try
		{
			include('../../../db/dbconnection.php');
			$oConn = new dbconnection();
			$this->oService = $oConn->opendb();
			
			$formatDate = date("Ymd");
			
			$sqlRegNumber = "SELECT max(substring( idpasien, 9 )) + 1 AS result FROM  refpasien WHERE left(idpasien, 8) = '" . $formatDate . "'";			
			//execute sql registre number
			$execRegNumber = $this->oService->prepare($sqlRegNumber);
			$execRegNumber->execute();
			$resultRegNumber = $execRegNumber->fetch(PDO::FETCH_ASSOC);
			$RegNo = $formatDate;
			if ($resultRegNumber['result'] == null)
			{
				$RegNo .= 1;
			}
			else
			{
				$RegNo .= $resultRegNumber['result'];
			}
		  	$this->_setRegNumber($RegNo);
		  	
		  	$oConn = null;
		  	$this->oService =null;
		  	
		  	//return json_decode($datJson);
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
			//return json_encode($ex->getMessage());
		}
	}
	
	public function bindpoli(){
		include('../../db/dbconnection.php');
		include('../../global/paging.php');
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		
		try{
		  	$sqlpoli = "select * from refpoli order by idpoli asc";  
		  	$execpoli = $this->oService->prepare($sqlpoli);
		  	$execpoli->execute();
		  	
		  	$oddlpoli = '<select name="m_oDdlPoli">';
		  	while($row = $execpoli->fetch(PDO::FETCH_ASSOC)){
				$oddlpoli .= '<option value="'.$row['idpoli'].'">'.$row['namapoli'];	
			}
			$oddlpoli .= '</select>';
			
			//get maximal id from pasien
			$sqlregistre = "select max(id) + 1 as hasil from refpasien";
			$execregistre = $this->oService->prepare($sqlregistre);
		  	$execregistre->execute();
		  	$resultregistre = $execregistre->fetch(PDO::FETCH_ASSOC);
		  	$idregistre = $resultregistre['hasil'];
		  	
			//get maximal id from checkup
			$sqlantrian = "select max(idcheck) + 1 hasil from datcheckup";
			$execantrian = $this->oService->prepare($sqlantrian);
		  	$execantrian->execute();
		  	$resultantrian = $execantrian->fetch(PDO::FETCH_ASSOC);		  	
		  	$idantrian = $resultantrian['hasil'];
		  	if($idantrian == NULL){
				$idantrian = 1;
			}
		  	
		  	$data[] = array(
		  		'poli'=> $oddlpoli,
		  		'register'=> $idregistre,
		  		'antrian'=> $idantrian
		  	);
		  	
			echo json_encode($data);
		} catch (Exception $ex) {
			echo 'srj.models.pasien.bindpoli : '.$ex;
		}
		$this->oService = null;
	}
}
?>
