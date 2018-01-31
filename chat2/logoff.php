<?php
$fileOpen=@fopen("messages.txt", "a");
@fwrite($fileOpen,"<font color=\"#ff00ff\">".$_COOKIE['nick']." leaves chat room [".date("H:i:s A")."]</font><br>");
fclose($fileOpen);
echo "<style type=\"text/css\">BODY{font-family:Verdana, Arial, Helvetica, sans-serif}</style><a href=\"index.php\" target=\"_top\">Login Again!</a>";
?>