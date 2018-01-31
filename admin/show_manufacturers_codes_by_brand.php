<?php
// Fill up array with names


//get the q parameter from URL
if (isset($_GET["id"])){
$id=$_GET["id"];
}

 $con = mysql_connect("db34.grserver.gr", "ironman", "xrt966@@");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("helpdesk", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT a.id, a.code, a.description, b.brand FROM `helpdesk`.`codes_manufacturers` a inner join `helpdesk`.`brands` b 
							on a.brand_id=b.id
							WHERE a.brand_id=".$id."
							ORDER BY b.`brand` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό' id='box_manufact_code2' type='text' class='hover' style='width:100%'/>";
						
						// select brands
						$sql_brands="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result_brands=mysql_query($sql_brands, $con);
						echo "<select name='brands_manufact_codes' id='brands_manufact_codes' onchange='show_brands_manufact_codes()' style='overflow:hidden;width:100%; margin-left:0px; color:#333; font-weight:bold' class='myselect'>";
								echo "<option value=''>ΕΠΙΛΟΓΗ ΜΑΡΚΑΣ</option>";
							while ($row = mysql_fetch_array($result_brands)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>";
					
				  
						// select brands
						
						echo"<ul class='navList_manufact' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['code']."</font>
							<form action='#' method='post'>
							
							<input type='text' class='hover' style='width:90%; float:left;  border:0px solid; cursor:pointer;' 
							value='".$row['brand']." : ".$row['code']."--> ".$row['description']."' readonly  onclick='show_update_code(".$row['id'].", 2)'>
							
							
							
							";
							
							echo "<input type='hidden' value='".$row['id']."' name='manufact_code_id'>";
	
	
						
	
	
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form><image src='images/delete_icon.png' style='cursor:pointer' onclick='delete_code(".$row['id'].", 1)' ></li>";
					}	

	echo "</ul>";	
					
					
					
						
				  }


?>