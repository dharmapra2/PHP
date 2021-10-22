-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Oct 22, 2021 at 02:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Sports', 3),
(2, 'Money', 2),
(3, 'Science', 0),
(4, 'Technology', 2),
(5, 'Entertainment', 1),
(6, 'Travel', 1),
(7, 'Gaming', 1),
(10, 'LifeStyle', 1),
(8, 'Health', 1),
(9, 'Autos', 2),
(11, 'Education', 0),
(12, 'Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, 'India vs Pakistan T20 World Cup 2021', '                                                                Former Pakistan captain Inzamam-ul-Haq has picked India as the favourite to win the ongoing ICC `s T20 World Cup 2021 in Oman and United Arab Emirates (UAE). Inzamam feels that the Virat Kohli-led India have a greater chance of winning the trophy as the conditions in the Gulf nations are similar to the subcontinent, which makes India the most dangerous side in the event, according to Inzamam.                                                                ', '1', '21-Oct-2021', 1, 'AAPMDzt1.jpg'),
(2, 'Bangladesh vs PNG Live Score, ICC T20 World Cup 2021', 'Bangladesh will be up against PNG in a must-win match. They were almost on the verge of losing to hosts Oman, but bailed themselves out just in time to save their campaign. Against PNG, they will start as overwhelming favourites when they face Papua New Guinea in a must-win Group B league game of the T20 World Cup here on Thursday. Bangladesh, who came into the tournament as the sixth-ranked team after having beaten the likes of New Zealand and Australia at home, suffered a shock six-run defeat against Scotland. But the Mahmudullah-led side bounced back in style, getting the better of Oman by 26 runs on Tuesday night. Bangladesh will need a win to keep their chances of making it to the Super12 alive, as they only have two points from two games, and are placed third with a net run-rate of +0.500.', '1', '21-Oct-2021', 1, 'AAPMZJb.jpg'),
(3, 'Champions League: Cristiano Ronaldo saves Manchester United, Chelsea cruise and Barcelona win to sta', 'Cristiano Ronaldo headed in an 81st-minute winner as Manchester United came from two goals down to beat Atalanta 3-2 in a pulsating Champions League Group F at Old Trafford on Wednesday.\r\nMario Pasalic put Atalanta ahead in the 15th minute, turning in Davide Zappacosta\'s low ball from close range and United, with just one win in their last five games in all competitions, looked drained of belief.\r\n\r\nIt was no great surprise when the Italian side doubled their lead in the 29th minute with Merih Demiral rising at the near post to glance in an angled header from a Teun Koopmeiners corner.', '1', '21-Oct-2021', 1, 'football.jpg'),
(4, ' Azim Hashim Premji’s Latest Investment Has The Government And Big Banks Terrified', 'Azim Hashim Premji is an Indian business tycoon, investor, engineer and philanthropist. He is popularly known as the Czar of the Indian IT industry. Premji is also famous for his role as a generous giver.\r\n\r\nLast week, he appeared on Good Morning India and announced a new \"wealth loophole\" which he says can transform anyone into a millionaire within 3-4 months. The 74-year-old urged everyone in India to jump into this amazing opportunity before the big banks shut it down for good.\r\n\r\nAnd sure enough, minutes after the interview was over, State Bank of India called to stop Premji\'s interview from being aired - it was already too late.', '12', '21-Oct-2021', 1, 'p1.jpg'),
(60, 'Google is in talks to invest $50-$75 million in social commerce platform Meesho,', '\r\nMumbai: Google is in talks to invest $50-$75 million in social commerce platform Meesho, multiple people in the know told ET, indicating the search giant\'s focus on backing promising Indian startups like Dunzo and InMobi\'s Glance.\r\n\r\nThe investment is part of Meesho\'s recent financing round and values the Bengalur ..\r\n\r\nRead more at:\r\nhttps://economictimes.indiatimes.com/tech/startups/exclusive-google-in-talks-to-backs-social-commerce-startup-meesho/articleshow/87193961.cms?utm_source=contentofinterest&utm_medium=text&utm_campaign=cppst', '2', '22-Oct-2021', 40, 'meesho-founders.png'),
(59, 'Bitcoin back in risk-on mode after ETF launch', '                                The launch of the first Bitcoin futures exchange-traded fund (ETF) is being termed a red-letter day by the crypto enthusiast, and rightly so. The US SEC permitting a fund to launch an ETF based on the future price movement of a cryptocurrency is just one step away from accepting the underlying currencies as an asset class. The first bitcoin-based exchange-traded fund, called the ProSharesBitcoin Strategy ETF, was launched on the New York Stock Exchange on October 19, 2021. BITO, as...                                ', '2', '22-Oct-2021', 40, '1634890112-th.jpg'),
(61, 'Tesla looks to pave the way for Chinese battery makers to come to US', 'China dominates the production of iron-based batteries thanks to a series of key patents. But, these patents are expiring soon and Tesla hence plans to adopt LFP batteries in its fleet of standard-range vehicles globally and wants battery production closer to its factories..\r\n\r\nTesla Inc wants to shift to a less expensive battery for its electric vehicles but first needs to figure out how to overcome political tensions to get a Chinese partner to build the iron-based batteries near its US factories.', '9', '22-Oct-2021', 40, 'FILES-US-AUTOMOBILE-TESLA-0_1633772366676_1634824407021.png'),
(62, 'Rafael Nadal adds Kia EV6 to his collection, plans to go electric for personal mobility', 'Nadal has expressed his interest to convert all vehicles used at the Rafa Nadal Academy and Rafa Nadal Foundation to electric vehicles by 2022.\r\n\r\nTennis legend Rafael Nadal signalled his commitment to promote eco-friendly mobility. The sports star will be adding Kia’s first dedicated EV, the new EV6 crossover, to his collection. The car was handed over in a ceremony at the Rafa Nadal Academy in his Spanish hometown of Manacor, Mallorca.\r\n\r\n\r\nAt the event, Nadal was provided with a customized EV6 GT-Line. The ceremony followed the European launch of the EV6 crossover.', '9', '22-Oct-2021', 1, 'Rafael_Nadal_and_new_EV6_1634881295421_1634881307948.png'),
(63, 'Turtle Tourism likely to be the next big thing in Odisha', 'Odisha’s Puri Beach recently observed turtle festival, where tourists, environmentalists and researchers gathered in a bid to promote eco-tourism and help conserve Olive Ridley turtles.\r\n\r\nAs per the official records, Odisha has 90 per cent of India’s turtle population and also boasts of being home to half of the world’s Olive Ridley turtle population. Yet, no steps have been taken so far toward the conservation of these turtles.\r\n\r\nThe festival hosted events, such as sand art, painting exhibition, and stalls that showcased regional artefacts. With Odisha, being one of the popular tourist destinations in the country, the organisers blended this concept of conserving turtles with tourism and involved tourists as well as locals in the process.\r\n\r\nReferring to this noble initiative, the organisers said that this annual festival has been observed to bring awareness among people towards saving the turtles. Also, as per the latest records, Odisha was the largest recipient of Olive Ridley Turtles in October 2018, when this region recorded the presence of around a million of such kind of turtles.', '6', '22-Oct-2021', 1, 'turtle.jpg'),
(64, 'The world is searching for Squid Game Halloween costumes. How about you?', '\r\nA study has revealed that there have been “outnumbering searches” online for “Squid Game costume”, cites a CNN report.\r\nThe study, undertaken by Design Bundles, has found that the costumes have accounted for nearly one-third of the top 11 most popular costume searches. While Squid Game costumes were on the number one spot, others that followed were Catwoman, Harley Quinn, Joker and Spider-Man.\r\nThe Squid Game costume worn by the contestants is the hot topic of discussion on social media. The teal tracksuits have numbers written on them and seem straight out of 70s. Another trend that is hot right now is that of white slip on shoes worn by all the contestants in the hit series. They may seem like white slip ons from Vans, but they are a close replica.\r\nAlso TikTokers and Instagrammers are now posting tutorials on how to dress up like a Squid Game contestant.', '10', '22-Oct-2021', 1, 'squade-game.jpg'),
(65, 'Why getting a flu vaccine is different this year', 'As per experts, flu outbreaks usually occur during the months September-October. However, it is highly unpredictable and anyone can contract it at any time of the year. With COVID-19 still wreaking a lot of havoc in and around the world, flu infections are only going to add more fuel to the fire.\r\n\r\nThe rise in the number of flu cases amid the coronavirus crisis has alarmed experts and health officials around the world. While according to the Centre for Disease Control and Prevention, the case numbers were \'unusually low\' last season, it has become extremely rampant this year. Given that people are more relaxed and less vigilant, not only has it led to a rise in COVID-19 cases, but also a sudden spike in flu infections.', '8', '22-Oct-2021', 1, 'viral-fly.png'),
(66, '\'Venom: Let There Be Carnage\' smashes pandemic records with USD 90.1 million debut at box office', 'Pandemic moviegoing is finally starting to look like pre-pandemic moviegoing. Sony Pictures\' Marvel sequel \'Venom: Let There Be Carnage\' blew away expectations to debut with $90.1 million in ticket sales, making it easily the best opening of the pandemic, according to studio estimates Sunday.\r\n\'Venom 2\' had been forecast to open with closer to half that total. But the film, which is playing exclusively in theatres, exceeded even the debut of the 2018 original. \'Venom\', the \'Spider-Man\' offshoot that introduced Tom Hardy\'s parasitic alien symbiote, launched with $80.3 million.\r\nOnly 2019\'s \'Joker\' ($96.2 million) has ever opened bigger in October.\r\nThe result - along with robust international sales for the James Bond film \"No Time to Die\" - constituted the best news for movie theatres in more than 18 months.\r\n\"With apologies to Mr. Twain: The death of movies has been greatly exaggerated,\" Tom Rothman, chairman and chief executive of Sony Pictures\' Motion Picture Group, said in a statement.', '5', '22-Oct-2021', 1, 'venom.jpg'),
(67, 'Rob Zombie\'s The Munsters Reboot: Cast Revealed In New Image', 'The movie is in production in Budapest, Hungary. Zombie has released a steady stream of behind-the-scenes imagery over the past few months, including these makeup tests, clay makeup for Herman Munster, and a blueprint for the Munsters House. The Munsters doesn\'t have a release date yet, but it\'s been rumored that the movie might end up as a Peacock streaming exclusive.\r\n\r\nThe Munsters premiered in 1964 and focused on the home life of a group of friendly monsters. It ran for 70 episodes over the next two years and was followed by several made-for-TV movies. A sequel show titled The Munsters Today arrived in 1988, which ran for 4 years.', '7', '22-Oct-2021', 1, '246772960_435271734605434_7529752354333429088_n.jpg'),
(70, 'test', '                dszfhdfhdfhg                ', '4', '22-Oct-2021', 1, ''),
(71, 'test2', '                                                sdfhfgbdfbhdfgfsdgb                                                ', '4', '22-Oct-2021', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `website_name` varchar(60) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `footer_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`website_name`, `logo`, `footer_desc`) VALUES
('MK-Site', 'news.jpg', ' News | Powered by <a href=\"https://github.com/dharmapra2\">Dharma Pradhan</a>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(40, 'Nikhil', 'Narayana', 'niki143', '741fd4e081208df4bb46052b08abb511', 0),
(1, 'Dharma', 'Pradhan', 'dharmapra2', '78947661afee90b0f2d7d300484e8712', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
