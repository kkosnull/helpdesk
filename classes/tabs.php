<?php
class tabs {
private $client_id;
private $user;
private $password;
private $db;

// other variables


private $agores;
private $polisis;
private $prospliromi;
private $diagrafi;
private $paratirisis;
private $apostoli;
private $year;
private $col;
private $month;
private $record_year;
private $fileurl;
private $comments;
private $table_Cell;
private $filename;



private $grid=array( array (
					 array(motnh=>"1", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"",apostoli=>""),
					 array(motnh=>"2", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"3", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"4", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"5", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"6", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"7", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"8", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"9", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"10", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"11", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>""),
					 array(motnh=>"12", year=>"", agores=>"", polisis=>"", prospliromi=>"", diagrafi=>"", paratirisis=>"", apostoli=>"")));
					 
public function set_table_Cell($table_Cell) {
		$this->table_Cell = $table_Cell;
		
	}

public function setRecordsDelete($col, $month, $record_year, $filename){
	$this->col = $col;
		$this->month = $month;
		$this->record_year = $record_year;
		$this->filename = $filename;
}
public function setRecordsComments($col, $month, $record_year, $comments) {
		$this->col = $col;
		$this->month = $month;
		$this->record_year = $record_year;
		$this->comments = $comments;
}

public function setRecords($col, $month, $record_year, $fileurl) {
		$this->col = $col;
		$this->month = $month;
		$this->record_year = $record_year;
		$this->fileurl = $fileurl;
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
public function setClient_id($client_id) {
		$this->client_id = $client_id;
		
	}
	
// grid variables	

public function set_month($month) {
		$this->month = $month;
		
	}
public function set_agores($agores) {
		$this->agores = $agores;
		
	}
public function set_polisis($polisis) {
		$this->polisis = $polisis;
		
	}
public function set_prospliromi($prospliromi) {
		$this->prospliromi = $prospliromi;
		
	}
public function set_diagrafi($diagrafi) {
		$this->diagrafi = $diagrafi;
		
	}
public function set_paratirisis($paratirisis) {
		$this->paratirisis = $paratirisis;
		
	}
public function set_apostoli($apostoli) {
		$this->apostoli = $apostoli;
		
	}
public function set_year($year) {
		$this->year = $year;
		
	}

public function addYear(){
	$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db('emron_online', $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					$sql="SELECT MAX(`year`) as maxyear FROM `emron_online`.`field_ids` WHERE `client_id`=$this->client_id";
					//echo $sql;
					
					
					$result=mysql_query($sql, $con);
					while($row = mysql_fetch_array($result))
					{
						$maxvalue=$row['maxyear'];
						
					}
					//echo $maxvalue;
					
				
					if ($maxvalue>0){
						//echo "test";
					//while($row = mysql_fetch_array($result))
					//{
						//$newYear=$row['maxyear']+1;
						$newYear=$maxvalue+1;
						
					//}
					}
					else {
						//echo "fail";
						$newYear=date('Y');
					}
					//echo $newYear;
					
					
					// insert ascending year into fields  
					
					$sql="INSERT INTO `emron_online`.`field_ids` (`year`, `client_id`)
					VALUES ($newYear, $this->client_id)";
					//echo $sql;
					mysql_query($sql, $con);
					
					
					// insert data rows into grid for new year
					
					for ($counter=1; $counter<=12; $counter++){
						
						$sql="INSERT INTO `emron_online`.`tabs` (`client_id`, `month`, `year`)
					VALUES ($this->client_id, $counter,  $newYear)
					";
					mysql_query($sql, $con);
					}
					
					?>
    
    
<script type="text/javascript">

//window.location="http://www.emron.gr/web/online/online.php?client=<?php echo $this->client_id?>&action=update";
</script>

    <?php
				
}


}

public function connect(){


$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					$this->status="Ok!";
}



}



public function insert_year(){
  
  $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					for ($counter=0; $counter<=12; $counter++){
						
						$sql="INSERT INTO `emron_online`.`field_ids` (`year`, `client_id)
					VALUES (this->year, $this->client_id)
					";
					mysql_query($sql, $con);
					}
				  }
				  
	
}


