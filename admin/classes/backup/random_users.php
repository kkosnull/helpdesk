<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$db="auto";
$user="wolverine";
$password="monkey123";					
							

$con = mysql_connect("db16-2.grserver.gr", $user, $password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
			for ($i=1; $i<=1; $i++){	
			$username=generateRandomString(6);
			$password=generateRandomString(6);	
				$sql="INSERT INTO `auto`.`users`  (`username`, `password`, `datecreate`,  `active`, `admin`)
VALUES 
('".$username."', '".$password."',  CURDATE(),  1, 0)";

				mysql_query($sql, $con);
				
				//echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				
				echo $username;
				echo "-----";
				echo $password;
				echo "<br>";
			}
				}
function generateRandomString($length=10) {
    $original_string = array_merge(range(0,9), range('a','z'), range('A', 'Z'));
    $original_string = implode("", $original_string);
    return substr(str_shuffle($original_string), 0, $length);
}
//echo generateRandomString(6);

?>
</body>
</html>