<?php
//session_start(); 

if (isset($_GET["param"])){

$param=$_GET["param"];

switch ($param) {
	
    case "home":
        if ($_SESSION["admin"]==1 && $_SESSION["username"]=="gorgoroth"){
			include 'matrix.html';	

	}else {
	include 'home.html';	
	}
        break;
    case "profile":
        echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 <div style='text-align:left; margin-bottom:0px; padding-top:5px;'>
								<h2 style='text-align:left;'><font style='font-size:2em'>Π</font>ροφίλ</h2>
							</div>

							<div style='text-align:justify; font-size:16px; line-height:1.4em; margin-top:10px;'>
							Η εταιρεία ΑΝΙΡ Injection Services εξειδικεύεται απόλυτα, εδώ και 20 χρόνια, στην ηλεκτρονική διάγνωση συστημάτων αυτοκινήτων, στην ποιοτική εκπαίδευση και τεχνική υποστήριξη των επαγγελματιών του χώρου. 
<br>
Μέσα από το διαδικτυακό χώρο Anip Helpdesk προσφέρουμε ένα ολοκληρωμένο βοήθημα στα εγγεγραμμένα μέλη, παρέχοντας άμεσα σε 24ωρη βάση τεχνικές συμβουλές και πληροφορίες αντιμετώπισης βλαβών στα  ηλεκτρονικά και μηχανικά μέρη των σύγχρονων αυτοκινήτων, αξιοποιώντας την οργανωμένη τεχνογνωσία και εργοστασιακή πληροφόρηση που διαθέτουμε.
<br>
Η βάση δεδομένων του ιστότοπου αναβαθμίζεται καθημερινά από το εξειδικευμένο προσωπικό της εταιρείας μας, αποτελώντας βασικό μέρος του επιχειρησιακού μας σχεδίου, με γνώμονα την συνεχή και καθολική μεταφορά της πληροφόρησης στον επαγγελματία επισκευαστή οχημάτων.
<br>
Αξιοποιήστε την τεχνική βιβλιοθήκη γνώσεως του Anip Helpdesk και βρείτε: 
<ul style='font-size:1.4em; margin-bottom:1em;margin-top:1em; ' class='right_arrow'>
<li>
Κωδικούς Βλαβών – Επεξήγηση και ανάλυση
</li>
<li>
Πιθανές αιτίες εμφάνισης βλαβών
</li>
<li>
Προτεινόμενους τρόπους επίλυσης Τεχνικών προβλημάτων
</li>
</ul>
και άλλες πληροφορίες που πηγάζουν - μεταξύ άλλων - και από τις καθημερινές καταγραφές της ομάδας Τεχνικής υποστήριξης της ΑΝΙΡ.
<br>
Τέλος, σε περίπτωση που αντιμετωπίζετε κάποιο τεχνικό πρόβλημα που δεν περιλαμβάνεται στην τεχνική βιβλιοθήκη, μπορείτε να επικοινωνείτε σε πραγματικό χρόνο με τους ανθρώπους που βρίσκονται πίσω από αυτήν την προσπάθεια, είτε αποστέλλοντας την άγνωστη βλάβη μέσω της αντίστοιχης φόρμας 'Αναφοράς βλάβης', είτε συνομιλώντας μαζί τους μέσω live chat.


							</div>
			 </div>";
        break;
    case "news":
         echo "<div style='text-align:l; line-height:1.3em; 

 padding:80px;
 
			 
		
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 
			 <div style='text-align:left; margin-bottom:0px; padding-top:5px;'>
								<h2 style='text-align:left;'><font style='font-size:2em'>Ν</font>έα</h2>
							</div>
<div style='text-align:justify; font-size:16px; line-height:1.4em; margin-top:10px;'>
Το τμήμα εκπαίδευσης της ΑΝΙΡ εξειδικεύεται στη διοργάνωση εκπαιδευτικών κύκλων τεχνικών σεμιναρίων που απευθύνονται
 σε όλους τους επισκευαστές οχημάτων με στόχο την παροχή έγκυρης και δομημένης πληροφόρησης, 
 σε θέματα που σχετίζονται με την εξέλιξη της τεχνολογίας του σύγχρονου αυτοκινήτου και τη διάγνωση βλαβών.
 <br> <br>
 <b>Οι βάσεις των σεμιναρίων της ΑΝΙΡ:</b>
  <br>
 <ul style='font-weight:bold; margin-left:20px;'>
 <li>Συνεχής εμπλουτισμός θεματολογιών, με πληροφορία που αντλείται από την επικοινωνία με τα εργοστάσια κατασκευής και τις ανάγκες της αγοράς
</li>
 <li>Τα σεμινάρια εστιάζουν στις λύσεις διάγνωσης πραγματικών βλαβών συνδυάζοντας θεωρία & πράξη. 
</li>
 <li>Πιστοποιημένοι εκπαιδευτές με πολυετή πείρα σε εταιρείες αυτοκινήτων</li>
 <li>Προσιτό κόστος συμμετοχής</li>

 </ul>
Τα σεμινάρια πραγματοποιούνται σε ειδικά διαμορφωμένες αίθουσες θεωρητικής και πρακτικής εκπαίδευσης στην έδρα της εταιρείας, με χωρητικότητες μέχρι και 35 άτομα, ενώ παρέχονται σε έντυπη μορφή οι σημειώσεις και η βεβαίωση παρακολούθησης.
<b>Σας περιμένουμε στα Τεχνικά σεμινάρια που διοργανώνουμε.</b>
<br>
<font style='font-size:1.2em; fonr-weight:bold;'>Δείτε <a href='http://www.anip-seminars.gr/?page_id=27' target='_blank' style='color:#0085FF'>εδώ </a>το αναλυτικό πρόγραμμα.</font>
<br>
<br>
<div style='text-align:left; margin-bottom:0px; padding-top:5px;'>
								<h2 style='text-align:left;'><font style='font-size:2em'>Ν</font>έες προσθήκες στο helpdesk</h2>
							</div>
							<br>
<ul style='font-weight:bold; margin-left:20px;'>
 <li>Προσθήκη νέων κωδικών κατασκευαστών και airbag για mercedes benz και peugeot (στα Αγγλικά)
</li>
 <li>Προσθήκη εργαλείου για εμφάνιση όλων των διαθέσιμων κωδικών σε κωδικούς κατασκευσαστή και airbag ανά μάρκα/κατασκευαστή. <br>
 <a href='https://www.youtube.com/watch?v=LDDcdegZxlE' target='_blank' style='color:#0085FF'>Youtube video</a>
</li>


 </ul>
</div>
			 </div>";
        break;
		
		 case "info":
         echo "<div style='text-align:l; line-height:1.3em; 

 padding:80px;
 
			 
		
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 
			 <div style='text-align:left; margin-bottom:0px; padding-top:5px;'>
								<h2 style='text-align:left;'><font style='font-size:2em'>Ο</font>δηγίες</h2>
							</div>
<div style='text-align:justify; font-size:1.2em; line-height:1.4em; margin-top:10px;'>
Αν το σύστημα σας αποσυνδέει μετά από την είσοδο αυτόματα, οφείλεται σε antivirus λογισμικό που πιθανόν να υπάρχει εγκατεστημένο στον υπολογιστή σας.<br>
Σε αυτή την περίπτωση θα πρέπει να ορίσετε ως εξαίρεση (exception) την ηλεκτρονική διεύθυνση (url) της εφαρμογής 'http://aniphelpdesk.com/'
<br>
Αν δε γνωρίζετε τη διαδικασία επικοινωνήστε με την τεχνική υποστήριξη (+30) 210 9412457
<br>
Μπορείτε να δείτε παραδείγματα εισαγωγής εξαιρέσεων σε διάφορα antivirus λογισμικά παρακάτω.<br><br><br>

<a href='http://www.getavast.net/support/managing-exceptions' target='_blank'><img style='float:left; margin:2px;' src='images/avast.jpg' width='auto' height='64'></a>
<a href='http://www.avira.com/en/support-for-home-knowledgebase-detail/kbid/1257' target='_blank'><img style='float:left; margin:2px;' src='images/avira.jpg'width='200' height='auto'></a>
<a href='http://www.bitdefender.com/support/how-to-add-exceptions-1163.html' target='_blank'><img style='float:left; margin:2px;' src='images/bitdefender.jpg' width='200' height='auto'></a>
<a href='http://support.kaspersky.com/10017' target='_blank'><img style='float:left; margin:2px;' src='images/kaspersky.jpg' width='200' height='auto'></a>
<a href='http://smallbusiness.chron.com/add-exception-norton-internet-security-55754.html' target='_blank'><img style='float:left; margin:2px;' src='images/norton.jpg' width='auto' height='64'></a>

<!--
<a href='http://www.getavast.net/support/managing-exceptions' target='_blank'>Avast</a><br>
<a href='http://www.avira.com/en/support-for-home-knowledgebase-detail/kbid/1257' target='_blank'>Avira</a><br>
<a href='http://www.bitdefender.com/support/how-to-add-exceptions-1163.html' target='_blank'>Bitdefender</a><br>
<a href='http://support.kaspersky.com/10017' target='_blank'>Kaspersky</a><br>
<a href='http://smallbusiness.chron.com/add-exception-norton-internet-security-55754.html' target='_blank'>Norton</a><br>
-->

</div>
			 </div>";
        break;
		
	 case "contact":
        include 'contact.php';
        break;
		
		case "chatroom":
        echo "<div style='width:100%;background-color: rgba(0,0,0,0.2);
		 background-image: url(images/chat_backgrnd.png);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 80% ; 
	'>
		<iframe width='600' height='600' src='http://test.aniphelpdesk.com/chatroom/chat.php?username=".$_SESSION["username"]."' 
		style=' margin-left: 52px;
    margin-top: 50px;
    frameborder: no;
    border: none;
    '>
	</iframe>
	</div>";
        break;
		
		case "click2call":
        echo "<div style='width:100%;background-color: rgba(0,0,0,0.2);'>";
		if (isset($_SESSION["username"])) {
		echo "<iframe width='100%' height='100%' src='http://aniphelpdesk.com/click2call/index.php."' 
		style=' 
    frameborder: no;
    border: none;
    '>
	</iframe>";
		}
	echo "</div>";
        break;
		
	 case "defects":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;
			 '>";
			 include "defects.php";
			 echo "</div>";
        break;
		
		case "blink_codes":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;
			 '>";
			 include "blink_codes.php";
			 echo "</div>";
        break;
		
	 case "eobd":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ";
			 include "eobd.php";
			 echo "</div>";
        break;
	 case "codes":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ";
			 include "codes.php";
			 echo "</div>";
			
        break;
		
		case "ac_codes":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ";
			 include "ac_codes.php";
			 echo "</div>";
			
        break;
		case "airbag_codes":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ";
			 include "airbag_codes.php";
			 echo "</div>";
			
        break;
		 case "reset":
		   echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
	
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ";
			 include "reset.php";
			 echo "</div>";
       // echo "<iframe src='reset/index.html' width='93%;' height='300px' scroll='auto' frameborder='0' style='margin-left:55px;' ></iframe>";
	   
        break;
	case "change":
  echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>";
			 include "change.php";
			 echo "</div>";
			 break;
	case "new":
         echo "<div style='text-align:justify; line-height:1.3em; 

 padding:80px;
 
			 
			
			 margin-left:auto;
			 margin-right:auto;
			 color:#141A23;'>
			 ΑΠΟΣΤΟΛΗ ΑΓΝΩΣΤΗΣ ΒΛΑΒΗΣ
			 </div>";
        break;
	

}
}
else if (!isset($_GET["param"])){
	
	

	if ($_SESSION["admin"]==1 && $_SESSION["username"]=="gorgoroth"){
include 'matrix.html';	
	}else {
	include 'home.html';	
	}
}


?>

<?php

if (isset($_GET["alert"])){?>
	
<!--
	<div  style="width:auto;   z-index:9999999; align:justify; position:absolute; top:10%; 
	background-color:#000; width:80%; left:10%;text-align: justify; padding:10px;">
<h2 style="color:red; font-weight:bold;text-align: justify;">Ο χρήστης <?php echo $_SESSION["username"]; ?> ήταν ήδη σενδεδεμένος στο σύστημα, 
η ενέργεια αυτή έχει καταγραφεί.<br>
Για να μη συμβαίνει αυτό σιγουρευτείτε ότι πραγματοποιείτε έξοδο από το αντίστοιχο κουμπί, 
ή ότι δεν χειρίζεται το σύστημα μη εξουσιοδοτημένος χρήστης.</h2>
			
		</div>
	-->
	<?php
	echo "<script>
		$('#modal_alert').reveal(); 
		</script>";
}

?>
