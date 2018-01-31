<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
session_start();



include 'classes/users.php';
include 'classes/transactions.php';
include 'connection/credentials.php';

$login = new users();
$login->setdb($db);
$login->setUser($user);
$login->setPassword($password);

$users=new users();
$users->setdb($db);
$users->setUser($user);
$users->setPassword($password);
echo "  [";
$users->get_users(1);
echo " ";
$users->get_users(2);
echo " ";
$users->get_users(3);
echo " ";
$users->get_users(4);
echo "  ]";


if (!isset($_SESSION["admin"]) ){

header( 'Location: http://aniphelpdesk.com') ;
}
if (isset($_SESSION["admin"]) && $_SESSION["admin"]==0 ){

header( 'Location: http://aniphelpdesk.com/admin/admin.php') ;
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
		<title>Admin</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script  src="js/ajax_functions.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		
		<noscript>
		
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
			<link rel="stylesheet" href="css/upload.css" />
			
		</noscript>
<link rel="shortcut icon" href="favicon_red.ico" type="image/x-icon">
<link rel="icon" href="favicon_red.ico" type="image/x-icon">
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		
		    <link rel="stylesheet" href="chosen/chosen.css">
	</head>
	<body class="index">
	
		<!-- Header -->
			<header id="header" class="alt">
				<h1 id="logo"><?php echo $_SESSION["username"];  ?></h1>
				<nav id="nav">
					<ul>
						<li class="current"><span style='cursor:pointer' onclick='location.reload();'>REFRESH</span></li>
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
						<?php if (isset($_SESSION["username"])){?><li><a href="http://aniphelpdesk.com/logout_admin.php" >ΕΞΟΔΟΣ</a></li><?php } ?>
						<!-- <li><a href="index.php?action=register" >ΕΓΓΡΑΦΗ</a></li> -->
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
				<?php //if (isset($_SESSION["level"]) && $_SESSION["level"]==3){?>
				
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
				<?php //} ?>
				<?php //if (isset($_SESSION["level"]) && $_SESSION["level"]==3){?>
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
				<?php // } ?>
				<?php ?>
				<div class="inner">
					
					<header>
						<h3>ΧΡΗΣΤΕΣ</h3>
					</header>
					
					<footer>
						<ul class="buttons vertical">
							<li><a href="admin.php?action=admins" class="button fit scrolly">ΔΙΑΧΕΙΡΙΣΤΕΣ</a></li>
							<li><a href="admin.php?action=users" class="button fit scrolly">ΧΡΗΣΤΕΣ</a></li>
							<li><a href="admin.php?action=users_trial" class="button fit scrolly">ΧΡΗΣΤΕΣ TRIAL</a></li>
						</ul>
					</footer>
				
				</div>
				<?php ?>
			</section>
		
		<!-- Main -->
			<article id="main">

			<?php if (isset($_GET['action']) && $_GET['action']=="insert_brand"){	 ?>	
					<script type='text/javascript'>

window.location.assign('#insert_brand_section');
</script>
				<!-- One -->
				<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="insert_brand_section">ΕΙΣΑΓΩΓΗ ΜΑΡΚΑΣ/ΜΟΝΤΕΛΟΥ</div>
					<section class="wrapper style2 container special-alt" >
						<div style="-webkit-box-shadow: 0px 4px 5px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 4px 5px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 4px 5px 0px rgba(50, 50, 50, 0.75);
background-color:rgba(83, 179, 167, 0.5);
padding:10px;
margin-bottom:50px">

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
								<input type="submit" class="special" value="Εισαγωγη μαρκας" name="brand_submit"/>
								<input type="submit" class="special" value="Εισαγωγη κατασκευαστη" name="manufacturer_submit"/>
								</td>

								</tr>
								</table>

								</form>				
						</div>	
						<div style="-webkit-box-shadow: 0px 4px 5px 0px rgba(50, 50, 50, 0.75);
-moz-box-shadow:    0px 4px 5px 0px rgba(50, 50, 50, 0.75);
box-shadow:         0px 4px 5px 0px rgba(50, 50, 50, 0.75);
background-color:rgba(83, 179, 167, 0.5);
padding:10px;">
						<form action="#" method="post">
<table width="80%">
<tr>
<td>
<?php
if (isset($_POST['foobar'])) {

		//$brand=$_POST['brand'];
		//$manufacturer=$_POST['manufacturer'];
		if ($_POST['brand_submit']){
		if (isset($_POST['brand'])){
		
		$insert->setbrand($_POST['brand']);
		$insert->insert_brand();
		}
		}
		if ($_POST['manufacturer_submit']){
		if (isset($_POST['manufacturer'])){
		$insert->setmanufacturer($manufacturer);
		$insert->insert_manufacturer();
		}
		}
		
		//$insert->setMaxBrandId();
		
}
?>

<?php $insert->get_brand(); ?>
  </td>
  
  </tr><tr>
<td>


 <input type="text" id="model_check" name="model" value="ΜΟΝΤΕΛΟ" onClick="this.select(); "/>
 </td>
</tr><tr>
<td>

   <input type="text" id="year_check" name="year" value="ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ" onClick="this.select();" />
</td>
</tr><tr>
<td>

 <input type="text" id="engine_code_check" name="engine_code" value="ΚΩΔ. ΚΙΝΗΤΗΡΑ" onClick="this.select();exists()" />
 </td>
 </tr>
 <tr>
 <td>
 <p style="font-size:1.5em; font-weight:bold" id="model_check_reply"></p>
 </td>
 
 </tr>
 
 <tr>
 
<td>
<!--
 <input type="text" name="system" value="ΣΥΣΤΗΜΑ" onClick="this.select();" />
 -->
 <?php $insert->get_defect_category();?>
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
<form action="#" method="post" enctype="multipart/form-data">
<input type="hidden" name="feeder"  value="feeder" />
<input type="text" name="model_id_fed"  id="model_id_fed" value="" placeholder="Type model id here"/>
<br>
<input type="file" name="fileToUpload" id="fileToUpload" >
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ ΒΛΑΒΗΣ ΜΕ ΑΡΧΕΙΟ" />
</form>
<?php 
if (isset($_POST['feeder'])){
$target_file = $_FILES["fileToUpload"]["name"];
$model_id=$_POST['model_id_fed'];
echo $target_file." uploaded<hr>";

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "defect_files_feed/".$target_file)) {
       // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		$file_defect="defect_files_feed/".$target_file;
		$insert->set_file_feed($file_defect);
		$insert->setmodel_id($model_id);
		$insert->feed_defect();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
						</div>
					
					</section>
			<?php

if (isset($_POST['fubar'])){
	
	$brandId=$_POST['brandId'];
	
	$model=$_POST['model'];
	$engine_code=$_POST['engine_code'];
	$system=$_POST['defect_category'];
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
<script type='text/javascript'>

window.location.assign('#update_model_section');
</script>
	<div id="update_model_section">
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
<script type='text/javascript'>

window.location.assign('#defects_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" >ΔΙΑΧΕΙΡΙΣΗ ΒΛΑΒΩΝ</div>
<section class="wrapper style2 container special-alt">

	<div id="defects_section">
	<form action="#" method="post">
  
<table>
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

</tr><tr>
  <td  colspan="4">
  
   <input type="SUBMIT" class="special" value="Αναζητηση" />
   <hr>
   <a href="admin.php?action=add_vlavi"><input type="button" class="special" value="ΕΙΣΑΓΩΓΗ ΚΑΤΑΓΕΓΡΑΜΜΕΝΗΣ" /></a>
   <br>
   <a href="admin.php?action=add_blink"><input type="button" class="special" value="ΕΙΣΑΓΩΓΗ BLINK CODE" /></a>
   </td>
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
<?php if (isset($_POST['modelid'])){

$prod_year=$_POST['prod_year'];
$engine_serial=$_POST['engine_serial'];
$model_id=$_POST['modelid'];
$defect_cats_id=$_POST['defect_cat'];
//$sql=$_POST["sql_query"];


$defect->setmodel_id($model_id);
//$defect->set_sql_back($sql);
$defect->setengine_code($engine_serial);
$defect->setyear($prod_year);
$defect->set_defect_cats_id($defect_cats_id);
?>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">
<?php
	$defect->show_defects();
	
	?>
	</div></section>
<?php }
 
 

if ($_POST["delete_defect"]){
//echo "testt";
$id=$_POST["delete"];


$sql_back=$_POST['sql_defects'];
//echo $sql_back;
$defect->set_defect_id($id);

$defect->set_sql_back($sql_back);
?>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">
<?php
	$defect->deleteDefect();
	?>
	</div></section>
	
<?php	}
?>




 
<?php
 
if ($_POST["update_defect"]){
$brand=$_POST["brand_update_form"];
$model=$_POST["model_update_form"];
$serial=$_POST["engine_serial"];
$prod_year=$_POST["prod_year"];

$cat=$_POST["defect_cat"];
//echo "testt";
$id=$_POST["delete"];
//echo $id;
$defect->set_defect_id($id);
$defect->set_model_text($model);
$defect->set_brand_text($brand);
$defect->setengine_code($serial);
$defect->setyear($prod_year);
?>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;" id="update_model_response">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">
<?php
	$defect->update_defect();
	?>
	</div></section>
	
<?php	}
if($_POST["update_defect_exec"]){
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 5000*100; //100 kb
$path = "uploads/"; // Upload directory
$count = 0;

$sql=$_POST["sql_defects"];
$defectid=$_POST["delete"];
$cause=$_POST["cause"];
$description=$_POST["description"];
$title=$_POST["title"];




	// Loop $_FILES to exeicute all files
	//var_dump($_FILES['files']['name']);
	foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}
	        else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name))
	            $count++; // Number of successfully uploaded file
	        }
	    }
	}
	


