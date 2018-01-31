

function clear_ip(username){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }


xmlhttp.open("GET","ajax_php/unlock_ip.php?username="+username,true);

xmlhttp.send();

}

