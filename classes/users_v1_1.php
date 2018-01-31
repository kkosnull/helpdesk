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
private   $fax;
private	  $position;
private	  $comp_name;
private	  $manager;
private	  $comp_adress;
private	  $comp_phone;
private	  $comp_mobile;
private   $comp_expertice;
private $passwordbackup;
private  $dateend;
private $login_success;	
private $membership;
private $name;

// private vars for username changed_password
private $chat;

private $username_old;	
private $username_new;	
private $password_new;
private $password_new_retype;
private $sequrity_question;	
private $security_question_answer;	
private $user_id;
private $refresh_check;
private $dots_sequence;
private $last_check_ips;


public function set_name($name){
$this->name = $name;
}
public function get_last_check_ips(){
return $this->last_check_ips;
}

public function set_dots_sequence($dots_sequence){
$this->dots_sequence = $dots_sequence;
}

public function set_comp_expertice($comp_expertice){
$this->comp_expertice = $comp_expertice;
}

public function set_fax($fax){
$this->fax = $fax;
}
public function set_chat($chat){
$this->chat = $chat;
}
public function set_membership($membership){
$this->membership = $membership;
}

public function get_refresh_check(){
return $this->refresh_check;
}
public function set_password_new($password_new){
$this->password_new = $password_new;
}


public function set_password_new_retype($password_new_retype){
$this->password_new_retype = $password_new_retype;
}



public function set_user_id($user_id) {
		$this->user_id = $user_id;
		
	}

public function set_username_old($username_old) {
		$this->username_old = $username_old;
		
	}
	
	public function set_username_new($username_new) {
		$this->username_new = $username_new;
		
	}
	
	public function set_sequrity_question($sequrity_question) {
		$this->sequrity_question = $sequrity_question;
		
	}
	
	public function set_security_question_answer($security_question_answer) {
		$this->security_question_answer = $security_question_answer;
		
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

	
	public function getUsername() {
		echo $this->username;
		
	}
		public function getPassword() {
		echo $this->password;
		
	}
	
	public function get_security_questions(){
	
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
				
				
					 $sql="SELECT * FROM `helpdesk`.`security_questions`";
						// echo $sql;
						
						$result=mysql_query($sql, $con);
						
						
						echo "<select name='sequrity_questions'>";
							echo "<option value='0'>Επιλογή ερώτησης ασφαλείας</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['question']."'>" . $row['question'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}

public function logoff(){
$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
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


public function draw_dots()
{
echo "<table   cellpadding='20' cellspacing='20' border='1' width='380'>";
echo "<tr>";
for ($i=1; $i<=36; $i++){
echo "<td align='center' style='border-color:#007ED8; background-image: url(images/grid_inner.gif);' >
<div class='dot' onmouseover='get_sequence(this.id);'  id='".$i."'></div>
</td>";
if ($i%6==0){echo "<tr><td colspan='6' style='display:none'></td></tr>";  }

} 
echo "</tr>
<tr><td colspan='6' style='border:none;' ><input type='hidden' name='sequence' id='sequence' name='sequence' value=''>
<!--
<input type='button' value='done' onclick='pass_Sequence()' style=' background-color: #007ED8;   
    display: inline-block;
    padding: 5px 5px 5px;
    color: #fff;
	font-size:1.2em;
    text-decoration: none;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
   
    position: relative;
    cursor: pointer;'>
	
	<input type='button' value='reset' onclick='location.reload()' style=' background-color: #00A8FF;   
    display: inline-block;
    padding: 5px 5px 5px;
    color: #fff;
	font-size:1.2em;
    text-decoration: none;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
   
    position: relative;
    cursor: pointer;'>-->
	
	</td></tr>";
echo "</table>";
}

public function login_dots(){
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);

				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					$sql="SELECT* FROM `helpdesk`.`users`
						WHERE `dots`='".$this->dots_sequence."' and `username`='".$this->username."'";
					//echo $sql;	
						$result=mysql_query($sql);
						$rowsfetched=mysql_num_rows($result);
						if ($rowsfetched==1){
					while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $chat_admin=$row['chat_admin'];
							   $chat=$row['chat'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $dateend=$row["dateend"];
							   $changed_password=$row["changed_password"];
							   $user_id=$row["id"];
							   $islogged=$row["islogged"];
                               $active=$row["active"];
							   $level=$row["level"];
							   $accounttype=$row["accounttype"];
							   $allowupdate=$row["allowupdate"];
							   
							   $_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						//$_SESSION['start']=time();
						$_SESSION['expire']=time(); + (30 * 60);
							   }	
							   
							   echo "<p  style='font-size: 1.5em;
									color: #008BFF;'>Επιτυχής σύνδεση<br>
							   <a style='font-size: 1.3em;
									color: #008BFF;' href='index.php'>Μετάβαση στην εφαρμογή</a></p>";
						}
						else {
							
							echo "Login failed, please try again";
						}
				  }
	
}

public function record_activated_user(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);

				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
$sql_users_active="INSERT INTO `helpdesk`.`users_active` (`username`, `name`, `date`) 
						VALUES ('".$this->username."', '".$this->name."', NOW())";
						mysql_query($sql_users_active, $con);
				  }						
}


public function clear_ips(){
	
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("helpdesk", $con);
					 
					  $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					$sql="select `username`, a.`user_id`, `ip` from `login_ips` a inner join `users` b
							on a.`user_id`=b.`id`
							where b.`username`='".$this->username."'
							LIMIT 3";
							
					$result=mysql_query($sql, $con);
					
					$num_rows = mysql_num_rows($result);
					
					
					if ($num_rows!=0) {
						
					while ($row = mysql_fetch_array($result)) {
					
					$user_id=$row["user_id"];
					$username=$row["username"];
					
					$sql_ip="SELECT * FROM  `helpdesk`.`login_ips` 
					WHERE `user_id`=".$user_id."
					ORDER BY `ip`
					  LIMIT 3";
					
						$result2=mysql_query($sql_ip, $con);
						$ips[]=array("", "", "");
						$ids[]=array();
						$count=0;
						
							while ($row2 = mysql_fetch_array($result2)) {
							
							$count+=1;
							$ids[$count]=$row2["id"];
							$ips[$count]=$row2["ip"];
						
						
							$string1= explode(".", $ips[1]);
							$string2= explode(".", $ips[2]);
							$string3= explode(".", $ips[3]);
							}
							
							if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1] && $string2[1]==$string3[1] ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
							else if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1]  ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
								else if ( $string2[0]==$string3[0] && $string2[1]==$string3[1] ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
							
						
							
					}
				  }
				  
				
				}
	
	
}



