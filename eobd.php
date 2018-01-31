<?php 
//session_start(); ?>
<div class="container" >
<?php if (isset($_SESSION["username"])){ ?>
							<header style='text-align:left;'>
								<h2 style='text-align:left;'><font style="font-size:2em">Κ</font>ωδικοί EOBD</h2>
							</header>
							<!--
							<div id="eobd_codes_suggest" style=" color: #007AFF; 
								margin-right:10px; 
 background-image: url('images/bulb.png');
    background-repeat: no-repeat;
    
    background-position: 0% 0%;
width:80%;
height:50px;
padding-left:50px;
overflow:auto;	"></div>
-->
<?php } ?>
						<!--	<a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>-->
							
							<div style="margin-top:10px;">

	<?php// if (!isset($_SESSION["username"])){ ?>

	<!--
				<div  style="height:100vh;">
				<h2><a href="login_user.php">Πρέπει να συνδεθείτε στο σύστημα</a></h2>
				</div>
-->
				<?php// } ?>
				<?php if (isset($_SESSION["username"])){ ?>				
<!--				
<img src="images/bulb.png" style="float:left; cursor:pointer" onclick="$('#codes_modal').reveal();">
							-->
<input type="text" name="eobd_code" id="eobd_code_field" placeholder="Κωδικος EOBD : 

 π.χ.(Pxxxx, Uxxxx)" onClick="this.select();" onkeyup="showHint(this.value);" onkeydown="suggest_eobd(this.value);" style="padding:10px; width:100%" class="myselect">
 
<input type="text" name="eobd_code_aux" placeholder="Βοηθητική αναζήτηση, αν δε βρεθεί κωδικός από το παραπάνω πεδίο." 
onClick="this.select();" onkeyup="showHint_auxilary(this.value)"  style="padding:10px; width:100%" class="myselect">
		
</div>	
	

<div style="background:#1A1A1A;margin-top:25px; height:400px;padding:5px;overflow-y:auto;" id="codes_div">
<div style="position:absolute;left:95%; top:220px;">
<img src="images/zoom_in.png" onclick="zoomIn()" style="cursor:pointer">
<br>
<img src="images/zoom_out.png" onclick="zoomOut()" style="cursor:pointer">
</div>
<div id="txtHint"  style="color:#FFF;font-family: 'Ubuntu Mono'; padding-left:15px;">Περιγραφή κωδικού βλάβης EOBD</div>
<?php } ?>
</div>

						</div>