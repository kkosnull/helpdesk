

<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
background-image: url(images/fix_icon.png);
			 background-repeat:no-repeat;
			 background-position:right bottom;
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;width:80%; height:70%;'>
			 <header style='text-align:left; margin-bottom:0px; padding-top:5px;' id="email_report">
			 <?php
			 if ($_POST['message_button']){
	

		 $to="apostolos@anip.gr";
		  $testmail="kkosnull@gmail.com";
		  
		  $name1=$_POST['name'] ;
		  $telnum=$_POST['telephone'] ;
		  $address=$_POST['address'] ;
		  $tk=$_POST['postcode'] ;
		  $area=$_POST['area'] ;
		  $email = $_POST['email'] ;
		  $message = $_POST['message'] ;
		  $subject=$subject." Σχόλιο από επισκέπτη του aniphelpdesk.";
		  
		  
		$message= $message."\r\n"."Ονομ/μο Υπευθύνου : ".$name1."\r\n"."Τηλ. επικοινωνίας : ".$telnum."\r\n"."email : ". $email." Διεύθυνση :  "
		.$address." T.K. :  ".$tk." Περιοχή : ".$area."";


		 if ($email<>"" && $name1<>"" && $address<>"" && $telnum<>"" && $area<>"" && $tk<>""){
			
		 
		  $header_ = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
		  if(isset($_POST['url']) && $_POST['url'] == ''){
       mail($to, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header);
		 mail($testmail, '=?UTF-8?B?'.base64_encode($subject).'?=', $message, $header_ . $header); 
echo "<h2 style='text-align:center;'> <b>Το μήνυμά σας έχει αποσταλλεί.</b></h2>";
} 
	   
			
			}
			
			else {
			echo "<h2>Τα πεδία με αστερίσκο είναι υποχρεωτικά.</h2>";
			}
		}
			 
			 
			 ?>
			 
			
							<h2 style='text-align:left;'><font style='font-size:2em'>E</font>πικοινωνία</h2>
								
							</header>
							<form style='margin:20px;' id="myForm" method="post" action="#">
							<div class='half'><input type='text' name='name' placeholder='Ονοματεπώνυμο *' /></div>
							<div><input type='text' name='address' placeholder='Διεύθυνση *' /></div>
							<div ><input type='text' name='area' placeholder='Περιοχή *' /></div>
							<div ><input type='text' name='postcode' placeholder='T.K. *' /></div>
							<div ><input type='text' name='email' placeholder='Email *' /></div>
						    <div ><input type='text' name='telephone' placeholder='Τηλέφωνο *' /></div>
							<div style="display:none;">Αφήστε αυτό κενό: <input type="text" name="url" /></div>
							<div><textarea name='message' placeholder='Μήνυμα' rows='5'></textarea></div>
<input type='submit' value='Αποστολή μηνύματος' name='message_button' />
							</form>
							
			 </div>
			 