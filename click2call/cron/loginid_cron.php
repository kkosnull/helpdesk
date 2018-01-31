<?php


$length = 10;

$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

//echo $randomString;



$con = mysql_connect("db38.grserver.gr", "acheron", "dignusestentrare@@01");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("click2call", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					  
					//$sql="SELECT * FROM `click2call`.`admin_url` ";
						$sql="UPDATE `click2call`.`admin_url` SET `loginid`='".$randomString."' WHERE `id`=1";
						//echo $sql;
						mysql_query($sql, $con);
						
						
				  }
						$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: info@anip.gr \r\n";
						$from = "aniphelpdesk - νέο url για click2call admin"; // sender
						$subject = "click2call admin url has changed.";
						
						$message = "http://aniphelpdesk.com/click2call/admin.php?loginid=".$randomString;
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("reception@anip.com.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
					
				 // echo "<h1>".$randomString."</h1>";
  unset($randomString);

?>