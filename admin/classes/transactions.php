﻿<?php
class transactions {

private $user;
private $password;
private $db;

private $brand;
private $model;
private $engine_code;
private	$system;
private	$manufacturer;
private $brandId;
private	$manufacturerid;
private $year;
private $model_id;
private $field;
private $FieldValue;

private $fuel;
private $defect_category;
private $description;
private $cause;
private $solution;
private $serials;
private $defect_id;
private $brandIDs;

private $defect_cats_id;
private $defect_cat;
private $modelIDforDefect;
// codes

//eobd

private $eobd_code;
private $eobd_description;

private $manufacturer_code_description;
private $manufacturer_code;

private $sql_back;

// update defect variables

private $model_text;
private $brand_text;
private $filenames;


// defects feed variable

private $file_feed;

// mutators

public function set_file_feed($file_feed) {
		$this->file_feed = $file_feed;
}

public function set_files($filenames) {
		$this->filenames = $filenames;
}


public function set_brand_text($brand_text) {
		$this->brand_text = $brand_text;
}

public function set_model_text($model_text) {
		$this->model_text = $model_text;
}




public function set_sql_back($sql_back) {
		$this->sql_back = $sql_back;
}

public function set_modelIDforDefect($modelIDforDefect) {
		$this->modelIDforDefect = $modelIDforDefect;
}

public function set_defect_cat($defect_cat) {
		$this->defect_cat = $defect_cat;
		
	}
	
	
public function set_defect_cats_id($defect_cats_id) {
		$this->defect_cats_id = $defect_cats_id;
		
	}

public function set_man_code_description($manufacturer_code_description) {
		$this->manufacturer_code_description = $manufacturer_code_description;
		
	}
	
	public function set_man_code($manufacturer_code) {
		$this->manufacturer_code = $manufacturer_code;
		
	}
public function set_eobd_code($eobd_code) {
		$this->eobd_code = $eobd_code;
		
	}
	
	
	
	public function set_eobd_description($eobd_description) {
		$this->eobd_description = $eobd_description;
		
	}
	
	
	
public function set_defect_id($defect_id) {
		$this->defect_id = $defect_id;
		
	}
	
public function set_brandIDs($brandIDs) {
		$this->brandIDs = $brandIDs;
		
	}

public function set_serials($serials) {
		$this->serials = $serials;
		
	}

public function set_fuel($fuel) {
		$this->fuel = $fuel;
		
	}
public function set_defect_category($defect_category) {
		$this->defect_category = $defect_category;
		
	}
public function set_description($description) {
		$this->description = $description;
		
	}
public function set_cause($cause) {
		$this->cause = $cause;
		
	}
public function set_solution($solution) {
		$this->solution = $solution;
		
	}
public function setFieldValue($FieldValue) {
		$this->FieldValue = $FieldValue;
		
	}
	
public function setmodel_id($model_id) {
		$this->model_id = $model_id;
		
	}

public function setyear($year) {
		$this->year = $year;
		
	}
	

public function setmanufacturerid($manufacturerid) {
		$this->manufacturerid = $manufacturerid;
		
	}
	

public function setsystem($system) {
		$this->system = $system;
		
	}
	
public function setbrandid($brandId) {
		$this->brandId = $brandId;
		
	}


public function setbrand($brand) {
		$this->brand = $brand;
		
	}
	
public function setmodel($model) {
		$this->model = $model;
		
	}
	

public function setengine_code($engine_code) {
		$this->engine_code = $engine_code;
		
	}
	
public function setmanufacturer($manufacturer) {
		$this->manufacturer = $manufacturer;
		
	}




// db functions

public function setField($field) {
		$this->field = $field;
		
	}
	
public function setdb($db) {
		$this->db = $db;
		
	}
	
	

public function setPassword($password) {
		$this->password = $password;
		
	}

public function setUser($user) {
		$this->user = $user;
		
	}
	
	public function get_defects(){
	//db34.grserver.gr:3306
//db16-2.grserver.gr
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`defects` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}

	public function get_eobd(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`eobd` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}
	public function get_codes_manufacturers(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`codes_manufacturers` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}


public function get_serials_per_model(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					//$this->model = substr($this->model, 0, strpos($this->model, ' '));
					
						/*$sql="SELECT DISTINCT `engine_serial` as serial FROM `helpdesk`.`models`
					 	WHERE `model` like'%".$this->model."%' OR `model` ='".$this->model."'";
					*/
					 $sql="SELECT DISTINCT `engine_serial` as serial FROM `helpdesk`.`models`
						 WHERE `model` ='".$this->model."'";
						// echo $sql;
						$result=mysql_query($sql, $con);
						echo "<select name='defect_engine_serial[]' multiple='multiple' style='width:150px'>";
								echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['serial']."'>" . $row['serial'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}

public function get_defect_category(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`defects_categories`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='defect_category' class='myselect' style='width:100%'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}


public function get_brands_multiple(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result=mysql_query($sql, $con);
						
						
						echo "<select name='brands[]' multiple='multiple'  class='myselect' style='height:100px; width:100%; font-size:0.8em;'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</ioption>";
							}
							echo "</select>";
							
						/*echo "<select name='brandId' id='brands'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>";*/
					
				  }
	
}
public function get_brand_add_vlavi(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result=mysql_query($sql, $con);
						echo "<select name='brandId' id='brands' onchange='showUser(this.value)' style='overflow:hidden;width:100%' class='myselect'>";
								echo "<option value=''>MARKA</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}

public function get_brand(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result=mysql_query($sql, $con);
						echo "<select name='brandId' id='brands' onchange='showUser(this.value)' style='overflow:hidden;width:100%' class='myselect'>";
								echo "<option value=''>MARKA</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}

public function get_all_models(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
						
				
						
						$sql="SELECT a.`id`, a.`model`, a.`engine_serial`, a.`system`, a.`prod_year`, b.`brand` FROM `helpdesk`.`models` a
						INNER JOIN `helpdesk`.`brands` b
						ON a.`brand_id`= b.`id`
						WHERE a.`brand_id`= b.`id`
						ORDER BY `brand` ASC, `model` ASC ";
					
						//echo $sql;
						//$sql="SELECT * FROM `helpdesk`.`models`  ORDER BY `model` ASC";
						
						$result=mysql_query($sql, $con);
						//echo "<select name='models[ ]' id='brands' class='myselect_multi' style='width:100%; font-size:0.8em'  multiple>";
						echo "<select data-placeholder='Διαθέσιμες επιλογές - εισάγετε κωδικό κινητήρα' class='chosen-select' 
						multiple style='width:100%;font-size:0.8em' tabindex='4' name='models[ ]' id='brands'>";
								//echo "<option value='0'>ΜΟΝΤΕΛΟ - ΚΩΔ. ΚΙΝΗΤΗΡΑ</option>";
							while ($row = mysql_fetch_array($result)) {

								echo "<option class='myselect_multi_hover' value='".$row['id']."'>ΜΑΡΚΑ : ".$row['brand'].", ΜΟΝΤΕΛΟ : ".$row['model'].", KΩΔ. KINHTHΡΑ :
								".str_replace(' ', '', $row['engine_serial'] ).", ΚΑΤΗΓ. : ".$row['system'] ." ΧΡΟΝΙΑ : ".$row['prod_year']."</option>";
							}
							echo "</select>";
					
					echo "  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js' type='text/javascript'></script>
  <script src='js/chosen.jquery.js' type='text/javascript'></script>
  <script src='js/prism.js' type='text/javascript' charset='utf-8'></script>
  <script type='text/javascript'>
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:'95%'}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>";
					
				  }
}
public function get_model_per_brand(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
						$sql_brand="SELECT * FROM `helpdesk`.`brands` WHERE `id`= ".$this->brandId." ";
						$result=mysql_query($sql_brand, $con);
							while ($row = mysql_fetch_array($result)) {
									$brand=$row['brand'];
							}
						
						$sql="SELECT * FROM `helpdesk`.`models` WHERE `brand_id`= ".$this->brandId." ORDER BY `model` ASC";
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						//echo "<select name='models[ ]' id='brands' class='myselect_multi' style='width:100%; font-size:0.8em'  multiple>";
						echo "<select data-placeholder='Διαθέσιμες επιλογές - εισάγετε κωδικό κινητήρα' class='chosen-select' 
						multiple style='width:100%;font-size:0.8em' tabindex='4' name='models[ ]' id='brands'>";		
								//echo "<option value='0'>ΜΟΝΤΕΛΟ - ΚΩΔ. ΚΙΝΗΤΗΡΑ</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option class='myselect_multi_hover' value='".$row['id']."'>ΜΑΡΚΑ : ".$brand.", ΜΟΝΤΕΛΟ : ".$row['model'].", KΩΔ. KINHTHΡΑ :
								".str_replace(' ', '', $row['engine_serial'] ).", ΚΑΤΗΓ. : ".$row['system'] ." ΧΡΟΝΙΑ : ".$row['prod_year']."</option>";
							}
							echo "</select>";
					echo "  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js' type='text/javascript'></script>
  <script src='js/chosen.jquery.js' type='text/javascript'></script>
  <script src='js/prism.js' type='text/javascript' charset='utf-8'></script>
  <script type='text/javascript'>
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:'95%'}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>";
				  }
	
}

