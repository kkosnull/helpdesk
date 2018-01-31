<?php
$exec = exec("hostname");
echo "hostname : ".$exec;
echo "<br>";
$command='cmd | ipconfig | find "IPv4"';
$localIP = exec ($command);
echo $localIP;
?>
<script>

var objShell = new ActiveXObject("shell.application");
objShell.ShellExecute("cmd.exe", "cd C: C:\\cd c:\\ext_file main.exe test.txt", "C:\\WINDOWS\\system32", "open", 1);
</script>
<script type="application/javascript">
    function getip(json){
   //   alert(json.ip); // alerts the ip address
    }
</script>

<script type="application/javascript" src="http://jsonip.appspot.com/?callback=getip"></script>
<body>

</body>