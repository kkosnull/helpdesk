<?php
$id=$_GET["id"];
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
					
					$sql="UPDATE `click2call`.`requests` SET `active`=0 WHERE `id`=".$id."";
					mysql_query($sql, $con);
					
					//echo $sql;
						$sql="SELECT `id`, `name`, `number`, `active`, date_format(datecreate, '%m-%d-%Y, %H-%i-%s  ') as datecreate
						FROM `click2call`.`requests` ORDER BY `datecreate` DESC";
						
						
						
						$result=mysql_query($sql, $con);
						
						while ($row = mysql_fetch_array($result)) {
							if ($row["active"]==1){
							echo "<form style='padding:10px;'>
							<input style='width:800px; cursor:pointer;' type='button' 
							value='".$row["name"].", ".$row["number"].", ".$row["datecreate"]."'
							onclick='replyto(".$row["id"].")' id='".$row["id"]."'>
							</form>";
							}
							else {
								echo "<form style='padding:10px;'>
								<input style='width:800px; background-color:rgba(51, 255, 0, 0.7); color:#fff; opacity:0.5;' type='button' 
							value='".$row["name"].", ".$row["number"].", ".$row["datecreate"]."'></form>";
							}
						}
					
				  }
  

?>