public function get_defect_categories(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`defects_categories`";
						
						$result=mysql_query($sql, $con);
						echo  "<h1 style='margin-top:20px; margin-bottom:0px;'>Επιλογη κατηγοριας βλαβης.</h1>";
						echo "<select name='defect_cats' id='defect_cats' class='myselect' style='width:100%'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}



public function get_manufacturer(){
	
	$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`manufacturers`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='manufacturers' id='manufacturers' class='myselect' style='width:100%'>";
							echo "<option value='41'>ΚΑΤΑΣΚΕΥΑΣΤΕΣ</option>";
							while ($row = mysql_fetch_array($result)) {
								
								if ($row['name']==""){
									echo "<option value='" . $row['id'] . "'>N/A</option>";
									
								}else {
								echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
								}
								
							}
							echo "</select>";
					
				  }
	
}

public function insert_manufacturer_code(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				if (isset($this->brandIDs)){
					
						foreach ($this->brandIDs as $value) {
							
							$sql_brands="SELECT * FROM `helpdesk`.`brands` WHERE `id`=$value ORDER BY `brand` ASC";
							//echo $sql;
							//echo "<br>";
							$result_brands=mysql_query($sql_brands, $con);
					
				
				while ($row_brands = mysql_fetch_array($result_brands)) {	
				$sql="insert into  `helpdesk`.`codes_manufacturers` (`code`, `description`, `brand_id`)
						values 
					('".$this->manufacturer_code."', '".$this->manufacturer_code_description."', $value )";
				
				//mysql_query("LOCK TABLES `codes_manufacturers` WRITE;");
				mysql_query($sql, $con);
				//mysql_query("UNLOCK TABLES;");
				if ($this->username=="dominus"){
				echo $sql; echo "<br>";
				}
				echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
						}
						
					}	
					}
				  }
}


public function insert_ac_code(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				if (isset($this->brandIDs)){
					
						foreach ($this->brandIDs as $value) {
							
							$sql_brands="SELECT * FROM `helpdesk`.`brands` WHERE `id`=$value ORDER BY `brand` ASC";
							//echo $sql;
							//echo "<br>";
							$result_brands=mysql_query($sql_brands, $con);
					
				
				while ($row_brands = mysql_fetch_array($result_brands)) {	
				$sql="insert into  `helpdesk`.`codes_ac` (`code`, `description`, `brand_id`)
						values 
					('".$this->manufacturer_code."', '".$this->manufacturer_code_description."', $value )";
				//echo $sql;
				//mysql_query("LOCK TABLES `codes_manufacturers` WRITE;");
				mysql_query($sql, $con);
				//mysql_query("UNLOCK TABLES;");
				if ($this->username=="dominus"){
				echo $sql; echo "<br>";
				}
				echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
						}
						
					}	
					}
				  }
}


public function insert_airbag_code(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				if (isset($this->brandIDs)){
					
						foreach ($this->brandIDs as $value) {
							
							$sql_brands="SELECT * FROM `helpdesk`.`brands` WHERE `id`=$value ORDER BY `brand` ASC";
							//echo $sql;
							//echo "<br>";
							$result_brands=mysql_query($sql_brands, $con);
					
				
				while ($row_brands = mysql_fetch_array($result_brands)) {	
				$sql="insert into  `helpdesk`.`codes_airbag` (`code`, `description`, `brand_id`)
						values 
					('".$this->manufacturer_code."', '".$this->manufacturer_code_description."', $value )";
				echo $sql;
				//mysql_query("LOCK TABLES `codes_manufacturers` WRITE;");
				mysql_query($sql, $con);
				//mysql_query("UNLOCK TABLES;");
				if ($this->username=="dominus"){
				echo $sql; echo "<br>";
				}
				echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
						}
						
					}	
					}
				  }
}

public function insert_eobd(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
						
				$sql="insert into  `helpdesk`.`eobd` (`code`, `description`)
						values 
					('".$this->eobd_code."', '".$this->eobd_description."')";
					//mysql_query("LOCK TABLES `eobd` WRITE;");
				mysql_query($sql, $con);
				//mysql_query("UNLOCK TABLES;");
				
				if ($this->username=="dominus"){
				echo $sql; echo "<br>";
				}
				
				
				echo "<br><h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				}

}



