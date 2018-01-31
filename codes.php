<?php
// session_start(); ?>
<div class="container">
<header style='text-align:left;'>
<h2 style='text-align:left;'><font style="font-size:2em">Κ</font>ΩΔΙΚΟΙ ΚΑΤΑΣΚΕΥΑΣΤΗ
<span id="brand_header" style=" color:#007AFF; margin-left:30px;"><img src="images/blink2.gif"> </span></h2>
</header>

<?php if (isset($_SESSION["username"])){ 


?>
									

<?php  if (!$_POST["manufact_codes_search"]){ ?>							
		<div style="margin-top:10px;" id="search_Area">
		<form method="post" action="#">
				
				
	<?php
$defect->get_brands_manufact();

?>
<a href="#" class="tooltip">
<img src="images/bulb.png" style="float:left; cursor:pointer" onclick="$('#codes_modal').reveal();">
    
    <span>
        <img class="callout" src="images/callout.png" />
        Με ένα κλικ στην εικόνα αριστερά μπορείτε να δείτε όλους τους διαθέσιμους κωδικούς για τον κατασκευαστή.
		
    </span>
</a>
<input type="text" name="manufacturer_code" id="manufacturer_code_search" onkeyup="suggest_codes_manuf()" value="Kωδικος κατασκευαστη :" onClick="this.select();"  
style="height: 30px;
    padding: 0px;
    background-color: #cc;
    background: #777;
    color: #BEE920;
    float: left;
    margin-right: 20px;
	width:40%;
	margin-left: 2%;
	margin-top: 10px;" class="myselect">
<input type="submit" name="manufact_codes_search" style="margin-top:10px;height: 30px;padding-top: 7px;" value="Αναζήτηση">
<!--
<div id="codes_suggest" style=" color: #007AFF; margin-right:100px;
 background-image: url('images/bulb.png');
    background-repeat: no-repeat;
    
    background-position: 0% 0%;
width:90%;
height:100px;
padding-left:50px;
overflow:auto;	"></div>
-->
</form>
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