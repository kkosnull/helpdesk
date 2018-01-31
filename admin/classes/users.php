<?php
class users {

private $user;
private $dbpassword;
private $db;



private	  $username;
private   $username_hidden;
private	  $password;
private	  $email;
private	  $receive;
private	  $country;
private	  $accounttype;
private	  $phone;
private	  $fax;
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
private $admin_id;
private $user_id;
private $chat;
private $membership;
private $administrator;

// trial users variables

private $users_no;
private $users_duration;


// trial users variables


public function set_administrator($administrator){
	$this->administrator = $administrator;
}


// trial users mutators
public function set_membership($membership){
	$this->membership = $membership;
}

public function set_users_no($users_no){
	$this->users_no = $users_no;
}

public function set_users_duration($users_duration){
	$this->users_duration = $users_duration;
}
// trial users mutators


public function set_chat($chat){
	$this->chat = $chat;
}

public function set_admin_id($admin_id){
	$this->admin_id = $admin_id;
}
	
public function set_user_id($user_id){
	$this->user_id = $user_id;
}

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
	
	public function set_username_hidden($username_hidden) {
		$this->username_hidden = $username_hidden;
		
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
		public function set_fax($fax) {
		$this->fax = $fax;
		
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
					$this->password=md5($this->password);
					$sql="SELECT * FROM `helpdesk`.`users` WHERE username='$this->username' and password='".$this->password."' AND `active`=1";
					//echo $sql;
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $chat=$row['chat'];
							   }
					$rownum=mysql_num_rows($result);
					//echo $rownum;
					if ($rownum==1){
						
						if ($admin==1){
							$_SESSION['admin']=1;
							
						} else if ($admin==0){
							$_SESSION['admin']=0;
						
						
						}
						if ($chat==1){
							$_SESSION['chat']=1;
							
						} else if ($chat==0){
							$_SESSION['chat']=0;
						
						
						}
						
						if ($account_type==1){
								//$date1 = $date_create;
								//$date1 = new DateTime("2013-03-24");
								//$date2 = date("y-m-d"); 
								// $date2 =new DateTime();
								//$interval = $date1->diff($date2);
								//$_SESSION['interval']=$interval;
								//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
								//if ($interval->d<2){
									$_SESSION['username']=$username;
									
								//}
								
							}
							else if ($account_type==0){
								$_SESSION['username']=$username;
							}
						  // header( 'Location: http://www.autosupport.it/index.php' ) ;
						header( 'Location: http://aniphelpdesk.com/' ) ;
					}else if ($rownum==0) {
						
						 // header( 'Location: http://www.autosupport.it/start.php' ) ;
						  header( 'Location: http://aniphelpdesk.com/' ) ;
					}
					//return $this->login_success;
				//echo $this->login_success;
				  }
}


public function admin_login(){
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
					$this->password=md5($this->password);
					$sql="SELECT * FROM `helpdesk`.`users` WHERE username='$this->username' and password='".$this->password."' AND `active`=1";
					//echo $sql;
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   }
					$rownum=mysql_num_rows($result);
					//echo $rownum;
					if ($rownum==1){
						
						if ($admin==1){
							$_SESSION['admin']=1;
							
						} else if ($admin==0){
							$_SESSION['admin']=0;
						
						
						}
						
						
						if ($account_type==1){
								//$date1 = $date_create;
								//$date1 = new DateTime("2013-03-24");
								//$date2 = date("y-m-d"); 
								// $date2 =new DateTime();
								//$interval = $date1->diff($date2);
								//$_SESSION['interval']=$interval;
								//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 
								//if ($interval->d<2){
									$_SESSION['username']=$username;
									
								//}
								
							}
							else if ($account_type==0){
								$_SESSION['username']=$username;
							}
						  // header( 'Location: http://www.autosupport.it/admin.php' ) ;
						header( 'Location: http://zeromod.eu/auto_new/admin.php' ) ;
					}else if ($rownum==0) {
						
						 // header( 'Location: http://www.autosupport.it/admin.php' ) ;
						  header( 'Location: http://zeromod.eu/auto_new/admin.php' ) ;
					}
					//return $this->login_success;
				//echo $this->login_success;
				  }
}

