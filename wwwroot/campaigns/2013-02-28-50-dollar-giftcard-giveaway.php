<?php
//Store any form error messages here
error_reporting(E_ALL);
//error_reporting(0);
$errors = "";
//Form variables
$fname = isset($_REQUEST['fname']) ? $_REQUEST['fname'] : "";
$lname = isset($_REQUEST['lname']) ? $_REQUEST['lname'] : "";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : "";
$yourAddr1 = isset($_REQUEST['yourAddr1']) ? $_REQUEST['yourAddr1'] : "";
$yourAddr2 = isset($_REQUEST['yourAddr2']) ? $_REQUEST['yourAddr2'] : "";
$yourAddrCity = isset($_REQUEST['yourAddrcity']) ? $_REQUEST['yourAddrcity'] : "";
$yourAddrState = isset($_REQUEST['yourAddrstate']) ? $_REQUEST['yourAddrstate'] : "";
$yourAddrZip = isset($_REQUEST['yourAddrzip']) ? $_REQUEST['yourAddrzip'] : "";
$state = isset($_REQUEST['state']) ? $_REQUEST['state'] : "";
$store = isset($_REQUEST['store']) ? $_REQUEST['store'] : "";
$lastexam = isset($_REQUEST['lastexam']) ? $_REQUEST['lastexam'] : "";
$useragreement = !empty($_REQUEST['useragreement']) ? $_REQUEST['useragreement'] : "";

