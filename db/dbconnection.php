<?php

class dbconnection{
	public $konek;
	
	public function opendb(){
		try{
			$servername = 'localhost';
			$user = 'root';
			$pass = '';
			$db = 'rawat-jalan';
			$this->konek = new PDO("mysql:host=".$servername.";dbname=".$db,$user,$pass);
			if ($this->konek == false){
				echo('Error occured when open connection ');
			}	
		} catch (Exception $ex) {
			echo($ex);
		}
		
		return $this->konek;
	}
}
?>