public function generate_standard_users(){

	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
				  $counter=0;
				  $message = "";
				  echo "<table>";
				  for ($i=1; $i<=$this->users_no; $i++){
				  $counter++;
				    $date = new DateTime();
					$date->modify('+'.$this->users_duration.' day');
					
					$dateend=$date->format('Y-m-d');
	
	
					$rownum=1;
					//$password=substr(str_shuffle(md5(time())),0, 10);
					$password=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					$password_md5=md5($password);
					
					// loop that checks username singularity
					while ($rownum!=0){
					
					//$username=substr(str_shuffle(md5(time())),0, 10);
					$username=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					$cookie=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					
					$check="(SELECT `username` FROM `helpdesk`.`users` WHERE `username`='".$username."' AND `email`='".$this->email."') UNION 
					(SELECT `username`  FROM `helpdesk`.`trial_users` WHERE `username`='".$username."' AND `email`='".$this->email."')";
				//echo $check;
					$result=mysql_query($check);		   
					$rownum=mysql_num_rows($result);
					
					}
					$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, 
				`position`, `comp_name`,  `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`,  `dateend`, `active`, `phone`, `mobile`, `chat`, `cookie`)
VALUES 
('".$username."', '".$password_md5."', ' ', 1,'greece', 'subscriber' , 'subscriber', 'subscriber',
'trial',  0, 0, CURDATE(), '".$dateend."',  1, 0, 0, 1, '".$cookie."')";
				
				mysql_query($sql, $con);

				  // end loop that checks username singularity
				  //echo $sql; echo "<br>";
				  echo "<tr><td>".$username."</td><td>".$password."</td><tr>";
				  
				  
				//  echo "<font style='font-size:1.5em;'>".$counter.")</font>username : ".$username." password : ".$password."<hr>";
				  $message ="username : ".$username." password : ".$password."\n".$message ;
				  }
				  echo "</table>";
						  $from = "support@autosupport.gr"; // sender
						  $subject = "Δημιουργία ".$counter." χρηστών";
						  
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						  $message = wordwrap($message, 70);
						  // send mail
						  mail("kkosnull@gmail.com",$subject,$message,"From: $from\n");
				  
				  
				  }


}

public function generate_trial_users(){

	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
				  $counter=0;
				  $message = "";
				  echo "<table>";
				  for ($i=1; $i<=$this->users_no; $i++){
				  $counter++;
				    $date = new DateTime();
					$date->modify('+'.$this->users_duration.' day');
					
					$dateend=$date->format('Y-m-d');
	
	
					$rownum=1;
					//$password=substr(str_shuffle(md5(time())),0, 10);
					$password=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					$password_md5=md5($password);
					
					// loop that checks username singularity
					while ($rownum!=0){
					
					//$username=substr(str_shuffle(md5(time())),0, 10);
					$sername=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					
					
					$check="(SELECT `username` FROM `helpdesk`.`users` WHERE `username`='".$username."' AND `email`='".$this->email."') UNION 
					(SELECT `username`  FROM `helpdesk`.`trial_users` WHERE `username`='".$username."' AND `email`='".$this->email."')";
				//echo $check;
					$result=mysql_query($check);		   
					$rownum=mysql_num_rows($result);
					
					}
					$sql="INSERT INTO `helpdesk`.`trial_users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, 
				`position`, `comp_name`,  `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`,  `dateend`, `active`, `phone`, `mobile`, `chat`)
VALUES 
('".$username."', '".$password_md5."', ' ', 1,'greece', 'trial' , 'trial', 'trial',
'trial',  0, 0, CURDATE(), '".$dateend."',  0, 0, 0, 1)";
				
				mysql_query($sql, $con);

				  // end loop that checks username singularity
				  //echo $sql; echo "<br>";
				  echo "<tr><td>".$username."</td><td>".$password."</td><tr>";
				  
				  
				//  echo "<font style='font-size:1.5em;'>".$counter.")</font>username : ".$username." password : ".$password."<hr>";
				  $message ="username : ".$username." password : ".$password."\n".$message ;
				  }
				  echo "</table>";
						  $from = "support@autosupport.gr"; // sender
						  $subject = "Δημιουργία ".$counter."trial χρηστών";
						  
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						  $message = wordwrap($message, 70);
						  // send mail
						  mail("kkosnull@gmail.com",$subject,$message,"From: $from\n");
				  
				  
				  }


}


