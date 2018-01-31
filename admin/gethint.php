<?php
// Fill up array with names


//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
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
						WHERE `code`='".$q."'";
						////  echo $sql;
						$result=mysql_query($sql, $con);
						
							while ($row = mysql_fetch_array($result)) {
								$hint= $row['description'] ;
							}
							
					
				  }
  }

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint == "")
  {
  $response="Δεν υπάρχει καταχώρηση.<br>";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>