public function login(){



	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);

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
					
					
					
					$init_check="SELECT * FROM `helpdesk`.`login_ips` a inner join `helpdesk`.`users` b 
					on a.`user_id`=b.`id` 
					WHERE a.`user_id`=b.`id`
					AND b.`username`='".$this->username."' 
					AND b.`password`='".$this->password."'
					AND `ip`='".$_SERVER['REMOTE_ADDR']."'";
					
						$result_init_check=mysql_query($init_check);
						$ipsfound=mysql_num_rows($result_init_check);
					//echo $ipsfound;
					// if first login
					if ($ipsfound==0){
					
					
					
					
					// login
						$sql="SELECT * FROM `helpdesk`.`users` WHERE username='".$this->username."' and `password`='".$this->password."'  ";
					
						$result=mysql_query($sql);
						$rowsfetched=mysql_num_rows($result);
						
						while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $chat_admin=$row['chat_admin'];
							   $chat=$row['chat'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $dateend=$row["dateend"];
							   $changed_password=$row["changed_password"];
							   $user_id=$row["id"];
							   $islogged=$row["islogged"];
                               $active=$row["active"];
							   $level=$row["level"];
							   $accounttype=$row["accounttype"];
							   $allowupdate=$row["allowupdate"];
							   $css=$row["css"];
							   }
							   if ($username!="popiuser" && $username!="ntinauser" && $username!="dikeos" && $username!="psovatzis" 
						&& $username!="sakisuser" && $username!="mixalisuser" && $username!="giannisuser" && $username!="pavlosuser" 
						&& $username!="apostolosuser" && $username!="aggelosuser" && $username!="tilem" && $username!="0669" 
						&& $username!="aser1924" 
						&& $username!="user00305"
						&& $username!="jkfo8149"
						&& $username!="imdp6429"
						&& $username!="hpae5248"
						&& $username!="8bfbd5831f"
						&& $username!="rigakos"
                                                && $username!="arih7926"){
						
						
						$sql_ip="INSERT INTO `helpdesk`.`login_ips` (`user_id`, `ip`) 
						VALUES (".$user_id.", '".$_SERVER['REMOTE_ADDR']."')";
						mysql_query($sql_ip, $con);
						
						
				
						
						
					}
					if ($rowsfetched>0 && $admin==0 && $active==1)  {
						if ($islogged==0){
						$_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						$_SESSION['css']=$css;
						//$_SESSION['start']=time();
						$_SESSION['expire']=time(); + (30 * 60);
					
						//check if demo is 1 day due to expire
						if ($accounttype=="demo"){
						$date1 = strtotime(time());
						$date2 = strtotime($dateend);
							 $datediff = abs(time()-$date2);
							 $datediff=floor($datediff/(60*60*24));
							 
							 $_SESSION['datediff']=$datediff;
							 if ($datediff<1 &&  $allowupdate==1){
						$_SESSION['alertdemo']=1;
						}
						else {
						$_SESSION['alertdemo']=0;
						}
						}
						//--check if demo is 1 day due to expire
						
						// set proper date end for first time log in
						
						
							$now = time(); 
							 $datecreate = strtotime($date_create);
							 $datediff = abs($datecreate-$now);
							 
							  $Date = date("Y-m-d");
							
							$dateend= date('Y-m-d', strtotime($dateend. ' + '.floor($datediff/(60*60*24)).' days'));
						  
							$sql_dateend="UPDATE `helpdesk`.`users` SET `dateend`='".$dateend."' WHERE `id`=".$user_id."";
							if ($account_type=="subscriber"){
							mysql_query($sql_dateend, $con);
							}
						// -- set proper date end for 1st log in
						
						
				
						// set user to logged in
						
						$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=1 WHERE `username`='".$this->username."' and `password`='".$this->password."' AND `active`=1";
						if ($username!="popiuser" && $username!="ntinauser" && $username!="dikeos" && $username!="psovatzis" 
						&& $username!="sakisuser" && $username!="mixalisuser" && $username!="giannisuser" && $username!="pavlosuser" 
						&& $username!="apostolosuser" && $username!="aggelosuser" && $username!="rigakos"  && $username!="arih7926" ){
						mysql_query($sql_logged, $con);
						}
						// --set user to logged in
						
						//header("Location:http://aniphelpdesk.com");
						echo "<div style='width:100%; text-align:left;'>
						<font style='color:#fff; font-size:1em;'>
						Καλωσορίσατε στον εξειδικευμένο ιστότοπο ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ 
						συνεργείων 
						<br>
						ANIP-HELPDESK.<br>
Τέλος στην αβεβαιότητα και το άγχος της βλάβης! 
<br>
24 ΩΡΕΣ Τεχνική Υποστήριξη στα Ελληνικά!
<br><br>
<ul>
<li>
&bull;Κωδικοί Βλαβών – Επεξήγηση και ανάλυση
</li><li>
&bull;Πιθανές αιτίες εμφάνισης βλαβών
</li><li>
&bull;Προτεινόμενοι τρόποι επίλυσης Τεχνικών προβλημάτων
</li><li>
&bull;Ζωντανή συνομιλία με τους ανθρώπους της Τεχνικής Υποστήριξης
</li><li>
</ul>
<br>
<a href='index.php'  style='color:#02A5DC; font-size:1.3em;'>Συνέχεια...</a>

							</font>
							<br>
							<br>
							<img src='images/meter_blue.png'>
							</div>";
						
$myfile = fopen("logged_users/".$username.".txt", "w");
						chmod("logged_users/".$username.".txt", 0777); 						
							
						$myFile = "logs/logins.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- Username : ".$username." logged in from ".$_SERVER['REMOTE_ADDR']."\n\n";
						fwrite($fh, $stringData);
						fclose($fh);	
						
						}
						/*
						if ($islogged==1){
						echo "<font style='font-weight:bold; color:#ed7271'>Ο χρήστης είναι ήδη συνδεδεμένος</b></font>
							<br><a href='login_user.php'   style='color:#fff'>Περιμένετε 5 λεπτά και προσπαθείστε ξανά</a>
												";
						}
						*/
	if ($islogged==1){
						$_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						$_SESSION['css']=$css;
						//$_SESSION['start']=time();
						$_SESSION['expire']=time(); + (30 * 60);
					
						//check if demo is 1 day due to expire
						if ($accounttype=="demo"){
						$date1 = strtotime(time());
						$date2 = strtotime($dateend);
							 $datediff = abs(time()-$date2);
							 $datediff=floor($datediff/(60*60*24));
							 
							 $_SESSION['datediff']=$datediff;
							 if ($datediff<1 &&  $allowupdate==1){
						$_SESSION['alertdemo']=1;
						}
						else {
						$_SESSION['alertdemo']=0;
						}
						}
						//--check if demo is 1 day due to expire
						
						// set proper date end for first time log in
						
						
							$now = time(); 
							 $datecreate = strtotime($date_create);
							 $datediff = abs($datecreate-$now);
							 
							  $Date = date("Y-m-d");
							
							$dateend= date('Y-m-d', strtotime($dateend. ' + '.floor($datediff/(60*60*24)).' days'));
						  
							$sql_dateend="UPDATE `helpdesk`.`users` SET `dateend`='".$dateend."' WHERE `id`=".$user_id."";
							if ($account_type=="subscriber"){
							mysql_query($sql_dateend, $con);
							}
						// -- set proper date end for 1st log in
						
						
				
						// set user to logged in
						
						$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=1 WHERE `username`='".$this->username."' and `password`='".$this->password."' AND `active`=1";
						if ($username!="popiuser" && $username!="ntinauser" && $username!="dikeos" && $username!="psovatzis" 
						&& $username!="sakisuser" && $username!="mixalisuser" && $username!="giannisuser" && $username!="pavlosuser" 
						&& $username!="apostolosuser" && $username!="aggelosuser" && $username!="rigakos"  && $username!="arih7926" ){
						mysql_query($sql_logged, $con);
						}
						// --set user to logged in
						
						//header("Location:http://aniphelpdesk.com");
						echo "<div style='width:100%; text-align:left;'>
						<font style='color:#fff; font-size:1em;'>
						Καλωσορίσατε στον εξειδικευμένο ιστότοπο ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ 
						συνεργείων 
						<br>
						ANIP-HELPDESK.<br>
Τέλος στην αβεβαιότητα και το άγχος της βλάβης! 
<br>
24 ΩΡΕΣ Τεχνική Υποστήριξη στα Ελληνικά!
<br><br>
<ul>
<li>
&bull;Κωδικοί Βλαβών – Επεξήγηση και ανάλυση
</li><li>
&bull;Πιθανές αιτίες εμφάνισης βλαβών
</li><li>
&bull;Προτεινόμενοι τρόποι επίλυσης Τεχνικών προβλημάτων
</li><li>
&bull;Ζωντανή συνομιλία με τους ανθρώπους της Τεχνικής Υποστήριξης
</li><li>
</ul>
<br>
<a href='index.php?alert=on'  style='color:#02A5DC; font-size:1.3em;'>Συνέχεια...</a>

							</font>
							<br>
							<br>
							<img src='images/meter_blue.png'>
							</div>";
							
							
							
							// report logged in user by email
							
							$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: info@anip.gr \r\n";
						$from = "aniphelpdesk - χρήστης ήδη συνδεδεμένος"; // sender
						$subject = "User logged";
						
						$message = "Ο χρήστης ".$username." πραγματοποίησε είσοδο στις ".date('l jS \of F Y h:i:s A')." ενώ ήταν ήδη συνδεδεμένος";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("info@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						
						
						$myfile = fopen("logged_users/".$username.".txt", "w");
						chmod("logged_users/".$username.".txt", 0777); 
						
						// record logged in user in txt file				
						$myFile = "logs/logged_in_report.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- \nUsername : ".$username." logged in violation. \n\n
						";
						fwrite($fh, $stringData);
						fclose($fh);	
						
						$myFile = "logs/logins.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- Username : ".$username." logged in from ".$_SERVER['REMOTE_ADDR']." \n\n";
						fwrite($fh, $stringData);
						fclose($fh);
						}
						}
						if ($rowsfetched>0 && $admin==0 && $active==0)  {
						
						
							echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> είναι απενεργοποιημένος.<br>
							Πιθανοί λόγοι : <br>
							Έχει λήξει η συνδρομή<br>
							Έχει πραγματοποιήσει έισοδο σε παραπάνω από 3 υπολογιστές<br>
							Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.
							<br>
							<a href='index.php'  style='color:#fff; font-size:1.3em;'>Επιστροφή</a></h2>";
							
						
						}
						if ($rowsfetched==0 &&  $active==1){
							echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> απέτυχε να συνδεθεί λόγω λανθασμένων στοιχείων</h2>
							<br>
							<h2>Αν έχετε κωδικό trial, παρακαλώ συνδεθείτε από το <br>&ldquo; Είσοδος από ημερίδα Λάρισσας &rdquo; ή από<br> &ldquo; Είσοδος από έκθεση αυτοκινήτου 2014 &rdquo;</h2>
							<br>
							<h2><a href='login_user.php'  style='color:#fff'>Προσπαθείστε ξανά</a></h2>";
							} 
						if ($rowsfetched==0){
							echo "Καταχωρήθηκαν λανθασμένα στοιχεία.<br>
							<h2><a href='login_user.php'  style='color:#02A5DC; font-size:1.3em;'>Πατήστε εδώ για να προσπαθήσετε πάλι.</a></h2>";
							} 
						
						}
					
					
					// if user has already logged in once 
					
					else if ($ipsfound!=0 && $ipsfound<4 ){
						
					
					// login
						$sql="SELECT * FROM `helpdesk`.`users` WHERE username='".$this->username."' and `password`='".$this->password."'  ";
					
						$result=mysql_query($sql);
						$rowsfetched=mysql_num_rows($result);
						
						while($row = mysql_fetch_array($result))
	   
							   {
							   $admin=$row['admin'];
							   $chat_admin=$row['chat_admin'];
							   $chat=$row['chat'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $dateend=$row["dateend"];
							   $changed_password=$row["changed_password"];
							   $user_id=$row["id"];
							   $islogged=$row["islogged"];
							   $active=$row["active"];
							   $level=$row["level"];
							   $css=$row["css"];
							   $accounttype=$row["accounttype"];
							    $allowupdate=$row["allowupdate"];
							   }
					if ($rowsfetched>0 && $admin==0 && $active==1)  {	
				
					    if ($islogged==0){
						$_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						$_SESSION['css']=$css;
						//$_SESSION['start']=time();
						$_SESSION['expire']=time() + (30 * 60);
						
						
						//check if demo is 1 day due to expire
						if ($accounttype=="demo"){
						$date1 = strtotime(time());
						$date2 = strtotime($dateend);
							 $datediff = abs(time()-$date2);
							 $datediff=floor($datediff/(60*60*24));
							 
							 $_SESSION['datediff']=$datediff;
							 if ($datediff<1 &&  $allowupdate==1){
						$_SESSION['alertdemo']=1;
						}
						else {
						$_SESSION['alertdemo']=0;
						}
						}
						//--check if demo is 1 day due to expire
						
						// set proper date end for first time log in
						
						/*
							$now = time(); 
							 $datecreate = strtotime($date_create);
							 $datediff = abs($datecreate-$now);
							 
							  $Date = date("Y-m-d");
							
							$dateend= date('Y-m-d', strtotime($dateend. ' + '.floor($datediff/(60*60*24)).' days'));
						  
							$sql_dateend="UPDATE `helpdesk`.`users` SET `dateend`='".$dateend."' WHERE `id`=".$user_id."";
							*/
							//mysql_query($sql_dateend, $con);
						// -- set proper date end for 1st log in
						
						
						
						// set user to logged in
						
						$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=1 WHERE `username`='".$this->username."' and `password`='".$this->password."' AND `active`=1";
						if ($username!="popiuser" && $username!="ntinauser" && $username!="dikeos" && $username!="psovatzis" 
						&& $username!="sakisuser" && $username!="mixalisuser" && $username!="giannisuser" && $username!="pavlosuser" 
						&& $username!="apostolosuser" && $username!="aggelosuser"  ){
						mysql_query($sql_logged, $con);
						}
						// --set user to logged in
						//header("Location:http://aniphelpdesk.com");
						
						echo "<div style='width:100%; text-align:left;'>
						<font style='color:#fff; font-size:1em;'>
						Καλωσορίσατε στον εξειδικευμένο ιστότοπο ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ 
						συνεργείων 
						<br>
						ANIP-HELPDESK.<br>
Τέλος στην αβεβαιότητα και το άγχος της βλάβης! 
<br>
24 ΩΡΕΣ Τεχνική Υποστήριξη στα Ελληνικά!
<br><br>
<ul>
<li>
&bull;Κωδικοί Βλαβών – Επεξήγηση και ανάλυση
</li><li>
&bull;Πιθανές αιτίες εμφάνισης βλαβών
</li><li>
&bull;Προτεινόμενοι τρόποι επίλυσης Τεχνικών προβλημάτων
</li><li>
&bull;Ζωντανή συνομιλία με τους ανθρώπους της Τεχνικής Υποστήριξης
</li><li>
</ul>
<br>
<a href='index.php'  style='color:#02A5DC; font-size:1.3em;'>Συνέχεια...</a>

							</font>
							<br>
							<br>
							<img src='images/meter_blue.png'>
							</div>";
							
						$myfile = fopen("logged_users/".$username.".txt", "w");
						chmod("logged_users/".$username.".txt", 0777); 
						
							$myFile = "logs/logins.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- Username : ".$username." logged in from ".$_SERVER['REMOTE_ADDR']."\n\n";
						fwrite($fh, $stringData);
						fclose($fh);
						}
						/*
						if ($islogged==1){
						echo "<font style='font-weight:bold; color:#ed7271'>Ο χρήστης είναι ήδη συνδεδεμένος</b></font>
							<br><a href='login_user.php'   style='color:#fff'>Περιμένετε 5 λεπτά και προσπαθείστε ξανά</a>
												";
						}
						*/
							if ($islogged==1){
						$_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						$_SESSION['css']=$css;
						//$_SESSION['start']=time();
						$_SESSION['expire']=time(); + (30 * 60);
					
						//check if demo is 1 day due to expire
						if ($accounttype=="demo"){
						$date1 = strtotime(time());
						$date2 = strtotime($dateend);
							 $datediff = abs(time()-$date2);
							 $datediff=floor($datediff/(60*60*24));
							 
							 $_SESSION['datediff']=$datediff;
							 if ($datediff<1 &&  $allowupdate==1){
						$_SESSION['alertdemo']=1;
						}
						else {
						$_SESSION['alertdemo']=0;
						}
						}
						//--check if demo is 1 day due to expire
						
						// set proper date end for first time log in
						
						
							$now = time(); 
							 $datecreate = strtotime($date_create);
							 $datediff = abs($datecreate-$now);
							 
							  $Date = date("Y-m-d");
							
							$dateend= date('Y-m-d', strtotime($dateend. ' + '.floor($datediff/(60*60*24)).' days'));
						  
							$sql_dateend="UPDATE `helpdesk`.`users` SET `dateend`='".$dateend."' WHERE `id`=".$user_id."";
							if ($account_type=="subscriber"){
							mysql_query($sql_dateend, $con);
							}
						// -- set proper date end for 1st log in
						
						
				
						// set user to logged in
						
						$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=1 WHERE `username`='".$this->username."' and `password`='".$this->password."' AND `active`=1";
						if ($username!="popiuser" && $username!="ntinauser" && $username!="dikeos" && $username!="psovatzis" 
						&& $username!="sakisuser" && $username!="mixalisuser" && $username!="giannisuser" && $username!="pavlosuser" 
						&& $username!="apostolosuser" && $username!="aggelosuser" && $username!="rigakos"  && $username!="arih7926" ){
						mysql_query($sql_logged, $con);
						}
						// --set user to logged in
						
						//header("Location:http://aniphelpdesk.com");
						echo "<div style='width:100%; text-align:left;'>
						<font style='color:#fff; font-size:1em;'>
						Καλωσορίσατε στον εξειδικευμένο ιστότοπο ΤΕΧΝΙΚΗΣ ΥΠΟΣΤΗΡΙΞΗΣ 
						συνεργείων 
						<br>
						ANIP-HELPDESK.<br>
Τέλος στην αβεβαιότητα και το άγχος της βλάβης! 
<br>
24 ΩΡΕΣ Τεχνική Υποστήριξη στα Ελληνικά!
<br><br>
<ul>
<li>
&bull;Κωδικοί Βλαβών – Επεξήγηση και ανάλυση
</li><li>
&bull;Πιθανές αιτίες εμφάνισης βλαβών
</li><li>
&bull;Προτεινόμενοι τρόποι επίλυσης Τεχνικών προβλημάτων
</li><li>
&bull;Ζωντανή συνομιλία με τους ανθρώπους της Τεχνικής Υποστήριξης
</li><li>
</ul>
<br>
<a href='index.php?alert=on'  style='color:#02A5DC; font-size:1.3em;'>Συνέχεια...</a>

							</font>
							<br>
							<br>
							<img src='images/meter_blue.png'>
							</div>";
							
						$myFile = "logs/logins.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- Username : ".$username." logged in from ".$_SERVER['REMOTE_ADDR']."\n\n";
						fwrite($fh, $stringData);
						fclose($fh);
						
							// report logged in user by email
							
							$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: info@anip.gr \r\n";
						$from = "aniphelpdesk - χρήστης ήδη συνδεδεμένος"; // sender
						$subject = "User logged";
						
						$message = "Ο χρήστης ".$username." πραγματοποίησε είσοδο στις ".date('l jS \of F Y h:i:s A')." ενώ ήταν ήδη συνδεδεμένος";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("info@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						
						
						$myfile = fopen("logged_users/".$username.".txt", "w");
						chmod("logged_users/".$username.".txt", 0777); 
						
						// record logged in user in txt file				
						$myFile = "logs/logged_in_report.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------- \nUsername : ".$username." logged in violation. \n\n
						";
						fwrite($fh, $stringData);
											
						fclose($fh);	
						
						
						}
						}
						
						if ($rowsfetched>0 && $admin==0 && $active==0)  {
						
						
							echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> είναι απενεργοποιημένος.<br>
							Πιθανοί λόγοι : <br>
							Έχει λήξει η συνδρομή<br>
							Έχει πραγματοποιήσει έισοδο σε παραπάνω από 3 υπολογιστές<br>
							Παρακαλώ επικοινωνήστε με την τεχνική υποστήριξη.<br>
							<a href='index.php'  style='color:#fff; font-size:1.3em;'>Επιστροφή</a></h2>";
							
						
						}
						
						if ($rowsfetched==0 && $admin==0){
							echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> απέτυχε να συνδεθεί λόγω λανθασμένων στοιχείων</h2>
							<br>
							<h2>Αν έχετε κωδικό trial, παρακαλώ συνδεθείτε από το <br>&ldquo; Είσοδος από ημερίδα Λάρισσας &rdquo; ή από<br> &ldquo; Είσοδος από έκθεση αυτοκινήτου 2014 &rdquo;</h2>
							<br>
							<h2><a href='login_user.php'  style='color:#fff'>Προσπαθείστε ξανά</a></h2>";
							} 
							
					}
						else if ($ipsfound!=0 && $ipsfound>3){
						$myFile = "logs/login.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = "MAX IPs RULE VIOLATION : ".date('l jS \of F Y h:i:s A')." User ".$this->username." attempted login from ".$_SERVER['REMOTE_ADDR']."\n ";
						fwrite($fh, $stringData);
						
						fclose($fh);
						// write sql query to logs/login
						
						$myFile = "logs/sql_login.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = "".date('l jS \of F Y h:i:s A')." User ".$username." query to users ".$sql." ---- ".$sql_logged."\n ";
						fwrite($fh, $stringData);
						
						fclose($fh);
						$_SESSION['maxips']=4;
						session_destroy();
/*
						echo "<div style='width:100%; text-align:left;'>
						<font style='color:#fff; font-size:1em;'>
						<img src='images/warning.png' style='widht:50px;height:auto'>
						<b>Το σύστημα έχει καταγράψει είσοδο σε τρεις διαφορετικούς υπολογιστές.
<br>
Για λόγους ασφαλείας δεν επιτρέπεται η είσοδος σε περισσότερους.
<br>
Παρακαλώ επικοινωνήστε με τον προμηθευτή σας.</b>
<br>
							<a href='index.php'  style='color:#fff; font-size:1.3em;'>Επιστροφή</a></h2>
							</div>";
							*/
						// header("Location:http://aniphelpdesk.com");
						}
					}
			
}

public function enable_trial(){
$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					$sql="SELECT * FROM `helpdesk`.`trial_users` WHERE username='".$this->username."' and `password`='".$md5password."' ";
					
					//echo $sql;
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							  
							   $user_id=$row["id"];
							   $date_create=$row["datecreate"];
							   $dateend=$row["dateend"];
							   }
							   
							   
					$datediff = $dateend - $date_create;
       				    $datediff=floor($datediff/(60*60*24));
						$date = new DateTime();
						$date->modify('+'.$datediff.' day');
						$dateend=$date->format('Y-m-d');
						$sql_dateend="UPDATE `helpdesk`.`trial_users` SET `dateend`='".$dateend."' WHERE `id`=".$user_id."";
						mysql_query($sql_dateend, $con);
						
						
					$sql="UPDATE`helpdesk`.`trial_users` SET `active`=1 WHERE username='".$this->username."' ";
					//echo $sql;
					mysql_query($sql, $con);
					}
					
					
}