public function insert_defect(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
			if (isset($this->serials)){
				
				//print_r($this->serials); 
				//echo "set";
				
				foreach ($this->serials as $value) {
					$sql_model_name="SELECT * FROM `helpdesk`.`models` WHERE `id`=$value ";
					//echo $sql_model_name; echo"<br>";
					$model_name_result=mysql_query($sql_model_name, $con);
					while ($row_model_name = mysql_fetch_array($model_name_result)) {
						$modelname=$row_model_name['modelname'];
						$serial=$row_model_name['engine_serial'];
						$id=$row_model_name['id'];
						//echo $modelname; echo"<br>";
						
						$this->cause=html_entity_decode($this->cause);
						$this->solution=html_entity_decode($this->solution);
						
						$sql_insert="insert into  `helpdesk`.`defects` (`defect_cat`, `model_id`, `title`, `cause`,  `description`, `engine_serial`)
						values 
					('".$this->defect_category."', ".$id.", '".$this->description."', '".$this->cause."', '".$this->solution."',  '".$serial."')";
				
				
				// mysql_query("LOCK TABLES `defects` WRITE;");
				 echo $sql_insert;
				mysql_query($sql_insert, $con);
				//mysql_query("UNLOCK TABLES;");
				
				if ($this->username=="dominus"){
				echo $sql_insert; echo "<br>";
				}
				
					}
					
				
				 
					
				}
				echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
				//$in_string=substr_replace($in_string ,"",-1);
				//echo $in_string;
				
			} else {
			
			
							   
			$sql_insert="insert into  `helpdesk`.`defects` (`defect_cat`, `model_id`, `title`, `cause`, `fuel`, `description`,  `engine_serial`)
						values 
					('".$this->defect_category."', '".$this->model_id."', '".$this->description."', '".$this->cause."',
					'".$this->fuel."', '".$this->solution."', '".$this->engine_code."')";
				//mysql_query("LOCK TABLES `defects` WRITE;");
				mysql_query($sql_insert, $con);
			//	mysql_query("UNLOCK TABLES;");
			  echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
				  }
			}
	
}


public function insert_blink_code(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
			if (isset($this->serials)){
				
				//print_r($this->serials); 
				//echo "set";
				
				foreach ($this->serials as $value) {
					$sql_model_name="SELECT * FROM `helpdesk`.`models` WHERE `id`=$value ";
					//echo $sql_model_name; echo"<br>";
					$model_name_result=mysql_query($sql_model_name, $con);
					while ($row_model_name = mysql_fetch_array($model_name_result)) {
						$modelname=$row_model_name['modelname'];
						$serial=$row_model_name['engine_serial'];
						$id=$row_model_name['id'];
						//echo $modelname; echo"<br>";
						
						$this->cause=html_entity_decode($this->cause);
						$this->solution=html_entity_decode($this->solution);
						
						$sql_insert="insert into  `helpdesk`.`blink_codes` (`defect_cat`, `model_id`, `title`,  `description`, `engine_serial`)
						values 
					('".$this->defect_category."', ".$id.", '".$this->description."',  'blink_codes/".$this->solution."',  '".$serial."')";
				
				
				// mysql_query("LOCK TABLES `defects` WRITE;");
				 echo $sql_insert;
			echo "<br>";
				//mysql_query($sql_insert, $con);
				//mysql_query("UNLOCK TABLES;");
				
				if ($this->username=="dominus"){
				echo $sql_insert; echo "<br>";
				}
				
					}
					
				
				 
					
				}
				echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
				//$in_string=substr_replace($in_string ,"",-1);
				//echo $in_string;
				
			} else {
			
			
							   
			$sql_insert="insert into  `helpdesk`.`blink_codes` (`defect_cat`, `model_id`, `title`,  `description`, `engine_serial`)
						values 
					('".$this->defect_category."', ".$id.", '".$this->description."',  'blink_codes/".$this->solution."',  '".$serial."')";
				
				//mysql_query("LOCK TABLES `defects` WRITE;");
				//mysql_query($sql_insert, $con);
			//	mysql_query("UNLOCK TABLES;");
			echo $sql_insert;
			echo "<br>";
			  echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
				  }
			}
	
}

public function show_defects(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
				$sql_model="select `model`, `brand` from   `helpdesk`.`models` a inner join  `helpdesk`.`brands` b
				on a.`brand_id`=b.`id` where a.`id`=$this->model_id";	
				$result_model=mysql_query($sql_model, $con);	
				
				while ($row_model = mysql_fetch_array($result_model)) {
					$model=$row_model["model"];
					$this->model=$model;
					$brand=$row_model["brand"];
					$this->brand=$brand;
				}
						   
			$sql="select * from   `helpdesk`.`defects` where `model_id`=$this->model_id order by `defect_cat`";
				////  echo $sql;	
			   $result=mysql_query($sql, $con);
			  //echo "<h2>Βλαβες για το μοντελο ".$this->brand."&nbsp;-&nbsp;".$this->model."</h2>";echo "<hr>";
			   echo "<h2>Βλαβες για το μοντελο ".$this->brand."&nbsp;-&nbsp;".$this->model."&nbsp;-&nbsp;
			  ".$this->year."&nbsp;-&nbsp;".$this->engine_code."</h2>";echo "<hr>";
			   			while ($row = mysql_fetch_array($result)) {
							
							
							
							echo "<div class='update_div'><form action='#' method='post' >";
							echo " <strong>Κατηγορία βλάβης</strong> : ".$row['defect_cat']."&nbsp;<br> <strong>Βλάβη</strong> :&nbsp;";echo $row["title"].",&nbsp;"; echo "Κωδικός κινητήρα:&nbsp;";echo $row["engine_serial"]; 
							echo "<hr><br>";
							
							
							echo "
									
									<h3>Αιτια </h3>
									".$row["cause"]."
									<br><h3>Λυση </h3>
									".$row["description"]."
									
								";

echo "<input type='hidden' value='".$row['id']."' name='delete'>
<input type='hidden' value='".$this->brand."' name='brand_update_form'>
<input type='hidden' value='".$this->model."' name='model_update_form'>
<input type='hidden' value='".$this->year."' name='prod_year'>
<input type='hidden' value='".$sql."' name='sql_defects' >
<br><br>
	 <input type='submit' value='ΔΙΑΓΡΑΦΗ' name='delete_defect' >
	 <input type='submit' value='ΑΛΛΑΓΗ' name='update_defect'>
	 </form></div>";
							
								
							
						}
			 
				  }
	
}


