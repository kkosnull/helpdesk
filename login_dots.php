<?php
session_start();
include 'classes/users.php';

include 'connection/credentials.php';
$dots = new users();
$db=$db;
$userdb=$user;
$passworddb=$password;


$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

if (isset($_SESSION["username"])){

header("Location:http://aniphelpdesk.com/index.php") ;
}

?>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
  	function isNumber(event) {
  if (event) {
    var charCode = (event.which) ? event.which : event.keyCode;
    if (charCode != 190 && charCode > 31 && 
       (charCode < 48 || charCode > 57) && 
       (charCode < 96 || charCode > 105) && 
       (charCode < 37 || charCode > 40) && 
        charCode != 110 && charCode != 8 && charCode != 46 )
       return false;
  }
  return true;
}
  
  </script>
  <script>


 
var id_sequence="";
function get_sequence(id){
document.getElementById(id).className = "painted";
id_sequence=id_sequence+"-"+String(id);
document.getElementById("sequence").value=id_sequence.slice(1);
//alert(id_sequence);
}

</script>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Helpdesk login</title>
	<link rel="stylesheet" type="text/css" href="login/login_style.css" media="screen" />
	<script src="login/scripts.js"></script>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->

    <!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<style>
.dot{
width: 20px;
height: 20px;
border: 1px #888888 solid;
background-color: #d4dfec;
-moz-box-shadow: 0px 0px 0px 0px #888888;
-webkit-box-shadow: 0px 0px 0px 0px #888888;
box-shadow: 0px 0px 0px 0px #888888;
border: 2px solid;
border-radius: 25px;
}
.painted{
	width: 20px;
height: 20px;
border: 1px #888888 solid;
background-color:#007ED8;
-moz-box-shadow: 0px 0px 0px 0px #888888;
-webkit-box-shadow: 0px 0px 0px 0px #888888;
box-shadow: 0px 0px 0px 0px #888888;
border: 2px solid;
border-radius: 25px;


}
td{


}


table {
    border-collapse: separate;
	margin-left:auto;
	margin-right:auto;
   margin-top:3%;
   
   border: 0px solid rgba(0, 0, 0, 0.5);
    border-radius: 35px;
    -moz-border-radius: 35px;
	



}
 td {
    
    padding: 5px;
	


}


a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: never-underline;
}

a:active {
    text-decoration: never-underline;
}
.form_complete{
width:100%;
 border: 5px solid #ed7271;
 
 box-shadow: 0px 0px 0px 15px rgba(255, 255, 255, 0.1), 
             0px 20px 15px 0px rgba(0, 0, 0, 0.6); 
			 padding:20px;
			 background:#34495e;
}
</style>
<body>
<div class="top" style="width:390px; margin-left:auto; margin-right:auto; text-align:justify;">



</div>

    <div class="container">
	
        <div class="flat-form" style="height:0%">
		<div class='form_complete'>
		<?php
		
			if ($_POST['login_button']){
						
						
						$username=$_POST['username'];
						$dots=$_POST['sequence'];
						
						
						$login->set_username($username);
						$login->set_dots_sequence($dots);
						
						

						
					
						$login->login_dots();
						
						}
						
						
						
					
			?>
			
			<?php
			
			if (!$_POST['login_button'] && !$_POST['login_button_user']){
			?>
            <div id="login" class="form-action show">
                <h1>Είσοδος </h1>
                <p>
                    Συμπληρώστε το όνομα χρήστη και το κωδικό για να πραγματοποιήσετε είσοδο στο σύστημα.
                </p>
                <form action="#" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" placeholder="Όνομα χρήστη" />
                        </li>
                        <li>
                            <!-- <input type="password" name="password" placeholder="Κωδικός" /> -->
							<?php $dots->draw_dots(); ?>
                        </li>
                        <li>
                           
							<input name="login_button" type="submit" value="Σύνδεση" class="button" style="float:left; margin-right:10px;" />
							
							<a href="index.php"><input name="login_button" type="button" value="Επιστροφή" class="button" style="float:left; margin-right:10px;"/></a>
							<br>
                        </li>
					
                    </ul>
                </form>
				
            </div>
			<?php } ?>
			
            <!--/#login.form-action-->
   
			
            <!--/#register.form-action-->

            <!--/#register.form-action-->
        </div>
    </div>
	</div>
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
				</div>
</body>
</html>
