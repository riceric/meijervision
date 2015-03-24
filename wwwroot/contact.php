<?php
//Store any form error messages here
error_reporting(E_ALL);
error_reporting(0);
$errors = "";
//Form variables
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "";
$topic = isset($_REQUEST['topic']) ? $_REQUEST['topic'] : "";
$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
$store = isset($_REQUEST['store']) ? $_REQUEST['store'] : "";
$message = isset($_REQUEST['message']) ? $_REQUEST['message'] : "";
$newsletter = !empty($_REQUEST['subscribeyes']) ? $_REQUEST['subscribeyes'] : "";
function submitForm($formvals)
{
	//Parse store ID# from store value (string = ADDR_LINE1 + '(4_DIGIT_STORE_ID)')
	$storeID = substr($formvals['store'], -5, 4);
	//Set destination address; default to info@meijervision
	if ($storeID != "")
	{
		$to = "store".$storeID."@meijervision.com";
		error_log("Website contact: customer message emailed to: $to");
	}
	else {
		$to = "info@meijervision.com";
	}
	//Configure email to info@meijervision.com
	$subject = "MeijerVision.com - New Website Contact";
	$headers = "From: ".$formvals['name']." <".$formvals['email'].">\r\n" .
	"Reply-To: ".$formvals['email']."\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$message = "Someone has submitted the contact form at www.meijervision.com!

Here is the information:
-------------------------------------------------------
Name: ".$formvals['name']."
Email: ".$formvals['email']."
Phone: ".$formvals['phone']."

Topic: ".$formvals['topic']."
Store: 
".$formvals['store'].", ".$formvals['state']."

Message: 
".$formvals['message']."

-------------------------------------------------------
Sender's IP address: ".$_SERVER['REMOTE_ADDR']."
Subscribed to newsletter?: ".$formvals['subscribeyes']."

";
	mail($to, $subject, $message, $headers);
	//Redirect to thank you page
	header("Location: http://www.meijervision.com/thanks.php?sent=1"); //Thank you page
}

/**
 * Store contact info in a server-side CSV for backup purposes (Temporary solution)
 */
function updateCSV($name, $email, $phone, $message)
{
	$entry = array($name, $email, $phone, $message);
	$fp = fopen('2013googleglass.csv', 'w');
	fputcsv($fp, $entry);
	fclose($fp); //Close file
}

