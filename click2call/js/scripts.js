function switch_lang(arg){
	
	if (arg=="gr"){
		document.getElementById("lang_select").innerHTML="Επιλογή γλώσσας";
		document.getElementById("prefix").placeholder="+30";
		document.getElementById("prefix").value="+30";
		document.getElementById("phone").placeholder="Τηλέφωνο";
		document.getElementById("userinfo").placeholder="Ονοματεπώνυμο ή Κωδ. Τεχν. Υποστ.";
		document.getElementById("securitycode").placeholder="Κωδικός ασφαλείας";
		document.getElementById("sendinfo").innerHTML="Αποστολή";
		document.getElementById("heading_title").innerHTML="Μιλήστε με έναν τεχνικό μας";
		document.getElementById("selectgr").innerHTML="Ελλάδα";
		document.getElementById("selectbul").innerHTML="Βουλγαρία";
		document.getElementById("selectuk").innerHTML="Ηνωμένο Βασίλειο";
		document.getElementById("lang").value="gr";
		
		
	}
	if (arg=="bul"){
		
		document.getElementById("lang_select").innerHTML="Иберете език";
		document.getElementById("prefix").placeholder="+359";
		document.getElementById("prefix").value="+359";
		document.getElementById("phone").placeholder="Телефон";
		document.getElementById("userinfo").placeholder="Име или код за техн. поддръжка";
		document.getElementById("securitycode").placeholder="Код за сигурност";
		document.getElementById("sendinfo").innerHTML="Изпрати";
		document.getElementById("heading_title").innerHTML="Говорете с един от нашите техници";
		document.getElementById("selectgr").innerHTML="Гърция";
		document.getElementById("selectbul").innerHTML="България";
		document.getElementById("selectuk").innerHTML="Великобритания";
		document.getElementById("lang").value="bul";
	}
	if (arg=="uk"){
		
		document.getElementById("lang_select").innerHTML="Select language";
		document.getElementById("prefix").placeholder="+44";
		document.getElementById("prefix").value="+44";
		document.getElementById("phone").placeholder="Phone";
		document.getElementById("userinfo").placeholder="Name or Tech Support Code";
		document.getElementById("securitycode").placeholder="Security code";
		document.getElementById("sendinfo").innerHTML="Send";
		document.getElementById("heading_title").innerHTML="Speak with one of our technicians";
		document.getElementById("selectgr").innerHTML="Greece";
		document.getElementById("selectbul").innerHTML="Bulgaria";
		document.getElementById("selectuk").innerHTML="UK";
		document.getElementById("lang").value="uk";
	}
}


function reset_security_code(){


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
    document.getElementById("security_div_fields").innerHTML=xmlhttp.responseText;
	
    }
  }

xmlhttp.open("GET","ajax_php/reset_code.php", true);

xmlhttp.send();

}

function replyto(id){
	
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
    document.getElementById("requests_container").innerHTML=xmlhttp.responseText;
	
    }
  }

xmlhttp.open("GET","ajax_php/replyto.php?id="+id, true);

xmlhttp.send();


}




function alert_new_request(){
	//alert("Ok");
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
    //document.getElementById("alert").innerHTML=xmlhttp.responseText;
	//alert(xmlhttp.responseText);
	if (xmlhttp.responseText=="Newrequest"){
	//document.getElementById("sound").innerHTML="<audio controls autoplay preload='metadata' style=' width:300px; display:none;'><source src='http://aniphelpdesk.com/click2call/sounds/beep.mp3' type='audio/mpeg'></audio>";
	var snd = new Audio('http://aniphelpdesk.com/click2call/sounds/beep.mp3'); // buffers automatically when created
	snd.play();
	 setTimeout(function(){alert("Νέο αίτημα επικοινωνίας καταχωρήθηκε!!!")},4000);
	//alert("Νέο αίτημα επικοινωνίας καταχωρήθηκε!!!");
	}
    }
  }
  

xmlhttp.open("GET","ajax_php/alert_new.php", true);

xmlhttp.send();


}

// play sounds

function Sound(source,volume,loop)
{
    this.source=source;
    this.volume=volume;
    this.loop=loop;
    var son;
    this.son=son;
    this.finish=false;
    this.stop=function()
    {
        document.body.removeChild(this.son);
    }
    this.start=function()
    {
        if(this.finish)return false;
        this.son=document.createElement("embed");
        this.son.setAttribute("src",this.source);
        this.son.setAttribute("hidden","true");
        this.son.setAttribute("volume",this.volume);
        this.son.setAttribute("autostart","true");
        this.son.setAttribute("loop",this.loop);
        document.body.appendChild(this.son);
    }
    this.remove=function()
    {
        document.body.removeChild(this.son);
        this.finish=true;
    }
    this.init=function(volume,loop)
    {
        this.finish=false;
        this.volume=volume;
        this.loop=loop;
    }
}
