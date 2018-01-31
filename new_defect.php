<?php
session_start();
//include 'classes/users.php';
include 'classes/users_v1_1.php';

include 'connection/credentials.php';

$db=$db;
$userdb=$user;
$passworddb=$password;


$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);



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
    <title>Helpdesk άγνωστη βλάβη</title>
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
	
            <div id="login" class="form-action show">
                <h2>Αποστολή άγνωστης βλάβης</h2>
                
               <?php // if (isset($_SESSION["username"])){ ?>
			   <?php
if ($_POST['new_defect_button']){
		
		$testmail="kkosnull@gmail.com";
		  $to="tilem@anip.gr";
		$problem_name=$_POST['problem_name'] ; 
 $problem_brand=$_POST['problem_brand'] ; 
   $problem_email=$_POST['problem_email'] ; 
   $problem_model=$_POST['problem_model'] ; 
   $problem_comments=$_POST['problem_comments'] ; 
   $problem_year=$_POST['problem_year'] ; 
   $problem_fuel=$_POST['problem_fuel'] ; 
  $problem_description=$_POST['problem_description'] ; 

   $subject=" Άγνωστο πρόβλημα";
  
  
$message= "\r\n"."Ονομ/μο χρήστη : ".$problem_name."\r\n"."email επικοινωνίας : ".$problem_email."\r\n"."Μάρκα : ". $problem_brand."\r\n"."Mοντέλο : ".$problem_model."\r\n"."Χρονιά κατασκευής : ".$problem_year."\r\n"."Tύπος καυσίμου : ".$problem_fuel."\r\n"."Περιγραφή προβλήματος : ".$problem_description."\r\n"."TΣχόλια επισκέπτη : ".$problem_comments;


 if ($problem_email<>""){
	
 
  $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
  mail($testmail, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header); 
  mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header);
 echo "<h2>Ευχαριστούμε για το χρόνο σας, το email με τη βλάβη έχει αποσταλεί.</h2>";
 
 }
 else {
  echo "<h2>Παρακαλώ εισάγετε το email σας.</h2>";
 }
 
		}
			   ?>
			   
<form action="#" method="POST">
<div style="width:100%; height:10px;"></div>
<font  style="color:#red; font-size:1em; font_weight:bold">
Σε περίπτωση που αντιμετωπίζετε κάποιο τεχνικό πρόβλημα το οποίο δεν αναφέρεται
 στην τεχνική βιβλιοθήκη, παρακαλώ συμπληρώστε την παρακάτω φόρμα.
 </font>
 <div style="width:100%; height:20px;"></div>
 <div class="row half">
 
   
  <div class="6u"> <input type="text" name="problem_name" id="textfield6" placeholder="Ονομ/μο"></div>
   <div class="6u">    <input type="text" name="problem_brand" id="textfield" placeholder="Μάρκα"></div>
	<div class="6u">   <input type="text" name="problem_email" id="textfield7" placeholder="email (υποχρεωτικό)"></div>
	<div class="6u">   <input type="text" name="problem_model" id="textfield2" placeholder="Μοντέλο"></div>
	<div class="6u">   <input type="text" name="problem_code" id="textfield3" placeholder="Κωδ. κινητήρα"></div>
      
   <div class="6u"> <input type="text" name="problem_year" id="textfield4" placeholder="Χρονολογία"></div>

<div class="6u">    
<select>
	<option value="δεν έχει επιλεχθεί">Επιλογή καυσίμου</option>
  <option value="petrol">Βενζίνη</option>
  <option value="diesel">Πετρέλαιο</option>

</select>
</div>
</div>

<div class="row half">
									<div class="12u">
<textarea name="problem_description" placeholder="Περιγραφή βλάβης" rows="4" cols="47"></textarea>
</div></div>


<input type="hidden" name="email_new_problem" value="1" placeholder="Περιγραφή">
 
  <br>

<input type="submit" value="Αποστολή" name="new_defect_button" class='button'>  

<?php // } ?></form>
				
            </div>
			
			
           
        </div>
    </div>
	</div>
	<div style="width:100%; text-align:center">
    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	
				</div>
</body>
</html>
