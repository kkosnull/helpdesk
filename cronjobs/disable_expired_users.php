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

					$currdate=date("Y-m-d");
					$sql="SELECT * FROM `helpdesk`.`users` WHERE `active`=1 AND `accounttype`=='subscriber'";
					
					$result=mysql_query($sql);	
					while($row = mysql_fetch_array($result)){
						$id=$row["id"];
						$username=$row["username"];
						$dateend=$row["dateend"];

						$sql="UPDATE `helpdesk`.`users` SET `active`=0 WHERE `id`=".$id." ";
						if ($currdate>=$dateend){
						mysql_query($sql, $con);
						
						$myFile = "../registration_logs/users_disabled.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."  Disabled user : \nUsername : ".$username." DUE TO EXPIRATION DATE\n";
						fwrite($fh, $stringData);
											
						fclose($fh);	
						}
						
					}
					
					
				}				

?>