public function login_trial(){
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
					$password_clean=$this->password;
					$md5password=md5($password_clean);
					$sql="SELECT * FROM `helpdesk`.`trial_users` WHERE username='".$this->username."' and password='".$md5password."'  AND `islogged`=0";
					
					//echo $sql;
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							   $active=$row['active'];
							   $admin=$row['admin'];
							   $chat=$row['chat'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $changed_password=$row["changed_password"];
							   $user_id=$row["id"];
							   $islogged=$row["islogged"];
							   }
							   
					$rownum=mysql_num_rows($result);
					
					if ($rownum==1 && $islogged==0 && $active==1){
						$_SESSION['trial']=1;
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
						
						
						if ($changed_password==1){
							$_SESSION['changed_password']=1;
							
						} else if ($changed_password==0){
							$_SESSION['changed_password']=0;
						
						
						}
						
						$_SESSION['username']=$username;
						$_SESSION['user_id']=$user_id;
						//$_SESSION['start'] = time(); // Taking now logged in time.
						// Ending a session in 30 minutes from the starting time.
						$_SESSION['expire'] = time() + (30 * 60);
						//echo "check";
						//header("Location:http://aniphelpdesk.com/index.php") ;
						$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=1 WHERE username='".$this->username."' and password='".$this->password."' AND `active`=1";
						mysql_query($sql_logged, $con);
						
						$myFile = "logs/login.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = "".date('l jS \of F Y h:i:s A')." User ".$this->username." logged in from ".$_SERVER['REMOTE_ADDR']."\n ";
						fwrite($fh, $stringData);
						
						fclose($fh);
						// write sql query to logs/login
						
						$myFile = "logs/sql_login.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					$stringData = "".date('l jS \of F Y h:i:s A')." User ".$username." query to users ".$sql." ---- ".$sql_logged."\n ";
					fwrite($fh, $stringData);
					
					fclose($fh);
					
					
						echo "<script>location.reload();</script>";
					}
					elseif ($rownum==1 && $islogged==0 && $active==0){
					
					echo "<div  class='form_complete'>
               
                <p style='color:#ed7271; margin:20px; font-weight:bold;'>
                    Συμπληρώστε τα παρακάτω στοιχεία για να ενεργοποιηθεί ο λογαριασμός σας.<br>
					(Τα πεδία με αστερίσκο είναι υποχρεωτικά)
                </p>
                <form action='#' method='post' >
                    <ul>
                        <li><input type='hidden' name='username' value='".$this->username."'/>
						<input type='hidden' name='password' value='".$password_clean."'/>
                            <input type='text' name='name' placeholder='Όνομα *' onClick='this.select();'/>
                        </li>
                        <li>
                            <input type='text' name='surname' placeholder='Επώνυμο *' onClick='this.select();'/>
                        </li>
						<li>
                            <input type='text' name='address' placeholder='Διεύθυνση *' onClick='this.select();'/>
                        </li>
						<li>
                            <input type='text' name='phone' placeholder='Τηλέφωνο *' onClick='this.select();'/>
                        </li>
						<li>
                            <input type='text' name='area' placeholder='Περιοχή *' onClick='this.select();'/>
                        </li>
						<li>
                            <input type='text' name='postcode' placeholder='Τ.Κ. *' onClick='this.select();'/>
                        </li>
						<li>
                            <input type='text' name='email' placeholder='email' onClick='this.select();'/>
                        </li>
						<li>
                            <select name='expertice'>
							  <option value=''>Ειδικότητα</option>
							  <option value='Συνεργείο'>Συνεργείο</option>
							  <option value='Ηλεκτρολογείο'>Ηλεκτρολογείο</option>
							  <option value='Φανοποιείο'>Φανοποιείο</option>
							  <option value='Καθηγητής'>Καθηγητής</option>
							  <option value='Φοιτητής'>Φοιτητής</option>
							</select>
                        </li>
                        <li>
                           
							<input name='complete_trial' type='submit' value='Ολοκλήρωση εγγραφής' class='button' style='width:180px;'/>
							<br>
							<a href='http://aniphelpdesk.com/login_user_trial.php'><input  type='button' value='Ακύρωση' class='button' /></a>
                        </li>
					
                    </ul>
                </form>
				
            </div>
			";
					}
					else {
					$myFile = "logs/sql_login.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					$stringData = "ERROR".date('l jS \of F Y h:i:s A')." User ".$username." query to users ".$sql."\n ";
					fwrite($fh, $stringData);
					
					fclose($fh);
					echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> απέτυχε να συνδεθεί λόγω λανθασμένων στοιχείων,
					ή είναι ήδη συνδεδεμένος από κάποια άλλη συσκευή.<br>
					<a href='logout_user.php?user=".$this->username."'>αίτηση απομπλοκαρίσματος χρήστη?</a></h2>
					
					<br>
					<a href='http://aniphelpdesk.com/login_user_trial.php'><input  type='button' value='Επιστροφή' class='button' /></a>";
					} 
				  }
}

