<?php
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
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`defects` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}

	public function get_eobd(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`eobd` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}
	public function get_codes_manufacturers(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`codes_manufacturers` ";
						
						
						
						$result=mysql_query($sql, $con);
						$num_rows = mysql_num_rows($result); 
						echo $num_rows;
					
				  }
	
}


public function get_serials_per_model(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						/*$sql="SELECT DISTINCT `engine_serial` as serial FROM `auto`.`models`
					 	WHERE `model` like'%".$this->model."%' OR `model` ='".$this->model."'";
					*/
					 $sql="SELECT DISTINCT `engine_serial` as serial FROM `auto`.`models`
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
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`defects_categories`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='defect_category'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}


public function get_brands_multiple(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`brands` ORDER BY `brand` ASC";
						
						$result=mysql_query($sql, $con);
						
						
						echo "<select name='brands[]' multiple='multiple' style='width:150px'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
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

public function get_brand(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`brands`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='brandId' id='brands' onchange='showUser(this.value)' style='overflow:hidden;width:140px' >";
								echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['id']."'>" . $row['brand'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}


public function get_defect_categories(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`defects_categories`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='defect_cats' id='defect_cats'>";
								//echo "<option value=''>Κενό</option>";
							while ($row = mysql_fetch_array($result)) {
								echo "<option value='".$row['defect_category']."'>" . $row['defect_category'] . "</option>";
							}
							echo "</select>";
					
				  }
	
}



public function get_manufacturer(){
	
	$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`manufacturers`";
						
						$result=mysql_query($sql, $con);
						echo "<select name='manufacturers' id='manufacturers'>";
							echo "<option value='41'>Κανένας</option>";
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
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
							
							$sql_brands="SELECT * FROM `auto`.`brands` WHERE `id`=$value";
							//echo $sql;
							//echo "<br>";
							$result_brands=mysql_query($sql_brands, $con);
					
				
				while ($row_brands = mysql_fetch_array($result_brands)) {	
				$sql="insert into  `auto`.`codes_manufacturers` (`code`, `description`, `brand_id`)
						values 
					('".$this->manufacturer_code."', '".$this->manufacturer_code_description."', $value )";
				mysql_query($sql, $con);
				//echo $sql;
				//echo "<br>";
				echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
						}
						
					}	
					}
				  }
}

public function insert_eobd(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
						
				$sql="insert into  `auto`.`eobd` (`code`, `description`)
						values 
					('".$this->eobd_code."', '".$this->eobd_description."')";
				mysql_query($sql, $con);
				
				echo "<h2 style='color:#fff'>Επιτυχής καταχώρηση.</h2>";
				}

}



public function insert_defect(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					$sql_model_name="SELECT DISTINCT `model` as modelname FROM `auto`.`models` WHERE `id`=$this->model_id ";
					//echo $sql_model_name; echo"<br>";
					$model_name_result=mysql_query($sql_model_name, $con);
					while ($row_model_name = mysql_fetch_array($model_name_result)) {
						$modelname=$row_model_name['modelname'];
						
					}
					
					$sql_models="SELECT * FROM `auto`.`models` WHERE `model`='".$modelname."' AND `engine_serial`='".$value."'";
					
					echo $sql_models;
					//echo "<br>";
					$result_models=mysql_query($sql_models, $con);
						
				while ($row_models = mysql_fetch_array($result_models)) {
					$id=$row_models['id'];
				$sql="insert into  `auto`.`defects` (`defect_cat`, `model_id`, `title`, `cause`, `fuel`, `description`, `engine_serial`)
						values 
					('".$this->defect_category."', ".$id.", '".$this->description."', '".$this->cause."', '".$this->fuel."', '".$this->solution."',  '".$value."')";
				
				//  echo $sql; echo "<br>";
				mysql_query($sql, $con);
				 echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
					}
				}
				//$in_string=substr_replace($in_string ,"",-1);
				//echo $in_string;
				
			} else {
			
			
							   
			$sql="insert into  `auto`.`defects` (`defect_cat`, `model_id`, `title`, `cause`, `fuel`, `description`,  `engine_serial`)
						values 
					('".$this->defect_category."', '".$this->model_id."', '".$this->description."', '".$this->cause."', '".$this->fuel."', '".$this->solution."', '".$this->engine_code."')";
				// echo $sql;	
			  mysql_query($sql, $con);
			  echo "<h1>Η εγγραφή πραγματοποιήθηκε</h1>";
				  }
			}
	
}
public function show_defects(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
				$sql_model="select `model`, `brand` from   `auto`.`models` a inner join  `auto`.`brands` b
				on a.`brand_id`=b.`id` where a.`id`=$this->model_id";	
				$result_model=mysql_query($sql_model, $con);	
				
				while ($row_model = mysql_fetch_array($result_model)) {
					$model=$row_model["model"];
					$this->model=$model;
					$brand=$row_model["brand"];
					$this->brand=$brand;
				}
						   
			$sql="select * from   `auto`.`defects` where `model_id`=$this->model_id order by `defect_cat`";
				////  echo $sql;	
			   $result=mysql_query($sql, $con);
			  echo "<h2>Βλάβες για το μοντέλο ".$this->brand."&nbsp;-&nbsp;".$this->model."</h2>";echo "<hr>";
			   			while ($row = mysql_fetch_array($result)) {
							
							
							
							echo "<form action='#' method='post' >";
							echo "<a  style='color:#fff' href='#' class='big-link' data-reveal-id='myModal".$row["id"]."'> <strong>Κατηγορία βλάβης</strong> : ".$row['defect_cat']."&nbsp;, <strong>Βλάβη</strong> :&nbsp;";echo $row["title"].",&nbsp;"; echo "Κωδικός κινητήρα:&nbsp;";echo $row["engine_serial"]; echo "</a>"; 
							

echo "<input type='hidden' value='".$row['id']."' name='delete'>
	 <INPUT TYPE='image' SRC='images/delete_button.jpg' BORDER='0' ALT='SUBMIT!'> 
	
	</form>";
							echo "<br>";
							
							
							echo "<div id='myModal".$row["id"]."' class='reveal-modal' style='color:#000'>
									
									<h3>Αιτία </h3>
									".$row["cause"]."
									<h3>Λύση </h3>
									".$row["description"]."
									<a class='close-reveal-modal'>&#215;</a>
								</div>";
								
							//echo "<h3>Αιτία </h3>";
							//echo $row["cause"]; echo "<hr>";
							
							//echo "<h3>Λύση </h3><hr>";
							//echo $row["description"]; echo "<br>";
						}
			 
				  }
	
}


