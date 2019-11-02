-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2019 at 08:51 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_us_id` int(11) NOT NULL,
  `about_us_title` varchar(225) NOT NULL,
  `content` text NOT NULL,
  `post_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `admission_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `contents` text NOT NULL,
  `form` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `cat_image` varchar(255) NOT NULL DEFAULT 'no_category.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(16, 'All', 'no_category.png');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_reply` text NOT NULL,
  `comment_reply_date` varchar(50) NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_image` varchar(225) NOT NULL,
  `gallery_date` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `msg_id` int(10) NOT NULL,
  `msg_status` varchar(10) NOT NULL DEFAULT 'Panding',
  `msg_date` varchar(50) NOT NULL,
  `msg_author` varchar(60) NOT NULL,
  `msg_subject` varchar(70) NOT NULL,
  `author_email` varchar(70) NOT NULL,
  `msg_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`msg_id`, `msg_status`, `msg_date`, `msg_author`, `msg_subject`, `author_email`, `msg_content`) VALUES
(12, 'replied', '2017-08-24 08:31:11 AM', 'Rafiq', 'Rafi', 'rafiq@email.co', 'Print this page to PDF for the complete set of vectors. Or to use on the desktop, install FontAwesome.otf, set it as the font in your application, and copy and paste the icons (not the unicode) directly from this page into your designs.');

-- --------------------------------------------------------

--
-- Table structure for table `main_contents`
--

CREATE TABLE `main_contents` (
  `main_content_id` int(11) NOT NULL,
  `main_contents` text NOT NULL,
  `side_contents` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`id`, `username`, `session`, `time`) VALUES
