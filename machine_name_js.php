<BODY>
<Script Type = "text/JavaScript">
try
{
var ax = new ActiveXObject("WScript.Network");
document.write('User: ' + ax.UserName + '<br />');
document.write('Computer: ' + ax.ComputerName + '<br />');
}
catch (e)
{
document.write('Permission to access computer name is denied' + '<br />');
}
</Script>

<?php
echo gethostname(); // may output e.g,: sandie
// Or, an option that also works before PHP 5.3
//echo php_uname(); // may output e.g,: sandie

echo $_SERVER['REMOTE_HOST'];

?>


</Body>