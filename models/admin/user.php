<?php


class user{
	private $oService;
	
	private $idgroup, $username, $fullname, $password, $status, $createby;
	
	public function getid(){
		$this->idgroup;
	}
	public function setid($id){
		$this->idgroup = $id;
	}
	
	public function getuser(){
		$this->username;
	}
	public function setuser($user){
		$this->username = $user;
	}
	
	public function getfullname(){
		$this->fullname;
	}
	public function setfullname($name){
		$this->fullname = $name;
	}
	
	public function getpassword(){
		$this->password;
	}
	public function setpassword($pwd){
		$this->password = $pwd;
	}
	
	public function getstatus(){
		$this->status;
	}
	public function setstatus($sts){
		$this->status = $sts;
	}
	
	function getdata($pageindex, $limit, $adjacent, $link, $idgroup){
		//include('/db/dbconnection.php');
		include('/global/pagingpostback.php');
		
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		try{
			if ($pageindex == ''){
				$pageindex = 1;
			}
			else{
				$pageindex = $pageindex;
			}

			$page = $pageindex;
			if($page==1){
			$start = 0;  
			}
			else{
			$start = ($page-1)*$limit;
			}
			$sqlcount = ''; 
			$sqlgetdata = '';
			if ($idgroup == ''){
				$sqlcount .= 'select * from refuser';
				$sqlgetdata = "select *, case when isactive = 0 then 'non active' else 'active' end as status from refuser order by iduser asc limit $start,$limit";
			}
			else{
				$sqlcount .= 'select * from refuser where idgroup = '.$idgroup;
				$sqlgetdata = "select *, case when isactive = 0 then 'non active' else 'active' end as status from refuser where idgroup = $idgroup order by iduser asc limit $start,$limit";
			}
			$sth = $this->oService->prepare($sqlcount);
			$sth->execute();
			//$sql = "select * from ajaxpage order by id asc";
			$rowscount = $sth->rowCount();
			
			$data = $this->oService->prepare($sqlgetdata);
			$data->execute();
			
			$str ='<table width="600" cellpadding="5" class="table table-hover table-bordered"><thead><tr><th scope="col">User Name</th><th scope="col">Full Name</th><th scope="col">Group</th><th scope="col">Status</th></tr></thead><tbody>';
			if($data->rowCount()>0){

			while ($row = $data->fetch(PDO::FETCH_ASSOC)){
				$str.="<tr><td>".$row['username']."</td><td>".$row['fullname']."</td><td>".$row['idgroup']."</td>";
				$str.="<td>".$row['status']."</td></tr>";
			}

			}else{
			$str .= "<tr><td colspan='4' align='center'>No Data Available</td></tr>";
			}
			$str.='</tbody></table>';

			echo $str; 
			pagination($limit,$adjacent,$rowscount,$page, $link);  
			$sth = null;
			$this->oService = null;
		} catch (Exception $ex) {
			echo 'srj.models.user.getdata : ' . $ex;
		}		
	}
	
	function login(){
		
	}
}
?>