<?php
class client_insert {

private $user;
private $password;
private $db;

private $brand;
private $model;
private $engine_code;
private	$system;
private	$manufacturer;



public function setbrand($brand) {
		$this->brand = $brand;
		
	}
	
public function setmodel($model) {
		$this->model = $model;
		
	}
	

public function setengine_code($engine_code) {
		$this->engine_code = $engine_code;
		
	}
	
public function setmanufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
		
	}




// db functions

	
public function setdb($db) {
		$this->db = $db;
		
	}
	
	

public function setPassword($password) {
		$this->password = $password;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}
	





	

public function insert_client(){


$con = mysql_connect("localhost", $this->user, $this->password);
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
					
			
					
							   
			$sql="insert into  `auto`.`brands` (`brand`)
						values 
					('".$this->brand."')";
					
			   mysql_query($sql, $con);
			   
			  $sql="SELECT MAX(`id`) as max_id FROM  `emron_online`.`users` "; 
			   
			   $result=mysql_query($sql, $con);
			   while($row = mysql_fetch_array($result)){
				   $max_id=$row['max_id'];
			   }
			   
			   
			   $sql="insert into  `emron_online`.`clients` (`supervisor`, `user_id`, `user_owner_id`, `username`,`manager` ,`password`, `client_code`,`name`,`legal_form`,`activity`,`taxid`,
				`doy`,`address`,`county`,`email`,`phone`,`mobile`,`fax`,`show`,`datecreate`,`position`,`client_url`,`tk`,`post`)
						values 
					('".$this->Supervisor."', '".$max_id."', '".$this->user_id."', '".$this->username."', '".$this->manager."', '".$this->client_password."','".$this->client_code."', '".$this->name."','".$this->legal_forms."','".$this->activity."', '".$this->taxid."',
					'".$this->doy."','".$this->address."', '".$this->county."', '".$this->email."','".$this->phone."', '".$this->mobile."','".$this->fax."','1', 'CURDATE()', '".$this->position."','".$this->client_url."', '".$this->tk."','".$this->post."')";

				echo $sql;
				echo "<br>";
				//if ($this->client_code<>0){	
			    mysql_query($sql, $con);
			   //  }
			   
			   
				header( "Location: http://www.emron.gr/web/online/start.php" ) ;	
				
					}


}

public function setClient_code(){

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("emron_online", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql = "SELECT * from `emron_online`.`clients` ";
					$result =mysql_query($sql, $con);
					
					$num_rows = mysql_num_rows($result);
					
					$c_code=$num_rows+1;
					$this->client_code=$c_code;
					}

}

public function emptyClient_code(){
$this->client_code=0;
}
	
	
public function connect(){

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					$this->status="Ok!";
}


}


//accessors 

public function getClient_url() {
		echo $this->client_url;
		
	}
	

public function getClient_post() {
		echo $this->post;
		
	}
	
public function getClient_tk() {
		echo $this->tk;
		
	}
	
public function getClient_position() {
		echo $this->position;
		
	}
	
public function getArea() {
	echo	$this->area;
		
	}	
public function getUsername() {
	echo	$this->username;
		
	}
	
public function getSupervisor() {
	echo	$this->Supervisor;
		
	}
	
public function getAddress() {
	echo	$this->address;
		
	}
	
public function getName() {
	echo	$this->name;
		
	}	
	
public function getlegal_forms() {
	echo	$this->legal_forms;
		
	}	
		
public function getActivity() {
	echo	$this->activity;
		
	}		
	
public function getEmail() {
	echo	$this->email;
		
	}	
	
public function getTaxid() {
	echo	$this->taxid;
		
	}	
	
public function getPhone() {
	echo	$this->phone;
		
	}		
	
public function getMobile() {
	echo	$this->mobile;
		
	}	
	
public function getFax() {
	echo	$this->fax;
		
	}	
	
// get user_id and client_id


public function getUser_id() {
	echo	$this->user_id;
		
	}	


public function getClient_id() {
	echo	$this->client_id;
		
	}	





}


?>