public function show_defects_visitor(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
				$sql_model="select `model`, `brand` from   `helpdesk`.`models` a inner join  `helpdesk`.`brands` b
				on a.`brand_id`=b.`id` where a.`id`=$this->model_id";	
				$result_model=mysql_query($sql_model, $con);	
				
				while ($row_model = mysql_fetch_array($result_model)) {
					$model=$row_model["model"];
					$this->model=$model;
					$brand=$row_model["brand"];
					$this->brand=$brand;
				}
						   
			$sql="select * from   `helpdesk`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'order by `defect_cat`";
			
			$sql_category="select DISTINCT  `defect_cat` as category from   `helpdesk`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
			
			$sql_eng_code="select DISTINCT  `engine_serial` as eng_code from   `helpdesk`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
			
			
			//echo $sql;	
			   $result=mysql_query($sql, $con);
			   $result_category=mysql_query($sql_category, $con);
			   
			   while ($row_category = mysql_fetch_array($result_category)) {
				   $category=$row_category["category"];
			   }
			   
			   $result_eng_code=mysql_query($sql_eng_code, $con);
			   
			   while ($row_eng_code = mysql_fetch_array($result_eng_code)) {
				   $eng_code=$row_eng_code["eng_code"];
			   }
			   
			   
			  echo "<h2> ".$this->brand."&nbsp;-&nbsp;".$this->model."&nbsp;-&nbsp;".$category."&nbsp;-&nbsp;".$eng_code."</h2>";
			  echo "<form action='#' method='post'>";
echo "<input type='hidden' value='".$this->sql_back."' name='sql_query_back'>";
echo "<input type='hidden' value='".$this->defect_cats_id."' name='defect_cat_back'>";
//echo " <INPUT TYPE='image' SRC='images/back.png' BORDER='0' ALT='SUBMIT!'> ";
echo "<input type='submit' class='special' value='Επιστροφη'>";
echo "</form>";
echo "<hr>";
			   			while ($row = mysql_fetch_array($result)) {
							 
							$sql_images="select * from  `helpdesk`.`images` where `defect_id` =".$row['id']."";
							$result_images=mysql_query($sql_images, $con);
							
							
							echo "<div class='update_div' style='text-align:justify;'>  <h2>Βλαβη</h2> :&nbsp;";echo $row["title"].",&nbsp;";  
							

echo "<input type='hidden' value='".$row['id']."' name='delete'>";
							echo "<br>";
							
							
							echo "
							
									
									<h3>Αιτια </h3>
									".$row["cause"]."<br>
									<h3>Λυση </h3>
									".$row["description"]."<br>";
									echo "<p>Εικόνες<br />";
									
									
								while ($row_images = mysql_fetch_array($result_images)) {
							
							

							echo "<a id='example2' href='uploads/".$row_images["file"]."'>
							<img alt='".$row_images["file"]."' src='uploads/".$row_images["file"]."'  class='fancyimg' style='width:100px; height:auto'/>
							</a>";
							
							
							
							}
								echo "</p>";
									
									
									echo"</div>";
								
								
							//echo "<h3>Αιτία </h3>";
							//echo $row["cause"]; echo "<hr>";
							
							//echo "<h3>Λύση </h3><hr>";
							//echo $row["description"]; echo "<br>";
						}
			 
				  }
	
}

public function insert_brand(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
					
							   
			$sql="insert into  `helpdesk`.`brands` (`brand`)
						values 
					('".$this->brand."')";
			//echo $sql;		
			   mysql_query($sql, $con);
				  }
	
}


public function insert_manufacturer(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
					
							   
			$sql="insert into  `helpdesk`.`manufacturers` (`name`)
						values 
					('".$this->manufacturer."')";
					
			   mysql_query($sql, $con);
				  }
	
}

	

public function insert_auto(){


$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
					
							   
			$sql="insert into  `helpdesk`.`models` (`brand_id`, `model`, `prod_year`, `engine_serial`, `system`, `manufact_id`, `active` )
						values 
					('".$this->brandId."', '".$this->model."', '".$this->year."', '".$this->engine_code."', '".$this->system."', '".$this->manufacturerid."', 1)";
					
			   mysql_query($sql, $con);
			  // echo $sql;
				  }


}


public function get_auto_table(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
						$sql="SELECT * FROM `helpdesk`.`models` ORDER BY `model` ASC";
						
						$result=mysql_query($sql, $con);
						
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
						<tr>
						<td height='30'>&nbsp;
						</td>
						</tr>
  <tr bgcolor='#333333'>
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<tr>
    <td>".$row['brand_id']."</td>
    <td>".$row['model']."</td>
    <td>".$row['prod_year']."</td>
    <td>".$row['engine_serial']."</td>
    <td>".$row['system']."</td>
    <td>".$row['manufact_id']."</td>
  </tr>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}


public function get_eobd_codes(){
		$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT * FROM `helpdesk`.`eobd` ORDER BY `id` DESC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό eobd' id='box_eobd' type='text' class='hover'/>";
						
						
						
						echo"<ul class='navList_eobd' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['code']."</font>
							<form action='#' method='post'>
							
							<input type='text' class='hover' style='width:90%; float:left;  border:0px solid; cursor:pointer;' 
							value='".$row['code']."--> ".$row['description']."' readonly  onclick='show_update_code(".$row['id'].", 1)'>
							
							
							
							";
							echo "<input type='hidden' value='".$sql."' name='eobd__codes_sql'>";
							echo "<input type='hidden' value='".$row['id']."' name='eobd_id'>";
	
	
						
	
	
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form><image src='images/delete_icon.png' style='cursor:pointer' onclick='delete_code(".$row['id'].", 1)' ></li>";
					}	

	echo "</ul>";	
					
					
					}
}

public function get_manufacturers_codes_byid(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT a.id, a.code, a.description, b.brand FROM `helpdesk`.`codes_manufacturers` a inner join `helpdesk`.`brands` b 
							on a.brand_id=b.id
							WHERE a.brand_id=".$this->brandId."
							ORDER BY b.`brand` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό' id='box_manufact_code' type='text' class='hover' style='width:90%'/>";
						
						// select brands
						$sql_brands="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result_brands=mysql_query($sql_brands, $con);
						echo "<form action='#' method='post'>
						<select name='brands_manufact_codes' id='brands_manufact_codes'  style='overflow:hidden;width:80%; margin-left:0px; color:#333; font-weight:bold' class='myselect'>";
								echo "<option value=''>ΕΠΙΛΟΓΗ ΜΑΡΚΑΣ</option>";
							while ($row = mysql_fetch_array($result_brands)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>
							<input type='hidden' value='dummy' name='manufact_codes_dummy'>
							<input type='submit' value='ΕΥΡΕΣΗ'>
							</form>";
					
				  
						// select brands
						
						echo"<ul class='navList_manufact' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['code']."</font>
							<form action='#' method='post'>
							
							<input type='text' class='hover' style='width:90%; float:left;  border:0px solid; cursor:pointer;' 
							value='".$row['brand']." : ".$row['code']."--> ".$row['description']."' readonly  onclick='show_update_code(".$row['id'].", 2)'>
							
							
							
							";
							
							echo "<input type='hidden' value='".$row['id']."' name='manufact_code_id'>";
							echo "<input type='hidden' value='".$sql."' name='manufact_codes_sql'>";
	
						
	
	
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form><image src='images/delete_icon.png' style='cursor:pointer' onclick='delete_code(".$row['id'].", 1)' ></li>";
					}	

	echo "</ul>";	
					
					
					}

}