public function show_defects_visitor(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
				$sql_model="select `model`, `brand` from   `auto`.`models` a inner join  `auto`.`brands` b
				on a.`brand_id`=b.`id` where a.`id`=$this->model_id";	
				$result_model=mysql_query($sql_model, $con);	
				
				while ($row_model = mysql_fetch_array($result_model)) {
					$model=$row_model["model"];
					$this->model=$model;
					$brand=$row_model["brand"];
					$this->brand=$brand;
				}
						   
			$sql="select * from   `auto`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'order by `defect_cat`";
			
			$sql_category="select DISTINCT  `defect_cat` as category from   `auto`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
			
			$sql_eng_code="select DISTINCT  `engine_serial` as eng_code from   `auto`.`defects` where `model_id`=$this->model_id  AND `defect_cat` LIKE '%".$this->defect_cats_id."%'";
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
echo " <INPUT TYPE='image' SRC='images/back.png' BORDER='0' ALT='SUBMIT!'> ";
echo "</form>";
echo "<hr>";
			   			while ($row = mysql_fetch_array($result)) {
							
							
							
							echo "<form action='#' method='post' >";
							echo "<a  style='color:#fff' href='#' class='big-link' data-reveal-id='myModal".$row["id"]."'>  <strong>Βλάβη</strong> :&nbsp;";echo $row["title"].",&nbsp;";  echo "</a>"; 
							

echo "<input type='hidden' value='".$row['id']."' name='delete'>
	 
	
	</form>";
							echo "<br>";
							
							
							echo "<div id='myModal".$row["id"]."' class='reveal-modal' style='color:#000'>
									
									<h3>Αιτία </h3>
									".$row["cause"]."
									<h3>Λύση </h3>
									".$row["description"]."
									<a class='close-reveal-modal'>&#215;</a>
								</div>";
								
							//echo "<h3>Αιτία </h3>";
							//echo $row["cause"]; echo "<hr>";
							
							//echo "<h3>Λύση </h3><hr>";
							//echo $row["description"]; echo "<br>";
						}
			 
				  }
	
}

public function insert_brand(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
					
							   
			$sql="insert into  `auto`.`brands` (`brand`)
						values 
					('".$this->brand."')";
					
			   mysql_query($sql, $con);
				  }
	
}


public function insert_manufacturer(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
					
							   
			$sql="insert into  `auto`.`manufacturers` (`name`)
						values 
					('".$this->manufacturer."')";
					
			   mysql_query($sql, $con);
				  }
	
}

	

public function insert_auto(){


$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
				
					
							   
			$sql="insert into  `auto`.`models` (`brand_id`, `model`, `prod_year`, `engine_serial`, `system`, `manufact_id`)
						values 
					('".$this->brandId."', '".$this->model."', '".$this->year."', '".$this->engine_code."', '".$this->system."', '".$this->manufacturerid."')";
					
			   mysql_query($sql, $con);
			   
				  }


}


