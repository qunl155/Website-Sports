-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 26, 2024 lúc 01:50 PM
-- Phiên bản máy phục vụ: 8.2.0
-- Phiên bản PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sportsshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `menu_id` int NOT NULL,
  `price` int DEFAULT NULL,
  `price_sale` int DEFAULT NULL,
  `active` int NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `content`, `menu_id`, `price`, `price_sale`, `active`, `thumb`, `created_at`, `updated_at`) VALUES
(2, 'Áo đấu manchester United', 'Áo đấu sân nhà Manchester United 24/25', '<p><span style=\"background-color:rgb(255,255,255);color:rgb(0,0,0);\">Manchester United trên sân Old Trafford. Người hâm mộ ở quê nhà yêu thích họ và ngay cả đối thủ cũng không thể bỏ qua họ. Vào mùa giải 24/25, mẫu áo đấu sân nhà kinh điển của CLB càng nổi bật hơn với các mảng phối màu đỏ tươi ở hai bên và thiết kế chuyển màu tinh tế ở mặt trước và mặt sau. Với thiết kế dành cho cổ động viên, chiếc áo bóng đá adidas này sử dụng công nghệ AEROREADY kiểm soát ẩm và huy hiệu thêu nổi. Sản phẩm này làm từ 100% chất liệu tái chế. Bằng cách tái sử dụng các chất liệu đã được tạo ra, chúng tôi góp phần giảm thiểu lãng phí và hạn chế phụ thuộc vào các nguồn tài nguyên hữu hạn, cũng như giảm phát thải từ các sản phẩm mà chúng tôi sản xuất.</span></p>', 1, 2200000, 200000, 1, '/storage/uploads/2024/11/26/Home_Mu_24_25.avif', '2024-11-26 06:37:57', '2024-11-26 06:37:57'),
(3, 'Áo sân nhà Real Madrid 24/25', 'a', '<p>a</p>', 1, 3000000, 2800000, 1, '/storage/uploads/2024/11/26/Home_Real_24_25.avif', '2024-11-26 06:45:17', '2024-11-26 06:45:17'),
(4, 'Áo sân nhà Spain 24/25', 'q', '<p>q</p>', 1, 2800000, 2500000, 1, '/storage/uploads/2024/11/26/Home_Spain_24_25.avif', '2024-11-26 06:46:19', '2024-11-26 06:46:19'),
(5, 'Jacket Arsenal Blue', 'm', '<p>m</p>', 1, 1000000, 900000, 1, '/storage/uploads/2024/11/26/Jacket_Ars_24_25.avif', '2024-11-26 06:47:25', '2024-11-26 06:47:25'),
(6, 'Áo Jersey David Beckham Originals', 'l', '<p>l</p>', 1, 1600000, 1500000, 1, '/storage/uploads/2024/11/26/Jersey_DB.avif', '2024-11-26 06:48:18', '2024-11-26 06:48:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