public function generate_demo_user(){

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
					
					
				 $demo_duration=5;
				  $message = "";
				  
				
				 
				  
				    $date = new DateTime();
					$date->modify('+'.$demo_duration.' day');
					
					$dateend=$date->format('Y-m-d');
	
	
					$rownum=1;
					
					//$password=substr(str_shuffle(md5(time())),0, 10);
					//$password_md5=md5($password);
					// generates password_md5 in the form ccccdddd
					$password=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					$password_md5=md5($password);
					
					// loop that checks username singularity
					while ($rownum!=0){
					
					//$username=substr(str_shuffle(md5(time())),0, 10);
					// generates username in the form ccccdddd
					$username=substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0, 4)."".substr(str_shuffle("1234567890"),0, 4);
					// set username password for file log append
					
					
					
					
					
					// set username password for file log append
					$check="(SELECT `username` FROM `helpdesk`.`users` WHERE `username`='".$username."' AND `email`='".$this->email."') UNION 
					(SELECT `username`  FROM `helpdesk`.`trial_users` WHERE `username`='".$username."' AND `email`='".$this->email."')";
				//echo $check;
					$result=mysql_query($check);		   
					$rownum=mysql_num_rows($result);
					
					}
					$checkip="SELECT `username` FROM `helpdesk`.`users` WHERE `clientip`='".$_SERVER['REMOTE_ADDR']."' ";
					$resultip=mysql_query($checkip);		   
					$rownumip=mysql_num_rows($resultip);
					
					if ($rownumip==0){
					
					$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, 
				`position`, `comp_name`,  `comp_adress`, `comp_phone`, `mobile`, `datecreate`,  `dateend`, `active`,  `chat`, `clientip`)
