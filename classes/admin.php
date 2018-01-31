<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
session_start();
echo $_SESSION["username"];
include 'classes/users.php';
include 'classes/transactions.php';
include 'connection/credentials.php';
$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

if (!isset($_SESSION["admin"]) ){

header( 'Location: http://zeromod.eu/auto_new/login_admin.php') ;
}
if (isset($_SESSION["admin"]) && $_SESSION["admin"]==0 ){

header( 'Location: http://zeromod.eu/auto_new/login_admin.php') ;
}



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
		<title>Twenty by HTML5 UP</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script  src="js/ajax_functions.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	</head>
	<body class="index">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><a href="index.html">Twenty <span>by HTML5 UP</span></a></h1>
				<nav id="nav">
					<ul>
						<li class="current"><a href="index.php?action=welcome">Welcome</a></li>
						<!-- <li class="submenu">
							<a href="">Layouts</a>
							<ul>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li class="submenu">
									<a href="">Submenu</a>
									<ul>
										<li><a href="#">Dolore Sed</a></li>
										<li><a href="#">Consequat</a></li>
										<li><a href="#">Lorem Magna</a></li>
										<li><a href="#">Sed Magna</a></li>
										<li><a href="#">Ipsum Nisl</a></li>
									</ul>
								</li>
							</ul>
						</li> -->
						<?php if (isset($_SESSION["username"])){?><li><a href="logout.php" >ΕΞΟΔΟΣ</a></li><?php } ?>
						<li><a href="index.php?action=register" >ΕΓΓΡΑΦΗ</a></li>
					</ul>
				</nav>
			</header>

		<!-- Banner -->		
			<section id="banner" >
				
				<!--
					".inner" is set up as an inline-block so it automatically expands
					in both directions to fit whatever's inside it. This means it won't
					automatically wrap lines, so be sure to use line breaks where
					appropriate (<br />).
				-->
				<div class="inner">
					
					<header>
						<h3>ΜΑΡΚΕΣ - ΜΟΝΤΕΛΑ</h3>
					</header>
					
					<footer>
						<ul class="buttons vertical">
							<li><a href="admin.php?action=insert_brand" class="button fit scrolly">ΕΙΣΑΓΩΓΗ ΜΑΡΚΑΣ</a></li>
							<li><a href="admin.php?action=update_model" class="button fit scrolly">ΜΕΤΑΒΟΛΗ  ΜΟΝΤΕΛΟΥ</a></li>
							<li><a href="admin.php?action=update_manufacturer" class="button fit scrolly">ΜΕΤΑΒΟΛΗ ΚΑΤ/ΤΩΝ</a></li>
						</ul>
					</footer>
				
				</div>
				
				
				<div class="inner">
					
					<header>
						<h3>ΒΛΑΒΕΣ</h3>
					</header>
					
					<footer>
						<ul class="buttons vertical">
							<li><a href="admin.php?action=defects" class="button fit scrolly">ΓΕΝΙΚΕΣ</a></li>
							<li><a href="admin.php?action=eobd" class="button fit scrolly">EOBD</a></li>
							<li><a href="admin.php?action=manufacturers_codes" class="button fit scrolly">ΚΩΔΙΚΟΙ ΚΑΤ/ΤΩΝ</a></li>
						</ul>
					</footer>
				
				</div>
				
				<div class="inner">
					
					<header>
						<h3>ΧΡΗΣΤΕΣ</h3>
					</header>
					
					<footer>
						<ul class="buttons vertical">
							<li><a href="admin.php?action=admins" class="button fit scrolly">ΔΙΑΧΕΙΡΙΣΤΕΣ</a></li>
							<li><a href="admin.php?action=users" class="button fit scrolly">ΧΡΗΣΤΕΣ</a></li>
							<li><a href="#" class="button fit scrolly">&nbsp;</a></li>
						</ul>
					</footer>
				
				</div>
				
			</section>
		
		<!-- Main -->
			<article id="main">

			<?php if (isset($_GET['action']) && $_GET['action']=="insert_brand"){	 ?>	
					
				<!-- One -->
				<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;">ΕΙΣΑΓΩΓΗ ΜΑΡΚΑΣ/ΜΟΝΤΕΛΟΥ</div>
					<section class="wrapper style2 container special-alt">
						<div >
								<form action="#" method="post">
								  <table width="80%">
									<tr>
								<td>
								  <input type="text" name="brand" value="ΜΑΡΚΑ AUTO" onClick="this.select();"/>
								   <input type="hidden" name="foobar"  value="fubar"/>
								   
								 
								  <input type="text" name="manufacturer" value="ΚΑΤΑΣΚΕΥΑΣΤΗΣ" onClick="this.select();"/>
								  </td>
								  </tr>
								  
								  <tr>
								<td>
								<input type="submit" class="special" value="Εισαγωγη" />
								</td>

								</tr>
								</table>

								</form>				
						</div>	
						<div>
						<form action="#" method="post">
<table width="80%">
<tr>
<td>
<?php
if (isset($_POST['foobar'])) {
		$brand=$_POST['brand'];
		$manufacturer=$_POST['manufacturer'];
		if (isset($_POST['brand'])){
		$insert->setbrand($brand);
		$insert->insert_brand();
		}
		if (isset($_POST['manufacturer'])){
		$insert->setmanufacturer($manufacturer);
		$insert->insert_manufacturer();
		}
		//$insert->setMaxBrandId();
		
}
?>

<?php $insert->get_brand(); ?>
  </td>
  
  </tr><tr>
<td>


 <input type="text" name="model" value="ΜΟΝΤΕΛΟ" onClick="this.select();"/>
 </td>
</tr><tr>
<td>

   <input type="text" name="year" value="ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ" onClick="this.select();" />
</td>
</tr><tr>
<td>

 <input type="text" name="engine_code" value="ΚΩΔ. ΚΙΝΗΤΗΡΑ" onClick="this.select();"/>
 </td>
 </tr><tr>
<td>

 <input type="text" name="system" value="ΣΥΣΤΗΜΑ" onClick="this.select();" />
 </td>
</tr><tr>
 <td>

 <?php $insert->get_manufacturer(); ?>
 <input type="hidden" name="fubar"  value="fubar" />
 </td>

</tr><tr>
  <td ><input type="submit" class="special" value="Εισαγωγη" /></td>
</tr>
</table>
</form>
						</div>
					
					</section>
			<?php
if (isset($_POST['fubar'])){
	
	$brandId=$_POST['brandId'];
	
	$model=$_POST['model'];
	$engine_code=$_POST['engine_code'];
	$system=$_POST['system'];
	$manufacturer=$_POST['manufacturers'];
	
	$year=$_POST['year'];
	
	$insert->setbrandId($brandId);
	$insert->setmodel($model);
	$insert->setengine_code($engine_code);
	$insert->setsystem($system);
	$insert->setmanufacturerid($manufacturer);
	$insert->setyear($year);
	
	$insert->insert_auto();
	
	
}


?>		<?php } ?>
<?php if (isset($_GET['action']) && $_GET['action']=="update_model"){	 ?>	
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;">ΜΕΤΑΒΟΛΗ ΜΟΝΤΕΛΩΝ</div>
<section class="wrapper style2 container special-alt">

	<div >
	<form action="#" method="post">
  
<table >
<tr>
<td>
<?php $update->get_brand(); ?>
  </td>
<td>

 <input type="text" name="model" value="ΜΟΝΤΕΛΟ" onClick="this.select();" />
 </td>

<!--<td><label for="select">ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ</label>
   <input type="text" name="year" />
</td>-->
<td>

 <input type="text" name="engine_code" value="ΚΩΔ. ΚΙΝΗΤΗΡΑ" onClick="this.select();"/>
 <input type="hidden" name="fubar"  value="fubar"/>
 </td>
<!--<td>
<label for="select">ΣΥΣΤΗΜΑ</label>
 <input type="text" name="system" /></td>
<td>-->
<!--<label for="select">ΚΑΤΑΣΚΕΥΑΣΤΗΣ</label>
 <?php // $update->get_manufacturer(); ?>
 
 </td>-->


  <td ><input type="submit" class="special" value="Αναζητηση" /></td>
</tr>
</table>
</form>

	</div>

</section>
<?php
if (isset($_POST['fubar'])){

	$brandId=$_POST['brandId'];
	if ($_POST['model']=="ΜΟΝΤΕΛΟ"){
	$model="";
	}
	else{
	$model=$_POST['model'];
	}
	if ($_POST['engine_code']=="ΚΩΔ. ΚΙΝΗΤΗΡΑ"){
	$engine_code="";
	}
	else {
	
	$engine_code=$_POST['engine_code'];
	}
	/*$system=$_POST['system'];
	$manufacturer=$_POST['manufacturers'];
	$year=$_POST['year'];*/
	
	$update->setbrandId($brandId);
	$update->setmodel($model);
	$update->setengine_code($engine_code);
	//$update->setsystem($system);
	//$update->setmanufacturerid($manufacturer);
	//$update->setyear($year);
	
	


?>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">


		<?php $update->show_update_list(); 
		
		
		?>
</div>

</section>
<?php  } ?>
<?php  if (isset($_POST["sql"])){

	$sql=$_POST['sql'];
		$model_id=$_POST['model_id'];
		$model=$_POST['model_update'];
		$brandId=$_POST['brandId_update']; echo $brandId;
		$engine_code=$_POST['engine_code_update'];
		$system=$_POST['system_update'];
		$manufacturer=$_POST['manufacturers_update'];
		if ($manufacturer==""){
			$manufacturer=$_POST['manufacturers_current'];
		}
		$year=$_POST['year_update'];
	
	
		
		$update->setmodel_id($model_id);
		$update->setbrandId($brandId);
		$update->setmodel($model);
		$update->setengine_code($engine_code);
		$update->setsystem($system);
		$update->setmanufacturerid($manufacturer);
		$update->setyear($year);
		$update->set_sql_back($sql);
	
echo "<section class='wrapper style2 container special-alt' style='background:#1A1A1A; margin-top:0px; padding-top:2px;'>
<div style='background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;'>";	
		$update->updateModel(); 
		echo "</div></section>";
		} ?>
<?php  } ?>

