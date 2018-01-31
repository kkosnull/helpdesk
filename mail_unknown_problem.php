<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

  //send email
  
  if (isset($_POST['email_new_problem'])){
	
	/* $captcha=$_POST['captcha'] ;
  $captchacheck=$_POST['captchacheck'] ;
  if ($captcha!=$captchacheck){
	  
	   echo "<h2>Η αποστολή απέτυχε.</h2>";
	//  header( 'Location: http://www.emron.gr/web/main.php?pageid=fail' );
  } else {  */
 
  $testmail="kkosnull@gmail.com";
  $to="candi@autosupport.it";
  
  
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
  mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header);
 mail($testmail, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header); 
 // mail("admin@emron.gr", $subject,
 // $message, "From:" . $email);
?>
<script type="text/javascript">
window.history.back();
</script>
<?php
   } 
   
  

else {
echo"email not sent";
 echo "<h2>Η  αποστολή απέτυχε, <a href='http://www.autosupport.it/index.php'>προσπαθήστε πάλι</a>.</h2>";

}
}
//}
?>
</body>
</html>
