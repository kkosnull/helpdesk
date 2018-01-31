<div class="container">
<header style='text-align:left;'>
<h2 style='text-align:left;'><font style="font-size:2em">M</font>ΗΔΕΝΙΣΜΟΣ SERVICE</h2>
</header>

<?php if (isset($_SESSION["username"])){ 


?>
									

<?php  if (!$_POST["manufact_codes_search"]){ ?>							
		<div style="margin-top:10px;" id="search_Area">
		
				
				
	<?php
$defect->get_brands_reset();

?>



	</div>	
<?php } ?>

<?php if ($_POST["manufact_codes_search"]){ 

$brandId=$_POST['brandId'];
$manufacturer_code=$_POST['manufacturer_code'];
if ($manufacturer_code=="Kωδικος κατασκευαστη :"){

$manufacturer_code="Δεν υποβλήθηκε";
}
$defect->setbrandid($brandId);
$defect->set_man_code($manufacturer_code);


?>
<div style="margin-top:25px; font-weight:bold; fonr-size:1.1em; color:#FF7B00; "> 
<?php 
echo "Κατασκευαστής : ";

$defect->show_man_code_brand(); 
echo ", Κωδικός κατασκευαστή : ";
$defect->get_manufacturer_code(); 
?></div>
<div style="background:#1A1A1A;margin-top:25px; height:50%; padding:5px; line-height:1.23m;" id="codes_div" >

<div id="txtHint_codes_brands" class="shadow" style="color:#FFF"><?php $defect->show_man_code_result(); ?></div>


</div>
	


<?php } ?>
<?php } ?>
						</div>