<?php
if(!$nickname){
echo"<style type=\"text/css\">BODY{font-family:Verdana, Arial, Helvetica, sans-serif}</style>
<form name=\"form1\" method=\"post\" action=\"index.php\">
  Enter your nickname : 
  <input name=\"nickname\" type=\"text\" id=\"nickname\">
  <input type=\"submit\" value=\"   Login   \">
</form>
</body>
</html>";
}
else{
setcookie("nick",$_POST['nickname'],"","/","");
$fileOpen=@fopen("messages.txt", "a");
@fwrite($fileOpen,"<font color=\"#0000ff\">".$_POST['nickname']." enters chat room [".date("H:i:s A")."]</font><br>");
fclose($fileOpen);
header("Location:chat.htm");
}
?>