public function insertComment(){
 $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
				//	agores	polisis	prospliromi	diagrafi	paratirisis	apostoli
					
					$sql="UPDATE `emron_online`.`tabs` SET `paratirisis`='".$this->comments."'
					WHERE `client_id`=$this->client_id
					AND `year`='".$this->record_year."'
					AND `month`=$this->month";
					
					
					echo $sql;
					
					mysql_query($sql, $con);
					
					
				  }
				  
	
}



public function insertRecord(){
 $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					$sql="SELECT `".$this->col."` as thiscol FROM  `emron_online`.`tabs`
					WHERE `client_id`=$this->client_id
					AND `year`='".$this->record_year."'
					AND `month`=$this->month";
					
					$result=mysql_query($sql, $con);
					while($row = mysql_fetch_array($result))
					{
						$thiscol=$row['thiscol'];
						
					}
					//echo $thiscol;
					$newrecord=$this->fileurl;
					//echo "".$thiscol."<br><a href='logistiko_files/".$newrecord."' target='_blank'>".$newrecord."</a>";
					$updaterecord="".$thiscol.";".$newrecord."";
							
					$sql="UPDATE `emron_online`.`tabs` SET `".$this->col."`='".$updaterecord."'
					WHERE `client_id`=$this->client_id
					AND `year`='".$this->record_year."'
					AND `month`=$this->month";
						
					/*$sql="UPDATE `emron_online`.`tabs` SET `".$this->col."`='".$thiscol."".$this->fileurl."'
					WHERE `client_id`=$this->client_id
					AND `year`='".$this->record_year."'
					AND `month`=$this->month";*/
					
					
					echo $sql;
					
					mysql_query($sql, $con);
						?>
<script type="text/javascript">

//window.location="http://www.emron.gr/web/online/online.php?client=<?php// echo $this->client_id ?>&action=update";
window.open("http://www.emron.gr/web/online/online.php?client=<?php echo $this->client_id ?>&action=update", "_top");
</script>
<?php		
					
				  }
				  
	
}

public function delete_file(){


$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
// $con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				  else
				  {
					 
					 mysql_select_db("emron_online", $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
			
			
					
			$sql="SELECT `".$this->col."` as deletedata FROM `emron_online`.`tabs` WHERE `client_id` =  $this->client_id
			AND `year`='".$this->record_year."' AND `month`=$this->month";
			
			//echo $sql;
			$result=mysql_query($sql, $con);
			while($row = mysql_fetch_array($result))
				  			{	
							$filename=$row['deletedata'];
							$deletedata=str_replace($this->filename, "", $filename);
							$deletedata=str_replace(";;", ";", $deletedata);
							}
							//echo $this->filename;
							
							$sql="UPDATE `emron_online`.`tabs` SET `".$this->col."`='".$deletedata."' WHERE `client_id` =  $this->client_id
			AND `year`='".$this->record_year."' AND `month`=$this->month";
							echo $sql;
							mysql_query($sql, $con);
							
							unlink('logistiko_files/'.$this->filename);
							//header( 'Location: http://www.yoursite.com/new_page.html' ) ;
							?>
<script type="text/javascript">

//window.location="http://www.emron.gr/web/online/online.php?client=<?php //echo $this->client_id ?>&action=update";
window.open("http://www.emron.gr/web/online/online.php?client=<?php echo $this->client_id ?>&action=update", "_top");
</script>
<?php
			}
	
	
}

public function insert_grid(){
  
  $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					
					for ($counter=0; $counter<=12; $counter++){
						
						$sql="INSERT INTO `emron_online`.`tabs` (`client_id`, `month`, `year`)
					VALUES ($this->client_id, $counter,  $this->year)
					";
					mysql_query($sql, $con);
					}
				  }
	
}