VALUES 
('".$username."', '".$password_md5."', '".$this->email."', 1,'greece', 'demo' , 'demo', '".$this->comp_name."',
'".$this->comp_adress."',  ".$this->comp_phone.", 0, CURDATE(), '".$dateend."',  1, 1, '".$_SERVER['REMOTE_ADDR']."')";

					
				
				mysql_query($sql, $con);

				  // end loop that checks username singularity
				  //echo $sql; echo "<br>";
				 
				  
				 
				
				  
				
					
				  
				  echo "<div class='form_complete' id='container'>
	
                <div class='flat-form' style='margin-top:0px;'>
		<div >
            <ul class='tabs'>
                <li>
                    <a href='#login' class='active'>Χρήση demo</a>
                </li>
               
            </ul>
            <div id='login' class='form-action show'>
                <h2>Είσοδος </h2>";
				echo "<p style='font-size:14px; line-height:15px;'>Καλως ήλθατε στον διαδικτυακό κόμβο Τεχνικών Πληροφοριών aniphelpdesk!!!<br><br>
Με την εγγραφή σας, έχετε την δυνατότητα να δείτε και να περιηγηθείτε στην Τεχνική Βιβλιοθήκη για 5 ΗΜΕΡΕΣ εντελώς ΔΩΡΕΑΝ!!!<br><br>
Παρακαλώ σημειώστε το ‘’Όνομα Χρήστη’’ και τον  ‘’ Κωδικό’’ ώστε να τους χρησιμοποιήσετε στην επόμενη εισοδό σας.<br><br>
Σας ευχαριστούμε για το ενδιαφέρον σας και ευχόμαστε η Τεχνική Βιβλιοθήκη να ικανοποιήσει τις ανάγκες σας και να είναι ένα σπουδαίο εργαλείο/ βοηθός  στο συνεργείο σας!!!!
</p>";
                echo "
                <form action='#' method='post'>
                    <ul>
                        <li>
                            <input type='text' name='username' value='".$username."' placeholder='Όνομα χρήστη'/>
                        </li>
                        <li>
                            <input type='text' name='password' placeholder='Κωδικός' value='".$password."'/>
                        </li>
                        <li>
                           
							<input name='login_button' type='submit' value='Σύνδεση' class='button' />
							<br>
							<a href='index.php'><input name='back_button' type='button' value='Επιστροφή' class='button' /></a>
							
                        </li>
					
                    </ul>
                </form>
				
            </div>
            <!--/#login.form-action-->
            
            <!--/#register.form-action-->
            
            <!--/#register.form-action-->
        </div>
    </div>
	</div>";
				  
	

