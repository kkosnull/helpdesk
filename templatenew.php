<?php 
session_start();
include 'classes/users.php';
include 'classes/transactions_v1.2.php';
include 'connection/credentials.php';
$now = time();
if ($now > $_SESSION['expire']) {
			$user_id=$_SESSION['user_id'];
			$logoff = new users();
			$logoff->setdb($db);
			$logoff->setUser($user);
			$logoff->setPassword($password);
			$logoff->set_user_id($user_id);
			if ($_SESSION['admin']==0){
            session_destroy();
			$logoff->logoff();
			}
           // echo "Your session has expired! <a href='http://localhost/somefolder/login.php'>Login here</a>";
        }
		/*
if (isset($_SESSION['maxips'])){
session_destroy();
header("location:http://aniphelpdesk.com/iplock.php");
}
*/

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

/*
if (!isset($_SESSION["username"])){

header( 'Location: http://aniphelpdesk.comlogin_user.php') ;
}
*/

$insert = new transactions();
$insert->setdb($db);
$insert->setUser($user);
$insert->setPassword($password);

$update = new transactions();
$update->setdb($db);
$update->setUser($user);
$update->setPassword($password);

$defect=new transactions();
$defect->setdb($db);
$defect->setUser($user);
$defect->setPassword($password);
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="styles.css" />

<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700&subset=latin,greek-ext' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Plaster' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Sarpanch:400,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/font-awesome.min.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
 <script  src="js/ajax_functions_v_1_2.js"></script>
 <script src="js/countdown.js"></script>
 <script type="text/javascript">
function open_chat() {
    window.open("http://aniphelpdesk.com/tech_support_chat/client.php?locale=en&style=silver", "_blank", "toolbar=no, scrollbars=no, resizable=no, top=500, left=500, width=600, height=390");
}

</script>
</head>

<body <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]!=1) { ?> oncontextmenu="return false" <?php  } ?>>
<div style="width:100%; height:100vh;">

<div style="width:100%;  background-color:#ccc;">
<div class="top" style="width:100%; height:65px; background-color:#339999; position:fixed; top:0px; z-index:900;

