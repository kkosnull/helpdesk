<?php
class users {

private $user;
private $dbpassword;
private $db;



private	  $username;
private	  $password;
private	  $email;
private	  $receive;
private	  $country;
private	  $accounttype;
private	  $phone;
private	  $mobile;
private	  $position;
private	  $comp_name;
private	  $manager;
private	  $comp_adress;
private	  $comp_phone;
private	  $comp_mobile;
private $passwordbackup;
private  $dateend;
private $login_success;	
	
public  function add_date($givendate,$day=0,$mth=0,$yr=0) {
      $cd = strtotime($givendate);
      $newdate = date('Y-m-d h:i:s', mktime(date('h',$cd),
    date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
    date('d',$cd)+$day, date('Y',$cd)+$yr));
	$this->dateend=$newdate;
      return $this->dateend;
             }
	  
public function set_passwordbackup($passwordbackup){
	$this->passwordbackup = $passwordbackup;
}
	  
public function set_username($username) {
		$this->username = $username;
		
	}
public function set_password($password) {
		$this->password = $password;
		
	}
	public function set_email($email) {
		$this->email = $email;
		
	}
	public function set_receive($receive) {
		$this->receive = $receive;
		
	}
	public function set_country($country) {
		$this->country = $country;
		
	}
	public function set_accounttype($accounttype) {
		
	$this->accounttype = $accounttype;
		
	}
	public function set_phone($phone) {
		$this->phone = $phone;
		
	}
	public function set_mobile($mobile) {
		$this->mobile = $mobile;
		
	}
	public function set_position($position) {
		$this->position = $position;
		
	}
	public function set_comp_name($comp_name) {
		$this->comp_name = $comp_name;
		
	}
	public function set_manager($manager) {
		$this->manager = $manager;
		
	}
	public function set_comp_adress($comp_adress) {
		$this->comp_adress = $comp_adress;
		
	}
	public function set_comp_phone($comp_phone) {
		$this->comp_phone = $comp_phone;
		
	}
	public function set_comp_mobile($comp_mobile) {
		$this->comp_mobile = $comp_mobile;
		
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
	
public function login(){
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->dbpassword);
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
					
					$sql="SELECT * FROM `auto`.`users` WHERE username='$this->username' and password='$this->password'";
					//echo $sql;
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $username=$row['username'];
							   }
					$rownum=mysql_num_rows($result);
					//echo $rownum;
					if ($rownum==1){
						if ($admin==1){
							$_SESSION['admin']=1;
							
						} else if ($admin==0){
							$_SESSION['admin']=0;
							
						}
						
						$_SESSION['username']=$username;
						
						  header( 'Location: http://www.autosupport.it/index.php' ) ;
						
					}else if ($rownum==0) {
						
						  header( 'Location: http://www.autosupport.it/start.php' ) ;
					}
					//return $this->login_success;
				//echo $this->login_success;
				  }
}

public function insert_user(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->dbpassword);
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
					
				
						
				$sql="INSERT INTO `auto`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, `position`, `comp_name`, `comp_manager`, `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`, `dateend`, `active`, `phone`, `mobile`)
VALUES 
('".$this->username."', '".$this->password."', '".$this->email."', $this->receivemail,'".$this->country."', $this->accounttype, '".$this->position."', '".$this->comp_name."',
'".$this->comp_manager."', '".$this->comp_adress."',  '".$this->comp_phone."', '".$this->comp_fax."', CURDATE(), '".$this->dateend."', 1, '".$this->phone."', '".$this->mobile."' )";

				//mysql_query($sql, $con);
				
				//echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				
				echo $sql;
				
				}

}



}


?>
