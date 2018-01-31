<?php
$q=$_GET["q"];
include 'connection/credentials.php';

$con = mysql_connect("db34.grserver.gr", $user, $password);
//$con = mysql_connect("db34.grserver.gr", "ironman", "xrt966@@");
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
					
						$sql="SELECT * FROM `helpdesk`.`models` WHERE `brand_id`= '".$q."' ORDER BY `model` ASC";
						
						$result=mysql_query($sql, $con);
						//echo "<select name='modelid_visitor' id='modelid_visitor'>";
								echo "<option value=''>ΚΩΔ. ΚΙΝΗΤΗΡΑ</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['model'] . "--".$row['engine_serial']."</option>";
							}
							//echo "</select>";
					
				  }
				  
				  

mysql_close($con);
?>