$files=$_FILES['files']['name'];
$files=implode(" ",$files);
$defect->set_files($files);

$defect->set_defect_id($defectid);
$defect->set_cause($cause);
$defect->set_solution($description);
$defect->set_description($title);
	?>
	<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;">
	<?php
	$defect->update_defect_exec();?>
	</div></section>
	<?php
}
?>


<?php  } ?>


<?php if (isset($_GET['action']) && $_GET['action']=="add_vlavi"){	?>	

<script type='text/javascript'>

window.location.assign('#genikes_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="genikes_div">ΕΙΣΑΓΩΓΗ ΒΛΑΒΩΝ</div>

<section class="wrapper style2 container special-alt" id="eobd_section">

	<div id="genikes_section">
	
<form action="#" method="post">
ΕΠΙΛΟΓΗ ΜΟΝΤΕΛΩΝ ΑΝΑ ΚΑΤΑΣΚΕΥΑΣΤΗ
<?php $insert->get_brand_add_vlavi(); ?><span id='models_by_brand'></span>

<input type="submit" class="special" value="ΑΝΑΖΗΤΗΣΗ" name="modelsbybrand"/>
&nbsp; &nbsp; 
<input name="allmodels" type="submit" class="special" value="ΠΡΟΒΟΛΗ ΟΛΩΝ" />
</form>
<form action="#" method="post">

<?PHP
if ($_POST["modelsbybrand"]){
$brand_id=$_POST["brandId"];

$insert->setbrandid($brand_id);
$insert->get_model_per_brand();
//$insert->get_serials_per_model($model_id);

}
if ($_POST["allmodels"]){
$insert->get_all_models();

}
?>


  
<!--
<input type="text" name="vlavi_year" placeholder="ΧΡΟΝΟΛΟΓΙΑ ΠΑΡΑΓΩΓΗΣ" onClick="this.select();" style="margin:10px;">

<input type="text" name="engine_serial" placeholder="ΚΩΔΙΚΟΣ ΚΙΝΗΤΗΡΑ (* αφήστε κενό για συνολική εγγραφή)" onClick="this.select();"  style="margin:10px;">
-->
<?php $update->get_defect_categories(); ?>


<textarea name='defect_insert_title' id='defect_descr' cols='40' rows='5' style='width:100%; color:#7c8081; font-weight:bold;'>Περιγραφή</textarea>
<script type='text/javascript'>
														CKEDITOR.replace( 'defect_descr');
													</script>

<textarea name='defect_insert_cause' id='defect_cause' cols='40' rows='10' style='width:100%'>Αιτία</textarea>
										 <script type='text/javascript'>
														CKEDITOR.replace( 'defect_cause');
													</script>
<textarea name='defect_insert_solution' id='details_defects' cols='40' rows='10' style='width:100%'>Λύση</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details_defects');
													</script>
												<input type="hidden" name="defect_insert_hidden" value="ΚΩΔΙΚΟΣ ΒΛΑΒΗΣ" >
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ" />
<a href="admin.php?action=eobd_updates" ><input type="button" class="special" value="ΠΡΟΒΟΛΗ/ΑΛΛΑΓΕΣ" name="eobd_updates"/></a>

 
</form>
<?php


if (isset($_POST["defect_insert_hidden"])){

//$brand_id=$_POST["brandId"];
$vlavi_year=$_POST["vlavi_year"];
$defect_cat=$_POST["defect_cats"];
$engine_serials=$_POST['models'];

$defect_title=$_POST["defect_insert_title"];
$defect_cause=$_POST["defect_insert_cause"];
$defect_solution=$_POST["defect_insert_solution"];

$models=$_POST['models'];


//$insert->setbrandid($brand_id);
$insert->set_defect_category($defect_cat);
$insert->setyear($vlavi_year);
$insert->set_serials($engine_serials);
$insert->set_description($defect_title);
$insert->set_cause($defect_cause);
$insert->set_solution($defect_solution);
$insert->insert_defect();
//echo $defect_cat;
}

?>
	</div>

</section>



<?php  } ?>

<!--

blink codes section

-->

<?php if (isset($_GET['action']) && $_GET['action']=="add_blink"){	?>	

<script type='text/javascript'>

window.location.assign('#blink_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="blink_div">ΕΙΣΑΓΩΓΗ BLINK CODES</div>

<section class="wrapper style2 container special-alt" id="blink_section">

	<div id="blink_section1">
	
	<form action="#" method="post">
ΕΠΙΛΟΓΗ ΜΟΝΤΕΛΩΝ ΑΝΑ ΚΑΤΑΣΚΕΥΑΣΤΗ
<?php $insert->get_brand_add_vlavi(); ?><span id='models_by_brand'></span>

<input type="submit" class="special" value="ΑΝΑΖΗΤΗΣΗ" name="modelsbybrand"/>
&nbsp; &nbsp; 
<input name="allmodels" type="submit" class="special" value="ΠΡΟΒΟΛΗ ΟΛΩΝ" />
</form>
<form action="#" method="post" enctype="multipart/form-data">

<?PHP
if ($_POST["modelsbybrand"]){
$brand_id=$_POST["brandId"];

$insert->setbrandid($brand_id);
$insert->get_model_per_brand();
//$insert->get_serials_per_model($model_id);

}
if ($_POST["allmodels"]){
$insert->get_all_models();

}
?>

<?php $update->get_defect_categories(); ?>
<input type="text" name="blink_code_title" value="ΤΙΤΛΟΣ BLINK CODE" onClick="this.select();">
<input type="file" name="blinkfiletoupload" id="blinkfiletoupload">
<br>
    <input type="submit" value="ΕΙΣΑΓΩΓΗ" name="blinksubmit">

</form>
<?php

if ($_POST["blinksubmit"]){
	
	$blink_title=$_POST["blink_code_title"];
	$defect_cat=$_POST["defect_cats"];
	$engine_serials=$_POST['models'];
	$file = $_FILES["blinkfiletoupload"]["name"];
	
	$insert->set_defect_category($defect_cat);
	$insert->set_serials($engine_serials);
	$insert->set_description($blink_title);
	$insert->set_solution($file);
	$insert->insert_blink_code();
	/*
	echo $blink_title;
	echo "<br>";
	echo $defect_cat;
	echo "<br>";
	echo $engine_serials;
	echo "<br>";
	echo $file;
	*/
}

?>
	</div>

</section>



<?php  } ?>

<!--

#### blink codes section 


-->



<?php if (isset($_GET['action']) && $_GET['action']=="add_defect"){	 ?>	
<script type='text/javascript'>

window.location.assign('#eobd_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="eobd_div">ΕΙΣΑΓΩΓΗ ΒΛΑΒΩΝ</div>
<section class="wrapper style2 container special-alt" id="eobd_section">

	<div id="eobd_section">
	
<form action="#" method="post">
  
<input type="text" name="eobd_code_insert" value="ΚΩΔΙΚΟΣ ΒΛΑΒΗΣ" onClick="this.select();">

<textarea name='eobd_code_insert_description' id='details' cols='40' rows='10' style='width:100%'>Περιγραφή</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details');
													</script>
												<input type="hidden" name="eobd_code_insert_hidden" value="ΚΩΔΙΚΟΣ ΒΛΑΒΗΣ" >
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ" />
<a href="admin.php?action=eobd_updates" ><input type="button" class="special" value="ΠΡΟΒΟΛΗ/ΑΛΛΑΓΕΣ" name="eobd_updates"/></a>

 
</form>

	</div>

</section>



<?php  } ?>


<?php if (isset($_GET['action']) && $_GET['action']=="eobd"){	 ?>	
<script type='text/javascript'>

window.location.assign('#eobd_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="eobd_div">ΕΙΣΑΓΩΓΗ EOBD ΚΩΔΙΚΩΝ</div>
<section class="wrapper style2 container special-alt" id="eobd_section">

	<div id="eobd_section">
	
<form action="#" method="post">
  
<input type="text" name="eobd_code_insert" value="ΚΩΔΙΚΟΣ ΒΛΑΒΗΣ" onClick="this.select();">

<textarea name='eobd_code_insert_description' id='details' cols='40' rows='10' style='width:100%'>Περιγραφή</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details');
													</script>
												<input type="hidden" name="eobd_code_insert_hidden" value="ΚΩΔΙΚΟΣ ΒΛΑΒΗΣ" >
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ" />
<a href="admin.php?action=eobd_updates" ><input type="button" class="special" value="ΠΡΟΒΟΛΗ/ΑΛΛΑΓΕΣ" name="eobd_updates"/></a>

 
</form>
<?php

if (isset($_POST["eobd_code_insert_hidden"])){

$code=$_POST["eobd_code_insert"];
$description=$_POST["eobd_code_insert_description"];

$insert->set_eobd_code($code);
$insert->set_eobd_description($description);
$insert->insert_eobd();
}

?>
	</div>

</section>



<?php  } ?>

<?php if (isset($_GET['action']) && $_GET['action']=="eobd_updates"){

?>
<script type='text/javascript'>

window.location.assign('#eobd_div_updates');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto; height:100%; " id="eobd_div_updates">ΜΕΤΑΒΟΛΕΣ EOBD ΚΩΔΙΚΩΝ</div>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;height:100%;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;overflow:auto " id="eobd_codes_container">
<?php
$defect->get_eobd_codes();
if (isset($_POST["eobd_back"])){
$defect->get_eobd_codes();
}
?>
	</div></section>
	
<?php	}
?>



<?php if (isset($_GET['action']) && $_GET['action']=="manufacturers_codes"){	 ?>	




<script type='text/javascript'>

window.location.assign('#manufacturers_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" >ΕΙΣΑΓΩΓΗ ΚΩΔΙΚΩΝ ΚΑΤΑΣΚΕΥΑΣΤΩΝ, A/C, AIRBAG</div>
<section class="wrapper style2 container special-alt">

	<div id="manufacturers_section">
	
<form action="#" method="post">
  
<input type="text" name="manufacturer_code" value="ΚΩΔΙΚΟΣ (ΚΑΤΑΣΚΕΥΑΣΤΗ, A/C, AIRBAG)" onClick="this.select();">

<?php
$update->get_brands_multiple();

?>
<textarea name='description_details_manuf' id='details_manuf' cols='40' rows='10' style='width:100%'>Περιγραφή</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details_manuf');
													</script>
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ ΚΩΔΙΚΟΥ ΚΑΤ/ΣΤΗ" name="manufacturers_code_insert_button" /><br>
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ ΚΩΔΙΚΟΥ A/C" name="ac_code_insert_button" /><br>
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ ΚΩΔΙΚΟΥ AIRBAG" name="airbag_code_insert_button" /><br>
 <a href="admin.php?action=manufacturers_updates" ><input type="button" class="special" value="ΠΡΟΒΟΛΗ/ΑΛΛΑΓΕΣ" name="manufacturers_updates"/></a>
</form>
	</div>
<?php

if ($_POST["manufacturers_code_insert_button"]){


$code=$_POST["manufacturer_code"];
$brandids=$_POST["brands"];
$description=$_POST["description_details_manuf"];

$insert->set_man_code($code);
$insert->set_brandIDs($brandids);
$insert->set_man_code_description($description);

$insert->insert_manufacturer_code();

//echo "insert manufacturer";
}
else if ($_POST["ac_code_insert_button"]){


$code=$_POST["manufacturer_code"];
$brandids=$_POST["brands"];
$description=$_POST["description_details_manuf"];

$insert->set_man_code($code);
$insert->set_brandIDs($brandids);
$insert->set_man_code_description($description);

$insert->insert_ac_code();

//echo "insert ac code";
}
else if ($_POST["airbag_code_insert_button"]){


$code=$_POST["manufacturer_code"];
$brandids=$_POST["brands"];
$description=$_POST["description_details_manuf"];

$insert->set_man_code($code);
$insert->set_brandIDs($brandids);
$insert->set_man_code_description($description);

$insert->insert_airbag_code();

//echo "insert airbag code";
}
?>
</section>



<?php  } ?>

<?php if (isset($_GET['action']) && $_GET['action']=="manufacturers_updates"){

?>
<script type='text/javascript'>

window.location.assign('#manufacturers_div_updates');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="manufacturers_div_updates">ΜΕΤΑΒΟΛΕΣ ΚΩΔΙΚΩΝ ΚΑΤΑΣΚΕΥΑΣΤΩΝ</div>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;" id="manufacturers_codes_container">

<?php
if (isset($_POST["manufact_codes_dummy"])){
$id=$_POST["brands_manufact_codes"];
$defect->setbrandid($id);
$defect->get_manufacturers_codes_byid();
}
else if (isset($_POST["manufact_back"])){
$id=$_POST["brand_id"];
$defect->setbrandid($id);

$defect->get_manufacturers_codes_byid();
}
else {
$defect->get_manufacturers_codes();
}


?>
	</div></section>
	
<?php	}
?>


<!-- users section -->






<?php if (isset($_GET['action']) && $_GET['action']=="admins"){	 ?>	
<script type='text/javascript'>

window.location.assign('#admins_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="eobd_div">ΔΙΑΧΕΙΡΙΣΤΕΣ</div>
<section class="wrapper style2 container special-alt" id="admins_section">

	<div >
	
<form action="#" method="post">


<input type="text" name="new_admin_username" id="new_admin_username" value="ΟΝΟΜΑ ADMIN (*)" onClick="this.select();" onKeyUp="checkifExists(1)">
<input type="text" name="new_admin_password" id="new_admin_password" value="ΚΩΔΙΚΟΣ ADMIN (*)" onClick="this.select();">
<input type="text" name="new_admin_email" id="new_admin_email" value="EMAIL" onClick="this.select();">
<input type="text" name="new_admin_name" id="new_admin_name" value="ΟΝΟΜΑ/ΕΠΩΝΥΜΟ (*)" onClick="this.select();">


<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ" name="insert_new_admin_button"/>


 
</form>

<?php

if ($_POST["insert_new_admin_button"]){
if (isset($_POST["new_admin_username"]) && isset($_POST["new_admin_password"]) && isset($_POST["new_admin_name"]) ){

$new_admin_username=$_POST["new_admin_username"];
$new_admin_password=$_POST["new_admin_password"];
$new_admin_email=$_POST["new_admin_email"];
$new_admin_name=$_POST["new_admin_name"];


$users->set_username($new_admin_username);
$users->set_password($new_admin_password);
$users->set_email($new_admin_email);
$users->set_comp_name($new_admin_name);

$users->insert_admin();
//header('Location: http://zeromod.eu/auto_new/admin.php?action=admins');
//echo "<h2 style='color:#fff'>Επιτυχης καταχωρηση.</h2>";
unset($users->admin_username);
unset($users->admin_password);
unset($users->email);
unset($users->comp_name);

}
else {
echo "<h2 style='color:#fff'>Τα πεδιά με αστερίσκο είναι υποχρεωτικά</h2>";
}
}

?>
	</div>

</section>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="manufacturers_div_updates">ΜΕΤΑΒΟΛΕΣ ΔΙΑΧΕΙΡΙΣΤΩΝ</div>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;" id="users_container">
<?php 
if (!isset($_POST["admin_id"])){
 $users->get_admin_list();
}
if (isset($_POST["admin_id"])){
$admin_id=$_POST["admin_id"];
$users->set_admin_id($admin_id);
 $users->show_clicked_admin();
}
if (isset($_POST["admin_id"]) && $_POST["disable_admin"]){
$admin_id=$_POST["admin_id"];
$users->set_admin_id($admin_id);
 $users->disable_admin();
}
if (isset($_POST["admin_id"]) && $_POST["enable_admin"]){
$admin_id=$_POST["admin_id"];
$users->set_admin_id($admin_id);
 $users->enable_admin();
}
if (isset($_POST["admin_id"]) && $_POST["update_admin"]){

$admin_id=$_POST["admin_id"];
$username=$_POST["admin_username"];
$username_rollback=$_POST["admin_username_hidden"];
$password=$_POST["admin_password"];

$email=$_POST["admin_email"];
$comp_name=$_POST["admin_comp_name"];



$users->set_admin_id($admin_id);

$users->set_username($username);
$users->set_username_hidden($username_rollback);
$users->set_password($password);
$users->set_email($email);
$users->set_comp_name($comp_name);

 $users->update_admin();

}

?>
</div>
</section>


<?php  } ?>


<?php if (isset($_GET['action']) && $_GET['action']=="users"){	 ?>	
<script type='text/javascript'>

window.location.assign('#users_section');
</script>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="users_div">ΧΡΗΣΤΕΣ</div>
<section class="wrapper style2 container special-alt" id="users_section">
	<div >
	<h2>ΕΠΙΒΕΒΑΙΩΣΗ ΧΡΗΣΤΗ</h2>
	<input type="text" name="username_checker" id="username_checker" value="ΕΙΣΑΓΕΤΕ ΟΝΟΜΑ ΧΡΗΣΤΗ" onClick="this.select();" onkeyup="check_username()">
	<div style="height:60px;" id="check_username_result"></div>
	<hr>
	</div>
	<div >
	<h2>Δημιουργια χρηστων</h2>
<form action="#" method="post">
<input type="text" name="usernames_number" id="usernames_number" value="ΕΙΣΑΓΕΤΕ ΑΡΙΘΜΟ ΧΡΗΣΤΩΝ" onClick="this.select();">
<input type="text" name="usernames_duration" id="usernames_number" value="ΕΙΣΑΓΕΤΕ ΔΙΑΡΚΕΙΑ ΧΡΗΣΤΩΝ ΣΕ ΗΜΕΡΕΣ" onClick="this.select();">
<input type="submit" class="special" value="ΔΗΜΙΟΥΡΓΙΑ TRIAL" name="usernames_generate"/>
<input type="submit" class="special" value="ΔΗΜΙΟΥΡΓΙΑ STANDARD" name="usernames_generate_standard"/>
</form>
<br>
<h2>Εισαγωγη χρηστη</h2>

<form action="#" method="post">


<input type="text" name="new_user_username" id="new_user_username" value="ΟΝΟΜΑ ΧΡΗΣΤΗ (*)" onClick="this.select();" onKeyUp="checkifExists(2)">
<input type="text" name="new_user_password" id="new_user_password" value="ΚΩΔΙΚΟΣ ΧΡΗΣΤΗ (*)" onClick="this.select();">
<input type="text" name="new_user_name" id="new_user_name" value="ΟΝΟΜΑ/ΕΠΩΝΥΜΟ(*)" onClick="this.select();">
<input type="text" name="new_user_email" id="new_user_email" value="EMAIL" onClick="this.select();">
<input type="text" name="new_user_tel" id="new_user_tel" value="ΤΗΛΕΦΩΝΟ" onClick="this.select();">
<input type="text" name="new_user_fax" id="new_user_fax" value="FAX" onClick="this.select();">
<input type="text" name="new_user_cell" id="new_user_cell" value="ΚΙΝΗΤΟ" onClick="this.select();">
<input type="text" name="new_user_addr" id="new_user_addr" value="ΔΙΕΥΘΥΝΣΗ" onClick="this.select();">
<select name="chat_select" class="myselect" style="width:98%">
  <option value="1">Chat</option>
  <option value="0">No chat</option>
</select>

<select name="membership" class="myselect" style="width:98%">
				<option value="0">Πρόγραμμα συνδρομής</option>
				<option value="1">1 Ημέρα - 2 €</option>
				<option value="30">1 Μήνας - 10 €</option>
				<option value="365">1 Χρόνος - 100 €</option>
</select>

<br>
<input type="submit" class="special" value="ΕΙΣΑΓΩΓΗ" name="insert_new_user_button"/>



 
</form>

<?php
if ($_POST["usernames_generate"]){

$usernames_number=$_POST["usernames_number"];
$usernames_duration=$_POST["usernames_duration"];
$users->set_users_no($usernames_number);
$users->set_users_duration($usernames_duration);

$users->generate_trial_users();
}

if ($_POST["usernames_generate_standard"]){

$usernames_number=$_POST["usernames_number"];
$usernames_duration=$_POST["usernames_duration"];
$users->set_users_no($usernames_number);
$users->set_users_duration($usernames_duration);

$users->generate_standard_users();
}


if ($_POST["insert_new_user_button"]){
if (isset($_POST["new_user_username"]) && isset($_POST["new_user_password"]) && isset($_POST["new_user_name"]) ){

$new_user_username=$_POST["new_user_username"];
$new_user_password=$_POST["new_user_password"];
$new_user_email=$_POST["new_user_email"];
$new_user_name=$_POST["new_user_name"];
$new_user_tel=$_POST["new_user_tel"];
$new_user_fax=$_POST["new_user_fax"];
$new_user_cell=$_POST["new_user_cell"];
$new_user_addr=$_POST["new_user_addr"];
$chat=$_POST["chat_select"];
$membership=$_POST['membership'];
$admin_username=$_SESSION["username"];

$users->set_username($new_user_username);
$users->set_password($new_user_password);
$users->set_email($new_user_email);
$users->set_comp_name($new_user_name);
$users->set_phone($new_user_tel);
$users->set_fax($new_user_fax);
$users->set_mobile($new_user_cell);
$users->set_comp_adress($new_user_addr);
$users->set_chat($chat);
$users->set_membership($membership);
$users->set_administrator($admin_username);

$users->insert_user();
//header('Location: http://zeromod.eu/auto_new/user.php?action=users');
//echo "<h2 style='color:#fff'>Επιτυχης καταχωρηση.</h2>";
unset($users->user_username);
unset($users->user_password);
unset($users->email);
unset($users->comp_name);
unset($users->phone);
unset($users->fax);
unset($users->mobile);
unset($users->comp_adress);

}
else {
echo "<h2 style='color:#fff'>Τα πεδιά με αστερίσκο είναι υποχρεωτικά</h2>";
}
}

?>
	</div>

</section>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="manufacturers_div_updates">ΜΕΤΑΒΟΛΕΣ ΧΡΗΣΤΩΝ</div>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;" id="users_container">
<?php 
if (!isset($_POST["user_id"])){
 $users->get_user_list();
}
if (isset($_POST["user_id"])){
$user_id=$_POST["user_id"];
$users->set_user_id($user_id);
 $users->show_clicked_user();
}
if (isset($_POST["user_id"]) && $_POST["enable_user"]){
$user_id=$_POST["user_id"];
$users->set_user_id($user_id);
 $users->enable_user();
}
if (isset($_POST["user_id"]) && $_POST["disable_user"]){
$user_id=$_POST["user_id"];
$users->set_user_id($user_id);
 $users->disable_user();
}
if (isset($_POST["user_id"]) && $_POST["unlock_user"]){
$user_id=$_POST["user_id"];
$users->set_user_id($user_id);
 $users->unlock_user();
}
if (isset($_POST["user_id"]) && $_POST["unlock_ips"]){
$user_id=$_POST["user_id"];
$users->set_user_id($user_id);
$users->unlock_ips();

}
if (isset($_POST["user_id"]) && $_POST["update_user"]){

$user_id=$_POST["user_id"];
$username=$_POST["user_username"];
$username_rollback=$_POST["user_username_hidden"];
$password=$_POST["user_password"];

$email=$_POST["user_email"];
$comp_name=$_POST["user_comp_name"];
$phone=$_POST["user_comp_phone"];
$mobile=$_POST["user_mobile"];
$fax=$_POST["user_comp_fax"];
$adress=$_POST["user_comp_adress"];


$users->set_user_id($user_id);

$users->set_username($username);
$users->set_username_hidden($username_rollback);
$users->set_password($password);
$users->set_email($email);
$users->set_comp_name($comp_name);

$users->set_comp_adress($adress);
$users->set_comp_phone($phone);
$users->set_fax($fax);
$users->set_mobile($mobile);

$users->update_user();

}

?>
</div>
</section>


<?php  } ?>



<?php if (isset($_GET['action']) && $_GET['action']=="users_trial"){	 ?>	
<script type='text/javascript'>

window.location.assign('#users_section');
</script>

<section class="wrapper style2 container special-alt" id="users_section">

	

</section>
<div style="padding-top:0px;padding-left:2.3%; padding-right:auto;" id="manufacturers_div_updates">ΜΕΤΑΒΟΛΕΣ ΧΡΗΣΤΩΝ TRIAL</div>
<section class="wrapper style2 container special-alt" style="background:#1A1A1A; margin-top:0px; padding-top:2px;">
<div style="background:#1A1A1A;margin-top:25px; height:100%; width:100%; font-size:0.7em;" id="users_container">
<?php 
if (!isset($_POST["user_id"])){
 $users->get_trial_user_list();
}
if (isset($_POST["user_id_trial"])){
$user_id=$_POST["user_id_trial"];
$users->set_user_id($user_id);
 $users->reset_trial_user();
}



?>
</div>
</section>


<?php  } ?>
			</article>

		
			<footer id="footer">
			<!-- 
				<ul class="icons">
					<li><a href="#" class="icon circle fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon circle fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon circle fa-google-plus"><span class="label">Google+</span></a></li>
					<li><a href="#" class="icon circle fa-github"><span class="label">Github</span></a></li>
					<li><a href="#" class="icon circle fa-dribbble"><span class="label">Dribbble</span></a></li>
				</ul>
				-->
				<ul class="copyright" style="color:#82BAD2; font-weight:bold;">
					<!-- <li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">anip</a></li> -->
					<li><a style="text-decoration: none;" href="http://aniphelpdesk.com/registration_logs/users_registered.txt" target="_blank">Εγγραφές συνδρομητών</a></li>
					<li><a style="text-decoration: none;" href="http://aniphelpdesk.com/registration_logs/trial_users_registered.txt" target="_blank">Εγγραφές TRIAL</a></li>
					<li><a style="text-decoration: none;" href="http://aniphelpdesk.com/registration_logs/demo_users_registered.txt" target="_blank">Εγγραφές demo </a></li>
					<li><a style="text-decoration: none;" href="http://aniphelpdesk.com/cronjobs/unblock_ips.php" target="_blank">Καθαρισμός μπλοκαριμένων ip</a></li>			
				</ul>
			
			</footer>

	</body>
</html>

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
   var valThis1 = $(this).val().toLowerCase();
    $('.navList1>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis1) == 0) ? $(this).show() : $(this).hide();            
   });
});

$('#box2').keyup(function(){
//alert("test");
   var valThis2 = $(this).val().toLowerCase();
   
    $('.navList1>li').each(function(){
     var text1 = $(this).text().toLowerCase();
	
	text1=text1.split(";;;");
	//alert(text1[1]);
        (text1[1].indexOf(valThis2) == 0) ? $(this).show() : $(this).hide();            
   });
});

$('#box_eobd').keyup(function(){
//alert("test");
   var valThis3 = $(this).val().toLowerCase();
   
    $('.navList_eobd>li').each(function(){
     var text2 = $(this).text().toLowerCase();
         (text2.indexOf(valThis3) == 0) ? $(this).show() : $(this).hide();         
   });
});

// search for manufacturers codes

$('#box_manufact_code').keyup(function(){

   var valThis_manufact = $(this).val().toLowerCase();
    $('.navList_manufact>li').each(function(){
     var text01 = $(this).text().toLowerCase();
        (text01.indexOf(valThis_manufact) == 0) ? $(this).show() : $(this).hide();            
   });
});

// search users

$('#user_name').keyup(function(){
//alert("test");
   var valThis = $(this).val().toLowerCase();
    $('.navList_users>li').each(function(){
     var text = $(this).text().toLowerCase();
        (text.indexOf(valThis) == 0) ? $(this).show() : $(this).hide();            
   });
});



</script>