<?php
class fetch_client {

private $user;
private $status;
private $password;
private $client_id;
private $db;
private $user_id;



public function setUser_id($user_id) {
		$this->user_id = $user_id;
		
	}

	

public function setdb($db) {
		$this->db = $db;
		
	}
	
	
public function setClient_id($client_id) {
		$this->client_id = $client_id;
		
	}



public function setPassword($password) {
		$this->password = $password;
		
	}

public function setUser($user) {
		$this->user = $user;
		
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


// useless function, just shows the status of the connection, 

public function getStatus() {

echo $this->status;


}	

function getAvailableModulesClient(){
	
$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);

$result = mysql_query("SELECT * FROM `emron_online`.`modules` mods 
INNER JOIN `emron_online`.`clients` clnt
ON mods.id=clnt.module_id
WHERE mods.id=clnt.module_id
AND clnt.id=$this->client_id");

while($row = mysql_fetch_array($result))
  {
	  
	 echo "<table bgcolor='#F7F7F7'><tr><td align='center'>";echo "<img src='".$row['icon']."'></td><td align='center'>"; 
	
	echo"<div>";
	echo"Επιλογές/Ρυθμίσεις";
	echo"<hr>";	
	 echo $row['code'];
	 echo "</div>";
	 echo "</td></tr></table>";
	 echo "<br>";

	
}
}


public function getField($field){
$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
					
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id");
while($row = mysql_fetch_array($result))
  {
  echo $row[$field]; 
}
mysql_close($con);
}





public function getClientFiles(){
$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
					
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT filename FROM `emron_online`.`files` WHERE client_id=$this->client_id AND download=1");

echo "<div id='shadow' class='shadow' style='width:600px'>";
echo "<table width='600'>";

echo "<tr><td></td><td  align='center'  bgcolor='#cccccc'><strong>Όνομα Αρχείου</strong></td><td  bgcolor='#cccccc' align='center'><strong>Ημερομηνία εγγραφής</strong></td><td  bgcolor='#cccccc' align='center'><strong>Κατέβασμα</strong></td></tr>";

while($row = mysql_fetch_array($result))
  {
	 
	echo "<form method='post' action='delete_upload.php'>";
	echo"<tr>";
	echo "<td width='5'>";  
	echo "<input type ='hidden' name='file_id' value='".$row['id']."'>";
	echo "</td>";
	
  echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";  
   echo $row['filename'];
     echo "</td>";
	 
	 echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";  
   echo $row['datecreate'];
     echo "</td>";
	 
	 echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";
	echo "<a href='files/";
  echo $row['filename'];
  echo "' target='_blank'>";
  echo "<img src='images/download.png'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>"; 
  echo "</a>";
  echo "</td>";
  
  
 
   echo"</tr>";
    echo "</form>";
  
  
 
 // echo "<br>";
  
}
 echo"</table>";
 echo "</div>";  

mysql_close($con);
}



public function getClientUploadedFiles(){
$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
					
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`files` WHERE client_id=$this->client_id AND upload=1");
echo "<div id='shadow' class='shadow' style='width:600px'>";
echo "<table width='600'>";

echo "<tr><td></td><td  align='center'  bgcolor='#cccccc'><strong>Όνομα Αρχείου</strong></td><td  bgcolor='#cccccc' align='center'><strong>Ημερομηνία εγγραφής</strong></td><td  bgcolor='#cccccc' align='center'><strong>Κατέβασμα</strong></td><td  bgcolor='#cccccc' align='center'><strong>Διαγραφή</strong></td></tr>";
while($row = mysql_fetch_array($result))
  {
	echo "<form method='post' action='delete_upload.php'>";
	echo"<tr>";
	echo "<td width='5'>";  
	echo "<input type ='hidden' name='file_id' value='".$row['id']."'>";
	echo "</td>";
	
  echo "<td  width='100' align='center' onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";  
   echo $row['filename'];
     echo "</td>";
	 
	 echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";  
   echo $row['datecreate'];
     echo "</td>";
	 
	 echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>";
	echo "<a href='client_files/";
  echo $row['filename'];
  echo "' target='_blank'>";
  echo "<img src='images/download.png' >"; 
  echo "</a>";
  echo "</td>";
  
  
  echo "<td  width='100' align='center'  onMouseOver=this.bgColor='#EEEEEE' onMouseOut=this.bgColor='' bgColor=''>"; 
  echo " <input type='image' name='myclicker' src='images/x_button.png'>"; 
   echo "</td>";
   echo"</tr>";
    echo "</form>";

 
 // echo "<br>";
  
}   echo"</table>";
   echo "</div>";
mysql_close($con);
}




public function sendClientFiles(){
$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
					
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT filename FROM `emron_online`.`files` WHERE id=$this->client_id");
while($row = mysql_fetch_array($result))
  {
	  if (!$row['filename']){
	  echo "Δεν υπάρχουν";
	  
  }
	  echo "<a href='www.emron.gr/web/online/files/'";
  echo $row['filename'];
  echo "</a>"; 
  echo "<br>";
  
}
mysql_close($con);
}



public function update_client_nopass($position, $client_url,$tk, $post, $supervisor, $username, $name, $legal_form, $activity, 
				 $taxid, $doy, $address, $area, $county, $email, $phone, $mobile, $fax){

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
	
$sql="UPDATE   `emron_online`.`clients` SET `supervisor`='".$supervisor."', `user_id`=$this->user_id, `username`='".$username."', `name`='".$name."',`legal_form`='".$legal_form."',`activity`='".$activity."',`taxid`='".$taxid."',`doy`='".$doy."',`address`='".$address."',`county`='".$county."',`email`='".$email."',`phone`=$phone,`mobile`=$mobile,`fax`=$fax,`position`='".$position."',`client_url`='".$client_url."',`tk`=$tk,`post`='".$post."'
WHERE id=$this->client_id";	



$sql_users="UPDATE   `emron_online`.`users` SET `username`='".$username."'
WHERE id=$this->client_id";	

echo $sql;				
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

mysql_query($sql, $con);

mysql_query($sql_users, $con);
 
 
mysql_close($con);

header( "Location: http://www.emron.gr/web/online/start.php" ) ;	
}





public function update_client($position, $client_url,$tk, $post, $supervisor, $username, $password, $name, $legal_form, $activity, 
				 $taxid, $doy, $address, $area, $county, $email, $phone, $mobile, $fax){

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
	
$sql="UPDATE   `emron_online`.`clients` SET `supervisor`='".$supervisor."', `user_id`=$this->user_id, `username`='".$username."',`password`='".$password."', `name`='".$name."',`legal_form`='".$legal_form."',`activity`='".$activity."',`taxid`='".$taxid."',`doy`='".$doy."',`address`='".$address."',`county`='".$county."',`email`='".$email."',`phone`=$phone,`mobile`=$mobile,`fax`=$fax,`position`='".$position."',`client_url`='".$client_url."',`tk`=$tk,`post`='".$post."'
WHERE id=$this->client_id";	



$sql_users="UPDATE   `emron_online`.`users` SET  `username`='".$username."', `password`='".$password."'
WHERE id=$this->client_id";	


echo $sql;				
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

mysql_query($sql, $con);

mysql_query($sql_users, $con);
 

 
mysql_close($con);

//header( "Location: http://www.emron.gr/web/online/start.php" ) ;	
}

public function getClient() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);
					
//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id");
while($row = mysql_fetch_array($result))
  {
  
 echo "<table width='60%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td >Επωνυμία : </td>
    <td ><strong>"; echo $row['name']; echo"</strong></td>
    <td rowspan='2' >Δ/νση :</td>
    <td rowspan='2' ><strong>"; echo $row['address']; echo "</strong></td>
  </tr>
  <tr>
    <td >Κωδικός πελάτη :</td>
    <td ><strong>"; echo $row['client_code']; echo "</strong></td>
  </tr>
  <tr>
    <td>Όνομα υπευθύνου (στην εταιρία) : </td>
    <td><strong>"; echo $row['position']; echo"</strong></td>
    <td>Περιοχή :</td>
    <td><strong>"; echo $row['area']; echo"</strong></td>
  </tr>
  <tr>
    <td>Νομική μορφή : </td>
    <td><strong>"; echo $row['legal_form']; echo "</strong></td>
    <td>Νομός :</td>
    <td><strong>"; echo $row['county']; echo "</strong></td>
  </tr>
  <tr>
    <td>Δραστηριότητα :</td>
    <td><strong>"; echo $row['activity']; echo "</strong></td>
    <td>Email :</td>
    <td><strong>"; echo $row['email']; echo "</strong></td>
  </tr>
  <tr>
    <td>Α.Φ.Μ : </td>
    <td><strong>"; echo $row['taxid']; echo "</strong></td>
    <td>Σταθερό τηλ. :</td>
    <td><strong>"; echo $row['phone']; echo "</strong></td>
  </tr>
  <tr>
    <td>ΔΟΥ :</td>
    <td><strong>"; echo $row['doy']; echo "</strong></td>
    <td>Κινητό τηλ. :</td>
    <td><strong>"; echo $row['mobile']; echo "</strong></td>
  </tr>
  <tr>
    <td>URL</td>
    <td><strong>"; echo $row['client_url']; echo "</strong></td>
    <td>FAX :</td>
    <td><strong>"; echo $row['fax']; echo "</strong></td>
  </tr>
  <tr>
    <td>T.K.</td>
    <td><strong>"; echo $row['tk']; echo "</strong></td>
    <td>Τ.Θ.</td>
    <td><strong>"; echo $row['post']; echo "</strong></td>
  </tr>
</table>";


}
mysql_close($con);

//echo $query;
}


