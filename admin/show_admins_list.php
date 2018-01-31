<?php
// Fill up array with names


//get the q parameter from URL
if (isset($_GET["type"])){
$type=$_GET["type"];

}


//lookup all hints from array if length of q>0

 //echo $q;
 $con = mysql_connect("db34.grserver.gr", "ironman", "xrt966@@");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
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
						WHERE `admin`=1
						AND `active`=".$type."";
				
					
					
					$result=mysql_query($sql, $con);
						
			
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

				  
							
				  }


?>