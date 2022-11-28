-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citysun`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(18, 'RO-Repair Services', 'ro-repair-services', 'storage/icon/1728450452895387.webp', '2022-03-27 07:12:25', '2022-03-27 11:00:04'),
(19, 'Refrigerator Services', 'refrigerator-services', 'storage/icon/1728450321598365.webp', '2022-03-27 07:14:38', '2022-03-27 10:57:58'),
(20, 'Home Security', 'home-security', 'storage/icon/1728450240816062.webp', '2022-03-27 07:14:47', '2022-03-27 10:56:41'),
(21, 'Building Solution', 'building-solution', 'storage/icon/1728450195154326.webp', '2022-03-27 07:14:56', '2022-03-27 10:55:58'),
(22, 'Electronic Gadgets', 'electronic-gadgets', 'storage/icon/1728450134581113.webp', '2022-03-27 07:15:05', '2022-03-27 10:55:00'),
(23, 'Cleaning Service', 'cleaning-service', 'storage/icon/1728450126527402.webp', '2022-03-27 07:15:14', '2022-03-27 10:54:52'),
(24, 'Home Appliance', 'home-appliance', 'storage/icon/1728450119551342.webp', '2022-03-27 07:15:24', '2022-03-27 10:54:46'),
(25, 'Air-conditioner', 'air-conditioner', 'storage/icon/1728450104141403.webp', '2022-03-27 07:15:33', '2022-03-27 10:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Ashik Ahmed', 'info@pixelwond.com', 'New Customer', 'Hello', 'Closed', '2022-03-15 13:02:04', '2022-03-27 10:35:25'),
(3, 'Jannatul Ferdoush', 'admin@pixelwond.com', 'New Customer', 'hello', 'Closed', '2022-03-27 08:28:14', '2022-03-27 18:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_01_074845_create_posts_table', 1),
(6, '2022_03_01_083149_create_categories_table', 1),
(7, '2022_03_05_075933_create_subscribers_table', 1),
(8, '2022_03_09_044652_create_contacts_table', 1),
(9, '2022_03_09_095630_create_settings_table', 1),
(12, '2022_03_15_135528_create_testimonials_table', 3),
(13, '2022_03_22_150839_create_categories_table', 4),
(14, '2022_03_12_211913_create_services_table', 5),
(16, '2022_03_27_140456_create_subscribers_table', 7),
(19, '2022_03_15_111511_create_orders_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_price` double(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrxID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `service_price`, `type`, `payment_number`, `TrxID`, `name`, `email`, `phone`, `address`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1800.00, 'cash', NULL, NULL, 'Ashik Ahmed', 'admin@ff.com', '01954654540', 'Dhaka', 'new', 'pending', '2022-03-29 17:38:16', '2022-03-29 17:38:16'),
(2, 7, 1800.00, 'cash', NULL, NULL, 'Ashik Ahmed', 'admin@ff.com', '01954654540', 'Dhaka', 'new', 'pending', '2022-03-29 17:38:59', '2022-03-29 17:38:59'),
(3, 7, 1800.00, 'cash', NULL, NULL, 'Ashik Ahmed', 'admin@ff.com', '01954654540', 'Dhaka', 'new', 'pending', '2022-03-29 17:40:16', '2022-03-29 17:40:16'),
(4, 7, 1800.00, 'cash', NULL, NULL, 'Sumona Ahmed', 'seller@admin.com', '01911742200', 'Fds', 'ss', 'pending', '2022-03-29 17:44:01', '2022-03-29 17:44:01'),
(5, 7, 1800.00, 'cash', NULL, NULL, 'Jannatul Ferdoush', 'jannatf1989@gmail.com', '01911742233', 'dd', 'dd', 'pending', '2022-03-29 17:52:38', '2022-03-29 17:52:38'),
(6, 5, 500.00, 'cash', NULL, NULL, 'Jannatul Ferdoush', 'jannatf1989@gmail.com', '01584585654', 'Rangpur', NULL, 'pending', '2022-03-29 17:55:07', '2022-03-29 17:55:07'),
(7, 5, 500.00, 'cash', '021574', 'lkgf7f', 'Jannatul Ferdoush', 'jannatf1989@gmail.com', '01911742233', 'gg', 'g', 'approved', '2022-03-29 17:57:04', '2022-03-29 18:15:09');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount_price` float DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `category_id`, `short_text`, `description`, `price`, `discount_price`, `thumbnail`, `created_at`, `updated_at`) VALUES
(4, 'Inspection/Diagnosis Charge', 'inspectiondiagnosis-charge', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. <br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old.Contrary to popular belief, Lorem Ipsum is not \r\nsimply random text. It has roots in a piece of classical Latin \r\nliterature from 45 BC, making it over 2000 years old. <br></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old.Contrary to popular belief, Lorem Ipsum is not \r\nsimply random text. It has roots in a piece of classical Latin \r\nliterature from 45 BC, making it over 2000 years old. </p>', 200.00, 0, 'storage/services/1728438310409840.webp', '2022-03-27 07:47:04', NULL),
(5, 'Basic Service Charge', 'basic-service-charge', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p><strong></strong></p><p><hr></p><p><strong></strong></p><p>&nbsp;It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature,</p><p>&nbsp;discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.<br></p>', 500.00, 0, 'storage/services/1728438560442597.webp', '2022-03-27 07:51:02', NULL),
(6, 'Jet Wash Service', 'jet-wash-service', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', 1200.00, 0, 'storage/services/1728438722887742.webp', '2022-03-27 07:53:37', NULL),
(7, 'Master Service', 'master-service', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.<br></p>', 1800.00, 0, 'storage/services/1728438832306799.webp', '2022-03-27 07:55:21', NULL),
(8, 'Water Drop Solution', 'water-drop-solution', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', 1000.00, 800, 'storage/services/1728438978165930.webp', '2022-03-27 07:57:41', '2022-03-29 16:14:37'),
(9, 'Hanging Charge', 'hanging-charge', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', 400.00, 250, 'storage/services/1728439055569532.webp', '2022-03-27 07:58:54', '2022-03-29 16:14:45'),
(10, 'Installation', 'installation', '25', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', 1800.00, 1500, 'storage/services/1728439159814831.webp', '2022-03-27 08:00:34', '2022-03-29 15:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'general', '{\"app_url\":\"http:\\/\\/127.0.0.1:8000\",\"site_name\":\"Suncity\",\"site_title\":\"Suncity Contrary to popular belief, Lorem Ipsum is not simply random text.\",\"newslatter_text\":\"Any Service, Any Time, Anywhere. Give us your mobile number. You\\u2019ll get an SMS with the app download link.\",\"about_text\":\"Citysun is an online Home Improvement aggregator, connecting homeowners with the best home repair professionals in their neighborhood.\",\"copyright_text\":\"2021 \\u00a9 Citysun.xyz All rights reserved Design and Develop by InReal Technology Co.\",\"address\":\"Kishoreganj 2300, Dhaka, Bangladesh\",\"phone\":\"01914807645\",\"email\":\"info@citysun.xyz\",\"facebook\":\"https:\\/\\/www.facebook.com\\/citysun\",\"twitter\":\"https:\\/\\/www.twitter.com\\/citysun\",\"instagram\":\"https:\\/\\/www.instragram.com\\/citysun\",\"youtube\":\"https:\\/\\/www.youtube.com\\/citysun\"}', '2022-03-15 06:15:39', '2022-03-27 09:19:27'),
(2, 'slider', '{\"title\":\"Provides all the services on your doorstep...\",\"subtitle\":\"Citysun is an online Home Improvement aggregator, connecting homeowners with the best home repair professionals in their neighborhood.\"}', '2022-03-15 07:39:30', '2022-03-27 10:23:14'),
(3, 'websettings', '{\"app_title\":\"Download Mobile Apps\",\"play_store_url\":\"https:\\/\\/play.google.com\\/store\",\"app_store_url\":\"https:\\/\\/www.apple.com\\/app-store\\/\",\"app_sub_title\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\",\"testi_title\":\"Real Happy Customers, Real Stories\",\"testi_subtitle\":\"Professional hosting at an affordable price. Distinctively recaptiualize principle-centered core competencies through client-centered core competencies.\",\"contact_title\":\"Stay Tuned\",\"contact_subtitle\":\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.\"}', '2022-03-15 08:28:14', '2022-03-27 09:01:54'),
(4, 'about_text', '<p>All house owners would know, that there is always something in the house that needs to be fixed. ALWAYS! This never ends and getting them fixed is the real hassle. There’s the problem of finding the right person, and then there is this fight for negotiating the prices. Imagine this problem being solved by a tap on an application on your Smartphone. Idea The idea was to solve the day’s problem of finding a local professional for fixing basic home repair problems and to bring a change in the lives of the hundreds and thousands of professionals who are skilled but jobless or have to wander a lot to get a customer case.</p><p>CitySun.xyz aims at making this imagination a reality by connecting you to the skillful, experienced, and reliable local service professionals in your own locality at fixed nominal prices through mobile application thus making you live smarter and also enabling you to live better! Meet the team Checks out our Wall Yes, we are crazy!</p>', '2022-03-15 10:42:58', '2022-03-27 08:55:44'),
(5, 'terms', '<p><strong></strong><strong>DEFINITIONS:</strong></p><p>Parties. “You” and “your” refer to you, as a user of the Service. A “user” is someone who accesses or in any way uses the Service. “We,” “us,” and “our” refer to City Sun and its subsidiaries.Content. “Content” means text, images, photos, audio, video, and all other forms of data or communication. “Your Content” means Content that you submit or transmit to, through, or in connection with the Service, such as ratings, reviews, photos, videos, compliments, invitations, check-ins, votes, friending and following activity, direct messages, and information that you contribute to your user profile or suggest for a business page. “User Content” means Content that users submit or transmit to, through, or in connection with the Service. “City Sun Content” means Content that we create and make available in connection with the Service. “Third Party Content” means Content that originates from parties other than City Sun or its users, which is made available in connection with the Service. “Service Content” means all of the Content that is made available in connection with the Service, including Your Content, User Content, City Sun Content, and Third Party Content.<br>&nbsp; Sites and Accounts. “Consumer Site” means City Sun consumer website (www.citysun.xyz and related domains) and mobile applications. “Consumer Account” means the account you create to access or use the Consumer Site. “Business Account” means the account you create to access or use the City Sun for Business Owners website and mobile applications. “Account” means any Consumer Account or Business Account.</p><p><strong>CHANGES TO THE TERMS:</strong><br>We may modify the Terms from time to time. The most current version of the Terms will be located here. You understand and agree that your access to or use of the Service is governed by the Terms effective at the time of your access to or use of the Service. If we make material changes to these Terms, we will notify you by email, by posting a notice on the Service, and/or by other method prior to the effective date of the changes. We will also indicate at the top of this page the date that such changes were last made. You should revisit these Terms on a regular basis as revised versions will be binding on you. You understand and agree that your continued access to or use of the Service after the effective date of changes to the Terms represents your acceptance of such changes.<br></p><p><strong>USING THE SERVICE</strong></p><p>(A) Eligibility. To access or use the Service, you must have the requisite power and authority to enter into these Terms. You may not access or use the Service if you are a competitor of City Sun or if we have previously banned you from the Service or closed your account.<br>(B) Permission to Use the Service. We grant you permission to use the Service subject to these Terms. Your use of the Service is at your own risk, including the risk that you might be exposed to Content that is offensive, indecent, inaccurate, objectionable, incomplete, fails to provide adequate warning about potential risks or hazards, or is otherwise inappropriate.<br>(C) Service Availability. The Service may be modified, updated, interrupted, suspended or discontinued at any time without notice or liability.<br>(D) Accounts. You must create an account and provide certain information about yourself in order to use some of the features that are offered through the Service. You are responsible for maintaining the confidentiality of your Account password. You are also responsible for all activities that occur in connection with your Account. You agree to notify us immediately of any unauthorized use of your Account. We reserve the right to close your Account at any time for any or no reason.<br>Your Consumer Account is for your personal, non-commercial use only, and you may not create or use a Consumer Account for anyone other than yourself. We ask that you provide complete and accurate information about yourself when creating an Account in order to bolster your credibility as a contributor to the Service. You may not impersonate someone else, provide an email address other than your own, create multiple accounts, or transfer your Consumer Account to another person without CitySun prior approval. <br>(E) Communications from City Sun and Others. By accessing or using the Service, you consent to receive communications from other users and City Sun through the Service, or through any other means such as emails, push notifications, text messages (including SMS and MMS), and phone calls. These communications may promote City Sun or businesses listed on City Sun and may be initiated by City Sun, businesses listed on City Sun, or other users. You further understand that communications may be sent using an automatic telephone dialing system and that you may be charged by your phone carrier for certain communications such as SMS messages or phone calls. You agree to notify us immediately if the phone number(s) you have provided to us have been changed or disconnected. Please note that any communications, including phone calls, with City Sun or made through the Service may be monitored and recorded for quality purposes.<br></p><p><strong>GENERAL TERMS</strong><br>We reserve the right to modify, update, or discontinue the Service at our sole discretion, at any time, for any or no reason, and without notice or liability.<br>The Terms contain the entire agreement between you and us regarding the use of the Service, and supersede any prior agreement between you and us on such subject matter. The parties acknowledge that no reliance is placed on any representation made but not expressly contained in these Terms.<br>Any failure on CitySun\'s part to exercise or enforce any right or provision of the Terms does not constitute a waiver of such right or provision. The failure of either party to exercise in any respect any right provided for herein shall not be deemed a waiver of any further rights hereunder. The Terms may not be waived, except pursuant to a writing executed by City Sun.<br>If any provision of the Terms is found to be unenforceable or invalid by an arbitrator or court of competent jurisdiction, then only that provision shall be modified to reflect the parties’ intention or eliminated to the minimum extent necessary so that the Terms shall otherwise remain in full force and effect and enforceable.<br>The Terms, and any rights or obligations hereunder, are not assignable, transferable, or sublicensable by you except with City Sun prior written consent, but may be assigned or transferred by us without restriction. Any attempted assignment by you shall violate these Terms and be void.<br>You agree that no joint venture, partnership, employment, agency, a special or fiduciary relationship exists between you and City Sun as a result of these Terms or your use of the Service. <br>The section titles in the Terms are for convenience only and have no legal or contractual effect.<br><br></p>', '2022-03-15 12:31:31', '2022-03-27 08:49:00'),
(6, 'privacy', '<p><strong>Privacy Policy:</strong><br><br>This Privacy Policy governs the manner in which City sun collects, uses, maintains, and discloses information collected from users (each, a “User”) of the www.citysun.xyz website (“Site”).<br><br><strong>Personal identification information:</strong><br>We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, fill out a form, respond to a survey, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.<br>Non-personal identification information<br>We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.<br><br><strong>Web browser cookies:</strong><br>Our Site may use “cookies” to enhance the User experience. User’s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.<br>User Location Collection And Sharing<br>While Ordering: While ordering service, if the user selects his/her current location as delivery address, we ask the user to share their location. This data is stored with other order information.<br>In Address Manager: The user can store his address on Address manager in City Sun app so that he can use them later as the delivery address. This future requires location access.<br><br><strong>Feedback:</strong><br>We at City Sun have only one Aim<br>To give you the easiest and fastest way to hire a local Pro!<br>Tell us how we are doing?<br>We have a long way to go and for that we want you to partner with us, help us improve your City sun experience. Tell us even the slightest niggle you faced with the Citysun.xyz experience. So that we can improve it for you<br>We are here to improve your lifestyle, at the core we are a technology company trying to use our technical knowledge to simplify the process of finding you the best pro. Trying to help you improve your home. We know that at times you might not be completely satisfied with a pro\'s work and trust us our best people are working to bring you that utopia. For now, though, we really want you to tell us how we can make this City sun experience more awesome.<br></p>', '2022-03-15 12:36:50', '2022-03-27 08:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'ashik@gmail.com', '2022-03-27 08:08:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `title`, `comments`, `photo_link`, `created_at`, `updated_at`) VALUES
(3, 'Zabeen Yusuf Nur', 'IT Consultant, Australia', 'Such service platforms are available in other countries. I’ve personally used those when I was abroad. I’m very pleased that such a portal is available here in Bangladesh as well. Thank you citysun.xyz', 'storage/testi/1728443253528329.png', NULL, NULL),
(4, 'Zeba Fariba', 'Management Trainee', 'It was my marriage and wasn’t getting scheduled from any beauty parlor. So, I downloaded Citysun.xyz app and found that it has all of my requirements. The beautician arrived in time and was really amazing. Thank you.', 'storage/testi/1728443406489001.png', NULL, NULL),
(5, 'Arif Ur Rahman', 'IT Consultant, Bangladesh', 'Initially, I was reluctant. I wasn’t sure how an online platform would be. Citysun.xyz was able to complete the job just as I imagined it to be. Thanks to them, they made it possible.  The beautician arrived in time and was really amazing. Thank you.', 'storage/testi/1728443581118495.jpg', NULL, '2022-03-27 09:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `email_verified_at`, `photo_path`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@pixelwond.com', '$2y$10$vQMmv.vBxVQn3.3w0ZonJ.mpx5K2hUf9ChOxyc2myEl8GkUDHsBD.', '2022-03-15 04:28:34', 'storage/users/1728435905740994.webp', '1', '3ZYRLlFa9sz5LuNnLBf5Y5XT53uLjAwXey0wmLHpEquN7BbzRq264X4I68IL', NULL, '2022-03-27 07:08:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
