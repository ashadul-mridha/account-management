-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2021 at 07:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nobanno_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `action` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `action_slug` varchar(100) NOT NULL,
  `id_module` int(11) NOT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `action`, `action_slug`, `id_module`, `activation_status`) VALUES
(1, 'নতুন অডিট আপত্তি যোগ করুন', 'addComplain', 1, 'active'),
(2, 'অডিট আপত্তি তালিকা', 'compList', 1, 'active'),
(3, 'অডিট আপত্তি চলমান তালিকা', 'progComplain', 1, 'active'),
(4, 'অডিট আপত্তি মীমাংসিত তালিকা', 'solvedComplain', 1, 'active'),
(6, 'ইউজার যুক্ত করুন', 'users', 3, 'active'),
(13, 'ইউজারের তালিকা', 'userRole', 3, 'active'),
(14, 'রোল অ্যাক্সেস', 'roleAccess', 3, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `add_products`
--

CREATE TABLE `add_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_rent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_products`
--

INSERT INTO `add_products` (`id`, `supplier_name`, `product_name`, `product_price`, `product_quantity`, `car_rent`, `other_cost`, `notes`, `created_at`, `updated_at`) VALUES
(7, '5', 'R15 V.3', '500000', '1', '1000', '500', 'Jisan Supplier a bike', '2021-04-12 21:32:42', '2021-04-12 21:32:42'),
(8, '5', 'Computer', '70000', '1', '500', '100', 'Jisan Supplier a Computer', '2021-04-12 23:29:18', '2021-04-12 23:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `all_massages`
--

CREATE TABLE `all_massages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_massages`
--

INSERT INTO `all_massages` (`id`, `supplier_id`, `phonebook_id`, `mobile_num`, `address`, `sms`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', '01613503047', 'Gournodi', 'Hi', '2021-03-29 05:46:22', '2021-03-29 05:46:22'),
(2, NULL, '1', '01613503047', 'Gournodi', 'Hello Ashadul Mridha.\r\nDo You Need Money?', '2021-03-30 21:52:34', '2021-03-30 21:52:34'),
(3, '3', NULL, '0183424234', 'Faridpur', 'hi', '2021-03-31 04:42:41', '2021-03-31 04:42:41'),
(4, '3', NULL, '0183424234', 'Faridpur', 'hi', '2021-03-31 04:46:25', '2021-03-31 04:46:25'),
(5, '3', NULL, '0183424234', 'Faridpur', 'hi', '2021-03-31 04:47:12', '2021-03-31 04:47:12'),
(6, '3', NULL, '0183424234', 'Faridpur', 'hi', '2021-03-31 04:49:15', '2021-03-31 04:49:15'),
(7, NULL, '1', '01613503047', 'Gournodi', 'Hi Do You Need Money', '2021-03-31 05:05:52', '2021-03-31 05:05:52');

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE `balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `balances`
--

INSERT INTO `balances` (`id`, `amount`, `bank_id`, `note`, `create_date`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`) VALUES
(1, '100000', '1', 'sdfsd', '100000', 'Admin', NULL, NULL, '2021-03-23 06:08:01', '2021-03-23 06:08:01'),
(2, '50000', '2', 'test', '50000', 'Admin', NULL, NULL, '2021-03-24 03:05:59', '2021-03-24 03:05:59'),
(3, '50000', '4', 'Frist Crieate Balance', '50000', 'Admin', NULL, NULL, '2021-03-24 05:50:59', '2021-03-24 05:50:59'),
(4, '50000', '4', 'Add Balanced to account', '50000', 'Admin', NULL, NULL, '2021-03-31 05:00:49', '2021-03-31 05:00:49'),
(5, '50000', '6', 'Sani Add Balance 50k Taka', '50000', 'Ashadul Mridha', NULL, NULL, '2021-04-07 04:46:41', '2021-04-07 04:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `name`, `account_name`, `account_number`, `account_type`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Datch Bangla Bank', 'Ashadul Mridha', '7017413581126', 'personal', 'Gournodi', '2021-03-18 05:54:18', '2021-03-18 05:54:18'),
(2, 'NRBC Bank', 'Zarif Khan', '718069307', 'personal', 'Dhaka', '2021-03-22 04:00:08', '2021-03-22 04:00:08'),
(4, 'City Bank', 'John Doe', '01718069307', 'personal', 'Gournodi', '2021-03-24 05:02:57', '2021-03-24 05:02:57'),
(5, 'City Bank', 'Decode Lab', '01915002401', 'personal', 'Dhaka', '2021-03-25 00:41:06', '2021-03-25 00:41:06'),
(6, 'Sonali Bank', 'Sani', '5432829342', 'personal', 'Jhalokathi', '2021-04-03 10:54:11', '2021-04-03 10:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherorhusband` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motherorwife` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_photo_front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_photo_back` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `photo`, `fatherorhusband`, `motherorwife`, `mobile_num`, `nid_num`, `account_number`, `address`, `nid_photo_front`, `nid_photo_back`, `created_at`, `updated_at`) VALUES
(1, 'Ashadul Mridha', '20210318115323.jpg', 'Habul', 'Jeba', '01718069307', '12345676556', '7017413581126', 'Gournodi', '20210318115323.jpg', '20210318115323.jpg', '2021-03-18 05:53:23', '2021-03-18 05:53:23'),
(4, 'Kalam', '20210407104416.jpg', 'Abdullah Khan', 'Ameena Begum', '01715244010', '24234235', '852434435', 'Gournodi', '20210407104416.jpg', '20210407104416.jpg', '2021-04-07 04:44:16', '2021-04-07 04:44:16');

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
(4, '2021_03_09_102628_create_members_table', 2),
(5, '2021_03_14_035926_create_bank_accounts_table', 2),
(6, '2021_03_14_063324_create_nominis_table', 2),
(7, '2021_03_14_094306_create_suppliers_table', 2),
(8, '2021_03_15_092247_create_transactions_table', 2),
(9, '2021_03_15_122132_create_paymentinfos_table', 2),
(12, '2021_03_23_035900_create_transactioncals_table', 3),
(13, '2021_03_23_114555_create_balances_table', 4),
(14, '2021_03_28_092752_create_phone_books_table', 5),
(16, '2021_03_29_060045_create_send_s_m_s_table', 6),
(17, '2021_03_29_112117_create_all_massages_table', 6),
(18, '2021_04_02_120343_create_permission_tables', 7),
(19, '2021_04_07_025006_create_permission_tables', 8),
(20, '2021_04_08_043114_create_add_products_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `nominis`
--

CREATE TABLE `nominis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fatherorhusband` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motherorwife` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_photo_front` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_photo_back` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominis`
--

INSERT INTO `nominis` (`id`, `name`, `member_id`, `photo`, `fatherorhusband`, `motherorwife`, `mobile_num`, `nid_num`, `account_number`, `address`, `nid_photo_front`, `nid_photo_back`, `created_at`, `updated_at`) VALUES
(1, 'Zarif khan', '1', '20210318122032.jpg', 'Rony', 'Popy', '01718069307', '1234567655634', '3245346457', 'Faridpur', '20210318122032.jpg', '20210318122032.jpg', '2021-03-18 06:20:32', '2021-03-18 06:20:32');

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
-- Table structure for table `paymentinfos`
--

CREATE TABLE `paymentinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `bussniess_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reasone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentinfos`
--

INSERT INTO `paymentinfos` (`id`, `member_id`, `bussniess_name`, `transaction_type`, `reasone`, `trade`, `family_number`, `bank_id`, `note`, `amount`, `pay_type`, `create_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Real State', 'saving', 'Future Money', 'vpnom', '01715244010', 1, 'This Is my first Saving', '50000', 'check', NULL, '2021-03-18 06:00:59', '2021-03-18 06:00:59'),
(2, 1, 'Car', 'loan', 'No money', '654645', '34534538', 1, 'Need Money', '200000', 'cash', NULL, '2021-03-18 06:14:06', '2021-03-18 06:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `phone_books`
--

CREATE TABLE `phone_books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_books`
--

INSERT INTO `phone_books` (`id`, `name`, `mobile_number`, `address`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Ashadul Mridha', '01613503047', 'Gournodi', 'Data Update successful', '2021-03-28 03:52:53', '2021-03-28 04:23:14'),
(3, 'Ashadul Islam', '01718069307', 'Gournodi', 'This Is My All Time Phone Number', '2021-03-28 23:16:36', '2021-03-28 23:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `mobile_number`, `account_number`, `type`, `service`, `address`, `created_at`, `updated_at`) VALUES
(4, 'ROJI', '01317375121', '01317375121', 'customer', 'hjfgh rfghf', 'Faridpur', '2021-03-21 03:19:25', '2021-04-10 21:56:13'),
(5, 'Jisan Mridha', '01715244010', '01715244010', 'customer', 'Mobile', 'Barishal', '2021-04-10 22:00:18', '2021-04-10 22:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `transactioncals`
--

CREATE TABLE `transactioncals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Delete_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactioncals`
--

INSERT INTO `transactioncals` (`id`, `bank_id`, `supplier_id`, `pay_type`, `check_num`, `amount`, `notes`, `cr`, `dr`, `user_id`, `created_by`, `Updated_by`, `Delete_by`, `created_at`, `updated_at`) VALUES
(1, '1', '5', 'cash', NULL, '5000', 'zisan get 5 hazar', NULL, '5000', '1', 'Admin', NULL, NULL, '2021-04-13 01:11:37', '2021-04-13 01:11:37'),
(2, '1', '5', 'cash', NULL, '500000', 'Jisan Fixed 5 lakh Taka', '500000', NULL, '1', 'Admin', NULL, NULL, '2021-04-13 01:15:42', '2021-04-13 01:15:42'),
(3, '1', '5', 'check', '4243543523', '100000', 'zisan Fixed 1 lakh', '100000', NULL, '1', 'Admin', NULL, NULL, '2021-04-13 01:21:50', '2021-04-13 01:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment_id`, `member_id`, `bank_id`, `amount`, `check_num`, `dr`, `cr`, `create_by`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 1, '50000', '353535390004543', NULL, '50000', NULL, '2021-03-18 06:00:59', '2021-03-18 06:00:59'),
(2, '2', 1, 1, '200000', NULL, '200000', NULL, NULL, '2021-03-18 06:14:06', '2021-03-18 06:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `activation_status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `role`, `image`, `created_by`, `activation_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '01914862630', 'admin', '1616066929.jpg', 0, 'active', NULL, NULL, NULL),
(66, 'Ashadul Mridha', 'asad@gmail.com', NULL, '25d55ad283aa400af464c76d713c07ad', '01718069307', 'admin', NULL, NULL, 'active', NULL, '2021-04-07 10:41:37', '2021-04-07 10:41:37'),
(67, 'zerin Mridha', 'zerin@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', '01915002401', 'user', NULL, NULL, 'active', NULL, '2021-04-13 07:52:38', '2021-04-13 07:52:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `action_slug` (`action_slug`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `add_products`
--
ALTER TABLE `add_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_massages`
--
ALTER TABLE `all_massages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `balances`
--
ALTER TABLE `balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominis`
--
ALTER TABLE `nominis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paymentinfos_member_id_foreign` (`member_id`),
  ADD KEY `paymentinfos_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `phone_books`
--
ALTER TABLE `phone_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactioncals`
--
ALTER TABLE `transactioncals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`),
  ADD KEY `transactions_bank_id_foreign` (`bank_id`);

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
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `add_products`
--
ALTER TABLE `add_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `all_massages`
--
ALTER TABLE `all_massages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `balances`
--
ALTER TABLE `balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nominis`
--
ALTER TABLE `nominis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phone_books`
--
ALTER TABLE `phone_books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactioncals`
--
ALTER TABLE `transactioncals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id`);

--
-- Constraints for table `paymentinfos`
--
ALTER TABLE `paymentinfos`
  ADD CONSTRAINT `paymentinfos_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank_accounts` (`id`),
  ADD CONSTRAINT `paymentinfos_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `bank_accounts` (`id`),
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
