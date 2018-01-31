<?php

 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 $randomString = '';
for ($i=1; $i<=2; $i++){
for ($count=1; $count<=10; $count++){
$randomString .= $characters[rand(0, strlen($characters) - 1)];

}
$randomString =substr($randomString, -8);
$md5randomString=md5($randomString);


	
echo "INSERT INTO `helpdesk`.`users` (`username`, `password`,`loginstring` ,`email`,`receivemail`,`country`, `accounttype`, `position`, `comp_name`, `comp_manager`, 
`comp_adress`, `comp_phone`, `comp_fax`, `datecreate`, `dateend`, `active`, `phone`, `mobile`, `chat`,
 `admin`) 
VALUES 
('user_715".$i."', '".$md5randomString."', '".$randomString."', '', '','Greece', 1, '', 'user_66".$i."', '', '', '0', '0', 
CURDATE(), '2015-10-30', 1, '0', '0', 1, 0 );";
 echo "<br>";
  echo "<br>";

/* echo "<br>";
echo "user_66".$i."";
echo "<br>";
echo $randomString;
echo "<hr>";
*/
}
?>