public function draw_grid_clients(){
	 $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					// january
					
						


		$sql_grid_data="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id";
				//echo $sql_grid_data;		
		$result=mysql_query($sql_grid_data, $con);
		
		$counter=0;
		$month=0;
		while($row = mysql_fetch_array($result))
					{
					$counter++;	
					$month++;
					if ($month%13==0){
						$month=1;
					}
					$this->grid[$counter][$month]['agores']=$row['agores'];	
					$this->grid[$counter][$month]['polisis']=$row['polisis'];	
					$this->grid[$counter][$month]['prospliromi']=$row['prospliromi'];	
					$this->grid[$counter][$month]['diagrafi']=$row['diagrafi'];	
					$this->grid[$counter][$month]['paratirisis']=$row['paratirisis'];	
					$this->grid[$counter][$month]['apostoli']=$row['apostoli'];	
					
					/*echo $counter; echo "--->"; echo $month; echo "-->";
					echo $this->grid[$counter][$month]["agores"];
					echo "<br>";*/
					
					
					}

//echo $this->grid[13][1]["agores"];
$sql="SELECT DISTINCT `year` FROM `emron_online`.`tabs` 
	  WHERE `client_id`=$this->client_id";
						
						
														
		//echo $sql;						

$result=mysql_query($sql, $con);
$counter=0;
$month=0;

while($row = mysql_fetch_array($result)){	
	
echo "<div id='".$row['year']."' style='padding:0px; 0px; 0px; 0px;'>";
echo " <table width='100%' height='500' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
   <td bgcolor='#e1eafe' width='50px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Μήνας</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Αγορές</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Πωλήσεις</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Προς πληρωμή</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Διαγραφή</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Παρατηρήσεις</strong></td>
   <td bgcolor='#e1eafe' width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Αποστολή αρχείων</strong></td>
  </tr>";
  
 	   
for ($i=1; $i<=12; $i++){
				$counter++;	
				$month++;
					if ($month%13==0){
						$month=1;
					}
echo " <tr>
   <td align='center' width='154px' height='80px' valign='bottom' valign='top'>"; 
   
if ($i == 1) {
    echo "ΙΑΝ";
} elseif ($i == 2) {
    echo "ΦΕΒ";
} elseif ($i == 3) {
    echo "ΜΑΡ";
}
elseif ($i == 4) {
    echo "ΑΠΡ";
}
elseif ($i == 5) {
    echo "ΜΑΙ";
}
elseif ($i == 6) {
    echo "ΙΟΥΝ";
}
elseif ($i == 7) {
    echo "ΙΟΥΛ";
}
elseif ($i == 8) {
    echo "ΑΥΓ";
}
elseif ($i == 9) {
    echo "ΣΕΠ";
}
elseif ($i == 10) {
    echo "ΟΚΤ";
}
elseif ($i == 11) {
    echo "ΝΟΕ";
}
elseif ($i == 12) {
    echo "ΔΕΚ";
}
echo "<div id='apostoli$i".$row['year']."' class='reveal-modal'  style='width:300px; height:90px'>
        Επιλέξτε ένα αρχείο για upload.<hr>
		<form action='#' method='post' enctype='multipart/form-data'>
		<input name='file' type='file'>
		<input type='hidden' name='year' value='".$row['year']."'> Χρονιά
	   <input type='hidden' name='col' value='apostoli'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";		  		
	

   
   
   echo"</td>
    <td align='center' width='154px' height='80px' valign='bottom'>";
	
	$agores = explode(";", $this->grid[$counter][$month]["agores"]);
	
	foreach ($agores as $key => $value) {
		$file = substr($value,0,11);
   echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a><br />\n";
    }
	// echo $this->grid[$counter][$month]["agores"];
	 
	  echo "</td>
   <td align='center' width='154px' height='80px' valign='bottom' >";
   $polisis = explode(";", $this->grid[$counter][$month]["polisis"]);
   
    foreach ($polisis as $key => $value) {
		$file = substr($value,0,11);
    echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a><br />\n";
    }
	
	
	// echo $this->grid[$counter][$month]["polisis"]; 
	 
	 echo "</td>
   <td align='center' width='154px' height='80px' valign='bottom' >";
   $prospliromi = explode(";", $this->grid[$counter][$month]["prospliromi"]);
   
    foreach ($prospliromi as $key => $value) {
		$file = substr($value,0,11);
   echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a><br />\n";
    }
   
   
    // echo $this->grid[$counter][$month]["prospliromi"];
	 
	  echo "</td>
   <td align='center' width='154px' height='80px' valign='bottom' >";
    $diagrafi = explode(";", $this->grid[$counter][$month]["diagrafi"]);
	
	foreach ($diagrafi as $key => $value) {
		$file = substr($value,0,11);
   echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a><br />\n";
    }
   //  echo $this->grid[$counter][$month]["diagrafi"]; 
	 
	 echo "</td>
   <td align='center' width='154px' height='80px' valign='bottom' >";  echo $this->grid[$counter][$month]["paratirisis"]; echo "</td>
   <td align='center' width='154px' height='80px' valign='bottom' >"; 
   
    echo "<div id='trigger_apostoli$month".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div>";
   
	
   
  
   /*$apostoli = explode(";", $this->grid[$counter][$month]["apostoli"]);
   
   foreach ($apostoli as $key => $value) {
	   $file = substr($value,0,11);
    echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a><br />\n";
    }*/
   
  //  echo $this->grid[$counter][$month]["apostoli"];
	
	   echo "</td>
  </tr>";
		}

 
echo " </table>
   </div>";	
	

		
		}

	}
}