public function getProject() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`projects` a inner join `emron_online`.`project_status` b
on a.id=b.project_id INNER JOIN `emron_online`.`project_overview` c
on a.id=c.project_id
 WHERE a.id=b.project_id
 and
 a.id=c.project_id
 and
 a.client_id=$this->client_id");
while($row = mysql_fetch_array($result))
  {
 echo"<a href='"; echo $row['page_url']; echo "' target='_blank'>"; 
 echo "<strong>";echo $row['page_url']; echo "</strong>"; echo "</a>";echo "<br>";
 echo "Πωλητής : "; echo "<strong>";echo $row['salesman']; echo "</strong>"; echo "<br>";
 echo "Τρέχουσα κατάσταση : "; echo "<strong>";echo $row['status']; echo "</strong>"; echo "<br>";
}
mysql_close($con);

//echo $query;
}


public function getProjects() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`projects` a inner join `emron_online`.`project_status` b
on a.id=b.project_id
 WHERE a.id=b.project_id
 and
 a.client_id=$this->client_id");
while($row = mysql_fetch_array($result))
  {
 echo "<a href='delete_this_program.php?id=$this->client_id'>Διαγραφή ("; 
 echo "<strong>";echo $row['project_type']; echo "</strong>"; echo "&nbsp;";
 echo "Πωλητής : "; echo "<strong>";echo $row['salesman']; echo "</strong>"; echo "&nbsp;";
 echo "Τρέχουσα κατάσταση : "; echo "<strong>";echo $row['status']; echo "</strong>"; echo "&nbsp;";
 echo "΄)</a>";
 
}
mysql_close($con);

