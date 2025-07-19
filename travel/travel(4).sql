-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 04:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(99) NOT NULL,
  `user` varchar(99) NOT NULL,
  `phone` varchar(9) NOT NULL,
  `email` varchar(99) NOT NULL,
  `tourname` varchar(99) NOT NULL,
  `tourdate` date NOT NULL,
  `tourduration` varchar(99) NOT NULL,
  `totalPrice` int(99) NOT NULL,
  `person1` varchar(99) NOT NULL,
  `noofpeople` int(99) NOT NULL,
  `bookingdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bimg` varchar(99) NOT NULL,
  `status` varchar(99) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `user`, `phone`, `email`, `tourname`, `tourdate`, `tourduration`, `totalPrice`, `person1`, `noofpeople`, `bookingdate`, `bimg`, `status`) VALUES
(16, 's2512', '789456123', 's@gmail.com', 'the great kutch tour', '2024-07-16', '8days', 112000, 'sheikh safwaan', 2, '2024-03-16 13:30:53', 'kutch.jpg', 'confirm by admin'),
(17, 'k7', '704356781', 'kishanvinjuda21@gmail.com', 'australia with kan', '2024-08-27', '8days', 240000, 'VINZUDA KISHAN BALUBHAI', 2, '2024-03-20 07:34:20', 'aus1.jpg', 'confirm by admin'),
(18, 'anas2611', '999812470', 'asaiyed196@gmail.com', 'explore south gujrat', '2024-03-28', '5days', 5000, 'saiyed anas', 1, '2024-03-20 11:16:53', 'sg1.jpg', 'pending'),
(19, 'anas2611', '999812470', 'asaiyed196@gmail.com', 'explore south gujrat', '2024-03-28', '5days', 5000, 'saiyed anas', 1, '2024-03-20 11:17:19', 'sg1.jpg', 'pending'),
(20, 'anas2611', '999812470', 'asaiyed196@gmail.com', 'mumbai', '2024-03-28', '6days', 10000, 'saiyed anas', 1, '2024-03-20 11:19:35', 'b1.jpg', 'confirm by admin'),
(21, 's2512', '789456123', 's@gmail.com', 'australia with kan', '2024-08-27', '8days', 360000, 'sheikh safwaan', 3, '2024-03-20 13:46:51', 'aus1.jpg', 'confirm by admin');

-- --------------------------------------------------------

--
-- Table structure for table `global`
--

