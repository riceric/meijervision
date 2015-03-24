<?php
/**	print "<meta name=\"robots\" content=\"noindex,nofollow\">"; **/

if (!isset($_GET["page"]))
{
	print "<meta content=\"The Vision Center, located at 19 Meijer stores in the Midwest, is your one-stop for complete eye exams, stylish eyeglasses, contact lenses and sunglasses at great prices. Walk-ins are welcome!\" name=\"description\" />\r\n";
	print "<meta content=\"Vision Center at Meijer, Meijer Vision, Eyeglasses, Glasses, Sunglasses, Contact Lenses, Contacts, Eyewear, Fashion, Frames, Brand names, Eye exams, Optometrist, Transitions, Progressives, Free form Digital Lens, Anti-reflective coating, Eyemed, Michigan, Illinois, Indiana, Ohio, Meijer, Home page, Home\" name=\"keywords\" />\r\n";
	print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
	print "<meta content=\"company\" property=\"og:type\" />\r\n";
	print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
	print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
	print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
}
else {
	switch($_GET["page"])
	{
		case "about":
			print "<meta content=\"We are a licensee of Meijer, Inc., which allows us to provide the highest quality exams, eyeglasses, and contact lenses at discounted prices.\" name=\"description\" />\r\n";
			print "<meta content=\"Vision Center at Meijer, Meijer Vision, Exodus Vision, Eyeglasses, Glasses, Sunglasses, Contact Lenses, Contacts, Eyewear, Fashion, Frames, Brand names, Eye exams, Optometrist, Transitions, Progressives, Free form Digital Lens, Anti-reflective coating, Michigan, Illinois, Indiana, Ohio, Meijer, About us\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
			break;
		case "coupons":
			print "<meta content=\"Vision Center at Meijer | View this month's sale events!\" name=\"description\" />\r\n";
			print "<meta content=\"Vision Center at Meijer, Meijer Vision, Eyeglasses, Glasses, Sunglasses, Contact Lenses, Contacts, Eyewear, Fashion, Frames, Brand names, Eye exams, Optometrist, Transitions, Progressives, Free form Digital Lens, Anti-reflective coating, Eyemed, Michigan, Illinois, Indiana, Ohio, Meijer, Home page, Home\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer | View this month's sale events!\" property=\"og:title\" />\r\n";
			print "<meta content=\"Buy One Get One FREE! Hurry, this offer ends October 31, 2013! Don't forget about our $99 Frame and Lens Package for Kids, too!\" property=\"og:description\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/coupons.php\" property=\"og:url\" />\r\n";
			//print "<meta content=\"http://www.meijervision.com/eblasts/277x307-2012-BlackFriday.jpg\" property=\"og:image\" />\r\n";

			foreach ($currentPromos as $promo)
			{
				print "<meta content=\"".$promo['couponImgURL']."\" property=\"og:image\" />\r\n";
			}
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
			break;
		case "locations":
			print "<meta content=\"The Vision Center, located at 21 Meijer stores in the Midwest, is your one-stop for complete eye exams, stylish eyeglasses, contact lenses and sunglasses at great prices. Walk-ins are welcome!\" name=\"description\" />\r\n";
			print "<meta content=\"Store locations, Michigan, Illinois, Indiana, Ohio, Contact, Find Vision Center, Map, Get directions, Find store, Vision Center at Meijer, Meijer Vision, Eyeglasses, Glasses, Sunglasses, Contact Lenses, Eye exams, Optometrist, Meijer\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
			break;
		case "insurance":
			print "<meta content=\"Our Vision Centers are able to accept managed care from a number of providers including specific contracts from Eyemed, Davis Vision, Heritage, Avesis, etc.\" name=\"description\" />\r\n";
			print "<meta content=\"Insurance, Vision coverage, Eyemed, CareCredit, Davis Vision, Heritage, Avesis, Vision Center at Meijer, Eyeglasses, Glasses, Contact Lenses, Contact lens exam, Lens fitting, Contacts, Eyewear, Eye exams, Optometrist, Transitions, Progressives, Free form Digital Lens, Michigan, Illinois, Indiana, Ohio, Meijer\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
			break;
		case "contact":
			print "<meta content=\"Please contact us with any questions or comments that you might have regarding our promotions, pricing, insurance coverage, service or even career opportunities at the Vision Center!\" name=\"description\" />\r\n";
			print "<meta content=\"Vision Center at Meijer, Meijer Vision, promotions, pricing, insurance coverage, career opportunities, Newsletter, Eye exams, Optometrist, Michigan, Illinois, Indiana, Ohio, Meijer, Contact us\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";
			break;
		default:
			print "<meta content=\"The Vision Center, located at 19 Meijer stores in the Midwest, is your one-stop for complete eye exams, stylish eyeglasses, contact lenses and sunglasses at great prices. Walk-ins are welcome!\" name=\"description\" />\r\n";
			print "<meta content=\"Vision Center at Meijer, Meijer Vision, Eyeglasses, Glasses, Sunglasses, Contact Lenses, Contacts, Eyewear, Fashion, Frames, Brand names, Eye exams, Optometrist, Transitions, Progressives, Free form Digital Lens, Anti-reflective coating, Eyemed, Michigan, Illinois, Indiana, Ohio, Meijer, Home page, Home\" name=\"keywords\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:title\" />\r\n";
			print "<meta content=\"company\" property=\"og:type\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/\" property=\"og:url\" />\r\n";
			print "<meta content=\"http://www.meijervision.com/images/logo-meijervision.png\" property=\"og:image\" />\r\n";
			print "<meta content=\"Vision Center at Meijer\" property=\"og:site_name\" />\r\n";		
			break;
	}
}
?>
