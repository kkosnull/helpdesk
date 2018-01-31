<?php
// Fill up array with names


//get the q parameter from URL
if (isset($_GET["user_id"])){
$user_id=$_GET["user_id"];

}
if (isset($_GET["type"])){
$type=$_GET["type"];

}

//lookup all hints from array if length of q>0

 //echo $q;
 $con = mysql_connect("db31.grserver.gr", "wolverine", "xrt966@@");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("auto", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					if($type==0){
						
					$sql="UPDATE `auto`.`users` SET `chat`=0  WHERE `id`=".$user_id."";
					}
					if($type==1){
						
					$sql="UPDATE `auto`.`users` SET `chat`=1  WHERE `id`=".$user_id."";
					}
					
					//echo $sql;
					mysql_query($sql, $con);
					
					$sql="SELECT * FROM `auto`.`users` WHERE `id`=".$user_id."";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
					echo"<ul class='navList_admin' style='text-align: justify'>";
	 
						while ($row = mysql_fetch_array($result)) {	
						echo" <li>
<h2>Username </h2><input class='hover' type='text' style='width:80%;' value='".$row['username']."'  >

<h2>Email    </h2><input class='hover' type='text' style='width:80%;' value=''  >
<h2>Ονομ/νυμο</h2><input class='hover' type='text' style='width:80%;' value='".$row['comp_name']."'  >
<h2 style='float:left'>Chat</h2>";
							if ($row['chat']==1){
							echo "<img src='images/yes.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 0)'>";
							}
							else {
							echo "<img src='images/no.png' style='cursor:pointer;' onclick='chat(".$row['id'].", 1)'>";
							}
							
						echo "<input type='hidden' value='".$row['id']."' name='admin_id'>
	";
echo " <br><INPUT TYPE='submit' value='ΜΕΤΑΒΟΛΗ'> ";
	
	
	
	echo "</li>";
						
					}	

	echo "</ul>";						
				  }


?>