public function draw_grid(){
  $con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
					// january
					
						$sql="SELECT * FROM `emron_online`.`tabs` a INNER JOIN `emron_online`.`field_ids` b
						ON a.`year`=b.`year`
						WHERE
						a.`client_id`=$this->client_id";
						
		// find and separate years				
						
		
		

		
						
									
		$sql="SELECT  DISTINCT `year` FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id";
						
						
														
		//echo $sql;						

$result=mysql_query($sql, $con);

	while($row = mysql_fetch_array($result)){	
		
		
						  
echo "<div id='".$row['year']."' style='padding:0px; 0px; 0px; 0px;'>";
echo " <input type='hidden' value='' name='year'>
 <table width='100%' height='500' border='1' cellspacing='0' cellpadding='0' bordercolor='#000000'>
  <tr>
   <td width='70px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Μήνας</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Αγορές</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Πωλήσεις</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Προς πληρωμή</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Διαγραφή</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Παρατηρήσεις</strong></td>
   <td width='154px' height='40px' align='center' valign='bottom' style='text-align: center'><strong>Αποστολή αρχείων</strong></td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Ιαν</td>
    <td align='center' width='154px' height='80px' valign='bottom'>"; 
	
	echo "<div  style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='1'>
					 <input type='hidden' name='deletefile' value='fubar'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					 <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
	 echo "<div id='trigger_agores1".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
	 
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
					$file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='1'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   
  echo "<div id='trigger_polisis1".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='1'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>"; 
    echo "<div id='trigger_pliromi1".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='1'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>"; 
   
    echo "<div id='trigger_diagrafi1".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>"; 
	
    echo "<div id='trigger_paratirisis1".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
  echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=1 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='1'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>"; 
   
  echo "</td>
  </tr>
  <tr>
  
   <td align='center' width='70px' height='80px' valign='center'>Φεβ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=2 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='2'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
  echo "<div id='trigger_agores2".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=2 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis  = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='2'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
 echo "  <div id='trigger_polisis2".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
  
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=2 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi  = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='2'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
  echo " <div id='trigger_pliromi2".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=2 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_pliromi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi  = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='2'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_diagrafi2".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	 echo  $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   echo "<div id='trigger_paratirisis2".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=2 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli  = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='2'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
  echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Μαρ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='3'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
  echo  "<div id='trigger_polisis3".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='3'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
  echo " <div id='trigger_polisis3".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='pliromi'>
					 <input type='hidden' name='month' value='3'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_pliromi3".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='3'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_diagrafi3".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   echo "<div id='trigger_paratirisis3".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=3 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='3'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Απρ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
   
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='4'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
  echo  "<div id='trigger_agores4".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='4'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis4".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='4'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_pliromi4".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='4'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_diagrafi4".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	echo "</div>";
   
   echo "<div id='trigger_paratirisis4".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=4 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='4'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Μαι</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='5'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_agores5".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='5'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis5".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='5'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_pliromi5".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='5'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   
   echo "<div id='trigger_diagrafi5".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   
   echo "<div id='trigger_paratirisis5".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=5 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='5'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Ιουν</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_agores6".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis6".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_pliromi6".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_diagrafi6".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   echo "<div id='trigger_paratirisis6".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=6 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Ιουλ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='7'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_agores7".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='7'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis7".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='7'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_pliromi7".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='6'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_diagrafi7".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   echo "<div id='trigger_paratirisis7".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=7 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='7'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Αυγ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='8'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_agores8".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='8'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis8".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='8'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_pliromi8".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='7'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_diagrafi8".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   echo "<div id='trigger_paratirisis8".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=8 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='8'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Σεπτ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='9'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo"<div id='trigger_agores9".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='9'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis9".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='9'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_pliromi9".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='8'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_diagrafi9".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	 echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   echo "<div id='trigger_paratirisis9".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=9 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='9'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Οκτ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='10'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo"<div id='trigger_agores10".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_polisis10".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='10'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_pliromi10".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
       echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='10'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_diagrafi10".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
       echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	echo  $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   
   echo "<div id='trigger_paratirisis10".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
       echo "<div   style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=10 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='10'>
					 <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Νοε</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
echo "<table width='100%'>";
	foreach ($agores as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='agores'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "<div id='trigger_agores11".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   echo "<div id='trigger_polisis11".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_pliromi11".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_diagrafi11".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	 echo $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   
   echo "<div id='trigger_paratirisis11".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=11 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='11'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   echo "</td>
  </tr>
  <tr>
   <td align='center' width='70px' height='80px' valign='center'>Δεκ</td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_agores="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_agores=mysql_query($sql_agores, $con);

	while($row_agores = mysql_fetch_array($result_agores)){
	
	 $agores = explode(";", $row_agores['agores']);
	}
	foreach ($agores as $key => $value) {
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $value</a><br />\n";
   						 }
	echo "</div>";
   echo "<div id='trigger_agores12".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
    echo "<div  style='cursor:pointer; ' >"; 
	$sql_polisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_polisis=mysql_query($sql_polisis, $con);

	while($row_polisis = mysql_fetch_array($result_polisis)){
	
	 $polisis = explode(";", $row_polisis['polisis']);
	}
	echo "<table width='100%'>";
	foreach ($polisis as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='polisis'>
					 <input type='hidden' name='month' value='12'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
	
   echo "<div id='trigger_polisis12".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
  echo "<div   style='cursor:pointer; ' >"; 
	$sql_pliromi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_pliromi=mysql_query($sql_pliromi, $con);

	while($row_pliromi = mysql_fetch_array($result_pliromi)){
	
	 $pliromi = explode(";", $row_pliromi['prospliromi']);
	}
	echo "<table width='100%'>";
	foreach ($pliromi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='prospliromi'>
					 <input type='hidden' name='month' value='12'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>"; 
   
   
   echo "<div id='trigger_pliromi12".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div  style='cursor:pointer; ' >"; 
	$sql_diagrafi="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_diagrafi=mysql_query($sql_diagrafi, $con);

	while($row_diagrafi = mysql_fetch_array($result_diagrafi)){
	
	 $diagrafi = explode(";", $row_diagrafi['diagrafi']);
	}
	echo "<table width='100%'>";
	foreach ($diagrafi as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='diagrafi'>
					 <input type='hidden' name='month' value='12'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "<div id='trigger_diagrafi12".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_file_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div   style='cursor:pointer; ' >"; 
	$sql_paratirisis="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_paratirisis=mysql_query($sql_paratirisis, $con);

	while($row_paratirisis = mysql_fetch_array($result_paratirisis)){
	
	 echo  $row_paratirisis['paratirisis'];
	}
	
	echo "</div>";
   
   
   echo "<div id='trigger_paratirisis12".$row['year']."'   style='cursor:pointer; ' ><img src='images/add_comment_icon.jpg'></div></td>
   <td align='center' width='154px' height='80px' valign='bottom'>";
   
   echo "<div style='cursor:pointer; ' >"; 
	$sql_apostoli="SELECT  * FROM `emron_online`.`tabs` 
						WHERE `client_id`=$this->client_id AND `month`=12 AND `year`=".$row['year']."";
						
						$result_apostoli=mysql_query($sql_apostoli, $con);

	while($row_apostoli = mysql_fetch_array($result_apostoli)){
	
	 $apostoli = explode(";", $row_apostoli['apostoli']);
	}
	echo "<table width='100%'>";
	foreach ($apostoli as $key => $value) {
		if (strlen($value)<>0){
					echo "<tr><td  id='tabs'>";
  					 $file = substr($value,0,11);
  					 echo "<a href='logistiko_files/$value', target='_blank'>"; echo " $file</a>";
					 echo "</td><td>";
					 echo "<form action='#' method='post'>
					 <input type='hidden' name='year' value='".$row['year']."'>
					 <input type='hidden' name='col' value='apostoli'>
					 <input type='hidden' name='month' value='12'>
					  <input type='hidden' name='filename' value='$value'>
					  <input type='hidden' name='deletefile' value='fubar'>
					  <input type='Submit' name='Delete' value='X' onClick='return confirmSubmit()' id='submit'>
					 </form></td></tr>";
   						 }}
						 echo "</table>";
	echo "</div>";
   
   
   echo "</td>
  </tr>
      </table>
      </form>
  </div>";	
  
  
  

  
  
  for ($i=1; $i<=12; $i++){
			echo "<div id='agores$i' class='reveal-modal'  style='width:300px; height:90px'>
        Επιλέξτε ένα αρχείο για upload.<hr>
		<form action='#' method='post' enctype='multipart/form-data'>
		<input name='file' type='file'>";
		
		$con_year = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
				if (!$con_year)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con_year);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con_year);
					
					$sql="SELECT DISTINCT `year` FROM  `emron_online`.`field_ids`
					WHERE `client_id`=$this->client_id";
					
					$agores_year=mysql_query($sql, $con_year);
					
						echo "<select name='year'>";
							while ($row_agores_year = mysql_fetch_array($agores_year)) {
								echo "<option value='".$row_agores_year['year']."'>" . $row_agores_year['year'] . "</option>";
							}
							echo "</select>";	
							
				  }mysql_close($con_year);
		
		echo "<input type='text' name='year_old' value=''>Χρονιά
	   <input type='hidden' name='col' value='agores'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";
			
		echo "<div id='polisis$i' class='reveal-modal'  style='width:300px; height:90px'>
        Επιλέξτε ένα αρχείο για upload.<hr>
		<form action='#' method='post' enctype='multipart/form-data'>
		<input name='file' type='file'>";
		$con_year = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
				if (!$con_year)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con_year);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con_year);
					
					$sql="SELECT DISTINCT `year` FROM  `emron_online`.`field_ids`
					WHERE `client_id`=$this->client_id";
					
					$polisis_year=mysql_query($sql, $con_year);
					
						echo "<select name='year'>";
							while ($row_polisis_year = mysql_fetch_array($polisis_year)) {
								echo "<option value='".$row_polisis_year['year']."'>" . $row_polisis_year['year'] . "</option>";
							}
							echo "</select>";	
							
				  }mysql_close($con_year);
		
		echo "<input type='text' name='year_old' value=''>Χρονιά
	   <input type='hidden' name='col' value='polisis'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";
			
			echo "<div id='prospliromi$i' class='reveal-modal'  style='width:300px; height:90px'>
        Επιλέξτε ένα αρχείο για upload.<hr>
		<form action='#' method='post' enctype='multipart/form-data'>
		<input name='file' type='file'>";
		$con_year = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
				if (!$con_year)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con_year);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con_year);
					
					$sql="SELECT DISTINCT `year` FROM  `emron_online`.`field_ids`
					WHERE `client_id`=$this->client_id";
					
					$prospliromi_year=mysql_query($sql, $con_year);
					
						echo "<select name='year'>";
							while ($row_prospliromi_year = mysql_fetch_array($prospliromi_year)) {
								echo "<option value='".$row_prospliromi_year['year']."'>" . $row_prospliromi_year['year'] . "</option>";
							}
							echo "</select>";	
							
				  }mysql_close($con_year);
		echo "<input type='text' name='year_old' value=''>Χρονιά
	   <input type='hidden' name='col' value='prospliromi'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";
		
		echo "<div id='diagrafi$i' class='reveal-modal'  style='width:300px; height:90px'>
        Επιλέξτε ένα αρχείο για upload.<hr>
		<form action='#' method='post' enctype='multipart/form-data'>
		<input name='file' type='file'>
		<input type='text' name='year' value=''>Χρονιά
	   <input type='hidden' name='col' value='diagrafi'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";
			
		echo "<div id='paratirisis$i' class='reveal-modal'  style='width:300px; height:170px'>
        Εισαγωγή παρατηρήσεων<hr>
		<form action='#' method='post' >
		 Σχόλια :<textarea name='comments' id='textarea' cols='45' rows='5'></textarea>
		<input type='text' name='year' value=''>
	   <input type='hidden' name='col' value='paratirisis'>
	   <input type='hidden' name='month' value='$i'>
	    <input type='hidden' name='submit' value=fubar'>
        <input type='submit' value='Εισαγωγή'>
        </form>
      
            </div>";
			
		
			
			 echo "<div id='view_files_agores$i' class='reveal-modal'  style='width:300px; height:300px'>";
			
					
	
      
            echo "</div>";
							}
							
						}
					
					}
		 
					
}

