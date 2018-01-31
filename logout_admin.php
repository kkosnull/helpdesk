<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/style.css" />
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700&subset=latin,greek-ext' rel='stylesheet' type='text/css'>
<style type="text/css">

body {
	background-image: url('http://aniphelpdesk.com/images/carbon_rss.png');
	font-family: 'Ubuntu Mono';
}

</style></head>

<body>
<div class="logo" style="margin-left:0px; ');"></div>
<div style="margin-top:50px; text-align:center;" >
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
echo "<h1>Έχετε βγει από τη διαχείριση.</h1>";
echo "<img src='images/oil_lamp.png'>";

?>
</div>
</body>
</html>


