<?php
session_start();
include 'connection/credentials.php';


//get the q parameter from URL
$q=$_GET["q"];

//lookup all hints from array if length of q>0
if (strlen($q) > 0)
  {
 //echo $q;
$con = mysql_connect("db34.grserver.gr", $user, $password);
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
  if (isset($_SESSION["admin"]) && $_SESSION["admin"]==1){
  
  
$url=array(""=>"");

$codes=$q;
$codes=explode(",",$codes);
foreach ($codes as &$value) {
//$left_value="http://wiki.ross-tech.com/wiki/index.php/".ltrim($value);

if (strpos($value,'/') !== false) {
$left_value="codes/code__".ltrim(str_replace("/","_",$value)).".html";

}
else {
$left_value="codes/code".ltrim(str_replace("/","_",$value)).".html";
}
//echo $left_value;
//$url=array($left_value=>$value)
$url=array_merge($url, array($left_value=>$value));
}


foreach($url as $x => $x_value) {
	//echo $x;
$site = file_get_contents($x);
//$site=explode($x_value,$site);
$site=explode("Fault Codes",$site);
//print_r($site);

foreach ($site as &$text) {



if (strpos($text,'Possible Symptoms') !== false) {

$result=explode('From Ross-Tech Wiki', $text);
$final=explode('Retrieved from', $result[1]);
echo"<style>
li {list-style-type: none;}
.toc, .NOBORDER{
display:none;
}
#access, #jump-to-nav, h1{
display:none;
}
</style>";
$response="<div style='font-size:0.5em;padding: 10px;
    overflow-y: auto; line-height:1.35em;'>".$final[0]."</div>";
}


}

}



 
  }
  else if (isset($_SESSION["admin"]) && $_SESSION["admin"]==0){
  
  $response="Δεν υπάρχει καταχώρηση.<br>";
  
  }
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>