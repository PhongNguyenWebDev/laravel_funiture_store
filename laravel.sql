-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 11, 2024 lúc 02:43 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Relaxing Sofa', '2024-04-10 06:06:30', '2024-04-10 06:06:30'),
(2, 'Sofa', '2024-03-14 08:31:30', '2024-03-14 08:31:30'),
(3, 'Gaming Chair', '2024-03-14 08:31:30', '2024-03-14 08:31:30'),
(4, 'Box Chair', '2024-03-14 08:31:30', '2024-03-14 08:31:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_time` int UNSIGNED NOT NULL,
  `coupon_condition` int NOT NULL,
  `coupon_number` decimal(8,2) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `coupon_name`, `coupon_time`, `coupon_condition`, `coupon_number`, `expires_at`, `created_at`, `updated_at`) VALUES
(9, '8T3KM', 'Ngày quốc tế Phụ nữ', 10, 1, 10.00, '2024-04-03 15:05:28', NULL, NULL),
(11, '30T4KM', 'Ngày giải phóng miền nam', 10, 2, 50.00, '2024-04-03 15:05:28', '2024-03-31 08:06:37', '2024-03-31 08:06:37'),
(12, 'TBKM', 'thuong binh', 20, 1, 20.00, '2024-04-05 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `galeries`
--

CREATE TABLE `galeries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(158, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(159, '2019_08_19_000000_create_failed_jobs_table', 1),
(160, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(161, '2024_03_14_120309_create_users_table', 1),
(162, '2024_03_14_120506_create_categories_table', 1),
(168, '2024_03_14_120608_create_products_table', 2),
(169, '2024_03_14_120739_create_detail_product_table', 3),
(170, '2024_03_14_120854_create_galeries_table', 3),
(171, '2024_03_14_120930_create_orders_table', 3),
(172, '2024_03_14_120958_create_order_details_table', 3),
(174, '2024_03_22_120330_create_remember_tokens_table', 4),
(175, '2024_03_22_133455_add_remember_token_to_users_table', 4),
(176, '2024_03_24_041410_add_quantity_to_products_table', 5),
(177, '2024_03_31_041404_create_coupons_table', 6),
(178, '2024_04_01_121948_add_coupon_id_to_orders_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `coupon_id` bigint UNSIGNED DEFAULT NULL,
  `fullname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `total_money` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `fullname`, `email`, `phone_number`, `address`, `note`, `token`, `order_date`, `status`, `total_money`, `created_at`, `updated_at`) VALUES
