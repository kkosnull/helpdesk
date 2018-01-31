<?php 
if(!($_SESSION)) {
    session_start();
}
$status=false;
$current_time = strtotime('now');
if ($current_time > strtotime('11:00am') && $current_time < strtotime('7:00pm')) {
   $status=true;
}
else {
	 $status=false;
}


// if (isset($_SESSION["username"])) { ?>
<?php 
include 'classes/requests.php';
include 'connection/credentials.php';
$clientrequest = new requests();
$clientrequest->setdb($db);
$clientrequest->setUser($user);
$clientrequest->setPassword($password);
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">


    <title>Click 2 Call </title>
    
    
        <link rel="stylesheet" href="css/style_test.css">
		<script src="js/scripts_v1_1.js"> </script>
    
    
    
  </head>

  <body style="background-image:url('images/footer.png')">

    <div class="wrapper" style="box-shadow: 1px 3px 5px #888888; height:100%;">
	<div style="width:100%; height:150px; background:#43B4E8;margin-top:30px;">
	
<img src="images/logo1.jpg" style="z-index:999999999">

	<img src="flags/uk.jpg" height="30" width="auto" style="position:fixed; top:93px; margin-left:160px; cursor:pointer; z-index:999999;" onclick="switch_lang('uk')">
	<img src="flags/gr.jpg" height="30" width="auto" style="position:fixed; top:93px; margin-left:220px; cursor:pointer; z-index:999999;" onclick="switch_lang('gr')">
	<img src="flags/bul.jpg" height="30" width="auto" style="position:fixed; top:93px; margin-left:280px; cursor:pointer; z-index:999999;" onclick="switch_lang('bul')">
</div>

	<div class="container" id="container">
	<h1 id="heading_title" > </h1>
<script>
var today_index = new Date().getHours();

if (today_index >= 9 && today_index <= 16) {
	document.getElementById("heading_title").innerHTML="Speak with one of our technicians ";
}
else {
	document.getElementById("heading_title").innerHTML="This service is open from Monday to Friday and from 9:00 to 17:00";
}
	</script>	
	
	



		<!-- <h1 id="heading_title" >Speak with one of our technicians </h1> -->

		
		<form class="form" action="#" method="POST">
		<select style="width:320px" name="country" onchange="switch_lang(this.value)">
	<option id="lang_select">Select language</option>	
  <option value="gr" id="selectgr">Greece</option>
  <option value="bul" id="selectbul" >Bulgaria</option>
  <option value="uk"  id="selectuk">UK</option>
  
</select>
			<input type="text" placeholder="+44" style="width:70px; float:left; margin-left:140px; " name="prefix" id="prefix" readonly>
			<input type="text" placeholder="Phone" style="width:240px; margin-right:140px;" name="phone" id="phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
			<input type="text" placeholder="Name or Tech Support Code" style="font-size:18px; width:320px" name="userinfo" id="userinfo">
			<div id="security_div_fields">
			<div style="position:absolute; width:200px; margin-left:-43px;" id ="security_div" >
	<!--		
	<img src="images/img1.png" id="sec_code_img" >
	-->
	<?php $clientrequest->draw_captcha(); ?>
	
	<img src="images/reset.png"  onclick="reset_security_code();" style="cursor:pointer;">
	</div>
	
	<input type="text"  name="securitycode" id="securitycode" placeholder="Security code" style="width:320px">
	<input type="hidden"  name="securitycodehidden"  value="<?php $clientrequest->get_hidden(); ?>">
	</div>
	<input type="hidden"  name="lang" id="lang" value="uk">
	
			<button type="submit" name="sendinfo" id="login-button" ><span id="sendinfo">Send</span></button>
	
		</form>
		<?php
		
		if (isset($_POST["sendinfo"])){
			
			$securitycode=$_POST["securitycode"];
			$securitycodehidden=$_POST["securitycodehidden"];
			$language=$_POST["lang"];
			
			$prefix=$_POST["prefix"];
			$phone1=$_POST["phone"];
			$userinfo=$_POST["userinfo"];
			
			$phone=$prefix."".$phone1;
			$clientrequest->set_userinfo($userinfo);
			$clientrequest->set_phone($phone);
			$clientrequest->set_lang($language);
			//echo "...";
			//echo $clientrequest->get_lang;
			
			if ($securitycode==$securitycodehidden){
			
			
			
			
			$clientrequest->set_request();
			?>
			<script>
			setTimeout(function(){ window.open("http://aniphelpdesk.com/click2call/index.php" ,"_self"); }, 5000);
			</script>
			<?php
			//echo "<script>document.getElementById('container').innerHTML='<img src=images/success.png>';</script>";
			
			
			}
			
			else {
				$language=$_POST["lang"];
				
				
				if ($language=="gr"){
				echo "Δεν έχετε εισάγει σωστό κωδικό ασφαλείας.";
				}
				else if ($language=="bul"){
				echo "Въведения код за сигурност е неправилен.";
				}
				else if ($language=="uk"){
				echo "You have entered and invalid security code.";
				}
			}
			
		}
		
		?>
		
	</div>


	<ul class="bg-bubbles">
		<li ><img src="images/box1.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box2.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box3.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box1.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box3.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box2.png" style="opacity: 0.3;"></li>
		<li ></li>
		<li ><img src="images/box1.png" style="opacity: 0.3;"></li>
		<li ><img src="images/box3.png" style="opacity: 0.3;"></li>
		<li ></li>
	</ul>
	 
</div>

   

    
    

  </body>
</html>
<?php // } ?>