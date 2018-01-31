<?php

if (isset($_GET["id"])){
$id=$_GET["id"];


 $con = mysql_connect("db34.grserver.gr", "ironman", "xrt966@@");
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
					
						$sql="select * from  `helpdesk`.`blink_codes` where `id`=".$id."";
			
						 //echo $sql;
						$result=mysql_query($sql, $con);
						
							while ($row = mysql_fetch_array($result)) {
								
								//echo $row["description"]."<br>";
								//$blink_code= file_get_contents("http://localhost/helpdesk/blink_codes/".$row["description"].".htm");
								echo "
								<iframe src='blink_codes/".$row["description"].".htm' frameborder='0' width='100%'
								height='100%' >
								</iframe>
								
								";
								
							}
							
					
				  }
  }


?>