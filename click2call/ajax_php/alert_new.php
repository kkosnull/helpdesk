<?php
if(!($_SESSION)) {
    session_start();
}

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
					
					$sql="SELECT * FROM `click2call`.`requests` WHERE `active` = 1";
						
						
						$result=mysql_query($sql, $con);
						
					$num_rows = mysql_num_rows($result);
					
					if ($_SESSION['requests_number']<$num_rows){
						echo"Newrequest";
						
						
					}
						
				  }
						
			
					
				  
  

?>