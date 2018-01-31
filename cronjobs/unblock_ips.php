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
					
					
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					//$sql="UPDATE `helpdesk`.`users` SET `islogged`=0 ";
					$sql="select `username`, a.`user_id`, `ip` from `login_ips` a inner join `users` b
							on a.`user_id`=b.`id`
							where a.`user_id`=b.`id`
							group by a.`user_id`
							having count(`user_id`)>3";
					$result=mysql_query($sql, $con);
					
					
					
						
					while ($row = mysql_fetch_array($result)) {
					
					$user_id=$row["user_id"];
					$username=$row["username"];
					
					$sql_ip="SELECT * FROM  `helpdesk`.`login_ips` 
					WHERE `user_id`=".$user_id."
					ORDER BY `ip`
					  LIMIT 3";
					//echo  $sql_ip;
						$result2=mysql_query($sql_ip, $con);
						$ips[]=array("", "", "");
						$ids[]=array();
						$count=0;
						echo $user_id."<br>";
							while ($row2 = mysql_fetch_array($result2)) {
							
							$count+=1;
							$ids[$count]=$row2["id"];
							$ips[$count]=$row2["ip"];
							//$ip=$row2["ip"];
							//echo $count."....";
							//echo $ips[$count];
							echo "<br>";
							
							
						
						
							$string1= explode(".", $ips[1]);
							$string2= explode(".", $ips[2]);
							$string3= explode(".", $ips[3]);
							}
							
							if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1] && $string2[1]==$string3[1] ){
								echo "<font style='color:red'>partial match 1 ";  echo "</font>";
								echo "<br>";
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							echo  $sql1;
							echo "<br>";
							echo  $sql2;
							echo "<br>";
							echo  $sql3;
							echo "<br>";
							echo "<hr>";
								mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
							else if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1]  ){
								echo "<font style='color:red'>partial match 2 ";  echo "</font>";
								echo "<br>";
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							echo  $sql1;
							echo "<br>";
							echo  $sql2;
							echo "<br>";
							echo  $sql3;
							echo "<br>";
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							echo "<hr>";
							}
								else if ( $string2[0]==$string3[0] && $string2[1]==$string3[1] ){
								echo "<font style='color:red'>partial match 3 ";  echo "</font>";
								echo "<br>";
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							echo  $sql1;
							echo "<br>";
							echo  $sql2;
							echo "<br>";
							echo  $sql3;
							echo "<br>";
							echo "<hr>";
								mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							mysql_query($sql3, $con);
							
							}
							
							// }
							
					}
					
				
				}
					

?>

