<?php

if (isset($_GET["user"])){
$name=$_GET["user"];
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
					
						$sql="SELECT* FROM `helpdesk`.`users_active`
						WHERE `username`='".$name."'";
					// echo $sql;
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result);
						if ($num_rows >0)
						  {
						  echo "Ο χρήστης επιβεβαιώθηκε";
						  // FF0000
						  }
						else
						  {
						  echo "Ο χρήστης δεν είναι ενεργός.";
							}	
							
					
				  }


// Set output to "no suggestion" if no hint were found
// or to the correct values


//output the response
echo $response;
?>