background: rgb(242,245,246); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2YyZjVmNiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjM3JSIgc3RvcC1jb2xvcj0iI2UzZWFlZCIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNjOGQ3ZGMiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(242,245,246,1) 0%, rgba(227,234,237,1) 37%, rgba(200,215,220,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(242,245,246,1)), color-stop(37%,rgba(227,234,237,1)), color-stop(100%,rgba(200,215,220,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(242,245,246,1) 0%,rgba(227,234,237,1) 37%,rgba(200,215,220,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=0 ); /* IE6-8 */

background: rgb(226,226,226); /* Old browsers */
/* IE9 SVG, needs conditional override of 'filter' to 'none' */
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2UyZTJlMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjgwJSIgc3RvcC1jb2xvcj0iI2QxZDFkMSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijg2JSIgc3RvcC1jb2xvcj0iI2RiZGJkYiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9Ijk2JSIgc3RvcC1jb2xvcj0iI2RiZGJkYiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZWZlZmUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(top,  rgba(226,226,226,1) 0%, rgba(209,209,209,1) 80%, rgba(219,219,219,1) 86%, rgba(219,219,219,1) 96%, rgba(254,254,254,1) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(226,226,226,1)), color-stop(80%,rgba(209,209,209,1)), color-stop(86%,rgba(219,219,219,1)), color-stop(96%,rgba(219,219,219,1)), color-stop(100%,rgba(254,254,254,1))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(209,209,209,1) 80%,rgba(219,219,219,1) 86%,rgba(219,219,219,1) 96%,rgba(254,254,254,1) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(209,209,209,1) 80%,rgba(219,219,219,1) 86%,rgba(219,219,219,1) 96%,rgba(254,254,254,1) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(209,209,209,1) 80%,rgba(219,219,219,1) 86%,rgba(219,219,219,1) 96%,rgba(254,254,254,1) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(226,226,226,1) 0%,rgba(209,209,209,1) 80%,rgba(219,219,219,1) 86%,rgba(219,219,219,1) 96%,rgba(254,254,254,1) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=0 ); /* IE6-8 */


box-shadow: 0px 0px 0px 3px rgba(0, 0, 0, 0.3), 
             0px 5px 5px 0px rgba(0, 0, 0, 0.6);


">
<img src="img/helpdesk_logo.png" style="float:left; margin-left10px;"> <div style="width:80%; text-align:center; 
margin-left:auto; margin-right:auto;margin-top:18px;
color:#000284; font-weight:bold; font-size:19px;">
<a href="templatenew.php?param=home">ΑΡΧΙΚΗ </a>
| 
<a href="templatenew.php?param=profile">ΠΡΟΦΙΛ </a>
| 
<a href="templatenew.php?param=news">ΝΕΑ </a>
| 
<a href="templatenew.php?param=contact">ΕΠΙΚΟΙΝΩΝΙΑ </a>
| 
<a href="login_demo.php">DEMO</a> 
| 
<?php if (!isset($_SESSION["username"])){ ?><a href="login_user.php">ΕΙΣΟΔΟΣ</a>  </div><?php } ?>
<?php if (isset($_SESSION["username"])){ ?><a href="logout.php">ΕΞΟΔΟΣ</a>
 <span class="icon fa-edit" style="font-size:14px; float:right; color:#21383E;"><?php echo $_SESSION["username"]; ?></span> </div><?php } ?>

</div>
<?php if (isset($_SESSION["username"])){ ?>	
<div class="right" style="width:42px; height:100vh; background-color:#141A23; position:fixed; top:0px;  z-index:899; padding-top:66px;
box-shadow: 0px 0px 0px 10px rgba(0, 0, 0, 0.3), 
             0px 20px 15px 0px rgba(0, 0, 0, 0.6); ">

<ul id="navigationMenu">
       <li>
	    <a class="home" href="templatenew.php?param=defects">
            <span>Καταγεγραμμένες βλάβες</span>
        </a>
    </li>
    
    <li>
    	<a class="about" href="templatenew.php?param=eobd">
            <span>Κωδικοί eobd</span>
        </a>
    </li>
    
    <li>
	     <a class="services" href="templatenew.php?param=codes">
            <span>Κωδικοί κατασκευαστών</span>
         </a>
    </li>
    
    <li>
    	<a class="portfolio" href="templatenew.php?param=change">
            <span>Αλλαγή στοιχείων</span>
        </a>
    </li>
    
    <li>
    	<a class="new" href="http://aniphelpdesk.com/new_defect.php" target="_blank">
            <span>Αναφορά άγνωστης βλάβης</span>
        </a>
    </li>
	
	 <li>
    	<a class="contact" href="#" onclick="open_chat()">
            <span >Live chat online τεχνική υποστήριξη</span>
        </a>
    </li>
	<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]==1){ 
						?>
	 <li>
    	<a class="admin" href="#" onclick="open_chat()">
            <span >Είσοδος στη διαχείριση</span>
        </a>
    </li>
	<?php } ?>
	<?php if (isset($_SESSION["admin"]) && (($_SESSION["admin"]==1 )||( $_SESSION["chat_admin"]==1))){?>
	 <li>
    	<a class="chat_admin" href="#" onclick="open_chat()">
            <span >Διαχείριση chat</span>
        </a>
    </li>
	<?php } ?>
</ul>

</div>
<?php } ?>
<div class="center" 
<?php if (isset($_GET["param"]) && $_GET["param"]!="home"){ ?>
style="background-image:url(css/images/overlay2.png);height:100vh; "
<?php } ?>
<?php if (isset($_GET["param"]) && $_GET["param"]=="home"){ ?>
style="background-image:url(img/anip_photo_building.jpg);background-size: cover;height:100vh;"
<?php }  else { ?>
style="background-image:url(img/anip_photo_building.jpg);background-size: cover;height:100vh;"
<?php } ?>
>
<div style=" color:#DADADA; font-size:1.3em; font-weight:bold;height:100vh;">
<?php include 'controller.php'; ?>
</div>

