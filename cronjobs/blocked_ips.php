<?php 


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
					//$sql="UPDATE `helpdesk`.`users` SET `islogged`=0 ";
					$sql="select distinct `username` from `login_ips` a inner join `users` b
							on a.`user_id`=b.`id`
							where a.`user_id`=b.`id`
							having sum(`user_id`)>3
							order by a.user_id";
					$result=mysql_query($sql, $con);
					
					
					$rows=mysql_num_rows($result);
					
				if ($rows>3){					
					while ($row = mysql_fetch_array($result)) {
					
					$username=$row["username"];
					
					
					$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: apostolos@anip.gr \r\n";
						$from = "aniphelpdesk"; // sender
						$subject = "Blocked user";
						
						$message = date('l jS \of F Y h:i:s A')."User ".$username." is blocked - multiple ip violation\n";
						
						
						$message = wordwrap($message, 70);
						
						  // send mail
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("apostolos@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("tlefkaros@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
					
			
						
					}
				}	
				}
					

?>

