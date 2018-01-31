<?php
session_start();
include 'classes/users_test.php';

include 'connection/credentials.php';

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);


$username=$_GET["username"];
$password=$_GET["password"];



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
  var check=0;
 function checkvalue(){
  var obj = document.getElementById("submituser");
  obj.style.visibility = 'hidden';
 if (document.getElementById('name_demo').value  && document.getElementById('surname_demo').value  && document.getElementById('address_demo').value  && document.getElementById('phone_demo').value  && document.getElementById('area_demo').value  && document.getElementById('postcode_demo').value )
  {
  
  
	obj.style.visibility = 'visible';
  }

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
<?php
					
					
					if ($_POST['login_button_user']){
						
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
						
						
						if ($name!="" && $surname!="" && $address!="" && $phone!="" && $area!="" && $postcode!=""){
						
						$headers = 'From: support@aniphelpdesk.com'."\r\n"
						.'Content-Type: text/plain; charset=utf-8'."\r\n Reply-To: apostolos@anip.gr \r\n";
						$from = "aniphelpdesk - φόρμα εισαγωγής demo χρήστη"; // sender
						$subject = "Ενεργοποίηση user";
						
						$message = "Χρήστης : ".$username." Όνομα : ".$name."\n Επίθετο : ".$surname."\n Διεύθυνση : "
						.$address."\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area."\n Τ.Κ. : ".$postcode.
						"\n email : ".$email."\n Ειδικότητα : ".$expertice."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						  // send mail
					//	mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						//mail("apostolos@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						//mail("kkosnull@gmail.com",$subject,$message,"From: $from\n", $headers);	
						//mail("tlefkaros@anip.gr",$subject,$message,"From: $from\n", $headers);	
						
										
$myFile = "registration_logs/users_registered.txt";
$fh = fopen($myFile, 'a') or die("can't open file");
$stringData = "-----------------------------------------------------------------------------\n  ΟΝΟΜ/ΜΟ : ".$name." ".$surname."\n Διεύθυνση : ".$address.
"\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area." \n Τ.Κ. : ".$postcode."\n email :".$email."\n ειδικότητα : $expertice \n
";
//fwrite($fh, $stringData);
					
fclose($fh);	
						
						
						
						
						}
						$login->set_password($password);
						$login->set_username($username);
						$login->login();
						}
						//$login->login_trial();
						?>
						
						
	
</div>

    <div class="container">
	
        <div class="flat-form" style="height:0%">
		<div class='form_complete'>
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Είσοδος</a>
                </li>
				<!--
                <li>
                    <a href="#register">Εγγραφή</a>
                </li>
				-->
               
            </ul>
           <div id='login' class='form-action show'>
                <?php
				echo  $username;
echo "<br>";
echo  $password;
				?>
                <p>
                    Συμπληρώστε τα παρακάτω στοιχεία για να ενεργοποιηθεί ο λογαριασμός σας.
					<font style='color:#ed7271; font-weight:bold'>(Τα πεδία με αστερίσκο είναι υποχρεωτικά)
                </p>
                <form action='#' method='post' onmouseover='checkvalue();'>
                    <ul>
                         <li><input type='hidden' name='username' value='<?php echo $username ?>'/>
						<input type='hidden' name='password' value='<?php echo $password ?>'/>
                            <input type='text' name='name' id='name_demo' placeholder='Όνομα *' onClick='this.select();' />
                        </li>
                        <li>
                            <input type='text' name='surname' id='surname_demo' placeholder='Επώνυμο *' onClick='this.select();' />
                        </li>
						<li>
                            <input type='text' name='address' id='address_demo' placeholder='Διεύθυνση *' onClick='this.select();' />
                        </li>
						<li>
                            <input type='text' name='phone' id='phone_demo' placeholder='Τηλέφωνο *' onClick='this.select();' />
                        </li>
						<li>
                            <input type='text' name='area' id='area_demo' placeholder='Περιοχή *' onClick='this.select();' />
                        </li>
						<li>
                            <input type='text' name='postcode' id='postcode_demo' placeholder='Τ.Κ. *' onClick='this.select();' />
                        </li>
						<li>
                            <input type='text' name='email' placeholder='email' onClick='this.select();'/>
                        </li>
						<li>
                            <select name='expertice'>
							  <option value=''>Ειδικότητα</option>
							  <option value='Συνεργείο'>Συνεργείο</option>
							  <option value='Ηλεκτρολογείο'>Ηλεκτρολογείο</option>
							  <option value='Φανοποιείο'>Φανοποιείο</option>
							  <option value='Καθηγητής'>Καθηγητής</option>
							  <option value='Φοιτητής'>Φοιτητής</option>
							</select>
                        </li>
                        <li>
                           
							
							 <input name='login_button_user' type='submit' value='Υποβολή' class='button'  id='submituser' style='visibility:hidden' /> 
							<br>
							<a href='index.php'><input name='login_button' type='button' value='Επιστροφή' class='button' /></a>
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
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
				</div>
</body>
</html>