function validEmail($strEmail)
{
   $isValid = true;
   $atIndex = strrpos($strEmail, "@");
   if (is_bool($atIndex) && !$atIndex)
   {
      $isValid = false;
   }
   else
   {
      $domain = substr($strEmail, $atIndex+1);
      $local = substr($strEmail, 0, $atIndex);
      $localLen = strlen($local);
      $domainLen = strlen($domain);
      if ($localLen < 1 || $localLen > 64)
      {
         // local part length exceeded
         $isValid = false;
      }
      else if ($domainLen < 1 || $domainLen > 255)
      {
         // domain part length exceeded
         $isValid = false;
      }
      else if ($local[0] == '.' || $local[$localLen-1] == '.')
      {
         // local part starts or ends with '.'
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $local))
      {
         // local part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
      {
         // character not valid in domain part
         $isValid = false;
      }
      else if (preg_match('/\\.\\./', $domain))
      {
         // domain part has two consecutive dots
         $isValid = false;
      }
      else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
      {
         // character not valid in local part unless 
         // local part is quoted
         if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)))
         {
            $isValid = false;
         }
      }
      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
      {
         // domain not found in DNS
         $isValid = false;
      }
   }
   return $isValid;
}
// Process form submission...
if(isset($_POST['submitContactForm']))
{
	//Make sure required fields have valid values
	if ($name != '' && $email != '' && $message != '')
	{
		if (validEmail($email))
		{
			submitForm($_REQUEST);
		}
		else {
			$errors .= "Oops! Please check to make sure you provided a valid email address.";
		}
	}
	else {
		$errors .= "Oops! It looks like you're missing some required information. Please review the form and try again.";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Vision Center at Meijer | Contact Us</title>
<?php 
$_GET['page'] = 'contact';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/960_24_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery.validate.mod.js"></script>
<script type="text/javascript">
$(function() {
	//Form validation
    $("#form_contactus").validate({
		rules: {
			name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			message: {
				required: true
			},
			state: {
				required: true
			},
			store: {
				required: true
			}
		},
		messages: {
			name: {
				required: "Please tell us your name."
			},
			email: {
				required: "Please provide an email."
			}
		}
		
	});
	/* Load store addresses (and store#) based on state */
	function loadStoreOptions(strState, defaultOption){
		defaultOption = (typeof defaultOption === "undefined") ? null : defaultOption;	
		if (strState != "")
		{
			$.getJSON("contact-storeselect.php",{state: strState, ajax: 'true'}, function(j){
				var options = '';
				for (var i = 0; i < j.length; i++) {
					if (j[i].storeId.indexOf(defaultOption) !== -1)
					{
						options += '<option value="' + j[i].optionValue + ' (' + j[i].storeId + ')" selected="selected">' + j[i].optionDisplay + '</option>';
					}
					else
					{
						options += '<option value="' + j[i].optionValue + ' (' + j[i].storeId + ')">' + j[i].optionDisplay + '</option>';
					}
				}
				$("select#store").html(options);
			});
		}
	}
	
	//Populate store selects
	loadStoreOptions($("select#state").val());
	$("select#state").change(function(){
		loadStoreOptions($(this).val());
	});

});
</script>
<?php include 'inc/analytics.php' ?>
</head>
<body>
<?php include 'inc/header.php' ?>
<div class="container_24">
<div class="grid_18">
<div id="main">
<form name="form_contactus" id="form_contactus" method="post" action="contact.php">
<h1>Contact us</h1>
<?php 
if ($errors != '')
{
	print "<div class=\"error\">$errors</div>";
}
?>
<div id="systemmsg">Are you looking for career opportunity? <a href="/about/careers.php">Apply Online</a></div>
<p><strong>My contact information:</strong></p>
<div><label for="name" class="lblleft">Name</label><input type="text" name="name" id="name" value="<?php echo $name ?>" /></div>

<div><label for="email" class="lblleft">Email</label><input type="text" name="email" id="email" value="<?php echo $email ?>" /></div>

<div><label for="phone" class="lblleft">Phone</label><input type="text" name="phone" id="phone" value="<?php echo $phone ?>" /><span>&nbsp;<em>(optional)</em></span></div>

<br />
<p><strong>My question/comment is regarding:</strong><br />
<select name="topic" id="topic">
<option value="">-- Please choose one --</option>
<option value="Pricing, Insurance coverage, and/or current promotions">Pricing, Insurance, or Current promotions</option>
<option value="Service I received at a store">Service I received at a store</option>
<!--<option value="Jobs/careers at Vision Center at Meijer">Jobs/careers at Vision Center at Meijer</option>-->
<option value="Suggestions">Suggestion</option>
<option value="Other">Other</option>
</select></p>
<strong>I am writing to you about the store located in:</strong><br />
<div style="float:left;">
<label for="state">State</label><br />
<select name="state" id="state">
<option value="" <?php if ($state == "") { echo "selected=\"selected\""; } ?>>-- Choose state --</option>
<option value="Indiana" <?php if ($state == "Indiana") { echo "selected=\"selected\""; } ?>>Indiana</option>
<option value="Illinois" <?php if ($state == "Illinois") { echo "selected=\"selected\""; } ?>>Illinois</option>
<option value="Michigan" <?php if ($state == "Michigan") { echo "selected=\"selected\""; } ?>>Michigan</option>
<option value="Ohio" <?php if ($state == "Ohio") { echo "selected=\"selected\""; } ?>>Ohio</option>
</select>
<noscript>
	<input type="submit" name="action" value="Load stores" />
</noscript>
</div>
<div style="margin-left:5px;float:left;">
<label>Store address</label><br />
<select name="store" id="store"><option value="">-- Specify store --</option></select><br />
</div>
<div class="clear"></div>

<div><br /><label for="message"><strong>Message</strong></label><br />
<textarea name="message" id="message" style="height:200px;width:480px;"><?php echo $message ?></textarea>
</div>
 
<input type="checkbox" id="subscribeyes" name="subscribeyes" value="Yes" class="cboxleft"  <?php if ($newsletter == "Yes") { echo "checked=\"checked\""; } ?>/>

<label for="subscribeyes" class="lblright">I would like to sign up to receive coupons and exclusive promotions via email</label>

<div class="clear"></div>
<div><button type="submit" id="submitContactForm" name="submitContactForm">Submit</div>

</form>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:640px;">
<h1>Looking for one of our locations?</h1>
<p>Enough about us, what about you?
<ul>
<li>Do you have questions about your vision health?</li>
<li>Would you like to know the latest styles that we have in stock?</li>
</ul>
<p>Our friendly staff will be happy to help you! Just <a href="locations.php">locate one of our stores</a> and call or <a href="contact.php">contact us</a> right here from our website.</p>
<h1>We're Hiring!</h1>
<p>Looking for a career opportunity? <a href="/about/careers.php">Apply Online</a></p>
<h1>Follow us on:</h1>
<a href="http://www.twitter.com/MeijerVision"><img src="images/48x48-twitter.png" width="48" height="48" border="0" alt="Follow us on Twitter!" /></a>
<a href="http://www.facebook.com/MeijerVision"><img src="images/48x48-fb.png" width="48" height="48" border="0" alt="Like us on Facebook!" /></a>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"--></div><!--.container_24-->
<?php include 'inc/footer.php' ?>
</body>
</html>