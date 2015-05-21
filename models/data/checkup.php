<?php

require_once("registrationpasien.php");
class Checkup extends Pasien
{
	private $NoAntrian;
	private $IdPoli;
	private $IdDokter;
	private $IdHari;
	private $Flag;
	private $Tindakan;
	private $Harga;
	
	public function _getNoAntrian()
	{
		return $this->NoAntrian;
	}
	
	public function _setNoAntrian($iNo)
	{
		$this->NoAntrian = $iNo;
	}
	
	public function _getIdPoli()
	{
		return $this->IdPoli;
	}
	
	public function _setIdPoli($iIdPoli)
	{
		$this->IdPoli = $iIdPoli;
	}
	
	public function _getIdDokter()
	{
		return $this->IdDokter;
	}
	
	public function _setIdDokter($iIdDokter)
	{
		$this->IdDokter = $iIdDokter;
	}
	
	public function _getIdHari()
	{
		return $this->IdHari;
	}
	
	public function _setIdHari($iIdHari)
	{
		$this->IdHari = $iIdHari;
	}
	
	public function _getFlag()
	{
		return $this->Flag;
	}
	
	public function _setFlag($iFlag)
	{
		$this->Flag = $iFlag;
	}
	
	public function _getTindakan()
	{
		return $this->Tindakan;
	}
	
	public function _setTindakan($sTindakan)
	{
		$this->Tindakan = $sTindakan;
	}
	
	public function _getHarga()
	{
		return $this->Harga;
	}
	
	public function _setHarga($dcHarga)
	{
		$this->Harga = $dcHarga;
	}
	
	public function getNoAntri()
	{
		try{
			require_once('../../../db/dbconnection.php');
			$oConn = new dbconnection();
			$this->oService = $oConn->opendb();
			
			$dtSearch = date("Y-m-d");
			$sqlCheckNumber = "select count(noantrian) + 1 result from datcheckup where left(datecreate, 10) = '" . $dtSearch . "'";
			//execute sql checkup number
		  	$execCheckNumber = $this->oService->prepare($sqlCheckNumber);
			$execCheckNumber->execute();
			$resultCheckNumber = $execCheckNumber->fetch(PDO::FETCH_ASSOC);
		  	$checkNumber = $resultCheckNumber['result'];
			
			$this->_setNoAntrian($checkNumber);
			
			
		} catch (Exception $ex) {
			$this->_setMsgErr("error in models.chcekup.getnoantri : " .$ex->getMessage());
		}
		
	} 
	
	public function bindDropDokter($idPoli)
	{
		try
		{
			include_once("../../db/dbconnection.php");
			
			$obj = new dbconnection();
			$this->oService = $obj->opendb();
			
			$sqldokter = "select * from refdokter where idpoli = " . $idPoli . " order by namadokter";  
		  	$execdokter = $this->oService->prepare($sqldokter);
		  	$execdokter->execute();
		  	
		  	$dtSearch = date("Y-m-d");
			$sqlCheckNumber = "select max(noantrian) + 1 result from datcheckup where left(datecreate, 10) = '" . $dtSearch . "' and idpoli = '" . $idPoli . "'";
			//execute sql checkup number
		  	$execCheckNumber = $this->oService->prepare($sqlCheckNumber);
			$execCheckNumber->execute();
			$resultCheckNumber = $execCheckNumber->fetch(PDO::FETCH_ASSOC);
		  	$checkNumber = ($resultCheckNumber['result'] == null) ? 1 : $resultCheckNumber['result'] ;
			
			$this->_setNoAntrian($checkNumber);
		  	
		  	$arrayResponse = array(
		  		$dataDokter = $execdokter->fetchAll(),
		  		$noAntri = $this->_getNoAntrian()
		  	);
		  	
		  	return json_encode($arrayResponse);
			
			$objcon  = null;
			$this->oService = null;			
		}
		catch(Exception $ex)
		{
			return json_encode("error in models.chcekup.binddropdokter : " . $ex->getMessage());
		}
	}
	
	public function GetPasienById()
	{
		try
		{
			include_once("../../db/dbconnection.php");
			
			$obj = new dbconnection();
			$this->oService = $obj->opendb();
			
			$sql = "select * from refpasien where idpasien = '" . $this->_getRegNumber() . "'" ;  
		  	$execdokter = $this->oService->prepare($sql);
		  	$execdokter->execute();
		 
		  	return json_encode($dataDokter = $execdokter->fetchAll());
			
			$objcon  = null;
			$this->oService = null;
		}
		catch(Exception $ex)
		{
			return json_encode("error in models.chcekup.getpasienbyid : " . $ex->getMessage());
		}
	}
	