$myFile = "registration_logs/demo_users_registered.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "\n Username : ".$username."\n Password : ".$password."\n -----------------------------------------------------------------------------";
fwrite($fh, $stringData);
					
fclose($fh);	


				}
else {
echo "<div class='form_complete' id='container'>
	
                <div class='flat-form' style='margin-top:0px;'>
		<div >
            <ul class='tabs'>
                <li>
                    <a href='#login' class='active'>Χρήση demo</a>
                </li>
               
            </ul>
            <div id='login' class='form-action show'>
                <h2>Είσοδος </h2>";
				echo "<p style='font-size:18px; line-height:15px;'>Έχει ήδη πραγματοποιηθεί εγγραφή μία φορά με αυτά τα στοιχεία.</p>";
                echo "
                <form action='#' method='post'>
                    <ul>
                       
                        <li>
                           
							
							<a href='index.php'><input name='back_button' type='button' value='Επιστροφή' class='button' /></a>
							
                        </li>
					
                    </ul>
                </form>
				
            </div>
            <!--/#login.form-action-->
            
            <!--/#register.form-action-->
            
            <!--/#register.form-action-->
        </div>
    </div>
	</div>";
}				
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
							   
							   $active=$row['active'];
							   $admin=$row['admin'];
							   $chat=$row['chat'];
							   $username=$row['username'];
							   $account_type=$row['accounttype'];
							   $date_create=$row["datecreate"];
							   $changed_password=$row["changed_password"];
							   $user_id=$row["id"];
							   $islogged=$row["islogged"];
							   
							  
							   }
					    $_SESSION['username']=$username;
						$_SESSION['admin']=$admin;
						$_SESSION['chat']=$chat;
						$_SESSION['chat_admin']=$chat_admin;
						$_SESSION['accounttype']=$accounttype;
						$_SESSION['changed_password']=$changed_password;
						$_SESSION['user_id']=$user_id;
						   
					$rownum=mysql_num_rows($result);
					//echo $rownum;
					
									
					if ($rownum>0){	
							echo "<div style='width:100%; text-align:center;'>
						<font style='color:#fff; font-size:1.5em;'>Επιτυχής σύνδεση
							<br>
							<br>
							<a href='index.php'  style='color:#02A5DC; font-size:1.3em;'>Επιστροφή στην εφαρμογή</a></font>
							<br>
							<br>
							<img src='images/meter_blue.png'>
							</div>";	
							
						  
					}else if ($rownum==0) {
						echo "<h2>Ο χρήστης <font style='font-size:1.4em;'>".$this->username."</font> απέτυχε να συνδεθεί.
							<br>
							<h2><a href='login_user.php'  style='color:#fff'>Προσπαθείστε ξανά</a></h2>";
					
					}
				
				  }
}

