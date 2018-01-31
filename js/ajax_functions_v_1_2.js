
function throw_srs(code){
	document.getElementById("manufact_codes_search").value=code;
}

function throw_manufacturer(code){
	document.getElementById("manufacturer_code_search").value=code;
}

function block_loggedoff(username){


if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","ajax_php/block_loggedoff.php?username="+username,true);
//alert(username);
xmlhttp.send();

}


function expose_defects_codes(count, models){
	
 document.getElementById("brand_header").innerHTML=" "+count+" βλάβες διαθέσιμες   <img src='images/blink2.gif'>";

}

function expose_defects(count, models){
	
 document.getElementById("brand_header").innerHTML=" "+count+" βλάβες διαθέσιμες για "+models+" μοντέλα   <img src='images/blink2.gif'>";

}
function open_url(url) {
    window.open(url, menubar="no");
}

 function getLocation(username, user_id) {
            navigator.geolocation.getCurrentPosition(foundLocation, noLocation);
            function foundLocation(position) {


   latitude = position.coords.latitude;
   longitude = position.coords.longitude;
        
	if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }


xmlhttp.open("GET","ajax_php/insert_geolocation.php?username="+username+"&user_id="+user_id+"&latitude="+latitude+"&longitude="+longitude,true);

xmlhttp.send();	
		
		
//alert("ajax_php/insert_geolocation.php?username="+username+"&user_id="+user_id+"&latitude="+latitude+"&longitude="+longitude);		
        }
	

    }

    function noLocation() {
      //  alert('Could not find location');
    }



  

function highlight_brand(index, value){

var brands = ["seven1"];
for (var i=2; i<=42; i++){

brands.push("seven"+i);

}

var selected=document.getElementById(value);
selected.style.backgroundColor = '#007AFF';

/*
var cloneArray = brands.slice();
cloneArray.splice(index,1);
*/

for (var i=1; i<=brands.length; i++){
var other = document.getElementById("seven"+i);

if (i!=index){
other.style.backgroundColor = '#777';
}
}
}
function highlight_brand_manufact(index, value){

var brands = ["seven1"];
for (var i=2; i<=42; i++){

brands.push("seven"+i);

}

var selected=document.getElementById(value);
selected.style.backgroundColor = '#007AFF';

/*
var cloneArray = brands.slice();
cloneArray.splice(index,1);
*/

for (var i=1; i<=brands.length; i++){
var other = document.getElementById("seven"+i);

if (i!=index){
other.style.backgroundColor = '#777';
}
}
}

function fillbrand_manufact(id, brand){

document.getElementById("brandId").value=id;
//document.getElementById("brand_header").innerHTML=" Έχετε επιλέξει κατασκευαστή :  "+brand;

}

function fillbrand(id, brand){

document.getElementById("brandId").value=id;
//document.getElementById("brand_header").innerHTML=" Έχετε επιλέξει κατασκευαστή :  "+brand;

}

function suggest_eobd(code){
	
	
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
    //document.getElementById("eobd_codes_suggest").innerHTML =xmlhttp.responseText;
	document.getElementById("codes_modal").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","../ajax_php/suggest_eobd_code.php?code="+code,true);

xmlhttp.send();

}

function suggest_codes_manuf(){
	
	var id;
	var code;
	id=document.getElementById("brandId").value;
	code=document.getElementById("manufacturer_code_search").value
	
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
   // document.getElementById("codes_suggest").innerHTML=xmlhttp.responseText;
	document.getElementById("codes_modal").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","../ajax_php/suggest_manufact_code.php?id="+id+"&code="+code,true);

xmlhttp.send();

}
function suggest_codes(){
	var id;
	var code;
	id=document.getElementById("brandId").value;
	code=document.getElementById("manufact_codes_search").value
	
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
   // document.getElementById("manufact_codes_suggest").innerHTML=xmlhttp.responseText;
	document.getElementById("codes_modal").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","../ajax_php/suggest_srs_code.php?id="+id+"&code="+code,true);

xmlhttp.send();

}
function show_defect(id){


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
    document.getElementById("defect_details").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","ajax_php/show_defect.php?id="+id,true);

xmlhttp.send();

}

function show_blink(id){


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
    document.getElementById("defect_details").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","ajax_php/show_blink.php?id="+id,true);

xmlhttp.send();

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



function showHint_auxilary(str)
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
xmlhttp.open("GET","gethint_auxilary.php?q="+str,true);
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