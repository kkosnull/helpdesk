<?php
// Fill up array with names


//get the q parameter from URL
$id=$_GET["id"];
$value=$_GET["value"];
//lookup all hints from array if length of q>0

 //echo $q;
 $con = mysql_connect("db31.grserver.gr", "wolverine", "xrt966@@");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("auto", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="UPDATE `auto`.`models` SET `active`=".$value."
						WHERE `id`='".$id."'";
					//  echo $sql;
						mysql_query($sql, $con);
						
							if($value==1){echo "Ενεργοποιήθηκε";}
							else if($value==0){echo "Απενεργοποιήθηκε";}
					
				  }
 


?>