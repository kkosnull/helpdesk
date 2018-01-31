<?php

if (isset($_GET["model_check"]) && isset($_GET["year_check"]) && isset($_GET["engine_code_check"])){
$model_check=$_GET["model_check"];
$year_check=$_GET["year_check"];
$engine_code_check=$_GET["engine_code_check"];
}


 //echo $q;
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
					
						$sql="SELECT* FROM `helpdesk`.`models`
						WHERE `model`='".$model_check."' AND `prod_year`='".$year_check."'  AND `engine_serial`='".$engine_code_check."'";
					// echo $sql;
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result);
								while ($row = mysql_fetch_array($result)) 
					
									{
									$model_id=$row["id"];
									}
						if ($num_rows >0)
						  {
						 
						 echo "ΥΠΑΡΧΕΙ ΚΑΤΑΧΩΡΗΣΗ"; 
						 echo "<br>";
						 echo " MODEL ID : ".$model_id;
						// echo "<input type='text' name='model_id_check' value='".$model_id."'>";
						
						  }
						else
						  {
						  echo "ΔΕΝ ΥΠΑΡΧΕΙ ΚΑΤΑΧΩΡΗΣΗ"; 
							}	
							
					
				  }


// Set output to "no suggestion" if no hint were found
// or to the correct values


//output the response
echo $response;
?>