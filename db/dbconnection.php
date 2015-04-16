<?php

class dbconnection{
	private $konek;
	private static $db;
	public function opendb(){
		try{
		
			$servername = 'localhost';
			$user = 'root';
			$pass = '';
			$db = 'rawat-jalan';
			//$this->konek = new PDO("mysql:host=".$servername.";dbname=".$db,$user,$pass);
			
			$dsn = 'mysql:host='.$servername.';dbname='.$db.';charset=UTF-8';
			self::$db = new PDO($dsn, $user, $pass);
			
			self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			//if ($this->konek == false){
			//	echo('Error occured when open connection ');
			//}	
		} catch (Exception $ex) {
			die('Connection error: ' . $ex	->getMessage());
		}
		
		return self::$db;
	}
}
?>