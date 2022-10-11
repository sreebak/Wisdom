-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2020 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedblast`
--

-- --------------------------------------------------------

--
-- Table structure for table `blg_categories`
--

CREATE TABLE `blg_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blg_categories`
--

INSERT INTO `blg_categories` (`id`, `catg_name`, `url_slug`, `disp_order`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Speed Blast', 'seed-blast', 1, '', 1, '2020-08-05 01:22:25', '2020-12-04 05:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `blog_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_date` date DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metatags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `thump_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thump_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `catg_id`, `blog_title`, `blog_date`, `short_description`, `blog_content`, `keywords`, `metatags`, `url_slug`, `disp_order`, `thump_image`, `thump_alt`, `image1`, `image1_alt`, `image2`, `image2_alt`, `image3`, `image3_alt`, `image4`, `image4_alt`, `image5`, `image5_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Duis vitae tellus suscipit, imperdiet est sed, semper urna.', '2020-09-01', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'blog1', NULL, 'home1-news-img1.jpg', NULL, 'home1-slide1.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-09-08 06:49:52', '2020-12-04 06:32:47'),
(2, 1, 'B2 Duis vitae tellus suscipit, imperdiet est sed, semper urna.', '2020-09-01', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'blog2', NULL, 'home1-news-img2.jpg', NULL, 'home1-slide2.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-09-08 07:13:20', '2020-12-04 06:33:27'),
(3, 1, 'B3 Duis vitae tellus suscipit, imperdiet est sed, semper urna.', '2020-09-03', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa nt ium doloremque laudantium totam rem aperiam</p>', NULL, NULL, 'blog3', NULL, 'home1-news-img3.jpg', NULL, 'home1-slide3.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-09-08 07:15:11', '2020-12-04 06:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 01:57:06', '2020-10-14 01:57:06'),
(2, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'QQQ', '', 1, '2020-10-14 02:03:13', '2020-10-14 02:03:13'),
(3, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 02:17:11', '2020-10-14 02:17:11'),
(4, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'wwwww', '', 1, '2020-10-14 02:29:14', '2020-10-14 02:29:14'),
(5, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 02:31:06', '2020-10-14 02:31:06'),
(6, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 02:32:48', '2020-10-14 02:32:48'),
(7, 'Jayant Jose T', 'jayant@icomtechnologies.in', '+919605869037', 'sss', '', 1, '2020-10-14 02:33:44', '2020-10-14 02:33:44'),
(8, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 02:39:35', '2020-10-14 02:39:35'),
(9, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'www', '', 1, '2020-10-14 02:43:29', '2020-10-14 02:43:29'),
(10, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'ghfh', '', 1, '2020-10-14 02:43:45', '2020-10-14 02:43:45'),
(11, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'ghfh', '', 1, '2020-10-14 02:44:35', '2020-10-14 02:44:35'),
(12, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'ghfh', '', 1, '2020-10-14 02:44:58', '2020-10-14 02:44:58'),
(13, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'qq', '', 1, '2020-10-14 02:45:38', '2020-10-14 02:45:38'),
(14, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'qq', '', 1, '2020-10-14 02:46:54', '2020-10-14 02:46:54'),
(15, 'Jayant Jose', 'jayant.jose@gmail.com', '+914872309627', 'test', '', 1, '2020-12-07 00:48:50', '2020-12-07 00:48:50'),
(16, 'Jayant Jose T', 'jayant@icomtechnologies.in', 'jayant@icomtechnologies.in', 'aaa', '', 1, '2020-12-07 03:27:50', '2020-12-07 03:27:50'),
(17, 'Jayant Jose', 'jayant.jose@gmail.com', 'jayant.jose@gmail.com', 'aaa', '', 1, '2020-12-07 03:32:44', '2020-12-07 03:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE `gallerys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `thump_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thump_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gens`
--