//echo $query;
}


public function getProject_overview() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";
 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);


$result = mysql_query("SELECT * FROM `emron_online`.`project_overview` a inner join `emron_online`.`projects` b
on a.project_id= b.id  
WHERE b.client_id=$this->client_id");

while($row = mysql_fetch_array($result))
  {
  
 
echo $row['page_url'];

}
mysql_close($con);

//echo $query;
}




public function getProject_comments() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

$result = mysql_query("SELECT * FROM `emron_online`.`project_overview` a inner join `emron_online`.`projects` b
on a.project_id= b.id  
WHERE b.client_id=$this->client_id");


while($row = mysql_fetch_array($result))
  {
  
echo $row['overview']; 


}
mysql_close($con);

//echo $query;
}


public function getProject_files() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);


$result = mysql_query("SELECT * FROM `emron_online`.`files`
WHERE client_id=$this->client_id");

while($row = mysql_fetch_array($result))
  {
  
 echo "<strong>";echo $row['filename']; echo "</strong>";


}
mysql_close($con);

//echo $query;
}

public function getSalesman() {

$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($this->db, $con);

//$query="SELECT * FROM `emron_online`.`clients` WHERE id=$this->client_id";

 $sql = "SET NAMES 'utf8'";
mysql_query($sql, $con);


$result = mysql_query("SELECT * FROM `emron_online`.`project_status`
WHERE client_id=$this->client_id");

while($row = mysql_fetch_array($result))
  {
  
echo $row['salesman'];


}
mysql_close($con);

//echo $query;
}



}


?>