public function insert_user(){
	
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
					$this->password=md5($this->password);
				
						if ($this->email=="EMAIL"){
						$this->email="";
						}
						if ($this->phone=="ΤΗΛΕΦΩΝΟ"){
						$this->phone=0000000000;
						}
						if ($this->fax=="FAX"){
						$this->fax=0000000000;
						}
						if ($this->mobile=="ΚΙΝΗΤΟ"){
						$this->mobile=0000000000;
						}
						if ($this->comp_adress=="ΔΙΕΥΘΥΝΣΗ"){
						$this->comp_adress="";
						}
						$date = new DateTime();
						$date->modify('+'.$this->membership.' day');
						
						$dateend=$date->format('Y-m-d');
				$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`,
				`accounttype`, `position`, `comp_name`, `comp_manager`, `comp_adress`, `comp_phone`, 
				`comp_fax`, `datecreate`, `dateend`, `active`, `phone`, `mobile`, `chat`, `admin`)
VALUES 
('".$this->username."', '".$this->password."', '".$this->email."', '".$this->email."','Greece', 
1, '', '".$this->comp_name."',
'', '".$this->comp_adress."',  '".$this->phone."', 
'".$this->fax."', CURDATE(), '".$dateend."', 1, '".$this->phone."', '".$this->mobile."', ".$this->chat.", 0 )";

				mysql_query($sql, $con);
				
				echo "<h2 style='color:#fff'>Επιτυχης καταχωρηση.</h2>";
				
				echo $sql;
				$myFile = "logs/sql_queries.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					$stringData = "\n On ".date('l jS \of F Y h:i:s A')."---".$this->administrator." executed >>".$sql."\n -------------------------------------------------------------------------------";
					fwrite($fh, $stringData);
					
					fclose($fh);
				}

}


public function insert_admin(){
	
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
					$this->password=md5($this->password);
				
						
				$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`,
				`position`, `comp_name`, `comp_manager`, `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`, 
				`dateend`, `active`, `phone`, `mobile`, `chat`, `islogged`, `admin`)
VALUES 
('".$this->username."', '".$this->password."', '".$this->email."', '' ,'Greece', 
1, '...', '".$this->comp_name."',
'...', 'Λάμπρου Κατσώνη 63',  2109422891, 
000000, CURDATE(), '2024-11-30', 1, 2109422891, 00000, 1, 0, 1 )";

				//mysql_query($sql, $con);
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Επιτυχης καταχωρηση.</h2>";
				
				//echo $sql;
				
				}

}



public function disable_admin(){
	
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
					
				
						
				$sql="UPDATE `helpdesk`.`users` SET `active`=0 WHERE `id`=".$this->admin_id."";

				
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Ο χρηστης έχει απενεργοποιηθει.</h2>";
				
				//echo $sql;
				
				}

}
public function enable_admin(){
	
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
					
				
						
				$sql="UPDATE `helpdesk`.`users` SET `active`=1 WHERE `id`=".$this->admin_id."";

				
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Ο χρηστης έχει ενεργοποιηθει.</h2>";
				
				//echo $sql;
				
				}

}


