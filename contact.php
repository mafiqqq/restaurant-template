<?php 
define("TITLE","Contact | Franklin's Dining");
include('includes/header.php');
/*
		NOTE:
		In the form in contact.php, the name text field has the name "name"
		If the user submits the form, the $_POST['name'] variable will be
		automatically created, and will contain the text they typed into
		the field. The $_POST['email'] variable will contain whatever they typed
		into the email field.
	
	
		PHP used in this script:
		
		preg_match()
		- Perform a regular expression match
		- http://ca2.php.net/preg_match
		
		isset()
		- Determine if a variable is set and is not NULL
		- http://ca2.php.net/manual/en/function.isset.php
		
		$_POST
		- An associative array of variables passed to the current script via the HTTP POST method.
		- http://www.php.net/manual/en/reserved.variables.post.php
		
		trim()
		- Strip whitespace (or other characters) from the beginning and end of a string
		- http://www.php.net/manual/en/function.trim.php
		
		exit
		- Output a message and terminate the current script
		- http://www.php.net//manual/en/function.exit.php
		
		die()
		- Equivalent to exit
		- http://ca1.php.net/manual/en/function.die.php
		
		wordwrap()
		- Wraps a string to a given number of characters
		- http://ca1.php.net/manual/en/function.wordwrap.php
		
		mail()
		- Send mail
		- http://ca1.php.net/manual/en/function.mail.php
	*/
	

?>

<div id="contact">
<div class="hr"><hr /></div>

<h1>Get in touch with us</h1>

<?php 

//Check for header injections
function has_header_injections($str){
    return preg_match("/[\r\n]/", $str);
}


if(isset($_POST['contact_submit'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $msg = $_POST['message'];

    if(has_header_injections($name) || has_header_injections($email)){
        die(); //Kill the script
    }

    if(!$name || !$email || !$msg){
        echo '<h4 class="error">All fields required!</h4><a href="contact.php" 
        class="button block">Go Back and Try again.</a>';
        exit;
    }

    //Add the recipient email
    $to = "afiqqqx1997@gmail.com";

    //Check the subject
    $subject = "$name sent you an Email through your contact form";

    //Construct the message
    $message = "Name :\r\n";
    $message .= "Email :\r\n";
    $message .= "Message :\r\n$msg";

    //If the subscribe checkbox was checked
    if(isset($_POST['subscribe']) && $_POST['subscribe'] == 'Subscribe'){
        $message .= "\r\n\r\nPlease add $email to the mailing list. \r\n";
    }

    //Set the mail headers as a variable
    $headers  = "MINE-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: $name <$email>\r\n";
    $headers .= "X-Priority: 1\r\n";
    $headers .= "X-MSMail-Priority: High\r\n";

    //Send the email 
    mail( $to, $subject, $message, $headers );


?>

<!-- Show success message after email sent-->
<h5>Thanks for contacting us!</h5>
<p>Please allow 24 hours for respond</p>
<p><a href="/final" class="button block">&laquo; Go to homepage</a></p>

<?php } else { ?>

<form action="" method="post" id="contact-form">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="name">

    <label for="email">Your Email</label>
    <input type="email" id="email" name="email">

    <label for="message">Your Message</label>
    <textarea name="message" id="message" cols="30" rows="10"></textarea>

    <input type="checkbox" name="subscribe" id="subscribe" value="Subscribe">
    <label for="subscribe">Subscribe to our newsletter</label>

    <input type="submit" class="button next" name="contact_submit" value="Send Message">

</form>

<?php } ?>

<div class="hr"><hr /></div>
</div><!-- Contact ends here -->
<?php 
include('includes/footer.php');
?>