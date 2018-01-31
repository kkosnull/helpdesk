function exists(){

var model_check=document.getElementById("model_check").value;
var year_check=document.getElementById("year_check").value;
var engine_code_check=document.getElementById("engine_code_check").value;



if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
	document.getElementById("model_check_reply").innerHTML=xmlhttp.responseText;
	

    }
  }

xmlhttp.open("GET","model_check.php?model_check="+model_check+"&year_check="+year_check+"&engine_code_check="+engine_code_check,true);

xmlhttp.send();


}
function check_username(){

var user=document.getElementById("username_checker").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("check_username_result").innerHTML =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","check_username.php?user="+user,true);

xmlhttp.send();


}

function show_active_admins(type){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("admins_container_list").innerHTML =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","show_admins_list.php?type="+type,true);

xmlhttp.send();


}
function show_active_users(type){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("users_container_list").innerHTML =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","show_users_list.php?type="+type,true);

xmlhttp.send();


}


function show_locked_users(){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("users_container_list").innerHTML =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","show_locked_users_list.php",true);

xmlhttp.send();


}

function chat(user_id, type){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("users_container").innerHTML =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","chat.php?user_id="+user_id+"&type="+type,true);

xmlhttp.send();


}




function checkifExists(type){

if (type==1){
var name=document.getElementById("new_admin_username").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("new_admin_username").style.background =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","check_admin_name.php?name="+name,true);

xmlhttp.send();
}


if (type==2){
var name=document.getElementById("new_user_username").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("new_user_username").style.background =xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","check_admin_name.php?name="+name,true);

xmlhttp.send();
}

}
function update_code_execute(id, type){

if (type==1){
var id=document.getElementById("eobd_hidden").value;
var code=document.getElementById("eobd_code").value;
var description=document.getElementById("eobd_description").value;
var type=document.getElementById("code_type").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("eobd_codes_container").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","update_code_action.php?id="+id+"&code='"+code+"'&description='"+description+"'&type="+type,true);

xmlhttp.send();
}

if (type==2){

var id=document.getElementById("manufacturer_hidden").value;
var code=document.getElementById("manufacturer_code").value;
var description=document.getElementById("manufacturer_description").value;
var type=document.getElementById("code_type").value;

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("manufacturers_codes_container").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","update_code_action.php?id="+id+"&code='"+code+"'&description='"+description+"'&type="+type,true);

xmlhttp.send();


}

}

function show_update_code(id, type){

if (type==1){

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("eobd_codes_container").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","update_code_form.php?id="+id+"&type="+type,true);

xmlhttp.send();
}
if (type==2){

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("manufacturers_codes_container").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","update_code_form.php?id="+id+"&type="+type,true);

xmlhttp.send();
}
}


function delete_code(id, type){

 if (confirm("ΕΠΙΒΕΒΑΙΩΣΗ ΔΙΑΓΡΑΦΗΣ") == true) {
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("eobd_codes_container").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","delete_code.php?id="+id+"&type="+type,true);

xmlhttp.send();
}

}

function switch_model(id, value){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("switch_result").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","switch_model.php?id="+id+"&value="+value,true);

xmlhttp.send();

}
function sort_models(){


if (str.length==0)
  { 
  document.getElementById("txtHint_codes_brands").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_codes_brands").innerHTML=xmlhttp.responseText;
    }
  }
  var e = document.getElementById("brands");
var selected = e.options[e.selectedIndex].value;

//alert(selected);

xmlhttp.open("GET","gethint_manufacturers.php?q="+selected+"&q2="+str,true);
//xmlhttp.open("GET","gethint_manufacturers.php?q2="+str,true);
xmlhttp.send();
}

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","gethint.php?q="+str,true);
xmlhttp.send();
}

function showHint_man(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint_codes_brands").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint_codes_brands").innerHTML=xmlhttp.responseText;
    }
  }
  var e = document.getElementById("brands_manufact");
var selected = e.options[e.selectedIndex].value;
//var q=document.getElementById("manufacturer_code").value;
alert(selected);
alert(str);
xmlhttp.open("GET","gethint_manufacturers.php?q="+selected+"&q2="+str,true);
//xmlhttp.open("GET","gethint_manufacturers.php?q2="+str,true);
xmlhttp.send();
}

function showUser(str)
{
	//alert("ok");
if (str=="")
  {
  document.getElementById("modelHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("modelHint").innerHTML=xmlhttp.responseText;
    }
  }
 // alert("ok");
xmlhttp.open("GET","getmodel_ajax.php?q="+str,true);
xmlhttp.send();
}