public function disable_user(){
	
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
					
				
						
				$sql="UPDATE `helpdesk`.`users` SET `active`=0 WHERE `id`=".$this->user_id."";

				
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Ο χρηστης έχει απενεργοποιηθει.</h2>";
				
				//echo $sql;
				
				}

}
public function enable_user(){
	
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
					
				
						
				$sql="UPDATE `helpdesk`.`users` SET `active`=1 WHERE `id`=".$this->user_id."";

				
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Ο χρηστης έχει ενεργοποιηθει.</h2>";
				
				//echo $sql;
				
				}

}



public function unlock_user(){
	
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
					
				
						
				$sql="UPDATE `helpdesk`.`users` SET `islogged`=0 WHERE `id`=".$this->user_id."";

				
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Ο χρηστης έχει απομπλοκαριστεί.</h2>";
				
				//echo $sql;
				
				}

}

public function unlock_ips(){
	
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
					
				
						
				$sql="SELECT * FROM  `helpdesk`.`login_ips`  WHERE `user_id`=".$this->user_id." LIMIT 3";
//echo $sql;
				
				$result = mysql_query($sql, $con);
				
				while ($row = mysql_fetch_array($result)) {
				
				$sql="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$row["id"]."";
				echo $sql."<br>";
				mysql_query($sql, $con);
				}
				
				//echo $sql;
				echo "<h2>Ο χρήστης έχει ξεκλειδωθεί.</h2>";
				}

}

public function update_admin(){
	
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
					
				
				if ($this->password!=" "){
				//echo "value";
				$this->password=md5($this->password);
				
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username."', 
				`password`='".$this->password.", 
				`email`='".$this->email."', 
				`comp_name`='".$this->comp_name."'
				WHERE `id`=".$this->admin_id."";
				}
				if ($this->password==" "){	
				//echo " no value";
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username."', 
				`email`='".$this->email."', 
				`comp_name`='".$this->comp_name."'
				WHERE `id`=".$this->admin_id."";
				}
				mysql_query($sql, $con);
				
				$sql="SELECT `username` from `helpdesk`.`users` where `username`='".$this->username."' ";
				$result=mysql_query($sql, $con);
				$num_rows = mysql_num_rows($result);
				
				if ($num_rows>1) {
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username_hidden."'
				WHERE `id`=".$this->admin_id."";
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Το όνομα χρήστη υπάρχει.</h2>";
				}
				else {
				echo "<h2 style='color:#fff'>Οι αλλαγες πραγματοποιηθηκαν<br>";
				echo "</h2><b>";
				 echo $this->username;
				echo ", ";
				echo $this->email;
				echo ", ";
				echo $this->comp_name;
				echo "</b>";
				
				}
				
				}

}



public function update_user(){
	
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
					
				
				if ($this->password!=" "){
				//echo "value";
				$this->password=md5($this->password);
				
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username."', 
				`password`='".$this->password.", 
				`email`='".$this->email."', 
				`comp_name`='".$this->comp_name."',
				`comp_phone`='".$this->comp_phone."',
				`comp_fax`='".$this->fax."',
				`mobile`='".$this->mobile."',
				`comp_adress`='".$this->comp_adress."'
				WHERE `id`=".$this->user_id."";
				
				}
				if ($this->password==" "){	
				//echo " no value";
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username."', 
				`email`='".$this->email."', 
				`comp_name`='".$this->comp_name."',
				`comp_phone`='".$this->comp_phone."',
				`comp_fax`='".$this->fax."',
				`mobile`='".$this->mobile."',
				`comp_adress`='".$this->comp_adress."'
				WHERE `id`=".$this->user_id."";
				}
				mysql_query($sql, $con);
				//echo $sql;
				$sql="SELECT `username` from `helpdesk`.`users` where `username`='".$this->username."' ";
				$result=mysql_query($sql, $con);
				$num_rows = mysql_num_rows($result);
				
				if ($num_rows>1) {
				$sql="UPDATE `helpdesk`.`users` SET 
				`username`='".$this->username_hidden."'
				WHERE `id`=".$this->user_id."";
				//mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>Το όνομα χρήστη υπάρχει.</h2>";
				}
				else {
				
				echo "<h2 style='color:#fff'>Οι αλλαγες πραγματοποιηθηκαν<br>";
				echo "</h2><b>";
				/*
				 echo $this->username;
				echo ", ";
				echo $this->email;
				echo ", ";
				echo $this->comp_name;
				*/
				echo "</b>";
				
				}
				
				}

}