</div>
<div style=" width:100%; position:fixed; bottom:0px;  
						background-color: #000; height: 35px; text-align:left;
						border: 0px solid rgba(0, 0, 0, 0.1); left:0px;z-index:900" id="clockdiv">

						
						<div>
<img src="digits/dg8.gif" name="hr1"><img 
src="digits/dg8.gif" name="hr2"><img 
src="digits/dgc.gif"><img 
src="digits/dg8.gif" name="mn1"><img 
src="digits/dg8.gif" name="mn2"><img 
src="digits/dgc.gif"><img 
src="digits/dg8.gif" name="se1"><img 
src="digits/dg8.gif" name="se2"><img 
src="digits/dgam.gif" name="ampm">



<INPUT NAME="text" SIZE="55" id="text"
VALUE=" ********* ΑΝΙΡ Helpdesk ********* <?php $defect->get_new_defects(); ?>   . . . . . . . . . . . . . Περιηγηθείτε στο site μας www.anip-seminars.gr για να δείτε αναλυτικά το πρόγραμμα εκπαίδευσης    "
style="background-color: #000; height: 27px; font-size:1em; color:#00FECB; border: 0px solid;
position: relative;top: -5px; margin-left:20px; width:80%"
>


<SCRIPT> 
ScrollSpeed = 250
ScrollChars = 1
function ScrollMarquee() {
window.setTimeout('ScrollMarquee()',ScrollSpeed);

var msg = document.getElementById("text").value;
//alert(msg);
document.getElementById("text").value =
msg.substring(ScrollChars) +
msg.substring(0,ScrollChars); 
} 
ScrollMarquee()
</SCRIPT>


</div>
<script type="text/javascript">
// (c) 2000-2014 ricocheting.com
dg = new Array();
dg[0]=new Image();dg[0].src="digits/dg0.gif";
dg[1]=new Image();dg[1].src="digits/dg1.gif";
dg[2]=new Image();dg[2].src="digits/dg2.gif";
dg[3]=new Image();dg[3].src="digits/dg3.gif";
dg[4]=new Image();dg[4].src="digits/dg4.gif";
dg[5]=new Image();dg[5].src="digits/dg5.gif";
dg[6]=new Image();dg[6].src="digits/dg6.gif";
dg[7]=new Image();dg[7].src="digits/dg7.gif";
dg[8]=new Image();dg[8].src="digits/dg8.gif";
dg[9]=new Image();dg[9].src="digits/dg9.gif";
dgam=new Image();dgam.src="digits/dgam.gif";
dgpm=new Image();dgpm.src="digits/dgpm.gif";

function dotime(){ 
	var d=new Date();
	var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

	// set AM or PM
	document.ampm.src=((hr<12)?dgam.src:dgpm.src);

	// adjust from 24hr clock
	if(hr==0){hr=12;}
	else if(hr>12){hr-=12;}

	document.hr1.src = getSrc(hr,10);
	document.hr2.src = getSrc(hr,1);
	document.mn1.src = getSrc(mn,10);
	document.mn2.src = getSrc(mn,1);
	document.se1.src = getSrc(se,10);
	document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
	return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
	dotime();
	setInterval(dotime,1000);
}

</script>

</div>
</div>
</body>
</html>
<script type="text/javascript">


$('#box_defects').keyup(function(){

   var valThis = $(this).val().toLowerCase();
    $('.navList_defects>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
});

$('#box_model').keyup(function(){
//alert("test");
   var valThis2 = $(this).val().toLowerCase();
   
    $('.navList_defects>li').each(function(){
     var text1 = $(this).text().toLowerCase();
	
	text1=text1.split(";;;");
	//alert(text1[1]);
        (text1[1].indexOf(valThis2) == 0) ? $(this).show() : $(this).hide();            
   });
});

</script>