(77, 2, 11, 'phongg', 'phongntps27047@fpt.edu.vn', '0328414771', 'Thành phố Hồ Chí Minh', 'asdasd', NULL, '2024-04-02 02:26:29', 1, 1875, '2024-04-01 19:26:29', '2024-04-01 19:26:47'),
(78, 2, 9, 'fpoly', 'ptn3221@gmail.com', '0328414771', '91/1/2 - Phạm Văn Chiêu - Gò Vấp - Hồ Chí Minh', 'ok ok', '62ArprxbtfmWdscERDnCz99jEeHCFr', '2024-04-07 16:10:21', 0, 125, '2024-04-07 09:10:21', '2024-04-07 09:10:21'),
(79, 2, 9, 'fpoly', 'phongntps27047@fpt.edu.vn', '0328414771', '91/1/2 - Phạm Văn Chiêu - Gò Vấp - Hồ Chí Minh', 'ok ok', NULL, '2024-04-07 16:13:13', 1, 340, '2024-04-07 09:13:13', '2024-04-07 09:13:24'),
(80, 2, 11, 'fpoly', 'phongntps27047@fpt.edu.vn', '0328414771', '91/1/2 - Phạm Văn Chiêu - Gò Vấp - Hồ Chí Minh', 'ok ok ok', NULL, '2024-04-07 16:25:16', 1, 725, '2024-04-07 09:25:16', '2024-04-07 09:27:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `price` int NOT NULL,
  `num` int NOT NULL,
  `total_money` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`, `created_at`, `updated_at`) VALUES
(116, 78, 58, 25, 5, 125, '2024-04-07 09:10:21', '2024-04-07 09:10:21'),
(117, 79, 52, 85, 4, 340, '2024-04-07 09:13:13', '2024-04-07 09:13:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('phong@gmail.com', 'DHmM78Tm7cQO3IixhwVvEGaNa1JEa6Kwd9ZHVZs3XE8ii20pO7EyVSrAeLI9fgsT', '2024-03-22 19:55:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `discount` int DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `price`, `quantity`, `discount`, `thumbnail`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(52, 2, 'Sofa 1 ', 85, 0, 28, 'asset/client/images/sofa/Sofa1.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(53, 2, 'Sofa 2 ', 105, 0, 32, 'asset/client/images/sofa/Sofa2.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(54, 2, 'Sofa 3 ', 105, 0, 32, 'asset/client/images/sofa/Sofa3.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(55, 3, 'Gaming Chair 1', 205, 0, 32, 'asset/client/images/gamingchair/Gaming-Chair-1.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-29 08:30:39', NULL),
(56, 3, 'Gaming Chair 2', 235, 0, 50, 'asset/client/images/gamingchair/Gaming-Chair-2.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(57, 3, 'Gaming Chair 3', 350, 0, 45, 'asset/client/images/gamingchair/Gaming-Chair-3.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(58, 4, 'Box Chair 1', 25, 0, 20, 'asset/client/images/boxchair/Box-Chair-1.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(59, 4, 'Box Chair 2', 35, 0, 15, 'asset/client/images/boxchair/Box-Chair-2.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(60, 4, 'Box Chair 3', 55, 0, 25, 'asset/client/images/boxchair/Box-Chair-3.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-03-23 11:24:04', '2024-03-23 11:24:04', NULL),
(70, 1, 'Relaxing Sofa 1', 138, 0, 20, 'asset/client/images/relaxingsofa/Relaxing-Sofa-1.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-04-10 06:08:11', '2024-04-10 06:08:11', NULL),
(71, 1, 'Relaxing Sofa 2', 258, 0, 12, 'asset/client/images/relaxingsofa/Relaxing-Sofa-2.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-04-10 06:08:11', '2024-04-10 06:08:11', NULL),
(72, 1, 'Relaxing Sofa 3', 333, 0, 6, 'asset/client/images/relaxingsofa/Relaxing-Sofa-3.png', 'Sở hữu nét thiết kế hiện đại, tinh tế mang lại không gian sang trọng cho không gian phòng. Sản phẩm là sự lựa chọn tuyệt vời cho người dùng vừa mang lại nhiều tiện ích vừa giúp tiết kiệm được không gian. Ghế có thể sử dụng ngồi đọc sách, xem Tv hoặc ngồi để thư giãn, chiếc đôn nhỏ kèm theo dùng để kê chân tăng thêm sự thoải mái hoặc có thể dùng làm ghế phụ.', '2024-04-10 06:08:11', '2024-04-10 06:08:11', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `remember_tokens`
--

CREATE TABLE `remember_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_number`, `address`, `image`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Nhi', 'phong@gmail.com', '54979381', 'Trái Cây', 'person_4.jpg', '$2y$12$XaXqlWeHVQVaYqux3nQF9.sdbNfQIbWG2QVcWDZSd7gx.kitk/pk.', '2z400DvAHcOKMHGDOrKmUGv1E92N5hqMTdkMbJ7MinH88BBkoT0eUMizp2v8', 0, '2024-03-17 00:40:52', '2024-04-10 02:46:42', NULL),
(3, 'OWNER', 'owner@gmail.com', '54979381', 'TanLap2', NULL, '$2y$12$jfUQUyP8ObUX6CnHWUfbvuoF7wHrHHcMV5Qh9iu63hvhZfeaZqmLu', 'otH13OpkqiBi82t2DlATZxkpLVZejBepKKAfRYj9yVTt786xeS9RVRcQcssa', 1, '2024-03-17 00:40:52', '2024-03-17 00:40:52', NULL),
(12, 'Phong', 'phongdt@gmail.com', NULL, 'Trái Đất', NULL, '$2y$12$td81W4NyoRrgvlXZ2gmfFOVINMDChJ4nbpZfslcz1R2o24EEteoDG', NULL, 0, '2024-03-21 09:07:02', '2024-03-21 09:07:02', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_coupon_code_unique` (`coupon_code`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeries_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_coupon_id_foreign` (`coupon_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `remember_tokens`
--
ALTER TABLE `remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `remember_tokens_token_unique` (`token`),
  ADD KEY `remember_tokens_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `remember_tokens`
--
ALTER TABLE `remember_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `galeries`
--
ALTER TABLE `galeries`
  ADD CONSTRAINT `galeries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `remember_tokens`
--
ALTER TABLE `remember_tokens`
  ADD CONSTRAINT `remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
