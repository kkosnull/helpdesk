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
					$sql="select `username`, a.`user_id`, `ip` from `login_ips` a inner join `users` b
							on a.`user_id`=b.`id`
							where a.`user_id`=b.`id`
							group by a.`user_id`
							having count(`user_id`)>3";
					$result=mysql_query($sql, $con);
					
					
					$myFile = "textfiles/users_blocked.txt";
							$fh = fopen($myFile, 'a') or die("can't open file");
							$stringData = "\n".date('l jS \of F Y h:i:s A')."----------------------------start-----------------------------------";
							fwrite($fh, $stringData);
												
							fclose($fh);	
						
					while ($row = mysql_fetch_array($result)) {
					
					$user_id=$row["user_id"];
					$username=$row["username"];
					
					$sql_ip="SELECT * FROM  `helpdesk`.`login_ips` WHERE `user_id`=".$user_id."
					LIMIT 3";
					//echo  $sql_ip;
						$result2=mysql_query($sql_ip, $con);
							while ($row2 = mysql_fetch_array($result2)) {
							
							//$username=$row2[""];
							$ip=$row2["ip"];
							
							
							$myFile = "textfiles/users_blocked.txt";
							$fh = fopen($myFile, 'a') or die("can't open file");
							$stringData = "\n".date('l jS \of F Y h:i:s A')."--------------->>>  Username :".$username.", ip : ".$ip." ";
							fwrite($fh, $stringData);
												
							fclose($fh);	
							
							$sql="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$row2["id"]."";
							//echo  $sql;
							//mysql_query($sql, $con);
							}
						
					}
					$myFile = "textfiles/users_blocked.txt";
							$fh = fopen($myFile, 'a') or die("can't open file");
							$stringData = "\n".date('l jS \of F Y h:i:s A')."----------------------------end-----------------------------------\n\n";
							fwrite($fh, $stringData);
												
							fclose($fh);	
				}
			echo "sdfds";		

?>