public function get_admin_list(){

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
					
					
						
						$sql="SELECT * FROM `helpdesk`.`users` 
						WHERE `admin`=1
						ORDER BY `username` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με όνομα χρήστη' id='admin_name' type='text' class='hover' /><br>";
						echo "<INPUT TYPE='button' value='ΕΝΕΡΓΟΙ' 	onclick='show_active_admins(1)' >";
						echo "<INPUT TYPE='button' value='ΑΝΕΝΕΡΓΟΙ'onclick='show_active_admins(0)' >";
						echo "<div id='admins_container_list'>";
						echo"<ul class='navList_admin' style='text-align: justify'>";
						
						
						while ($row = mysql_fetch_array($result)) {	
						
							echo" <li><font style='visibility:hidden'>".$row['username']."</font>";
							echo "<form action='#' method='post'>";
							if ($row["active"]==0){
		echo "<input class='hover' type='text' style='width:90%; float:left; background:#990000' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly style='background:#1a1a1a; font-weight:bold; border:0px solid'>
							";
						}	
						if ($row["active"]==1){
		echo "<input class='hover' type='text' style='width:90%; float:left;' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly style='background:#1a1a1a; font-weight:bold; border:0px solid'>
							";
						}	
							echo "
	<input type='hidden' value='".$row['id']."' name='admin_id'>
	";
echo " <INPUT TYPE='image' SRC='images/edit_icon.png' BORDER='0' ALT='SUBMIT!' > ";
	
	
	
	echo "</form></li>";
					}	

	echo "</ul>";
echo "</div>";	
				  }
	
	
	



	
}

public function get_user_list(){

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
					
					
						
						$sql="SELECT * FROM `helpdesk`.`users` 
						WHERE `admin`=0
						ORDER BY `username` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με όνομα χρήστη' id='user_name' type='text' class='hover' /><br>";
						echo "<INPUT TYPE='button' value='ΕΝΕΡΓΟΙ' 	onclick='show_active_users(1)' >";
						echo "<INPUT TYPE='button' value='ΑΝΕΝΕΡΓΟΙ'onclick='show_active_users(0)' >";
						echo "<INPUT TYPE='button' value='LOCKED'onclick='show_locked_users(0)' >";
						echo "<div id='users_container_list'>";
						
						
						echo"<ul class='navList_users' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
						
							echo" <li><font style='visibility:hidden'>".$row['username']."</font>
							<form action='#' method='post'>";
							
							if ($row["chat"]==1){
							echo "<input class='hover' type='text' style='width:90%; padding-right:10px;float:left;background-image: url(&apos;images/chat_enabled.png&apos;) ;background-repeat: no-repeat;background-position:right;' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly >
							";
							}
							if ($row["chat"]==0){
							echo "<input class='hover' type='text' style='width:90%; padding-right:10px;float:left;' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly >
							";
							}
							echo "
	<input type='hidden' value='".$row['id']."' name='user_id'>
	";
echo " <INPUT TYPE='image' SRC='images/edit_icon.png' BORDER='0' ALT='SUBMIT!' > ";
	
	
	
	echo "</form></li>";
					}	

	echo "</ul>";
echo "</div>";	
				  }
	
	
	



	
}


