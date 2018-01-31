<?php

   //header( 'Location: http://zeromod.eu/autosupport/start.php' ) ;

?>
<?php
session_start();
include 'classes/users.php';

include 'connection/credentials.php';

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);



?>

<html>
<head>
<meta charset="UTF-8">
</head>
<style>
@import "http://fonts.googleapis.com/css?family=Ubuntu";
body{
margin:0;
padding:0;
font-family:'Ubuntu',sans-serif';
 background-color: #1A1A1A;
}
#main{
width:450px;
height:620px;
margin:10px auto

}
#first{
width:400px;
height:610px;
box-shadow:0 0 0 1px rgba(14,41,57,0.12),0 2px 5px rgba(14,41,57,0.44),inset 0 -1px 2px rgba(14,41,57,0.15);
float:left;
padding:10px 50px 0;
background:linear-gradient(#fff,#f2f6f9)
}
hr{
border:0;
border-top:1px solid #ccc;
margin-bottom:30px
}
label{
font-size:17px
}
input{
width:400px;
padding:10px;
margin-top:10px;
margin-bottom:35px;
border-radius:5px;
border:1px solid #cbcbcb;
box-shadow:inset 0 1px 2px rgba(0,0,0,0.18);
font-size:16px
}
textarea{
width:400px;
height:100px;
padding:10px;
margin-top:10px;
margin-bottom:35px;
border-radius:5px;
border:1px solid #cbcbcb;
box-shadow:inset 0 1px 2px rgba(0,0,0,0.18);
font-size:16px
}
input[type=submit]{
background:linear-gradient(to bottom,#EC4C4C 5%,#C41515 100%);
box-shadow:inset 0 0px 0 0 #C41515;
border:0px solid #C41515;
color:#fff;
font-size:19px;
font-weight:700;
cursor:pointer;
text-shadow:0 0px 0 #C41515
}
input[type=submit]:hover{
background:linear-gradient(to bottom,#444444 5%,#1A1A1A 100%)
}

</style


<body>

<div id="main">
<div id="first">
<form action="#" method="post">
<h1>Φόρμα εισόδου</h1>
<h4>Συμπληρώστε όνομα χρήστη και κωδικό</h4>

<input name="username" placeholder="Όνομα χρήστη" type="text">

<input name="password" placeholder="Κωδικός" type="password">

<input name="dsubmit" type="submit" value="Σύνδεση">
</form>
</div>
</div>

  <?php
if (isset($_POST['username'])){
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$login->set_password($password);
	$login->set_username($username);
	$login->login();
	echo $password;
	
	
}
?>
</body


</html>