<?php
session_start();
class user{
	private $oService;
	
	private $IDGroup, $UserName, $FullName, $Password, $IsActive, $LastLogon, $LastLogoff, $CreateBy, $MsgErr;
	
	public function _getIDGroup()
	{
		return $this->IDGroup;
	}
	public function _setIDGroup($iIdGroup)
	{
		$this->IDGroup = $iIdGroup;
	}
	
	public function _getUserName()
	{
		return $this->UserName;
	}
	public function _setUserName($sUserName)
	{
		$this->UserName = $sUserName;
	}
	
	public function _getFullName()
	{
		return $this->FullName;
	}
	public function _setFullName($sFullName)
	{
		$this->FullName = $sFullName;
	}
	
	public function _getPassword()
	{
		return $this->Password;
	}
	public function _setPassword($sPassword)
	{
		$this->Password = $sPassword;
	}
	
	public function _getIsActive()
	{
		return $this->IsActive;
	}
	public function _setIsActive($iIsActive)
	{
		$this->IsActive = $iIsActive;
	}
	
	public function _getLastLogon()
	{
		return $this->LastLogon;
	}
	public function _setLastLogon($dtLastLogon)
	{
		$this->LastLogon = $dtLastLogon;
	}
	
	public function _getLastLogoff()
	{
		return $this->LastLogoff;
	}
	public function _setLastLogoff($dtLastLogoff)
	{
		$this->LastLogoff = $dtLastLogoff;
	}
	
	public function _getCreateBy()
	{
		return $this->CreateBy;
	}
	public function _setCreateBy($sCreateBy)
	{
		$this->CreateBy = $sCreateBy;
	}
	
	public function _getMsgErr()
	{
		return $this->MsgErr;
	}
	public function _setMsgErr($sMsgErr)
	{
		$this->MsgErr = $sMsgErr;
	}
	
	
	public function getdata($pageindex, $limit, $adjacent, $link, $idgroup)
	{
		include_once('/db/dbconnection.php');
		$objconn = new dbconnection();
		include_once('/global/pagingpostback.php');
		
		$this->oService = $objconn->opendb();
		try
		{
			if ($pageindex == '')
			{
				$pageindex = 1;
			}
			else
			{
				$pageindex = $pageindex;
			}

			$page = $pageindex;
			if($page==1)
			{
			$start = 0;  
			}
			else
			{
			$start = ($page-1)*$limit;
			}
			$sqlcount = ''; 
			$sqlgetdata = '';
			if ($idgroup == '')
			{
				$sqlcount .= 'select * from refuser';
				$sqlgetdata = "select *, case when isactive = 0 then 'non active' else 'active' end as status from refuser order by iduser asc limit $start,$limit";
			}
			else
			{
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
			if($data->rowCount()>0)
			{

			while ($row = $data->fetch(PDO::FETCH_ASSOC)){
				$str.="<tr><td>".$row['username']."</td><td>".$row['fullname']."</td><td>".$row['idgroup']."</td>";
				$str.="<td>".$row['status']."</td></tr>";
			}

			}
			else
			{
				$str .= "<tr><td colspan='4' align='center'>No Data Available</td></tr>";
			}
			$str.='</tbody></table>';

			echo $str; 
			pagination($limit,$adjacent,$rowscount,$page, $link);  
			$sth = null;
			$objconn = NULL;
			$this->oService = null;
		} 
		catch (Exception $ex) 
		{
			echo 'srj.models.user.getdata : ' . $ex;
		}		
	}
	
	public function Login()
	{
		include_once('/db/dbconnection.php');
		$oConn = new dbconnection();
		$this->oService = $oConn->opendb();
		
		try
		{
			$sql = "select * from refuser where username = ? and password = ?";
			$execute = $this->oService->prepare($sql);
			$execute->execute(array($this->_getUserName(), $this->_getPassword()));
			$result = $execute->rowCount();
			$getrow = $execute->fetch(PDO::FETCH_ASSOC);
			
			//set value property
		  	$this->_setUserName($getrow['username']);
		  	$this->_setIsActive($getrow['isactive']);
		  	$this->_setLastLogon($getrow['lastlogon']);
		  	$this->_setLastLogoff($getrow['lastlogoff']);
		  	
		  	//if count result not equal 0 then check user active
			if ($result != 0)
			{
				if ($this->_getIsActive() == 1)
				{
					$_SESSION['user'] = $this->_getUserName();
					$_SESSION['lastlogon'] = $this->_getLastLogon();
					$_SESSION['lastlogoff'] = $this->_getLastLogoff();
					echo "<script>document.location= 'index.php';</script>";
					exit();
				}
				else
				{
					$this->_setMsgErr('User is nonactive');
					//echo "<script>document.location= 'index.php';</script>";
					//header('location: ../index.php');
				}
			}
			else
			{
				$this->_setMsgErr('login not correct!!!');
				//print '<script>alert("login not correct!!!"); document.location = "../index.php"; </script>';
				//echo "<script>document.location='../';alert('Login is not correct!!!');</script>";
				
				//header('location: ../index.php');
				
			}
		}
		catch(Exception $ex)
		{
			echo 'srj.models.login.login : ' . $ex->getMessage();
		}
	}
}
?>