<?php
include('../../db/dbconnection.php');

class Poli {
	private $oService ;
	
	function __construct() {
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
	}
	
	function getdata($data, $limit, $adjecent){
		try{
			$page = $data['page'];
			if ($page == 1){
				$start = 0;
			}else{
				$start = ($page - 1) * $limit;
			}
			
			$sqlcount = ;
		}catch(Exception $ex){
			echo 'srj.models.poli.getdata : ' . $ex;
		}
		
	}
}
?>