public function get_manufacturers_codes(){
		$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT a.id, a.code, a.description, b.brand FROM `helpdesk`.`codes_manufacturers` a inner join `helpdesk`.`brands` b 
							on a.brand_id=b.id
							WHERE a.brand_id=2
							ORDER BY b.`brand` ASC";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό' id='box_manufact_code' type='text' class='hover' style='width:90%'/>";
						
						// select brands
						$sql_brands="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						$result_brands=mysql_query($sql_brands, $con);
						echo "<form action='#' method='post'>
						<select name='brands_manufact_codes' id='brands_manufact_codes'  style='overflow:hidden;width:80%; margin-left:0px; color:#333; font-weight:bold' class='myselect'>";
								echo "<option value=''>ΕΠΙΛΟΓΗ ΜΑΡΚΑΣ</option>";
							while ($row = mysql_fetch_array($result_brands)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>
							<input type='hidden' value='dummy' name='manufact_codes_dummy'>
							<input type='submit' value='ΕΥΡΕΣΗ'>
							</form>";
					
				  
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
	echo "<input type='hidden' value='".$sql."' id='manufact_codes_sql'>";				
					
					}
}

public function search_auto(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					if ($this->engine_code==""){
						$serial_string="";
						
					}
					else {
					
					$serial_string="AND `engine_serial`like '%".$this->engine_code."' ";	
					}
					
					if ($this->model==""){
						$model_string="";
						
					}
					else {
					$model_string="AND `model` like '%".$this->model."%'";	
					}
						
				/*	if ($this->year==""){
						$year_string="";
						
					}
					else {
					$year_string="OR `prod_year` like '%".$this->year."%'";	
					}
					if ($this->system==""){
						$system_string="";
						
					}
					else {
					$system_string="OR `system` like '%".$this->system."%'";	
					}
					if ($this->manufacturerid==""){
						$manufacturerid_string="";
						
					}
					else {
					$manufacturerid_string="OR `manufact_id`= $this->manufacturerid";	
					}*/
					
					/*	$sql="SELECT * FROM `helpdesk`.`models`
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$year_string."".$serial_string."".$system_string." ".$manufacturerid_string."";
						*/
						
						$sql="SELECT a.`id` as modelid,  `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$serial_string." order by a.`model` asc";
						
						//echo $sql;
						$result=mysql_query($sql, $con);
						
						echo "<input placeholder='Αναζήτηση με κωδικό κινητήρα' id='box1' type='text' class='hover' />";
						echo "<input placeholder='Αναζήτηση με μοντέλο' id='box2' type='text' class='hover'/>";
						
						
						echo"<ul class='navList1' style='text-align: justify'>";
						
	
						while ($row = mysql_fetch_array($result)) {	
							echo" <li><font style='visibility:hidden'>".$row['engine_serial']."</font><font style='visibility:hidden' id='mod'>;;;".$row['model']."</font>
							<form action='#' method='post'>
							<input class='hover' type='text' style='width:80%; float:left;' value='".$row['brand']."----".$row['model']."----".$row['prod_year']."----".$row['engine_serial']."----".$row['system']."' readonly style='background:#1a1a1a; font-weight:bold; border:0px solid'>
							";
							
							echo "
	<input type='hidden' value='".$row['modelid']."' name='modelid'>
	<input type='hidden' value='".$sql."' name='sql_defects'>
	<input type='hidden' value='".$row['prod_year']."' name='prod_year'>
	<input type='hidden' value='".$row['engine_serial']."' name='engine_serial'>";
	
	$sql_defects="SELECT  `model_id`  FROM `helpdesk`.`defects` 
						WHERE `model_id`=".$row['modelid']."";
						
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects==0){				
		echo " <img SRC='images/no_defect_icon.png' BORDER='0' ALT='No defects'> ";
	} else {
		echo " <INPUT TYPE='image' SRC='images/eobd_icon.png' BORDER='0' ALT='SUBMIT!'> ";
	}
	// echo  "<INPUT TYPE='image' SRC='images/add.png' BORDER='0' ALT='SUBMIT!' name='add_new_defect' >";
	
	echo "</form></li>";
					}	

	echo "</ul>";	
				  }
	
	
	



	
}



public function search_auto_brand(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue order by a.`model` asc";
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						
						echo "<table width='85%' border='0' cellspacing='0' cellpadding='0'>
  <tr >
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<tr class='highlight'>
    <td>".$row['brand']."</td>
    <td>".$row['model']."</td>
    <td>".$row['prod_year']."</td>
    <td>".$row['engine_serial']."</td>
    <td>".$row['system']."</td>
    <td>".$row['name']."</td>
	<td><form action='#' method='post'>
	<input type='hidden' value='".$row['modelid']."' name='modelid'>
	<input type='hidden' value='".$row['prod_year']."' name='prod_year'>
	<input type='hidden' value='".$row['engine_serial']."' name='engine_serial'>";
	$sql_defects="SELECT  `model_id`  FROM `helpdesk`.`defects` 
						WHERE `model_id`=".$row['modelid']."";
						
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects==0){				
		echo " <INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'> ";
	} else {
		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
echo "	</form></td>
  </tr>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}


// search auto by brand for visitor


public function search_auto_brand_visitor(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					if ($this->modelIDforDefect==0){
					$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue order by a.`model` asc";
					}else {
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue 
						AND
						a.`id`=$this->modelIDforDefect
						order by a.`model` asc";
					}
						 //  echo $sql;
						$result=mysql_query($sql, $con);
						
						
						echo "<div  style='font-size: 1.5vw;'><table width='85%' border='0' cellspacing='0' cellpadding='0'>
  <tr >
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
   
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								
	$sql_defects="SELECT  *  FROM `helpdesk`.`defects` 
						WHERE `model_id`=".$row['modelid']." AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
	
	//echo 	$sql_defects;		
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects>0){						
								echo  "<form action='#' method='post' name='model".$row["modelid"]."'><tr  id='model".$row["modelid"]."' class='div_hover' onclick='submitOnClick(this.id)'>
    <td>".$row['brand']."</td>
    <td>".$row['model']."</td>
    <td>".$row['prod_year']."</td>
    <td>".$row['engine_serial']."</td>
    
	<td>
	<input type='hidden' value='".$row['modelid']."' name='modelid'>
	<input type='hidden' value='".$sql."' name='sql_query'>
	<input type='hidden' value='".$this->defect_cats_id."' name='defect_cat'>
	<input type='hidden' value='".$row['prod_year']."' name='prod_year'>
	<input type='hidden' value='".$row['engine_serial']."' name='engine_serial'>";

		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
echo "	</form></td>
  </tr>";
							}
							
echo "</table></div>";	

				
				  }
	
	
	



	
}



public function go_back(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					$sql=$this->sql_back;
					
						// echo $sql;
						$result=mysql_query($sql, $con);
						
						
						echo "<table width='85%' border='0' cellspacing='0' cellpadding='0'>
  <tr >
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
   
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								
	$sql_defects="SELECT  *  FROM `helpdesk`.`defects` 
						WHERE `model_id`=".$row['modelid']." AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
	
	//echo 	$sql_defects;		
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects>0){						
								echo  "<form action='#' method='post' name='model".$row["modelid"]."'><tr  id='model".$row["modelid"]."' class='highlight' onclick='submitOnClick(this.id)'>
    <td>".$row['brand']."</td>
    <td>".$row['model']."</td>
    <td>".$row['prod_year']."</td>
    <td>".$row['engine_serial']."</td>
    
	<td>
	<input type='hidden' value='".$row['modelid']."' name='modelid'>
	<input type='hidden' value='".$sql."' name='sql_query'>
	<input type='hidden' value='".$this->defect_cats_id."' name='defect_cat'>
	<input type='hidden' value='".$row['prod_year']."' name='prod_year'>
	<input type='hidden' value='".$row['engine_serial']."' name='engine_serial'>";

		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
echo "	</form></td>
  </tr>";
							}
							