CREATE TABLE `gens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `webtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metatags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gens`
--

INSERT INTO `gens` (`id`, `webtitle`, `description`, `metatags`, `google_analy`, `google_map`, `keywords`, `phone1`, `phone2`, `email1`, `email2`, `website`, `address`, `facebook`, `twitter`, `linkedin`, `youtube`, `google`, `created_at`, `updated_at`) VALUES
(1, 'Sandblasting Companies Dubai, Sandblasting Machine Suppliers UAE', 'Looking for sandblasting companies Dubai? We are the leading sandblasting machine suppliers in UAE for various surface preparation services.', '<META HTTP-EQUIV=\"Content-Language\" CONTENT=\"EN\">\r\n<META NAME=\"author\" CONTENT=\"Speed Blast Trading LLC, Dubai, UAE\">\r\n<META NAME=\"distribution\" CONTENT=\"Global\">\r\n<META NAME=\"revisit-after\" CONTENT=\"20 days\">\r\n<META NAME=\"robots\" CONTENT=\"FOLLOW,INDEX\">\r\n<META NAME=\"Googlebot\" CONTENT=\"Index, Follow\">\r\n<META name=\"YahooSeeker\" content=\"INDEX, FOLLOW\">\r\n<META NAME=\"msnbot\" CONTENT=\"INDEX, FOLLOW\">\r\n<meta name=\"publisher\" content=\"Speed Blast Trading LLC\">\r\n<meta name=\"copyright\" content=\"Speed Blast Trading LLC\">\r\n<meta name=\"language\" content=\"en-us\">\r\n<meta name=\"geo.region\" content=\"Dubai\">\r\n<meta name=\"geo.placename\" content=\"Dubai\">\r\n<meta name=\"country\" content=\"UAE\">\r\n<meta name=\"medium\" content=\"website\">\r\n<meta name=\"rating\" content=\"Safe For Kids\">', '<script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'https://www.google-analytics.com/analytics.js\',\'ga\');\r\n\r\n  ga(\'create\', \'UA-99101649-1\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n\r\n</script>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.692253226176!2d55.20511991432256!3d24.976583046746168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f6bfef6cb281f%3A0x3b6a19bb24c5541b!2sSpeed%20Blast%20Trading%20UAE!5e0!3m2!1sen!2sin!4v1606977834564!5m2!1sen!2sin\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', 'Aftercooler, Breathing Filter, Elcometer, Graco Airless Pump', '+971-4-3407255', '+971-4-3407254', 'info@speedblast.me', NULL, 'http://www.speedblast.me/', 'Speed Blast Trading L.L.C<br>\r\nDubai Investment Park -2 (DIP 2)<br>\r\nDubai, United Arab Emirates', '#', '#', '#', '#', '#', '2020-07-27 22:59:58', '2020-12-03 01:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `gly_categories`
--

CREATE TABLE `gly_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(431, '2014_10_12_000000_create_users_table', 1),
(432, '2014_10_12_100000_create_password_resets_table', 1),
(433, '2019_08_19_000000_create_failed_jobs_table', 1),
(434, '2020_06_18_054437_create_roles_table', 1),
(435, '2020_06_18_054604_create_role_user', 1),
(436, '2020_06_18_132621_create_foregin_keys_for_role_user_table', 1),
(437, '2020_06_26_074430_create_pdt_categories', 1),
(438, '2020_06_26_123325_create_pdt_sub_categories', 1),
(439, '2020_06_26_180106_create_products', 1),
(440, '2020_06_28_070102_create_ser_categories', 1),
(441, '2020_06_28_070954_create_ser_sub_categories', 1),
(442, '2020_06_28_072338_create_services', 1),
(443, '2020_06_29_101022_create_pjx_categories', 1),
(444, '2020_06_29_102136_create_projects', 1),
(445, '2020_06_29_144459_create_blg_categories', 1),
(446, '2020_06_29_150134_create_blogs', 1),
(447, '2020_06_29_180335_create_gly_categories', 1),
(448, '2020_06_29_181506_create_gallerys', 1),
(449, '2020_06_30_182059_create_gens', 1),
(450, '2020_07_13_060241_create_sliders', 1),
(451, '2020_07_27_130249_create_contacts', 1),
(452, '2020_08_11_082137_create_testimonials', 2),
(453, '2020_08_11_100424_create_privacypolicy', 3),
(454, '2020_08_11_103303_create_terms', 4),
(455, '2020_08_11_111021_create_faq', 5),
(531, '2014_10_12_000000_create_users_table', 1),
(532, '2014_10_12_100000_create_password_resets_table', 1),
(533, '2019_08_19_000000_create_failed_jobs_table', 1),
(534, '2020_06_18_054437_create_roles_table', 1),
(535, '2020_06_18_054604_create_role_user', 1),
(536, '2020_06_18_132621_create_foregin_keys_for_role_user_table', 1),
(537, '2020_06_26_074430_create_pdt_categories', 1),
(538, '2020_06_26_123325_create_pdt_sub_categories', 1),
(539, '2020_06_26_180106_create_products', 1),
(540, '2020_06_28_070102_create_ser_categories', 1),
(541, '2020_06_28_070954_create_ser_sub_categories', 1),
(542, '2020_06_28_072338_create_services', 1),
(543, '2020_06_29_101022_create_pjx_categories', 1),
(544, '2020_06_29_102136_create_projects', 1),
(545, '2020_06_29_144459_create_blg_categories', 1),
(546, '2020_06_29_150134_create_blogs', 1),
(547, '2020_06_29_180335_create_gly_categories', 1),
(548, '2020_06_29_181506_create_gallerys', 1),
(549, '2020_06_30_182059_create_gens', 1),
(550, '2020_07_13_060241_create_sliders', 1),
(551, '2020_07_27_130249_create_contacts', 1),
(552, '2020_08_11_082137_create_testimonials', 1),
(553, '2020_08_11_100424_create_privacypolicy', 1),
(554, '2020_08_11_103303_create_terms', 1),
(555, '2020_08_11_111021_create_faq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdt_categories`
--

CREATE TABLE `pdt_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdt_categories`
--

INSERT INTO `pdt_categories` (`id`, `catg_name`, `short_description`, `long_description`, `url_slug`, `disp_order`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eco', NULL, NULL, 'eco', 1, '', 1, '2020-12-05 01:09:08', '2020-12-05 01:09:08'),
(2, 'Manufacturing', NULL, NULL, 'manufacturing', 2, '', 1, '2020-12-05 01:09:33', '2020-12-05 01:09:33'),
(3, 'Industry', NULL, NULL, 'industry', 3, '', 1, '2020-12-05 01:09:57', '2020-12-05 01:09:57'),
(4, 'Oil', NULL, NULL, 'oil', 4, '', 1, '2020-12-05 01:10:17', '2020-12-05 01:10:17'),
(5, 'Gas', NULL, NULL, 'gas', 5, '', 1, '2020-12-05 01:10:35', '2020-12-05 01:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `pdt_sub_categories`
--

CREATE TABLE `pdt_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `sub_catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pjx_categories`
--

CREATE TABLE `pjx_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pjx_categories`
--

INSERT INTO `pjx_categories` (`id`, `catg_name`, `url_slug`, `disp_order`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eco', 'eco', 1, '', 1, '2020-09-07 22:45:39', '2020-12-04 02:06:05'),
(2, 'Manufacturing', 'manufacturing', 2, '', 1, '2020-09-07 22:46:03', '2020-12-04 02:06:24'),
(3, 'Industry', 'industry', 4, '', 1, '2020-09-07 22:46:15', '2020-12-04 02:06:39'),
(4, 'Oil', 'oil', 5, '', 1, '2020-09-07 22:46:26', '2020-12-04 02:06:51'),
(5, 'Gas', 'gas', 6, '', 1, '2020-09-07 22:46:41', '2020-12-04 02:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `privacypolicy`
--

CREATE TABLE `privacypolicy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacypolicy`
--

INSERT INTO `privacypolicy` (`id`, `policy`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `sub_catg_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_value` decimal(12,2) DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `thump_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thump_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catg_id`, `sub_catg_id`, `product_code`, `product_name`, `short_description`, `long_description`, `product_value`, `keywords`, `url_slug`, `disp_order`, `thump_image`, `image1`, `image2`, `image3`, `image4`, `image5`, `thump_alt`, `image1_alt`, `image2_alt`, `image3_alt`, `image4_alt`, `image5_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'p1', 'Petro Chemicals', NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'petro-chemicals', 1, 'home1-petrochemical-project1.jpg', 'home1-slide1.jpg', '', '', '', '', NULL, NULL, '', '', '', '', 1, '2020-12-05 01:12:00', '2020-12-05 01:15:17'),
(2, 2, 0, 'p2', 'Electronic Project', NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'electronic-project', 2, 'home1-electronic-project1.jpg', 'home1-slide2.jpg', '', '', '', '', NULL, NULL, '', '', '', '', 1, '2020-12-05 01:13:01', '2020-12-05 01:13:01'),
(3, 3, NULL, 'p3', 'Factory Farm', NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'factory-farm', 3, 'home1-farm-project1.jpg', 'home1-slide2.jpg', '', '', '', '', NULL, NULL, '', '', '', '', 1, '2020-12-05 01:14:06', '2020-12-05 01:15:26'),
(4, 5, 0, 'p4', 'Gas & Pipeline', NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'gas-pipeline', 4, 'home1-gaspipeline-project1.jpg', 'home1-slide3.jpg', '', '', '', '', NULL, NULL, '', '', '', '', 1, '2020-12-05 01:15:06', '2020-12-05 01:15:06'),
(5, 4, NULL, 'p5', 'Oil Plant Project', NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, 'oil-plant-project', 5, 'oil-project-image2.jpg', 'home1-slide2.jpg', '', '', '', '', NULL, NULL, '', '', '', '', 1, '2020-12-05 01:16:25', '2020-12-05 01:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `project_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_date1` date DEFAULT NULL,
  `project_date2` date DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_value` decimal(12,2) DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metatags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `thump_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thump_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `catg_id`, `project_code`, `project_name`, `project_type`, `client_name`, `location`, `project_date1`, `project_date2`, `short_description`, `long_description`, `project_value`, `keywords`, `metatags`, `url_slug`, `disp_order`, `thump_image`, `thump_alt`, `image1`, `image1_alt`, `image2`, `image2_alt`, `image3`, `image3_alt`, `image4`, `image4_alt`, `image5`, `image5_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'p1', 'Petro Chemicals', 'p1', 'c1', 'l1', NULL, NULL, NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'petro-chemicals', NULL, 'home1-petrochemical-project1.jpg', NULL, 'home1-slide3.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-12-04 02:04:50', '2020-12-04 04:56:25'),
(2, 2, 'p2', 'Electronic Project', 'p1', 'c1', 'l1', NULL, NULL, NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'electronic-project', 2, 'home1-electronic-project1.jpg', NULL, 'home1-slide2.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-12-04 04:02:50', '2020-12-04 04:56:46'),
(3, 3, 'p3', 'Factory Farm', 'p1', 'c1', 'l1', NULL, NULL, NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'factory-farm', 3, 'home1-farm-project1.jpg', NULL, 'home1-slide3.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-12-04 04:09:23', '2020-12-04 04:57:05'),
(4, 5, 'p4', 'Gas & Pipeline', 'p1', 'c1', 'l1', NULL, NULL, NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'gas_pipeline', 4, 'home1-gaspipeline-project1.jpg', NULL, 'home1-slide3.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-12-04 04:10:49', '2020-12-04 04:57:24'),
(5, 4, '05', 'Oil Plant Project', 'p1', 'c1', 'l1', NULL, NULL, NULL, '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'oil-plant-project', 6, 'oil-project-image2.jpg', NULL, 'home1-slide2.jpg', NULL, '', '', '', '', '', '', '', '', 1, '2020-12-04 04:12:19', '2020-12-04 04:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-07-27 22:59:58', '2020-07-27 22:59:58'),
(2, 'Author', '2020-07-27 22:59:58', '2020-07-27 22:59:58'),
(3, 'User', '2020-07-27 22:59:58', '2020-07-27 22:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `sub_catg_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_value` decimal(12,2) DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metatags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `thump_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thump_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image5_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `catg_id`, `sub_catg_id`, `service_code`, `service_name`, `short_description`, `long_description`, `service_value`, `keywords`, `metatags`, `url_slug`, `disp_order`, `thump_image`, `image1`, `image2`, `image3`, `image4`, `image5`, `thump_alt`, `image1_alt`, `image2_alt`, `image3_alt`, `image4_alt`, `image5_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 's1', 'Manufacturing', 'We offer a full service from a to z, <span>top quality  products</span> with spot on deadlines.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'manufacturing', 1, 'home2-manufacturing-img.jpg', 'manufacture-rght-img.jpg', NULL, '', '', '', 'service-manufactureicon', 'manufacture', NULL, '', '', '', 1, '2020-09-07 06:26:25', '2020-12-05 00:28:28'),
(2, 1, NULL, 's2', 'CNC Industry', '<span>Maintenance</span> of our products is critical for long lasting quality. Choose the right partner.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'cnc-industry', 2, 'home2-cncindustry-img.jpg', 'manufacture-rght-img.jpg', '', '', '', '', 'service-cncicon', NULL, '', '', '', '', 1, '2020-09-07 06:29:16', '2020-12-05 00:29:03'),
(3, 1, NULL, 's3', 'Chemical Industry', 'Our factories uphold the <span>top world standards,</span> responsible towards environment.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'chemical-industry', 3, 'home2-chemicalindustry-img.jpg', 'manufacture-rght-img.jpg', '', '', '', '', 'service-chemicalicon', NULL, '', '', '', '', 1, '2020-09-07 06:30:05', '2020-12-05 00:29:25'),
(4, 1, NULL, 's4', 'Energy Engineering', 'Our finished products go trough <span>rigorous testing</span> and are delivered on time.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'energy-engineering', 4, 'home2-energyengineering-img.jpg', 'manufacture-rght-img.jpg', '', '', '', '', 'service-energyicon', NULL, '', '', '', '', 1, '2020-09-07 06:31:19', '2020-12-05 00:29:57'),
(5, 1, NULL, 's5', 'Oil Industry', 'Our <span>own transport</span> gives us control over your delivery. We take pride in our delivery times.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'oil-industry', 5, 'home2-oilindustry-img.jpg', 'manufacture-rght-img.jpg', '', '', '', '', 'service-oilicon', NULL, '', '', '', '', 1, '2020-12-04 00:21:33', '2020-12-05 00:30:23'),
(6, 1, NULL, 's6', 'Material Engineering', '<span>Top of the line machinery,</span> highly educated employees and great working environment.', '<h5>Etiam porta sem malesuada magna mollis euismod. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas faucibus mollis interdum. Donec id elit non mi porta gravida at eget metus. Aenean lacinia. Donec ullamcorper nulla non metus auctor fringilla.</h5>\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment.</p>\r\n<p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution.</p>', NULL, NULL, NULL, 'material-engineering', 6, 'home2-materialengineering-img.jpg', 'manufacture-rght-img.jpg', '', '', '', '', 'service-materialicon', NULL, '', '', '', '', 1, '2020-12-04 00:26:06', '2020-12-05 00:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `ser_categories`
--

CREATE TABLE `ser_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ser_categories`
--

INSERT INTO `ser_categories` (`id`, `catg_name`, `url_slug`, `disp_order`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Speed Blast', 'speed-blast', 1, '', 1, '2020-09-07 06:24:18', '2020-12-04 00:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `ser_sub_categories`
--

CREATE TABLE `ser_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catg_id` bigint(20) UNSIGNED NOT NULL,
  `sub_catg_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `readmore_txt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disp_order` int(11) DEFAULT 0,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image_title`, `short_description`, `readmore_txt`, `url_slug`, `disp_order`, `image1`, `image1_alt`, `status`, `created_at`, `updated_at`) VALUES
(1, '<span>Blasting </span>Equipments', 'We offer a range portable blasting machines able to cop with virtually all types of blasting environment. Tried and tested throughout the world the Speeedco range of blast machines combines rugged efficient operation with maximum site safety', 'CONTACT US', '/contact-us', 1, 'home1-slide1.jpg', 'Speed Blast', 1, '2020-08-05 17:45:50', '2020-12-07 01:22:24'),
(2, '<span>Painting </span>Equipments', 'Starting with the need of the painting contractors, its easy to see why Speedco airless spray pump is the first choice among coating professional', 'CONTACT US', '/contact-us', 2, 'home1-slide2.jpg', 'Speed Blast', 1, '2020-08-05 17:46:36', '2020-12-07 01:22:47'),
(3, '<span>Abrasives -Garnet, Steel Shot &amp;</span> Steel Grit Outsourcing', 'We have lists of abrasives are exceptional in quality and performance. We can professionally supply abrasives like garnet, steel shot, steel grit etc to suit your every abrasive blasting application', 'CONTACT US', '/contact-us', 3, 'home1-slide3.jpg', 'Speed Blast', 1, '2020-08-05 17:47:21', '2020-12-07 01:27:53'),
(5, '<span>Pneumatic </span>Products', 'We are industry experts in supplying superior performance, energy efficient, and customized pneumatic products that adhere to international standards and are optimized for engineering needs', 'CONTACT US', '/contact-us', 4, 'home1-slide1.jpg', NULL, 1, '2020-12-07 01:29:18', '2020-12-07 01:29:41'),
(6, '<span>Inspection </span>Equipments', 'Our range of inspection equipment has been designed for testing different blast profiles, contamination and other critical operations. Highly sensitive and providing accurate information, the equipment&#39;s efficacy has been proven under harshest of operating conditions.', 'CONTACT US', '/contact-us', 5, 'home1-slide2.jpg', NULL, 1, '2020-12-07 01:30:16', '2020-12-07 01:30:16'),
(7, '<span>Safety </span>Products', 'We offer entire array of products to ensure optimal safety at workplace. The spectrum of our personal protective equipment ranges from safety goggles, fluorescent jacket, safety shoes, helmets, hand gloves, ear muffs, nose filters to whole body vest.', 'CONTACT US', '/contact-us', 6, 'home1-slide3.jpg', NULL, 1, '2020-12-07 01:30:53', '2020-12-07 01:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `terms`, `created_at`, `updated_at`) VALUES
(1, '<p>Terms and Conditions</p>', '2020-08-10 23:35:42', '2020-08-10 23:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twiter` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1_alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disp_order` int(11) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `email`, `phone`, `project_title`, `project_details`, `project_link`, `facebook`, `twiter`, `linkedin`, `designation`, `company`, `message`, `image1`, `image1_alt`, `disp_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Edward Brown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manager', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', 'client-img1.jpg', NULL, NULL, 1, '2020-12-04 05:08:29', '2020-12-04 05:12:14'),
(2, 'Gordon Bond', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sales Man', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', 'client-img2.jpg', NULL, NULL, 1, '2020-12-04 05:08:52', '2020-12-04 05:12:05'),
(3, 'Nathan Gibson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Manager', NULL, 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.', 'client-img4.jpg', NULL, NULL, 1, '2020-12-04 05:09:15', '2020-12-04 05:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Reon Technologies', 'admin@reontel.com', NULL, '$2y$10$3Hi6z6Gkv2CBJZcPjgeyaeAj3qyCDLhShGSDQzBZXCPY6OogHj5rG', NULL, 1, '2020-07-27 22:59:58', '2020-07-27 22:59:58'),
(2, 'Website Admin', 'author@reontel.com', NULL, '$2y$10$cTmuzjjPKnSFCe0BLaXJwux3TtO4fsirTtH7dOb5NI9uR5WbjH8gG', NULL, 1, '2020-07-27 22:59:58', '2020-07-27 22:59:58'),
(3, 'Client', 'user@reontel.com', NULL, '$2y$10$IsudFdOIy/T4HPscGRWQXOI0hT70YC0Wwaztg2HD8DBKuxqq94XTu', NULL, 1, '2020-07-27 22:59:58', '2020-07-27 22:59:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blg_categories`
--
ALTER TABLE `blg_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blg_categories_catg_name_unique` (`catg_name`),
  ADD UNIQUE KEY `blg_categories_url_slug_unique` (`url_slug`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_blog_title_unique` (`blog_title`),
  ADD UNIQUE KEY `blogs_url_slug_unique` (`url_slug`),
  ADD KEY `blogs_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallerys`
--
ALTER TABLE `gallerys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallerys_url_slug_unique` (`url_slug`),
  ADD KEY `gallerys_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `gens`
--
ALTER TABLE `gens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gly_categories`
--
ALTER TABLE `gly_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gly_categories_catg_name_unique` (`catg_name`),
  ADD UNIQUE KEY `gly_categories_url_slug_unique` (`url_slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pdt_categories`
--
ALTER TABLE `pdt_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pdt_categories_catg_name_unique` (`catg_name`),
  ADD UNIQUE KEY `pdt_categories_url_slug_unique` (`url_slug`);

--
-- Indexes for table `pdt_sub_categories`
--
ALTER TABLE `pdt_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pdt_sub_categories_sub_catg_name_unique` (`sub_catg_name`),
  ADD UNIQUE KEY `pdt_sub_categories_url_slug_unique` (`url_slug`),
  ADD KEY `pdt_sub_categories_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `pjx_categories`
--
ALTER TABLE `pjx_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pjx_categories_catg_name_unique` (`catg_name`),
  ADD UNIQUE KEY `pjx_categories_url_slug_unique` (`url_slug`);

--
-- Indexes for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD UNIQUE KEY `products_url_slug_unique` (`url_slug`),
  ADD KEY `products_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_project_code_unique` (`project_code`),
  ADD UNIQUE KEY `projects_project_name_unique` (`project_name`),
  ADD UNIQUE KEY `projects_url_slug_unique` (`url_slug`),
  ADD KEY `projects_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_service_code_unique` (`service_code`),
  ADD UNIQUE KEY `services_service_name_unique` (`service_name`),
  ADD UNIQUE KEY `services_url_slug_unique` (`url_slug`),
  ADD KEY `services_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `ser_categories`
--
ALTER TABLE `ser_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ser_categories_catg_name_unique` (`catg_name`),
  ADD UNIQUE KEY `ser_categories_url_slug_unique` (`url_slug`);

--
-- Indexes for table `ser_sub_categories`
--
ALTER TABLE `ser_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ser_sub_categories_sub_catg_name_unique` (`sub_catg_name`),
  ADD UNIQUE KEY `ser_sub_categories_url_slug_unique` (`url_slug`),
  ADD KEY `ser_sub_categories_catg_id_foreign` (`catg_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blg_categories`
--
ALTER TABLE `blg_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallerys`
--
ALTER TABLE `gallerys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gens`
--
ALTER TABLE `gens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gly_categories`
--
ALTER TABLE `gly_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556;

--
-- AUTO_INCREMENT for table `pdt_categories`
--
ALTER TABLE `pdt_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pdt_sub_categories`
--
ALTER TABLE `pdt_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pjx_categories`
--
ALTER TABLE `pjx_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `privacypolicy`
--
ALTER TABLE `privacypolicy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ser_categories`
--
ALTER TABLE `ser_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ser_sub_categories`
--
ALTER TABLE `ser_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `blg_categories` (`id`);

--
-- Constraints for table `gallerys`
--
ALTER TABLE `gallerys`
  ADD CONSTRAINT `gallerys_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `gly_categories` (`id`);

--
-- Constraints for table `pdt_sub_categories`
--
ALTER TABLE `pdt_sub_categories`
  ADD CONSTRAINT `pdt_sub_categories_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `pdt_categories` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `pdt_categories` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `pjx_categories` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `ser_categories` (`id`);

--
-- Constraints for table `ser_sub_categories`
--
ALTER TABLE `ser_sub_categories`
  ADD CONSTRAINT `ser_sub_categories_catg_id_foreign` FOREIGN KEY (`catg_id`) REFERENCES `ser_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
