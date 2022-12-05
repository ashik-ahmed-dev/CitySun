-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2022 at 11:38 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starautopower_citysun`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `icon` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Air-conditioner', 'air-conditioner', 'icon/Kbw6UfH2zNVlgrs6Q7Sp2cqDxo0G0phM9jhwrRqw.png', '2022-12-03 19:13:37', '2022-12-04 03:03:50'),
(2, 'Home Appliance', 'home-appliance', 'icon/9NcjOJNIiGS5PFAGsWf0zxQKIMz7aRGiszWWcLAd.png', '2022-12-03 19:19:13', '2022-12-04 03:03:59'),
(3, 'Cleaning Service', 'cleaning-service', 'icon/fwTkPN7urB6S3lLh12jfi9bXkMESbnccOSBJFSSX.png', '2022-12-03 19:19:32', '2022-12-04 03:04:08'),
(4, 'Electronic Gadgets', 'electronic-gadgets', 'icon/JFzBJFlhuRzGsZmpP3rYXS6UPclKoOqloEfGgPwi.png', '2022-12-03 19:19:55', '2022-12-04 03:04:18'),
(5, 'Building Solution', 'building-solution', 'icon/DE5oI3Iu6E2SQzPiyPig12s3aTAIsw0lPm92joTM.png', '2022-12-03 19:20:13', '2022-12-04 03:04:28'),
(6, 'Home Security', 'home-security', 'icon/yvwnTYNtcckJQWaNIn4jDbFdQyWXBTcPRVwId0u9.png', '2022-12-03 19:20:34', '2022-12-04 03:04:37'),
(7, 'Refrigerator Services', 'refrigerator-services', 'icon/GJoiSnWPfWpA91qE4H31znJOaK763DbClFOGVzKk.png', '2022-12-03 19:21:00', '2022-12-04 03:04:46'),
(8, 'RO-Repair Services', 'ro-repair-services', 'icon/viBW0dnNbpfthLh88HJ7dAl21yPwr1H5fEgpRJ9A.png', '2022-12-03 19:21:11', '2022-12-04 03:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_09_044652_create_contacts_table', 1),
(6, '2022_03_09_095630_create_settings_table', 1),
(7, '2022_03_12_211913_create_services_table', 1),
(8, '2022_03_15_111511_create_orders_table', 1),
(9, '2022_03_15_135528_create_testimonials_table', 1),
(10, '2022_03_22_150839_create_categories_table', 1),
(11, '2022_03_27_140456_create_subscribers_table', 1),
(12, '2022_03_30_125145_create_jobs_table', 1),
(13, '2022_12_03_154448_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_price` double(8,2) NOT NULL,
  `type` varchar(191) DEFAULT NULL,
  `payment_number` varchar(191) DEFAULT NULL,
  `TrxID` varchar(191) DEFAULT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'pending',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(191) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `category_id` varchar(191) NOT NULL,
  `short_text` text NOT NULL,
  `description` longtext NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount_price` double(8,2) DEFAULT NULL,
  `thumbnail` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'general', '{\"facebook\":\"https:\\/\\/www.facebook.com\\/CitySun.xyz\\/\",\"twitter\":\"https:\\/\\/www.twitter.com\\/CitySun.xyz\\/\",\"instagram\":\"https:\\/\\/www.instragram.com\\/CitySun.xyz\\/\",\"youtube\":\"https:\\/\\/www.youtube.com\\/CitySun.xyz\\/\",\"email\":\"citysun.xyz@gmail.com\",\"phone\":\"01400-868830\",\"address\":\"Ka-21\\/F, South Kuril, Vatara,1229, Dhaka, Bangladesh\",\"site_title\":\"Citysun is an online Home Improvement aggregator\",\"meta_description\":\"Citysun is an online Home Improvement aggregator, that connects homeowners with the best home repair professionals in their neighborhood.\",\"newslatter_text\":\"Any Service, Any Time, Anywhere. Give us your mobile number. You\\u2019ll get an SMS with the app download link.\",\"footer_text\":\"Citysun is an online Home Improvement aggregator, connecting homeowners with the best home repair professionals in their neighborhood.\",\"analytics_code\":null,\"verification\":null}', '2022-03-15 16:15:39', '2022-12-03 19:58:13'),
(2, 'slider', '{\"title\":\"Provides all the services on your doorstep...\",\"subtitle\":\"Citysun is an online Home Improvement aggregator, connecting homeowners with the best home repair professionals in their neighborhood.\"}', '2022-03-15 17:39:30', '2022-12-03 19:24:39'),
(4, 'about_text', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">All house owners would know, that there is always something in the house that needs to be fixed. ALWAYS! This never ends and getting them fixed is the real hassle. There’s the problem of finding the right person, and then there is this fight for negotiating the prices. Imagine this problem being solved by a tap on an application on your Smartphone. Idea The idea was to solve the day’s problem of finding a local professional for fixing basic home repair problems and to bring a change in the lives of the hundreds and thousands of professionals who are skilled but jobless or have to wander a lot to get a customer case.</p><p style=\"margin-right: 0px; margin-bottom: 1rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">CitySun.xyz aims at making this imagination a reality by connecting you to the skillful, experienced, and reliable local service professionals in your own locality at fixed nominal prices through mobile application thus making you live smarter and also enabling you to live better! Meet the team Checks out our Wall Yes, we are crazy!</p>', '2022-03-15 20:42:58', '2022-12-03 20:00:56'),
(5, 'terms', '<p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">DEFINITIONS:</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">Parties. “You” and “your” refer to you, as a user of the Service. A “user” is someone who accesses or in any way uses the Service. “We,” “us,” and “our” refer to City Sun and its subsidiaries.Content. “Content” means text, images, photos, audio, video, and all other forms of data or communication. “Your Content” means Content that you submit or transmit to, through, or in connection with the Service, such as ratings, reviews, photos, videos, compliments, invitations, check-ins, votes, friending and following activity, direct messages, and information that you contribute to your user profile or suggest for a business page. “User Content” means Content that users submit or transmit to, through, or in connection with the Service. “City Sun Content” means Content that we create and make available in connection with the Service. “Third Party Content” means Content that originates from parties other than City Sun or its users, which is made available in connection with the Service. “Service Content” means all of the Content that is made available in connection with the Service, including Your Content, User Content, City Sun Content, and Third Party Content.<br>&nbsp; Sites and Accounts. “Consumer Site” means City Sun consumer website (www.citysun.xyz and related domains) and mobile applications. “Consumer Account” means the account you create to access or use the Consumer Site. “Business Account” means the account you create to access or use the City Sun for Business Owners website and mobile applications. “Account” means any Consumer Account or Business Account.</p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">CHANGES TO THE TERMS:</span><br>We may modify the Terms from time to time. The most current version of the Terms will be located here. You understand and agree that your access to or use of the Service is governed by the Terms effective at the time of your access to or use of the Service. If we make material changes to these Terms, we will notify you by email, by posting a notice on the Service, and/or by other method prior to the effective date of the changes. We will also indicate at the top of this page the date that such changes were last made. You should revisit these Terms on a regular basis as revised versions will be binding on you. You understand and agree that your continued access to or use of the Service after the effective date of changes to the Terms represents your acceptance of such changes.<br></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">USING THE SERVICE</span></p><p style=\"margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">(A) Eligibility. To access or use the Service, you must have the requisite power and authority to enter into these Terms. You may not access or use the Service if you are a competitor of City Sun or if we have previously banned you from the Service or closed your account.<br>(B) Permission to Use the Service. We grant you permission to use the Service subject to these Terms. Your use of the Service is at your own risk, including the risk that you might be exposed to Content that is offensive, indecent, inaccurate, objectionable, incomplete, fails to provide adequate warning about potential risks or hazards, or is otherwise inappropriate.<br>(C) Service Availability. The Service may be modified, updated, interrupted, suspended or discontinued at any time without notice or liability.<br>(D) Accounts. You must create an account and provide certain information about yourself in order to use some of the features that are offered through the Service. You are responsible for maintaining the confidentiality of your Account password. You are also responsible for all activities that occur in connection with your Account. You agree to notify us immediately of any unauthorized use of your Account. We reserve the right to close your Account at any time for any or no reason.<br>Your Consumer Account is for your personal, non-commercial use only, and you may not create or use a Consumer Account for anyone other than yourself. We ask that you provide complete and accurate information about yourself when creating an Account in order to bolster your credibility as a contributor to the Service. You may not impersonate someone else, provide an email address other than your own, create multiple accounts, or transfer your Consumer Account to another person without CitySun prior approval.<br>(E) Communications from City Sun and Others. By accessing or using the Service, you consent to receive communications from other users and City Sun through the Service, or through any other means such as emails, push notifications, text messages (including SMS and MMS), and phone calls. These communications may promote City Sun or businesses listed on City Sun and may be initiated by City Sun, businesses listed on City Sun, or other users. You further understand that communications may be sent using an automatic telephone dialing system and that you may be charged by your phone carrier for certain communications such as SMS messages or phone calls. You agree to notify us immediately if the phone number(s) you have provided to us have been changed or disconnected. Please note that any communications, including phone calls, with City Sun or made through the Service may be monitored and recorded for quality purposes.<br></p><p style=\"margin-right: 0px; margin-bottom: 1rem; margin-left: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bolder; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">GENERAL TERMS</span><br>We reserve the right to modify, update, or discontinue the Service at our sole discretion, at any time, for any or no reason, and without notice or liability.<br>The Terms contain the entire agreement between you and us regarding the use of the Service, and supersede any prior agreement between you and us on such subject matter. The parties acknowledge that no reliance is placed on any representation made but not expressly contained in these Terms.<br>Any failure on CitySun\'s part to exercise or enforce any right or provision of the Terms does not constitute a waiver of such right or provision. The failure of either party to exercise in any respect any right provided for herein shall not be deemed a waiver of any further rights hereunder. The Terms may not be waived, except pursuant to a writing executed by City Sun.<br>If any provision of the Terms is found to be unenforceable or invalid by an arbitrator or court of competent jurisdiction, then only that provision shall be modified to reflect the parties’ intention or eliminated to the minimum extent necessary so that the Terms shall otherwise remain in full force and effect and enforceable.<br>The Terms, and any rights or obligations hereunder, are not assignable, transferable, or sublicensable by you except with City Sun prior written consent, but may be assigned or transferred by us without restriction. Any attempted assignment by you shall violate these Terms and be void.<br>You agree that no joint venture, partnership, employment, agency, a special or fiduciary relationship exists between you and City Sun as a result of these Terms or your use of the Service.<br>The section titles in the Terms are for convenience only and have no legal or contractual effect.</p>', '2022-03-15 22:31:31', '2022-12-03 20:02:03'),
(6, 'privacy', '<p><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bolder; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">Privacy Policy:</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">This Privacy Policy governs the manner in which City sun collects, uses, maintains, and discloses information collected from users (each, a “User”) of the www.citysun.xyz website (“Site”).</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bolder; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">Personal identification information:</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We may collect personal identification information from Users in a variety of ways, including, but not limited to, when Users visit our site, register on the site, place an order, fill out a form, respond to a survey, and in connection with other activities, services, features or resources we make available on our Site. Users may be asked for, as appropriate, name, email address, mailing address, phone number. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain Site related activities.</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Non-personal identification information</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer and technical information about Users means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bolder; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">Web browser cookies:</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Our Site may use “cookies” to enhance the User experience. User’s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert you when cookies are being sent. If they do so, note that some parts of the Site may not function properly.</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">User Location Collection And Sharing</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">While Ordering: While ordering service, if the user selects his/her current location as delivery address, we ask the user to share their location. This data is stored with other order information.</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">In Address Manager: The user can store his address on Address manager in City Sun app so that he can use them later as the delivery address. This future requires location access.</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: bolder; font-stretch: inherit; font-size: 16px; line-height: inherit; font-family: &quot;Open Sans&quot;, sans-serif; vertical-align: baseline; color: rgb(105, 105, 105);\">Feedback:</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We at City Sun have only one Aim</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">To give you the easiest and fastest way to hire a local Pro!</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">Tell us how we are doing?</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We have a long way to go and for that we want you to partner with us, help us improve your City sun experience. Tell us even the slightest niggle you faced with the Citysun.xyz experience. So that we can improve it for you</span><br style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\"><span style=\"color: rgb(105, 105, 105); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px;\">We are here to improve your lifestyle, at the core we are a technology company trying to use our technical knowledge to simplify the process of finding you the best pro. Trying to help you improve your home. We know that at times you might not be completely satisfied with a pro\'s work and trust us our best people are working to bring you that utopia. For now, though, we really want you to tell us how we can make this City sun experience more awesome.</span><br></p>', '2022-03-15 22:36:50', '2022-12-03 20:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
  `comments` text NOT NULL,
  `photo_link` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo_path` varchar(191) DEFAULT NULL,
  `role` varchar(191) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `email_verified_at`, `photo_path`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@pixelwond.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-03-15 14:28:34', 'images/users/1727370207862851.webp', '1', '3ZYRLlFa9sz5LuNnLBf5Y5XT53uLjAwXey0wmLHpEquN7BbzRq264X4I68IL', NULL, '2022-03-15 22:57:38');

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
