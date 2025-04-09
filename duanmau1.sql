-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2025 at 03:29 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duanmau1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `Category_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Parent_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Category_name`, `Parent_id`) VALUES
(20, 'Netflix Premium', 3),
(21, 'YouTube Premium', 3),
(22, 'Spotify Premium', 3),
(23, 'Calm Premium', 3),
(24, 'iQIYI Premium', 3),
(25, 'Zoom Pro', 4),
(26, 'Microsoft Office', 4),
(28, 'CamScanner Premium', 4),
(29, 'Notion', 4),
(30, 'VMware Workstation 17 Pro', 4),
(31, '1Password', 4),
(32, 'LinkedIn Premium Business', 4),
(33, 'LastPass Premium', 4),
(34, 'Duolingo Super', 5),
(35, 'Grammrly Premium', 5),
(36, 'Quizlet', 5),
(37, 'Datcamp', 5),
(38, 'QuillBot Premium', 5),
(39, 'Mate Translate', 5),
(43, 'Canva Pro', 7),
(44, 'Adobe Creative Cloud', 7),
(45, 'Adobe Express', 7),
(46, 'Adobe Acrobat Standard', 7),
(47, 'Adobe Substance', 7),
(56, 'Windows', 8),
(58, 'Copilot Pro', 8),
(59, 'Google Dive', 9),
(60, 'Google One', 9),
(62, 'Steam Wallet Code (HKD)', 10),
(63, 'Steam Wallet Code (TWD)', 10),
(64, 'Avast Premium', 11),
(65, 'Avast Ultimate', 11),
(67, 'McAfee Internet Security 2024', 11),
(68, 'Norton 360 Premium', 11);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_id` int NOT NULL,
  `product_id` int NOT NULL,
  `User_id` int NOT NULL,
  `Comment_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Comment_content` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rating` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_id`, `product_id`, `User_id`, `Comment_time`, `Comment_content`, `rating`) VALUES
(1, 32, 6, '2024-11-13 15:33:41', ',m,m', 0),
(2, 21, 6, '2024-11-13 15:38:35', 'hjgj', 0),
(3, 21, 6, '2024-11-13 16:52:07', 'đẹp quá', 0),
(4, 31, 6, '2024-11-16 01:59:30', 'h', 0),
(5, 25, 6, '2024-11-16 02:00:02', 'đẹp quá', 0),
(6, 19, 6, '2024-11-16 02:05:23', 'dfg', 0),
(7, 21, 6, '2024-11-17 15:23:42', 'n', 0),
(8, 32, 6, '2024-11-19 08:59:16', 'hbhfb', 0),
(9, 32, 6, '2024-11-20 05:53:10', 'đẹp', 0),
(10, 23, 6, '2024-11-21 04:48:13', 'huhu', 0),
(11, 20, 6, '2024-11-22 15:00:20', 'jnk', 0),
(12, 20, 6, '2024-11-22 15:00:30', 'kk', 0),
(13, 20, 6, '2024-11-22 15:05:49', 'Đẹp quá đi ', 0),
(14, 20, 6, '2024-11-22 15:23:51', 'CÒn màu khác ko vậy ạ', 3),
(15, 20, 6, '2024-11-22 15:28:11', 'đẹp quá vậy', 4),
(16, 20, 6, '2024-11-22 15:38:50', 'không đẹp thế', 3),
(17, 21, 6, '2024-11-22 15:50:39', 'vchgvk hvjlhv', 3),
(18, 21, 6, '2024-11-22 15:50:59', 'mn ,mb ughuy;.ubgyu', 4),
(19, 25, 6, '2024-11-24 01:51:51', 'Máy dùng thích', 5),
(20, 25, 6, '2024-11-24 01:58:57', '100 điểm luôn', 5),
(21, 25, 6, '2024-11-24 01:59:29', 'tuyệt vời luôn', 4),
(22, 21, 6, '2024-11-26 08:48:47', 'đẹp vâiiiiiiiiiiiiii', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countdown`
--