echo "</table>";	

				
				  }
	
	
	



	
}





public function show_update_list(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					if ($this->engine_code==""){
						$serial_string="";
						
					}
					else {
					$serial_string="AND `engine_serial`like '%".$this->engine_code."%' ";	
					}
					
					if ($this->model==""){
						$model_string="";
						
					}
					else {
					$model_string="AND `model` like '%".$this->model."%'";	
					}
						
					/*if ($this->year==""){
						$year_string="";
						
					}
					else {
					$year_string="OR `prod_year` like '%".$this->year."%'";	
					}
					if ($this->system==""){
						$system_string="";
						
					}
					else {
					$system_string="OR `system` like '%".$this->system."%'";	
					}
					if ($this->manufacturerid==""){
						$manufacturerid_string="";
						
					}
					else {
					$manufacturerid_string="OR `manufact_id`= $this->manufacturerid";	
					}*/
					
				/*	if (($this->brandid=="")&&($this->model=="")&&($this->manufacturerid=="")&&($this->year=="")&&($this->system=="")){
							
							$sql="SELECT a.`id` as modelid,  `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE `engine_serial` like '%".$this->engine_code."%'";
						}
						else 
						{*/
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id, `active` FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$serial_string." ORDER BY a.`model` asc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `helpdesk`.`brands` order by `brand` asc";
						
						echo "
						
						
						<div id='users'>
						<input placeholder='Search Me' id='box' type='text' />
						
						<div id='results_models'>
						<ul class='navList'>";
						
	
							while ($row = mysql_fetch_array($result)) {
							
							echo" <li><font style='visibility:hidden'>".$row['engine_serial']."</font> <form action='#' method='post' >
							<input type='hidden' value='".$sql."' name='sql'>
							<input type='hidden' name='foob-ar'  value='foob-ar'/>
							<input type='text' value='".$row['brand']."' readonly style='background:#1a1a1a; font-weight:bold; border:0px solid'>
							<input type='hidden' value='".$row['modelid']."' name='model_id'>
							<input type='text' value='".$row['model']."' name='model_update'>
							<input type='text' value='".$row['prod_year']."' name='year_update'>
							<input type='text' value='".$row['engine_serial']."' name='engine_code_update'>";
						/*	$sql_cat="SELECT * FROM `helpdesk`.`defects_categories`";
						
						$result_cat=mysql_query($sql_cat, $con);
						echo "<select name='defects_categories' id='defects_categories' class='myselect2' style='width:100%'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result_cat)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							
							
							echo "</select>";
							
							
							
							$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update' class='myselect2' style='width:100%'>";
							echo "<option value='41'>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
							*/
							if ($row['active']==1){
							echo "<input type='button' value='ΕΝΕΡΓΟ - ΑΠΕΝΕΡΓΟΠΟΙΗΣΗ' onclick='switch_model(".$row['modelid'].", 0)'>&nbsp;";
							}
							else if ($row['active']==0){
							echo "<input type='button' value='ΑΝΕΝΕΡΓΟ - ΕΝΕΡΓΟΠΟΙΗΣΗ' onclick='switch_model(".$row['modelid'].", 1)'>&nbsp;";
							}
							echo "<input type='submit' value='ΑΛΛΑΓΗ' ></form><font id='switch_result'></font>";
							/*
							echo "<form action='#' method='post' style='float:left'>
							<input type='hidden' value='".$row['modelid']."' name='delete'>
							
							 <input type='submit' value='ΔΙΑΓΡΑΦΗ' style='color:red' > 
							
							</form>";
							*/
							echo"</li>";
							
							}
						echo "</ul>";	
				
							


				
				  }
	
	
	



	
}








public function show_update_list_brand(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					/* $sql = "select * from   `helpdesk`.`defects` where `model_id`=$this->model_id order by `defect_cat`";
					mysql_query($sql, $con);*/
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a 						inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue ORDER BY a.`model` asc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `helpdesk`.`brands` ORDER `brand` ASC";
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<form action='#' method='post'><tr  class='hover'>
								
    <td><input type='hidden' value='".$row['modelid']."' name='model_id'>".$row['brand'].""; 
	$brands=mysql_query($brands_sql, $con);
	echo "<select name='brandId_update'>";
							echo "<option value='".$row['brand_id']."'>Καμία αλλαγή</option>";
							while ($row_brands = mysql_fetch_array($brands)) {
								
								echo "<option value='".$row_brands['id']."'>" . $row_brands['brand'] . "</option>";
							}
							echo "</select>";
	echo "</td>
    <td><input type='text' value='".$row['model']."' name='model_update'></td>
    <td><input type='text' value='".$row['prod_year']."' name='year_update'></td>
    <td><input type='text' value='".$row['engine_serial']."' name='engine_code_update'></td>
    <td><input type='text' value='".$row['system']."' name='system_update'></td>
    <td><input type='hidden' value='".$row['manufact_id']."' name='manufacturers_current'>";
		if ($row['name']==""){
	     echo "N/A";
		}else {
			
		echo $row['name'];
		}
	$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update'>";
							echo "<option value='41'>Κενό</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
	
	echo "<input type='submit' value='submit'></td></form>
	<td><form action='#' method='post'>
	<input type='hidden' value='".$row['modelid']."' name='modelid'>
	<input type='hidden' value='".$row['model']."' name='modelhidden'>
	<input type='hidden' value='".$row['engine_serial']."' name='engine_serial_defects'>";
	$sql_defects="SELECT  `model_id`  FROM `helpdesk`.`defects` 
						WHERE `model_id`=".$row['modelid']."";
						
					//	//  echo $sql_defects;
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects==0){				
		echo " <INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'> ";
	} else {
		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	echo"</form></td>
	<td>
	<form action='#' method='post'>
	<input type='hidden' value='".$row['modelid']."' name='delete'>
	 <INPUT TYPE='image' SRC='images/delete_button.jpg' BORDER='0' ALT='SUBMIT!'> 
	
	</form>
	</td>
	
  </tr>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}