public function get_trial_user_list(){

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
					
					
						
						$sql="SELECT * FROM `helpdesk`.`trial_users` 
						WHERE `admin`=0
						ORDER BY `username` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με όνομα χρήστη' id='user_name' type='text' class='hover' /><br>";
						echo "<INPUT TYPE='button' value='ΕΝΕΡΓΟΙ' 	onclick='show_active_users(1)' >";
						echo "<INPUT TYPE='button' value='ΑΝΕΝΕΡΓΟΙ'onclick='show_active_users(0)' >";
						echo "<div id='users_container_list'>";
						
						
						echo"<ul class='navList_users' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
						if ($row["active"]==1){
							echo" <li><font style='visibility:hidden'>".$row['username']."</font>
							<form action='#' method='post'>";
							
							if ($row["chat"]==1){
							echo "<input class='hover' type='text' style='width:90%; padding-right:10px;float:left;background-image: url(&apos;images/chat_enabled.png&apos;) ;background-repeat: no-repeat;background-position:right;' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly >
							";
							}
							if ($row["chat"]==0){
							echo "<input class='hover' type='text' style='width:90%; padding-right:10px;float:left;' value='Username :[".$row['username']."] email : [".$row['email']."] Ονομ/νυμο : [".$row['comp_name']."]' readonly >
							";
							}
							echo "
	<input type='hidden' value='".$row['id']."' name='user_id_trial'>
	";
echo " <INPUT TYPE='image' SRC='images/disable_icon.png' BORDER='0' ALT='SUBMIT!' > ";
	
	
	
	echo "</form></li>";
	}
					}	

	echo "</ul>";
echo "</div>";	
				  }
	
	
	



	
}

public function reset_trial_user(){
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
					
					$sql="UPDATE `helpdesk`.`trial_users` 
					   SET `active`=0
						WHERE `id`=".$this->user_id."";
						
						//echo $sql;
						mysql_query($sql, $con);
					
					}

}

public function show_clicked_admin(){

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
					
					
						
						$sql="SELECT * FROM `helpdesk`.`users` 
						WHERE `id`=".$this->admin_id."";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
				
						
						echo"<ul class='navList_admin' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><form action='#' method='post'>
							
<h2>Username </h2><input class='hover' type='text' style='width:80%;' value='".$row['username']."' name='admin_username' >
<input  type='hidden' style='width:80%;' value='".$row['username']."' name='admin_username_hidden' >
<h2>Password</h2><input class='hover' type='text' style='width:80%;' value=' '  name='admin_password'>
<h2>Email    </h2><input class='hover' type='text' style='width:80%;' value='".$row['email']."' name='admin_email' >
<h2>Ονομ/νυμο</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_name']."'  name='admin_comp_name'>
<h2 style='float:left'>Chat</h2>";
							if ($row['chat']==1){
							echo "<img src='images/yes.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 0)'>";
							}
							else {
							echo "<img src='images/no.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 1)'>";
							}
							
						echo "<input type='hidden' value='".$row['id']."' name='admin_id'>
	";
echo " <br><INPUT TYPE='submit' value='ΜΕΤΑΒΟΛΗ'name='update_admin'> ";
if ($row['active']==1){
echo "<INPUT TYPE='submit' value='ΑΔΡΑΝΟΠΟΙΗΣΗ' name='disable_admin'>  ";
}
if ($row['active']==0){
echo "<INPUT TYPE='submit' value='ΕΝΕΡΓΟΠΟΙΗΣΗ' name='enable_admin'>  ";
}	

	
	echo "</li></form>";
					}	

	echo "</ul>";	
				  }
	
	
	



	
}



