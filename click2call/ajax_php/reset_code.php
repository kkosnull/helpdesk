<?php
$hidden="";
			$filename0="images";
			$filename1="img";
			$filename2=rand(1, 7);
			$extension="png";
			$filename=$filename0."/".$filename1."".$filename2.".".$extension;
			switch ($filename2) {
        case 1:
        $hidden="abdgv";
        break;
		case 2:
        $hidden="fkbnj";
        break;
		case 3:
        $hidden="ewsdf";
        break;
		case 4:
        $hidden="gfdgd";
        break;
		case 5:
        $hidden="thesis";
        break;
		case 6:
        $hidden="logos";
        break;
		case 7:
        $hidden="asvbn";
        break;
			}
			
	echo "<div style='position:absolute; width:200px; margin-left:-43px;' id ='security_div' >
			
	<img src='".$filename."' id='sec_code_img' >
	<img src='images/reset.png'  onclick='reset_security_code();' style='cursor:pointer;'>
	</div>
	
	<input type='text'  name='securitycode' id='securitycode' placeholder='Κωδικός ασφαλείας' style='width:320px'>
	<input type='hidden'  name='securitycodehidden'  value='".$hidden."'>";
			//echo $filename;
  

?>