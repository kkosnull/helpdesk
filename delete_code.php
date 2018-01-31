<?php
include 'connection/credentials.php';


//get the q parameter from URL
if (isset($_GET["id"])){
$id=$_GET["id"];
}
if (isset($_GET["type"])){
$type=$_GET["type"];
}
//lookup all hints from array if length of q>0

 //echo $q;
$con = mysql_connect("db34.grserver.gr", $user, $password);
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
					
					if($type==1){
						$sql="DELETE FROM `helpdesk`.`eobd`
						WHERE `id` = ".$id."";
					echo $sql;
					
					//mysql_query($sql, $con);
					
					$sql="SELECT* FROM `helpdesk`.`eobd` ORDER BY `code` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό eobd' id='box_eobd' type='text' />";
						
						
						
						echo"<ul class='navList_eobd' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['code']."</font>
							<form action='#' method='post'>
							<input type='text' style='width:80%; float:left;  border:0px solid; cursor:pointer;' 
							value='".$row['code']."-->".$row['description']."' readonly  onclick='show_update_eobd_code()'>
							";
							
							echo "<input type='hidden' value='".$row['id']."' name='eobd_id'>";
	
	
						
	
	
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form><image src='images/no_defect_icon.png' style='cursor:pointer' onclick='delete_eobd_code(".$row['id'].", 1)' ></li>";
					}	

	echo "</ul>";
						}	
					
					
					if($type==2){
						$sql="DELETE FROM `helpdesk`.`codes_manufacturers`
						WHERE `id` = ".$id."";
					echo $sql;
					
					//mysql_query($sql, $con);
					
					$sql="SELECT* FROM `helpdesk`.`eobd` ORDER BY `code` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό eobd' id='box_eobd' type='text' />";
						
						
						
						echo"<ul class='navList_eobd' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['code']."</font>
							<form action='#' method='post'>
							<input type='text' style='width:80%; float:left;  border:0px solid; cursor:pointer;' 
							value='".$row['code']."-->".$row['description']."' readonly  onclick='show_update_eobd_code()'>
							";
							
							echo "<input type='hidden' value='".$row['id']."' name='eobd_id'>";
	
	
						
	
	
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form><image src='images/no_defect_icon.png' style='cursor:pointer' onclick='delete_eobd_code(".$row['id'].", 1)' ></li>";
					}	

	echo "</ul>";
						}
						
				  }


// Set output to "no suggestion" if no hint were found
// or to the correct values

?>