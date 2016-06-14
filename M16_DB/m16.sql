-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2016 at 04:39 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m16`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fontfamily` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fontsize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `page`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '*', 'gabrielcaesario@gmail.com', 'admin', '2016-03-13 17:00:00', '2016-03-13 17:00:00'),
(2, 'subhaus_admin', 's', 'subhaus@test.com', 'admin', '2016-03-07 05:10:20', '2016-03-07 05:10:20'),
(3, 'Prof. Jayden Kshlerin', 'l', 'Sauer.Antonetta@yahoo.com', 'admin', '2016-03-07 05:10:20', '2016-03-07 05:10:20'),
(4, 'Ms. Ettie Graham PhD', 'l', 'Aida81@Mills.net', 'admin', '2016-03-07 05:10:20', '2016-03-07 05:10:20'),
(5, 'gerryger', '*', 'gerry@ganteng.com', 'asdasd', '2016-03-07 05:10:20', '2016-03-07 05:19:22'),
(6, 'Mr. Scot Bechtelar', 'l', 'Javonte19@hotmail.com', 'admin', '2016-03-07 05:10:20', '2016-03-07 05:10:20'),
(7, 'flux_admin', 'f', 'flux@test.com', 'admin', '2016-03-31 17:00:00', '2016-03-31 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ev_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ev_page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ev_start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ev_end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ev_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `ev_name`, `ev_page`, `ev_start`, `ev_end`, `ev_desc`, `created_at`, `updated_at`) VALUES
(1, 'Rickey Bogisich', 'l', '2005-11-13', '1991-12-13', 'Laborum soluta cumque et debitis quisquam accusamus. Aliquam ea quis ab vel dolores recusandae distinctio qui.', '2016-03-07 05:13:55', '2016-03-07 05:13:55'),
(2, 'Jennifer Fritsch', 'l', '2011-01-28', '1971-08-10', 'Porro ut architecto animi animi asperiores reprehenderit esse. Nulla sint aliquid dolorum saepe enim.', '2016-03-07 05:13:55', '2016-03-07 05:13:55'),
(3, 'Kailyn Jones', 'l', '1980-08-18', '2008-09-28', 'Quae a cupiditate quia qui possimus voluptatem. Voluptatem velit corporis quibusdam aliquam minus. Quis dolorem totam consequatur veniam eos et quis doloribus. Error voluptatibus omnis facilis dolorem.', '2016-03-07 05:13:55', '2016-03-07 05:13:55'),
(5, 'Liza Stehr', 'l', '1989-03-20', '1986-03-11', 'Veritatis nesciunt soluta totam ad id ut. Qui voluptates distinctio architecto nesciunt. Repellendus quia corrupti quia quis ex ipsa aliquam. Nostrum laborum commodi ut qui ducimus. Laboriosam quibusdam in ipsum debitis eaque.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(6, 'Pat Kihn II', 'l', '1990-05-16', '1996-04-30', 'Unde aut cumque et qui sed laborum. Dolor recusandae est fugit qui enim velit nobis et. Corrupti enim excepturi error nulla. Alias est voluptas asperiores eligendi deleniti.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(8, 'Stephania Harris', 'l', '1992-10-07', '1976-05-25', 'Dolorem qui est consequatur provident. Repellat nostrum rerum et in nemo.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(9, 'Mariela Lehner', 'l', '1998-12-23', '1977-05-24', 'Dolores non ut quis consequatur nemo id architecto. At a voluptatem natus a fuga. Voluptas qui vel voluptate exercitationem possimus corrupti. Consequuntur aut vel quam dolore qui.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(10, 'Dr. Rodrick Langosh DDS', 'l', '1980-03-28', '1976-07-08', 'Quia provident eaque deleniti non. Modi aut labore id. Nostrum ratione deserunt eaque vero cumque est dolor.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(11, 'Helen Blick Sr.', 'l', '2009-06-10', '2013-01-13', 'Ducimus quae velit saepe quia. Blanditiis velit autem porro labore. Fuga minima nihil earum quaerat. Dolorem magnam nam omnis labore.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(12, 'Dr. Myrtice Streich', 'l', '1992-05-04', '1973-09-17', 'Enim sit dicta aut id. Eos adipisci nemo voluptas esse blanditiis quas similique. Corporis iste nisi quia quibusdam ducimus sequi. Ipsa est unde eum odit aut odio repellat.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(13, 'Morton Bins', 'l', '2010-04-14', '1996-12-21', 'Neque deserunt impedit labore velit vel. Nihil molestias eum accusantium distinctio aspernatur repudiandae. Quia sed rerum similique magnam. Ex sit veritatis beatae aliquid aliquam enim omnis quam. Aut totam iste ullam repellat incidunt eum dolores.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(14, 'Xzavier Corkery', 'l', '1995-10-30', '1979-03-30', 'Et assumenda amet qui. Voluptatum ducimus eligendi consequatur qui assumenda sunt. Modi quibusdam voluptatibus ea. Blanditiis blanditiis aut accusamus praesentium.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(16, 'Pauline Welch', 'l', '2003-01-08', '2008-09-20', 'Suscipit officiis quis possimus. Minus ut in omnis culpa nihil quia quam laboriosam. Aliquid dignissimos vero in voluptatem illo libero dignissimos. Iusto ducimus aut id consequatur. Quia vitae impedit et repellendus mollitia.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(17, 'Ryleigh McKenzie', 'l', '2002-11-12', '2000-04-05', 'Non nam ratione itaque ratione doloribus deleniti sed. Sit eos voluptas assumenda quasi tempore ratione. Omnis pariatur doloremque fugit accusantium consectetur eveniet earum.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(18, 'Sylvester Robel', 'l', '2009-12-02', '1972-10-30', 'Repudiandae sunt expedita et eum est consectetur magnam quo. Minima vel aspernatur molestiae placeat dolores. Esse ut aut non harum.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(19, 'Maximillia Cartwright Sr.', 'l', '1980-02-13', '2011-06-15', 'Molestiae repellendus aut ut debitis ad. Recusandae quas repudiandae dignissimos suscipit illum. Sapiente eveniet at reiciendis ut.', '2016-03-07 05:13:56', '2016-03-07 05:13:56'),
(20, 'Keeley Schuppe', 'l', '1993-12-22', '2004-10-09', 'Quisquam voluptatum modi commodi ut. Sint quas reprehenderit harum aut. Labore illo assumenda esse ea ut ipsa non.', '2016-03-07 05:13:56', '2016-03-07 05:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `f_blogs`
--

CREATE TABLE IF NOT EXISTS `f_blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `f_blogs`
--

INSERT INTO `f_blogs` (`id`, `title`, `description`, `image`, `date`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'Tes Blog', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nis</p>', 'f_blog_2016040514.jpg', '2016/04/05', 'flux_admin', '2016-04-05 01:05:48', '2016-04-05 01:05:48'),
(6, 'asdasdasdadasd', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi u</p>', 'f_blog_20160405145.jpeg', '2016/04/05', 'flux_admin', '2016-04-05 04:45:47', '2016-04-05 04:45:47'),
(10, 'A Closer Look At The 326 Power Toyota 86.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicin...Lorem ipsum dolor sit amet, consectetur adipisicin...Lorem ipsum dolor sit amet, consectetur adipisicin...</p>', 'f_blog_20160406145.jpg', '2016/04/06', 'flux_admin', '2016-04-06 01:31:10', '2016-04-06 01:31:10'),
(11, 'Bilsport Performance Custom Car Show 2016 // Photo Coverage.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicin...Lorem ipsum dolor sit amet, consectetur adipisicin...Lorem ipsum dolor sit amet, consectetur adipisicin... L<strong>orem ipsum dolor sit amet, consectetur adipisicin...Lorem ipsum dolor sit amet, con', 'f_blog_20160407146.jpg', '2016/04/07', 'flux_admin', '2016-04-06 21:13:25', '2016-04-06 21:13:25'),
(12, 'kdgfsdfsdfsdfsfsdf', '<p>sdfsdfsdfsfsdfsf<strong>sdfsdfsdfsd<em>sdfsdfsdfsf</em></strong></p>', 'f_blog_20160407146.jpg', '2016/04/07', 'flux_admin', '2016-04-07 02:31:15', '2016-04-07 02:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `f_eventpromo`
--

CREATE TABLE IF NOT EXISTS `f_eventpromo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `f_eventpromo`
--

INSERT INTO `f_eventpromo` (`id`, `name`, `start`, `end`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Tes Event 1', '04/12/2016 12:00 AM', '04/13/2016 12:00 AM', 'f_eventpromo_20160414146.jpg', 'asdasdasASFJAVSADASAD', '2016-04-12 00:50:48', '2016-04-14 01:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `f_products`
--

CREATE TABLE IF NOT EXISTS `f_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtubelink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `f_products`
--

INSERT INTO `f_products` (`id`, `name`, `image`, `youtubelink`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(7, 'Meguaiar''s', 'f_product_201604181460965624743.png', 'https://www.youtube.com/embed/v4XCdQS4S', 'asdadasdasdasda', 'flux_admin', '2016-04-14 20:01:07', '2016-04-18 00:47:04'),
(8, 'Chemical Guys', 'f_product_201604241461488339983.png', 'https://www.youtube.com/embed/v4XCdQS4S', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'flux_admin', '2016-04-14 20:01:27', '2016-04-24 01:59:00'),
(9, '3M', 'f_product_201604151460694567084.png', 'https://www.youtube.com/embed/Ev4XCdQS4Ss', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'flux_admin', '2016-04-14 20:02:20', '2016-04-14 21:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `f_services`
--

CREATE TABLE IF NOT EXISTS `f_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `price_S` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_M` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_L` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_XL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `f_services`
--

INSERT INTO `f_services` (`id`, `name`, `image`, `description`, `price_S`, `price_M`, `price_L`, `price_XL`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 'Car Wash', 'f_service_201604191461045906929.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra placerat tortor, non bibendum orci sollicitudin at. Cras non turpis in lacus porttitor gravida ut ut ipsum. Duis enim tortor, dapibus ac viverra nec, porttitor id erat. In vulputate, orci posuere mattis malesuada, nibh odio eleifend purus, eu luctus nulla nisl vulputate ligula. Maecenas posuere vulputate porta. Aenean suscipit sem a urna vestibulum ornare. Pellentesque eros turpis, tristique in consequat nec, sodales vitae neque. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque eu lorem porttitor, cursus turpis ornare, pellentesque tellus. Curabitur dapibus, mauris ac maximus commodo, libero orci pellentesque mauris, at porttitor velit diam tempor magna. Sed convallis felis nec arcu lacinia, non ultricies purus molestie. Aliquam varius lacus in arcu vulputate, sed fringilla ligula feugiat. Praesent consectetur, nulla ut venenatis lacinia, augue nulla hendrerit lectus, vel pulvinar nulla ex et ante. Sed eget diam nec velit faucibus aliquet. Duis ornare tempor quam vel cursus. Ut efficitur at sem quis vehicula.', '500000', '500000', '100000', '100000', 'flux_admin', '2016-04-18 20:56:57', '2016-04-18 23:05:06'),
(6, 'Car Wash + Wax', 'f_service_201604201461115839304.jpg', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc interdum orci a pellentesque tempus. Phasellus pharetra ipsum mattis mi viverra, auctor dictum ligula vulputate. Sed eu dapibus neque. Aenean a rhoncus ipsum. Nam ut diam elit. Sed dui mauris, consectetur at fermentum a, ornare at lorem. Phasellus a luctus sapien. Aliquam maximus elit in tempor commodo.\r\n\r\nProin consequat odio at nisi porttitor, non fringilla est tempus. Integer eget elit elementum, cursus neque vitae, congue enim. Nulla vulputate, purus in faucibus volutpat, odio nibh condimentum quam, et vulputate ligula elit vel lacus. Cras elementum gravida luctus. Cras a risus et purus vehicula pulvinar quis sed elit. Sed tempor vel orci aliquam finibus. Etiam in semper felis. Nunc sed pretium leo. Pellentesque sed leo ex. Vestibulum sed laoreet purus, a rhoncus quam. Ut laoreet quam in enim vehicula fringilla. ', '80000', '90000', '100000', '200000', 'flux_admin', '2016-04-19 18:30:39', '2016-04-19 18:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `f_sliders`
--

CREATE TABLE IF NOT EXISTS `f_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `f_sliders`
--

INSERT INTO `f_sliders` (`id`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 'f_slider_201604221461313353875.jpg', 'flux_admin', '2016-04-22 01:22:33', '2016-04-22 01:22:33'),
(7, 'f_slider_201604221461313427755.jpg', 'flux_admin', '2016-04-22 01:23:47', '2016-04-22 01:23:47'),
(8, 'f_slider_201604221461313457047.jpg', 'flux_admin', '2016-04-22 01:24:17', '2016-04-22 01:24:17'),
(9, 'f_slider_201604221461313521972.jpg', 'flux_admin', '2016-04-22 01:25:22', '2016-04-22 01:25:22'),
(10, 'f_slider_201604221461313561358.jpg', 'flux_admin', '2016-04-22 01:26:01', '2016-04-22 01:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `l_abouts`
--

CREATE TABLE IF NOT EXISTS `l_abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fontfamily` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fontsize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `l_abouts`
--

INSERT INTO `l_abouts` (`id`, `page`, `img`, `title`, `about`, `url`, `href`, `fontfamily`, `color`, `fontsize`, `instagram`, `created_at`, `updated_at`) VALUES
(2, 'l', '2016032314.jpg', 'M16 District', '<p>adgskdfgsdhfsghdfsfjsfsjdvfsdfsdfsdfsfsdfsdfsdfsfd</p>', 'www.google.com', 'landingpage', 'helvetica', '#0f0606', '', '', '2016-03-23 06:25:08', '2016-03-23 06:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `l_about_us`
--

CREATE TABLE IF NOT EXISTS `l_about_us` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `fontfamily` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fontsize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption_image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb_image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `l_about_us`
--

INSERT INTO `l_about_us` (`id`, `about`, `fontfamily`, `color`, `fontsize`, `instagram`, `image1`, `caption_image1`, `thumb_image1`, `image2`, `caption_image2`, `thumb_image2`, `image3`, `caption_image3`, `thumb_image3`, `image4`, `caption_image4`, `thumb_image4`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lorem elit, aliquet quis tempor a, eleifend eu erat. Cras condimentum mattis lectus, id bibendum dui. Donec sit amet euismod nibh. Morbi mattis ut est vel dictum. Fusce suscipit ut velit eget luctus. Nullam leo elit, mattis et tristique ac, pulvinar non massa. Sed accumsan sed ante sed dapibus. Donec at tellus in dolor fermentum finibus elementum sit amet orci. Curabitur imperdiet facilisis posuere. Vivamus malesuada tortor ut tellus tempus tincidunt. ', 'Raleway', '#ffffff', '14', 'asdasd', 'l_about1_201606101465543512137.jpg', 'asdasd', 'l_about1_thumb_201606101465543512137.jpg', 'l_about2_201606101465543512137.jpg', 'asdasd', 'l_about2_thumb_201606101465543512137.jpg', 'l_about3_201606101465543512137.jpg', 'asdasdasd', 'l_about3_thumb_201606101465543512137.jpg', 'l_about4_201606101465543512137.jpg', 'asdasdasdasd', 'l_about4_thumb_201606101465543512137.jpg', '2016-06-10 00:25:29', '2016-06-10 00:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_27_031154_Admin', 1),
('2016_02_27_031741_Admins', 2),
('2016_02_29_125255_Events', 2),
('2016_03_15_084934_Abouts', 3),
('2016_03_15_111739_Abouts', 4),
('2016_03_16_084947_Abouts', 5),
('2016_03_22_085959_Abouts2', 6),
('2016_04_05_034603_f_blogs', 7),
('2016_04_11_120631_create_fluxEventPromoTable', 8),
('2016_04_14_104821_create_products_table', 9),
('2016_04_18_080810_create_services_table', 10),
('2016_04_20_074825_create_sliders_table', 11),
('2016_04_22_101337_create_subhaus_slider_table', 12),
('2016_04_23_030337_create_s_aboutus_table', 13),
('2016_04_23_232244_create_s_pricing_table', 14),
('2016_05_09_034506_create_s_featured_dish', 15),
('2016_06_10_071358_create_about_us_table_for_landingpage', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s_abouts`
--

CREATE TABLE IF NOT EXISTS `s_abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `s_abouts`
--

INSERT INTO `s_abouts` (`id`, `about`, `image1`, `image2`, `image3`, `image4`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit leo, molestie gravida leo eget, placerat dignissim ante. Duis consectetur gravida elit, at malesuada lectus sollicitudin vitae. Vivamus scelerisque ipsum justo, ac malesuada erat auctor ve', 's_about1_201604231461455393313.JPG', 's_about2_201604231461455393313.JPG', 's_about3_201604231461455393313.JPG', 's_about4_201604231461455393313.JPG', 'subhaus_admin', '2016-04-23 10:36:58', '2016-04-23 16:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `s_featured_dish`
--

CREATE TABLE IF NOT EXISTS `s_featured_dish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `s_featured_dish`
--

INSERT INTO `s_featured_dish` (`id`, `category`, `heading1`, `heading2`, `description`, `image1`, `image2`, `image3`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'food1', 'Try Our Don''s Meatball Subs', 'Don''s Meatball Subs', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit leo, molestie gravida leo eget, placerat dignissim ante. Duis consectetur gravida elit, at malesuada lectus sollicitudin vitae. Vivamus scelerisque ipsum justo, ac malesuada erat auctor ve', 's_featured_food1_201605091462781351253.JPG', '', '', 'subhaus_admin', '2016-05-09 01:09:11', '2016-05-09 01:09:11'),
(5, 'drinks', 'Our Featured Drinks', 'Have a look to our Drinks!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit leo, molestie gravida leo eget, placerat dignissim ante. Duis consectetur gravida elit, at malesuada lectus sollicitudin vitae. Vivamus scelerisque ipsum justo, ac malesuada erat auctor ve', 's_featured_drinks_1_201605115732e1c3cac88.JPG', 's_featured_drinks_2_201605115732e1c3cac88.JPG', 's_featured_drinks_3_201605115732e1c3cac88.JPG', 'subhaus_admin', '2016-05-11 00:39:52', '2016-05-11 00:39:52'),
(6, 'food2', 'Ever tried our Burgerdelics ?', 'Burgerdelics', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed velit leo, molestie gravida leo eget, placerat dignissim ante. Duis consectetur gravida elit, at malesuada lectus sollicitudin vitae. Vivamus scelerisque ipsum justo, ac malesuada erat auctor ve', 's_featured_food2_1_201605115732e217afe0f.JPG', 's_featured_food2_2_201605115732e217afe0f.JPG', '', 'subhaus_admin', '2016-05-11 00:41:15', '2016-05-11 00:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `s_pricings`
--

CREATE TABLE IF NOT EXISTS `s_pricings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `s_pricings`
--

INSERT INTO `s_pricings` (`id`, `name`, `price`, `category`, `image`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Don''s Meatball Subs', '30', 'food', 's_pricing_201604281461848852632.JPG', 'subhaus_admin', '2016-04-28 03:27:10', '2016-04-28 06:07:34'),
(3, 'Sandwhich', '10', 'food', 's_pricing_201604281461848872492.JPG', 'subhaus_admin', '2016-04-28 05:21:27', '2016-04-28 06:07:52'),
(4, 'asdasd', '123', 'beverages', 's_pricing_201604281461848828062.JPG', 'subhaus_admin', '2016-04-28 05:39:23', '2016-04-28 06:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `s_sliders`
--

CREATE TABLE IF NOT EXISTS `s_sliders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `headingColor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `s_sliders`
--

INSERT INTO `s_sliders` (`id`, `image`, `image2`, `heading`, `headingColor`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 's_slider_201604231461378475653.JPG', 's_sliderthumb_201604231461378475653.png', '', '', 'subhaus_admin', '2016-04-22 18:51:51', '2016-04-22 19:27:56'),
(3, 's_slider_201604231461376648994.JPG', 's_sliderthumb_201604231461376648994.png', '', '', 'subhaus_admin', '2016-04-22 18:57:30', '2016-04-22 18:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
