<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

  //send email
  
  if (isset($_POST['email'])){
	
	/* $captcha=$_POST['captcha'] ;
  $captchacheck=$_POST['captchacheck'] ;
  if ($captcha!=$captchacheck){
	  
	   echo "<h2>Η αποστολή απέτυχε.</h2>";
	//  header( 'Location: http://www.emron.gr/web/main.php?pageid=fail' );
  } else {  */
 
  $testmail="kkosnull@gmail.com";
  $to="candi@autosupport.it";
  
  $name1=$_POST['name1'] ;
  $telnum=$_POST['telnum'] ;
  $email = $_POST['email'] ;
  $message = $_POST['message'] ;
  

    $subject=$subject." Σχόλιο από visitor ";
  
  
$message= $message."\r\n"."Ονομ/μο Υπευθύνου : ".$name1."\r\n"."Τηλ. επικοινωνίας : ".$telnum."\r\n"."email : ". $email."";


 if ($email<>""){
	
 
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
 echo "<h2>Η  αποστολή απέτυχε, <a href='http://aniphelpdesk.com/index.php'>προσπαθήστε πάλι</a>.</h2>";

}
}
//}
?>
</body>
</html>
