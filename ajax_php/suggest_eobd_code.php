<?php
// Fill up array with names


//get the q parameter from URL

$code=$_GET["code"];
//lookup all hints from array if length of q>0
if (strlen($code) > 0)
  {
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
					
						$sql="SELECT* FROM `helpdesk`.`eobd`
						WHERE `code` like '".$code."%'";
						 //echo $sql;
						$result=mysql_query($sql, $con);
						$hint="";
							while ($row = mysql_fetch_array($result)) {
								$hint= $hint.$row['code'].", " ;
								
							}
							
					
				  }
  }

echo $hint;
?>