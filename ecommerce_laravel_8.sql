-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 12, 2021 lúc 06:02 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce_laravel_8`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MC Wai', 'dovanvinhwao@gmail.com', NULL, '$2y$10$sVv.szO5/dnP2VJB4kn6G.r9mg6k.ytv9MVJN/PmiTfVvxjOq8z0a', 0, 'huRbCHuAeKPe0oJJrzrlbxIqR5hJYq0IFXwuxHjsifcwIqYBcokBfozMez6Y', '2021-07-21 21:24:36', '2021-07-21 21:24:36'),
(2, 'do van vinh', 'vinhdvpd04097@fpt.edu.vn', NULL, '$2y$10$GEqSQUrB4gYjD0PD5nCLDuVa30ALsgS53zu/elYlTwfsBJnrqIIqq', 0, NULL, '2021-08-11 21:45:04', '2021-08-11 21:45:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role`
--

CREATE TABLE `admin_role` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_role`
--

INSERT INTO `admin_role` (`admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-08-12 08:27:41', '2021-08-12 08:27:41'),
(2, 3, '2021-08-12 08:44:00', '2021-08-12 08:44:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_first` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_second` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `image`, `subtitle`, `title_first`, `title_second`, `created_at`, `updated_at`) VALUES
(1, 'NEW COLLECTION ONE', 'hero_slider/hero-slider-1.jpg', 'NEW COLLECTION', 'New Series Of', 'Degital Watch', '2021-07-23 01:25:55', '2021-07-23 01:25:55'),
(2, 'NEW COLLECTION TWO', 'hero_slider/hero-slider-2.jpg', 'NEW COLLECTION', 'Best of Hifi', 'Loud Speaker', '2021-07-23 01:26:24', '2021-07-23 01:26:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Mac', 0, 'mac', '2021-07-21 21:50:52', '2021-07-21 21:50:52'),
(2, 'iPad', 0, 'ipad', '2021-07-21 21:50:59', '2021-07-21 21:50:59'),
(3, 'iPhone', 0, 'iphone', '2021-07-21 21:51:07', '2021-07-21 21:51:07'),
(4, 'Music', 0, 'music', '2021-07-21 21:51:19', '2021-07-21 21:51:19'),
(5, 'Watch', 0, 'watch', '2021-07-21 21:51:22', '2021-07-21 21:51:22'),
(7, 'test', 5, 'test', '2021-08-12 08:07:47', '2021-08-12 08:07:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'do van vinh', 'vinhdvpd04097@fpt.edu.vn', '$2y$10$2V4xQ6ewJ8lscHhkU6S0B.J7hr2iMznum/6jzpWI4J3nPTbi5fDVe', '0987654321', '23, Le Van Thinh, Da Nang', NULL, '2021-07-28 01:05:31', '2021-07-28 01:05:31'),
(2, 'vinh dz', 'user1@gmail.ccom', '$2y$10$aMHt0FImoiY8KH.EhefhjO3slT3vM1U1cnRKS70O.cmEGrWRO18A.', '0987654321', '23, Le Van Thinh, Da Nang', NULL, '2021-07-28 02:04:03', '2021-07-28 02:04:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_19_000000_create_failed_jobs_table', 1),
(13, '2021_07_17_040746_create_admin_table', 1),
(14, '2021_07_18_131258_create_category_table', 1),
(15, '2021_07_18_133456_create_product_table', 1),
(16, '2021_07_20_143814_create_banner_table', 1),
(17, '2021_07_22_041816_create_variant_product_table', 1),
(18, '2021_07_28_022140_create_customer_table', 2),
(21, '2021_07_28_132641_create_order_table', 3),
(22, '2021_07_28_133242_create_order_detail_table', 3),
(24, '2021_08_01_132349_create_review_table', 4),
(25, '2021_08_04_143615_create_setting_link_table', 5),
(26, '2021_08_11_081315_create_role_table', 6),
(27, '2021_08_11_081402_create_admin_role_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `name`, `email`, `phone`, `address`, `note`, `id_customer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'do van vinh', 'vinhdvpd04097@fpt.edu.vn', '0987654321', '23, Le Van Thinh, Da Nang', 'pls shipping fast help me.', 1, 2, '2021-07-28 07:35:19', '2021-07-28 21:06:40'),
(2, 'vinh dz', 'user1@gmail.ccom', '0987654321', '23, Le Van Thinh, Da Nang', 'pls shipping fast help me.', 2, 0, '2021-07-28 07:37:18', '2021-07-28 07:37:18'),
(3, 'vinh dz', 'user1@gmail.ccom', '0987654321', '23, Le Van Thinh, Da Nang', 'image beauty', 2, 1, '2021-07-28 19:35:40', '2021-07-28 21:14:07'),
(4, 'vinh dz', 'user1@gmail.ccom', '0987654321', '23, Le Van Thinh, Da Nang', 'ggvhvgvh', 2, 0, '2021-07-29 01:10:56', '2021-07-29 01:10:56'),
(5, 'do van vinh', 'vinhdvpd04097@fpt.edu.vn', '0987654321', '23, Le Van Thinh, Da Nang', 'hahaha', 1, 0, '2021-08-01 01:58:27', '2021-08-01 01:58:27'),
(6, 'do van vinh', 'vinhdvpd04097@fpt.edu.vn', '0987654321', '23, Le Van Thinh, Da Nang', NULL, 1, 0, '2021-08-01 02:00:10', '2021-08-01 02:00:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_order` int(10) UNSIGNED NOT NULL,
  `id_variant_product` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(9,3) NOT NULL,
  `price` double(9,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_variant_product`, `name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 29, 'Apple AirPods Max', 1.000, 400.000, '2021-07-28 07:35:19', '2021-07-28 07:35:19'),
(2, 1, 13, 'Apple Mac Mini (2020) M1 Chip', 3.000, 849.000, '2021-07-28 07:35:19', '2021-07-28 07:35:19'),
(3, 2, 29, 'Apple AirPods Max', 1.000, 400.000, '2021-07-28 07:37:18', '2021-07-28 07:37:18'),
(4, 2, 13, 'Apple Mac Mini (2020) M1 Chip', 3.000, 849.000, '2021-07-28 07:37:18', '2021-07-28 07:37:18'),
(5, 3, 11, 'Apple iPhone 12 64GB', 2.000, 1089.000, '2021-07-28 19:35:40', '2021-07-28 19:35:40'),
(6, 3, 6, 'Apple iPhone 11 64GB', 3.000, 609.000, '2021-07-28 19:35:40', '2021-07-28 19:35:40'),
(7, 4, 22, 'Apple iPad Air 10.9-inch, 64GB', 2.000, 700.000, '2021-07-29 01:10:56', '2021-07-29 01:10:56'),
(8, 4, 2, 'Apple iPhone 12 Pro Max 128GB', 1.000, 1132.000, '2021-07-29 01:10:56', '2021-07-29 01:10:56'),
(9, 5, 28, 'Apple AirPods Pro', 1.000, 300.000, '2021-08-01 01:58:27', '2021-08-01 01:58:27'),
(10, 5, 26, 'Apple 11-inch iPad Pro 128GB', 1.000, 1099.000, '2021-08-01 01:58:27', '2021-08-01 01:58:27'),
(11, 6, 32, 'Apple EarPods', 1.000, 12.000, '2021-08-01 02:00:11', '2021-08-01 02:00:11'),
(12, 6, 22, 'Apple iPad Air 10.9-inch, 64GB', 3.000, 700.000, '2021-08-01 02:00:11', '2021-08-01 02:00:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image`, `status`, `id_category`, `created_at`, `updated_at`) VALUES
(2, 'Apple iPhone 12 Pro Max 128GB', '<p>iPhone 12 Pro Max. Larger 6.7-inch Super Retina XDR display (1). Ceramic Shield with 4 times better drop resistance (2). Take stunning photos in low light with the ultimate professional iPhone camera system and 5x optical zoom range. Film, edit, and play cinema-grade Dolby Vision video. Take Night mode portraits and experience a new level of augmented reality with the LiDAR Scanner. Powerful A14 Bionic chip. For endless impressive possibilities.</p><p>iPhone 12 Pro Max. Larger 6.7-inch Super Retina XDR display (1). Ceramic Shield with 4 times better drop resistance (2). Take stunning photos in low light with the ultimate professional iPhone camera system and 5x optical zoom range. Film, edit, and play cinema-grade Dolby Vision video. Take Night mode portraits and experience a new level of augmented reality with the LiDAR Scanner. Powerful A14 Bionic chip. For endless impressive possibilities.</p><p><br></p><p>Salient features:</p><p><span style=\"white-space:pre\">					</span>• 6.7 inch Super Retina XDR display (1)</p><p><span style=\"white-space:pre\">					</span>• Ceramic Shield, the toughest glass ever on a smartphone</p><p><span style=\"white-space:pre\">					</span>• A14 Bionic, the fastest chip ever on a smartphone</p><p style=\"text-align: left;\"><span style=\"white-space:pre\">					</span>• 12MP professional camera system with Ultra Wide, Wide and Telephoto cameras; 5x optical zoom range; Night mode, Deep Fusion, 3rd generation Smart HDR, Apple ProRAW (3), and Dolby Vision 4K HDR video recording</p><p><span style=\"white-space:pre\">					</span>• LiDAR Scanner improves augmented reality and Night mode portrait photography</p><p><span style=\"white-space:pre\">					</span>• 12MP TrueDepth front camera with Night mode and 4K . HDR Dolby Vision video recording capabilities</p><p><span style=\"white-space:pre\">					</span>• Market-leading IP68 water resistance (4)</p><p><span style=\"white-space:pre\">					</span>• iOS 14 with redesigned Home screen widgets, brand new App Gallery, App Clips and more</p><p><br></p><p>Juridical</p><p><span style=\"white-space:pre\">					</span>(1) The screen has rounded corners. When measured in rectangles, the screen size is 6.68 inches diagonally. Actual display area is smaller.</p><p><span style=\"white-space:pre\">					</span>(2) Confirmation based on the Ceramic Shield front of the iPhone 12 Pro Max compared to the previous generation iPhone.</p><p><span style=\"white-space:pre\">					</span>(3) Apple ProRAW coming soon.</p><p><span style=\"white-space:pre\">					</span>(4) iPhone 12 Pro Max is splashproof, waterproof and dustproof. The product has been tested under controlled laboratory conditions to an IP68 rating according to IEC 60529 (water resistant up to 6 meters for up to 30 minutes). Jet resistance, water resistance and dust resistance are not permanent conditions. This capacity may be reduced due to normal wear and tear. Do not charge while iPhone is wet. Please refer to the user manual for instructions on how to clean and dry the machine. Damage caused by liquid infiltration is not covered under warranty.</p><p><span style=\"white-space:pre\">					</span></p><p><span style=\"white-space:pre\">					</span>The product set includes:</p><p><span style=\"white-space:pre\">					</span>•<span style=\"white-space:pre\">	</span>Phone</p><p><span style=\"white-space:pre\">					</span>• Charging cord</p><p><span style=\"white-space:pre\">					</span>• User manual 12 months electronic warranty.</p>', 'graphite-_2_.png', 0, 3, '2021-07-22 00:32:20', '2021-07-22 06:11:53'),
(3, 'Apple iPhone 11 64GB', '<p>Capture 4K video, take stunning portraits, and capture wide landscapes with the all-new dual-camera system. Take stunning photos in low light with Night mode. View photos, videos, and games in true-to-life color on the 6.1-inch Liquid Retina display (3). Experience unprecedented performance with the A13 Bionic chip for gaming, augmented reality (AR), and photography. Get more done and charge less with all-day battery life (2). And worry less thanks to water resistance up to 2 meters for 30 minutes (1).</p><p><br></p><p><span style=\"white-space:pre\">					</span><b>Salient features</b></p><p><span style=\"white-space:pre\">					</span>• 6.1 inch Liquid Retina HD LCD display (3)</p><p><span style=\"white-space:pre\">					</span>• Water and dust resistant (2 meters waterproof for up to 30 minutes, IP68 rating) (1)</p><p><span style=\"white-space:pre\">					</span>• Dual 12MP camera system with Ultra Wide and Wide cameras; Night mode, Portrait mode and 4K video up to 60fps</p><p><span style=\"white-space:pre\">					</span>• 12MP TrueDepth front camera with Portrait mode, 4K video recording and slow motion video</p><p><span style=\"white-space:pre\">					</span>• Secure authentication with Face ID</p><p><span style=\"white-space:pre\">					</span>• A13 Bionic chip with third generation Neural Engine</p><p><span style=\"white-space:pre\">					</span>• Fast charging capability</p><p><span style=\"white-space:pre\">					</span>• Wireless Charging (4)</p><p><span style=\"white-space:pre\">					</span>• iOS 13 with Dark Mode, new photo and video editing tools, and all-new privacy features</p><p><br></p><p><span style=\"white-space:pre\">					</span><b>Juridical:</b></p><p><span style=\"white-space:pre\">					</span>(1) iPhone 11 is splash-proof, water-proof, and dust-proof. The product has been tested under controlled laboratory conditions to an IP68 rating according to IEC 60529 (water resistant up to 2 meters for up to 30 minutes). Spray resistance, water resistance, and dust resistance are not permanent conditions and this ability can be reduced due to normal wear and tear. Do not charge while iPhone is wet. Please refer to the user manual for instructions on how to clean and dry the machine. Damage caused by liquid infiltration is not covered under warranty.</p><p><span style=\"white-space:pre\">					</span>(2) Battery life varies by usage and configuration. Visit www.apple.com/batteries for more information.</p><p><span style=\"white-space:pre\">					</span>(3) The screen has rounded corners. When measured in rectangles, the iPhone 11 screen size is 6.06 inches diagonally. Actual display area is smaller.</p><p><span style=\"white-space:pre\">					</span>(4) Qi wireless charger not included.</p><p><br></p><p><span style=\"white-space:pre\">					</span>The product set includes:</p><p><span style=\"white-space:pre\">					</span>•<span style=\"white-space:pre\">	</span>Phone</p><p><span style=\"white-space:pre\">					</span>• Charging cable</p><p><span style=\"white-space:pre\">					</span>• Charger + Headphones (For products manufactured before 10/2020)</p><p><span style=\"white-space:pre\">					</span>• User manual 12 months electronic warranty.</p>', 'AnyConv-com__fa1c711b31f401fda182f8d43b251fa7 (1).png', 0, 3, '2021-07-22 06:13:57', '2021-07-22 06:22:53'),
(4, 'Apple iPhone 12 64GB', '<p>iPhone 12. Hello 5G.</p><p><br></p><p>iPhone 12 accelerates every task with super-fast 5G network(1). A14 Bionic, the fastest chip on a smartphone. New dual camera system. With the stunning Super Retina XDR display, you can now see every detail come to life.</p><p><br></p><p><span style=\"white-space:pre\">				<b>	</b></span><b>Salient features</b></p><p><span style=\"white-space:pre\">					</span>• 6.1 inch Super Retina XDR display (2)</p><p><span style=\"white-space:pre\">					</span>• Ceramic Shield, the toughest glass ever on a smartphone</p><p><span style=\"white-space:pre\">					</span>• 5G network for super-fast download speeds, high-quality streaming videos and music (1)</p><p><span style=\"white-space:pre\">					</span>• A14 Bionic, the fastest chip ever on a smartphone</p><p><span style=\"white-space:pre\">					</span>• Advanced 12MP dual camera system with Ultra Wide and Wide cameras; Night mode, Deep Fusion, 3rd generation smart HDR, 4K . HDR Dolby Vision video recording</p><p><span style=\"white-space:pre\">					</span>• 12MP TrueDepth front camera with Night mode and 4K . HDR Dolby Vision video recording capabilities</p><p><span style=\"white-space:pre\">					</span>• Market-leading IP68 water resistance (4)</p><p><span style=\"white-space:pre\">					</span>• iOS 14 with redesigned Home screen widgets, brand new App Gallery, App</p><p><span style=\"white-space:pre\">					</span>Clips and many other features</p><p><br></p><p><span style=\"white-space:pre\">					</span><b>Juridical :</b></p><p><span style=\"white-space:pre\">					</span>(1) A data plan is required. 5G network is only available in some markets and offered through select carriers</p><p><span style=\"white-space:pre\">					</span>network. Speed ​​may vary by location and carrier. For information on 5G network support, please contact your carrier and visit apple.com/iphone/cellular.</p><p><span style=\"white-space:pre\">					</span>(2) The screen has rounded corners. When measured in rectangles, the screen size is 6.06 inches diagonally. Actual display area is smaller.</p><p><span style=\"white-space:pre\">					</span>(3) Confirmation based on the Ceramic Shield front of the iPhone 12 compared to the previous generation iPhone.</p><p><span style=\"white-space:pre\">					</span>(4) iPhone 12 is splash-proof, water-proof, and dust-proof. The product has been tested under controlled laboratory conditions to an IP68 rating according to IEC 60529 (water resistant up to 6 meters for up to 30 minutes). Jet resistance, water resistance and dust resistance are not permanent conditions. This capacity may be reduced due to normal wear and tear. Do not charge while iPhone is wet. Please refer to the user manual for instructions on how to clean and dry the machine. Damage caused by liquid infiltration is not covered under warranty.</p><p><br></p><p><span style=\"white-space:pre\">					</span>The product set includes:</p><p><span style=\"white-space:pre\">					</span>•<span style=\"white-space:pre\">	</span>Phone</p><p><span style=\"white-space:pre\">					</span>• Charging cord</p><p><span style=\"white-space:pre\">					</span>• User manual 12 months electronic warranty.</p>', '3b113f1ee56eaeded19b8219f4bd9d22.png', 1, 3, '2021-07-22 06:25:37', '2021-07-22 06:25:37'),
(5, 'Apple Mac Mini (2020) M1 Chip', '<p><b>Specific Uses For Product<span style=\"white-space:pre\">	</span>Multimedia, Personal, Business</b></p><p><span style=\"white-space:pre\">				</span><b>Model Name</b><span style=\"white-space:pre\">	</span>Mac mini</p><p><span style=\"white-space:pre\">				</span><b>Ram Memory Installed Size</b><span style=\"white-space:pre\">	</span>8 GB</p><p><span style=\"white-space:pre\">				</span><b>Operating System</b><span style=\"white-space:pre\">	</span>Mac OS</p><p><span style=\"white-space:pre\">				</span><b>CPU Model<span style=\"white-space:pre\">	</span></b>Unknown</p><p><span style=\"white-space:pre\">				</span></p><p><span style=\"white-space:pre\">				</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions<span style=\"white-space:pre\">	</span></b>‎7.76 x 7.76 x 1.42 inches; 4.05 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight<span style=\"white-space:pre\">	</span></b>‎4.05 pounds</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer<span style=\"white-space:pre\">	</span></b>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B08N5PHB83</p><p><span style=\"white-space:pre\">				</span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MGNR3LL/A</p><p><span style=\"white-space:pre\">				</span><b>Batteries<span style=\"white-space:pre\">	</span></b>‎Lithium ion batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Apple-designed M1 chip for a giant leap in CPU, GPU, and machine learning performance</p><p><span style=\"white-space:pre\">				</span>8-core CPU packs up to 3x faster performance to fly through workflows quicker than ever*</p><p><span style=\"white-space:pre\">				</span>8-core GPU with up to 6x faster graphics for graphics-intensive apps and games*</p><p><span style=\"white-space:pre\">				</span>16-core Neural Engine for advanced machine learning</p><p><span style=\"white-space:pre\">				</span>8GB of unified memory so everything you do is fast and fluid</p>', 'AnyConv-com__0c57b9eeb62e29548f3d1ba1531064c9.png', 0, 1, '2021-07-22 06:34:04', '2021-07-22 06:34:04'),
(6, 'Apple MacBook Air M1 13-inch', '<p><span style=\"white-space:pre\">					</span><b>Model Name</b><span style=\"white-space:pre\">	</span>-<span style=\"white-space:pre\">	</span>MacBook Air</p><p><span style=\"white-space:pre\">					</span><b>Brand&nbsp; &nbsp;&nbsp;</b>-<span style=\"white-space:pre\">	</span>Apple</p><p><span style=\"white-space:pre\">					</span><b>Specific Uses For Product</b><span style=\"white-space:pre\">	</span>-<span style=\"white-space:pre\">	</span>Multimedia, Personal, Business</p><p><span style=\"white-space:pre\">					</span><b>Screen Size</b> <span style=\"white-space:pre\">	</span>- <span style=\"white-space:pre\">	</span>13.3 Inches</p><p><span style=\"white-space:pre\">					</span><b>Operating System</b><span style=\"white-space:pre\">	</span>-<span style=\"white-space:pre\">	</span>Mac OS</p><p><br></p><p><span style=\"white-space:pre\">					</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">					</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎11.97 x 0.63 x 8.36 inches; 2.8 Pounds</p><p><span style=\"white-space:pre\">					</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎2.8 pounds</p><p><span style=\"white-space:pre\">					</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">					</span><b>Language</b><span style=\"white-space:pre\">	</span>‎English</p><p><span style=\"white-space:pre\">					</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B08N5LNQCX</p><p><span style=\"white-space:pre\">					</span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MGN63LL/A</p><p><span style=\"white-space:pre\">					</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries require</p><p><span style=\"white-space:pre\">					</span>----------------<span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span></p><p><span style=\"white-space:pre\">					</span><b>Salient features</b></p><p><span style=\"white-space:pre\">					</span>• Apple-designed M1 chip delivers a giant leap in machine learning, CPU and GPU performance</p><p><span style=\"white-space:pre\">					</span>• Go longer than ever with up to 18 hours of battery life</p><p><span style=\"white-space:pre\">					</span>• 8-core CPU delivers up to 3.5x faster performance to tackle projects faster than ever</p><p><span style=\"white-space:pre\">					</span>• Up to eight GPU cores with up to 5x faster graphics for graphics-intensive apps and games</p><p><span style=\"white-space:pre\">					</span>• 16-core Neural Engine for advanced machine learning</p><p><span style=\"white-space:pre\">					</span>• 8GB of unified memory so everything you do is fast and fluid</p><p><span style=\"white-space:pre\">					</span>• Superfast SSD storage launches apps and opens files in an instant</p>', 'AnyConv-com__290e63f2a9250c078f2158378e89db47.png', 0, 1, '2021-07-22 06:37:48', '2021-07-22 06:37:48'),
(7, 'Apple MacBook Pro M1 Chip', '<p><span style=\"white-space:pre\">					</span><b>Model Name</b><span style=\"white-space:pre\">	</span>MacBook Pro</p><p><span style=\"white-space:pre\">					</span><b>Brand</b><span style=\"white-space:pre\">	</span>Apple</p><p><span style=\"white-space:pre\">					</span><b>Specific Uses For Product</b><span style=\"white-space:pre\">	</span>Personal, Gaming, Business</p><p><span style=\"white-space:pre\">					</span><b>Screen Size</b><span style=\"white-space:pre\">	</span>13.3 Inches</p><p><span style=\"white-space:pre\">					</span><b>Operating System</b><span style=\"white-space:pre\">	</span>Mac OS</p><p><br></p><p><span style=\"white-space:pre\">					</span></p><p><span style=\"white-space:pre\">					</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">					</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎13.41 x 11.97 x 0.61 inches; 3 Pounds</p><p><span style=\"white-space:pre\">					</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎3 pounds</p><p><span style=\"white-space:pre\">					</span><b>Manufacturer<span style=\"white-space:pre\">	</span></b>‎Apple Computer</p><p><span style=\"white-space:pre\">					</span><b>Language<span style=\"white-space:pre\">	</span></b>‎English</p><p><span style=\"white-space:pre\">					</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B08N5N6RSS</p><p><span style=\"white-space:pre\">				<b>	</b></span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MYD82LL/A</p><p><span style=\"white-space:pre\">					</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">					</span>----------------<span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span><span style=\"font-size: 1rem;\">----------------</span></p><p><span style=\"white-space:pre\">					</span><b>About this item</b></p><p><span style=\"white-space:pre\">					</span>Apple-designed M1 chip for a giant leap in CPU, GPU, and machine learning performance</p><p><span style=\"white-space:pre\">					</span>Get more done with up to 20 hours of battery life, the longest ever in a Mac</p><p><span style=\"white-space:pre\">					</span>8-core CPU delivers up to 2.8x faster performance to fly through workflows quicker than ever</p><p><span style=\"white-space:pre\">					</span>8-core GPU with up to 5x faster graphics for graphics-intensive apps and games</p><p><span style=\"white-space:pre\">					</span>16-core Neural Engine for advanced machine learning</p><p><span style=\"white-space:pre\">					</span>8GB of unified memory so everything you do is fast and fluid</p><p><span style=\"white-space:pre\">					</span>Superfast SSD storage launches apps and opens files in an instant</p>', 'AnyConv-com__994228a247d6ede2b7c785449527ce2f.png', 0, 1, '2021-07-22 06:44:51', '2021-07-22 06:44:51'),
(8, 'Apple iPad 10.2-inch, 32GB', '<p><span style=\"white-space:pre\">				</span><b>Model Name</b><span style=\"white-space:pre\">	</span>IPad</p><p><span style=\"white-space:pre\">				</span><b>Brand<span style=\"white-space:pre\">	</span></b>Apple</p><p><span style=\"white-space:pre\">				</span><b>Screen Size</b><span style=\"white-space:pre\">	</span>10.2 Inches</p><p><span style=\"white-space:pre\">				</span><b>Operating System</b><span style=\"white-space:pre\">	</span>IPadOS</p><p><span style=\"white-space:pre\">				</span><b>Memory Storage Capacity&nbsp;</b> 32GB</p><p><br></p><p><span style=\"white-space:pre\">				</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎9.8 x 6.8 x 0.29 inches; 1.08 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎1.08 pounds</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B08J5J9699</p><p><span style=\"white-space:pre\">				</span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MYLC2LL/A</p><p><span style=\"white-space:pre\">				</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Gorgeous 10.2-inch Retina display</p><p><span style=\"white-space:pre\">				</span>A12 Bionic chip with Neural Engine</p><p><span style=\"white-space:pre\">				</span>Support for Apple Pencil (1st generation) and Smart Keyboard</p><p><span style=\"white-space:pre\">				</span>8MP back camera, 1.2MP FaceTime HD front camera</p><p><span style=\"white-space:pre\">				</span>Stereo speakers</p><p><span style=\"white-space:pre\">				</span>802.11ac Wi-Fi and Gigabit-class LTE cellular data</p><p><span style=\"white-space:pre\">				</span>Up to 10 hours of battery life</p>', 'AnyConv-com__61bY0yqJ9rS-_AC_SX679_.png', 0, 2, '2021-07-22 06:50:45', '2021-07-22 06:50:45'),
(9, 'Apple iPad Air 10.9-inch, 64GB', '<p><span style=\"white-space:pre\">			<b>	</b></span><b>Model Name</b><span style=\"white-space:pre\">	</span>IPad Air</p><p><span style=\"white-space:pre\">				</span><b>Brand</b><span style=\"white-space:pre\">	</span>Apple</p><p><span style=\"white-space:pre\">				</span><b>Screen Size</b><span style=\"white-space:pre\">	</span>10.9 Inches</p><p><span style=\"white-space:pre\">				</span><b>Operating System</b><span style=\"white-space:pre\">	</span>IPadOS</p><p><span style=\"white-space:pre\">				</span><b>Memory Storage Capacity</b><span style=\"white-space:pre\">	</span>64 GB</p><p><br></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎9.74 x 7 x 0.24 inches; 1 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight<span style=\"white-space:pre\">	</span></b>‎1 pounds</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN<span style=\"white-space:pre\">	</span>‎</b>B08J6FD94H</p><p><span style=\"white-space:pre\">				</span><b>Item model number<span style=\"white-space:pre\">	</span></b>‎MYFR2LL/A</p><p><span style=\"white-space:pre\">				</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Stunning 10.9-inch Liquid Retina display with True Tone and P3 wide color</p><p><span style=\"white-space:pre\">				</span>A14 Bionic chip with Neural Engine</p><p><span style=\"white-space:pre\">				</span>Touch ID for secure authentication and Apple Pay</p><p><span style=\"white-space:pre\">				</span>12MP back camera, 7MP FaceTime HD front camera</p><p><span style=\"white-space:pre\">				</span>Available in Silver, Space Gray, Rose Gold, Green, and Sky Blue</p><p><span style=\"white-space:pre\">				</span>Wide stereo audio</p><p><span style=\"white-space:pre\">				</span>Wi-Fi 6 (802.11ax)</p>', 'AnyConv-com__5ebeed465892a689317a08b3f119a49c.png', 1, 2, '2021-07-22 06:56:53', '2021-07-22 06:56:53'),
(10, 'Apple 11-inch iPad Pro 128GB', '<p><span style=\"white-space:pre\">			<b>	</b></span><b>Model Name</b><span style=\"white-space:pre\">	</span>IPad Pro</p><p><span style=\"white-space:pre\">				</span><b>Brand<span style=\"white-space:pre\">	</span></b>Apple</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Screen Size<span style=\"white-space:pre\">	</span></b>11 Inches</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Operating System</b><span style=\"white-space:pre\">	</span>IPadOS</p><p><span style=\"white-space:pre\">				</span><b>Memory Storage Capacity</b><span style=\"white-space:pre\">	</span>128 GB</p><p><br></p><p><span style=\"white-space:pre\">				</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎9.74 x 7.02 x 0.23 inches; 1 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎1 pounds</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B09328WZPR</p><p><span style=\"white-space:pre\">				</span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MHQR3LL/A</p><p><span style=\"white-space:pre\">				</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">			<b>	</b></span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Apple M1 chip for next-level performance</p><p><span style=\"white-space:pre\">				</span>Stunning 11-inch Liquid Retina display with ProMotion, True Tone, and P3 wide color</p><p><span style=\"white-space:pre\">				</span>TrueDepth camera system featuring Ultra Wide front camera with Center Stage</p><p><span style=\"white-space:pre\">				</span>12MP Wide camera, 10MP Ultra Wide camera, and LiDAR Scanner for immersive AR</p><p><span style=\"white-space:pre\">				</span>Stay connected with ultrafast Wi-Fi</p><p><span style=\"white-space:pre\">				</span>Go further with all-day battery life</p><p><span style=\"white-space:pre\">				</span>Thunderbolt port for connecting to fast external storage, displays, and docks</p>', 'AnyConv-com__a518dca0331afd1781bdf5124b6da660.png', 0, 2, '2021-07-22 07:02:02', '2021-07-22 07:02:02'),
(11, 'Apple AirPods Pro', '<p><span style=\"white-space:pre\">				</span><b>Brand<span style=\"white-space:pre\">	</span></b>Apple</p><p><span style=\"white-space:pre\">				</span><b>Color<span style=\"white-space:pre\">	</span></b>White</p><p><span style=\"white-space:pre\">				</span><b>Connectivity Technology</b><span style=\"white-space:pre\">	</span>Wireless</p><p><span style=\"white-space:pre\">				</span><b>Model Name<span style=\"white-space:pre\">	</span></b>Apple AirPods Pro</p><p><span style=\"white-space:pre\">				</span><b>Form Factor</b><span style=\"white-space:pre\">	</span>In Ear</p><p><br></p><p><span style=\"white-space:pre\">				</span><b>Technical Details</b></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions<span style=\"white-space:pre\">	</span></b>‎0.94 x 0.86 x 1.22 inches; 1.6 Ounces</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎1.6 ounces</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN<span style=\"white-space:pre\">	</span></b>‎B07ZPC9QD4</p><p><span style=\"white-space:pre\">				</span><b>Item model number<span style=\"white-space:pre\">	</span></b>‎MWP22AM/A</p><p><span style=\"white-space:pre\">				</span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎3 Lithium ion batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Active noise cancellation for immersive sound</p><p><span style=\"white-space:pre\">				</span>Transparency mode for hearing and connecting with the world around you</p><p><span style=\"white-space:pre\">				</span>Three sizes of soft, tapered silicone tips for a customizable fit</p><p><span style=\"white-space:pre\">				</span>Sweat and water resistant</p><p><span style=\"white-space:pre\">				</span>Adaptive EQ automatically tunes music to the shape of your ear</p><p><span style=\"white-space:pre\">				</span>Easy setup for all your Apple devices</p><p><span style=\"white-space:pre\">				</span>Quick access to Siri by saying “Hey Siri”</p><p><span style=\"white-space:pre\">				</span>The Wireless Charging Case delivers more than 24 hours of battery life</p>', 'AnyConv-com__18e6d1e5b62203f908c8da4648ef3053.png', 0, 4, '2021-07-22 07:09:42', '2021-07-22 07:09:42'),
(12, 'Apple AirPods Max', '<p><span style=\"white-space:pre\">				</span><b>Brand<span style=\"white-space:pre\">	</span></b>Apple</p><p><span style=\"white-space:pre\">				</span><b>Color</b><span style=\"white-space:pre\">	</span>Green</p><p><span style=\"white-space:pre\">				</span><b>Connectivity Technology</b><span style=\"white-space:pre\">	</span>NFC, Bluetooth, Transparancy, Audio Sharing, Wireless</p><p><span style=\"white-space:pre\">				</span><b>Model Name<span style=\"white-space:pre\">	</span></b>AirPods Max</p><p><span style=\"white-space:pre\">				</span><b>Form Factor<span style=\"white-space:pre\">	</span></b>Over Ear</p><p><br></p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Technical Details</b></p><p><span style=\"white-space:pre\">				</span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎9.8 x 6.8 x 0.29 inches; 1.08 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎1.08 pounds</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">				</span><b>ASIN</b><span style=\"white-space:pre\">	</span>‎B08J5J9699</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Item model number<span style=\"white-space:pre\">	</span>‎</b>MYLC2LL/A</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Apple-designed dynamic driver provides high-fidelity audio﻿</p><p><span style=\"white-space:pre\">				</span>Active Noise Cancellation blocks outside noise, so you can immerse yourself in music﻿</p><p><span style=\"white-space:pre\">				</span>Transparency mode for hearing and interacting with the world around you﻿</p><p><span style=\"white-space:pre\">				</span>Spatial audio with dynamic head tracking provides theater-like sound that surrounds you﻿</p><p><span style=\"white-space:pre\">				</span>Computational audio combines custom acoustic design with the Apple H1 chip and software for breakthrough listening experiences﻿</p><p><span style=\"white-space:pre\">				</span>Designed with a knit-mesh canopy and memory foam ear cushions for an exceptional fit﻿</p><p><span style=\"white-space:pre\">				</span>Magical experience with effortless setup, on-head detection, and seamless switching between devices﻿</p>', 'AnyConv-com__81jkMpNHVsL-_AC_SX679_.png', 0, 4, '2021-07-22 07:13:02', '2021-07-22 07:13:02'),
(13, 'Apple EarPods', '<p><span style=\"white-space:pre\">				</span><b>Brand</b><span style=\"white-space:pre\">	</span>Apple</p><p><span style=\"white-space:pre\">				</span><b>Color</b><span style=\"white-space:pre\">	</span>White</p><p><span style=\"white-space:pre\">				</span><b>Connectivity Technology</b><span style=\"white-space:pre\">	</span>Lightning</p><p><span style=\"white-space:pre\">				</span><b>Model Name<span style=\"white-space:pre\">	</span></b>EarPods</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Form Factor</b><span style=\"white-space:pre\">	</span>In Ear</p><p><br></p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Technical Details</b></p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Product Dimensions</b><span style=\"white-space:pre\">	</span>‎9.74 x 7.02 x 0.23 inches; 1 Pounds</p><p><span style=\"white-space:pre\">				</span><b>Item Weight</b><span style=\"white-space:pre\">	</span>‎1 pounds</p><p><span style=\"white-space:pre\">				</span><b>Manufacturer</b><span style=\"white-space:pre\">	</span>‎Apple Computer</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>ASIN<span style=\"white-space:pre\">	</span>‎</b>B09328WZPR</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Item model number</b><span style=\"white-space:pre\">	</span>‎MHQR3LL/A</p><p><span style=\"white-space:pre\">			<b>	</b></span><b>Batteries</b><span style=\"white-space:pre\">	</span>‎1 Lithium Polymer batteries required. (included)</p><p><span style=\"white-space:pre\">				</span>----<span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span><span style=\"font-size: 1rem;\">----</span></p><p><br></p><p><span style=\"white-space:pre\">				</span><b>About this item</b></p><p><span style=\"white-space:pre\">				</span>Unlike traditional, circular earbuds, the design of the EarPods is defined by the geometry of the ear which makes them more comfortable for more people than any other earbud-style headphones</p><p><span style=\"white-space:pre\">				</span>The speakers inside the EarPods have been engineered to maximize sound output and minimize sound loss, which means you get high-quality audio</p><p><span style=\"white-space:pre\">				</span>The EarPods with lightning connector also include a built-in remote that lets you adjust the volume, control the playback of music and video, and answer or end calls with a pinch of the cord</p><p><span style=\"white-space:pre\">				</span>Works with all devices that have a lightning connector and support iOS 10 or later, including iPod touch, iPad, and iPhone</p>', 'AnyConv-com__41wYbyr3LLL-_AC_SX679_.png', 0, 4, '2021-07-22 07:17:53', '2021-07-22 07:17:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_star` double(2,1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`id`, `id_customer`, `id_product`, `comment`, `rating_star`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'good', 4.5, 0, '2021-08-01 21:51:06', '2021-08-02 06:39:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `permission`, `created_at`, `updated_at`) VALUES
(2, 'Administration', '[\"admin.index\",\"admin.create\",\"admin.store\",\"admin.show\",\"admin.edit\",\"admin.update\",\"admin.destroy\",\"category.index\",\"category.create\",\"category.store\",\"category.show\",\"category.edit\",\"category.update\",\"category.destroy\",\"product.index\",\"product.create\",\"product.store\",\"product.show\",\"product.edit\",\"product.update\",\"product.destroy\",\"variantProduct.index\",\"variantProduct.create\",\"variantProduct.store\",\"variantProduct.show\",\"variantProduct.edit\",\"variantProduct.update\",\"variantProduct.destroy\",\"banner.index\",\"banner.create\",\"banner.store\",\"banner.show\",\"banner.edit\",\"banner.update\",\"banner.destroy\",\"order.index\",\"order.create\",\"order.store\",\"order.show\",\"order.edit\",\"order.update\",\"order.destroy\",\"cusMan.index\",\"cusMan.create\",\"cusMan.store\",\"cusMan.show\",\"cusMan.edit\",\"cusMan.update\",\"cusMan.destroy\",\"review.index\",\"review.create\",\"review.store\",\"review.show\",\"review.edit\",\"review.update\",\"review.destroy\",\"settingLink.index\",\"settingLink.create\",\"settingLink.store\",\"settingLink.show\",\"settingLink.edit\",\"settingLink.update\",\"settingLink.destroy\",\"role.index\",\"role.create\",\"role.store\",\"role.show\",\"role.edit\",\"role.update\",\"role.destroy\",\"decentralize.index\",\"decentralize.create\",\"decentralize.store\",\"decentralize.show\",\"decentralize.edit\",\"decentralize.update\",\"decentralize.destroy\"]', '2021-08-12 01:41:12', '2021-08-12 01:41:12'),
(3, 'Collaborators', '[\"admin.index\",\"admin.create\",\"admin.store\",\"admin.show\",\"admin.edit\",\"admin.update\",\"admin.destroy\",\"category.index\",\"category.create\",\"category.store\",\"category.show\",\"category.edit\",\"category.update\",\"category.destroy\",\"product.index\",\"product.create\",\"product.store\",\"product.show\",\"product.edit\",\"product.update\",\"product.destroy\"]', '2021-08-12 01:41:56', '2021-08-12 08:46:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting_link`
--

CREATE TABLE `setting_link` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting_link`
--

INSERT INTO `setting_link` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`) VALUES
(1, 'Github', 'https://github.com/WAIMC', '2021-08-04 08:00:38', '2021-08-04 08:00:38'),
(2, 'Facebook', 'https://www.facebook.com/dovanvinhwao/', '2021-08-04 08:01:21', '2021-08-04 08:01:21'),
(3, 'Linkedin', 'https://www.linkedin.com/in/vinh-%C4%91%E1%BB%97-v%C4%83n-838481217/', '2021-08-04 08:02:25', '2021-08-04 08:02:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant_product`
--

CREATE TABLE `variant_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double(9,3) NOT NULL,
  `price` double(9,3) NOT NULL,
  `discount` double(9,3) NOT NULL,
  `gallery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variant_product`
--

INSERT INTO `variant_product` (`id`, `id_product`, `color`, `color_code`, `quantity`, `price`, `discount`, `gallery`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Silver', '#cae5e7', 100.000, 1232.000, 1232.000, '[\"graphite-_2_.png\",\"1e45b996313a01332b9abc87e4ca95af.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 01:10:54', '2021-07-22 06:06:41'),
(2, 2, 'Graphite', '#9ebdf0', 100.000, 1232.000, 1132.000, '[\"45b1e883ce1eb37c2c15e89513f89a04.png\",\"1e45b996313a01332b9abc87e4ca95af.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 0, '2021-07-22 01:46:17', '2021-07-22 01:46:17'),
(3, 2, 'Gold', '#ffed94', 100.000, 1432.000, 1332.000, '[\"gold.png\",\"1e45b996313a01332b9abc87e4ca95af.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 01:47:16', '2021-07-22 06:07:12'),
(6, 3, 'Red', '#ee1717', 100.000, 609.000, 609.000, '[\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"AnyConv-com__60d1ee715145b0fa39516f7dc2af3bac.png\",\"AnyConv-com__4a10e843c4fc5d42876d7822a0548cf1.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 0, '2021-07-22 06:17:15', '2021-07-22 06:17:15'),
(8, 3, 'Yellow', '#fbff1f', 100.000, 609.000, 609.000, '[\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"AnyConv-com__205cbc5c4300620d0c652b6f09efed27.png\",\"1e45b996313a01332b9abc87e4ca95af.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 06:18:42', '2021-07-22 06:18:42'),
(9, 3, 'Black', '#000000', 100.000, 609.000, 609.000, '[\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"AnyConv-com__ab149f4798333a55d3d890c93a6ef86f.png\",\"AnyConv-com__4a10e843c4fc5d42876d7822a0548cf1.png\",\"1e45b996313a01332b9abc87e4ca95af.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 06:19:58', '2021-07-22 06:19:58'),
(10, 3, 'Purple', '#cb4393', 100.000, 609.000, 609.000, '[\"AnyConv-com__fa1c711b31f401fda182f8d43b251fa7 (1).png\",\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"AnyConv-com__4a10e843c4fc5d42876d7822a0548cf1.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 06:21:00', '2021-07-22 06:21:00'),
(11, 4, 'Purple', '#f82af2', 100.000, 1089.000, 1089.000, '[\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"AnyConv-com__4a10e843c4fc5d42876d7822a0548cf1.png\",\"6af4c7ee32a6ac8b65bc67ccd325c331.png\",\"3b113f1ee56eaeded19b8219f4bd9d22.png\"]', 0, '2021-07-22 06:27:23', '2021-07-22 06:27:23'),
(12, 4, 'Blue', '#545ccf', 100.000, 1089.000, 1089.000, '[\"dd848e0650f8292e52bfe8f3bb55a8d1.png\",\"AnyConv-com__e913516afa46c4c4e2931dd3dbaa32a4.png\",\"6af4c7ee32a6ac8b65bc67ccd325c331.png\",\"090c8f7cc82b9b0fee22309bf1e51155.png\"]', 1, '2021-07-22 06:28:06', '2021-07-22 06:28:06'),
(13, 5, 'White', '#ffffff', 100.000, 849.000, 849.000, '[\"AnyConv-com__e3633842408822cde7ce2dfe8aeb1219.png\",\"AnyConv-com__e0bedd8fadffcc2f91360c8231353255.png\",\"AnyConv-com__71yUsA399kL-_AC_SX679_.png\",\"AnyConv-com__71pcTYT+ICL-_AC_SX679_.png\",\"AnyConv-com__0c57b9eeb62e29548f3d1ba1531064c9.png\"]', 0, '2021-07-22 06:34:54', '2021-07-22 06:34:54'),
(14, 6, 'Gold', '#f8fb3c', 100.000, 949.000, 949.000, '[\"AnyConv-com__799b680f5dbfe77b1b023fab0bb0fb8d.png\",\"AnyConv-com__71zFHzUBzuL-_AC_SX679_.png\",\"AnyConv-com__712v9WGWDBL-_AC_SX679_.png\",\"AnyConv-com__61ChHwbxObL-_AC_SX679_.png\",\"AnyConv-com__290e63f2a9250c078f2158378e89db47.png\"]', 0, '2021-07-22 06:39:15', '2021-07-22 06:39:15'),
(15, 6, 'Silver', '#ffffff', 100.000, 949.000, 949.000, '[\"AnyConv-com__799b680f5dbfe77b1b023fab0bb0fb8d (1).png\",\"AnyConv-com__71KpoUmtlqL-_AC_SX679_.png\",\"AnyConv-com__712v9WGWDBL-_AC_SX679_.png\",\"AnyConv-com__61ChHwbxObL-_AC_SX679_.png\",\"AnyConv-com__290e63f2a9250c078f2158378e89db47.png\"]', 1, '2021-07-22 06:40:51', '2021-07-22 06:40:51'),
(16, 6, 'Gray', '#c5b4b4', 100.000, 949.000, 949.000, '[\"AnyConv-com__799b680f5dbfe77b1b023fab0bb0fb8d.png\",\"AnyConv-com__71LG4S9ZB9L-_AC_SX679_.png\",\"AnyConv-com__712v9WGWDBL-_AC_SX679_.png\",\"AnyConv-com__61ChHwbxObL-_AC_SX679_.png\",\"AnyConv-com__290e63f2a9250c078f2158378e89db47.png\"]', 1, '2021-07-22 06:41:28', '2021-07-22 06:41:28'),
(17, 7, 'Gray', '#c1b9b9', 100.000, 1727.000, 1727.000, '[\"AnyConv-com__b143bd9f05b6fa41dddd05d511f5d652.png\",\"AnyConv-com__994228a247d6ede2b7c785449527ce2f.png\",\"AnyConv-com__71LG4S9ZB9L-_AC_SX679_.png\",\"AnyConv-com__31b3e398725d2cffc93e5063ed06d3b2.png\"]', 0, '2021-07-22 06:46:25', '2021-07-22 06:46:25'),
(18, 7, 'Silver', '#ffffff', 100.000, 1727.000, 1727.000, '[\"AnyConv-com__b143bd9f05b6fa41dddd05d511f5d652.png\",\"AnyConv-com__799b680f5dbfe77b1b023fab0bb0fb8d.png\",\"AnyConv-com__71nRj-fGoZL-_AC_SX679_.png\",\"AnyConv-com__31b3e398725d2cffc93e5063ed06d3b2.png\"]', 1, '2021-07-22 06:47:08', '2021-07-22 06:47:08'),
(19, 8, 'Silver', '#ffffff', 100.000, 300.000, 300.000, '[\"AnyConv-com__81xIydbzFCL-_AC_SX679_.png\",\"AnyConv-com__71UddJ3JSLL-_AC_SX679_.png\",\"AnyConv-com__61bY0yqJ9rS-_AC_SX679_.png\"]', 0, '2021-07-22 06:51:57', '2021-07-22 06:51:57'),
(20, 8, 'Gray', '#bfbfbf', 100.000, 300.000, 300.000, '[\"AnyConv-com__81xIydbzFCL-_AC_SX679_.png\",\"AnyConv-com__71UddJ3JSLL-_AC_SX679_.png\",\"AnyConv-com__71IY+Po9y6L-_AC_SX679_.png\"]', 1, '2021-07-22 06:53:29', '2021-07-22 06:53:29'),
(21, 8, 'Pink', '#ffd6ec', 100.000, 300.000, 300.000, '[\"AnyConv-com__81xIydbzFCL-_AC_SX679_.png\",\"AnyConv-com__71UddJ3JSLL-_AC_SX679_.png\",\"AnyConv-com__71nMBHOY8DL-_AC_SX679_.png\"]', 1, '2021-07-22 06:54:17', '2021-07-22 06:54:17'),
(22, 9, 'Green', '#0affa1', 100.000, 700.000, 700.000, '[\"AnyConv-com__6c30a9b90190d29df6c3e2fae3c6b086.png\",\"AnyConv-com__5ebeed465892a689317a08b3f119a49c.png\"]', 0, '2021-07-22 06:57:53', '2021-07-22 06:57:53'),
(23, 9, 'Blue', '#63b9cf', 100.000, 700.000, 700.000, '[\"AnyConv-com__6c30a9b90190d29df6c3e2fae3c6b086.png\",\"AnyConv-com__55d48f27d7216594bfbf5951c9cc7cc2.png\"]', 1, '2021-07-22 06:58:33', '2021-07-22 06:58:33'),
(24, 9, 'Gray', '#bdbdbd', 100.000, 700.000, 700.000, '[\"AnyConv-com__6d5a7f528a77646986850a56a1a49c25.png\",\"AnyConv-com__6c30a9b90190d29df6c3e2fae3c6b086.png\"]', 1, '2021-07-22 06:59:19', '2021-07-22 06:59:19'),
(25, 9, 'Silver', '#ffffff', 100.000, 700.000, 700.000, '[\"AnyConv-com__6c30a9b90190d29df6c3e2fae3c6b086.png\",\"AnyConv-com__42bc030cd13d6ed635cb48fd91508f7e.png\"]', 1, '2021-07-22 06:59:52', '2021-07-22 06:59:52'),
(26, 10, 'Silver', '#ffffff', 100.000, 1099.000, 1099.000, '[\"AnyConv-com__dba089936e99862e6fcbf0a564c84974.png\",\"AnyConv-com__a518dca0331afd1781bdf5124b6da660.png\",\"AnyConv-com__9b8bfaf258c79584fbfa16bf50144d28.png\",\"AnyConv-com__296c8f3ea555be2cbc48df3b414e1a88.png\"]', 0, '2021-07-22 07:04:01', '2021-07-22 07:04:01'),
(27, 10, 'Gray', '#b0b0b0', 100.000, 1099.000, 1099.000, '[\"AnyConv-com__f2185d657cb80d43102cbb6fa3fec20d.png\",\"AnyConv-com__dba089936e99862e6fcbf0a564c84974.png\",\"AnyConv-com__a518dca0331afd1781bdf5124b6da660.png\",\"AnyConv-com__9b8bfaf258c79584fbfa16bf50144d28.png\"]', 1, '2021-07-22 07:07:13', '2021-07-22 07:07:13'),
(28, 11, 'White', '#ffffff', 100.000, 300.000, 300.000, '[\"AnyConv-com__71llQwico7L-_AC_SX679_.png\",\"AnyConv-com__71llQwico7L-_AC_SX679_ (1).png\",\"AnyConv-com__71bhWgQK-cL-_AC_SX679_.png\",\"AnyConv-com__71+oSLK5SIL-_AC_SX679_.png\"]', 0, '2021-07-22 07:11:12', '2021-07-22 07:11:12'),
(29, 12, 'Silver', '#ededed', 100.000, 400.000, 400.000, '[\"AnyConv-com__81thV7SoLZL-_AC_SX679_.png\",\"AnyConv-com__81setQtwhcL-_AC_SX679_.png\",\"AnyConv-com__81jqUPkIVRL-_AC_SX679_.png\"]', 0, '2021-07-22 07:14:30', '2021-07-23 20:50:32'),
(30, 12, 'Black', '#000000', 100.000, 400.000, 400.000, '[\"AnyConv-com__81thV7SoLZL-_AC_SX679_.png\",\"AnyConv-com__81setQtwhcL-_AC_SX679_.png\",\"AnyConv-com__81jqUPkIVRL-_AC_SX679_.png\"]', 1, '2021-07-22 07:15:06', '2021-07-23 20:51:32'),
(31, 12, 'Graphite', '#6faece', 100.000, 400.000, 400.000, '[\"AnyConv-com__81setQtwhcL-_AC_SX679_.png\",\"AnyConv-com__81jkMpNHVsL-_AC_SX679_.png\"]', 1, '2021-07-22 07:15:57', '2021-07-22 07:15:57'),
(32, 13, 'White', '#ffffff', 100.000, 12.000, 12.000, '[\"AnyConv-com__41zg4DOTl2L-_AC_SX679_.png\",\"AnyConv-com__41wYbyr3LLL-_AC_SX679_.png\",\"AnyConv-com__41VjW3LcESL-_AC_SX679_.png\"]', 0, '2021-07-22 07:18:49', '2021-07-22 07:18:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Chỉ mục cho bảng `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`admin_id`,`role_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_id_order_foreign` (`id_order`),
  ADD KEY `order_detail_id_variant_product_foreign` (`id_variant_product`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_category_foreign` (`id_category`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `review_id_customer_foreign` (`id_customer`),
  ADD KEY `review_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Chỉ mục cho bảng `setting_link`
--
ALTER TABLE `setting_link`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `variant_product`
--
ALTER TABLE `variant_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_product_id_product_foreign` (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `setting_link`
--
ALTER TABLE `setting_link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `variant_product`
--
ALTER TABLE `variant_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_id_order_foreign` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_id_variant_product_foreign` FOREIGN KEY (`id_variant_product`) REFERENCES `variant_product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `review_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `variant_product`
--
ALTER TABLE `variant_product`
  ADD CONSTRAINT `variant_product_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