	public function GetPasienCard()
	{
		try
		{
			include_once("/../../db/dbconnection.php");
			
			$obj = new dbconnection();
			$this->oService = $obj->opendb();
			
			$sql = "select * from refpasien where idpasien = '" . $this->_getRegNumber() . "'" ;  
		  	$execdokter = $this->oService->prepare($sql);
		  	$execdokter->execute();
		 
		  	return $dataDokter = $execdokter->fetchAll();
			
			$objcon  = null;
			$this->oService = null;
		}
		catch(Exception $ex)
		{
			return "error in models.chcekup.getpasienbyid : " . $ex->getMessage();
		}
	}
	
	public function GetPasienPembayaran()
	{
		try
		{
			include_once("../../db/dbconnection.php");
			
			$obj = new dbconnection();
			$this->oService = $obj->opendb();
			
			$sql = "select p.nama, rp.namapoli, d.namadokter from refpasien p inner join datcheckup c on c.idpasien = p.idpasien inner join refpoli rp on rp.idpoli = c.idpoli inner join refdokter d on d.iddokter = c.iddokter where c.flagbayar = 0 and p.idpasien = '" . $this->_getRegNumber() . "'" ;  
		  	$execdokter = $this->oService->prepare($sql);
		  	$execdokter->execute();
		 
		  	return json_encode($dataDokter = $execdokter->fetchAll());
			
			$objcon  = null;
			$this->oService = null;
		}
		catch(Exception $ex)
		{
			return json_encode("error in models.chcekup.getpasienbyid : " . $ex->getMessage());
		}
	}
	
