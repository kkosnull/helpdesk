<?php
class fetch_clients {

private $user;
private $status;
private $password;
private $user_id;
private $db;




public function setdb($db) {
		$this->db = $db;
		
	}
	
	
public function setUser_id($user_id) {
		$this->user_id = $user_id;
		
	}



public function setPassword($password) {
		$this->password = $password;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}


public function connect(){

$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					$this->status="Ok!";
}


}

public function getStatus() {

echo $this->status;



}	





public function getClients() {

$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 
 $sql_clients = "SELECT * FROM clients WHERE user_id=$this->user_id";
$result=mysql_query($sql_clients, $con);

while($row = mysql_fetch_array($result))
  {
  echo $row['name'] 
  echo "<br />";
  }

mysql_close($con);

//echo 	$sql_clients;
}	
}


}


?>
