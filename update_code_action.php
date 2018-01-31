<?php
include 'connection/credentials.php';


//get the q parameter from URL
if (isset($_GET["id"])){
$id=$_GET["id"];

}
if (isset($_GET["type"])){
$type=$_GET["type"];

}
if (isset($_GET["code"])){
$code=$_GET["code"];

}

if (isset($_GET["description"])){
$description=$_GET["description"];

}
//lookup all hints from array if length of q>0

 //echo $q;
$con = mysql_connect("db34.grserver.gr", $user, $password);
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
					
					if($type==1){
						
					$sql="UPDATE `helpdesk`.`eobd` SET `code`=".$code.", `description`=".$description." WHERE `id`=".$id."";
					
					//echo $sql;
					mysql_query($sql, $con);
					
					$sql="SELECT * FROM `helpdesk`.`eobd` WHERE `id`=".$id."";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
					
	 
						while ($row = mysql_fetch_array($result)) {	
						$code=$row['code'];
						$description=$row['description'];
						
					}	
echo "

	<div id='eobd_section'>
	
<form action='#' method='post'>
  
<input type='text' id='eobd_code' value='".$code."' onClick='this.select();'>

<textarea name='eobd_description' id='eobd_description' cols='40' rows='10' style='width:100%'>".$description."</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details', {
												toolbar : 'Basic'
											} );
													</script>
													<input type='hidden' id='eobd_hidden' value='".$id."'>
													<input type='hidden' id='code_type' value='".$type."'>
													<input type='hidden' id='code_type' value='".$sql."'>
<input type='button'  value='ΜΕΤΑΒΟΛΗ'   onClick='update_code_execute(".$id.",".$type.")'/>
<input type='submit'  value='ΕΠΙΣΤΡΟΦΗ'   name='eobd_back'/>


 
</form>
	";

						}	
					
if($type==2){
						
					$sql="UPDATE `helpdesk`.`codes_manufacturers` SET `code`=".$code.", `description`=".$description." WHERE `id`=".$id."";
					
					//echo $sql;
					mysql_query($sql, $con);
					$sql="SELECT * FROM `helpdesk`.`codes_manufacturers` WHERE `id`=".$id."";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
					
	 
						while ($row = mysql_fetch_array($result)) {	
						$code=$row['code'];
						$description=$row['description'];
						$brand_id=$row['brand_id'];
					}	
					$sql="SELECT * FROM `helpdesk`.`brands` WHERE `id`=".$brand_id."";
					$result=mysql_query($sql, $con);
					while ($row = mysql_fetch_array($result)) {	
					$brand_name=$row['brand'];
					}
echo "

	<div id='eobd_section'>
	<h2>".$brand_name."</h2>
<form action='#' method='post'>
  
<input type='text' id='manufacturer_code' value='".$code."' onClick='this.select();'>

<textarea name='manufacturer_description' id='manufacturer_description' cols='40' rows='10' style='width:100%'>".$description."</textarea>
                                      <script type='text/javascript'>
														CKEDITOR.replace( 'details', {
												toolbar : 'Basic'
											} );
													</script>
													<input type='hidden' id='manufacturer_hidden' value='".$id."'>
													<input type='hidden' id='code_type' value='".$type."'>
													<input type='hidden' name='brand_id' value='".$brand_id."'>
<input type='button'  value='ΜΕΤΑΒΟΛΗ'   onClick='update_code_execute(".$id.",".$type.")'/>
<input type='submit'  value='ΕΠΙΣΤΡΟΦΗ'  name='manufact_back' />

 
</form>
	";
					

						}						
					
						
				  }


?>