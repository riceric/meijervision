-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2013 at 08:05 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vcmeijer`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'Doctor ID #',
  `bio` text NOT NULL COMMENT 'HTML text of doctor bio',
  `photo_url` varchar(100) NOT NULL COMMENT 'Relative path of doctor bio photo',
  `full_name` varchar(100) NOT NULL,
  `doctoral_degree` varchar(10) NOT NULL COMMENT 'eg. O.D., F.A.A.O.',
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `bio`, `photo_url`, `full_name`, `doctoral_degree`) VALUES
(0001, '<p>Dr. Shu Phung is very excited to join the Vision Center at Meijer, providing primary eye care for all ages, including diagnosis and management of ocular diseases. Dr. Shu is certified by the Illinois Board of Optometric Examiners, and the Canadian Assessment Standards of Optometry.</p>', '/images/doctors/dr-shu-phung.jpg', 'Shu Phung', 'OD'),
(0002, '<p>Dr. Erica Kosiba grew up in McHenry, IL and is excited to be back home. She is an active member in the American Optometric and Illinois Optometric Associations, and focuses on pediatric eye care, contact lenses, and ocular diseases.</p>', '/images/doctors/dr-erica-kosiba.jpg', 'Erica Kosiba', 'OD'),
(0003, '<p>Dr. Steven Bathje graduated from Ferris State College of Optometry. For 30 years, he operated 2 private optometry offices in the Upper Peninsula of Michigan, before relocating to the Grand Rapids area. Dr. Bathje has extensive complete eye care experience with patients of all ages. He is especially adept at fitting the hard-to-fit contact lens wearer.</p>', '/images/doctors/dr-steven-bathje.jpg', 'Steven Bathje', 'OD'),
(0004, '<p>Dr. Debra Bourdeau graduated in 2000 from The Michigan College of Optometry and furthered her education as a Fellow at Johns Hopkins Medical Institute in Baltimore, MD. She is licensed to provide a full scope of vision services including comprehensive eye examinations for children and adults, and soft/rigid contact lens fittings.</p>', '/images/doctors/dr-debra-bourdeau.jpg', 'Debra Bourdeau', 'OD'),
(0005, '<p>Dr. Kara Alexander has been an optometrist for over 14 years. She has extensive eye care experience with patients of all ages. Dr. Alexander aims to provide her patients with the highest quality eye care.</p>', '/images/doctors/dr-kara-alexander.jpg', 'Kara Alexander', 'OD'),
(0006, '<p>Dr. Luc Joncas is a graduate of the Michigan College of Optometry and has practiced in the greater Lansing area for over 20 years. Dr. Joncas has extensive eye care experience with patients of all ages and specializes in customizing contact, digital and free form lenses to each patient''s needs.</p>', '/images/doctors/dr-luc-joncas.jpg', 'Luc Joncas', 'OD'),
(0007, '<p>Dr. Clara Lawrence has practiced Optometry in the central Ohio area for almost 30 years, and has a broad scope of Optometric work experiences. She provides comprehensive eye examinations for both glasses and contact lenses. Dr. Lawrence performs a thorough evaluation of the ocular health and medically treats certain ocular conditions.</p>', '/images/doctors/dr-clara-lawrence.jpg', 'Clara Lawrence', 'OD'),
(0008, '<p>Dr.Patel graduated from Nova Southeastern University College of Optometry in 2011.\r\nShe is experienced in performing comprehensive eye exams for all ages from children to the geriatric population and everyone in between. She is trained to fit hard and soft contact lenses. She is also proficient in managing and treating ocular disease. Dr. Patel is licensed in Indiana, Illinois and Florida.</p>\r\n', '/images/doctors/dr-pinky-patel.jpg', 'Pinky Patel', 'OD'),
(0009, '<p>Dr. Norman Rappaport graduated from Indiana University School of Optometry. He has practiced optometry  in the Indianapolis area for 25 years, and has performed over 60,000 comprehensive eye exams. He provides primary eye care for all ages, including diagnosis and management of ocular diseases.</p>', '/images/doctors/dr-norman-rappaport.jpg', 'Norman  Rappaport', 'OD'),
(0010, '<p>Since graduating from Indiana University School of Optometry, Dr. Houser has been providing family oriented vision care in southern Indiana. He has extensive eye care experience with patients of all ages and specializes in customizing contact, digital and free form lenses to each patient''s needs.</p>', '/images/doctors/dr-marc-houser.jpg', 'Marc Houser', 'OD');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--
DROP TABLE `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `city` varchar(255) NOT NULL COMMENT 'Store city',
  `state` varchar(50) NOT NULL COMMENT 'Store state (full)',
  `zip` varchar(10) NOT NULL COMMENT 'Store zip',
  `phone` varchar(20) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `page_url` varchar(255) NOT NULL COMMENT 'URL for store detail page',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2023 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `address`, `city`, `state`, `zip`, `phone`, `hours`, `lat`, `lng`, `page_url`) VALUES
