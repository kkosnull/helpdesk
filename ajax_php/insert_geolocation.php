<?php
session_start();

$user_id=$_GET["user_id"];
$username=$_GET["username"];
$latitude=$_GET["latitude"];
$longitude=$_GET["longitude"];
$coordinates=$latitude.", ".$longitude;

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
					
						$sql="INSERT INTO  `helpdesk`.`geolocation`
						(`username`, `user_id`, `coordinates`, `date_login`)
						VALUES						
						('".$username."', ".$user_id.",'".$coordinates."', NOW())";
						////  echo $sql;
						if ($_SESSION['admin']==0){
						mysql_query($sql, $con);
						}
							
							
					
				  }

?>