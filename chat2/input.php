<?php
if($txt!=""){
$fileOpen=@fopen("messages.txt", "a");
@fwrite($fileOpen,"<font color=\"#ff0000\"><b>".$_COOKIE['nick']." >> </b></font>".$_POST['txt']."<br>");
fclose($fileOpen);
}
echo "<style type=\"text/css\">BODY{font-family:Verdana, Arial, Helvetica, sans-serif}</style>
<form method=\"post\" action=\"input.php\">
          <input name=\"txt\" type=\"text\" size=\"50\" id=\"txt\">
          <input type=\"submit\" name=\"Submit\" value=\"   Chat!   \">
</form>        <a href=\"logoff.php\" target=\"_top\">Log Off</a>";
?>