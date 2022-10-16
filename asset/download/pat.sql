-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2020 at 04:32 PM
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
-- Database: `pat`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_04_035911_tb_banner', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_banner`
--

CREATE TABLE `tb_about_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_about_banner`
--

INSERT INTO `tb_about_banner` (`id`, `image`, `created_at`, `updated_at`) VALUES
(9, 'banner_about_new.png', '2020-05-07 00:15:26', '2020-05-07 00:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_our_vmv`
--

CREATE TABLE `tb_about_our_vmv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_about_our_vmv`
--

INSERT INTO `tb_about_our_vmv` (`id`, `title`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(12, 'OUR VISION', 'To be a leader in predictive and preventive maintenance instrumentation, services, and solutions. We will be the most valued business partner of all our customers.', 1, '2020-05-07 21:47:27', '2020-05-07 21:47:27'),
(13, 'OUR MISSION', 'We provide maintenance instrumentation, services, and solutions by meeting and satisfying the customer\'s requirements to enhance the business of all our customers. Become our customers, your machine must operate at full efficiency.', 1, '2020-05-07 21:47:41', '2020-05-07 21:47:41'),
(14, 'OUR VALUES', 'Committed to excellence\r\nDelivering what is promised and dealing well with any problems that arise.\r\n\r\nHonesty\r\nWe promoted honesty, integrity, and openness in all we do.\r\n\r\nTrusted\r\nBuilding trust builds a better company.', 1, '2020-05-07 21:47:58', '2020-05-07 21:47:58'),
(15, 'วิสัยทัศน์ของเรา', 'เป็นผู้นำด้านเครื่องมือบำรุงรักษาเชิงป้องกันและบำรุงรักษาเชิงป้องกันและบริการ เราจะเป็นพันธมิตาทางธุรกิจที่มีค่าที่สุดของลูกค้าของเรา', 0, '2020-05-07 21:47:27', '2020-05-07 21:47:27'),
(16, 'ภารกิจของเรา', 'เราจัดหาเครื่องมือบำรุงรักษาบริการและโซลูชั่นโดยการประชุมและตอบสนองความต้องการของลูกค้าเพื่อปรับปรุงธุรกิจของลูกค้าทั้งหมดของเรา เป็นลูกค้าของเราเครื่องของคุณจะต้องทำงานได้อย่างเต็มประสิทธิภาพ', 0, '2020-05-07 21:47:41', '2020-05-07 21:47:41'),
(17, 'ค่านิยมของเรา', 'Committed to excellence\r\nDelivering what is promised and dealing well with any problems that arise.\r\n\r\nHonesty\r\nWe promoted honesty, integrity, and openness in all we do.\r\n\r\nTrusted\r\nBuilding trust builds a better company.', 0, '2020-05-07 21:47:58', '2020-05-07 21:47:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_about_patechnology`
--

CREATE TABLE `tb_about_patechnology` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_about_patechnology`
--

INSERT INTO `tb_about_patechnology` (`id`, `title`, `detail`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'P & A Technology is one of leading engineering companies in Thailand', 'P&A Technology Company Limited was established in 1995 as a predictive and preventive maintenance instrument distributor, which also include electrical and environmental related equipment and system, for public and private sector. Our company focuses on selecting quality and reliable instrument with high technology.\r\n\r\nWe have been officially appointed as a sole distributor by world’s leading manufacturer from Europe, Asia, the United States and Canada. We achieve our goals through our team expert and our experiences to deliver full scope of maintenance and servicing.\r\n\r\nTo ensure the high quality and continuous improvement of our service, we have extended our services offering in machine condition monitoring including on-site service, rental service, and after-sales service to support our customers.', 'img_about.png', 1, '2020-05-07 03:18:57', '2020-05-07 03:53:26'),
(8, 'P & A Technology is one of leading engineering companies in Thailand', 'P&A Technology Company Limited was established in 1995 as a predictive and preventive maintenance instrument distributor, which also include electrical and environmental related equipment and system, for public and private sector. Our company focuses on selecting quality and reliable instrument with high technology.\r\n\r\nWe have been officially appointed as a sole distributor by world’s leading manufacturer from Europe, Asia, the United States and Canada. We achieve our goals through our team expert and our experiences to deliver full scope of maintenance and servicing.\r\n\r\nTo ensure the high quality and continuous improvement of our service, we have extended our services offering in machine condition monitoring including on-site service, rental service, and after-sales service to support our customers.', 'img_about.png', 0, '2020-05-07 03:18:57', '2020-05-07 03:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_banner`
--

CREATE TABLE `tb_contact_banner` (
  `id` bigint(20) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_contact_banner`
--

INSERT INTO `tb_contact_banner` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'banner_contact_new.png', '2020-05-12 09:47:59', '2020-05-12 03:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_inquiry`
--

CREATE TABLE `tb_contact_inquiry` (
  `id` bigint(20) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_contact_inquiry`
--

INSERT INTO `tb_contact_inquiry` (`id`, `name`, `company`, `email`, `phone_number`, `message`, `created_at`, `updated_at`) VALUES
(1, 'sattapong', 'ORANGE TECHNOLOGY SOLUTION COMPANY LIMITED ALL RIGHTS RESERVED', 'ktboyfc123@gmail.com', '0896325412', 'ทำงานให้เสร็จได้แล้วนะต้นตอ', '2020-05-13 02:50:30', '2020-05-13 02:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact_office`
--

CREATE TABLE `tb_contact_office` (
  `id` bigint(20) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_contact_office`
--

INSERT INTO `tb_contact_office` (`id`, `address`, `tel`, `fax`, `mobile`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, '24 Soi Kanchanapisek 0010 Yak 2, Bangkhae, Bangkhae, Bangkok 10160', '(+66)2-454-2478', '(+66)2-454-2477', '(+66)93-639-8915', 'info@pat.co.th', 1, '2020-05-12 10:24:25', '2020-05-12 03:49:02'),
(2, '24 ซอยกาญจนาภิเษก 0010 แยก 2 แขวงบางแคเขตบางแคกรุงเทพมหานคร 10160', '(+66)2-454-2478', '(+66)2-454-2477', '(+66)93-639-8915', 'info@pat.co.th', 0, '2020-05-12 10:24:25', '2020-05-12 03:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_download`
--

CREATE TABLE `tb_download` (
  `id` bigint(20) NOT NULL,
  `download` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_download`
--

INSERT INTO `tb_download` (`id`, `download`, `created_at`, `updated_at`) VALUES
(1, 'leonova_diamond.pdf', '2020-05-13 08:48:23', '2020-05-13 08:48:23'),
(2, 'leonova_diamond.pdf', '2020-05-13 02:57:10', '2020-05-13 02:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_home_banner`
--

CREATE TABLE `tb_home_banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_home_banner`
--

INSERT INTO `tb_home_banner` (`id`, `title`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'YOUR PARTNER IN MACHINE CONDITION MONITORING', 'img_vdo_2.png', 1, '2020-05-04 20:29:20', '2020-05-04 20:29:20'),
(4, 'คู่ของคุณในการตรวจสอบสภาพเครื่องจักร', 'img_vdo_2.png', 0, '2020-05-04 20:30:12', '2020-05-04 20:30:12'),
(5, 'YOUR PARTNER IN MACHINE CONDITION MONITORING', 'img_vdo_2.png', 1, '2020-05-04 20:30:28', '2020-05-04 20:30:28'),
(9, 'คู่ของคุณในการตรวจสอบสภาพเครื่องจักร', 'img_vdo_2.png', 0, '2020-05-04 20:29:20', '2020-05-04 20:29:20'),
(10, 'YOUR PARTNER IN MACHINE CONDITION MONITORING', 'img_vdo_2.png', 1, '2020-05-04 20:30:28', '2020-05-04 20:30:28'),
(11, 'คู่ของคุณในการตรวจสอบสภาพเครื่องจักร', 'img_vdo_2.png', 0, '2020-05-04 20:30:28', '2020-05-04 20:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_home_partners`
--

CREATE TABLE `tb_home_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_home_partners`
--

INSERT INTO `tb_home_partners` (`id`, `image`, `created_at`, `updated_at`) VALUES
(15, 'img_1.png', '2020-05-06 19:26:35', '2020-05-06 19:26:35'),
(16, 'img_2.png', '2020-05-06 19:26:54', '2020-05-06 19:26:54'),
(17, 'img_3.png', '2020-05-06 20:33:13', '2020-05-06 20:33:13'),
(18, 'img_4.png', '2020-05-06 20:57:17', '2020-05-06 20:57:17'),
(19, 'img_5.png', '2020-05-06 20:57:28', '2020-05-06 20:57:28'),
(20, 'img_6.png', '2020-05-06 20:57:40', '2020-05-06 20:57:40'),
(21, 'img_7.png', '2020-05-06 20:57:51', '2020-05-06 20:57:51'),
(22, 'img_8.png', '2020-05-06 20:58:01', '2020-05-06 20:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_home_patechnology`
--

CREATE TABLE `tb_home_patechnology` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_home_patechnology`
--

INSERT INTO `tb_home_patechnology` (`id`, `title`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(9, 'P & A TECHNOLOGY', 'P & A is one of the leading engineering companies in Thailand with a focus on predictive/proactive maintenance and environmental equipment. We started the operation in 1995. Our principal is the manufacturer of reliable products with high technology. We explore for integrated products to fulfill our product line for every application and requirement. Our success is driven by our team and their commitment to get results the right way by executing with excellence and selecting the best solution for our customers. To ensure the high quality and continuous improvement of our customer service, we have set up our sister company - CBMS Company Limited with expertise in service providing services and training program.', 'bg_about.png', '2020-05-05 03:11:49', '2020-05-05 03:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id` bigint(20) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id`, `image`, `title`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'img_product_1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 1, '2020-05-12 07:16:23', '2020-05-12 00:55:03'),
(2, 'img_product_1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 1, '2020-05-12 00:45:03', '2020-05-12 00:55:37'),
(4, 'img_product_1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 0, '2020-05-12 07:16:23', '2020-05-12 00:55:03'),
(5, 'img_product_1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 0, '2020-05-12 00:45:03', '2020-05-12 00:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_subscribe`
--

CREATE TABLE `tb_news_subscribe` (
  `id` bigint(20) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_news_subscribe`
--

INSERT INTO `tb_news_subscribe` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ktboyfc123@hotmail.com', '2020-05-12 08:28:42', '2020-05-12 08:28:42'),
(2, 'ktboyfc123@hotmail.com', '2020-05-12 08:28:42', '2020-05-12 08:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_video`
--

CREATE TABLE `tb_news_video` (
  `id` bigint(20) NOT NULL,
  `video` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_news_video`
--

INSERT INTO `tb_news_video` (`id`, `video`, `title`, `detail`, `status`, `created_at`, `updated_at`) VALUES
(1, 'https://youtu.be/_sI_Ps7JSEk', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 1, '2020-05-13 07:06:08', '2020-05-13 00:41:19'),
(3, 'https://youtu.be/_sI_Ps7JSEk', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\norem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage', 0, '2020-05-13 07:06:08', '2020-05-13 00:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titles` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `download` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'FK_ID',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `title`, `titles`, `detail`, `image`, `download`, `video`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Leonova Diamond', 'PRODUCT OVERVIEW', 'Leonova Diamond® is a portable instrument for condition measurement in rough industrial surroundings. This heavy-duty yet sophisticated instrument brings powerful analysis and troubleshooting capabilities to your condition monitoring program. Wherever measuring route efficiency is a priority, Leonova Diamond is the perfect choice, providing a powerful combination of well-proven measuring techniques for every situation all in one instrument. Leonova Diamond supports HD technologies for bearing condition and advanced vibration analysis for general machine condition, and more features.', 'product-1.png', 'leonova_diamond.pdf', 'https://www.youtube.com/watch?v=IsqefGB9z9o&feature=emb_logo', 1, 1, '2020-05-08 00:28:03', '2020-05-11 19:13:50'),
(13, 'ไดโนวาไดมอนด์', 'ภาพรวมผลิตภัณฑ์', 'Leonova Diamond®เป็นเครื่องมือพกพาสำหรับการวัดสภาพในสภาพแวดล้อมอุตสาหกรรมที่ขรุขระ เครื่องมือที่ใช้งานหนัก แต่มีความซับซ้อนนี้นำการวิเคราะห์ที่มีประสิทธิภาพและความสามารถในการแก้ไขปัญหาให้กับโปรแกรมตรวจสอบสภาพของคุณ เมื่อใดก็ตามที่การวัดประสิทธิภาพของเส้นทางเป็นสิ่งที่สำคัญ Leonova Diamond เป็นตัวเลือกที่สมบูรณ์แบบมอบการผสมผสานที่มีประสิทธิภาพของเทคนิคการตรวจวัดที่ได้รับการพิสูจน์มาเป็นอย่างดีสำหรับทุกสถานการณ์ในเครื่องมือเดียว Leonova Diamond รองรับเทคโนโลยี HD สำหรับสภาพตลับลูกปืนและการวิเคราะห์การสั่นสะเทือนขั้นสูงสำหรับสภาพเครื่องจักรทั่วไปและคุณสมบัติอื่น ๆ', 'product-2.png', 'leonova_diamond.pdf', 'https://www.youtube.com/watch?v=IsqefGB9z9o&feature=emb_logo', 2, 0, '2020-05-08 01:24:56', '2020-05-11 07:51:20'),
(18, 'Leonova Diamond', 'PRODUCT OVERVIEW', 'Leonova Diamond® is a portable instrument for condition measurement in rough industrial surroundings. This heavy-duty yet sophisticated instrument brings powerful analysis and troubleshooting capabilities to your condition monitoring program. Wherever measuring route efficiency is a priority, Leonova Diamond is the perfect choice, providing a powerful combination of well-proven measuring techniques for every situation all in one instrument. Leonova Diamond supports HD technologies for bearing condition and advanced vibration analysis for general machine condition, and more features.', 'product-1.png', 'leonova_diamond.pdf', 'https://www.youtube.com/watch?v=IsqefGB9z9o&feature=emb_logo', 2, 1, '2020-05-08 00:28:03', '2020-05-11 19:13:50'),
(19, 'ไดโนวาไดมอนด์', 'ภาพรวมผลิตภัณฑ์', 'Leonova Diamond®เป็นเครื่องมือพกพาสำหรับการวัดสภาพในสภาพแวดล้อมอุตสาหกรรมที่ขรุขระ เครื่องมือที่ใช้งานหนัก แต่มีความซับซ้อนนี้นำการวิเคราะห์ที่มีประสิทธิภาพและความสามารถในการแก้ไขปัญหาให้กับโปรแกรมตรวจสอบสภาพของคุณ เมื่อใดก็ตามที่การวัดประสิทธิภาพของเส้นทางเป็นสิ่งที่สำคัญ Leonova Diamond เป็นตัวเลือกที่สมบูรณ์แบบมอบการผสมผสานที่มีประสิทธิภาพของเทคนิคการตรวจวัดที่ได้รับการพิสูจน์มาเป็นอย่างดีสำหรับทุกสถานการณ์ในเครื่องมือเดียว Leonova Diamond รองรับเทคโนโลยี HD สำหรับสภาพตลับลูกปืนและการวิเคราะห์การสั่นสะเทือนขั้นสูงสำหรับสภาพเครื่องจักรทั่วไปและคุณสมบัติอื่น ๆ', 'product-2.png', 'leonova_diamond.pdf', 'https://www.youtube.com/watch?v=IsqefGB9z9o&feature=emb_logo', 1, 0, '2020-05-08 01:24:56', '2020-05-11 07:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_category`
--

CREATE TABLE `tb_product_category` (
  `id` bigint(20) NOT NULL,
  `category_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL COMMENT 'FK_ID',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product_category`
--

INSERT INTO `tb_product_category` (`id`, `category_name`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SPM', 1, 1, '2020-05-11 02:43:42', '2020-05-10 21:14:15'),
(2, 'EASY-LASER', 2, 1, '2020-05-10 20:45:52', '2020-05-10 20:45:52'),
(3, 'PAMAS', 3, 1, '2020-05-10 20:47:02', '2020-05-10 20:47:02'),
(4, 'ION SCIENCE', 4, 1, '2020-05-10 20:47:17', '2020-05-10 20:47:17'),
(5, 'EMT', 5, 1, '2020-05-10 20:47:39', '2020-05-10 20:47:39'),
(6, 'ENERVAC', 6, 1, '2020-05-10 20:47:50', '2020-05-10 20:47:50'),
(7, 'DELAVAN', 7, 1, '2020-05-10 20:48:02', '2020-05-10 20:48:02'),
(8, 'EATON', 8, 1, '2020-05-10 20:48:13', '2020-05-10 20:48:13'),
(9, 'SATIR', 9, 1, '2020-05-10 20:48:29', '2020-05-10 20:48:29'),
(10, 'PRY-CAM', 10, 1, '2020-05-10 20:48:44', '2020-05-10 21:16:39'),
(11, 'KEII', 11, 1, '2020-05-10 20:48:57', '2020-05-10 20:48:57'),
(12, 'KETT', 12, 1, '2020-05-10 20:49:16', '2020-05-10 20:49:16'),
(13, 'AREVA', 13, 1, '2020-05-10 20:49:32', '2020-05-10 20:49:32'),
(14, 'TECHNOLOGY DESIGN', 14, 1, '2020-05-10 20:49:44', '2020-05-10 20:49:44'),
(15, 'HOESTAR', 15, 1, '2020-05-10 20:49:54', '2020-05-10 20:49:54'),
(16, 'TAN DELTA', 16, 1, '2020-05-10 20:50:17', '2020-05-10 20:50:17'),
(17, 'PLARAD', 17, 1, '2020-05-10 20:50:25', '2020-05-10 20:50:25'),
(18, 'PARKER l KITTIWAKE', 18, 1, '2020-05-10 20:50:35', '2020-05-10 20:50:35'),
(19, 'EFER', 19, 1, '2020-05-10 20:50:46', '2020-05-10 20:50:46'),
(21, 'MEDISURGE', 20, 1, '2020-05-10 21:20:12', '2020-05-10 21:20:12'),
(22, 'SPM', 1, 0, '2020-05-11 02:43:42', '2020-05-10 21:14:15'),
(23, 'EASY-LASER', 2, 0, '2020-05-10 20:45:52', '2020-05-10 20:45:52'),
(24, 'PAMAS', 3, 0, '2020-05-10 20:47:02', '2020-05-10 20:47:02'),
(25, 'ION SCIENCE', 4, 0, '2020-05-10 20:47:17', '2020-05-10 20:47:17'),
(26, 'EMT', 5, 0, '2020-05-10 20:47:39', '2020-05-10 20:47:39'),
(27, 'ENERVAC', 6, 0, '2020-05-10 20:47:50', '2020-05-10 20:47:50'),
(28, 'DELAVAN', 7, 0, '2020-05-10 20:48:02', '2020-05-10 20:48:02'),
(29, 'EATON', 8, 0, '2020-05-10 20:48:13', '2020-05-10 20:48:13'),
(30, 'SATIR', 9, 0, '2020-05-10 20:48:29', '2020-05-10 20:48:29'),
(31, 'PRY-CAM', 10, 0, '2020-05-10 20:48:44', '2020-05-10 21:16:39'),
(32, 'KEII', 11, 0, '2020-05-10 20:48:57', '2020-05-10 20:48:57'),
(33, 'KETT', 12, 0, '2020-05-10 20:49:16', '2020-05-10 20:49:16'),
(34, 'AREVA', 13, 0, '2020-05-10 20:49:32', '2020-05-10 20:49:32'),
(35, 'TECHNOLOGY DESIGN', 14, 0, '2020-05-10 20:49:44', '2020-05-10 20:49:44'),
(36, 'HOESTAR', 15, 0, '2020-05-10 20:49:54', '2020-05-10 20:49:54'),
(37, 'TAN DELTA', 16, 0, '2020-05-10 20:50:17', '2020-05-10 20:50:17'),
(38, 'PLARAD', 17, 0, '2020-05-10 20:50:25', '2020-05-10 20:50:25'),
(39, 'PARKER l KITTIWAKE', 18, 0, '2020-05-10 20:50:35', '2020-05-10 20:50:35'),
(40, 'EFER', 19, 0, '2020-05-10 20:50:46', '2020-05-10 20:50:46'),
(41, 'MEDISURGE', 20, 0, '2020-05-10 21:20:12', '2020-05-10 21:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_type`
--

CREATE TABLE `tb_product_type` (
  `id` bigint(20) NOT NULL,
  `type_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL COMMENT 'FK_ID',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_product_type`
--

INSERT INTO `tb_product_type` (`id`, `type_name`, `type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Portable Instrumentation', 1, 1, '2020-05-11 06:42:57', '2020-05-11 07:40:52'),
(2, 'Online Monitoring Systems', 1, 1, '2020-05-11 00:19:50', '2020-05-11 07:41:26'),
(3, 'Software', 1, 1, '2020-05-11 00:21:43', '2020-05-11 00:21:43'),
(7, 'เครื่องมือวัดแบบพกพา', 1, 0, '2020-05-11 06:42:57', '2020-05-11 07:40:52'),
(8, 'ระบบตรวจสอบออนไลน์', 1, 0, '2020-05-11 00:19:50', '2020-05-11 07:41:26'),
(9, 'ซอฟต์แวร์', 1, 0, '2020-05-11 00:21:43', '2020-05-11 00:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` bigint(20) NOT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id`, `detail`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'CBMS Company Limited provides a wide range of services including on-site service, rental service, and after sales service with diverse range of portable machines and machining techniques together with a dedicated team of experienced engineers in the field of instrumentation and plant maintenance. Our services offering is unrivaled in the market. We committed to deliver the highest level of service and support. We also provide custom tailored service that customized the way you want. Contact us and let us take care of your job.', 'logo_cbms_new1.jpg', 1, '2020-05-11 08:52:09', '2020-05-11 08:52:09'),
(5, 'บริษัท ซีบีเอ็มเอส จำกัด ให้บริการที่หลากหลายรวมถึงบริการนอกสถานที่บริการให้เช่าและบริการหลังการขายด้วยเครื่องจักรแบบพกพาที่หลากหลายและเทคนิคการตัดเฉือนพร้อมทีมวิศวกรที่มีประสบการณ์ในด้านเครื่องมือวัดและซ่อมบำรุงโรงงาน บริการของเรานั้นไม่มีใครเทียบได้ในตลาด เรามุ่งมั่นที่จะมอบการบริการและการสนับสนุนระดับสูงสุด นอกจากนี้เรายังให้บริการปรับแต่งที่กำหนดเองตามที่คุณต้องการ ติดต่อเราและให้เราดูแลงานของคุณ', 'logo_cbms_new1.jpg', 0, '2020-05-11 08:52:09', '2020-05-11 08:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services_detail`
--

CREATE TABLE `tb_services_detail` (
  `id` bigint(20) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail_id` int(11) NOT NULL COMMENT 'FK_ID',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_services_detail`
--

INSERT INTO `tb_services_detail` (`id`, `image`, `title`, `detail`, `detail_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 'img_services.jpg', 'Vibration Measurement Analysis', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 1, 1, '2020-05-11 23:23:47', '2020-05-11 23:23:47'),
(7, 'img_services.jpg', 'Vibration Measurement Analysis', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 2, 1, '2020-05-11 23:26:21', '2020-05-11 23:26:21'),
(8, 'img_services.jpg', 'Vibration Measurement Analysis', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 3, 1, '2020-05-11 23:27:57', '2020-05-11 23:27:57'),
(10, 'img_services.jpg', 'การวิเคราะห์การวัดการสั่นสะเทือน', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 1, 0, '2020-05-11 23:23:47', '2020-05-11 23:23:47'),
(11, 'img_services.jpg', 'การวิเคราะห์การวัดการสั่นสะเทือน', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 2, 0, '2020-05-11 23:26:21', '2020-05-11 23:26:21'),
(12, 'img_services.jpg', 'การวิเคราะห์การวัดการสั่นสะเทือน', '<h5>Vibration measurement is the most widely used and cost-efficient method for the diagnosis of overall machine condition. There are two ISO recommendations concerning machine condition monitoring using this type of measurement; the much-used ISO 2372 and the more recent ISO 10816</h5>\r\n\r\n<ul>\r\n	<li>&nbsp;Reliable diagnosis of overall machine condition which can be integrate in your maintenance program to diagnose machine pre-warning and condition</li>\r\n	<li>&nbsp;Condition monitoring based on ISO recommendations</li>\r\n	<li>&nbsp;Vibration severity measurement to detect common machine faults such as imbalance, structural weakness, loose parts, etc.</li>\r\n	<li>&nbsp;Evaluated vibration analysis with analysis report included vibration severity, comments, and solutions</li>\r\n	<li>&nbsp;Remote monitoring and diagnosis of machines condition</li>\r\n</ul>', 3, 0, '2020-05-11 23:27:57', '2020-05-11 23:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services_various`
--

CREATE TABLE `tb_services_various` (
  `id` bigint(20) NOT NULL,
  `services_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `services_various_id` int(11) NOT NULL COMMENT 'FK_ID',
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_services_various`
--

INSERT INTO `tb_services_various` (`id`, `services_name`, `services_various_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'On-Site Service', 1, 1, '2020-05-12 03:43:33', '2020-05-11 23:31:04'),
(2, 'Rental Service', 2, 1, '2020-05-11 20:50:29', '2020-05-11 21:10:59'),
(3, 'After Sales Service', 3, 1, '2020-05-11 21:11:33', '2020-05-11 21:11:33'),
(5, 'บริการนอกสถานที่', 1, 0, '2020-05-12 03:43:33', '2020-05-11 23:31:04'),
(6, 'บริการให้เช่า', 2, 0, '2020-05-11 20:50:29', '2020-05-11 21:10:59'),
(7, 'บริการหลังการขาย', 3, 0, '2020-05-11 21:11:33', '2020-05-11 21:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_software`
--

CREATE TABLE `tb_software` (
  `id` bigint(20) NOT NULL,
  `software` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_software`
--

INSERT INTO `tb_software` (`id`, `software`, `created_at`, `updated_at`) VALUES
(1, 'https://www.youtube.com/watch?v=IsqefGB9z9o&feature=emb_logo', '2020-05-13 10:30:42', '2020-05-13 10:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arthit', 'ar-thit2036@hotmail.com', NULL, '$2y$10$w1pBQUOeEsBKWrSQknDGZ.gk7Ibva/WmjMYxJPMNA8eoHM8tKCJw.', NULL, '2020-04-29 09:44:12', '2020-04-29 09:44:12'),
(2, 'SaTTaPonG', 'sattapong.torton@gmail.com', NULL, '$2y$10$JLHJhx4wHDv047j7CYuA1uS8cdEo.roLYTMKrNe5FqQJPiejTGMe.', NULL, '2020-05-03 20:15:55', '2020-05-03 20:15:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_about_banner`
--
ALTER TABLE `tb_about_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_about_our_vmv`
--
ALTER TABLE `tb_about_our_vmv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_about_patechnology`
--
ALTER TABLE `tb_about_patechnology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact_banner`
--
ALTER TABLE `tb_contact_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact_inquiry`
--
ALTER TABLE `tb_contact_inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_contact_office`
--
ALTER TABLE `tb_contact_office`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_download`
--
ALTER TABLE `tb_download`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_home_banner`
--
ALTER TABLE `tb_home_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_home_partners`
--
ALTER TABLE `tb_home_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_home_patechnology`
--
ALTER TABLE `tb_home_patechnology`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news_subscribe`
--
ALTER TABLE `tb_news_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_news_video`
--
ALTER TABLE `tb_news_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_category`
--
ALTER TABLE `tb_product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_services_detail`
--
ALTER TABLE `tb_services_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_services_various`
--
ALTER TABLE `tb_services_various`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_software`
--
ALTER TABLE `tb_software`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_about_banner`
--
ALTER TABLE `tb_about_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_about_our_vmv`
--
ALTER TABLE `tb_about_our_vmv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_about_patechnology`
--
ALTER TABLE `tb_about_patechnology`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_contact_banner`
--
ALTER TABLE `tb_contact_banner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_contact_inquiry`
--
ALTER TABLE `tb_contact_inquiry`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_contact_office`
--
ALTER TABLE `tb_contact_office`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_download`
--
ALTER TABLE `tb_download`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_home_banner`
--
ALTER TABLE `tb_home_banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_home_partners`
--
ALTER TABLE `tb_home_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_home_patechnology`
--
ALTER TABLE `tb_home_patechnology`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_news_subscribe`
--
ALTER TABLE `tb_news_subscribe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_news_video`
--
ALTER TABLE `tb_news_video`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_product_category`
--
ALTER TABLE `tb_product_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_services`
--
ALTER TABLE `tb_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_services_detail`
--
ALTER TABLE `tb_services_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_services_various`
--
ALTER TABLE `tb_services_various`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_software`
--
ALTER TABLE `tb_software`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
