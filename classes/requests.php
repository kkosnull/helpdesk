<?php
class requests {

private $user;
private $password;
private $db;


private	$phone;
private	$userinfo;
private $language;
private $hidden;

// accessors

public function get_hidden() {
	
		echo $this->hidden;
}

public function get_lang() {
	
		return $this->language;
}
public function get_userinfo() {
		return $this->userinfo;
}
// mutators


public function set_phone($phone) {
		$this->phone = $phone;
}
public function set_userinfo($userinfo) {
		$this->userinfo = $userinfo;
}
public function set_lang($language) {
		$this->language = $language;
}


public function set_files($filenames) {
		$this->filenames = $filenames;
}


	
public function setdb($db) {
		$this->db = $db;
		
	}
	
	

public function setPassword($password) {
		$this->password = $password;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}
	
	
	public function get_pending_requests(){

	$con = mysql_connect("db38.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT `id`, `name`, `number`, `active`, date_format(datecreate, '%m-%d-%Y, %H-%i-%s  ') as datecreate FROM `click2call`.`requests` 
						WHERE `active`=1 ORDER BY `datecreate` DESC";
						
						
						
						$result=mysql_query($sql, $con);
						
						while ($row = mysql_fetch_array($result)) {
							
							echo "<form style='padding:10px;'><input style='width:800px; cursor:pointer;' type='button' 
							value='".$row["name"].", ".$row["number"].", ".$row["datecreate"]."'
							onclick='replyto(".$row["id"].")' id='".$row["id"]."'></form>";
							
						}
					
				  }
	}		  
	public function get_requests(){

	$con = mysql_connect("db38.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT `id`, `name`, `number`, `active`, date_format(datecreate, '%m-%d-%Y, %H-%i-%s  ') as datecreate
						FROM `click2call`.`requests` ORDER BY `datecreate` DESC";
						
						
						
						$result=mysql_query($sql, $con);
						
						while ($row = mysql_fetch_array($result)) {
							if ($row["active"]==1){
								
								
								
							echo "<form style='padding:10px;'>
							<input style='width:800px; cursor:pointer;' type='button' 
							value='".$row["name"].", ".$row["number"].", ".$row["datecreate"]."'
							onclick='replyto(".$row["id"].")' id='".$row["id"]."'>
							</form>";
							}
							else {
								echo "<form style='padding:10px;'>
								<input style='width:800px; background-color:rgba(255, 0, 0, 0.7); color:#ccc; opacity:0.5;' type='button' 
							value='".$row["name"].", ".$row["number"].", ".$row["datecreate"]."'></form>";
							}
						}
					
				  }
	
}



public function get_requests_num(){

	$con = mysql_connect("db38.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `click2call`.`requests` WHERE `active` = 1";
						
						
						
						$result=mysql_query($sql, $con);
						
					$num_rows = mysql_num_rows($result);
					$_SESSION['requests_number']=$num_rows;
				  }
	
}


	public function set_request(){
	
	$con = mysql_connect("db38.grserver.gr", $this->user, $this->password);
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
					$date = date('Y-m-d H:i:s');
						 $sql="INSERT INTO `click2call`.`requests` 
						 (`name`, `number`, `active`, `datecreate`) 
						 VALUES 
						 ('".$this->userinfo."', '".$this->phone."', 1, now())";
						// echo $sql;
						mysql_query($sql, $con);
					
					if ($this->language=='gr'){
			echo "<h2>Το αίτημα εστάλη<br>
			Ένας τεχνικός άμεσα θα σας καλέσει στο τηλέφωνο.</h2>";
			
			}
			 else if ($this->language=='bul'){
				 echo "<h2>Заявлението е изпратено<br>
Един от нашите техници ще ви се обади директно на телефона.</h2>";
			
			}
			else if ($this->language=='uk'){
				echo "<h2>Your request has been sent.<br>
				Very soon you will be reached by one of our technicians in this phone number.</h2>";
			
			}
				  }
	
}
	
public function draw_captcha(){

$hidden="";
			$filename0="images";
			$filename1="img";
			$filename2=rand(1, 7);
			$extension="png";
			$filename=$filename0."/".$filename1."".$filename2.".".$extension;
			switch ($filename2) {
        case 1:
        $hidden="abdgv";
		$this->hidden=$hidden;
        break;
		case 2:
        $hidden="fkbnj";
		$this->hidden=$hidden;
        break;
		case 3:
        $hidden="ewsdf";
		$this->hidden=$hidden;
        break;
		case 4:
        $hidden="gfdgd";
		$this->hidden=$hidden;
        break;
		case 5:
        $hidden="thesis";
		$this->hidden=$hidden;
        break;
		case 6:
        $hidden="logos";
		$this->hidden=$hidden;
        break;
		case 7:
        $hidden="asvbn";
		$this->hidden=$hidden;
        break;
			}
echo "<img src='".$filename."' id='sec_code_img' >";

}	


// end of class
}


?>