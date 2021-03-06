<?php
//Store any form error messages here
error_reporting(E_ALL);
error_reporting(0);
$errors = "";
//Form variables
$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "";
$dob = isset($_REQUEST['dob']) ? $_REQUEST['dob'] : "";
$apptDate = isset($_REQUEST['apptdate']) ? $_REQUEST['apptdate'] : "";
$apptTime = isset($_REQUEST['appttime']) ? $_REQUEST['appttime'] : "";
$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
$store = isset($_REQUEST['store']) ? $_REQUEST['store'] : "";

function submitForm($formvals)
{
	//Parse store ID# from store value (string = ADDR_LINE1 + '(4_DIGIT_STORE_ID)')
	$storeID = substr($formvals['store'], -5, 4);
	//Set destination address; default to info@meijervision
	if ($storeID != "")
	{
		$to = "store".$storeID."@meijervision.com";
		error_log("Appointment request emailed to: $to");
	}
	else {
		$to = "info@meijervision.com";
	}
	//Configure email to info@meijervision.com
	$subject = "MeijerVision.com - New Appt Request - ".$formvals['name'];
	$headers = "From: ".$formvals['name']." <".$formvals['email'].">\r\n" .
	"Reply-To: ".$formvals['email']."\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$message = "A new appointment request has been made from www.meijervision.com!

Here is the information:
-------------------------------------------------------
Name: ".$formvals['name']."
Date of Birth: ".$formvals['dob']."
Email: ".$formvals['email']."
Phone: ".$formvals['phone']."

Appointment date and time:
-------------------------------------------------------
Store: ".$formvals['store'].", ".$formvals['state']."
Desired date: ".$formvals['apptdate']."
Desired time: ".$formvals['appttime']."

Vision Insurance/Benefit Plan: ".$formvals['insuranceplan']."
Contact lens exam?: ".$formvals['contact-exam']."

-------------------------------------------------------
Sender's IP address: ".$_SERVER['REMOTE_ADDR']."

";
	mail($to, $subject, $message, $headers);
	//Redirect to thank you page
	header("Location: http://www.meijervision.com/thanks.php?sent=eyeexam"); //Thank you page
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
	if ($name != '' && $email != '' && $phone != '')
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
<title>Vision Center at Meijer | Schedule an Eye Exam</title>
<?php 
$_GET['page'] = 'contact';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<link rel="stylesheet" href="/css/vcm/jquery-ui-1.10.1.custom.min.css" />
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript" src="/js/jquery.validate.mod.js"></script>
<script type="text/javascript">
$(function() {
	//Form validation
    $("#form_contactus").validate({
		rules: {
			state: {
				required: true
			},
			store: {
				required: true
			},
			name: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			phone: {
				required: true
			},
			dob: {
				required: true
			},
			apptdate: {
				required: true
			},
			appttime: {
				required: true
			},
			insuranceplan: {
				required: true
			}
		},
		messages: {
			name: {
				required: "Please tell us your name."
			},
			email: {
				required: "Please provide an email."
			},
			phone: {
				required: "Please provide us with your phone number."
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
	
	//Initiate datepicker
	$('#dob').datepicker({ changeYear: true, /*changeMonth: true,*/ yearRange: '-80:-3', defaultDate: '-18y', numberOfMonths: [ 1, 2 ] });
	$('#apptdate').datepicker({ beforeShowDay: noSunday, changeYear: false, changeMonth: false, minDate: '+1d', maxDate: '+1y', numberOfMonths: [ 1, 2 ] });
	
	function noSunday(date){
		 var day = date.getDay();
		 return [(day > 0), ''];
	};	

	//Populate store selects
	var stateFromStorePage = getParameterByName("state");
	var storeIdFromStorePage = getParameterByName("storeID");
	//alert("State = "+stateFromStorePage);
	if (stateFromStorePage == "") {
		loadStoreOptions($("select#state").val()); }
	else {
		loadStoreOptions(stateFromStorePage,storeIdFromStorePage);
		//$('select#store option[value*="'+storeIdFromStorePage+'"]').attr('selected','selected');
	}
	$("select#state").change(function(){
		loadStoreOptions($(this).val());
	});
	
	/**Show/Hide Grand Opening Sale **/
	var storeSelect = $('select#store');
	storeSelect.change(isAvonSelected);	
});
function isAvonSelected() {
	if ($("select#store").val().indexOf("2021)") !== -1) {
		$('.avonGrandOpening').show();
	}
	else $('.avonGrandOpening').hide();	
}

function getParameterByName(name)
{
  name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
  var regexS = "[\\?&]" + name + "=([^&#]*)";
  var regex = new RegExp(regexS);
  var results = regex.exec(window.location.search);
  if(results == null)
    return "";
  else
    return decodeURIComponent(results[1].replace(/\+/g, " "));
}

</script>
<style type="text/css">
/**Temporary style for grand opening**/
.avonGrandOpening { display:none; }

<?php
	if (isset($_REQUEST["storeID"]))
	{
		//Grand Re-Opening for store2000 (Avon)
		if ($_REQUEST["storeID"] == "2021")
		{
			print ".avonGrandOpening { display:block; }";
		}
	}
?>

</style>
<?php include 'inc/analytics.php' ?>
</head>
<body id="schedule-eye-exam" class="vcm-ui">
<?php include 'inc/header.php' ?>
<div class="container_24">
<div class="grid_18">
<div id="main">
<div class="avonGrandOpening"><img src="/images/720x300-2013-AVONGrandReopening.jpg" width="720" height="300" border="0" title="Win Prizes at Our Grand Re-Opening Event in Avon!" alt="Win Prizes at Our Grand Re-Opening Event in Avon!" style="margin-left:-30px;" /><br /></div>
<form name="form_contactus" id="form_contactus" method="post" action="schedule-eye-exam.php">
<h1>Schedule an Eye Exam</h1>
<p>Our personalized eye care services are designed to help you maximize your vision potential. Our experienced, in-store optometrists will provide you with a complete eye exam, prescription and eyewear (contacts or eyeglasses).</p>
<?php 
if ($errors != '')
{
	print "<div class=\"error\">$errors</div>";
}
?>
<strong>Select the Vision Center nearest you:</strong><br />
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
<br />
<hr />
<br />
<p><strong>My contact information:</strong></p>
<div><label for="name" class="lblleft">Name</label><input type="text" name="name" id="name" value="<?php echo $name ?>" /></div>
<div><label for="dob" class="lblleft">Date of birth</label><input type="text" name="dob" id="dob" value="<?php echo $dob ?>" class="date" /><span class="xsmall">&nbsp;MM/DD/YYYY</span></div>
<div><label for="email" class="lblleft">Email</label><input type="text" name="email" id="email" value="<?php echo $email ?>" /></div>
<div><label for="phone" class="lblleft">Phone</label><input type="text" name="phone" id="phone" value="<?php echo $phone ?>" /><span></span></div>

<br />
<hr />
<br />
<p><strong>Appointment date and time (to be confirmed via phone):</strong><br />
<?php //Set temporary notice expiration date
try {
	date_default_timezone_set('America/Chicago');
	$todaysDate = new DateTime();
	$expiryDate = new DateTime('11/28/2013');
	$expiremsg = "<strong>Happy Thanksgiving from our family to yours!</strong><br />We will be closed Thanksgiving Day, ".date("l, M. j, Y", $expiryDate->getTimeStamp() ) .".";
	$iconURL = "/images/32x32-USFlag.png";

	if ($expiryDate > $todaysDate)
	{
		print "<div id=\"systemmsg\"><span style=\"float:left; padding-right:10px;\"><img src=\"$iconURL\" width=\"32\" height=\"32\" border=\"0\" /></span>";
		print "<div style=\"float:left; padding-top:5px; width:560px;\">$expiremsg</div><div style=\"clear:both;\"></div></div><!--end #systemmsg-->";
	}
	//We salute all those who have served or are serving in our military.</strong><br />Our stores will be closed on Memorial Day, Monday 27, 2013.
} catch (Exception $e) {
   print('Caught exception: '. $e->getMessage());
}

?>
<div><label for="apptdate" class="lblleft">Desired date</label><input type="text" name="apptdate" id="apptdate" value="<?php echo $apptDate ?>" class="date" /><span class="xsmall">&nbsp;MM/DD/YYYY</span></div>
<div><label for="appttime" class="lblleft">Desired time</label>
<select name="appttime" id="appttime">
<option value="" <?php if ($apptTime == "") { echo "selected=\"selected\""; } ?>>---</option><option
value="8:00am" <?php if ($apptTime == "8:00am") { echo "selected=\"selected\""; } ?>>8:00am</option><option
value="8:30am" <?php if ($apptTime == "8:30am") { echo "selected=\"selected\""; } ?>>8:30am</option><option
value="9:00am" <?php if ($apptTime == "9:00am") { echo "selected=\"selected\""; } ?>>9:00am</option><option
value="9:30am" <?php if ($apptTime == "9:30am") { echo "selected=\"selected\""; } ?>>9:30am</option><option
value="10:00am" <?php if ($apptTime == "10:00am") { echo "selected=\"selected\""; } ?>>10:00am</option><option
value="10:30am" <?php if ($apptTime == "10:30am") { echo "selected=\"selected\""; } ?>>10:30am</option><option
value="11:00am" <?php if ($apptTime == "11:00am") { echo "selected=\"selected\""; } ?>>11:00am</option><option
value="11:30am" <?php if ($apptTime == "11:30am") { echo "selected=\"selected\""; } ?>>11:30am</option><option
value="12:00pm" <?php if ($apptTime == "12:00pm") { echo "selected=\"selected\""; } ?>>12:00pm</option><option
value="12:30pm" <?php if ($apptTime == "12:30pm") { echo "selected=\"selected\""; } ?>>12:30pm</option><option
value="1:00pm" <?php if ($apptTime == "1:00pm") { echo "selected=\"selected\""; } ?>>1:00pm</option><option
value="1:30pm" <?php if ($apptTime == "1:30pm") { echo "selected=\"selected\""; } ?>>1:30pm</option><option
value="2:00pm" <?php if ($apptTime == "2:00pm") { echo "selected=\"selected\""; } ?>>2:00pm</option><option
value="2:30pm" <?php if ($apptTime == "2:30pm") { echo "selected=\"selected\""; } ?>>2:30pm</option><option
value="3:00pm" <?php if ($apptTime == "3:00pm") { echo "selected=\"selected\""; } ?>>3:00pm</option><option
value="3:30pm" <?php if ($apptTime == "3:30pm") { echo "selected=\"selected\""; } ?>>3:30pm</option><option
value="4:00pm" <?php if ($apptTime == "4:00pm") { echo "selected=\"selected\""; } ?>>4:00pm</option><option
value="4:30pm" <?php if ($apptTime == "4:30pm") { echo "selected=\"selected\""; } ?>>4:30pm</option><option
value="5:00pm" <?php if ($apptTime == "5:00pm") { echo "selected=\"selected\""; } ?>>5:00pm</option><option
value="5:30pm" <?php if ($apptTime == "5:30pm") { echo "selected=\"selected\""; } ?>>5:30pm</option><option
value="6:00pm" <?php if ($apptTime == "6:00pm") { echo "selected=\"selected\""; } ?>>6:00pm</option><option
value="6:30pm" <?php if ($apptTime == "6:30pm") { echo "selected=\"selected\""; } ?>>6:30pm</option></select></div>
<br />
<p><strong>Vision Insurance/Benefit Plan*</strong><br />
<select name="insuranceplan" id="insuranceplan">
<option value="" <?php if ($insurancePlan == "") { echo "selected=\"selected\""; } ?>>--Please choose one--</option>
<option value="I do not have vision coverage" <?php if ($insurancePlan == "I do not have vision coverage") { echo "selected=\"selected\""; } ?>>I do not have vision coverage</option>
<option value="My vision coverage plan is not listed here" <?php if ($insurancePlan == "My vision coverage plan is not listed here") { echo "selected=\"selected\""; } ?>>My vision coverage plan is not listed here</option>
<option value="">-------------------------------------------------------------------------------------</option>
<option value="Aetna" <?php if ($insurancePlan == "Aetna") { echo "selected=\"selected\""; } ?>>Aetna</option>
<option value="AlwaysCare" <?php if ($insurancePlan == "AlwaysCare") { echo "selected=\"selected\""; } ?>>AlwaysCare</option>
<option value="Avesis" <?php if ($insurancePlan == "Avesis") { echo "selected=\"selected\""; } ?>>Avesis</option>
<option value="Davis Vision" <?php if ($insurancePlan == "Davis Vision") { echo "selected=\"selected\""; } ?>>Davis Vision</option>
<option value="Delta" <?php if ($insurancePlan == "Delta") { echo "selected=\"selected\""; } ?>>Delta</option>
<option value="EyeMed" <?php if ($insurancePlan == "EyeMed") { echo "selected=\"selected\""; } ?>>EyeMed</option>
<option value="Heritage" <?php if ($insurancePlan == "Heritage") { echo "selected=\"selected\""; } ?>>Heritage</option>
<option value="National Vision Administrators (NVA)" <?php if ($insurancePlan == "National Vision Administrators (NVA)") { echo "selected=\"selected\""; } ?>>National Vision Administrators (NVA)</option>
<option value="Physicians Health Plan (PHP)" <?php if ($insurancePlan == "Physicians Health Plan (PHP)") { echo "selected=\"selected\""; } ?>>Physicians Health Plan (PHP)</option>
<option value="Superior" <?php if ($insurancePlan == "Superior") { echo "selected=\"selected\""; } ?>>Superior</option>
<option value="" >------------------------Discount Vision Programs------------------------</option>
<option value="AARP" <?php if ($insurancePlan == "AARP") { echo "selected=\"selected\""; } ?>>AARP</option>
<option value="Outlook Vision Services" <?php if ($insurancePlan == "Outlook Vision Services") { echo "selected=\"selected\""; } ?>>Outlook Vision Services</option>
<option value="Quality Vision Network (QVN)" <?php if ($insurancePlan == "Quality Vision Network (QVN)") { echo "selected=\"selected\""; } ?>>Quality Vision Network (QVN)</option>
</select>
<br /><em class="xsmall">*Coverage availability may vary by location.</em></p>
<strong>Do you want a contact lens exam?</strong>
<div style="display:table;">
<div style="display:table-row;">
<div style="display:table-cell; width:50px;">
<input type="radio" id="contact-exam-yes" name="contact-exam" value="Yes" style="float:left;" />
<label for="contact-exam-yes" style="display:inline-block; padding:2px;">Yes</label>
</div>
<div style="display:table-cell; width:50px;">
<input type="radio" id="contact-exam-no" name="contact-exam" value="No" style="float:left;" />
<label for="contact-exam-no" style="display:inline-block; padding:2px;">No</label>
</div><!--table-cell-->
</div><!--table-row-->
</div><!--table-->
 
<div class="clear"></div>
<br />
<div><button type="submit" id="submitContactForm" name="submitContactForm">Submit</button></div>

</form>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:1080px;">
<h1>Looking for one of our locations?</h1>
<p>The Vision Center is currently located in 21 Meijer stores that service 6 major markets across the Midwest.
Doctor hours vary by location. Please call your local vision center to schedule your appointment.
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