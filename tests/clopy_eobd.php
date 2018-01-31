<style>

.toc, .NOBORDER{
display:none;
}
#access, #jump-to-nav, h1{
display:none;
}
</style>
<form method="post" action="#">

<textarea rows="40" cols="50" name="codes">

</textarea>
<input type="submit" name="submit" value="Submit" style="
    position: absolute;
    float: left;
    margin-left: 2px;
    height: 600px;
    background-color: #6984BE;
    color: #fff;
">


</form>
<?php

if ($_POST["submit"]){
$url=array(""=>"");

$codes=$_POST["codes"];
$codes=explode(",",$codes);
foreach ($codes as &$value) {
$left_value="http://wiki.ross-tech.com/wiki/index.php/".ltrim($value);

//$url=array($left_value=>$value)
$url=array_merge($url, array($left_value=>$value));
}
print_r($url);
echo "<hr>";

foreach($url as $x => $x_value) {
$site = file_get_contents($x);
//$site=explode($x_value,$site);
$site=explode("Fault Codes",$site);
//print_r($site);

foreach ($site as &$text) {



if (strpos($text,'Possible Symptoms') !== false) {
echo "x_value ".$x_value."//x_value <br>";
$x_value=str_replace("/","_", $x_value);
echo "x_value ".$x_value."//x_value ";

echo "<br>";
echo "text ".$text." text end";
$filename="code".$x_value.".html";

echo "<h1>".$filename."</h1>";
//$filename = preg_replace('/\s+/', '', $filename);
$myfile = fopen("eobdcodes/".$filename, "w") or die("Unable to open file!");
$txt = $text;
fwrite($myfile, $txt);
fclose($myfile);
}


}

}

}





?>
