-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2013 at 01:49 PM
-- Server version: 5.0.96-community
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meijer_vcmeijer`
--

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hours` varchar(255) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2023 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `phone`, `hours`, `lat`, `lng`) VALUES
(2007, 'McHenry', '2253 N Richmond Rd\nMcHenry, IL 60050', '(815) 578-9334', 'Mon, Wed-Fri 9:30am - 6pm; Tue 11am - 7pm; Sat 8am - 3pm', 42.358765, -88.267334),
(2002, 'Elgin', '815 S Randall Rd\nElgin, IL 60123', '(847) 608-7380', 'Mon 11am - 7pm; Tue-Thu 9:30am - 6pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.012131, -88.334442),
(2016, 'Oswego', '2700 Route 34\r\nOswego, IL 60543', '(630) 554-4850', 'Mon 11am-7pm; Tue-Fri 9:30am - 6pm; Sat 8am - 3pm', 41.700981, -88.313652),
(2006, 'Bolingbrook', '755 E Boughton Rd\nBolingbrook, IL 60440', '(630) 783-0225', 'Mon-Tue, Thu-Fri 9:30am - 6pm; Wed 11am - 7pm; Sat 8am - 3pm', 41.722645, -88.039413),
(2017, 'Okemos', '2055 W Grand River Rd\nOkemos, MI 48864', '(517) 381-8556', 'Mon-Wed, Fri 10am - 6pm; Thu 11 am - 7 pm; Sat 8 am - 3 pm ', 42.719685, -84.424675),
(2020, 'Battle Creek', '2191 West Columbia Ave\nBattle Creek, MI 49015', '(269) 968-1600', 'Mon, Wed-Fri 9:30am - 6pm; Tue 10:30am - 7pm; Sat 8am - 3pm', 42.297363, -85.235191),
(2015, 'Dewitt', '12821 Cross Over Dr\nDewitt, MI 48820', '(517) 669-5894', 'Mon 9 am - 6 pm; Tue 11 am - 7 pm; Wed-Fri 10 am - 6 pm; Sat 8 am - 3 pm', 42.827038, -84.541443),
(2012, 'Howell', '3883 E Grand River Ave\nHowell, MI 48843', '(517) 552-1573', 'Mon-Fri 9 am - 6 pm; Sat 8 am - 3 pm', 42.587593, -83.876396),
(2010, 'Jenison', 'O-550 Baldwin St,\r\nJenison, MI 49428', '(616) 457-2642', 'Mon 11am - 7pm; Tue-Thu 9:30am - 6pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.904980, -85.794716),
(2003, 'Camby', '10509 Heartland Blvd\nCamby, IN 46113', '(317) 821-8850', 'Mon 9:30am - 7 pm; Tue-Fri 9:30am - 6pm; Sat 9:30am - 3pm', 39.638779, -86.334663),
(2001, 'Highland', '10138 Indianapolis Blvd, Highland, IN 46322 ', '(219) 924-9714', 'Mon, Wed, Fri  9:30am - 6pm; Tue, Thu 11am - 7pm; Sat 8am - 3pm', 41.528435, -87.474091),
(2000, 'Merrillville', '611 US 30\nMerrillville, IN 46410', '(219) 736-0282 ', 'Mon-Tue, Thu-Fri 9:30am - 6pm; Wed 11am - 7pm; Sat 8am - 3pm', 41.470829, -87.341476),
(2018, 'Grove City', '2811 London-Groveport Rd\nGrove City, OH 43123', '(614) 875-0506', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.836689, -83.078728),
(2005, 'Reynoldsburg', '8000 E. Broad St\nReynoldsburg, OH 43068', '(614) 751-3902', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.987587, -82.788574),
(2019, 'Canal Winchester', '8300 Meijer Drive\nCanal Winchester, OH 43110 ', '(614) 920-1643', 'Mon-Fri 10 am - 7 pm; Sat 9 am - 4 pm', 39.848324, -82.777191),
(2008, 'Grand Rapids', '2425 Alpine Ave NW\nGrand Rapids, MI 49544', '(616) 363-0443', 'Mon, Tue, Thu 9:30am - 6pm; Wed 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm', 43.008316, -85.691223),
(2009, 'Grand Rapids', '1997 E Beltline Ave NE\nGrand Rapids, MI 49525', '(616) 365-2088', 'Mon, Wed, Thu 9:30am - 6pm; Tue 11am - 7pm; Fri 9am - 5pm; Sat 8am - 3pm', 42.998592, -85.590797),
(2004, 'Algonquin', '400 S Randall Rd\nAlgonquin, IL 60102', '(847) 854-5412', 'Mon-Wed, Fri 9:30am - 6pm; Thu 11am - 7pm; Sat 8am - 3pm', 42.170235, -88.337769),
(2013, 'Battle Creek', '6405 B Drive North, Battle Creek, MI 49014', '(269) 979-3128', 'Mon-Wed, Fri 9:30am - 6pm; Thu 10:30am - 7pm; Sat 8am - 3pm', 42.261086, -85.171631),
(2022, 'Indianapolis', '8375 East 96th Street, Indianapolis, IN', '(317) 842-6235', 'Mon, Tue, Thu, Fri 9:30am - 6 pm; Wed 9:30am - 7pm; Sat 9:30am - 3pm', 39.926323, -86.025116),
(2021, 'Avon', '10841 E US 36, Avon, IN 46123', '(317) 209-8321', 'Mon, Tue, Thu, Fri 9:30am - 6 pm; Wed 9:30am - 7pm; Sat 9:30am - 3pm', 39.763687, -86.330505);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
