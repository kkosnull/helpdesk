<?php 
session_start();

$id=$_SESSION['user_id'];
$username= $_SESSION['username'];


$con = mysql_connect("db34.grserver.gr", "ironman", "xrt966@@");
if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("helpdesk", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					$sql_logged="UPDATE `helpdesk`.`users` SET `islogged`=0 WHERE `id`=$id ";
					mysql_query($sql_logged, $con);
					//echo $sql_logged;
					
					
					session_destroy(); 
					
					
					
					$myFile = "logs/logoffs.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					$stringData = "".date('l jS \of F Y h:i:s A')." User ".$username." logged off from ".$_SERVER['REMOTE_ADDR']."\n ";
					fwrite($fh, $stringData);
					
					fclose($fh);
					
					}
$file = "logged_users/".$username.".txt";
unlink($file);
header("location:http://aniphelpdesk.com");
?>