	public function SaveRegistre()
	{
		try
		{
			include_once('../../db/dbconnection.php');
			$oConn = new dbconnection();
			$this->oService = $oConn->opendb();
			//insert table registre
			$sqlRegistre = "insert into refpasien (idpasien, nama, tempatlahir, tanggallahir, jeniskelamin, usia, alamat, agama, status, datecreate, createby) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$param = array(
				$this->_getRegNumber(),
				$this->_getNama(),
				$this->_getTempatLahir(),
				$this->_getTanggalLahir(),
				$this->_getJenisKelamin(),
				$this->_getUsia(),
				$this->_getAlamat(),
				$this->_getAgama(),
				$this->_getStatus(),
				date("Y-m-d H:i:s"),
				$this->_getUser()
			);
			
			$execute = $this->oService->prepare($sqlRegistre);
			$execute->execute($param);
			
			if ($this->SaveCheckup() == false)
			{
				return json_encode("error in models.chcekup.savecheckup : " .$this->_getMsgErr());
			}
			else
			{
				
				include_once('../../global/audittrial.php');
				$oAudit = new AuditTrail($this->oService);
				$oAudit->_setTableName('Pasien');
				$oAudit->_setAction('Add');
				
				$objField = 'ID Pasien : '.$this->_getRegNumber() . ' | ';
				$objField .= 'Nama Pasien : '.$this->_getNama() . ' | ';
				$objField .= 'Tempat Lahir : '.$this->_getTempatLahir() . ' | ';
				$objField .= 'Tanggal Lahir : '.$this->_getTanggalLahir() . ' | ';
				$objField .= 'Usia : '.$this->_getUsia() . ' | ';
				$objField .= 'Jenis Kelamin : '.$this->_getJenisKelamin() . ' | ';
				$objField .= 'Alamat : '.$this->_getAlamat() . ' | ';
				$objField .= 'Agama : '.$this->_getAgama() . ' | ';
				$objField .= 'Status : '.$this->_getStatus() . ' | ';
				$objField .= 'No Antri : '.$this->_getNoAntrian() . ' | ';
				$objField .= 'ID Poli : '.$this->_getIdPoli() . ' | ';
				$objField .= 'ID Dokter : '.$this->_getIdDokter() . ' | ';
				$objField .= 'ID Hari : '.$this->_getIdHari() . ' | ';
				$objField .= 'Date Create : '. ' | ';
				$objField .= 'Create By : '. $this->_getUser();
				
				$oAudit->_setObjectField($objField);
				$oAudit->_setUser($this->_getUser());
				$oAudit->Add();
				$oConn = null;
				$this->oService = null;
				return json_encode($oAudit->_getMsgErr());
				$oAudit = null;
				
			}
		} 
		catch (Exception $ex) 
		{
			return json_encode("error in models.chcekup.saveregistre : " .$ex->getMessage());
		}
	}
	
	public function SaveCheckup()
	{
		include_once('../../db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		$bResult = true;
		try
		{
			//insert table registre
			$sql = "insert into datcheckup (idpasien, iddokter, idpoli, noantrian, flagbayar, datecreate, createby ) values(?, ?, ?, ?, ?, ?, ?)";
			//check
			$formatDate = date("YYYY-mm-dd");
			$sqlCheck = "select * from datcheckup where idpasien = '" . $this->_getRegNumber() . "' and flagbayar = 0 and left(datecreate, 10) = '" . $formatDate . "'";
			$executeCheck = $this->oService->prepare($sqlCheck);
			$executeCheck->execute();
			$resultCheck = $executeCheck->rowCount();
			if ($resultCheck != 0)
			{
				$bResult = false;
			}
			else
			{
				$param = array(
					$this->_getRegNumber(),
					$this->_getIdDokter(),
					$this->_getIdPoli(),
					$this->_getNoAntrian(),
					$this->_getFlag(),
					date("Y-m-d H:i:s"),
					$this->_getUser()
				);	
				$execute = $this->oService->prepare($sql);
				$execute->execute($param);
				$bResult = true;
			}
		} 
		catch (Exception $ex) 
		{
			$this->_setMsgErr($ex->getMessage());
			$bResult = false;
		}
		$oConn = null;
		//$this->oService = null;
		return $bResult;
	}
	
	public function DeleteById()
	{
		include_once('../../db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		try
		{
			$sql = 'delete from refpasien where idpasien = ?';
			
			//check data before delete
			//if pasien has been checkup for first time then cancel delete
			$sqlCheck = "select * from datcheckup where idpasien = ? and flagbayar = ?";
			$paramCheck = array(
				$this->_getRegNumber(),
				1
			);
			
			$executeCheck = $this->oService->prepare($sqlCheck);
			$executeCheck->execute($paramCheck);
			
			$resultCheck = $executeCheck->rowCount();
			
			if ($resultCheck != 0)
			{
				return json_encode("Can't delete ");
			}
			else
			{
				$param = array($this->_getRegNumber());
				$execute = $this->oService->prepare($sql);
				$execute->execute($param);
				
				//insert to audit trail
				include_once('../../global/audittrial.php');
				$oAudit = new AuditTrail($this->oService);
				$oAudit->_setTableName('Pasien');
				$oAudit->_setAction('Delete');
				
				$objField = 'ID Pasien : '.$this->_getIdDokter() . ' | ';
				$objField .= 'Date : '. date("Y-m-d H:i:s") . ' | ';
				$objField .= 'Delete By : '.$this->_getUser();
				
				$oAudit->_setObjectField($objField);
				$oAudit->_setUser($this->_getUser());
				$oAudit->Add();
				$oConn = null;
				$this->oService = null;
				return json_encode($oAudit->_getMsgErr());
				$oAudit = null;
			}
			
			
			return json_encode('Data successfully delete');
		}
		catch(Exception $ex)
		{
			$this->_setMsgErr($ex->getMessage());
			return json_encode('Error in models.dokter.deletebyid : ' . $ex->getMessage());
		}
	}
	
	//region payment
	function getDataPemabayaran($data,$limit,$adjacent){
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
		
		$sqlcount = "select p.idpasien, p.nama, p.alamat, left( p.datecreate, 10 ) as tanggalcheck  from refpasien p inner join datcheckup c on c.idpasien = p.idpasien where c.flagbayar = 1 ";
		if ($valuesearch == ""){
			$sqlcount = $sqlcount;
		}
		else{
			$sqlcount .= " and $searchby like '%$valuesearch%' ";
		}
		$executeCount = $this->oService->prepare($sqlcount);
		$executeCount->execute();
		
		$rowscount = $executeCount->rowCount();
		
		//$sql = "select * from refpasien";
		
		if ($valuesearch == ''){
			$sqlcount .= " order by p.idpasien asc limit $start,$limit";
		}else{
			$sqlcount .= " and $searchby like '%$valuesearch%' order by id asc limit $start,$limit";
		}
		
		$execData = $this->oService->prepare($sqlcount);
		$execData->execute();

		$str ='<table style="margin: auto; width: 100%; height: auto;" width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">ID Pasien</th><th scope="col">Name</th><th scope="col">Address</th><th scope="col">Tanggal Checkup</th></tr></thead><tbody>';
		
		if($execData->rowCount()>0)
		{
			$i = 0;
			while ($row = $execData->fetch(PDO::FETCH_ASSOC))
			{  
				$str.="<tr onclick=detail('". 'd'. $row['idpasien'] . $i ."') style='cursor:pointer'><td class='nama'>".$row['idpasien']."</td><td class='nama'>".$row['nama']."</td><td class='alamat'>".$row['alamat']."</td><td class='tanggal'> " . $row['tanggalcheck'] . "</td>";
				$str.='</tr>';
			  
			  	$str.="<tr style='display:none;' id='" .'d'.$row['idpasien'] . $i . "'><td colspan='4'>";
			  	$sqlDetail = "select * from datcheckupdetail where idpasien = '" . $row['idpasien'] . "' and left(datecreate, 10) = '" . $row['tanggalcheck'] . "'" ;
				$executeDetail = $this->oService->prepare($sqlDetail);
				$executeDetail->execute();
					
			  //table detail
			  	$str .= '<table class="table table-bordered"><thead><tr><th scope="col">Tindakan</th><th scope="col">Harga</th></tr></thead><tbody>';
			  	$totalHarga = 0;
			  	while($rowDetail = $executeDetail->fetch(PDO::FETCH_ASSOC))
				{	
					$str .= '<tr><td>'.$rowDetail['tindakan'].'</td><td>'.$rowDetail['harga'].'</td></tr>';
					$totalHarga = $totalHarga + $rowDetail['harga'];
				}
				$str .= '<tfoot><tr><th align="right">Total</th><th colspan="2" class="total" id="total"> ' . $totalHarga . '</th></tr></tfoot>';
				//end tag table detail
			  	$str .= '</tbody></table>';
			  	
			  	//end tr header
				$str .= '</td></tr>';
				$executeDetail = null;
				$executeCount = null;
			  	$i += 1;
			}

		}
		else
		{
			$str .= "<tr><td colspan='4'>No Data Available</td></tr>";
		}
	   
	   	$str .='</tbody></table>';
		echo $str; 
	   	
	   	pagination($limit,$adjacent,$rowscount,$page); 
	   	
		$sth = null;
	}
	
	public function SavePembayaran($objTindakan, $objHarga)
	{
		include_once('../../db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		$bResult = true;
		try
		{
			//insert detail tindakan
			$sql = "insert into datcheckupdetail (idpasien, tindakan, harga, datecreate, createby ) values(?, ?, ?, ?, ?)";
			$i = 0;
			foreach ($objTindakan as $Tindakan)
			{
				$this->_setTindakan($Tindakan);
				$this->_setHarga($objHarga[$i]);
				
				$param = array(
					$this->_getRegNumber(),
					$this->_getTindakan(),
					$this->_getHarga(),
					date("Y-m-d H:i:s"),
					$this->_getUser()
				);	
				
				$execute = $this->oService->prepare($sql);
				$execute->execute($param);
				
				$i += 1;
			}
			
			//update flag payment at table datcheckup
			$sqlPayment = "update datcheckup set flagbayar = 1 where idpasien = '" . $this->_getRegNumber() . "'";
			$execute = $this->oService->prepare($sqlPayment);
			$execute->execute();
				
			//insert to audit trail
			include_once('../../global/audittrial.php');
			$oAudit = new AuditTrail($this->oService);
			$oAudit->_setTableName('Chekcup Detail');
			$oAudit->_setAction('Delete');
			
			$objField = 'ID Pasien : '.$this->_getRegNumber() . ' | ';
			$objField .= 'Tindakan : '.$this->_getTindakan() . ' | ';
			$objField .= 'Harga : '.$this->_getHarga() . ' | ';
			$objField .= 'Date : '. date("Y-m-d H:i:s") . ' | ';
			$objField .= 'Delete By : '.$this->_getUser();
			
			$oAudit->_setObjectField($objField);
			$oAudit->_setUser($this->_getUser());
			$oAudit->Add();
			$oConn = null;
			$this->oService = null;
			return json_encode($oAudit->_getMsgErr());
			$oAudit = null;
		} 
		catch (Exception $ex) 
		{
			return json_encode('erro srj.models.checkup.savepembayaran : ' . $ex->getMessage());
		}
		$oConn = null;
		//$this->oService = null;
		return $bResult;
	}
}
?>
