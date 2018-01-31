<?php

session_start();
if (isset($_SESSION['id_registered_user'])){
$user_id=$_SESSION['id_registered_user'];
$email=$_SESSION['email_registered'];
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
					$sql="UPDATE `auto`.`users` SET `active`=1 WHERE `id`=".$user_id." ";
					mysql_query($sql, $con);
				}
echo "<h1>Η εγγραφή σας έχει ολοκληρωθεί με επιτυχία.</h1>";

$from = "support@aniphelpdesk.com"; // sender
						  $subject = "Εγγραφή trial για 3 ημέρες";
						  $message = "username : ".$username."password : ".$password."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						  $message = wordwrap($message, 70);
						  // send mail
						  mail($email,$subject,$message,"From: $from\n");
						  
}




?>