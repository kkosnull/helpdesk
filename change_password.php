<?php
session_start();
include 'classes/users_v1_1.php';

include 'connection/credentials.php';

$db=$db;
$userdb=$user;
$passworddb=$password;


$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

if (isset($_SESSION['user_session']["username"])){

header("Location:http://test.aniphelpdesk.com/index.php") ;
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
						$password=$_POST['password'];
						
						
						$login->set_password($password);
						$login->set_username($username);
	//echo "test";
						$login->change_password();
						
						
					}
			?>
			
			<?php
			
			if (!$_POST['login_button']){
			?>
            <div id="login" class="form-action show">
                <h1>Αλλαγή κωδικού. </h1>
                <p>
                    Συμπληρώστε το όνομα χρήστη και το νέο κωδικό που επιθυμείτε να ορίσετε.
                </p>
                <form action="#" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" placeholder="Όνομα χρήστη" />
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="Κωδικός" />
                        </li>
						
                        <li>
                           
							<input name="login_button" type="submit" value="Αλλαγή" class="button" style="float:left; margin-right:10px;" />
							
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