public function insert_new_user(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
if (($this->email=="") || ($this->comp_name=="") || ($this->phone=="")) {

echo "<h2>Τα πεδία με αστερίσκο είναι εποχρεωτικά.</h2>";
} else {
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$rownum=1;
					
					$check_email="(SELECT `username` FROM `helpdesk`.`users` WHERE  `email`='".$this->email."') UNION 
					(SELECT `username`  FROM `helpdesk`.`trial_users` WHERE  `email`='".$this->email."')";
					
					$result=mysql_query($check_email);		   
					$email_validity=mysql_num_rows($result);
					//$email_validity=0;
					$password=substr(str_shuffle(md5(time())),0, 10);
					$password=md5($password);
					while ($rownum!=0){
					
					$username=substr(str_shuffle(md5(time())),0, 10);
					
					
					
					$check="(SELECT `username` FROM `helpdesk`.`users` WHERE `username`='".$username."' AND `email`='".$this->email."') UNION 
					(SELECT `username`  FROM `helpdesk`.`trial_users` WHERE `username`='".$username."' AND `email`='".$this->email."')";
				//echo $check;
					$result=mysql_query($check);		   
					$rownum=mysql_num_rows($result);
					
					}
				
if ($email_validity==0 && filter_var($this->email, FILTER_VALIDATE_EMAIL)){								
	if ($this->membership==3){	
	
	
	$date = new DateTime();
	$date->modify('+3 day');
	
	$dateend=$date->format('Y-m-d');

				$sql="INSERT INTO `helpdesk`.`trial_users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, 
				`position`, `comp_name`,  `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`,  `dateend`, `active`, `phone`, `mobile`, `chat`)
VALUES 
('".$username."', '".$password."', '".$this->email."', 1,'greece', 0 , 'subscriber', '".$this->comp_name."',
'".$this->comp_address."',  '".$this->phone."', '".$this->comp_fax."', CURDATE(), '".$dateend."',  0, '".$this->phone."', '".$this->mobile."','".$this->chat."' )";

mysql_query($sql, $con);

$sql="SELECT `id` from `helpdesk`.`trial_users` WHERE `username`='".$username."' AMD `password`='".$password."'";
$result=mysql_query($sql);
					while($row = mysql_fetch_array($result)){
						$id=$row["id"];
					}
					$_SESSION['id_registered_user']=$id;
					
$from = "support@aniphelpdesk.com"; // sender
						  $subject = "Εγγραφή trial για 3 ημέρες";
						  $message = "username : ".$username."password : ".$password."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						  $message = wordwrap($message, 70);
						  // send mail
						  mail($this->email,$subject,$message,"From: $from\n");					

echo "<h2 style='color:#fff'>Επιτυχής εγγραφή για 3 ημέρες trial.<br>
Σας έχει αποσταλεί email με τα στοιχεία του λογαριασμού σας.</h2>";


}
 else {
//$sql_loginstring=md5("SELECT * FROM `helpdesk`.`users` WHERE username='".$username."' and password='".$password."' AND `active`=1 AND `islogged`=0");
					
	$date = new DateTime();
	$date->modify('+'.$this->membership.' day');
	$dateend=$date->format('Y-m-d');
				$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, 
				`position`, `comp_name`,  `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`, `dateend`, `active`, `phone`, `mobile`, `chat` )
VALUES 
('".$username."', '".$password."', '".$this->email."', 1,'greece', 0 , 'subscriber', '".$this->comp_name."',
'".$this->comp_address."',  '".$this->phone."', '".$this->comp_fax."', CURDATE(), '".$dateend."',  0, '".$this->phone."', '".$this->mobile."','".$this->chat."' )";
//echo $sql;
mysql_query($sql, $con);
$sql="SELECT `id` from `helpdesk`.`trial_users` WHERE `username`='".$username."' AMD `password`='".$password."'";
$result=mysql_query($sql);
					while($row = mysql_fetch_array($result)){
						$id=$row["id"];
					}
					$_SESSION['id_registered_user']=$id;
					$_SESSION['email_registered']=$this->email;
				
//mysql_query($sql, $con);
echo "Η εγγραφή σας δεν έχει ολοκληρωθεί ακόμα, για την ολοκλήρωσή της πρέπει να προχωρήσετε στην εξόφληση μέσω paypal.<br><br>";
if ($this->membership==1){

echo "<h2> 1 Ημέρα - 2 &euro;</h2>
<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='SH9CHF4AHFFTN'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>
";
}
if ($this->membership==30){

echo "
<h2> 1 Μήνας - 10 &euro;</h2>
<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='SAPFF336YKVRL'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>
";
}

if ($this->membership==365){

echo "
<h2> 1 Χρόνος - 100 &euro;</h2>
<form action='https://www.paypal.com/cgi-bin/webscr' method='post' target='_top'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='7XVE232R2ZN3C'>
<input type='image' src='https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypalobjects.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>



";
}


}
}
 if ($email_validity>0){

echo "<h2>Το email που δηλώσατε χρησιμοποιείται ήδη.</h2>";
}
 if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))	{
echo "<h2>Το email που δηλώσατε δεν είναι έγκυρο.</h2>";
}			
				
			//echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				
				// echo $sql;
				//echo "<hr>";
				//echo $username;
				
				}
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
				
						
				$sql="INSERT INTO `helpdesk`.`users`  (`username`, `password`,`email`,`receivemail`,`country`, `accounttype`, `position`, `comp_name`, `comp_manager`, `comp_adress`, `comp_phone`, `comp_fax`, `datecreate`, `dateend`, `active`, `phone`, `mobile`)
VALUES 
('".$this->username."', '".$this->password."', '".$this->email."', $this->receivemail,'".$this->country."', $this->accounttype, '".$this->position."', '".$this->comp_name."',
'".$this->comp_manager."', '".$this->comp_adress."',  '".$this->comp_phone."', '".$this->comp_fax."', CURDATE(), '".$this->dateend."', 1, '".$this->phone."', '".$this->mobile."' )";

				mysql_query($sql, $con);
				
				//echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				
				//echo $sql;
				
				}

}

public function change_username(){
	
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
					
				if ($this->username_new!=''){
				if ($this->password_new==''){
		
				$sql="UPDATE `helpdesk`.`users`  SET `username` = '".$this->username_new."', `username_initial`='".$this->username_old."', 
				`security_question`='".$this->sequrity_question."', `security_answer`='".$this->security_question_answer."', `changed_password`=1
				WHERE `id`=".$this->user_id."";
				$this->refresh_check = 0;
				mysql_query($sql, $con);
				echo "<h2 style='color:#fff'>To όνομα χρήστη άλλαξε επιτυχώς.<br> 
θα γίνει αυτόματη έξοδος από το σύστημα για να συνδεθείτε εκ νέου.</h2>";
				}
				
				
				else {
				//echo $this->password_new;
				//echo"---";
				
				//echo $this->password_new_retype;
						if($this->password_new!=$this->password_new_retype){
						$this->refresh_check = 0;
							echo "<h2>Τα πεδία των κωδικών δε συμφωνούν μεταξύ τους.</h2>";
						}else {
						
						$sql="UPDATE `helpdesk`.`users`  SET `username` = '".$this->username_new."', `username_initial`='".$this->username_old."', 
				`password`='".md5($this->password_new)."', `security_question`='".$this->sequrity_question."', `security_answer`='".$this->security_question_answer."', `changed_password`=1
				WHERE `id`=".$this->user_id."";
				$this->refresh_check = 1;
						}
				mysql_query($sql, $con);
				//echo $sql;
				echo "<h2>To όνομα χρήστη και ο κωδικός χρήστη άλλαξαν επιτυχώς.<br> 
θα γίνει αυτόματη έξοδος από το σύστημα για να συνδεθείτε εκ νέου.</h2>";
				}
				
				
				//echo $sql;
				
				}
				else {
				$this->refresh_check = 0;
				if($this->password_new!=$this->password_new_retype){
						$this->refresh_check = 0;
							echo "<h2>Τα πεδία των κωδικών δε συμφωνούν μεταξύ τους.</h2>";
						}else {
						
						$sql="UPDATE `helpdesk`.`users`  SET 
				`password`='".md5($this->password_new)."', `security_question`='".$this->sequrity_question."', `security_answer`='".$this->security_question_answer."', `changed_password`=1
				WHERE `id`=".$this->user_id."";
				$this->refresh_check = 1;
				mysql_query($sql, $con);
			//	echo $sql;
				echo "<h2>Ο κωδικός χρήστη άλλαξε επιτυχώς.<br> 
θα γίνει αυτόματη έξοδος από το σύστημα για να συνδεθείτε εκ νέου.</h2>";
						}
				}
}

}


