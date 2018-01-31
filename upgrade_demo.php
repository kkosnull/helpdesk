<?php
session_start();
include 'classes/users.php';

include 'connection/credentials.php';

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);



?>
<?php

			if ($_POST['login_button']){
			
			
			
			$username=$_POST['username'];
			$user_id=$_POST['user_id'];
			$membership=$_POST['membership'];
			
			/*
			echo $username;
			echo "<br>";
			echo $user_id;
			echo "<br>";
			echo $membership;
			echo "<br>";
			*/
			$login->set_user_id($user_id);
			$login->set_username($username);	
			$login->set_membership($membership);		
						
		
			
			$login->update_demo_user();
			
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
<?php if (!$_POST['login_button']){?>
    <div class="container">
	
        <div class="flat-form" style="height:0%">
		<div class='form_complete'>
		
            <ul class="tabs">
                <li>
                    <a href="#" class="active" style="width:375px;">Αναβάθμιση σε συνδρομή</a>
                </li>
				<!--
                <li>
                    <a href="#register">Εγγραφή</a>
                </li>
				-->
              
            </ul>
			
			
		
            <div id="login" class="form-action show">
                <h1>Οδηγίες </h1>
                <p>
                    Επιλέξτε το πρόγραμμα της επιλογής σας και σύντομα θα επικοινωνήσουμε μαζί σας.
                </p>
                <form action="#" method="post">
                    <ul>
                        <li>
                           <p style="font-size:1.4em; margin:10px;">Όνομα χρήστη :  <?php echo $_SESSION['username']; ?></p><input type="hidden" name="username" placeholder="Όνομα χρήστη" value="<?php echo $_SESSION['username']; ?>" />
                        </li>
                        <li>
                            <input type="hidden" name="user_id" placeholder="Κωδικός" value="<?php echo $_SESSION['user_id']; ?>" />
                        </li>
						
						<li>
                            <select name="membership">
							<option value="0">Επιλέξτε πρόγραμμα συνδρομής</option>
							
							<option value="1">1 Ημέρα - 2 €</option>
							
						    <option value="30">1 Μήνας - 10 €</option>
							
						    <option value="365">1 Χρόνος - 150 €</option>
						    
							</select>
                        </li>
						
                        <li>
                           
							<input name="login_button" type="submit" value="Συνέχεια" class="button" />
							<br>
							<a href="index.php"><input  type="button" value="Επιστροφή" class="button" /></a>
							
                        </li>
					
                    </ul>
                </form>
				
            </div>
			
			
            <!--/#login.form-action-->
           
			
            <!--/#register.form-action-->
           
            <!--/#register.form-action-->
        </div>
    </div>
	</div>
	
<?php } ?>
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
				</div>
</body>
</html>
