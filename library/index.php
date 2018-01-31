<?php 

error_reporting(0);
include 'classes/users.php';
include 'connection/credentials.php';
$login_user = new users();
	$login_user->setdb($db);
	$login_user->setUser($user);
	$login_user->setPassword($password);
	$login_user->set_username("null");
$user_name="null";
if ($_POST["enterlibrary"]){
	
	
	
	$username=$_POST["username"];
	$password=$_POST["password"];
	$password=md5($password);
	$login_user->set_username($username);
	$login_user->set_password($password);
	$login_user->login();
	$user_name=$login_user->getUsername();
	$level=$login_user->getLevel();
	//echo $login_user->getUsername();
	
}
else if ($_POST["logoff_button"]){
	
	
	
	$username="null";
	
	$login_user->set_username($username);
	
	$user_name=$login_user->getUsername();
	$level=$login_user->getLevel();
	

	//echo $login_user->getUsername();
	
}

?>
<html lang="en">
<head>
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>ANIP Techical Library</title>
	<link rel="stylesheet" type="text/css" href="login_style.css" media="screen" />
	<script src="scripts.js"></script>
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
<body style="background-color:#000">
<?php if ($user_name=="null") {
?>
    <div class="container" style="max-width:1280px; width:1280px; height:905px; background-image:url('images/back.jpg'); margin-left:auto; margin-right:auto;">
        <div class="flat-form">
            <ul class="tabs">
                <li>
                    <a href="#login" class="active">Φόρμα εισόδου</a>
                </li>
               
            </ul>
            <div id="login" class="form-action show">
                <h1>Τεχνική βιβλιοθήκη </h1>
                <p>
                   Είσοδος στην τεχνική βιβλιοθήκη της ANIP.
                </p>
                <form method="post" action="#">
                    <ul>
                        <li>
                            <input type="text" placeholder="Username" name="username"/>
                        </li>
                        <li>
                            <input type="password" placeholder="Password" name="password"/>
                        </li>
                        <li>
                            <input type="submit" value="Login" class="button" name="enterlibrary" />
                        </li>
                    </ul>
                </form>
            </div>
            <!--/#login.form-action-->
       
            
        </div>
    </div>
<?php } else { 
echo $login_user->getUsername();
echo " level :";
echo $login_user->getLevel();
echo "<form method='post' action='#'>
                  
                             <input type='submit' value='Logoff' name='logoff_button' style='background-color:red; border:0px;color:#fff; position:fixed; top:0px; right:2px; cursor:pointer;'/>
                      
                </form>";?>
				
<?php  if ($level==1){ ?>
<iframe src="elfinder.html" width="100%" height="100%" frameborder="0"> </iframe>
<?php }  else if ($level==2){ ?>
<iframe src="elfinder2.html" width="100%" height="100%" frameborder="0"> </iframe>
<?php } ?>
<?php } ?>

    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</body>
</html>
