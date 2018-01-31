<?php
class version {
private $user;
private $dbpassword;
private $db;

private $transactions_version;
private $users_version;



public function setdb($db) {
		$this->db = $db;
		
	}
	
	

public function setPassword($dbpassword) {
		$this->dbpassword = $dbpassword;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}

	public function get_trans_ver() {
		return $this->transactions_version;
		
	}

	public function get_users_ver() {
		return $this->users_version;
		
	}

	
	
public function set_transactions_version(){
	
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT *FROM `helpdesk`.`versioning`";
							
					$result=mysql_query($sql, $con);	
				
						
				while ($row = mysql_fetch_array($result)) {
				
					$transactions_version=$row["transactions"];
					$users_version=$row["users"];
				}
				$this->transactions_version=$transactions_version;
				$this->users_version=$users_version;
				}

}


// end of class
}


?>