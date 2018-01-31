<?php
session_start();
include 'classes/users_ls.php';

include 'connection/credentials.php';

$db=$db;
$userdb=$user;
$passworddb=$password;


$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

if (isset($_SESSION["username"])){

header("Location:http://aniphelpdesk.com/index_ls.php") ;
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
	<script  src="js/ajax_functions_v_1_2.js"></script>
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
						$from = "aniphelpdesk - φόρμα εισαγωγής  χρήστη"; // sender
						$subject = "Ενεργοποίηση χρήστη";
						
						$message = "Όνομα : ".$name."\n Επίθετο : ".$surname."\n Διεύθυνση : "
						.$address."\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area."\n Τ.Κ. : ".$postcode.
						"\n email : ".$email."\n Ειδικότητα : ".$expertice."";
						  // message lines should not exceed 70 characters (PHP rule), so wrap it
						
						$message = wordwrap($message, 70);
						
						  // send mail
						mail("kkosnull@gmail.com", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						mail("apostolos@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
						//mail("kkosnull@gmail.com",$subject,$message,"From: $from\n", $headers);	
						mail("tlefkaros@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
										
						$myFile = "registration_logs/users_registered.txt";
						$fh = fopen($myFile, 'a') or die("can't open file");
						$stringData = date('l jS \of F Y h:i:s A')."--------------------------->>>>>>>> \nUsername : ".$username."\n  ΟΝΟΜ/ΜΟ : ".$name." ".$surname."\n Διεύθυνση : ".$address.
						"\n Τηλέφωνο : ".$phone."\n Περιοχή : ".$area." \n Τ.Κ. : ".$postcode."\n email :".$email."\n ειδικότητα : $expertice \n
						";
						fwrite($fh, $stringData);
											
						fclose($fh);	

			
			$login->set_password($password);
			$login->set_username($username);	
			$login->login();
		}
		}	
			if ($_POST['login_button']){
						
						
						$username=$_POST['username'];
						$password=$_POST['password'];
						
						
						$login->set_password($password);
						$login->set_username($username);
						

						 $con = mysql_connect("db34.grserver.gr", $userdb, $passworddb);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
						 mysql_select_db($db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
					$sql="SELECT * FROM `helpdesk`.`users` WHERE username='".$username."' and `password`='".md5($password)."'  ";
					$result=mysql_query($sql);
					while($row = mysql_fetch_array($result))
	   
							   {
							   $adminflag=$row["admin"];
							   $usertype=$row["accounttype"];
							   $username=$row["username"];
							   $user_id=$row["id"];
							   $pcs=$row["pcs"];
							   }
							   
						if ($adminflag==1) {
						$login->admin_login();
						}
						
						else if ($pcs==0 && $adminflag==0 && $usertype=="subscriber"){
						?>
						<div id='login' class='form-action show'>
                
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
                            <input type='text' name='phone' id='phone_demo' placeholder='Τηλέφωνο *' onClick='this.select();' onkeydown="return isNumber(event);" />
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
                           
							
							 <input name='login_button_user' type='submit' value='Σύνδεση' class='button' /> 
							 
							<br>
							<a href='index.php'><input name='login_button' type='button' value='Επιστροφή' class='button' /></a>
                        </li>
					
                    </ul>
                </form>
		
            </div>
						<?php 
						}
						 else if ($pcs>0 && $adminflag==0 && $usertype=="subscriber") {
						
					
						$login->login();
						}
						
						}
						
						
						
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
                            <input type="password" name="password" placeholder="Κωδικός" />
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
            <div id="register" class="form-action hide" >
                <h1>Εγγραφή</h1>
                <p>Συμπληρώστε τα απαραίτητα στοιχεία σας και
                   επιλέξτε ένα πρόγραμμα συνδρομής για να εγγραφείτε στο σύστημα.
                </p>
                <form method="POST" action="#">
                    <ul>
                        <li>
                            <input type="text" placeholder="Όνομα / επωνυμία (*)"  name="onoma"/>
                        </li>
                        <li>
                            <input type="text" placeholder="email (*)" name="email"/>
                        </li>
						 <li>
                            <input type="text" placeholder="Τηλέφωνο(*)"  name="phone" onkeydown="return isNumber(event);"/>
                        </li>
						 <li>
                            <input type="text" placeholder="Κινητό"  name="mobile"onkeydown="return isNumber(event);" />
                        </li>
						 <li>
                            <input type="text" placeholder="FAX"  name="fax" onkeydown="return isNumber(event);"/>
                        </li>
						<li>
                            <input type="text" placeholder="Διεύθυνση"  name="address"/>
                        </li>
						<li>
                            <select name="membership">
							<option value="0">Επιλέξτε πρόγραμμα συνδρομής</option>
							<option value="1">1 Ημέρα - 2 €</option>
						    <option value="30">1 Μήνας - 10 €</option>
						    <option value="365">1 Χρόνος - 100 €</option>
						    <option value="3">Trial - 3 ημέρες</option>
							</select>
                        </li>
						
						<li>
                            <select name="chat">
							<option value="0">δυνατότητα online υποστήριξης (chat)</option>
							
							<option value="1">Ναι xxx€</option>
						    <option value="0">Όχι xxx€</option>
						   
							</select>
                        </li>
						
                        <li>
                            <input type="submit" value="Sign Up" class="button" name="register"/>
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
	</div>
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
				</div>
</body>
</html>
