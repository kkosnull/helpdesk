<?php
session_start();
error_reporting(E_ALL);
include 'classes/users_test.php';

include 'connection/credentials.php';

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
						
		$login->set_username($username);				
		$login->set_name($name." ".$surname);
		
		$login->record_activated_user();
		
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
						//mail("tlefkaros@anip.gr", '=?utf-8?B?'.base64_encode($subject).'?=', $message, $headers);
										
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
						
// check and clear for dynamic ips

$con = mysql_connect("db34.grserver.gr", $userdb, $passworddb);
if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("helpdesk", $con);
					 $sql = "SET NAMES 'utf8'";
					 mysql_query($sql, $con);
					 $sql = "SET NAMES 'utf8'";
					 mysql_query($sql, $con);
					 $sql_ip="select a.`id`, `username`, a.`user_id`, `ip` from `login_ips` a inner join `users` b
							on a.`user_id`=b.`id`
							where b.`username`='".$username."'
							LIMIT 3";
					
						$result2=mysql_query($sql_ip, $con);
						$num_rows = mysql_num_rows($result2);
						$ips[]=array("", "", "");
						$ids[]=array();
						$count=0;
						
							while ($row2 = mysql_fetch_array($result2)) {
							//$user_id=$row2["user_id"];
							$count+=1;
							$ids[$count]=$row2["id"];
							$ips[$count]=$row2["ip"];
						
						
							$string1= explode(".", $ips[1]);
							$string2= explode(".", $ips[2]);
							$string3= explode(".", $ips[3]);
							}
							
							if ($num_rows==3){
							if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1] && $string2[1]==$string3[1] ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
						
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							//mysql_query($sql3, $con);
							
							}
							else if ($string1[0]==$string2[0] && $string2[0]==$string3[0] &&
							$string1[1]==$string2[1]  ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
						//	mysql_query($sql3, $con);
							
							}
								else if ( $string2[0]==$string3[0] && $string2[1]==$string3[1] ){
								
							$sql1="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[1]."";
							$sql2="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[2]."";
							$sql3="DELETE FROM  `helpdesk`.`login_ips` WHERE `id`=".$ids[3]."";
							
							mysql_query($sql1, $con);
							mysql_query($sql2, $con);
							//mysql_query($sql3, $con);
							
							}
							}
		
				  }
					
// ----- check and clear for dynamic ips						


					
						
						if ($login->check_ips()==0 && $login->get_adminflag()==0 && $login->get_accounttype()=="subscriber"){
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
						 else if ($login->check_ips()!=0 && $login->check_ips()<4) {
						
						$login->login();
						}
						else if  ($login->check_ips()!=0 && $login->check_ips()>3){
						header("Location:http://aniphelpdesk.com/iplock.php");
						}
						
						else if  ($login->check_ips()==0 && $login->get_adminflag()==0){
						$login->login();
						}
						else  if ($login->get_adminflag()==1) {
						$login->admin_login();
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