public function draw_javascript(){


$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
$sql="SELECT `year` FROM `emron_online`.`field_ids` WHERE `client_id`=$this->client_id";		
						
$result=mysql_query($sql, $con);
				
				
while($row = mysql_fetch_array($result)){
					for ($i=1; $i<=12; $i++){
			
					echo"<script language='javascript'>
					$('#trigger_agores".$i."".$row['year']."').click(function() {
						$('#agores".$i."').reveal();
					});
					$('#trigger_polisis".$i."".$row['year']."').click(function() {
						$('#polisis".$i."').reveal();
					});
					$('#trigger_pliromi".$i."".$row['year']."').click(function() {
						$('#prospliromi".$i."').reveal();
					});
					$('#trigger_diagrafi".$i."".$row['year']."').click(function() {
						$('#diagrafi".$i."').reveal();
					});
					$('#trigger_paratirisis".$i."".$row['year']."').click(function() {
						$('#paratirisis".$i."').reveal();
					});
					
					$('#view_files_agores_trigger".$i."".$row['year']."').click(function() {
						$('#view_files_agores".$i."').reveal();
					});
					$('#view_files_polisis_trigger".$i."".$row['year']."').click(function() {
						$('#view_files_agores".$i."').reveal();
					});
					</script>	";	
								}
						}
					
				 }
}

