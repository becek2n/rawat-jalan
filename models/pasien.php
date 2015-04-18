<?php

class Pasien {
	
	
	private $dbh;
	
	public function __construct()	{		
		
		
		
	}
	
	function showData($data,$limit,$adjacent){
		include('../db/dbconnection.php');
		include('../global/paging.php');
		$obj = new dbconnection();
		$this->dbh = $obj->opendb();
		
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
		$sth = $this->dbh->prepare($sqlcount);
		$sth->execute();
		//$sql = "select * from ajaxpage order by id asc";
		$rowscount = $sth->rowCount();
		
		$sql = "select * from refpasien";
		
		if ($valuesearch == ''){
			$sql .= " order by id asc limit $start,$limit";
		}else{
			$sql .= " where $searchby like '%$valuesearch%' order by id asc limit $start,$limit";
		}
		
		$data = $this->dbh->prepare($sql);
		$data->execute();

		$str ='<table style="margin: auto; width: 100%; height: auto;" width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">Name</th><th scope="col">Gender</th><th scope="col">Address</th><th scope="col">Religion</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead><tbody>';
		if($data->rowCount()>0){
			
			if ($searchby == 'nama'){
				$nama = $valuesearch;
			}
			else{
				$nama='';
			}
		while ($row = $data->fetch(PDO::FETCH_ASSOC)){
		  
		  $str.="<tr><td class='nama'>".$row['nama']."</td><td class='jeniskelamin'>".$row['jeniskelamin']."</td><td class='alamat'>".$row['alamat']."</td>";
		  $str.="<td class='agama'>".$row['agama']."</td><td>".$row['status']."</td>";
		  $str.='<td><a href="javascript:void(0);" user_id="'.$row['id'].'" class="delete_confirm btn btn-danger"><i class="icon-remove icon-white"></i></a></td>';
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
	
	public function bindDroppoli(){
		require_once('/db/dbconnection.php');
		
		$objcon = new dbconnection();
		$this->dbh = $objcon->opendb();
		try{
			
		  	$sqlpoli = "select * from refpoli order by idpoli asc";  
		  	$execpoli = $this->dbh->prepare($sqlpoli);
		  	$execpoli->execute();
		  	$html = '<select name="m_oDdlPoli" id="m_oDdlPoli">';
		  	while($row = $execpoli->fetch(PDO::FETCH_ASSOC)){
				$html .= '<option value="'.$row['idpoli'].'">'.$row['namapoli'];	
			}
			$html .= '</select>';
			$objcon  = null;
			$this->dbh = null;
			echo $html;
		} catch (Exception $ex) {
			echo 'srj.models.pasien.bindpoli : '.$ex;
		}
		
	}
	
	public function bindpoli(){
		include('../db/dbconnection.php');
		include('../global/paging.php');
		$obj = new dbconnection();
		$this->dbh = $obj->opendb();
		
		try{
		  	$sqlpoli = "select * from refpoli order by idpoli asc";  
		  	$execpoli = $this->dbh->prepare($sqlpoli);
		  	$execpoli->execute();
		  	$html = '<select name="m_oDdlPoli">';
		  	while($row = $execpoli->fetch(PDO::FETCH_ASSOC)){
				$html .= '<option value="'.$row['idpoli'].'">'.$row['namapoli'];	
			}
			$html .= '</select>';
			
			//get maximal id from pasien
			$sqlregistre = "select max(id) + 1 as hasil from refpasien";
			$execregistre = $this->dbh->prepare($sqlregistre);
		  	$execregistre->execute();
		  	$resultregistre = $execregistre->fetch(PDO::FETCH_ASSOC);
		  	$idregistre = $resultregistre['hasil'];
		  	
			//get maximal id from checkup
			$sqlantrian = "select max(idcheck) + 1 hasil from datcheckup";
			$execantrian = $this->dbh->prepare($sqlantrian);
		  	$execantrian->execute();
		  	$resultantrian = $execantrian->fetch(PDO::FETCH_ASSOC);		  	
		  	$idantrian = $resultantrian['hasil'];
		  	if($idantrian == NULL){
				$idantrian = 1;
			}
		  	
		  	$data[] = array(
		  		'poli'=> $html,
		  		'register'=> $idregistre,
		  		'antrian'=> $idantrian
		  	);
		  	
			echo json_encode($data);
		} catch (Exception $ex) {
			echo 'srj.models.pasien.bindpoli : '.$ex;
		}
		$this->dbh = null;
	}
	public function getdata(){
		include('../db/dbconnection.php');
		include('../global/paging.php');
		$obj = new dbconnection();
		$this->dbh = $obj->opendb();
		
		try{
			
			$sth = $this->dbh->prepare("SELECT * FROM refpasien");
			$sth->execute();
			
			return json_encode($sth->fetchAll());
		} catch (Exception $ex) {
			echo('srj.model.user.getpasien : '.$ex);
		}
		$this->dbh = null;
	}
	public function getdataajax($pageindex, $pagesize){
		try{
		include('../db/dbconnection.php');
		include('../global/paging.php');
		$obj = new dbconnection();
		$this->dbh = $obj->opendb();	
			
			$sth = $this->dbh->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM refpasien LIMIT '.$pageindex.','.$pagesize);
			$sth->execute();
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
				$pasien[] = array(
					'ID'=>$row['id'],
					'Nama'=>$row['nama'],
					'JenisKelamin'=>$row['jeniskelamin'],
					'Alamat'=>$row['alamat'],
					'Agama'=>$row['agama'],
					'Status'=>$row['status']
				);	
			}
			$sqlrowcount = $this->dbh->prepare('SELECT FOUND_ROWS() AS rowcount');
			$sqlrowcount->execute();
			$rowcount = $sqlrowcount->fetch(PDO::FETCH_ASSOC);
			$totalrow = $rowcount['rowcount'];
			
			$data[] = array(
				'rowcount'=>$totalrow,
				'row'=>$pasien
			);
			//$menu[] = $menu->fetchAll();
			return json_encode($data);
		} catch (Exception $ex) {
			echo('srj.model.user.getpasien : '.$ex);
		}
		$this->dbh = null;
	}
	
	public function getdatapager($pageindex, $pagesize){
		include('../db/dbconnection.php');
		include('../global/paging.php');
		$obj = new dbconnection();
		$this->dbh = $obj->opendb();
		
		try{
			$sth = $this->dbh->prepare("SELECT SQL_CALC_FOUND_ROWS *, count(*) as rowcount FROM refpasien LIMIT ".$pageindex.",".$pagesize);
			$sth->execute();
			$sqlrowcount = $this->dbh->prepare('SELECT FOUND_ROWS() AS rowcount');
			$sqlrowcount->execute();
			$rowcount = $sqlrowcount->fetch(PDO::FETCH_ASSOC);
			$totalrow = $rowcount['rowcount'];
			while ($row = $sth->fetch(PDO::FETCH_ASSOC)){
				$pasien[] = array(
					'Name' => $row['name'],
					'JenisKelamin' => $row['jeniskelamin'],
					'Alamat' => $row['alamat'],
					'Agama' => $row['agama'],
					'Status' => $row['status']
				);
			}
			$data[] = array(
				'TotalRow' => $totalrow,
					'Rows' => $pasien
			);
			return json_encode($data);
			
		} catch (Exception $ex) {
			echo('srj.model.user.getpasienpager : '.$ex);
		}
		$this->dbh = null;
	}

	public function add($user){		
		$sth = $this->dbh->prepare("INSERT INTO users(name, email, mobile, address) VALUES (?, ?, ?, ?)");
		$sth->execute(array($user->name, $user->email, $user->mobile, $user->address));		
		return json_encode($this->dbh->lastInsertId());
	}
	
	public function delete($user){				
		$sth = $this->dbh->prepare("DELETE FROM users WHERE id=?");
		$sth->execute(array($user->id));
		return json_encode(1);
	}
	
	public function updateValue($user){		
		$sth = $this->dbh->prepare("UPDATE users SET ". $user->field ."=? WHERE id=?");
		$sth->execute(array($user->newvalue, $user->id));				
		return json_encode(1);	
	}
	
	
}
?>
