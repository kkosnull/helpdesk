<?php 
if(!($_SESSION)) {
    session_start();
}

// if (isset($_SESSION["admin"]) && $_SESSION["admin"]==1) {
	
include 'classes/requests.php';
include 'connection/credentials.php';
$admin = new requests();
$admin->setdb($db);
$admin->setUser($user);
$admin->setPassword($password);
$admin->get_requests_num();

if (isset($_GET["loginid"])){
	$loginid=$_GET["loginid"];
	//echo $loginid;
}
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">


    <title>Click 2 Call  Admin</title>
    
    
        <link rel="stylesheet" href="css/style.css">
		<script src="js/scripts.js"> </script>
		<script type="text/javascript">
//window.setTimeout(function(){alert_new_request(); }, 8000);

setInterval(function(){alert_new_request();}, 2000);
</script>
    
    
  </head>

  <body style="background-image:url('images/footer.png'); margin-top:0px; padding-top:0px; background:#43B4E8;" >
<?php if ($loginid=="reception"){ ?>
    <div class="wrapper" style="box-shadow: 1px 3px 5px #888888;height:100%; position:relative;">
	<div style="width:100%; height:150px; background:#43B4E8;">
	
<img src="images/logo.jpg" style="z-index:999999999">

	
</div>
	<div class="container" id="container" style="max-width:800px; height:100%">
		<h1 id="heading_title" >Click2call αιτήματα. </h1>
		<p id="alert"></p>
<form method='post' action='#'>
<input type="submit" value="Εμφάνιση όλων" name="showall">
<input type="submit" value="Εμφάνιση αναπάντητων" name="show_pending">

	
</form>	
<div id="requests_container">	
<?php
if (isset($_POST["showall"])){
	$admin->get_requests();
}
else if (isset($_POST["show_pending"])){
	$admin->get_pending_requests();
}
else {
		$admin->get_requests();
}
?>
</div>
		<?php
		
		if (isset($_POST["sendinfo"])){
			
			
			
			
			if ($securitycode==$securitycodehidden){
				
			$securitycode=$_POST["securitycode"];
			$securitycodehidden=$_POST["securitycodehidden"];
			$prefix=$_POST["prefix"];
			$phone=$_POST["phone"];
			$userinfo=$_POST["userinfo"];
			
			$phone=$prefix."".$phone;
			$admin->set_userinfo($userinfo);
			$admin->set_phone($phone);
			$admin->set_request();
			//echo "<script>document.getElementById('container').innerHTML='<img src=images/success.png>';</script>";
			?>
			<script>
			document.getElementById('container').innerHTML="<img src='images/success.png'>";
			setTimeout(function(){ window.open("http://localhost/click2call/index.php", "_self"); }, 6000);
			
			</script>
			<?php
			}
			else {
				echo "You are a sneaky bot!!!!!";
				
			}
			
		}
		
		?>
		
	</div>

	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	 
</div>

   

    
  <div id="sound"> </div> 
<?php  }?>
  </body>
</html>
<?php // } ?>