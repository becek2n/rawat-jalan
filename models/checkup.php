<?php
include('../db/dbconnection.php');
class checkup{
	
	private $oService;
	
	public function __construct(){
		$oData = new dbconnection();
		$this->oService = $oData->konek();
	}
	
	public function getnoantri(){
		try{
			$sql = 'select max(noantrian) + 1 as no from datcheckup';
			$exec = $sql->prepare($sql);
			$exec->execute();
			$result = $exec->fetch(PDO::FETCH_ASSOC);
			$nourut = $result['no'];
			
			return $nourut;
		} catch (Exception $ex) {
			echo 'srj.models.checkup.getnoantri : '.$ex;
		}
	} 
}
?>