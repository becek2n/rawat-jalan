<?php

class Checkup{
	
	private $oService;
	
	
	
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