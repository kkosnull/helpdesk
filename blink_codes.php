<?php 
//session_start(); ?>
						<div class="container" >
						
						
						<?php if (isset($_SESSION["username"])){ ?>
<?php if (!$_POST["engine_serial_back_list"]){  ?>
							<header style='text-align:left;'>
								<h2 style='text-align:left;'><font style="font-size:2em">Β</font>link codes 
								<span id="brand_header" style=" color:#007AFF; margin-left:30px;"><img src="images/blink2.gif"> </span></h2>
								
							</header>
							<?php } ?>
<?php } ?>
						<!--	<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>-->
				
							<div style=" margin:10px;">
					

				<!--<div  style="height:100vh;">
				<h2><a href="login_user.php">Πρέπει να συνδεθείτε στο σύστημα</a></h2>
				</div>
-->
				
				<?php if (isset($_SESSION["username"])){ ?>


				
				<!-- One -->
				<?php if (!isset($_POST['fubar1'])&& !$_POST["search_defects_button"] && !$_POST["engine_serial_back_list"]){  ?>
							<form action="#" method="post" id="defects_search">
									<div class="row half collapse-at-2">
									
											<?php $insert->get_brand_blink(); ?>
										<input type="hidden" name="fubar1"  value="fubar"/>
										
										
										
										<!--	<select class="myselect" id="modelHint" name="engine_serial">
  <option value="0">ΚΩΔ. ΚΙΝΗΤΗΡΑ</option>

</select> -->
										
											<?php $insert->get_defect_categories(); ?>
										
										<input type="submit" class="special" value="Αναζήτηση"
										name="search_defects_button" style="margin-top:10px;height: 30px;padding-top: 7px;"/>
										
									</div>		
									
								
									
										
								</form>
								
				<?php } ?>	
								
								<?php
								
						
									
if (isset($_POST['fubar1'])&& $_POST["search_defects_button"] && !$_POST["engine_serial_back_list"]){


 	//$brandId=$_POST['brandId'];
	//$insert->setFieldValue($brandId);
	//$insert->setField("brand_id");
	$modelID=$_POST['modelid_visitor'];
	$brandId=$_POST['brandId'];
	$defect_cats_id=$_POST['defect_cats'];
	$engine_serial=$_POST['engine_serial'];
	
	$insert->set_defect_cats_id($defect_cats_id);
	$insert->setFieldValue($brandId);
	$insert->setField("brand_id");
	$insert->set_modelIDforDefect($modelID);
	$insert->setengine_code($engine_serial);
	
		//$insert->setField("defect_cats_id");
	
	echo "<script>playSound('sounds/button-30.mp3');</script>";
	
	$insert->search_auto_brand_visitor_blink();
 	
	
}  
	
if(isset($_POST['modelid'])) {

// return back variables



// return back variables	
if (isset($_POST["engine_serial_back_list"])){
$defect->set_engine_serial_back_list(1);
}
$prod_year=$_POST['prod_year'];
$engine_serial=$_POST['engine_serial'];
$model_id=$_POST['modelid'];
$defect_cats_id=$_POST['defect_cat'];
$sql=$_POST["sql_query_back"];
$anchor=$_POST["anchor"];

$defect->setmodel_id($model_id);
$defect->set_sql_back($sql);
$defect->setengine_code($engine_serial);
$defect->setyear($prod_year);
$defect->set_defect_cats_id($defect_cats_id);
$defect->set_anchor($anchor);

$defect->show_defects_blink__visitor();



/*
 if ($_SESSION['admin']==1) {
	$defect->show_defects();
 }
 else if ($_SESSION['admin']==0) {
	$defect->show_defects_visitor();
 }
*/
	
}	

else if (isset($_POST["sql_query_back"])){



	
	
	$brandId=$_POST['brand_id_back'];
	$defect_cats_id=$_POST['defect_cats_id_back'];
	$engine_serial=$_POST['engine_serial_back'];
	$anchor=$_POST['anchor_back'];
	
	
	$insert->set_anchor($anchor);
	$insert->set_defect_cats_id($defect_cats_id);
	$insert->setFieldValue($brandId);
	$insert->setField("brand_id");
	
	
	
	$insert->search_auto_brand_visitor_blink();
	$inputid=str_replace("list","input",$anchor);
	echo "<script>
	var item=document.getElementById('".$inputid."');
	
	item.style.color='White';
	item.style.background='Black';
	</script>";
	/* $sql_query=$_POST["sql_query_back"];
	$defect_cats_id=$_POST['defect_cat_back'];
	$defect->set_sql_back($sql_query);
	$defect->set_defect_cats_id($defect_cats_id);
	$defect->go_back();
	*/
		
}


	
?>		

<?php } ?>					
</div>

						</div>