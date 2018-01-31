<?php
class users {

private $user;
private $dbpassword;
private $db;
private	  $username;
private	  $password;
private	  $level;


public function set_level($level) {
		$this->level = $level;
		
	}
	  
public function set_username($username) {
		$this->username = $username;
		
	}
public function set_password($password) {
		$this->password = $password;
		
	}


public function setdb($db) {
		$this->db = $db;
		
	}
	
	

public function setPassword($dbpassword) {
		$this->dbpassword = $dbpassword;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}

	
	public function getUsername() {
		return $this->username;
		
	}
	public function getLevel() {
		return $this->level;
		
	}

	
	
	

public function logoff(){
$con = mysql_connect("db38.grserver.gr", $this->user, $this->dbpassword);
if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=0 WHERE `id`=$this->user_id ";
					mysql_query($sql_logged, $con);
					
					
					}
}



public function login(){



	$con = mysql_connect("db38.grserver.gr", $this->user, $this->dbpassword);
//$con = mysql_connect("localhost", $this->user, $this->dbpassword);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
					
						$sql="SELECT * FROM `library_users`.`users` WHERE username='".$this->username."' 
						and `password`='".$this->password."'  ";
					//echo $sql;
						$result=mysql_query($sql);
						$rowsfetched=mysql_num_rows($result);
						
						while($row = mysql_fetch_array($result))
	   
							   {
							  
							   $username=$row['username'];
							   $level=$row['level'];
							   $this->level=$level;
							   $this->username=$username;
							   }
							  

}

}

}
?>
