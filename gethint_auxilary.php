
<?php
session_start();
include 'connection/credentials.php';


//get the q parameter from URL
$q=$_GET["q"];
$q=strtoupper($q);
 
  
$dir = "codes";
$dh  = opendir($dir);
$correct_file="";
while (false !== ($filename = readdir($dh))) {
    
	if (strpos($filename, $q) !== false) {
		
		//echo $filename;
		//echo "<br>";
		//echo strtoupper($filename);
		//$filename=strtoupper($filename);
     $correct_file="codes/".$filename;
}
}
//echo $correct_file;
$site = file_get_contents($correct_file);
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
$response="<div style='font-size:0.7em;padding: 10px;
    overflow-y: auto; line-height:1.35em;'>".utf8_encode($final[0])."</div>";
}
if (strpos($text,'Possible Causes') !== false) {

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
$response="<div style='font-size:0.7em;padding: 10px;
    overflow-y: auto; line-height:1.35em;'>".utf8_encode($final[0])."</div>";
}

}

if ($response==""){
	$response="Η βοηθητική αναζήτηση δεν έφερε αποτελέσματα.";
	
}
  
 
  
  

echo $response;
?>