public function show_update_list_model(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<form action='#' method='post'><tr  class='hover'>
								
    <td><input type='hidden' value='".$row['modelid']."' name='model_id'>".$row['brand'].""; 
	$brands=mysql_query($brands_sql, $con);
	echo "<select name='brandId_update'>";
							echo "<option value='".$row['brand_id']."'>Καμία αλλαγή</option>";
							while ($row_brands = mysql_fetch_array($brands)) {
								
								echo "<option value='".$row_brands['id']."'>" . $row_brands['brand'] . "</option>";
							}
							echo "</select>";
	echo "</td>
    <td><input type='text' value='".$row['model']."' name='model_update'></td>
    <td><input type='text' value='".$row['prod_year']."' name='year_update'></td>
    <td><input type='text' value='".$row['engine_serial']."' name='engine_code_update'></td>
    <td><input type='text' value='".$row['system']."' name='system_update'></td>
    <td><input type='hidden' value='".$row['manufact_id']."' name='manufacturers_current'>";
		if ($row['name']==""){
	     echo "N/A";
		}else {
			
		echo $row['name'];
		}
	$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update'>";
							echo "<option value='41'>Κενό</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
	
	echo "<input type='submit' value='submit'></td>
	
	
	
  </tr></form>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}
public function show_update_list_year(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<form action='#' method='post'><tr>
								
    <td><input type='hidden' value='".$row['modelid']."' name='model_id'>".$row['brand'].""; 
	$brands=mysql_query($brands_sql, $con);
	echo "<select name='brandId_update'>";
							echo "<option value='".$row['brand_id']."'>Καμία αλλαγή</option>";
							while ($row_brands = mysql_fetch_array($brands)) {
								
								echo "<option value='".$row_brands['id']."'>" . $row_brands['brand'] . "</option>";
							}
							echo "</select>";
	echo "</td>
    <td><input type='text' value='".$row['model']."' name='model_update'></td>
    <td><input type='text' value='".$row['prod_year']."' name='year_update'></td>
    <td><input type='text' value='".$row['engine_serial']."' name='engine_code_update'></td>
    <td><input type='text' value='".$row['system']."' name='system_update'></td>
    <td><input type='hidden' value='".$row['manufact_id']."' name='manufacturers_current'>";
		if ($row['name']==""){
	     echo "N/A";
		}else {
			
		echo $row['name'];
		}
	$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update'>";
							echo "<option value='41'>Κενό</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
	
	echo "<input type='submit' value='submit'></td>
	
	
	
  </tr></form>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}

public function show_update_list_eng_code(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `helpdesk`.`models` a inner join `helpdesk`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `helpdesk`.`brands` ORDER BY `brand` ASC";
						
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
    <td>ΣΥΣΤΗΜΑ</td>
    <td>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</td>
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								echo  "<form action='#' method='post'><tr>
								
    <td><input type='hidden' value='".$row['modelid']."' name='model_id'>".$row['brand'].""; 
	$brands=mysql_query($brands_sql, $con);
	echo "<select name='brandId_update'>";
							echo "<option value='".$row['brand_id']."'>Καμία αλλαγή</option>";
							while ($row_brands = mysql_fetch_array($brands)) {
								
								echo "<option value='".$row_brands['id']."'>" . $row_brands['brand'] . "</option>";
							}
							echo "</select>";
	echo "</td>
    <td><input type='text' value='".$row['model']."' name='model_update'></td>
    <td><input type='text' value='".$row['prod_year']."' name='year_update'></td>
    <td><input type='text' value='".$row['engine_serial']."' name='engine_code_update'></td>
    <td><input type='text' value='".$row['system']."' name='system_update'></td>
    <td><input type='hidden' value='".$row['manufact_id']."' name='manufacturers_current'>";
		if ($row['name']==""){
	     echo "N/A";
		}else {
			
		echo $row['name'];
		}
	$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update'>";
							echo "<option value='41'>Κενό</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
	
	echo "<input type='submit' value='submit'></td>
	
	
	
  </tr></form>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}
public function updateManufacturer(){
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="UPDATE `helpdesk`.`manufacturers` SET 
					 `name`='".$this->manufacturer."'
					WHERE `id`=$this->manufacturerid";
					
					////  echo $sql;
					mysql_query($sql, $con);
					
					echo "<h3>Η αλλαγή πραγματοποιήθηκε</h3>";
				  }	
	
	
}


public function updateModel(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="UPDATE `helpdesk`.`models` SET 
					 `brand_id`=$this->brandId,`model`='".$this->model."', `prod_year`='".$this->year."', `engine_serial`='".$this->engine_code."', `system`='".$this->system."', `manufact_id`=$this->manufacturerid
					WHERE `id`=$this->model_id";
					
					  //echo $sql;
					//mysql_query($sql, $con);
					
					$result=mysql_query($this->sql_back, $con);
						
						//$manufacts="SELECT * FROM `helpdesk`.`manufacturers`";
						
						
						
						//$brands_sql="SELECT * FROM `helpdesk`.`brands` order by `brand` asc";
						
						echo "
						
						
						<div id='users'>
						<input placeholder='Search Me' id='box' type='text' />
						
						<div id='results_models'>
						<ul class='navList'>";
						
	
							while ($row = mysql_fetch_array($result)) {
							
							echo" <li><font style='visibility:hidden'>".$row['engine_serial']."</font> <form action='#' method='post' >
							<input type='hidden' value='".$sql."' name='sql'>
							<input type='hidden' name='foob-ar'  value='foob-ar'/>
							<input type='text' value='".$row['brand']."' readonly style='background:#1a1a1a; font-weight:bold; border:0px solid'>
							<input type='hidden' value='".$row['modelid']."' name='model_id'>
							<input type='text' value='".$row['model']."' name='model_update'>
							<input type='text' value='".$row['prod_year']."' name='year_update'>
							<input type='text' value='".$row['engine_serial']."' name='engine_code_update'>";
						/*	$sql_cat="SELECT * FROM `helpdesk`.`defects_categories`";
						
						$result_cat=mysql_query($sql_cat, $con);
						echo "<select name='defects_categories' id='defects_categories' class='myselect2' style='width:100%'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result_cat)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							
							
							echo "</select>";
							
							
							
							$result_manufacts=mysql_query($manufacts, $con);	
	echo "<select name='manufacturers_update' class='myselect2' style='width:100%'>";
							echo "<option value='41'>ΚΑΤΑΣΚΕΥΑΣΤΗΣ</option>";
							while ($rowm = mysql_fetch_array($result_manufacts)) 
							{
								echo "<option value='" . $rowm['id'] . "'>" . $rowm['name'] . "</option>";
								}
							
							echo "</select>";
							*/
							if ($row['active']==1){
							echo "<input type='button' value='ΕΝΕΡΓΟ - ΑΠΕΝΕΡΓΟΠΟΙΗΣΗ' onclick='switch_model(".$row['modelid'].", 0)'>&nbsp;";
							}
							else if ($row['active']==0){
							echo "<input type='button' value='ΑΝΕΝΕΡΓΟ - ΕΝΕΡΓΟΠΟΙΗΣΗ' onclick='switch_model(".$row['modelid'].", 1)'>&nbsp;";
							}
							echo "<input type='submit' value='ΑΛΛΑΓΗ' ></form><font id='switch_result'></font>";
							/*
							echo "<form action='#' method='post' style='float:left'>
							<input type='hidden' value='".$row['modelid']."' name='delete'>
							
							 <input type='submit' value='ΔΙΑΓΡΑΦΗ' style='color:red' > 
							
							</form>";
							*/
							echo"</li>";
							
							}
						echo "</ul>";	
				  }



}