public function show_clicked_user(){

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
					
					
						
						$sql="SELECT * FROM `helpdesk`.`users` 
						WHERE `id`=".$this->user_id."";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
				
						
						echo"<ul class='navList_users' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><form action='#' method='post'>
							
<h2>Username </h2><input class='hover' type='text' style='width:80%;' value='".$row['username']."' name='user_username' >
<input  type='hidden' style='width:80%;' value='".$row['username']."' name='user_username_hidden' >
<h2>Password</h2><input class='hover' type='text' style='width:80%;' value=' '  name='user_password'>
<h2>Email    </h2><input class='hover' type='text' style='width:80%;' value='".$row['email']."' name='user_email' >
<h2>Ονομ/νυμο</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_name']."'  name='user_comp_name'>
<h2>ΤΗΛΕΦΩΝΟ</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_phone']."'  name='user_comp_phone'>
<h2>ΚΙΝΗΤΟ</h2><input class='hover' type='text' style='width:80%;' value='".$row['mobile']."'  name='user_mobile'>
<h2>FAX</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_fax']."'  name='user_comp_fax'>
<h2>ΔΙΕΥΘΥΝΣΗ</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_adress']."'  name='user_comp_adress'>
<h2 style='float:left'>Chat</h2>";
							if ($row['chat']==1){
							echo "<img src='images/yes.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 0)'>";
							}
							else {
							echo "<img src='images/no.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 1)'>";
							}
							
						echo "<input type='hidden' value='".$row['id']."' name='user_id'>
	";
echo " <br><INPUT TYPE='submit' value='ΜΕΤΑΒΟΛΗ'name='update_user'> ";
if ($row['active']==1){
echo "<INPUT TYPE='submit' value='ΑΔΡΑΝΟΠΟΙΗΣΗ' name='disable_user'>  ";
}
if ($row['active']==0){
echo "<INPUT TYPE='submit' value='ΕΝΕΡΓΟΠΟΙΗΣΗ' name='enable_user'>  ";
}	
if ($row['islogged']==1){
echo "<INPUT TYPE='submit' value='UNLOCK' name='unlock_user'>  ";
}		
echo "<INPUT TYPE='submit' value='ΚΑΘΑΡΙΣΜΟΣ IP LOCK' name='unlock_ips'>  ";		
	echo "</li></form>";
					}	

	echo "</ul>";	
				  }
	
	
	



	
}

public function get_users($selector){

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
					
					
					if ($selector==1){
						/* 
						$sql="SELECT count(a.`username`) as `total` FROM `helpdesk`.`users` a
INNER JOIN `helpdesk`.`login_ips` b
on a.`id`=b.`user_id`
						WHERE `accounttype`='subscriber' 
						AND `active`=1
						AND `admin`=0
						AND YEAR(`datecreate`)>2013
						AND `username`!='virgil'
						AND a.`id`=b.`user_id`";
						
						*/
						
						$sql="SELECT count(`username`) as `total` FROM `helpdesk`.`users` 
						WHERE `accounttype`='subscriber' 
						AND `active`=1
						AND `admin`=0
						AND YEAR(`datecreate`)>2013";
						
						$result=mysql_query($sql, $con);
						$row = mysql_fetch_array($result);
						echo $row["total"]." συνδρομητές έχουν ενεργοποιηθεί, ";
						
					}
					else if ($selector==2){
						
						$sql="SELECT count(*) as `total` FROM `helpdesk`.`users` 
						WHERE `accounttype`='demo' 
						
						AND YEAR(`datecreate`)>2013";
						
						$result=mysql_query($sql, $con);
						$row = mysql_fetch_array($result);
						echo $row["total"]." χρήστες demo, ";
					}
					else if ($selector==3){
						
						$sql="SELECT count(*) as `total` FROM `helpdesk`.`users` 
						WHERE `accounttype`='demo' 
						AND `active`=1
						AND YEAR(`datecreate`)>2013";
						
						$result=mysql_query($sql, $con);
						$row = mysql_fetch_array($result);
						echo $row["total"]." χρήστες demo ενεργοί, ";
					}	
					else if ($selector==4){
						
						$sql="SELECT count(*) as `total` FROM `helpdesk`.`users` 
						WHERE `islogged`=1 
						AND `admin`=0";
						
						$result=mysql_query($sql, $con);
						$row = mysql_fetch_array($result);
						echo $row["total"]." χρήστες online";
					}	
					}

}

}


?>