(2007, 'McHenry', '2253 N Richmond Rd\nMcHenry, IL 60050', 'McHenry', 'Illinois', '60050', '(815) 578-9334', 'Mon, Wed-Fri 9:30am - 6pm; Tue 11am - 7pm; Sat 8am - 3pm', 42.358765, -88.267334, '/store/illinois/2007-mchenry.php'),
(2002, 'Elgin', '815 S Randall Rd\nElgin, IL 60123', 'Elgin', 'Illinois', '60123', '(847) 608-7380', 'Mon 11am - 7pm; Tue-Thu 9:30am - 6pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.012131, -88.334442, '/store/illinois/2002-elgin.php'),
(2016, 'Oswego', '2700 Route 34\r\nOswego, IL 60543', 'Oswego', 'Illinois', '60543', '(630) 554-4850', 'Mon 11am-7pm; Tue-Fri 9:30am - 6pm; Sat 8am - 3pm', 41.700981, -88.313652, '/store/illinois/2016-oswego.php'),
(2006, 'Bolingbrook', '755 E Boughton Rd\nBolingbrook, IL 60440', 'Bolingbrook', 'Illinois', '60440', '(630) 783-0225', 'Mon-Tue, Thu-Fri 9:30am - 6pm; Wed 11am - 7pm; Sat 8am - 3pm', 41.722645, -88.039413, '/store/illinois/2006-bolingbrook.php'),
(2017, 'Okemos', '2055 W Grand River Rd\nOkemos, MI 48864', 'Okemos', 'Michigan', '48864', '(517) 381-8556', 'Mon-Wed, Fri 10am - 6pm; Thu 11 am - 7 pm; Sat 8 am - 3 pm ', 42.719685, -84.424675, '/store/michigan/2017-okemos.php'),
(2020, 'Battle Creek', '2191 West Columbia Ave\nBattle Creek, MI 49015', 'Battle Creek', 'Michigan', '49015', '(269) 968-1600', 'Mon, Wed-Fri 9:30am - 6pm; Tue 10:30am - 7pm; Sat 8am - 3pm', 42.297363, -85.235191, '/store/michigan/2020-battle-creek.php'),
(2015, 'Dewitt', '12821 Cross Over Dr\nDewitt, MI 48820', 'Dewitt', 'Michigan', '48820', '(517) 669-5894', 'Mon 9 am - 6 pm; Tue 11 am - 7 pm; Wed-Fri 10 am - 6 pm; Sat 8 am - 3 pm', 42.827038, -84.541443, '/store/michigan/2015-dewitt.php'),
(2012, 'Howell', '3883 E Grand River Ave\nHowell, MI 48843', 'Howell', 'Michigan', '48843', '(517) 552-1573', 'Mon-Fri 9 am - 6 pm; Sat 8 am - 3 pm', 42.587593, -83.876396, '/store/michigan/2012-howell.php'),
(2010, 'Jenison', 'O-550 Baldwin St,\r\nJenison, MI 49428', 'Jenison', 'Michigan', '49428', '(616) 457-2642', 'Mon 11am - 7pm; Tue-Thu 9:30am - 6pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.904980, -85.794716, '/store/michigan/2010-jenison.php'),
(2003, 'Camby', '10509 Heartland Blvd\nCamby, IN 46113', 'Camby', 'Indiana', '46113', '(317) 821-8850', 'Mon 9:30am - 7 pm; Tue-Fri 9:30am - 6pm; Sat 9:30am - 3pm', 39.638779, -86.334663, '/store/indiana/2003-camby.php'),
(2001, 'Highland', '10138 Indianapolis Blvd, Highland, IN 46322 ', 'Highland', 'Indiana', '46322', '(219) 924-9714', 'Mon, Wed, Fri  9:30am - 6pm; Tue, Thu 11am - 7pm; Sat 8am - 3pm', 41.528435, -87.474091, '/store/indiana/2001-highland.php'),
(2000, 'Merrillville', '611 US 30\nMerrillville, IN 46410', 'Merrillville', 'Indiana', '46410', '(219) 736-0282 ', 'Mon-Tue, Thu-Fri 9:30am - 6pm; Wed 11am - 7pm; Sat 8am - 3pm', 41.470829, -87.341476, '/store/indiana/2000-merrillville.php'),
(2018, 'Grove City', '2811 London-Groveport Rd\nGrove City, OH 43123', 'Grove City', 'Ohio', '43123', '(614) 875-0506', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.836689, -83.078728, '/store/ohio/2018-grove-city.php'),
(2005, 'Reynoldsburg', '8000 E. Broad St\nReynoldsburg, OH 43068', 'Reynoldsburg', 'Ohio', '43068', '(614) 751-3902', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.987587, -82.788574, '/store/ohio/2005-reynoldsburg.php'),
(2019, 'Canal Winchester', '8300 Meijer Drive\nCanal Winchester, OH 43110 ', 'Canal Winchester', 'Ohio', '43110', '(614) 920-1643', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.848324, -82.777191, '/store/ohio/2019-canal-winchester.php'),
(2008, 'Grand Rapids', '2425 Alpine Ave NW\nGrand Rapids, MI 49544', 'Grand Rapids', 'Michigan', '49544', '(616) 363-0443', 'Mon, Tue, Thu 9:30am - 6pm; Wed 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm', 43.008316, -85.691223, '/store/michigan/2008-grand-rapids.php'),
(2009, 'Grand Rapids', '1997 E Beltline Ave NE\nGrand Rapids, MI 49525', 'Grand Rapids', 'Michigan', '49525', '(616) 365-2088', 'Mon, Wed, Thu 9:30am - 6pm; Tue 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.998592, -85.590797, '/store/michigan/2009-grand-rapids.php'),
(2004, 'Algonquin', '400 S Randall Rd\nAlgonquin, IL 60102', 'Algonquin', 'Illinois', '60102', '(847) 854-5412', 'Mon-Wed, Fri 9:30am - 6pm; Thu 11am - 7pm; Sat 8am - 3pm', 42.170235, -88.337769, '/store/illinois/2004-algonquin.php'),
(2013, 'Battle Creek', '6405 B Drive North,\nBattle Creek, MI 49014', 'Battle Creek', 'Michigan', '49014-7573', '(269) 979-3128', 'Mon-Wed, Fri 9:30am - 6pm; Thu 10:30am - 7pm; Sat 8am - 3pm', 42.261086, -85.171631, '/store/michigan/2013-battle-creek.php'),
(2022, 'Indianapolis', '8375 East 96th Street, Indianapolis, IN', 'Indianapolis', 'Indiana', '46256', '(317) 842-6235', 'Mon, Tue, Thu, Fri 9:30am - 6 pm; Wed 9:30am - 7pm; Sat 9:30am - 3pm', 39.926323, -86.025116, '/store/indiana/2022-indianapolis.php'),
(2021, 'Avon', '10841 E US 36, Avon, IN 46123', 'Avon', 'Indiana', '46123', '(317) 209-8321', 'Mon, Tue, Thu, Fri 9:30am - 6 pm; Wed 9:30am - 7pm; Sat 9:30am - 3pm', 39.763687, -86.330505, '/store/indiana/2021-avon.php');

-- --------------------------------------------------------

--
-- Table structure for table `location_doctor`
--

CREATE TABLE IF NOT EXISTS `location_doctor` (
  `location_id` int(11) NOT NULL COMMENT 'foreign key of location',
  `doctor_id` int(4) unsigned zerofill NOT NULL COMMENT 'foreign key of doctor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Relational table for location - doctor';

--
-- Dumping data for table `location_doctor`
--

INSERT INTO `location_doctor` (`location_id`, `doctor_id`) VALUES
(2000, 0008),
(2001, 0008),
(2002, 0002),
(2003, 0009),
(2003, 0010),
(2004, 0002),
(2005, 0007),
(2006, 0001),
(2007, 0002),
(2008, 0003),
(2009, 0003),
(2010, 0003),
(2012, 0004),
(2013, 0005),
(2015, 0006),
(2016, 0001),
(2017, 0006),
(2018, 0007),
(2019, 0007),
(2020, 0005),
(2021, 0010),
(2022, 0009);

-- --------------------------------------------------------

--
-- Table structure for table `location_service`
--

CREATE TABLE IF NOT EXISTS `location_service` (
  `location_id` int(11) NOT NULL,
  `service_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Lookup table for location and services';

--
-- Dumping data for table `location_service`
--

INSERT INTO `location_service` (`location_id`, `service_id`) VALUES
(2000, 1),
(2000, 2),
(2000, 3),
(2001, 1),
(2001, 2),
(2001, 3),
(2002, 1),
(2002, 2),
(2002, 3),
(2002, 5),
(2003, 1),
(2003, 2),
(2003, 3),
(2004, 1),
(2004, 2),
(2004, 3),
(2005, 1),
(2005, 2),
(2005, 3),
(2006, 1),
(2006, 2),
(2006, 3),
(2007, 1),
(2007, 2),
(2007, 3),
(2008, 1),
(2008, 2),
(2008, 3),
(2008, 5),
(2009, 1),
(2009, 2),
(2009, 3),
(2009, 5),
(2010, 1),
(2010, 2),
(2010, 3),
(2010, 5),
(2012, 1),
(2012, 2),
(2012, 3),
(2013, 1),
(2013, 2),
(2013, 3),
(2015, 1),
(2015, 2),
(2015, 3),
(2016, 1),
(2016, 2),
(2016, 3),
(2016, 4),
(2017, 1),
(2017, 2),
(2017, 3),
(2018, 1),
(2018, 2),
(2018, 3),
(2019, 1),
(2019, 2),
(2019, 3),
(2020, 1),
(2020, 2),
(2020, 3),
(2021, 1),
(2021, 2),
(2021, 3),
(2022, 1),
(2022, 2),
(2022, 3);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `service_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'ID of service type',
  `description` varchar(255) NOT NULL COMMENT 'Description of the service',
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `description`) VALUES
(1, 'Comprehensive eye exams'),
(2, 'Free vision screenings'),
(3, 'Contact lens fittings'),
(4, 'Languages spoken: Spanish (Se habla español)'),
(5, 'Languages spoken: German (Wir sprechen Deutsch)');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