function submitForm($formvals)
{
	//Configure email to info@meijervision.com
	$to      = "eric.hui@rochesteroptical.com, wendy.emerson@rochesteroptical.com";
	$subject = "MeijerVision.com - $50 Gift Card Giveaway - New Entry";
	$headers = "From: ".$formvals['fname']." ".$formvals['lname']."\r\n" .
	"Reply-To: ".$formvals['email']."\r\n" .
	"X-Mailer: PHP/" . phpversion();
	$message = "Someone has entered the Feb 2013 $50 Gift Card Giveaway at www.meijervision.com!

Here is the information:
-------------------------------------------------------
Name: ".$formvals['fname']." ".$formvals['lname']."
Email: ".$formvals['email']."
Phone: ".$formvals['phone']."

Address:
".$formvals['yourAddr1']."
".$formvals['yourAddr2']."
".$formvals['yourAddrcity'].", ".$formvals['yourAddrstate']."
".$formvals['yourAddrzip']."

Your preferred location:
".$formvals['store'].", ".$formvals['state']."

When was your last eye exam?: 
".$formvals['lastexam']."

-------------------------------------------------------
Sender's IP address: ".$_SERVER['REMOTE_ADDR']."

";
	mail($to, $subject, $message, $headers);
	//Redirect to thank you page
	//header("Location: http://bak.meijervision/thanks.php?sent=1"); //Thank you page
	header("Location: http://www.meijervision.com/thanks.php?sent=1"); //Thank you page
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
	if ($fname != '' && $lname != '' && $email != '' && $yourAddr1 != '' && $yourAddrCity != '' && $yourAddrState != '' && $yourAddrZip != '' && $lastexam != '' && $useragreement != '')
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
<title>Vision Center at Meijer | $50 Gift Card Giveaway! Offer ends Feb.28, 2013</title>
<?php 
$_GET['page'] = 'coupons';
@include($_SERVER['DOCUMENT_ROOT'] . "/inc/meta.php"); 
?>
<link rel="stylesheet" href="/css/reset.css" />
<link rel="stylesheet" href="/css/960_24_col.css" />
<link rel="stylesheet" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/print.css" media="print">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.js"></script>
<script type="text/javascript" src="/js/jquery.validate.mod.js"></script>
<script type="text/javascript">
$(function() {
	//Form validation
    $("#form_contest").validate({
		rules: {
			fname: {
				required: true
			},
			lname: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			yourAddr1: {
				required: true
			},
			yourAddrcity: {
				required: true
			},
			yourAddrstate: {
				required: true
			},
			yourAddrzip: {
				required: true
			},
			lastexam: {
				required: true
			},
			useragreement: {
				required: true
			}
		},
		messages: {
			fname: {
				required: "Please tell us your first name."
			},
			lname: {
				required: "Please tell us your last name."
			},
			email: {
				required: "Please provide an email."
			},
			lastexam: {
				required: "Please tell us when you had your last eye exam."
			},
			useragreement: {
				required: "Please agree to the terms of the contest before entering."
			}
		}
		
	});
	function loadStoreOptions(strState){
		if (strState != "")
		{
			$.getJSON("../contact-storeselect.php",{state: strState, ajax: 'true'}, function(j){
				var options = '';
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].optionValue + '">' + j[i].optionDisplay + '</option>';
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
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/analytics.php"); ?>
</head>
<body>
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/header.php"); ?>
<div class="container_24">
<div class="grid_18">
<div id="main">
<form name="form_contest" id="form_contest" method="post" action="2013-02-28-50-dollar-giftcard-giveaway.php">
<h1>Enter for a chance to win!</h1>
<p><img src="../images/680x150_landingpage_Meijer.jpg" alt="Win a $50 Gift Card!"> </p>
<p>ELIGIBILITY: Provide all required information below to be entered to win a $50 gift card from the Vision Center at Meijer. No purchase necessary to win. Must be 18 years of age or older and reside in the United States to participate. One entry per person will be counted towards the drawing.</p>
<p>PRIZES: On March 1, 2013, 3 names will be randomly drawn. Each winner will receive one (1) fifty dollar Gift Card valid at any Vision Center at Meijer retail store. Gift Card will be m
  
  ailed to the address listed on the entry form within two weeks of the drawing.  </p>
<p>
  <?php 
if ($errors != '')
{
	print "<div class=\"error\">$errors</div>";
}
?>
</p>
<div class="alignleft"><label for="fname">First name</label><br /><input type="text" name="fname" id="fname" value="<?php echo $fname ?>" /></div>
<div class="alignleft"><label for="lname">Last name</label><br /><input type="text" name="lname" id="lname" value="<?php echo $lname ?>" /></div>
<div style="clear:both;"></div>
<div><label for="email">Email</label><br /><input type="text" name="email" id="email" value="<?php echo $email ?>" size="47" /></div>
<div><label for="phone">Phone <em>(optional)</em></label><br /><input type="text" name="phone" id="phone" value="<?php echo $phone ?>" size="47" /><span>&nbsp;<em></em></span></div>
<br />

<p><label for="yourAddr1">Address line 1</label><br />
<input type="text" name="yourAddr1" value="<?php echo $yourAddr1 ?>" class="" size="47" /></p>
<p><label for="yourAddr2">Address line 2 <em>(optional)</em></label><br />
<input type="text" name="yourAddr2" value="<?php echo $yourAddr2 ?>" class="" size="47" /></p>
<div class="alignleft"><label for="yourAddrcity">City</label><br />
<input type="text" name="yourAddrcity" value="<?php echo $yourAddrCity ?>" class="" size="37" /></div>
<div class="alignleft"><label for="yourAddrstate">State</label><br />
<select name="yourAddrstate" class=""><option
value="AL">AL</option><option
value="AK">AK</option><option
value="AS">AS</option><option
value="AZ">AZ</option><option
value="AR">AR</option><option
value="CA">CA</option><option
value="CO">CO</option><option
value="CT">CT</option><option
value="DE">DE</option><option
value="DC">DC</option><option
value="FM">FM</option><option
value="FL">FL</option><option
value="GA">GA</option><option
value="GU">GU</option><option
value="HI">HI</option><option
value="ID">ID</option><option
value="IL">IL</option><option
value="IN">IN</option><option
value="IA">IA</option><option
value="KS">KS</option><option
value="KY">KY</option><option
value="LA">LA</option><option
value="ME">ME</option><option
value="MH">MH</option><option
value="MD">MD</option><option
value="MA">MA</option><option
value="MI">MI</option><option
value="MN">MN</option><option
value="MS">MS</option><option
value="MO">MO</option><option
value="MT">MT</option><option
value="NE">NE</option><option
value="NV">NV</option><option
value="NH">NH</option><option
value="NJ">NJ</option><option
value="NM">NM</option><option
value="NY">NY</option><option
value="NC">NC</option><option
value="ND">ND</option><option
value="MP">MP</option><option
value="OH">OH</option><option
value="OK">OK</option><option
value="OR">OR</option><option
value="PW">PW</option><option
value="PA">PA</option><option
value="PR">PR</option><option
value="RI">RI</option><option
value="SC">SC</option><option
value="SD">SD</option><option
value="TN">TN</option><option
value="TX">TX</option><option
value="UT">UT</option><option
value="VT">VT</option><option
value="VI">VI</option><option
value="VA">VA</option><option
value="WA">WA</option><option
value="WV">WV</option><option
value="WI">WI</option><option
value="WY">WY</option></select></div>
<div style="clear:both;"></div>
<p>Zip<br />
<input type="text" name="yourAddrzip" value="<?php echo $yourAddrZip ?>" class="" /></span></p>

<strong>Your preferred location:</strong><br />
<div style="float:left;">
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
<select name="store" id="store"><option value="">-- Specify store --</option></select><br />
</div>
<div class="clear"></div>

<p><br /><strong>My last eye exam was:</strong><br/>
<input type="radio" name="lastexam" value="Within last 6 months" />&nbsp;<span
class="lblright">Within last 6 months</span><br />
<input type="radio" name="lastexam" value="More than a year ago" />&nbsp;<span
class="lblright">More than a year ago</span><br />
<input type="radio" name="lastexam" value="More than 2 years ago" />&nbsp;<span
class="lblright">More than 2 years ago</span><br />
<input type="radio" name="lastexam" value="I�ve never had an eye exam" />&nbsp;<span
class="lblright">I've never had an eye exam</span></p>

<div style="margin-top:1em;">
<input type="checkbox" id="useragreement" name="useragreement" value="Yes" class="cboxleft"  <?php if ($useragreement == "Yes") { echo "checked=\"checked\""; } ?>/>
<label for="useragreement" class="lblright">I confirm that I am at least 18-years old and a US resident.</label></div>
<div class="clear"></div>
<div style="margin-top:2em;"><button type="submit" id="submitContactForm" name="submitContactForm">Submit</div>

<p style="font-size:0.7em; margin-top:1em;">By entering this contest, you also agree to receive occasional email announcements and special offers from the Vision Center at Meijer. However, no information gathered from newsletter subscribers, including email addresses, is ever shared with or sold to any third party, unless expressly requested by the user. You may also unsubscribe from these emails at any time.</p>
</form>
</div><!--#main-->
</div><!--.grid_18"-->
<div class="grid_6">
<div id="aboutus_sidecol" style="height:780px;">
<h1><a href="http://www.meijervision.com/coupons.php" target="_blank"><img src="../images/200x250_blog_feb-Meijer.jpg" alt="View Current Promotions" border="0"></a></h1>
<h1>Our Locations</h1>
<div class="locationAddress" style="cursor: pointer;"><a href="/locations-list.php?state=Illinois">View stores in Illinois</a><br><a href="/locations-list.php?state=Indiana">View stores in Indiana</a><br><a href="/locations-list.php?state=Michigan">View stores in Michigan</a><br><a href="/locations-list.php?state=Ohio">View stores in Ohio</a><br><a href="/locations-list.php">View all stores</a></div>
</div><!--#aboutus_sidecol-->
</div><!--.grid_6"-->
</div><!--.container_24 #main-->
<?php @include($_SERVER['DOCUMENT_ROOT'] . "/inc/footer.php"); ?>
</body>
</html>