public function get_auto_table(){

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
						$sql="SELECT * FROM `auto`.`models`";
						
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

public function search_auto(){

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					/*	$sql="SELECT * FROM `auto`.`models`
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$year_string."".$serial_string."".$system_string." ".$manufacturerid_string."";
						*/
						
						$sql="SELECT a.`id` as modelid,  `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$serial_string." order by a.`model` asc";
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						
						echo "<table width='85%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
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
	
	$sql_defects="SELECT  `model_id`  FROM `auto`.`defects` 
						WHERE `model_id`=".$row['modelid']."";
						
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects==0){				
		echo " <INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'> ";
	} else {
		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	// echo  "<INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'>";
	
	echo "</form></td>
  </tr>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}



public function search_auto_brand(){

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
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
	$sql_defects="SELECT  `model_id`  FROM `auto`.`defects` 
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

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue order by a.`model` asc";
					}else {
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
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
						
						
						echo "<table width='85%' border='0' cellspacing='0' cellpadding='0'>
  <tr >
    <td>ΜΑΡΚΑ</td>
    <td>ΜΟΝΤΕΛΟ</td>
    <td>ΕΤΟΣ ΠΑΡΑΓΩΓΗΣ </td>
    <td>ΚΩΔ. ΚΙΝΗΤΗΡΑ</td>
   
  </tr>";
							while ($row = mysql_fetch_array($result)) {
								
	$sql_defects="SELECT  *  FROM `auto`.`defects` 
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



public function go_back(){

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
								
	$sql_defects="SELECT  *  FROM `auto`.`defects` 
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

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
							
							$sql="SELECT a.`id` as modelid,  `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE `engine_serial` like '%".$this->engine_code."%'";
						}
						else 
						{*/
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`brand_id`=$this->brandId ".$model_string."".$serial_string." ORDER BY a.`model` asc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `auto`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `auto`.`brands`";
						
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
	 $sql_defects="SELECT  `model_id`  FROM `auto`.`defects` 
						WHERE `model_id`=".$row['modelid']."";
						
					//	//  echo $sql_defects;
	$result_defects=mysql_query($sql_defects, $con);
	$num_rows_defects = mysql_num_rows($result_defects);	
	if ($num_rows_defects==0){				
		echo " <INPUT TYPE='image' SRC='images/defects_icon.jpg' BORDER='0' ALT='SUBMIT!'> ";
	} else {
		echo " <INPUT TYPE='image' SRC='images/defects_icon_red.jpg' BORDER='0' ALT='SUBMIT!'> ";
	}
	
	echo "</form></td>
	<td><form action='#' method='post'>
	<input type='hidden' value='".$row['modelid']."' name='delete'>
	
	 <INPUT TYPE='image' SRC='images/delete_button.jpg' BORDER='0' ALT='SUBMIT!'> 
	
	</form></td>
	
	
  </tr>";
							}
							
echo "</table>";						
				  }
	
	
	



	
}








public function show_update_list_brand(){

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					/* $sql = "select * from   `auto`.`defects` where `model_id`=$this->model_id order by `defect_cat`";
					mysql_query($sql, $con);*/
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a 						inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`=$this->FieldValue ORDER BY a.`model` asc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `auto`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `auto`.`brands`";
						
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
	$sql_defects="SELECT  `model_id`  FROM `auto`.`defects` 
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

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `auto`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `auto`.`brands`";
						
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

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `auto`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `auto`.`brands`";
						
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

$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					
					
						$sql="SELECT a.`id` as modelid, a.`brand_id`, `model`,  `prod_year`, `engine_serial`, `system`, `manufact_id`, `brand`, `name`, c.`id` as man_id FROM `auto`.`models` a inner join `auto`.`brands` b
						on a.brand_id=b.id
						inner join manufacturers c
						on a.manufact_id=c.id
						WHERE
						`".$this->field."`='".$this->FieldValue()."' ORDER BY a.`id` desc";
					//	}
						
						//  echo $sql;
						$result=mysql_query($sql, $con);
						
						$manufacts="SELECT * FROM `auto`.`manufacturers`";
						
						
						
						$brands_sql="SELECT * FROM `auto`.`brands`";
						
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
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					$sql="UPDATE `auto`.`manufacturers` SET 
					 `name`='".$this->manufacturer."'
					WHERE `id`=$this->manufacturerid";
					
					////  echo $sql;
					mysql_query($sql, $con);
					
					echo "<h3>Η αλλαγή πραγματοποιήθηκε</h3>";
				  }	
	
	
}


public function updateModel(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					$sql="UPDATE `auto`.`models` SET 
					 `brand_id`=$this->brandId,`model`='".$this->model."', `prod_year`='".$this->year."', `engine_serial`='".$this->engine_code."', `system`='".$this->system."', `manufact_id`=$this->manufacturerid
					WHERE `id`=$this->model_id";
					
					//  echo $sql;
					mysql_query($sql, $con);
					
				  }



}


public function deleteModel(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					
					$sql="DELETE  FROM `auto`.`models` 
					WHERE `id`=$this->model_id";
					
					////  echo $sql;
					//echo "<br>";
					mysql_query($sql, $con);
					$sql="DELETE  FROM `auto`.`defects` 
					WHERE `model_id`=$this->model_id";
					
					////  echo $sql;
					mysql_query($sql, $con);
					
					echo "<h1>Η διαγραφή πραγματοποιήθηκε.</h1>";
					
				  }



}

public function deleteDefect(){
	
$con = mysql_connect("db16-2.grserver.gr", $this->user, $this->password);
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
					$sql="DELETE  FROM `auto`.`defects` 
					WHERE `id`=$this->defect_id";
					
					////  echo $sql;
					mysql_query($sql, $con);
					
					echo "<h1>Η διαγραφή πραγματοποιήθηκε.</h1>";
					
				  }



}


}


?>
