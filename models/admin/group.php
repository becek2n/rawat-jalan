<?php

class group{
	private $oService;
	
	public function __construct()	{		
		//$obj = new dbconnection();
		//$this->oService = $obj->opendb();
		//$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
	}
	
	function getdata($id){
		
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		try{
			if ($id == 0){
				$sql = 'select * from refgroup';	
			}
			else{
				$sql = "select * from refgroup where idgroup =$id";
			}
			
			$exec = $this->oService->prepare($sql);
			$exec->execute();
			$this->oService = null;
			$table = '';
			while($row = $exec->fetch(PDO::FETCH_ASSOC)){
				$table .= "<tr>";
				$table .= '<td>'.$row['idgroup'].'</td><td><a href="index.php?page=menu&'. base64_encode('ref') . '='. base64_encode($row['idgroup']).'&'. base64_encode('groupname') . '=' . base64_encode($row['namagroup']).'">'.$row['namagroup'].'</a></td>';
				$table .= '</tr>';
			}
			
			$this->oService = null;
			return $table;
		} catch (Exception $ex) {
			echo 'srj.models.user.getdata : ' .$ex;
		}
	}
	
	function save($data){
		//include('../db/dbconnection.php');
		
		try{
			
		} catch (Exception $ex) {
			echo 'srj.models.group.save : ' . $ex;	
		}
	}
}
?>