public function deleteModel(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="DELETE  FROM `helpdesk`.`models` 
					WHERE `id`=$this->model_id";
					
					////  echo $sql;
					//echo "<br>";
					mysql_query($sql, $con);
					$sql="DELETE  FROM `helpdesk`.`defects` 
					WHERE `model_id`=$this->model_id";
					
					////  echo $sql;
					mysql_query($sql, $con);
					
					echo "<h1>Η διαγραφή πραγματοποιήθηκε.</h1>";
					
				  }



}

public function deleteDefect(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					
					
					mysql_query($sql, $con);
					$sql="DELETE  FROM `helpdesk`.`defects` 
					WHERE `id`=$this->defect_id";
					
					////  echo $sql;
					//mysql_query($sql, $con);
					
					//echo "<h1>Η διαγραφή πραγματοποιήθηκε.</h1>";
					
					
					 $result=mysql_query($this->sql_back, $con);
			  echo "<h2>Βλαβες για το μοντελο ".$this->brand."&nbsp;-&nbsp;".$this->model."</h2>";echo "<hr>";
			   			while ($row = mysql_fetch_array($result)) {
							
							
							
							echo "<div class='update_div'><form action='#' method='post' >";
							echo " <strong>Κατηγορία βλάβης</strong> : ".$row['defect_cat']."&nbsp;<br> <strong>Βλάβη</strong> :&nbsp;";echo $row["title"].",&nbsp;"; echo "Κωδικός κινητήρα:&nbsp;";echo $row["engine_serial"]; 
							echo "<hr><br>";
							
							
							echo "
									
									<h3>Αιτια </h3>
									".$row["cause"]."
									<br><h3>Λυση </h3>
									".$row["description"]."
									
								";

echo "<input type='hidden' value='".$row['id']."' name='delete'>
<input type='hidden' value='".$sql."' name='sql_defects' >
	 <input type='submit' value='ΔΙΑΓΡΑΦΗ' name='delete_defect' >
	 <input type='submit' value='ΑΛΛΑΓΗ' name='update_defect'>
	 </form></div>";
							
								
							
						}
				  }



}


public function update_defect(){
	
$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				
				$sql_model="select `model`, `brand` from   `helpdesk`.`models` a inner join  `helpdesk`.`brands` b
				on a.`brand_id`=b.`id` where a.`id`=$this->model_id";	
				$result_model=mysql_query($sql_model, $con);	
				
				while ($row_model = mysql_fetch_array($result_model)) {
					$model=$row_model["model"];
					$this->model=$model;
					$brand=$row_model["brand"];
					$this->brand=$brand;
				}
						   
			$sql="select * from   `helpdesk`.`defects` where `id`=$this->defect_id ";
				////  echo $sql;	
			   $result=mysql_query($sql, $con);
			  echo "<h2>ΦΟΡΜΑ ΜΕΤΑΒΟΛΗΣ ΒΛΑΒΗΣ</h2>";
			   			while ($row = mysql_fetch_array($result)) {
							
							

							
							echo "<div class='update_div' style='padding:80px;'><form action='#' method='post' enctype='multipart/form-data'>";
							echo " <strong>".$this->brand_text." (".$this->model_text." ), &nbsp;&nbsp; ".$row['defect_cat'].",&nbsp;&nbsp; ".$this->year."
							,&nbsp;&nbsp;";echo $row["engine_serial"]; 
							
							echo "</strong>";
							echo "<input type='text' value='".$row["title"]."' name='title'>";
							
							//echo "<hr><br>";
							
							
							echo "<h3>Αιτια</h3><textarea name='cause' rows='10'>".$row["cause"]."</textarea>
								  <h3>Λυση </h3><textarea name='description' rows='20'>".$row["description"]."</textarea>
								  <h3>Επιλογη αρχειων </h3><input type='file' id='file' name='files[]' multiple='multiple' accept='image/*' />
								  <br><br>";

echo "<input type='hidden' value='".$this->brand_text."&nbsp;-&nbsp;".$this->model_text."' name='model_name'>
<input type='hidden' value='".$row['id']."' name='delete'>
<input type='hidden' value='".$sql."' name='sql_defects' >
	 <input type='submit' value='ΔΙΑΓΡΑΦΗ' name='delete_defect' >
	 <input type='submit' value='ΑΛΛΑΓΗ' name='update_defect_exec'>
	 </form>
	 
	 
	 </div>";
					
					
								
							
						}
			 
				  }
	
}

public function update_defect_exec(){

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);

$sql_defect="UPDATE `helpdesk`.`defects` SET `title` = '".$this->description."', `cause` = '".$this->cause."', 
`description` = '".$this->solution."' WHERE `defects`.`id` = ".$this->defect_id."";

mysql_query($sql_defect, $con);

//echo $this->filenames;


$files=explode(" ",$this->filenames);



//echo "<strong>".$sql_defect."</strong>";

echo"<br>";
foreach ($files as &$filename) {

    $sql_images="INSERT INTO `helpdesk`.`images` (`defect_id`, `file`) VALUES (".$this->defect_id.", '".$filename."')";
	
	if ($filename!=""){
	//echo $sql;
	mysql_query($sql_images, $con);
	}
}

echo "<h2> Η ΑΛΛΑΓΗ ΠΡΑΓΜΑΤΟΠΟΙΗΘΗΚΕ </h2>";

echo "<script type='text/javascript'>

document.window.location.assign('#update_model_response');
</script>";
}
}

public function feed_defect(){

$model_ids=explode(",",$this->model_id);

$text=file_get_contents($this->file_feed);

list($category, $model, $title, $cause, $description, $serial) = explode(":", $text);
$category=preg_replace('/\s+/', '', $category);
$model=preg_replace('/\s+/', '', $model);
$title=preg_replace('/\s+/', '', $title);
$cause=preg_replace('/\s+/', '', $cause);
$description=preg_replace('/\s+/', '', $description);
$serial=ltrim($serial);

$con = mysql_connect("db34.grserver.gr", $this->user, $this->password);
//$con = mysql_connect("db34.grserver.gr", $user, $password);

				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db($db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					/*
					$sql=" SELECT `id` FROM `helpdesk`.`models` WHERE `model`='".$model."' AND `engine_serial`='".$serial."' ";
					
					
					$model_name_result=mysql_query($sql, $con);
					while ($row = mysql_fetch_array($model_name_result)) 
					
									{
									$id=$row["id"];
									}
									*/
					foreach ($model_ids as &$value) {
					$sql_insert="insert into  `helpdesk`.`defects` (`defect_cat`, `model_id`, `title`, `cause`,  `description`, `engine_serial`)
						values 
					('".$category."', ".$value.", '".$description."', '".$cause."', '".$description."',  '".$serial."')";
					
					echo $sql_insert;
					echo "<br>";
					echo "<h3>Επιτυχης εισαγωγη για μοντέλο με id ".$value." </h3>";
					echo "<br>";
					}
					}

}

}


?>