(0, '', 'ta7e2k60tv5o06odjo2c0142qe', 1571939532),
(1, '', 'pu5la8p20c0m0cefvnnk9dlgu6', 1503423201),
(2, '', '', 1504878405),
(3, '', '74m6tj8hmui9j0sdn9m7aqjce4', 1503477539),
(4, '', 'fn5abics06f6pp0hb7sdfc34r7', 1503475940),
(5, '', 'k9i11tsbs8tc58tjtaj9i2fpc5', 1503509476),
(6, '', 'duscf4ll8sj773rh1f37vcam90', 1503509208),
(7, '', 'u7hqp18knsu056bs994kldsr62', 1503581499),
(8, '', 'spmtk1devqlqqpj93rqih6b655', 1503678996),
(9, '', '', 1504878405),
(10, '', '7v1blhsnpk40pgbn97cunl6l53', 1503725567),
(11, '', 'm9jfmiaoa3cuq67348sg5vfvr6', 1503758499),
(12, '', 'bqvl9kpsjr696p888i81jv3d96', 1503832289),
(13, '', '6smlfhe57j4m50gsmsh4gni6k5', 1503905293),
(14, '', '5dfvr6bpl8atjnkndtnmobi0c3', 1504156749),
(15, '', 'dtf9d971jeudhjmtcl3lhs6l51', 1504627812),
(16, '', 'h078581o3fk4boco86i4ha1655', 1504676248),
(17, '', 'ngdj6g2e1gvgmu2spkqt3a3p36', 1504716903),
(18, '', 'bt8jum6e6m5bl7fd7bfug4ips6', 1504778672),
(19, '', 'uclburp038a231eaonvb4lnmq3', 1504883547),
(20, '', 'gilpgbvbb1nb30jsuerkstt6f7', 1504924591),
(21, '', 'hu2vktjmthusj5hli1lr5pvrg0', 1504888954),
(22, '', 'mhp0blga4f4lghrv5vu0qkaml6', 1504923642),
(23, '', 'cnpu3blpkmadervdqj8vbmq2k2', 1504976921),
(24, '', '5mt9l1uuq4o1srdndik9nr5nb2', 1505022792),
(25, '', 'ni9i2qq231p7lm2bcvls3aem13', 1505136190),
(26, '', 'vl7m3gv2504lljtdstqr4fun97', 1505138072),
(27, '', 'r1kf8av986qtrvcg4uvtdfadr1', 1505144415),
(28, '', 'mgmpgu3f025j382hs0qv5ui563', 1505298312),
(29, '', 'mbn27hf7ikogg6kii7m83dp8r3', 1505301676),
(30, '', '73qvi64ao5f565o6cvc59k3jf7', 1505301106),
(31, '', 'hel281g3mjas9b62enjhv1pijp', 1571958163),
(32, '', '0irp3pee0cp0in8elkv3n3tcr4', 1572419274),
(33, '', 'srr4hr4n6fe3qnnpp9prb3ns2t', 1572723218);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(55) NOT NULL,
  `post_date` varchar(70) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` text NOT NULL,
  `post_comment_count` int(3) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(3) NOT NULL,
  `css` varchar(30) NOT NULL,
  `admin_access` varchar(30) NOT NULL,
  `site_status` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `admin_id` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `ins` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `css`, `admin_access`, `site_status`, `url`, `admin_id`, `email`, `address`, `phone`, `fb`, `tw`, `ins`) VALUES
(1, '', 'yes', 'published', '', 44, 'innexsystem1@gmail.com', 'School Address', '+2347064314883', 'http://www.facebook.com', 'http://www.twiter.com', 'http://www.instagram.com');

-- --------------------------------------------------------

--
-- Table structure for table `side_contents`
--

CREATE TABLE `side_contents` (
  `side_id` int(11) NOT NULL,
  `contents` text NOT NULL,
  `bgcolor` varchar(255) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `author` varchar(25) NOT NULL,
  `post_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_date` varchar(225) NOT NULL,
  `slider_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_sex` varchar(10) NOT NULL,
  `user_birthday` date NOT NULL,
  `user_city` varchar(30) NOT NULL,
  `user_country` varchar(30) NOT NULL,
  `user_bio` text NOT NULL,
  `user_number` varchar(12) NOT NULL,
  `user_twitter` varchar(30) NOT NULL,
  `user_medium` varchar(30) NOT NULL,
  `user_instagram` varchar(30) NOT NULL,
  `user_site` varchar(30) NOT NULL,
  `user_lastlogin` varchar(50) NOT NULL,
  `user_reg` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `user_facebook` text NOT NULL,
  `user_likes` int(10) NOT NULL DEFAULT '0',
  `user_interests` varchar(200) NOT NULL,
  `user_status` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_sex`, `user_birthday`, `user_city`, `user_country`, `user_bio`, `user_number`, `user_twitter`, `user_medium`, `user_instagram`, `user_site`, `user_lastlogin`, `user_reg`, `user_email`, `user_password`, `user_image`, `user_role`, `user_facebook`, `user_likes`, `user_interests`, `user_status`) VALUES
