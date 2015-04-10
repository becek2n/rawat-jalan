<?php
include('/db/dbconnection.php');
class menu{
	
	private $oService;
	
	public function __construct()	{		
		$obj = new dbconnection();
		$this->oService = $obj->opendb();
		//$this->dbh = new PDO("mysql:host=".$host.";dbname=".$db,$user,$pass);		
		
	}
	
	function getmenu($parent, $level){
			
		try{

			$execute = $this->oService->prepare("SELECT a.idmenu, a.mnname, a.mnlink, Deriv1.Count FROM refmenu a  LEFT OUTER JOIN (SELECT parenid, COUNT(*) AS Count FROM refmenu GROUP BY parenid) Deriv1 ON a.idmenu = Deriv1.parenid WHERE a.parenid=".$parent);
			$execute->execute();
			
			echo '<ul>';
			while ($row = $execute->fetch(PDO::FETCH_ASSOC)){
				if ($row['Count'] > 0) {
		            echo "<li><a href='" . $row['mnlink'] . "'>" . $row['mnname'] . "</a>";
		             $this->getmenu($row['idmenu'], $level + 1);
		            echo "</li>";
		        } elseif ($row['Count']==0) {
		            echo "<li><a href='" . $row['mnlink'] . "'>" . $row['mnname'] . "</a></li>";
		        }
			}
		} catch (Exception $ex) {
			echo('srj.models.menu.getmenu : '.$ex);
		}
		$oService = null;
		echo '</ul>';
	//getmenu(0, 1);
	}
	
	function gettreeviewcheckbox($parent, $groupid){
		//$oService = new dbconnection();
		//$obj = $oService->opendb();
		
		try{
			$sql ='';
			if ($groupid == ""){
				$sql .= "SELECT a.idmenu, a.mnname, a.mnlink, Deriv1.Count FROM refmenu a  LEFT OUTER JOIN (SELECT parenid, COUNT(*) AS Count FROM refmenu GROUP BY parenid) Deriv1 ON a.idmenu = Deriv1.parenid WHERE a.parenid=".$parent;
			}
			else{
				$sql .= "SELECT a.idmenu, a.mnname, a.mnlink, case when exists(select idmenu from refrole where idgroup = ".$groupid ." and idmenu = a.idmenu) then 1 else 0 end as ischeckbox, Deriv1.Count FROM refmenu a  LEFT OUTER JOIN (SELECT parenid, COUNT(*) AS Count FROM refmenu GROUP BY parenid) Deriv1 ON a.idmenu = Deriv1.parenid WHERE a.parenid=".$parent;
			}
			$execute = $this->oService->prepare($sql);
			$execute->execute();
			
			echo '<ul>';
			while ($row = $execute->fetch(PDO::FETCH_ASSOC)){
				if ($row['ischeckbox'] == 0){
					$ischeck = 'false';
				}
				else{
					$ischeck = 'true';
				}
				
				if ($row['Count'] > 0) {
		            echo '<li item-expanded="true" id="'.$row['idmenu'].'"';    
		            echo 'item-checked=' . $ischeck . '>'. $row['mnname'];
		            $this->gettreeviewcheckbox($row['idmenu'], $groupid);
		            echo '</li>';
		        } elseif ($row['Count']==0) {
		            echo '<li id="'.$row['idmenu'].'"';
		            echo 'item-checked=' . $ischeck . '>'. $row['mnname'].'</li>';
		        }
			}
		$oService = null;
		$obj = null;
		} catch (Exception $ex) {
			echo('srj.models.menu.gettreeviewcheckbox : '.$ex);
		}
		echo '</ul>';

	}

}

?>