<!--  admin generic defects  -->


<?php if (isset($_GET['action']) && $_GET['action']=="defects"){	 ?>	
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;">ΔΙΑΧΕΙΡΙΣΗ ΒΛΑΒΩΝ</div>
<section class="wrapper style2 container special-alt">

	<div >
	<form action="#" method="post">
  
<table >
<tr>
<td>
<?php $update->get_brand(); ?>
  </td>
<td>

 <input type="text" name="model" value="ΜΟΝΤΕΛΟ" onClick="this.select();" />
 </td>

<!--<td><label for="select">ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ</label>
   <input type="text" name="year" />
</td>-->
<td>

 <input type="text" name="engine_code" value="ΚΩΔ. ΚΙΝΗΤΗΡΑ" onClick="this.select();"/>
 <input type="hidden" name="fubar"  value="fubar"/>
 </td>
<!--<td>
<label for="select">ΣΥΣΤΗΜΑ</label>
 <input type="text" name="system" /></td>
<td>-->
<!--<label for="select">ΚΑΤΑΣΚΕΥΑΣΤΗΣ</label>
 <?php // $update->get_manufacturer(); ?>
 
 </td>-->


  <td ><input type="submit" class="special" value="Αναζητηση" /></td>
</tr>
</table>
</form>

	</div>

</section>
<?php
if (isset($_POST['fubar'])){

	$brandId=$_POST['brandId'];
	
	
	
	if ($_POST['model']=="ΜΟΝΤΕΛΟ"){
	$model="";
	}
	else{
	$model=$_POST['model'];
	}
	if ($_POST['engine_code']=="ΚΩΔ. ΚΙΝΗΤΗΡΑ"){
	$engine_code="";
	}
	else {
	
	$engine_code=$_POST['engine_code'];
	}
	
	$insert->setbrandId($brandId);
	$insert->setmodel($model);
	$insert->setengine_code($engine_code);
	


?>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">


		<?php 
		
		$insert->search_auto();
		
		?>
</div>

</section>
<?php  } ?>

<?php  } ?>

			</article>

		<!-- CTA -->
			

		<!-- Footer -->
			<footer id="footer">
			
				<ul class="icons">
					<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					<li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
				</ul>
				
				<ul class="copyright">
					<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
				</ul>
			
			</footer>

	</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$('#box').keyup(function(){
//alert("test");
   var valThis = $(this).val().toLowerCase();
    $('.navList>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
});


$('#box1').keyup(function(){
//alert("test");
   var valThis = $(this).val().toLowerCase();
    $('.navList>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
});

</script>