(44, 'admin123', 'Abednego', 'T', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '2019-10-24 11:49:19 PM', 'innexsystem1@gmail.com', '$2y$10$ZBawKlSFDgeIPqHUAZnAjO9tAMSApOfJcXhWS4oZ0H/0YiFBFIwuq', '', 'admin', '', 0, '', ''),
(45, 'innex', 'innex', 'innex', 'Male', '0000-00-00', '', '', '', '', '', '', '', '', '', '2019-10-30 12:42:33 PM', 'innexsystem2@gmail.com', '$2y$10$qt3XAypl/ySyU0Uy/XgNTOKQXtAex/BE4mxSAz5jXB.FBz9Ae652e', 'food1.jpg', 'subscriber', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_inbox`
--

CREATE TABLE `user_inbox` (
  `msg_id` int(2) NOT NULL,
  `msg_sender_id` int(3) NOT NULL,
  `msg_sender` varchar(60) NOT NULL,
  `msg_author_id` int(3) NOT NULL,
  `msg_author` varchar(60) NOT NULL,
  `msg_subject` varchar(70) NOT NULL,
  `msg_content` text NOT NULL,
  `msg_date` varchar(50) NOT NULL,
  `msg_reply` text NOT NULL,
  `msg_reply_status` varchar(10) NOT NULL DEFAULT 'Unreplied',
  `msg_reply_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_inbox`
--

INSERT INTO `user_inbox` (`msg_id`, `msg_sender_id`, `msg_sender`, `msg_author_id`, `msg_author`, `msg_subject`, `msg_content`, `msg_date`, `msg_reply`, `msg_reply_status`, `msg_reply_date`) VALUES
(11, 32, 'asliabir', 1, 'admin', 'maKI', 'afldkjdslkddslfjds', 'Sat, September 09, 2017 - 01:05:42 AM', 'ok', 'Replied', 'Sat, September 09, 2017 - 08:07:54 AM'),
(12, 1, 'admin', 32, 'asliabir', 'maKI', 'afldkjdslkddslfjds', 'Sat, September 09, 2017 - 01:05:42 AM', '.mvcx,mz.mxc,.zmv.cz,mcv', 'Replied', 'Sat, September 09, 2017 - 08:04:26 AM'),
(13, 32, 'asliabir', 1, 'admin', 'maKI', 'jfdlldajdlfkjdsaklsdjflkadjf', 'Sat, September 09, 2017 - 08:04:11 AM', 'ok', 'Replied', 'Sat, September 09, 2017 - 08:07:50 AM'),
(14, 32, 'asliabir', 1, 'admin', 'maKI', '.mvcx,mz.mxc,.zmv.cz,mcv', 'Sat, September 09, 2017 - 08:04:26 AM', 'ok', 'Replied', 'Sat, September 09, 2017 - 08:07:45 AM'),
(15, 1, 'admin', 32, 'asliabir', 'maKI', 'ok', 'Sat, September 09, 2017 - 08:07:45 AM', '', 'Unreplied', ''),
(16, 1, 'admin', 32, 'asliabir', 'maKI', 'ok', 'Sat, September 09, 2017 - 08:07:50 AM', '', 'Unreplied', ''),
(17, 1, 'admin', 32, 'asliabir', 'maKI', 'ok', 'Sat, September 09, 2017 - 08:07:54 AM', '', 'Unreplied', ''),
(18, 0, '', 0, '', '', '', '', '', 'Unreplied', ''),
(19, 32, 'asliabir', 1, 'admin', 'Hay boss', 'fdajdklajfdjdslkfjdsklfjdsfkjsdfkldaf', 'Sat, September 09, 2017 - 10:34:43 PM', 'bjhjjgh', 'Replied', 'Sun, September 10, 2017 - 11:50:35 AM'),
(20, 1, 'admin', 32, 'asliabir', 'You are cool', 'Hay dude, you are cool............. love ya', 'Sat, September 09, 2017 - 10:36:00 PM', '', 'Unreplied', ''),
(21, 1, 'admin', 32, 'asliabir', 'Hay boss', 'hgdhgghg', 'Sun, September 10, 2017 - 11:36:32 AM', '', 'Unreplied', ''),
(22, 1, 'admin', 32, 'asliabir', 'Hay boss', 'bvcbvbv', 'Sun, September 10, 2017 - 11:48:13 AM', '', 'Unreplied', ''),
(23, 1, 'admin', 32, 'asliabir', 'Hay boss', 'vcbxbvcbvcbx', 'Sun, September 10, 2017 - 11:49:25 AM', '', 'Unreplied', ''),
(24, 1, 'admin', 32, 'asliabir', 'Hay boss', 'bjhjjgh', 'Sun, September 10, 2017 - 11:50:35 AM', '', 'Unreplied', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`admission_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `main_contents`
--
ALTER TABLE `main_contents`
  ADD PRIMARY KEY (`main_content_id`);

--
-- Indexes for table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_contents`
--
ALTER TABLE `side_contents`
  ADD PRIMARY KEY (`side_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_inbox`
--
ALTER TABLE `user_inbox`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `admission_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `main_contents`
--
ALTER TABLE `main_contents`
  MODIFY `main_content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `side_contents`
--
ALTER TABLE `side_contents`
  MODIFY `side_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_inbox`
--
ALTER TABLE `user_inbox`
  MODIFY `msg_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
