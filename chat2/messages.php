<meta http-equiv="refresh" content="0">
<?php
$fileName="messages.txt";

$fileOpen=@fopen($fileName,"r");
if(filesize($fileName)>700){
fclose($fileOpen);
unlink($fileName);
$fileOpen=@fopen($fileName,"w");
}
$fileRead=fread($fileOpen,filesize($fileName));
echo "<style type=\"text/css\">BODY{font-family:Verdana, Arial, Helvetica, sans-serif}</style>".$fileRead;
fclose($fileOpen);
?>