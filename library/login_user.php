<?php
session_start();
include 'classes/users.php';

include 'connection/credentials.php';

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

if (isset($_SESSION["username"])){

header("Location: http://zeromod.eu/auto_new2/index.php") ;
}

?>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>Flat Login</title>
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
<body>

    <div class="container">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Είσοδος</a>
                </li>
                <li>
                    <a href="#register">Εγγραφή</a>
                </li>
                <li>
                    <a href="#reset">Reset Password</a>
                </li>
            </ul>
            <div id="login" class="form-action show">
                <h1>Είσοδος </h1>
                <p>
                    Συμπληρώστε το όνομα χρήστη και το συνθηματικό για να πραγματοποιήσετε είσοδο στο σύστημα.
                </p>
                <form action="#" method="post">
                    <ul>
                        <li>
                            <input type="text" name="username" placeholder="Όνομα χρήστη"/>
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="Κωδικός" />
                        </li>
                        <li>
                           
							<input name="login_button" type="submit" value="Σύνδεση" class="button" />
                        </li>
                    </ul>
                </form>
				
            </div>
            <!--/#login.form-action-->
            <div id="register" class="form-action hide">
                <h1>Εγγραφή</h1>
                <p>Συμπληρώστε τα απαραίτητα στοιχεία σας και
                   επιλέξτε ένα πρόγραμμα συνδρομής για να εγγραφείτε στο σύστημα.
                </p>
                <form>
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" />
                        </li>
                        <li>
                            <input type="password" placeholder="Password" />
                        </li>
                        <li>
                            <input type="submit" value="Sign Up" class="button" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#register.form-action-->
            <div id="reset" class="form-action hide" >
               
                <p style="text-align:justify;">
                    Αν έχετε ξεχάσει το password σας συμπληρώστε το email που δώσατε κατά τη διάρκεια της εγγραφής σας, καθώς
					και την ερώτηση ασφαλείας και την απάντηση που έιχατε επιλέξει.
                </p>
                <form  action="#" method="post">
                    <ul>
                        <li>
                            <input type="text" placeholder="Όνομα χρήστη" name="username_reset"/>
                        </li>
                        <li>
                           <?php $login->get_security_questions(); ?>
                        </li>
						 <li>
                            <input type="text" placeholder="Απάντηση" name="answer"/>
                        </li>
                        <li>
                            <input type="submit" value="Reset" class="button" name="reset_button"/>
                        </li>
                    </ul>
                </form>
				
            </div>
            <!--/#register.form-action-->
        </div>
    </div>
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php
					if ($_POST['login_button']){
						
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						
						
						$login->set_password($password);
						$login->set_username($username);
						$login->login();
						
						
						
					}


					 if ($_POST['register_button']){
						
						
						
						
					}


				?>
	<?php
				if ($_POST["reset_button"]){
				
				
				$username=$_POST["username_reset"];
				$question=$_POST["sequrity_questions"];
				$answer=$_POST["answer"];
				
				
				$login->set_username($username);
				$login->set_sequrity_question($question);
				$login->set_security_question_answer($answer);
				
				
				$login->reset_password();
				
				}
				
				?>
				</div>
</body>
</html>
