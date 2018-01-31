<?php
session_start();
 if (isset($_SESSION["changed_password"]) && $_SESSION["changed_password"]==0) {   
 ?>

<div class="container">
<header style='text-align:left;'>
								<h2 style='text-align:left;'><font style="font-size:2em">Α</font>λλαγή username</h2>
							</header>

							<p>Εδώ μπορείτε να αλλάξετε το όνομα χρήστη σας (username).<br>
							Συμπληρώστε τα απαραίτητα πεδία.
							</p>
							
							
							<form method="POST" id="new_username_form">
								<div class="row half">
									<div class="6u">Όνομα χρήστη : <?php echo $_SESSION["username"]; ?></div>
									
									
								</div>
								<div class="row half">
								
									<div class="6u"><input type="text" name="username_new" placeholder="Καινούριο όνομα χρήστη" onClick="this.select();"/></div>
									
								</div>
								
								<div class="row half">
								
									<div class="6u"><input type="password" id="password_new" name="password_new" placeholder="Καινούριο password" onClick="this.select();"/></div>
									
								</div>
								
								<div class="row half">
								
									<div class="6u"><input type="password" id="retype_password_new" name="retype_password_new" placeholder="Επιβεβαίωση password" onClick="this.select();" onkeyup="checkpasswordmatch()"/></div>
									
								</div>
								
								<div class="row half">
								
									<div class="6u"><?php $login_user->get_security_questions(); ?></div>
									
								</div>
								<div class="row half">
								
									<div class="6u"><input type="text" name="security_question_answer" placeholder="Απάντηση" onClick="this.select();"/></div>
									
								</div>
								
<div class="row half" style="text-align:left;">
								
									<div class="6u"><input type="submit" value="Καταχώρηση" name="change_username" id="change_username" /></div>
									
								</div>




</form>
</div>

<?php
if ($_POST["change_username"]){

echo "<script type='text/javascript'>

window.location.assign('#username_change');
</script>";

$username_old=$_SESSION["username"];
$user_id=$_SESSION["user_id"];
$username_new=$_POST["username_new"];
$password_new=$_POST["password_new"];
$password_new_retype=$_POST["retype_password_new"];
$sequrity_question=$_POST["sequrity_questions"];
$security_question_answer=$_POST["security_question_answer"];

$login->set_username_old($username_old);
$login->set_username_new($username_new);
$login->set_password_new($password_new);
$login->set_password_new_retype($password_new_retype);
$login->set_sequrity_question($sequrity_question);
$login->set_security_question_answer($security_question_answer);
$login->set_user_id($user_id);

$login->change_username();

if ($login->get_refresh_check()==1){


?>
<script>
// Our countdown plugin takes a callback, a duration, and an optional message
$.fn.countdown = function (callback, duration, message) {
    // If no message is provided, we use an empty string
    message = message || "";
    // Get reference to container, and set initial content
    var container = $(this[0]).html(duration + message);
    // Get reference to the interval doing the countdown
    var countdown = setInterval(function () {
        // If seconds remain
        if (--duration) {
            // Update our container's message
            container.html(duration + message);
        // Otherwise
        } else {
            // Clear the countdown interval
            clearInterval(countdown);
            // And fire the callback passing our container as `this`
            callback.call(container);   
        }
    // Run interval every 1000ms (1 second)
    }, 1000);
    
};

// Use p.countdown as container, pass redirect, duration, and optional message
$(".countdown").countdown(redirect, 5, "s remaining");

// Function to be called after 5 seconds
function redirect () {
    this.html("Done counting, redirecting.");
     window.location = "logout.php";
}



</script>
<div style="width:130px; margin-left:auto; margin-right:auto;">
<!-- =========================================================== -->
<script type="application/javascript">
var myCountdown2 = new Countdown({
									time: 5, 
									width:150, 
									height:80, 
									rangeHi:"minute"	// <- no comma on last item!
									});

</script>

</div>
<?php 
} 
}

?>

<?php } ?>