public function confirm_script(){

echo "<script LANGUAGE='JavaScript'>
<!--
// Nannette Thacker http://www.shiningstar.net
function confirmSubmit()
{
var agree=confirm('Are you sure you wish to continue?');
if (agree)
	return true ;
else
	return false ;
}
// -->
</script>";	
	
}

public function draw_javascript_client(){


$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
$sql="SELECT `year` FROM `emron_online`.`field_ids` WHERE `client_id`=$this->client_id";		
						
$result=mysql_query($sql, $con);
				
				
while($row = mysql_fetch_array($result)){
					for ($i=1; $i<=12; $i++){
			
					echo"<script language='javascript'>
					
					$('#trigger_apostoli".$i."".$row['year']."').click(function() {
						$('#apostoli".$i."".$row['year']."').reveal();
					});
					
					</script>	";	
								}
						}
					
				 }
}

public function draw_tabs(){
	
	
	$con = mysql_connect("db13.grserver.gr","kkos1234","xrt966");
//$con = mysql_connect("db13.grserver.gr", $this->user, $this->password);
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  $this->status="Disconnected";
				  }
				  else
				  {
					 
					 mysql_select_db($this->db, $con);
					 
					 $sql = "SET NAMES 'utf8'";
					mysql_query($sql, $con);
					
$sql="SELECT * FROM `emron_online`.`field_ids` WHERE

						`client_id`=$this->client_id";		
						
$result=mysql_query($sql, $con);
					//echo $sql;
					echo "<ul>";
					while($row = mysql_fetch_array($result)){
						
						echo "<li><a href='#".$row['year']."'>".$row['year']."</a></li>";
					}
				echo   "</ul>";	
				
				  }
}




}
?>