CREATE TABLE `countdown` (
  `id` int NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `countdown`
--

INSERT INTO `countdown` (`id`, `end_time`) VALUES
(1, '2025-07-31 13:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_id` int NOT NULL,
  `Customer_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Customer_phone` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Customer_mail` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `Deliverer_id` int NOT NULL COMMENT 'id nhan vien giao hang',
  `Deliverer_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ten nhan vien giao hang',
  `Deliverer_phone` varchar(11) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'so dien thoai nvgh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `Order_detail_id` int NOT NULL COMMENT 'id chi tiết hóa đơn',
  `Order_id` int NOT NULL COMMENT 'id hóa đơn',
  `Product_id` int NOT NULL COMMENT 'id sản phẩm',
  `Price` int NOT NULL COMMENT 'Gía mỗi loại sp mua',
  `Sale_quantity` int NOT NULL COMMENT 'so luong mỗi sp trong hóa đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`Order_detail_id`, `Order_id`, `Product_id`, `Price`, `Sale_quantity`) VALUES
(90, 186, 19, 34990000, 1),
(91, 186, 45, 3990000, 1),
(92, 188, 21, 31990000, 1),
(93, 189, 51, 990000, 1),
(94, 189, 45, 3990000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_pro`
--

CREATE TABLE `order_pro` (
  `Order_id` int NOT NULL COMMENT 'id hóa đơn',
  `user_id` int NOT NULL COMMENT 'id khách hàng',
  `Deliverer` int DEFAULT NULL COMMENT 'id nhân ',
  `Create_date` datetime NOT NULL COMMENT 'Ngày lập đơn hàng',
  `Total_Price` int NOT NULL COMMENT 'Tổng giá trị đơn hàng',
  `Delivery_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'địa điểm nhận đơn hàng',
  `Note` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'ghi chú',
  `status_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_pro`
--

INSERT INTO `order_pro` (`Order_id`, `user_id`, `Deliverer`, `Create_date`, `Total_Price`, `Delivery_address`, `Note`, `status_id`) VALUES
(186, 6, NULL, '2024-11-28 22:50:26', 34990000, 'CellphoneS 123 Xuân Thủy, Cầu Giấy, Quận Hoàn Kiếm, Thành phố Hà Nội', '', 1),
(187, 6, NULL, '2024-11-28 23:27:50', 3990000, 'CellphoneS 456 Trần Duy Hưng, Cầu Giấy, Thành phố Hà Giang, Tỉnh Hà Giang', '', 1),
(188, 6, NULL, '2024-11-28 23:28:15', 31990000, '07,  202, Xã Đại Tự, Huyện Yên Lạc, Tỉnh Vĩnh Phúc', '', 1),
(189, 6, NULL, '2025-04-03 22:19:12', 4980000, 'CellphoneS 123 Xuân Thủy, Cầu Giấy, Quận Hoàn Kiếm, Thành phố Hà Nội', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status_name`) VALUES
(1, 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `parentcate`
--

CREATE TABLE `parentcate` (
  `id` int NOT NULL,
  `parent_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `parentcate`
--

INSERT INTO `parentcate` (`id`, `parent_name`) VALUES
(3, 'Giải trí'),
(4, 'Làm việc'),
(5, 'Học tập'),
(6, 'Game Steam'),
(7, 'Edit Ảnh - Video'),
(8, 'Window'),
(9, 'Google Drive'),
(10, 'Steam Wallet'),
(11, 'Diệt Viruss');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL COMMENT 'ID sản phẩm',
  `Name_product` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tên điện thoại',
  `Title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tiêu đề sản phẩm',
  `Description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tính năng nổi bật',
  `Price` int NOT NULL COMMENT 'Gía sản phẩm',
  `Quanlity` int DEFAULT NULL COMMENT 'Số lượng điện thoại',
  `parent_cate` int NOT NULL,
  `Size` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'kích thước sản phẩm',
  `Weight` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Trọng lượng sản phẩm',
  `Color` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Màu sắc sản phẩm',
  `Image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh sản phẩm',
  `Memory` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Ram( Bộ nhớ)',
  `Os` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Hệ điều hành',
  `Cpu_speed` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Tốc độ CPU',
  `Camera_primary` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Camera trước',
  `Camera_secondary` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `Battery` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Loại pin số giờ hoạt động',
  `Warranty` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Chế độ bảo hành',
  `Bluetooth` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Bluetooth',
  `Promotion_price` int NOT NULL COMMENT 'Gía khuyến mãi',
  `Start_promotion` datetime DEFAULT NULL COMMENT 'Ngày bắt đầu khuyến mãi',
  `End_promotion` datetime DEFAULT NULL COMMENT 'Ngày kết thúc khuyến mãi',
  `Wlan` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Mạng lan',
  `Id_cat` int NOT NULL,
  `Detail` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `Screen` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'man hinh',
  `discount` int DEFAULT NULL,
  `clicks` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name_product`, `Title`, `Description`, `Price`, `Quanlity`, `parent_cate`, `Size`, `Weight`, `Color`, `Image`, `Memory`, `Os`, `Cpu_speed`, `Camera_primary`, `Camera_secondary`, `Battery`, `Warranty`, `Bluetooth`, `Promotion_price`, `Start_promotion`, `End_promotion`, `Wlan`, `Id_cat`, `Detail`, `Screen`, `discount`, `clicks`) VALUES
(19, 'Netflix Premium 1 ngày - Tài khoản', 'Netflix Premium 1 ngày - Tài khoản', 'Thiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ', 260000, 2, 3, NULL, NULL, NULL, 'NETFLIX-1ngay (1)-49447.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25000, NULL, NULL, NULL, 20, NULL, NULL, 10, 278),
(20, 'Netflix Premium 1 tuần - Tài khoản', 'Netflix Premium 1 tuần - Tài khoản', 'Máy mới 100% , chính hãng Apple Việt Nam.', 260000, 2, 3, NULL, NULL, NULL, 'NETFLIX-1tuan (1)-76597.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 59000, NULL, NULL, NULL, 20, '1. Đây là tài khoản tạo sẵn và được chia làm nhiều User, mỗi khách hàng sẽ được cấp 1 User riêng trong tài khoản để sử dụng. 2. Sau khi mua hàng, bạn sẽ nhận được ngay thông tin tài khoản đăng nhập vào Netflix (bao gồm Email, Mật khẩu, Số User và pass User). 3. Thời gian xử lý: Ngay sau khi thanh toán đơn hàng thành công. 4. Hình thức nhận hàng: Thông tin đăng nhập trong đơn hàng. 5. Sản phẩm có thể đăng nhập trên nhiều thiết bị nhưng chỉ được sử dụng 1 thiết bị tại 1 thời điểm (Không xem phim trên nhiều thiết bị cùng lúc). Lưu ý tài khoản không hỗ trợ sử dụng trên máy chiếu. 6. Sản phẩm sẽ chỉ hỗ trợ xem tại Việt Nam và một số quốc gia Đông Nam Á.', NULL, NULL, 161),
(21, 'Netflix Premium 1 tháng - Tài khoản', 'Netflix Premium 1 tháng - Tài khoản', 'Máy mới 100% , chính hãng Apple Việt Nam. CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam', 260000, 10, 3, NULL, NULL, NULL, 'NETFLIX-1thang-88147.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129000, NULL, NULL, NULL, 20, NULL, NULL, NULL, 225),
(23, 'YouTube Premium + YouTube Music 6 tháng - Gia hạn chính chủ', 'YouTube Premium + YouTube Music 6 tháng - Gia hạn chính chủ', 'Samsung Z Flip 6 là chiếc điện thoại gập vỏ sò chạy chip Snapdragon 8 Gen 3 for Galaxy mạnh mẽ bậc nhất hiện nay. ', 3360000, 100, 3, NULL, NULL, NULL, 'YouTube Premium Music-6thang-48726.png', NULL, NULL, NULL, NULL, NULL, NULL, ' Thời gian bảo hành 1 ngày Chính sách bảo hành Đổi mới sản phẩm tương đương hoặc hoàn tiền nếu không có sản phẩm thay thế.', NULL, 299000, NULL, NULL, NULL, 21, 'Chip Snapdragon 8 Gen 2 8 nhân mang đến hiệu năng mạnh mẽ, cho phép bạn xử lý các tác vụ hàng ngày một cách mượt mà. ', NULL, NULL, 43),
(24, 'YouTube Premium + YouTube Music 1 năm - Gia hạn chính chủ', 'YouTube Premium + YouTube Music 1 năm - Gia hạn chính chủ', 'Samsung Z Fold 6 là siêu phẩm điện thoại gập được ra mắt ngày 10/7,', 6700000, 12, 3, NULL, NULL, NULL, 'YouTube Premium Music-1nam-65910.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 599000, NULL, NULL, NULL, 21, NULL, NULL, NULL, 42),
(25, 'Spotify Premium 1 tuần - Tài khoản', 'Spotify Premium 1 tuần - Tài khoản', 'iPhone 15 128GB | Chính hãng VN/A', 25000, 200, 3, NULL, NULL, NULL, 'Spotify tk 7d-97275.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15000, NULL, NULL, NULL, 22, NULL, NULL, NULL, 52),
(26, 'Spotify Premium 1 tháng - Tài khoản', 'Spotify Premium 1 tháng - Tài khoản', 'Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS', 59000, 100, 4, NULL, NULL, NULL, 'Spotify-TaiKhoan-1m-53726.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49000, NULL, NULL, NULL, 22, NULL, NULL, NULL, 63),
(27, 'Spotify Premium 3 tháng - Tài khoản', 'Spotify Premium 3 tháng - Tài khoản', 'Sức mạnh xử lý hàng đầu trên chip Apple M3 - Cân tốt mọi tác vụ từ đồ hoạ đến lập trình Màn hình Liquid Retina 13,6 inch - Màu sắc hiển thị rực rỡ, sắc nét Camera FaceTime HD 1080p - Đàm thoại, hội họp mọi lúc mọi nơi Hỗ trợ sạc 30W - Nhanh chóng nạp đầy pin khi bạn cần', 177000, 120, 4, NULL, NULL, NULL, 'Spotify tk 3m-16176.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 149000, NULL, NULL, NULL, 22, NULL, NULL, NULL, 35),
(28, 'Spotify Premium 1 năm - Gia hạn chính chủ', 'Spotify Premium 1 năm - Gia hạn chính chủ', 'Hiệu năng ổn định, đáp ứng tốt nhu cầu cơ bản với Unisoc T606. Camera chính 13MP chụp ảnh sắc nét, màu sắc chân thực. Pin trâu 5.000 mAh - Sử dụng cả ngày dài mà không lo hết pin. Thiết kế vuông vức sang trọng, trẻ trung, phù hợp mọi đối tượng.', 710000, 200, 3, NULL, NULL, NULL, 'Spotify-GiaHan-1y-65116.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 409000, NULL, NULL, NULL, 22, NULL, NULL, NULL, 1),
(29, 'iQIYI Cao cấp 1 tháng (1 thiết bị) - Tài khoản', 'iQIYI Cao cấp 1 tháng (1 thiết bị) - Tài khoản', 'Chip Snapdragon 8 Gen 1 cho hiệu suất mạnh mẽ, cân mọi tác vụ từ giải trí đến làm việc Màn hình AMOLED 120 Hz mang đến cho bạn trải nghiệm mượt mà, màu sắc sống động Dùng thoải mái cả ngày với dung lượng pin 5.000 mAh, tích hợp sạc nhanh 80W hiện đại RAM 12GB đảm bảo khả năng xử lý đa nhiệm không giật lag, ROM 256GB giúp lưu trữ tốt', 299000, 300, 3, NULL, NULL, NULL, 'iQIYI Premium-1m-57221.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49000, NULL, NULL, NULL, 24, NULL, NULL, NULL, 9),
(30, 'Calm Premium 3 tháng - Tài khoản', 'Calm Premium 3 tháng - Tài khoản', 'Thiết kế dẫn đầu xu hướng - Nhiều màu sắc trendy cùng chất liệu kính pha màu và khung nhôm vô cùng bền bỉ Nắm bắt và tương tác mọi thông tin dễ dàng hơn với Dynamic Island mở rộng Chụp ảnh chân dung xuất sắc mọi khoảnh khắc - Camera chính 48MP với tele 2X và chế độ chỉnh sửa đa dạng Hiệu năng cân mọi tác vụ - A16 Bionic mạnh mẽ cho mọi thao tác mượt mà và nhanh chóng', 950000, 100, 3, NULL, NULL, NULL, 'Calm Premium-taikhoan-3m-43015.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49000, NULL, NULL, NULL, 23, NULL, NULL, NULL, 2),
(31, 'iQIYI Cao cấp 1 năm (1 thiết bị) - Tài khoản', 'iQIYI Cao cấp 1 năm (1 thiết bị) - Tài khoản', 'ĐẶC ĐIỂM NỔI BẬT Trải nghiệm hình ảnh sống động và sắc nét với màn hình AMOLED 6.7 inch, độ phân giải Super AMOLED+. Ghi lại những bức ảnh tuyệt đẹp với camera chính 50MP, khẩu độ f/1.8, cùng nhiều tính năng chụp ảnh thông minh. Qualcomm Snapdragon 7 Gen 1 nhân kết hợp với RAM 8GB mang đến hiệu suất mạnh mẽ cho mọi tác vụ, từ chơi game đến chỉnh sửa video. Pin khủng 5000mAh - Sử dụng điện thoại cả ngày dài mà không lo hết pin nhờ viên pin.', 2500000, 1000, 3, NULL, NULL, NULL, 'iQIYI Premium 1y-88567.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 399999, NULL, NULL, NULL, 24, NULL, NULL, NULL, 29),
(32, 'Zoom Pro 14 Ngày - Gói nâng cấp', 'Zoom Pro 14 Ngày - Gói nâng cấp', 'Chip Exynos 1480 4nm - Sử dụng mượt mà, linh hoạt với các tác vụ nặng nề mà không gặp trở ngại. Với camera góc rộng 12MP mang đến khả năng thu trọn mọi khung cảnh vào khung hình. Tần số quét 120Hz - Mỗi hành động trên màn hình đều trở nên mượt mà đáng kinh ngạc. Pin 5000 mAh kết hợp cùng sạc nhanh 25W - Sử dụng thoải mái trong mọi hoạt động hằng ngày.', 175000, 10000, 3, NULL, NULL, NULL, 'Zoom Pro 14d-20830.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 109000, NULL, NULL, NULL, 25, NULL, NULL, NULL, 113),
(33, 'Zoom Pro 28 Ngày - Tài khoản', 'Zoom Pro 28 Ngày - Tài khoản', 'Chip Apple M4. Hiệu năng như mơ, đồ họa thay đổi cuộc chơi và năng lực AI mạnh mẽ.', 350000, 100, 5, NULL, NULL, NULL, 'Zoom Pro tk 28d-34448.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 185000, NULL, NULL, NULL, 25, NULL, NULL, NULL, 21),
(34, 'Zoom Pro 1 tháng (300 thành viên) - Gói nâng cấp', 'Zoom Pro 1 tháng (300 thành viên) - Gói nâng cấp', 'Tích hợp chip Apple H2 mang đến chất âm sống động cùng khả năng tái tạo âm thanh 3 chiều vượt trội Công nghệ Bluetooth 5.3 kết nối ổn định, mượt mà, tiêu thụ năng lượng thấp, giúp tiết kiệm pin đáng kể Chống ồn chủ động loại bỏ tiếng ồn hiệu quả gấp đôi thế hệ trước, giúp nâng cao trải nghiệm nghe nhạc Chống nước chuẩn IP54 trên tai nghe và hộp sạc, giúp bạn thỏa sức tập luyện không cần lo thấm mồ hôi', 550000, 999, 6, NULL, NULL, NULL, 'Zoom Pro-NangCap-1m-300tv-40998.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 490000, NULL, NULL, NULL, 25, NULL, NULL, NULL, 4),
(35, 'Microsoft Office 2016 Professional Plus for Windows', 'Microsoft Office 2016 Professional Plus for Windows', 'Trang bị chip S9 SiP mạnh mẽ hỗ trợ xử lý mọi tác vụ nhanh chóng với nhiều tiện ích Dễ dàng kết nối, nghe gọi, trả lời tin nhắn ngay trên cổ tay Trang bị nhiều tính năng sức khỏe như: Đo nhịp tim, điện tâm đồ, đo chu kỳ kinh nguyệt,... Độ sáng tối đa lên tới 2000 nit, dễ xem màn hình ngay dưới ánh nắng gắt Tích hợp nhiều chế độ tập luyện với các môn thể thao như: Bơi lội, chạy bộ, đạp xe,...', 4000000, 999, 7, NULL, NULL, NULL, 'Microsoft Office 2016 Professional Plus-windows-71198.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 600000, NULL, NULL, NULL, 26, NULL, NULL, NULL, 2),
(36, 'Microsoft Office 2016 Home & Business for MAC', 'Microsoft Office 2016 Home & Business for MAC', 'Hỗ trợ Esim cho phép nghe gọi ngay trên đồng hồ Chức năng màn hình luôn bật giữ cho chức năng xem giờ luôn hoạt động,tiết kiệm pin hơn Thoải mái sử dụng ở hồ bơi hay ngoài trời với chuẩn kháng bụi IP6X ,chống nước đến 50m Đo nhịp tim,oxy trong máu,theo dõi giấc ngủ cùng nhiều tính năng sức khoẻ tích hợp sẵn Cổng sạc Type C,sạc nhanh 45 phút cho 80% pin Hỗ trợ Esim cho phép nghe gọi ngay trên đồng hồ', 3500000, 999, 7, NULL, NULL, NULL, 'Microsoft Office 2016 Home Business-mac-68488.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 410000, NULL, NULL, NULL, 26, NULL, NULL, NULL, 22),
(37, 'Microsoft Office 2019 Professional Plus for Windows', 'Microsoft Office 2019 Professional Plus for Windows', 'Có thể sử dụng bằng 2 cách: Đổ nước trực tiếp (chỉ 5 lít / lần sử dụng) hoặc lắp đặt. Đánh bay các vết bẩn từ mọi vị trí nhờ vào lực nước mạnh có thể phun 360 độ Diệt khuẩn và bảo quản lên đến 73 giờ với tính năng sấy khô ở nhiệt độ cao Trang bị 5 chương trình rửa thông minh giúp bạn tiết kiệm thời gian đáng kể Ngăn xếp chén dĩa thông minh với sức chứa tới 4 bộ chén đĩa, ly, thìa, đũa,...', 9500000, 999, 8, NULL, NULL, NULL, 'Microsoft Office 2019 Professional Plus-windows-11845.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 810000, NULL, NULL, NULL, 26, NULL, NULL, NULL, 5),
(38, 'Microsoft 365 (Office 365) 1 năm 1TB', 'Microsoft 365 (Office 365) 1 năm 1TB', 'Sở hữu màn hình kích thước 16 inch WUXGA cho hình ảnh rõ nét với màu sắc và gam màu phong phú CPU AMD Ryzen 7 7730U có thể xử lý đa nhiệm các chương trình đòi hỏi hiệu suất cao một cách hiệu quả Đồ họa AMD Radeon cải thiện đáng kể đầu ra hình ảnh và tăng cường hiệu suất tổng thể RAM 16 GB cùng ổ cứng 512 GB SSD rộng rãi, lưu trữ nhiều file, tài liệu Bàn phím Chiclet tích hợp cảm biến vân tay hỗ trợ bảo mật thông tin hiệu quả', 9500000, 999, 4, NULL, NULL, NULL, 'Microsoft 365-1y-23055.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 810000, NULL, NULL, NULL, 26, NULL, NULL, NULL, 2),
(39, 'CamScanner Premium 1 năm - Tài khoản', 'CamScanner Premium 1 năm - Tài khoản', 'Thiết kế thanh mãng, thời thượng với trọng lượng nhe chỉ 1.55 kg. Màn hình 14 inch cùng độ phân giải WUXGA, mang đến hình ảnh hiển thị mượt êm, rõ nét. CPU AMD Ryzen 7 5700U cho tốc độ phản hồi nhanh và xử lý đa nhiệm, tiết kiệm điện tối ưu, làm việc trơn tru. RAM 16GB đảm bảo cho người dùng làm việc một các mượt mà với các ứng dụng mà không bị xảy ra tình trạng giật lag. Ổ cứng SSD 512GB giúp quá trình khởi động máy hay sao chép dữ liệu trở nên nhanh chóng hơn.', 1199000, 999, 4, NULL, NULL, NULL, 'CamScanner Premium-1y-84820.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 490000, NULL, NULL, NULL, 28, NULL, NULL, NULL, 12),
(40, 'CamScanner Premium 15 Tháng - Tài khoản', 'CamScanner Premium 15 Tháng - Tài khoản', 'Sở hữu thiết kế tinh tế với lớp vỏ nhôm sáng bóng, sang trọng Màn hình 14 inch WUXGA cực sắc nét, hỗ trợ làm việc, giải trí dễ dàng CPU Intel Core i5-12450H mạnh mẽ, giải quyết nhanh mọi tác vụ học tập, văn phòng RAM 16GB cùng ổ cứng 512GB SSD đa nhiệm, mở máy, mở ứng dụng cực nhanh Độ sáng lên đến 300nits hỗ trợ làm việc ở nơi có ánh sáng yếu', 1760000, 999, 4, NULL, NULL, NULL, 'CamScanner Premium-15m-75848.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 590000, NULL, NULL, NULL, 28, NULL, NULL, NULL, 8),
(41, 'Notion Pro - Tài khoản 2 năm', 'Notion Pro - Tài khoản 2 năm', 'Kiểu dáng mỏng nhẹ, phong cách hiện đại - Khung viền và mặt lưng kim loại, mỏng chỉ 7 mm Hiệu năng đỉnh xử lí mọi tác vụ - Apple A14 Bionic với tốc độ tối đa 3.1 GHz, RAM 4 GB Mang đến thế giới hình ảnh sắc nét, sống động - Màn hình Retina IPS LCD kích thước 10.9 inch Đồng hành cùng bạn trong thời gian dài - Pin lớn trên 7000 mAh, sạc nhanh tối ưu thời gian', 1280000, 998, 5, NULL, NULL, NULL, 'Notion Pro 2 nam-33684.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 190000, NULL, NULL, NULL, 29, NULL, NULL, NULL, 9),
(42, 'Notion Plus (AI) 1 năm - Nâng cấp chính chủ', 'Notion Plus (AI) 1 năm - Nâng cấp chính chủ', 'Thiết kế kim loại nguyên khối - Nhỏ gọn, sang trọng với hai gam màu hiện đại. Snapdragon 870 - Hiệu suất cao hàng đầu trong phân khúc. Dung lượng pin lớn 8840 mAh - Đáp ứng tốt được nhu cầu làm việc cả ngày dài. Thoải thích đắm chìm trong các bộ phim với màn hình hiển thị sắc nét độ phân giải 2,8K; mượt mà với tốc độ làm mới 144Hz. Tận hưởng âm thanh thực sự đắm chìm với Quad Speakers cùng ánh xạ kênh giúp điều chỉnh đầu ra âm thanh theo hướng màn hình của bạn.', 1290000, 111, 5, NULL, NULL, NULL, 'Notion Plus 1y-48547.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 149000, NULL, NULL, NULL, 29, NULL, NULL, NULL, 3),
(43, 'Code kích hoạt VMware Workstation 17 Pro (Vĩnh viễn)', 'Code kích hoạt VMware Workstation 17 Pro (Vĩnh viễn)', 'Tần số quét 90 Hz giúp người dùng có những phút giây trải nghiệm hình ảnh sinh động và vô cùng chân thật. Có khả năng kháng nước, bụi đạt chuẩn IP68 giúp người dùng yên tâm sử dụng. Kết hợp với bút S - Pen siêu tiện lợi - Giúp người dùng tăng cường năng suất làm việc. Thiết kế cao cấp, sang trọng được hoàn thiện bằng chất liệu kim loại nguyên khối.', 600000, 110, 5, NULL, NULL, NULL, 'VMware Workstation 17 Pro-62551.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 149000, NULL, NULL, NULL, 30, NULL, NULL, NULL, 2),
(44, '1Password 1 năm - Nâng cấp chính chủ', '1Password 1 năm - Nâng cấp chính chủ', 'Màn hình IPS LCD, 11 inch, độ phân giải cao - Cho hình ảnh sắc nét và màu sắc chân thực, góc nhìn hình ảnh rộng. Đáp ứng tốt các nhu cầu đa nhiệm và giải trí với chipset MediaTek Helio G88 và GPU Mali-G52 MC2. Pin dung lượng lớn 7040 mAh cung cấp năng lượng đảm bảo sử dụng suốt cả ngày. Hệ thống âm thanh Dolby Atmos chất lượng cao, mang đến trải nghiệm đắm chìm vào các không gian giải trí tuyệt vời.', 860000, 999, 5, NULL, NULL, NULL, '1Password-62076.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 390000, NULL, NULL, NULL, 31, NULL, NULL, NULL, 0),
(45, 'Nâng cấp LinkedIn Premium Business 6 tháng', 'Nâng cấp LinkedIn Premium Business 6 tháng', 'Phản hồi nhanh hơn và tiết kiệm năng lượng nhờ vào con chip Apple H1 Thiết kế sang trọng, gọn nhẹ tạo cảm giác thoải mái khi đeo hàng giờ liền Tích hợp 2 micro khử tiếng ồn cho chất lượng âm thanh tốt khi đàm thoại Hỗ trợ công nghệ sạc nhanh, chỉ mất 15 phút là đã có ngay 3 giờ sử dụng', 6700000, 999, 6, NULL, NULL, NULL, 'Linkedin Premium-29287.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 990000, NULL, NULL, NULL, 32, NULL, NULL, NULL, 10),
(46, 'LinkedIn Premium Business 1 năm - Nâng cấp chính chủ', 'LinkedIn Premium Business 1 năm - Nâng cấp chính chủ', 'Thời lượng pin siêu tốt, có thể hoạt động lên đến 30 giờ khi dùng kèm hộp sạc Chất lượng âm thanh đỉnh cao khi được xử lý bởi con chip Apple H1 độc quyền Hỗ trợ sạc không dây Magsafe giúp cho việc nạp đầy pin trở nên vô cùng tiện lợi Yên tâm khi luyện tập thể thao, đi mưa nhờ vào trang bị chuẩn kháng nước IPX4', 13500000, 111, 6, NULL, NULL, NULL, 'Linkedin Premium 1 year-23390.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2590000, NULL, NULL, NULL, 32, NULL, NULL, NULL, 3),
(47, 'LastPass Premium 1 năm - Nâng cấp chính chủ', 'LastPass Premium 1 năm - Nâng cấp chính chủ', 'Chống ồn chủ động ANC cho bạn thoải sức đắm chìm trong không gian âm nhạc Âm thanh Hi-Fi 24 bit giúp trải nghiệm âm thanh chi tiết và sống động như thật Thời lượng pin dài lên đến 30 giờ khi tắt ANC, sẵn sàng nghe nhạc cả ngày dài Công nghệ Bluetooth 5.4 giúp kết nối nhanh và ổn định với các thiết bị của bạn', 799000, 1111, 6, NULL, NULL, NULL, 'Divine-Shop-LastPass-Premium-1-Nam-22011.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 399000, NULL, NULL, NULL, 33, NULL, NULL, NULL, 1),
(48, 'Canva Pro 1 tháng - Tài khoản', 'Canva Pro 1 tháng - Tài khoản', 'Công nghệ Auto NC Optimizer tự động khử tiếng ồn dựa theo môi trường Trải nghiệm nghe chân thật, sống động nhờ tính năng 360 Reality Audio Thiết kế sang trọng, trọng lượng nhẹ với phần da mềm mại, ôm khít đầu Năng lượng cho cả ngày dài với thời lượng sử dụng pin lên đến 40 giờ', 150000, 200, 6, NULL, NULL, NULL, 'Canva-taikhoan-1thang-24931.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25000, NULL, NULL, NULL, 43, NULL, NULL, NULL, 0),
(49, 'Canva Pro 1 năm - Gia hạn chính chủ', 'Canva Pro 1 năm - Gia hạn chính chủ', 'Đàm thoại dễ dàng với tính năng nghe gọi trên đồng hồ Lưu trữ nhạc trên đồng hồ và thưởng thức thông qua loa ngoài hoặc tai nghe bluetooth Thời lượng pin sử dụng đến 14 ngày cho bạn thỏa thích sử dụng Phát hiện sớm các nguy cơ về sức khoẻ với tính năng cảnh báo nhịp tim bất thường Theo dõi lượng calo tiêu thụ trong ngày thông qua ứng dụng Stay Fit Thiết kế dây vải sang trọng cùng vòng benzel chắc hắn sẽ giúp bạn trông nổi bật hơn', 1500000, 1111, 7, NULL, NULL, NULL, 'Canva-giahan-1nam-13476.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 295000, NULL, NULL, NULL, 43, NULL, NULL, NULL, 0),
(51, 'Canva Pro 1 tháng - 5 thành viên', 'Canva Pro 1 tháng - 5 thành viên', 'Màn hình 1.62\'\' AMOLED cho chất lượng hiển thị sắc nét Thời lượng pin lên đến 16 ngày sử dụng - thoả sức tập luyện mà không lo hết pin Bảo vệ sức khoẻ hằng ngày với tính năng đo nhịp tim, SpO2, giấc ngủ, VO2 max Kháng nước chuẩn 5ATM, không ngại trời mưa hay nước bắn Nâng cao hiệu quả tập luyện với hơn 150 chế độ thể thao', 175000, 1111, 7, NULL, NULL, NULL, 'Canva-1m-5tv-52217.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 109000, NULL, NULL, NULL, 43, NULL, NULL, NULL, 35),
(52, 'Canva Pro 1 tháng - Gia hạn nhóm 10 thành viên', 'Canva Pro 1 tháng - Gia hạn nhóm 10 thành viên', 'Thực hiện cuộc thông thường hay video call với sim 4G Nút liên lạc khẩn cấp tự động gửi vị trí cùng một bản ghi âm 30 giây tới các số được lưu sẵn Ghi lại lịch sử di chuyển với định vị GPS Thao tác thuận tiện với màng hình 1.3 inch Không ngại mưa rơi hay nước bắn với kháng nước chuẩn IP67', 250000, 111, 7, NULL, NULL, NULL, 'Canva-1m-10tv-12235.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 199000, NULL, NULL, NULL, 43, NULL, NULL, NULL, 0),
(55, 'Phần mềm thiết kế Full App 100GB Cloud 1 tháng - Code kích hoạt', 'Phần mềm thiết kế Full App 100GB Cloud 1 tháng - Code kích hoạt', '', 1500000, 50, 7, NULL, NULL, NULL, 'Adobe full app 1 thang-46533.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 299000, '2025-04-11 00:00:00', '2025-05-02 00:00:00', NULL, 44, NULL, NULL, 20, 0),
(56, 'Phần mềm thiết kế Full App 100GB Cloud 3 tháng - Code kích hoạt', 'Phần mềm thiết kế Full App 100GB Cloud 3 tháng - Code kích hoạt', '', 2900000, 43, 7, NULL, NULL, NULL, 'Adobe full app v2 3 thang-72555.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 849000, '2025-04-08 00:00:00', '2025-04-09 00:00:00', NULL, 44, NULL, NULL, 12, 0),
(57, 'Phần mềm thiết kế Full App 80GB Cloud 1 năm - Tài khoản Share (1 thiết bị)', 'Phần mềm thiết kế Full App 80GB Cloud 1 năm - Tài khoản Share (1 thiết bị)', '', 15000000, 34, 7, NULL, NULL, NULL, 'Adobe full app v2-29445.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 890000, '2025-04-17 00:00:00', '2025-04-19 00:00:00', NULL, 44, NULL, NULL, 70, 0),
(58, 'Phần mềm thiết kế Full App 80GB Cloud 1 năm - Tài khoản Share (2 thiết bị)', 'Phần mềm thiết kế Full App 80GB Cloud 1 năm - Tài khoản Share (2 thiết bị)', '', 15000000, 32, 3, NULL, NULL, NULL, 'Adobe full app v2-29445.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 990000, '2025-04-04 00:00:00', '2025-04-05 00:00:00', NULL, 44, NULL, NULL, 94, 0),
(59, 'Gia hạn A-đô-be Express (1 năm)', 'Gia hạn A-đô-be Express (1 năm)', '', 500000, 12, 7, NULL, NULL, NULL, 'A-đô-be Express-75248.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 290000, '2025-04-02 00:00:00', '2025-04-01 00:00:00', NULL, 45, NULL, NULL, 42, 7),
(60, 'Acrobat Standard 1 tháng - Nâng cấp chính chủ', 'Acrobat Standard 1 tháng - Nâng cấp chính chủ', '1. Đây là Code kích hoạt Acrobat Standard 1 tháng. 2. Sau khi mua hàng thành công, bạn sẽ nhận được ngay key kích hoạt Acrobat Standard 1 tháng. 3. Thời gian xử lý: Bạn sẽ nhận được key ngay sau khi mua hàng thành công. 4. Hình thức nhận hàng: Key kích hoạt trong đơn hàng. 5. Key chỉ có thể kích hoạt 1 tài khoản, chỉ nhập code khi tài khoản của bạn đã hết hạn.', 699000, 20, 7, NULL, NULL, NULL, 'Acrobat Standard-1m-65164.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 89000, '2025-04-01 00:00:00', '2025-04-02 00:00:00', NULL, 46, NULL, NULL, 87, 1),
(61, 'Acrobat Standard 3 tháng - Nâng cấp chính chủ', 'Acrobat Standard 3 tháng - Nâng cấp chính chủ', 'Acrobat Standard là phần mềm quản lý và chỉnh sửa file PDF hàng đầu, giúp bạn dễ dàng tạo, chỉnh sửa, ký điện tử và bảo mật tài liệu PDF. Với bản quyền chính chủ 3 tháng, bạn sẽ được sử dụng trọn vẹn tính năng cao cấp, đảm bảo bảo mật tài khoản và cập nhật liên tục. Phù hợp cho nhân viên văn phòng, doanh nhân, sinh viên, giáo viên và những ai thường xuyên làm việc với tài liệu PDF.', 1900000, 12, 7, NULL, NULL, NULL, 'Acrobat Standard-3m-53678.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 199000, NULL, NULL, NULL, 46, 'Đây là tài khoản tạo sẵn và được chia làm nhiều User, mỗi khách hàng sẽ được cấp 1 User riêng trong tài khoản để sử dụng.', NULL, 92, 2),
(62, 'Substance 3D 1 tháng - Nâng cấp chính chủ', 'Substance 3D 1 tháng - Nâng cấp chính chủ', 'Substance 3D là bộ công cụ thiết kế vật liệu, kết cấu và mô phỏng 3D mạnh mẽ, giúp tạo ra chất liệu chân thực cho game, phim ảnh, kiến trúc và thiết kế sản phẩm. Với bản quyền chính chủ 1 tháng, bạn sẽ được truy cập đầy đủ các công cụ như Substance Painter, Designer, Sampler, Modeler, hỗ trợ tạo texture, procedural materials và UV mapping chuyên nghiệp. Phù hợp cho họa viên 3D, nhà thiết kế game, kỹ sư đồ họa và những ai cần tạo vật liệu chất lượng cao.', 1000000, 23, 7, NULL, NULL, NULL, 'A-đô-be Substance 3D_1 thang-65009.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79000, '2025-04-10 00:00:00', '2025-04-11 00:00:00', NULL, 47, 'Đây là Code kích hoạt Substance 3D 1 tháng. Sau khi mua hàng thành công bạn sẽ nhận được ngay key kích hoạt Substance 3D 1 tháng. Thời gian xử lý: Bạn sẽ nhận được key ngay sau khi mua hàng thành công. Hình thức nhận hàng: Key kích hoạt trong đơn hàng. Key chỉ có thể kích hoạt 1 tài khoản, chỉ nhập code khi tài khoản của bạn đã hết hạn.', NULL, 92, 0),
(63, 'Duolingo Super 1 tháng - Tài khoản', 'Duolingo Super 1 tháng - Tài khoản', 'Học ngôn ngữ dễ dàng hơn với Duolingo Super, ứng dụng giáo dục ngôn ngữ được tải về hàng đầu trên thế giới!', 150000, 54, 5, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19000, NULL, NULL, NULL, 34, '', NULL, 87, 0),
(64, 'Duolingo Super 1 năm - Gia hạn chính chủ', 'Duolingo Super 1 năm - Gia hạn chính chủ', 'Học ngôn ngữ dễ dàng hơn với Duolingo Super, ứng dụng giáo dục ngôn ngữ được tải về hàng đầu trên thế giới!', 1850000, 12, 5, NULL, NULL, NULL, 'Duolingo-gh-1y-17122.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 290000, NULL, NULL, NULL, 34, '', NULL, 84, 0),
(65, 'Grammarly Premium (AI) 1 tháng 1 thiết bị - Tài khoản', 'Grammarly Premium (AI) 1 tháng 1 thiết bị - Tài khoản', '', 400000, 31, 5, NULL, NULL, NULL, 'Grammarly Premium-1m-1pc-55101.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129000, NULL, NULL, NULL, 35, '', NULL, 68, 0),
(66, 'Grammarly Premium 1 năm (AI) - Tài khoản', 'Grammarly Premium 1 năm (AI) - Tài khoản', '', 1500000, 21, 5, NULL, NULL, NULL, 'Grammarly Premium-1y-20123.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 590000, '2025-04-16 00:00:00', '2025-04-30 00:00:00', NULL, 35, '', NULL, 61, 0),
(67, 'Quizlet Plus 1 năm - Nâng cấp chính chủ', 'Quizlet Plus 1 năm - Nâng cấp chính chủ', '', 990000, 12, 5, NULL, NULL, NULL, 'Quizlet Plus-Nangcap-1y-28668.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 399000, '2025-04-02 00:00:00', '2025-04-03 00:00:00', NULL, 36, '', NULL, 62, 0),
(68, 'Quizlet Teacher 1 năm - Nâng cấp chính chủ', 'Quizlet Teacher 1 năm - Nâng cấp chính chủ', '', 1190000, 23, 5, NULL, NULL, NULL, 'Quizlet Teacher-nangcap-1y-13933.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 450000, NULL, NULL, NULL, 36, '', NULL, 62, 0),
(69, 'Datacamp Premium 3 tháng - Tài khoản', 'Datacamp Premium 3 tháng - Tài khoản', '', 750000, 30, 5, NULL, NULL, NULL, 'Datacamp-3m (1)-14973.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 199000, '2025-04-03 00:00:00', '2025-04-04 00:00:00', NULL, 37, '', NULL, 73, 0),
(70, 'Datacamp Premium 6 tháng - Nâng cấp chính chủ', 'Datacamp Premium 6 tháng - Nâng cấp chính chủ', '', 1500000, 13, 5, NULL, NULL, NULL, 'Datacamp-6m-54361.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 349000, NULL, NULL, NULL, 37, '', NULL, 77, 0),
(71, 'QuillBot Premium 1 tháng 2 thiết bị - Tài khoản', 'QuillBot Premium 1 tháng 2 thiết bị - Tài khoản', '', 250000, 13, 5, NULL, NULL, NULL, 'QuillBot Premium 2 Device (1)-59500.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79000, NULL, NULL, NULL, 38, '', NULL, 68, 0),
(72, 'Mate Translate - Tài khoản vĩnh viễn', 'Mate Translate - Tài khoản vĩnh viễn', '', 1500000, 14, 5, NULL, NULL, NULL, 'Mate Translate-60991.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99000, '2025-04-16 00:00:00', '2025-04-17 00:00:00', NULL, 39, '', NULL, 93, 0),
(73, 'Steam Wallet Code 100 TWD (~78.100 VNĐ)', 'Steam Wallet Code 100 TWD (~78.100 VNĐ)', '', 260000, 22, 10, NULL, NULL, NULL, 'STEAM 100 TWD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25000, '2025-04-18 00:00:00', '2025-04-17 00:00:00', NULL, 63, '', NULL, 1, 0),
(74, 'Steam Wallet Code 150 TWD (~117.150 VNĐ)', 'Steam Wallet Code 150 TWD (~117.150 VNĐ)', '', 260000, 32, 10, NULL, NULL, NULL, 'STEAM 150 TWD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 128000, '2025-04-01 00:00:00', '2025-04-02 00:00:00', NULL, 63, '', NULL, 1, 0),
(75, 'Steam Wallet Code 120 HKD (~398.640 VNĐ)', 'Steam Wallet Code 120 HKD (~398.640 VNĐ)', '', 1500000, 3, 10, NULL, NULL, NULL, 'STEAM120HKD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 409000, '2025-04-02 00:00:00', '2025-04-03 00:00:00', NULL, 62, '', NULL, 21, 0),
(76, 'Steam Wallet Code 200 HKD (~664.400 VNĐ)', 'Steam Wallet Code 200 HKD (~664.400 VNĐ)', '', 34990000, 12, 10, NULL, NULL, NULL, 'STEAM 200 HKD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 672000, '2025-04-03 00:00:00', '2025-04-04 00:00:00', NULL, 62, '', NULL, 12, 0),
(77, 'Steam Wallet Code 240 HKD (~797.280 VNĐ)', 'Steam Wallet Code 240 HKD (~797.280 VNĐ)', '', 1500000, 7, 10, NULL, NULL, NULL, 'STEAM 240 HKD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 807000, NULL, NULL, NULL, 62, '', NULL, 12, 0),
(78, 'Steam Wallet Code 300 HKD (~996.600 VNĐ)', 'Steam Wallet Code 300 HKD (~996.600 VNĐ)', '', 34990000, 2, 10, NULL, NULL, NULL, 'STEAM 300 HKD.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 999000, '2025-04-03 00:00:00', '2025-04-10 00:00:00', NULL, 62, '', NULL, 23, 0),
(79, 'Code kích hoạt Avast Mobile Security Premium (1 năm - 1 thiết bị Android)', 'Code kích hoạt Avast Mobile Security Premium (1 năm - 1 thiết bị Android)', '', 600000, 23, 11, NULL, NULL, NULL, 'AvastMobile-Premium Security-1tb-84471.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 129000, '2025-04-02 00:00:00', '2025-04-16 00:00:00', NULL, 64, '', NULL, 78, 0),
(80, 'Code kích hoạt Avast Premium Security (1 năm - 10 thiết bị)', 'Code kích hoạt Avast Premium Security (1 năm - 10 thiết bị)', '', 1490000, 11, 11, NULL, NULL, NULL, 'Avast-Premium Security-10tb-89518.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 590000, '2025-04-09 00:00:00', '2025-04-14 00:00:00', NULL, 64, '', NULL, 61, 0),
(81, 'Windows 10 Professional - CD Key', 'Windows 10 Professional - CD Key', '', 400000, 11, 8, NULL, NULL, NULL, 'Windows 10 Professional CD Key-22736.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 290000, '2025-04-09 00:00:00', '2025-04-10 00:00:00', NULL, 56, '', NULL, 28, 0),
(82, 'Windows 11 Professional - CD Key', 'Windows 11 Professional - CD Key', '', 400000, 11, 8, NULL, NULL, NULL, 'Windows 11 Professional CD Key-10256.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 290000, '2025-04-01 00:00:00', '2025-04-17 00:00:00', NULL, 56, '', NULL, 28, 0),
(83, 'Copilot Pro & Microsoft 365 1 tháng - Tài khoản', 'Copilot Pro & Microsoft 365 1 tháng - Tài khoản', '', 500000, 12, 8, NULL, NULL, NULL, 'Copilot Pro-TaiKhoan-1m-47702.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99000, '2025-04-08 00:00:00', '2025-04-17 00:00:00', NULL, 58, '', NULL, 80, 0),
(84, 'Google One 400GB 1 năm (1 thành viên) - Gói gia hạn chính chủ', 'Google One 400GB 1 năm (1 thành viên) - Gói gia hạn chính chủ', '', 1380000, 23, 9, NULL, NULL, NULL, 'Google One 400gb-33548.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 390000, '2025-04-02 00:00:00', '2025-04-10 00:00:00', NULL, 60, '', NULL, 72, 0),
(85, 'Google One 2TB 1 năm (5 thành viên) - Gói gia hạn chính chủ', 'Google One 2TB 1 năm (5 thành viên) - Gói gia hạn chính chủ', '', 2250000, 11, 9, NULL, NULL, NULL, 'Google One 2tb-33536.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 990000, '2025-04-01 00:00:00', '2025-04-05 00:00:00', NULL, 60, '', NULL, 56, 0),
(86, 'Google Drive 100GB (vĩnh viễn - BH 2 năm) - Tài khoản', 'Google Drive 100GB (vĩnh viễn - BH 2 năm) - Tài khoản', '', 900000, 29, 9, NULL, NULL, NULL, 'Google Drive 100-96355.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99000, '2025-04-10 00:00:00', '2025-04-16 00:00:00', NULL, 59, '', NULL, 89, 0),
(87, 'Google Drive 200GB (vĩnh viễn - BH 2 năm) - Tài khoản', 'Google Drive 200GB (vĩnh viễn - BH 2 năm) - Tài khoản', '', 1380000, 23, 9, NULL, NULL, NULL, 'Google Drive 200-21941.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 169000, '2025-04-02 00:00:00', '2025-04-16 00:00:00', NULL, 59, '', NULL, 88, 0),
(88, 'Google Drive 500GB (vĩnh viễn - BH 2 năm) - Tài khoản', 'Google Drive 500GB (vĩnh viễn - BH 2 năm) - Tài khoản', '', 3450000, 10, 9, NULL, NULL, NULL, 'Google Drive 500-20101.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 359000, '2025-04-03 00:00:00', '2025-04-14 00:00:00', NULL, 59, '', NULL, 90, 0),
(89, 'Google Drive 100GB 1 tháng - Tài khoản', 'Google Drive 100GB 1 tháng - Tài khoản', '', 900000, 43, 9, NULL, NULL, NULL, 'Google Drive-100gb-1m-94282.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 39000, '2025-04-08 00:00:00', '2025-04-16 00:00:00', NULL, 59, '', NULL, 96, 0),
(90, 'Google Drive 200GB 1 tháng - Tài khoản', 'Google Drive 200GB 1 tháng - Tài khoản', '', 1380000, 43, 9, NULL, NULL, NULL, 'Google Drive-200gb-1m-31440.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 69000, '2025-04-04 00:00:00', '2025-04-10 00:00:00', NULL, 59, '', NULL, 95, 1),
(91, 'Google Drive 500GB 1 tháng - Tài khoản', 'Google Drive 500GB 1 tháng - Tài khoản', '', 3450000, 21, 9, NULL, NULL, NULL, 'Google Drive-500gb-1m-26600.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 99000, '2025-04-02 00:00:00', '2025-04-10 00:00:00', NULL, 59, '', NULL, 97, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_slide`
--

CREATE TABLE `role_slide` (
  `role_slide_id` int NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `role_slide`
--

INSERT INTO `role_slide` (`role_slide_id`, `role_name`) VALUES
(1, 'banner chính'),
(2, 'banner phụ 1'),
(3, 'banner phụ 2'),
(4, 'banner phụ 3 PHỤ KIỆN\r\n '),
(5, 'banner phụ 4 LINH KIỆN MÁY TÍNH'),
(6, 'banner phụ 5 HÀNG CŨ'),
(7, 'banner phụ 6 Ưu đãi sinh viên'),
(8, 'banner phụ 7 Ưu đãi thanh toán'),
(9, 'banner phụ 8 Chuyên trang thương hiệu'),
(10, 'banner phụ 9 tin tức');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `role_slide_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `image`, `role_slide_id`, `description`) VALUES
(5, 'slide1', 'csgo (1).jpg', 1, 'slide1'),
(6, 'slide2', 'AutoDesk Main banner-22763.png', 1, 'slide2'),
(7, 'slide3', 'Netflix-11025.png', 1, 'slide3'),
(8, 'slide4', 'steam (1).jpg', 1, 'slide4'),
(9, 'slide5', 'steam1 (1).jpg', 1, 'slide5'),
(11, 'm55-right-banner-11-7-2024', 'VPN-74686.png', 2, 'm55-right-banner-11-7-2024'),
(12, 'b2s-2024-right-banner-laptop', 'AI-96835.png', 2, 'b2s-2024-right-banner-laptop'),
(13, 'right-banner-macbook-b2s-23-07-neww-new', 'Microsoft Office-69043.png', 2, 'right-banner-macbook-b2s-23-07-neww-new'),
(14, 'Banner-sale', 'b2s-update-19-06 (1).gif', 3, 'Banner-sale'),
(18, 'b2s-2024-slide-full-deal', 'b2s-2024-slide-full-deal.webp', 7, 'b2s-2024-slide-full-deal'),
(19, 'b2s-2024-slide-macbook', 'b2s-2024-slide-macbook.webp', 7, 'b2s-2024-slide-macbook'),
(20, 'b2s-2024-slide-samsung', 'b2s-2024-slide-samsung.webp', 7, 'b2s-2024-slide-samsung'),
(21, 'b2s-ipad-update-new-25-06', 'b2s-ipad-update-new-25-06.webp', 7, 'b2s-ipad-update-new-25-06'),
(22, 'bot3', 'bot3.webp', 8, 'bot3'),
(23, 'tra-gop-ba-khong-690-300-slide', 'tra-gop-ba-khong-690-300-slide.webp', 8, 'tra-gop-ba-khong-690-300-slide'),
(24, 'uu-dai-thanh-toan-hsbc-0803-2024', 'uu-dai-thanh-toan-hsbc-0803-2024.webp', 8, 'uu-dai-thanh-toan-hsbc-0803-2024'),
(25, 'vib-update-01-04-2024 (2)', 'vib-update-01-04-2024 (2).jpg', 8, 'vib-update-01-04-2024 (2)'),
(26, 'apple-chinh-hang-home', 'apple-chinh-hang-home.webp', 9, 'apple-chinh-hang-home'),
(27, 'gian-hang-samsung-home', 'gian-hang-samsung-home.webp', 9, 'gian-hang-samsung-home'),
(28, 'SIS asus', 'SIS asus.webp', 9, 'SIS asus'),
(29, 'xiaomi', 'xiaomi.webp', 9, 'xiaomi'),
(30, 'vivo Y37 5G ra mắt với chip Dimensity 6300, pin 5000 mAh, giá từ 4.19 triệu đồng', 'vivo-Y37-5G-ra-mat.jpg', 10, 'vivo Y37 5G ra mắt với chip Dimensity 6300, pin 5000 mAh, giá từ 4.19 triệu đồng'),
(31, 'Galaxy A06 lộ ảnh render sắc nét, hé lộ thiết kế Key Island, camera kép', 'Galaxy-A06-render.jpg', 10, 'Galaxy A06 lộ ảnh render sắc nét, hé lộ thiết kế Key Island, camera kép'),
(32, 'Đánh giá pin Galaxy Z Fold6: 4400mAh liệu có đủ cho một chiếc smartphone lai tablet?', 'danh-gia-pin-galaxy-z-fold6-thumb.jpg', 10, 'Đánh giá pin Galaxy Z Fold6: 4400mAh liệu có đủ cho một chiếc smartphone lai tablet?'),
(33, 'vivo Y18i lặng lẽ ra mắt với giá siêu rẻ, màn hình 90Hz và pin 5000 mAh', 'Vivo-Y18i-ra-mat-1.jpg', 10, 'vivo Y18i lặng lẽ ra mắt với giá siêu rẻ, màn hình 90Hz và pin 5000 mAh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `username`, `password`, `name`, `phone_number`, `email`, `birthday`, `gender`) VALUES
(6, 'duy', '', 'Nguyễn Ngọc Duy', '0987654321', 'Duy@gmail.com', '2024-11-05', 'Nữ'),
(15, 'User1', '', 'Nguyễn Văn A', '0987654321', 'A@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `User_admin_id` int NOT NULL,
  `Username_admin` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Password_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`User_admin_id`, `Username_admin`, `Password_id`) VALUES
(2, 'admin', '123456'),
(20, 'admin2', '$2y$10$QY.BogggdZOP.EjhQrmimuO/KX2AFQQwSlY7A9swpiLZdBg64/QGe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user` (`user_id`),
  ADD KEY `cart_product` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Parent_id` (`Parent_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `id` (`product_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `countdown`
--
ALTER TABLE `countdown`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`Deliverer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`Order_detail_id`),
  ADD KEY `Product_id` (`Product_id`),
  ADD KEY `Order_id` (`Order_id`);

--
-- Indexes for table `order_pro`
--
ALTER TABLE `order_pro`
  ADD PRIMARY KEY (`Order_id`),
  ADD KEY `Customer_id` (`user_id`),
  ADD KEY `Deliverer` (`Deliverer`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentcate`
--
ALTER TABLE `parentcate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Id_cat` (`Id_cat`),
  ADD KEY `parent_cate` (`parent_cate`);

--
-- Indexes for table `role_slide`
--
ALTER TABLE `role_slide`
  ADD PRIMARY KEY (`role_slide_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_slide_id` (`role_slide_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`User_admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `countdown`
--
ALTER TABLE `countdown`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `Deliverer_id` int NOT NULL AUTO_INCREMENT COMMENT 'id nhan vien giao hang';

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `Order_detail_id` int NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết hóa đơn', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `Order_id` int NOT NULL AUTO_INCREMENT COMMENT 'id hóa đơn', AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parentcate`
--
ALTER TABLE `parentcate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm', AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `role_slide`
--
ALTER TABLE `role_slide`
  MODIFY `role_slide_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `useradmin`
--
ALTER TABLE `useradmin`
  MODIFY `User_admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`Parent_id`) REFERENCES `parentcate` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `Fk-customer` FOREIGN KEY (`Customer_id`) REFERENCES `order_pro` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD CONSTRAINT `Fk-deliverer` FOREIGN KEY (`Deliverer_id`) REFERENCES `order_pro` (`Deliverer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_pro-order_detail` FOREIGN KEY (`Order_id`) REFERENCES `order_pro` (`Order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_pro`
--
ALTER TABLE `order_pro`
  ADD CONSTRAINT `Fk-detail` FOREIGN KEY (`user_id`) REFERENCES `user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Fk-cat_id` FOREIGN KEY (`Id_cat`) REFERENCES `category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