CREATE TABLE `global` (
  `id` int(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `img` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `global`
--

INSERT INTO `global` (`id`, `name`, `img`) VALUES
(1, 'africa', 'africa.jpg'),
(2, 'australia', 'australia.jpg'),
(3, 'dubai', 'dubai.jpg'),
(4, 'egypt', 'egypt.jpg'),
(5, 'italy', 'italy.jpg'),
(6, 'japan', 'japan.jpg'),
(7, 'maldives', 'maldives.jpg'),
(8, 'norway', 'norway.jpg'),
(9, 'paris', 'paris.jpg'),
(10, 'russia', 'russia.jpg'),
(11, 'saudi-arab', 'saudi.jpg'),
(12, 'swizerland', 'swiz.jpg'),
(13, 'turkey', 'turkey.jpg'),
(14, 'united state of america', 'usa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hollydays`
--

CREATE TABLE `hollydays` (
  `id` int(99) NOT NULL,
  `packname` varchar(99) NOT NULL,
  `state` varchar(99) NOT NULL,
  `landscap` varchar(99) NOT NULL,
  `transportation` varchar(99) NOT NULL,
  `meals` varchar(99) NOT NULL,
  `price` int(99) NOT NULL,
  `abouttour` varchar(900) NOT NULL,
  `tourduration` varchar(99) NOT NULL,
  `fromdate` date NOT NULL,
  `timg` varchar(99) NOT NULL,
  `timg1` varchar(99) NOT NULL,
  `timg2` varchar(99) NOT NULL,
  `accommodation` varchar(99) NOT NULL,
  `country` varchar(99) NOT NULL,
  `day1` varchar(99) NOT NULL,
  `day2` varchar(99) NOT NULL,
  `day3` varchar(99) NOT NULL,
  `day4` varchar(99) NOT NULL,
  `day5` varchar(99) NOT NULL,
  `day6` varchar(99) NOT NULL,
  `day7` varchar(99) NOT NULL,
  `day8` varchar(99) NOT NULL,
  `d1img` varchar(99) NOT NULL,
  `d2img` varchar(99) NOT NULL,
  `d3img` varchar(99) NOT NULL,
  `d4img` varchar(99) NOT NULL,
  `d5img` varchar(99) NOT NULL,
  `d6img` varchar(99) NOT NULL,
  `d7img` varchar(99) NOT NULL,
  `d8img` varchar(99) NOT NULL,
  `tourtype` varchar(99) NOT NULL,
  `adddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hollydays`
--

INSERT INTO `hollydays` (`id`, `packname`, `state`, `landscap`, `transportation`, `meals`, `price`, `abouttour`, `tourduration`, `fromdate`, `timg`, `timg1`, `timg2`, `accommodation`, `country`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `d1img`, `d2img`, `d3img`, `d4img`, `d5img`, `d6img`, `d7img`, `d8img`, `tourtype`, `adddate`) VALUES
(3, 'the great kutch tour', 'gujrat', 'desert', 'bus', 'all', 5600, 'Kutch district, officially spelled Kachchh, is a district of Gujarat state in western India, with its headquarters at Bhuj. Covering an area of 45,674 km², it is the largest district of India. The area of Kutch is larger than the entire area of other Indian states like Haryana and Kerala.', '8days', '2024-07-16', 'kutch.jpg', 'k1.jpg', 'k2.jpg', 'delux', 'india', 'dholavira', 'bhuj', 'white run', 'narayan sarovar', 'kalo dungar', 'aina mahal', 'hamisar lake', 'lyari riverbed', 'dholavira.jpeg', 'Bhuj.jpg', 'safed run.jpg', 'narayansarovar.jpg', 'kalodungar.jpg', 'aina mahal.jpg', 'hamisar.jpg', 'Lyari-Riverbed-Banner.jpg', 'domestic', '2024-03-20 06:13:32'),
(4, 'saurashtra darshan', 'gujrat', 'beach', 'bus', 'all', 9000, 'Saurashtra State was originally named the United States of Kathiawar. It was formed on 15 February 1948, from approximately 200 large and small Princely States of the colonial Baroda, Western India and Gujarat States Agency of the British raj territory under direct colonial rule.', '4days', '2024-05-20', 's1.jpg', 's2.jpg', 's3.jpg', 'normal', 'india', 'dwarka', 'somnath', 'diu', 'junagadh', '', '', '', '', 'sd1.jpg', 'sd2.jpg', 'sd3.jpg', 'sd4.jpg', '', '', '', '', 'domestic', '2024-03-17 16:48:05'),
(5, 'explore south gujrat', 'gujrat', 'normal', 'bus', 'all', 5000, 'Gujarat is a state along the western coast of India. Its coastline of about 1,600 km is the longest in the country, most of which lies on the Kathiawar peninsula. Gujarat is the fifth-largest Indian state by area, covering some 196,024 km²; and the ninth-most populous state, with a population of 60.', '5days', '2024-03-28', 'sg1.jpg', 'sg2.jpg', 'sg3.jpeg', 'medium', 'india', 'saputara', 'ahemdabad', 'vadodara', 'dang', 'daman', '', '', '', 'sgd1.jpg', 'sgd2.jpg', 'sgd3.jpg', 'sgd4.jpg', 'sgd5.jpg', '', '', '', 'domestic', '2024-03-17 17:02:54'),
(6, 'mumbai', 'maharashtra', 'normal', 'train', 'all', 10000, 'its bombay ', '6days', '2024-03-28', 'b1.jpg', 'b2.jpg', 'b3.jpeg', 'luxurious', 'india', 'gateway of india', 'csmt', 'shidhdhivinayak temple', 's g n p', 'hajiali dargah', 'g v p', '', '', 'bd1.jpg', 'bd2.jpg', 'bd3.jpg', 'bd4.jpg', 'bd5.jpg', 'bd6.jpg', '', '', 'domestic', '2024-03-17 17:36:07'),
(7, 'africa safari', 'africa', 'desert', 'flight,bus', 'all', 100000, 'Africa is a vast and diverse continent with a rich tapestry of cultures, landscapes, and experiences. ', '8days', '2024-07-26', 'af1.jpg', 'af2.jpg', 'af3.jpg', 'delux', 'africa', 'masai mara park', 'victoria falla', 'cape town', 'serangi national park', 'marrakech', 'okavango delta', 'krunger national', 'giza', 'afd1.jpg', 'afd2.jpg', 'afd3.jpg', 'afd4.jpg', 'afd5.jpg', 'afd6.jpg', 'afd7.jpg', 'afd8.jpg', 'international', '2024-03-19 11:34:59'),
(8, 'australia with kan', 'australia', 'beach', 'flight,bus', 'all', 120000, 'Australia, known for its stunning natural landscapes, vibrant cities, and unique wildlife, offers travelers a diverse range of experiences. ', '8days', '2024-08-27', 'aus1.jpg', 'aus2.jpg', 'aus3.jpg', 'luxurious', 'australia', 'sydney', 'great barrier', 'uluru', 'melbourne', 'great ocean road', 'kakadu national', 'tasmania', 'the kim berie', 'ausd1.jpg', 'ausd2.jpg', 'ausd3.jpg', 'ausd4.jpg', 'ausd5.jpg', 'ausd6.jpg', 'ausd7.jpg', 'ausd8.jpg', 'international', '2024-03-19 11:49:35'),
(9, 'luxurious dubai', 'dubai', 'desert', 'flight,taxi', 'all', 70000, 'Dubai, the most populous city in the United Arab Emirates (UAE), is known for its futuristic skyline, luxurious shopping malls, and extravagant lifestyle', '8days', '2024-05-28', 'dubai1.jpg', 'dubai2.jpg', 'dubai3.jpg', 'luxurious', 'dubai', 'burj khalifa', 'the dubai mall', 'palm jumeriah', 'dubai marina', 'desert safari', 'burj al arab', 'dubai greek', 'dubai fountain show', 'dubd1.jpg', 'dubd2.jpg', 'dubd3.jpg', 'dubd4.jpg', 'dubd5.jpg', 'dubd6.jpg', 'dubai creek.jpg', 'dubd8.jpg', 'international', '2024-03-19 11:53:51'),
(10, 'egypt ancient', 'egypt', 'desert', 'flight,car', 'all', 80000, 'Egypt, with its rich history, iconic landmarks, and vibrant culture, offers travelers a unique and immersive experience.', '8days', '2024-11-28', 'egy1.jpg', 'egy2.jpg', 'egy3.jpg', 'delux', 'egypt', 'pyramid of giza', 'egyptian museam', 'nile river cruise', 'luxor temple', 'vally of the king', 'aswan', 'islamic cairo', 'red sea', 'egyd1.jpg', 'egyd2.jpg', 'egyd3.jpg', 'egyd4.jpg', 'egyd5.jpg', 'egyd6.jpg', 'egyd7.jpg', 'egyd8.jpg', 'international', '2024-03-19 11:57:56'),
(11, 'italy', 'italy', 'normal', 'flight,cruise', 'all', 200000, 'taly, with its rich history, world-renowned cuisine, stunning art, and picturesque landscapes, offers travelers an endless array of attractions and experiences', '8days', '2024-12-09', 'it1.jpg', 'it2.jpg', 'it3.jpg', 'luxurious', 'italy', 'rome', 'florence', 'venice', 'amficole', 'tuscany', 'cinquerter', 'sicily', 'lake', 'itd1.jpg', 'itd2.jpg', 'itd3.jpg', 'itd4.jpg', 'itd5.jpg', 'itd6.jpg', 'itd7.jpg', 'itd8.jpg', 'international', '2024-03-19 12:04:19'),
(12, 'japan', 'japan', 'mountains', 'flight,taxi', 'all', 60000, 'apan is a captivating blend of ancient traditions and cutting-edge modernity, offering travelers a unique and immersive cultural experience.', '8days', '2024-08-07', 'jap1.jpg', 'jap2.jpg', 'jap3.jpg', 'delux', 'japan', 'tokyo', 'hirosima', 'kyoto', 'osaka', 'nara', 'hokaido', 'mountfuji', 'okinawa', 'japd1.jpg', 'japd2.jpg', 'japd3.jpg', 'japd4.jpg', 'japd5.jpg', 'japd6.jpg', 'japd7.jpg', 'japd8.jpg', 'international', '2024-03-19 12:07:41'),
(13, 'maldives', 'maldives', 'beach', 'cruise', 'all', 300000, 'The Maldives is a tropical paradise known for its pristine beaches, crystal-clear waters, and luxurious overwater villas', '8days', '2024-12-31', 'mal1.jpg', 'mal2.jpg', 'mal3.jpg', 'resorts', 'maldives', 'beach resort', 'snorkeling and diving', 'male', 'island hoping', 'sunset cruises', 'water sports', 'underwater restorent', 'sea plan flight', 'mald1.jpg', 'mald2.jpg', 'mald3.jpg', 'mald4.jpg', 'mald5.jpg', 'mald6.jpg', 'mald7.jpg', 'mald8.jpg', 'international', '2024-03-19 12:11:28'),
(14, 'norways', 'norway', 'mountains', 'flight,bus', 'all', 119000, 'Norway is renowned for its breathtaking natural beauty, including majestic fjords, towering mountains, and picturesque coastal towns. ', '8days', '2024-12-31', 'nor1.jpg', 'nor2.jpg', 'nor3.jpg', 'hotel', 'norway', 'norwegian ', 'oslo', 'bergen', 'northern lights', 'lofoten island', 'trolltunga', 'sognefjord', 'arctic wildlife', 'nord1.jpg', 'nord2.jpg', 'nord3.jpg', 'nord4.jpg', 'nord5.jpg', 'nor1.jpg', 'nord7.jpg', 'nord8.jpg', 'international', '2024-03-19 12:15:29'),
(15, 'paris', 'paris', 'beach', 'flight,bus', 'all', 100000, 'Paris, often referred to as the \"City of Light,\" is renowned for its romantic ambiance, iconic landmarks, and rich cultural heritage', '8days', '2024-06-27', 'par1.jpg', 'par2.jpg', 'par3.jpg', 'resorts', 'paris', 'eifeel tower', 'louvre musuem', 'notre dame', 'mont martere', 'chams', 'museed orsey', 'seine river cruise', 'luxumberge', 'pard1.jpg', 'pard2.jpg', 'pard3.jpg', 'pard4.jpg', 'pard5.jpg', 'pard6.jpg', 'pard7.jpg', 'pard8.jpg', 'international', '2024-03-19 12:19:26'),
(16, 'saudi arab', 'saudi-arab', 'deset', 'flight,car', 'all', 200000, 'Saudi Arabia, located in the Arabian Peninsula, offers a unique blend of ancient traditions and modern developments.', '8days', '2024-06-20', 'sau1.jpg', 'sau2.jpg', 'sau3.jpg', 'de', 'saudi-arab', 'riyadh', 'alula', 'jeddah', 'madina', 'macca', 'redsea', 'najran', 'empty quater', 'saud1.jpg', 'saud2.jpg', 'saud3.jpg', 'saud4.jpg', 'saud5.jpg', 'saud6.jpg', 'saud7.jpg', 'saud8.jpg', 'international', '2024-03-19 12:22:52'),
(17, 'swizerland', 'swizerland', 'mountains', 'flights', 'all', 400000, 'Saudi Arabia, located in the Arabian Peninsula, offers a unique blend of ancient traditions and modern developments.', '8day', '2024-05-28', 'swiz1.jpg', 'swiz2.jpg', 'swiz3.jpg', 'resorts', 'swizerland', 'swiss', 'lucerne', 'zurich', 'interlake', 'montreux', 'zermatt ', 'geneva', 'bern', 'swizd1.jpg', 'swizd2.jpg', 'swizd3.jpg', 'swizd4.jpg', 'swizd5.jpg', 'swizd6.jpg', 'swizd7.jpg', 'swizd8.jpg', 'international', '2024-03-19 12:26:35'),
(18, 'turkey', 'turkey', 'beach', 'flight,bus', 'all', 200000, 'urkey, situated at the crossroads of Europe and Asia, boasts a rich cultural heritage, stunning landscapes, and vibrant cities.', '8days', '2024-07-23', 'turk1.jpeg', 'turk2.jpg', 'turk3.jpg', 'hotel', 'turkey', 'istanbul', 'cappadocia', 'ephesus', 'pamukkace', 'antalya', 'pergamon', 'mount nemrut', 'ankara', 'turkd1.jpg', 'turkd2.jpg', 'turkd3.jpg', 'turkd4.jpg', 'turkd5.jpg', 'turkd6.jpg', 'turkd7.jpg', 'turkd8.jpg', 'international', '2024-03-19 12:29:46'),
(19, 'usa', 'united state of america', 'mothing', 'flights', 'all', 250000, 'The United States of America, known for its diverse landscapes, vibrant cities, and rich cultural heritage, offers travelers a wide range of attractions and experiences. ', '8days', '2024-07-16', 'us1.jpg', 'us2.jpg', 'us3.jpg', 'hotel', 'united state of america', 'new york', 'grand canyon', 'yellow stone', 'sanfrancisco', 'waikiki beach', 'washington', 'lasvegas', 'new orleans', 'usd1.jpg', 'usd2.jpg', 'usd3.jpg', 'usd4.jpg', 'usd5.jpg', 'usd6.jpg', 'usd7.jpg', 'usd8.jpg', 'international', '2024-03-19 12:33:35'),
(20, 'russia', 'russia', 'mountains', 'train,flights', 'all', 180000, 'Russia is a vast country with a rich cultural heritage and diverse natural landscapes, offering a wide range of tourist attractions. ', '8 dayds', '2024-06-13', 'rus1.jpg', 'rus2.jpg', 'rus3.jpg', 'hotel', 'russia', 'moscow', 'st. Petersburg', 'Golden Ring', 'Trans-Siberian Railway', 'Lake Baikal', 'Kazan: ', 'Sochi', 'Veliky Novgorod', 'rusd1.jpg', 'rusd2.jpg', 'rusd3.jpg', 'rusd4.jpg', 'rusd5.jpg', 'rusd6.jpg', 'rusd7.jpg', 'rusd8.jpg', 'international', '2024-03-19 13:18:16'),
(21, 'goa', 'goa', 'beach', 'bus', 'all', 10000, 'goa is about fun ', '8days', '2024-03-29', 'GOA3.jpg', 'GOA2.jpg', 'GOA1.jpg', 'hostel', 'india', 'baghabeach', 'callangute', 'dudhsagar ', 'old goa', 'anjuna flea', 'market', 'fort aguda', 'titos', 'gd1.jpg', 'gd2.jpg', 'gd3.jpg', 'gd4.jpg', 'gd5.jpg', 'gd6.jpg', 'gd7.jpg', 'gd8.jpg', 'domestic', '2024-03-20 01:44:44'),
(22, 'west bengal', 'bengal', 'normal', 'bus', 'all', 7000, 'tour of bengal', '8 days', '2024-03-28', 'wb1.jpg', 'wb2.jpg', 'wb3.jpg', 'hotel', 'india', 'darjeeling', 'kolkata', 'sundarbagh', 'silliguri', 'kalimpong', 'digha', 'murshidabad', 'shantiniketan', 'wbd1.jpg', 'wbd2.jpg', 'wbd3.jpg', 'wbd4.jpg', 'wbd5.jpg', 'wbd6.jpg', 'wbd7.jpg', 'wbd8.jpg', 'domestic', '2024-03-20 01:48:37'),
(23, 'uttarakhand', 'uttarakhand', 'mountains', 'flight', 'all', 20000, 'traking and flaying in air', '8days', '2024-03-31', 'ut1.jpg', 'ut2.jpg', 'ut3.jpg', 'hotel', 'indi', 'nainital', 'mussorie', 'rishikesh', 'haridwar', 'jimcorbet', 'vally of flowers', 'auli', 'chopta', 'utd1.jpg', 'utd2.jpg', 'rishikesh.jpg', 'utd4.jpg', 'utd5.jpg', 'utd6.jpg', 'utd7.jpg', 'utd8.jpg', 'domestic', '2024-03-20 01:53:07'),
(24, 'rajashthan', 'rajasthan', 'desert', 'bus', 'all', 10000, 'royal rajasthan', '8 days', '2024-03-29', 'rj1.jpg', 'rj2.jpg', 'rj3.jpg', 'palace', 'india', 'jaipur', 'udaipur', 'jaisalmer', 'jodhpur', 'rishikesh', 'ranthambhor', 'bikaner', 'chittor', 'rjd1.jpg', 'rjd2.jpg', 'rjd3.jpg', 'rjd4.jpg', 'rjd5.jpg', 'rjd6.jpg', 'rjd7.jpg', 'rjd8.jpg', 'domestic', '2024-03-20 01:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `tourname` varchar(255) DEFAULT NULL,
  `h1` varchar(255) DEFAULT NULL,
  `h1img` varchar(255) DEFAULT NULL,
  `h1des` text DEFAULT NULL,
  `h2` varchar(255) DEFAULT NULL,
  `h2img` varchar(255) DEFAULT NULL,
  `h2des` text DEFAULT NULL,
  `h3` varchar(255) DEFAULT NULL,
  `h3img` varchar(255) DEFAULT NULL,
  `h3des` text DEFAULT NULL,
  `h4` varchar(255) DEFAULT NULL,
  `h4img` varchar(255) DEFAULT NULL,
  `h4des` text DEFAULT NULL,
  `h5` varchar(255) DEFAULT NULL,
  `h5img` varchar(255) DEFAULT NULL,
  `h5des` text DEFAULT NULL,
  `h6` varchar(255) DEFAULT NULL,
  `h6img` varchar(255) DEFAULT NULL,
  `h6des` text DEFAULT NULL,
  `h7` varchar(255) DEFAULT NULL,
  `h7img` varchar(255) DEFAULT NULL,
  `h7des` text DEFAULT NULL,
  `h8` varchar(255) DEFAULT NULL,
  `h8img` varchar(255) DEFAULT NULL,
  `h8des` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(99) NOT NULL,
  `un` varchar(99) NOT NULL,
  `message` varchar(199) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `un`, `message`, `date`) VALUES
(4, 'k7', 'amazing', '2024-03-07 14:06:19'),
(9, 's2512', 'great!', '2024-03-20 11:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `img` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `img`) VALUES
(1, 'gujrat', 'gujrat.jpg'),
(2, 'maharashtra', 'Maharashtra.jpg'),
(3, 'west bengal', 'bengal.jpg\"'),
(4, 'goa', 'goa.jpg'),
(5, 'himachal pradesh', 'himachal.jpg'),
(6, 'j&k', 'j&k.jpg'),
(7, 'kerala', 'kerala.jpg'),
(8, 'leh', 'leh.jpg'),
(9, 'manipur', 'manipur.jpg'),
(10, 'punjab', 'punjab.jpg'),
(11, 'rajasthan', 'rajasthan.jpg'),
(12, 'uttarakhand', 'uttarakhand.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(99) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `un` varchar(99) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `pass` varchar(99) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `un`, `phone`, `pass`, `date`) VALUES
(1, 'VINZUDA KISHAN BALUBHAI', 'kishanvinjuda21@gmail.com', 'k7', '7043567813', 'Kishan#167', '2004-07-16'),
(4, 'sheikh safwaan', 's@gmail.com', 's2512', '7894561230', 'Safwaan@2512', '2003-12-25'),
(5, 'saiyed anas', 'asaiyed196@gmail.com', 'anas2611', '9998124706', 'Saiyed@2611', '1998-11-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global`
--
ALTER TABLE `global`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hollydays`
--
ALTER TABLE `hollydays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `global`
--
ALTER TABLE `global`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hollydays`
--
ALTER TABLE `hollydays`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