public function reset_password(){
	
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
					
					$sql="SELECT * FROM `helpdesk`.`users` WHERE `username` = '".$this->username."'";
					$result=mysql_query($sql);
					$num_rows = mysql_num_rows($result);
					if ($num_rows==0){
					
						echo "<h2>Το όνομα χρήστη δεν υπάρχει.</h2>";
					
					}else {
					
					
					while($row = mysql_fetch_array($result))
	   
							   {
							   $email=$row['email'];
							   $user_id=$row['id'];
							   }
				
					$range_start = 48;
					$range_end   = 122;
					$password = "";
					$password_length = 10;

					for ($i = 0; $i < $password_length; $i++) {
					  $ascii_no = round( mt_rand( $range_start , $range_end ) ); // generates a number within the range
					  // finds the character represented by $ascii_no and adds it to the random string
					  // study **chr** function for a better understanding
					  $password .= chr( $ascii_no );
					}
					   
						$password_md5=md5($password);  
						
						 $from = "support@autosupport.gr"; // sender
						  $subject = "Αλλαγή password";
						  $message = "Το καινούργιο σας password είναι το : ".$password."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						  $message = wordwrap($message, 70);
						  // send mail
						  mail($email,$subject,$message,"From: $from\n");
						  echo "<h2>";
						  //echo $message;
						  //echo "<br>";
						  echo "Έχει αποσταλεί ηλεκτρονικό μήνυμα στο email σας με τον καινούριο κωδικό που δηλώσατε.";
					$sql="UPDATE `helpdesk`.`users`  SET `password` = '".$password_md5."' WHERE `id`=".$user_id."";	
					
					
					
					//mysql_query($sql, $con);
				
				//echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				
				//echo $sql;
					  echo "</h2>";
					}
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
				
				$sql_insert="INSERT INTO `helpdesk`.`unlock_count` (`user_id`) VALUES (".$this->user_id.")";

				
				mysql_query($sql_insert, $con);
				
				$sql="SELECT * FROM `helpdesk`.`unlock_count` WHERE `user_id`=".$this->user_id."";
				$result=mysql_query($sql);
				$num_rows = mysql_num_rows($result);
				
				if ($num_rows>3){
				
				$sql="UPDATE `helpdesk`.`users` SET `active`=0 WHERE `id`=".$this->user_id."";
				//mysql_query($sql, $con);
				echo "<h3 style='color:#fff'>Το σύστημα έχει καταγράψει πολλαπλές απόπειρες σύνδεσης του ίδιου χρήστη.<br>
				Για λόγους ασφαλείας ο λογαριασμός σας έχει μπλοκαριστεί.<br>
				Παρακαλώ επικοινωνήστε με τον προμηθευτή σας.</a></h3>
				<br>
					<h2><a href='login_user.php'  style='color:#fff'>Προσπαθείστε ξανά</a></h2>
				";
				}
				else {
				echo "<h3 style='color:#fff'>Ο χρηστης έχει απομπλοκαριστεί. <br>
				<a href='login_user.php'  style='color:#fff'>Πραγματοποιήστε ξανά είσοδο</a></h3>";
				}
				//echo $sql;
				
				}

}

public function update_demo_user(){


				
				$myFile = "registration_logs/users_updated.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')." Ο χρήστης με username : ".$this->username."\n  
						Αιτήθηκε αναβάθμιση σε συνδρομητή για ".$this->membership." ημέρες.
						";
						fwrite($fh, $stringData);
											
						fclose($fh);
				echo $stringData;
				
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
					
				$sql="UPDATE `helpdesk`.`users` SET `allowupdate`=0 WHERE `id`=".$this->user_id."";
				mysql_query($sql, $con);
				}
header("Location:http://aniphelpdesk.com/logout.php");


}

public function unlock_ips_user(){
	
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
	
	$sql_ip="SELECT * FROM  `helpdesk`.`login_ips` 
					WHERE `user_id`=".$this->user_id."
					ORDER BY `ip`
					  LIMIT 3";
					
						$result2=mysql_query($sql_ip, $con);
						$ips[]=array("", "", "");
						$ids[]=array();
						$count=0;
							while ($row2 = mysql_fetch_array($result2)) {
							
							$count+=1;
							$ids[$count]=$row2["id"];
							$ips[$count]=$row2["ip"];
							$ip=$row2["ip"];
							
							
							
						
						
							$string1= explode(".", $ips[1]);
							$string2= explode(".", $ips[2]);
							$string3= explode(".", $ips[3]);
							
							
							
							
							if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1] && $string2[1]==$string3[1]  &&
							$string1[2]==$string2[2] && $string2[2]==$string3[2] 
							){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
						
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
							
							
							}
							$final=mysql_query($sql_ip, $con);
							$rowsfetched=mysql_num_rows($final);
							$this->last_check_ips=$rowsfetched;
							//echo $this->last_check_ips;
				  }
}

public function get_left_logins(){
	
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
				
				
					 $sql="SELECT * FROM `helpdesk`.`login_ips` WHERE `user_id`=".$this->user_id."";
						// echo $sql;  
						$result=mysql_query($sql, $con);
						$rowsfetched=mysql_num_rows($result);
						$remaining=3-$rowsfetched;
						
						if ($remaining==2){
						//echo "<font style='font-size:0.8em; color:green'>Διαθέσιμες ip : ".$remaining."</font>";
						
						//echo "<p style='font-size:0.8em; color:green; margin-right:5px;margin-left:5px; margin-top:-15px; text-align:center;'>Έχετε συνδεθεί ήδη από μία ip, σας απομένουν ".$remaining."</p>";
						
						echo "Έχετε συνδεθεί ήδη από μία ip, σας απομένουν ".$remaining." ";
						
						}
					    else if ($remaining==1){
						//echo "<font style='font-size:0.8em; color:orange'>Διαθέσιμες ip : ".$remaining."</font>";
						//echo "<p style='font-size:0.8em; color:orange; margin-right:5px;margin-left:5px; margin-top:-15px; text-align:center;'>Έχετε συνδεθεί ήδη από δύο ip, σας απομένουν ".$remaining."</p>";
						echo "Έχετε συνδεθεί ήδη από δύο ip, σας απομένει ".$remaining." ";
						
						}
						else if ($remaining==0){
						//echo "<font style='font-size:0.8em; color:red'>Διαθέσιμες ip : ".$remaining."</font>";
						//echo "<p style='font-size:0.8em; color:red; margin-right:5px;margin-left:5px; margin-top:-15px; text-align:center;'>Έχετε συνδεθεί ήδη από τρεις ip, σας απομένουν ".$remaining."</p>";
						echo "Έχετε συνδεθεί ήδη από τρεις ip, σας απομένουν ".$remaining." ";
						
						}
				  }
	
}

public function change_password(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->dbpassword);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("helpdesk", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`users`
						WHERE `username`='".$this->username."' and
						`active`=1";
					 
						$result=mysql_query($sql, $con);
						
						$num_rows = mysql_num_rows($result);
						
						if ($num_rows==1){
							while ($row = mysql_fetch_array($result)) {
							$id=$row["id"];
						}
							$this->password=md5($this->password);
							$sql="UPDATE `helpdesk`.`users` SET `password`='".$this->password."'
						WHERE `id`=".$id."";
						//echo $sql;
						mysql_query($sql, $con);
						echo "<h2>Ο κωδικός σας έχει αλλάξει <br>
						<a href='login_user.php' style='color:#fff;'>Πραγματοποιείστε είσοδο στο σύστημα.</a></h2>";
						}
						else {
							
							echo"<h2>Το όνομα χρήστη που εισάγατε δεν είναι έγκυρο. <br>
						<a href='change_password.php' style='color:#fff;'>Δοκιμάστε ξανά.</a>";
						}
						
				  }
}

}

?>