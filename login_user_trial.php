<?php
session_start();
include 'classes/users.php';

include 'connection/credentials.php';

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

    <!-- Basic Page Needs
  ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Helpdesk login - trial</title>
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
<?php
					if ($_POST['login_button']){
						
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						
						
						$login->set_password($password);
						$login->set_username($username);
						$login->login();
						
						
						
					}
					if ($_POST['login_button_trial']){
						
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						
						
						$login->set_password($password);
						$login->set_username($username);
						$login->login_trial();
						
					
						
						
			
						
					}
					if ($_POST['complete_trial']){
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						$name=$_POST['name'];
						$surname=$_POST['surname'];
						$address=$_POST['address'];
						$phone=$_POST['phone'];
						$area=$_POST['area'];
						$postcode=$_POST['postcode'];
						$email=$_POST['email'];
						$expertice=$_POST['expertice'];
						
						$login->set_password($password);
						$login->set_username($username);
						if ($name!="" && $surname!="" && $address!="" && $phone!="" && $area!="" && $postcode!=""){
						
						$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: apostolos@anip.gr \r\n";
						$from = "aniphelpdesk - φόρμα εισαγωγής trial χρήστη"; // sender
						$subject = "Ενεργοποίηση trial";
						
						$message = "Όνομα : ".$name."\n Επίθετο : ".$surname."\n Διεύθυνση : "
						.$address."\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area."\n Τ.Κ. : ".$postcode.
						"\n email : ".$email."\n Ειδικότητα : ".$expertice."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						  // send mail
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("apostolos@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						//mail("kkosnull@gmail.com",$subject,$message,"From: $from\n", $headers);	
						//mail("tlefkaros@anip.gr",$subject,$message,"From: $from\n", $headers);	

					$myFile = "registration_logs/trial_users_registered.txt";
					$fh = fopen($myFile, 'a') or die("can't open file");
					$stringData = "\n Date : ".date('l jS \of F Y h:i:s A')." --- username : ".$username."\n  password : ".$password."\n ΟΝΟΜ/ΜΟ : ".$name."".$surname."\n Διεύθυνση : ".$address.
					"\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area." \n Τ.Κ. : ".$postcode."\n email :".$email."\n ειδικότητα : $expertice \n
					-----------------------------------------------------------------------------";
					fwrite($fh, $stringData);
					
					fclose($fh);
					
						$login->enable_trial();
						$login->login_trial();
						
						?>
						
						<?php
						}
						else {
						
						echo "<h2>Τα πεδία με αστερίσκο είναι υποχρεωτικά.</h2>";
						
						}
						
						
						
						
					}


					if ($_POST["register"]){
				$name=$_POST['onoma'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$cell=$_POST['mobile'];
				$fax=$_POST['fax'];
				$address=$_POST['address'];
				$membership=$_POST['membership'];
				$chat=$_POST['chat'];
				// mutators
				$login->set_comp_name($name);
				$login->set_email($email);
				$login->set_phone($phone);
				$login->set_mobile($cell);
				$login->set_fax($fax);
				$login->set_comp_adress($address);
				$login->set_membership($membership);
				$login->set_chat($chat);
				//mutators
				$login->insert_new_user();
				
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

<?php  if (!$_POST['login_button_trial']){ ?>
    <div class="container" id="container">
	
        <div class="flat-form" style="height:0%">
		<div class='form_complete'>
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Είσοδος Trial</a>
                </li>
               
            </ul>
            <div id="login" class="form-action show">
                
                <p>
                    Συμπληρώστε το όνομα χρήστη και το κωδικό για να πραγματοποιήσετε είσοδο στο σύστημα.
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
                           
							
							<input name="login_button_trial" type="submit" value="Σύνδεση" class="button"  />
							<br>
							<a href="index.php"><input name="login_button" type="button" value="Επιστροφή" class="button" /></a>
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
