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
					
					$sql="SELECT * FROM `helpdesk`.`users` WHERE `active`=1 AND `accounttype`='demo'";
					$result=mysql_query($sql);	
					while($row = mysql_fetch_array($result)){
						$id=$row["id"];
						
						$dateend=$row["dateend"];

						//$sql="DELETE FROM `helpdesk`.`users`  WHERE `id`=".$id." ";
						$sql="UPDATE `helpdesk`.`users` SET `active`=0 WHERE `id`=".$id." ";
						if ($currdate>=$dateend){
						mysql_query($sql, $con);
						//echo $sql;
						//echo "<br>";
						}
						
					}
					
					
				}				

?>

