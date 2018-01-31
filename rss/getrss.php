<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../css/style.css" />
<style type="text/css">

body {
	background-image: url('http://zeromod.eu/auto_new2/images/carbon_rss.png')
}

</style></head>

<body>
<div class="logo" style="margin-left:0px; ');"></div>
<div style="margin-top:50px;" >
<?php
$xml=simplexml_load_file("test2.xml");
//print_r($xml);
?>  
<?php 
$counter=0;
foreach ($xml as $value) {
$counter+=1;
$img_counter=0;
 echo "<h2>".$counter."</h2>";
 
foreach ($value as $item) {
$img_counter+=1;
//echo $img_counter;
if ($img_counter==3 && $counter==3){
 echo "<img src='".$item."' width='100' height='auto'>";
}

				echo $item;
				echo "<br>";
						}
 
  
}

?>
</div>
</body>
</html>
