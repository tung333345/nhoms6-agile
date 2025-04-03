-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2024 at 05:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
(20, 'Iphone', 3),
(21, 'Samsung', 3),
(22, 'Xiaomi', 3),
(23, 'Oppo', 3),
(24, 'ZTE', 3),
(25, 'Vivo', 3),
(26, 'Realme', 3),
(28, 'Asus', 3),
(29, 'Nokia', 3),
(30, 'Asus', 4),
(31, 'Macbook', 4),
(32, 'MSI', 4),
(33, 'Lenovo', 4),
(34, 'Huawei', 4),
(35, 'Dell', 4),
(36, 'Laptop AI', 4),
(37, 'Acer', 4),
(38, 'HP', 4),
(39, 'Ipad', 5),
(40, 'TCL', 5),
(41, 'Xiaomi', 5),
(42, 'Lenovo', 5),
(43, 'Samsung', 5),
(44, 'Tai nghe Bluetooth', 6),
(45, 'Tai nghe có dây', 6),
(46, 'Tai nghe Gaming', 6),
(47, 'Tai nghe chụp tai', 6),
(48, 'Loa Bluetooth', 6),
(49, 'Loa Karaoke', 6),
(50, 'Loa Soundbar', 6),
(51, 'Apple Watch', 7),
(52, 'Samsung', 7),
(53, 'Huawei', 7),
(54, 'Garmin', 7),
(55, 'Xiaomi', 7),
(56, 'Amazfit ', 7),
(57, 'Coros', 7),
(58, 'Kieslect', 7),
(59, 'Nồi chiên không dầu', 8),
(60, 'Máy hút bụi', 8),
(61, 'Nồi cơm điện', 8),
(62, 'Máy lọc không khí', 8),
(63, 'Lò vi sóng', 8),
(64, 'Máy say sinh tố', 8),
(65, 'Tecno', 3),
(67, 'aaaa', 3);

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
(92, 188, 21, 31990000, 1);

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
(188, 6, NULL, '2024-11-28 23:28:15', 31990000, '07,  202, Xã Đại Tự, Huyện Yên Lạc, Tỉnh Vĩnh Phúc', '', 1);

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
(3, 'Điện Thoại'),
(4, 'Máy Tính'),
(5, 'Máy Tính Bảng'),
(6, 'Âm Thanh'),
(7, 'Đồng Hồ Thông Minh'),
(8, 'Đồ Gia Dụng'),
(9, 'Phụ kiện'),
(10, 'Tivi'),
(11, 'Hàng Cũ');

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
(19, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', 'Thiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ', 34990000, 2, 3, '159,9 x 76,7 x 8,25 mm', '221 g', 'Titan Tự Nhiên', 'iphone-15-pro-max_3 (1).webp', '8 GB', 'IOS 18', 'Apple A17 Pro 6 nhân', 'Camera chính: 48MP, 24 mm, ƒ/1.78 Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2 Camera Tele: 12 MP', '12MP, ƒ/1.9', '4422 mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 29390000, '2024-07-01 00:00:00', '2024-07-31 00:00:00', 'không', 20, 'Máy mới 100% , chính hãng Apple Việt Nam. CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam', '6.67', 16, 211),
(20, 'Samsung Galaxy S24 Ultra 12GB 256GB', 'Samsung Galaxy S24 Ultra 12GB 256GB', 'Máy mới 100% , chính hãng Apple Việt Nam.', 33990000, 2, 3, '', '2', 'Xám', 'ss-s24-ultra-xam-222.webp', '', '', '', '', '', '', '', '', 29390000, NULL, NULL, '', 21, 'Trải nghiệm đỉnh cao với hiệu năng mạnh mẽ từ vi xử lý tân tiến, kết hợp cùng RAM 12GB cho khả năng đa nhiệm mượt mà.', '', 14, 157),
(21, 'IPhone 15 Pro 256GB | Chính hãng VN/A', 'IPhone 15 Pro 256GB | Chính hãng VN/A', 'Máy mới 100% , chính hãng Apple Việt Nam. CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam', 31990000, 10, 3, '', '', '', 'iphone-15-pro-256gb.webp', '', '', '', '', '', '', '', '', 27990000, NULL, NULL, 'không', 20, 'Thiết kế khung viền từ titan chuẩn hàng không vũ trụ - Cực nhẹ', '6.1 inches', 15, 212),
(23, 'Samsung Galaxy Z Flip6', 'Samsung Galaxy Z Flip6', 'Samsung Z Flip 6 là chiếc điện thoại gập vỏ sò chạy chip Snapdragon 8 Gen 3 for Galaxy mạnh mẽ bậc nhất hiện nay. ', 28990000, 100, 3, 'Kích thước: 165.1 x 71.9 x 6.9 mm Kích thước gập: 85.1 x 71.9 x 14.9 mm', '187 g', 'Xanh', 'samsung-galaxy-z-flip-6-xanh-duong-6_2.webp', '12 GB', 'Android 14', 'Snapdragon 8 Gen 3 for Galaxy Tăng lên 42% AI', 'Camera chính: 48MP, 24 mm, ƒ/1.78 Camera góc siêu rộng: 12 MP, 13 mm, ƒ/2.2 Camera Tele: 12 MP', 'Camera góc chụp rộng: 50.0 MP, f/1.8, thu phóng quang học 2x Góc chụp siêu rộng: 12.0 MP, f/2.2', '4000mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 28990000, '2024-08-10 00:00:00', '2024-07-08 00:00:00', 'không', 21, 'Chip Snapdragon 8 Gen 2 8 nhân mang đến hiệu năng mạnh mẽ, cho phép bạn xử lý các tác vụ hàng ngày một cách mượt mà. ', '6.7 inches', 1, 43),
(24, 'Samsung Galaxy Z Fold6', 'Samsung Galaxy Z Fold6', 'Samsung Z Fold 6 là siêu phẩm điện thoại gập được ra mắt ngày 10/7,', 43990000, 100, 3, ' Kích thước: 153.5 x 132.6 x 5.6 mm Kích thước gập: 153.5 x 68.1 x 12.1 mm', '239 g', 'Xanh Dương', 'samsung-galaxy-z-fold-6-xanh_5_.webp', '12 GB', 'Android 14', 'Snapdragon 8 Gen 3 for Galaxy Tăng lên 42% AI', 'Camera bên ngoài:10 MP, f/2.2 Camera bên trong: 4 MP, F1.8', 'Camera góc rộng: 50.0 MP, f/1.8, Thu phóng quang học 2x Camera chụp góc siêu rộng: 12.0 MP, f/2.2 Camera ống kính tele: 10.0 MP, f/2.4, Thu phóng Quang học 3x', '4400 mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 43990000, '2024-07-02 00:00:00', '2024-08-10 00:00:00', 'không', 21, 'Chip Snapdragon 8 Gen 2 8 nhân mang đến hiệu năng mạnh mẽ', '7.6 inches', 1, 42),
(25, 'iPhone 15 128GB | Chính hãng VN/A', 'iPhone 15 128GB | Chính hãng VN/A', 'iPhone 15 128GB | Chính hãng VN/A', 22990000, 200, 3, '6.1 inches', '6.1 inches', 'Hồng', 'iphone-15-plus_1__1.webp', '6 GB', 'IOS 18', 'Apple A16 Bionic 6 nhân', 'Chính 48 MP & Phụ 12 MP', 'Apple A16 Bionic 6 nhân', '3349 mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 19990000, '2024-07-01 00:00:00', '2024-09-27 00:00:00', 'không', 20, 'iPhone 15 128GB được trang bị màn hình Dynamic Island kích thước 6.1 inch với công nghệ hiển thị Super Retina XDR', '6.1 inches', 18, 52),
(26, 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 'Apple MacBook Air M1 256GB 2020 I Chính hãng Apple Việt Nam', 'Hiệu năng vượt trội - Cân mọi tác vụ từ word, exel đến chỉnh sửa ảnh trên các phần mềm như AI, PTS', 22990000, 100, 4, ' 1.61 cm x 30.41 cm x 21.24 cm', '1.29 kg', '', 'air_m2.webp', '8GB', '', '8 nhân với 4 nhân hiệu năng cao và 4 nhân tiết kiệm điện', '8mp', 'Không', '49.9-watt lithium-polymer, củ sạc công suất 30W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 18790000, '2024-07-01 00:00:00', '2024-09-07 00:00:00', 'không', 31, 'Macbook Air M1 2020 - Sang trọng, tinh tế, hiệu năng khủng', '13.3 inches', 17, 63),
(27, 'MacBook Air M3 13 inch 2024 8GB - 256GB | Chính hãng Apple Việt Nam', 'MacBook Air M3 13 inch 2024 8GB - 256GB | Chính hãng Apple Việt Nam', 'Sức mạnh xử lý hàng đầu trên chip Apple M3 - Cân tốt mọi tác vụ từ đồ hoạ đến lập trình Màn hình Liquid Retina 13,6 inch - Màu sắc hiển thị rực rỡ, sắc nét Camera FaceTime HD 1080p - Đàm thoại, hội họp mọi lúc mọi nơi Hỗ trợ sạc 30W - Nhanh chóng nạp đầy pin khi bạn cần', 27990000, 120, 4, '304.1 x 215.4 x 11.3 mm (13.6 inch) và 350.5 x 240.1 x 11.3 mm (15.3 inch)', '	1.24 kg', 'Đen', 'apple_m3_slot.webp', '8GB', 'MacOS', 'Chip Apple M3  CPU 8 lõi với 4 lõi hiệu năng và 4 lõi tiết kiệm điện GPU 8 lõi', 'Camera FaceTime HD 1080p  Bộ xử lý tín hiệu hình ảnh tiên tiến với video điện toán', 'Không', 'Bộ Tiếp Hợp Nguồn USB-C 30W (M2 và M3 với GPU 8 lõi) hoặc', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 27290000, NULL, NULL, 'không', 31, 'Apple Macbook Air 13 M3 với con chip Apple M3 mạnh mẽ cùng công nghệ dò tia tốc độ cao mang lại trải nghiệm dùng mượt mà.', 'Màn hình có đèn nền LED 13,6 inch (theo đường chéo) với công nghệ IPS;1 độ phân giải gốc 2560x1664 với mật độ 224 pixel mỗi inch Độ sáng 500 nit', 3, 34),
(28, 'TECNO SPARK Go 2024 4GB 64GB', 'TECNO SPARK Go 2024 4GB 64GB', 'Hiệu năng ổn định, đáp ứng tốt nhu cầu cơ bản với Unisoc T606. Camera chính 13MP chụp ảnh sắc nét, màu sắc chân thực. Pin trâu 5.000 mAh - Sử dụng cả ngày dài mà không lo hết pin. Thiết kế vuông vức sang trọng, trẻ trung, phù hợp mọi đối tượng.', 2190000, 200, 3, '163.69x75.6x8.55mm', '186g', 'Trắng', 'tecno-spark-go-2024._3_.webp', '64 GB', ' Android 13', 'Unisoc T606', '8MP, f/2.0', '13MP, f/1.8 + AI-CAM', '', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 1950000, NULL, NULL, 'không ', 65, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '6.6 inches', 11, 1),
(29, 'OPPO Find X5 Pro 12GB 256GB - Giá mới chỉ có tại CellphoneS', 'OPPO Find X5 Pro 12GB 256GB - Giá mới chỉ có tại CellphoneS', 'Chip Snapdragon 8 Gen 1 cho hiệu suất mạnh mẽ, cân mọi tác vụ từ giải trí đến làm việc Màn hình AMOLED 120 Hz mang đến cho bạn trải nghiệm mượt mà, màu sắc sống động Dùng thoải mái cả ngày với dung lượng pin 5.000 mAh, tích hợp sạc nhanh 80W hiện đại RAM 12GB đảm bảo khả năng xử lý đa nhiệm không giật lag, ROM 256GB giúp lưu trữ tốt', 19990000, 300, 3, '163.7 x 73.9 x 8.5 mm', '218 g', 'Trắng', 'finx5.webp', '12 GB - 256 GB', 'Android 14', 'Qualcomm Snapdragon 8 Gen 1', 'Camera chính 32MP: f/2.4; FOV 90°, ống kính: 5P, lấy nét cố định', 'Camera chính: 50MP, f/1.7 Camera góc rộng: 50MP, f/2.2; FOV 112° Camera tele: 13MP, f/2.4', '5.000 mAh - Sạc siêu nhanh 80W Sạc không dây', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 15990000, NULL, NULL, 'không', 23, ' Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '6.7 inches', 20, 9),
(30, 'iPhone 15 Plus 128GB | Chính hãng VN/A', 'iPhone 15 Plus 128GB | Chính hãng VN/A', 'Thiết kế dẫn đầu xu hướng - Nhiều màu sắc trendy cùng chất liệu kính pha màu và khung nhôm vô cùng bền bỉ Nắm bắt và tương tác mọi thông tin dễ dàng hơn với Dynamic Island mở rộng Chụp ảnh chân dung xuất sắc mọi khoảnh khắc - Camera chính 48MP với tele 2X và chế độ chỉnh sửa đa dạng Hiệu năng cân mọi tác vụ - A16 Bionic mạnh mẽ cho mọi thao tác mượt mà và nhanh chóng', 25990000, 1000, 3, ' 160,9 x 77,8 x 7,80 mm', '201 g', 'Hồng', 'iphone-15-plus_1_.webp', '6 GB', 'IOS 18', 'Apple A16 Bionic', '12MP, ƒ/1.9', 'Chính 48 MP & Phụ 12 MP', '4383 mAh - Sạc nhanh Sạc không dây MagSafe lên đến 15W Sạc không dây Qi lên đến 7,5W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 22690000, '2024-09-01 00:00:00', '2024-09-07 00:00:00', 'không', 20, 'Máy mới 100% , chính hãng Apple Việt Nam. CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam', '6.7 inches', 13, 2),
(31, 'Samsung Galaxy M55 (12GB 256GB)', 'Samsung Galaxy M55 (12GB 256GB)', 'ĐẶC ĐIỂM NỔI BẬT Trải nghiệm hình ảnh sống động và sắc nét với màn hình AMOLED 6.7 inch, độ phân giải Super AMOLED+. Ghi lại những bức ảnh tuyệt đẹp với camera chính 50MP, khẩu độ f/1.8, cùng nhiều tính năng chụp ảnh thông minh. Qualcomm Snapdragon 7 Gen 1 nhân kết hợp với RAM 8GB mang đến hiệu suất mạnh mẽ cho mọi tác vụ, từ chơi game đến chỉnh sửa video. Pin khủng 5000mAh - Sử dụng điện thoại cả ngày dài mà không lo hết pin nhờ viên pin.', 12690000, 1000, 3, '163.9 x 76.5 x 7.8 mm', '180 g', 'Xanh', 'dien-thoai-samsung-galaxy-m55.webp', '12 GB - 256GB', 'Android 14', 'Qualcomm Snapdragon 7 Gen 1 (4 nm)', 'Camera góc rộng: 50 MP, f/2.4', 'Camera góc rộng: 50 MP, f/1.8, 1/1.56\", 1.0µm, PDAF, OIS Camera góc siêu rộng: 8 MP, f/2.2, 123˚ Camera macro: 2 MP, f/2.4', '5000 mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 10750000, '2024-07-29 00:00:00', '2024-09-07 00:00:00', 'không', 21, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '6.7 inches', 15, 28),
(32, 'Samsung Galaxy A55 5G 8GB 128GB', 'Samsung Galaxy A55 5G 8GB 128GB', 'Chip Exynos 1480 4nm - Sử dụng mượt mà, linh hoạt với các tác vụ nặng nề mà không gặp trở ngại. Với camera góc rộng 12MP mang đến khả năng thu trọn mọi khung cảnh vào khung hình. Tần số quét 120Hz - Mỗi hành động trên màn hình đều trở nên mượt mà đáng kinh ngạc. Pin 5000 mAh kết hợp cùng sạc nhanh 25W - Sử dụng thoải mái trong mọi hoạt động hằng ngày.', 9990000, 10000, 3, '161.1 x 77.4 x 8.2 mm', '213g', 'Tím', 'sm-a556_galaxy_a55_awesome_lilac_ui.webp', '8 GB - 128GB', 'Android 14', 'Exynos 1480 4nm 2.4GHz', '32 MP', 'Camera chính: 50 MP OIS+HDR Camera góc rộng: 12MP Camera macro: 5MP', '5000 mAh', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 9690000, '2024-07-28 00:00:00', '2024-09-07 00:00:00', 'không', 21, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', ' 6.6 inches', 3, 113),
(33, 'iPad Pro M4 11 inch 5G 2TB  ', 'iPad Pro M4 11 inch 5G 2TB', 'Chip Apple M4. Hiệu năng như mơ, đồ họa thay đổi cuộc chơi và năng lực AI mạnh mẽ.', 62990000, 100, 5, '24.97 x 17.75 x 5.3 mm', '446gram', 'Đen', 'ipad pro 11 m4 den.webp', '16 GB', 'iPadOS 17', 'Apple M4', 'Camera góc rộng: 12MP, ƒ/1.8', 'Camera góc siêu rộng 12MP, ƒ/2.4', 'Sạc tối đa 20 W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 60990000, '2024-08-05 00:00:00', '2024-08-30 00:00:00', 'không', 39, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '11 inches', 3, 21),
(34, 'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C | Chính hãng Apple Việt Nam', 'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C | Chính hãng Apple Việt Nam', 'Tích hợp chip Apple H2 mang đến chất âm sống động cùng khả năng tái tạo âm thanh 3 chiều vượt trội Công nghệ Bluetooth 5.3 kết nối ổn định, mượt mà, tiêu thụ năng lượng thấp, giúp tiết kiệm pin đáng kể Chống ồn chủ động loại bỏ tiếng ồn hiệu quả gấp đôi thế hệ trước, giúp nâng cao trải nghiệm nghe nhạc Chống nước chuẩn IP54 trên tai nghe và hộp sạc, giúp bạn thỏa sức tập luyện không cần lo thấm mồ hôi', 6190000, 999, 6, 'Tai nghe: 30.9 x 21.8 x 24 mm Hộp sạc: 45.2 x 60.6 x 21.7mm', 'Tai nghe: 5.3g Hộp sạc: 50.8g', 'Trắng', 'apple-airpods-pro-2-usb-c_1_.webp', 'none', 'none', 'none', 'none', 'none', 'Tai nghe: Dùng 6 giờ Hộp sạc: Dùng 30 giờ', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 5690000, '2024-07-31 00:00:00', '2024-09-07 00:00:00', 'không', 44, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'Màn hình', 8, 4),
(35, ' Apple Watch Series 9 45mm (GPS) viền nhôm dây cao su | Chính hãng Apple Việt Nam', ' Apple Watch Series 9 45mm (GPS) viền nhôm dây cao su | Chính hãng Apple Việt Nam', 'Trang bị chip S9 SiP mạnh mẽ hỗ trợ xử lý mọi tác vụ nhanh chóng với nhiều tiện ích Dễ dàng kết nối, nghe gọi, trả lời tin nhắn ngay trên cổ tay Trang bị nhiều tính năng sức khỏe như: Đo nhịp tim, điện tâm đồ, đo chu kỳ kinh nguyệt,... Độ sáng tối đa lên tới 2000 nit, dễ xem màn hình ngay dưới ánh nắng gắt Tích hợp nhiều chế độ tập luyện với các môn thể thao như: Bơi lội, chạy bộ, đạp xe,...', 11290000, 999, 7, ' 45 x 38 x 10.7 mm', '38.7 gram', 'Trắng vàng', 'apple_lte_3__1.webp', 'none -  64GB', ' WatchOS', 'S9 SiP', 'none', 'none', 'Chế độ thông minh: 18 giờ Chế độ tiết kiệm pin: 36 giờ', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 10490000, '2024-08-01 00:00:00', '2024-09-07 00:00:00', 'không', 51, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '1.7 inch', 7, 2),
(36, 'Apple Watch Series 7 45mm (4G) Viền nhôm dây cao su | Chính hãng VN/A', 'Apple Watch Series 7 45mm (4G) Viền nhôm dây cao su | Chính hãng VN/A', 'Hỗ trợ Esim cho phép nghe gọi ngay trên đồng hồ Chức năng màn hình luôn bật giữ cho chức năng xem giờ luôn hoạt động,tiết kiệm pin hơn Thoải mái sử dụng ở hồ bơi hay ngoài trời với chuẩn kháng bụi IP6X ,chống nước đến 50m Đo nhịp tim,oxy trong máu,theo dõi giấc ngủ cùng nhiều tính năng sức khoẻ tích hợp sẵn Cổng sạc Type C,sạc nhanh 45 phút cho 80% pin Hỗ trợ Esim cho phép nghe gọi ngay trên đồng hồ', 15990000, 999, 7, '14 - 22 cm', '38.8 gram', 'Đen', 'apple_lte_6_.webp', 'none -32GB', 'WatchOS', 'None', 'None', 'Không', 'Chế độ thông minh: Khoảng 0.75 ngày Chế độ tiết kiệm pin: Khoảng 1.5 ngày', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 9990000, '2024-08-01 00:00:00', '2024-09-06 00:00:00', 'không', 51, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '1.77 inch  45mm', 38, 21),
(37, 'Máy rửa chén bát để bàn thông minh KOCHI DW-C400VN', 'Máy rửa chén bát để bàn thông minh KOCHI DW-C400VN', 'Có thể sử dụng bằng 2 cách: Đổ nước trực tiếp (chỉ 5 lít / lần sử dụng) hoặc lắp đặt. Đánh bay các vết bẩn từ mọi vị trí nhờ vào lực nước mạnh có thể phun 360 độ Diệt khuẩn và bảo quản lên đến 73 giờ với tính năng sấy khô ở nhiệt độ cao Trang bị 5 chương trình rửa thông minh giúp bạn tiết kiệm thời gian đáng kể Ngăn xếp chén dĩa thông minh với sức chứa tới 4 bộ chén đĩa, ly, thìa, đũa,...', 6490000, 999, 8, '42.8 x 42.5 x 45.9 cm', '5L', 'Trắng', 'may-rua-chen-bat-mini-de-ban-kochi-dw-c400vn-spa.webp', 'None', 'None', 'None', 'None', 'None', '950W', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 5190000, '2024-07-28 00:00:00', '2024-09-06 00:00:00', 'không', 59, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'LCD', 20, 2),
(38, 'Laptop ASUS Vivobook 16 M1605YA-MB303W', 'Laptop ASUS Vivobook 16 M1605YA-MB303W', 'Sở hữu màn hình kích thước 16 inch WUXGA cho hình ảnh rõ nét với màu sắc và gam màu phong phú CPU AMD Ryzen 7 7730U có thể xử lý đa nhiệm các chương trình đòi hỏi hiệu suất cao một cách hiệu quả Đồ họa AMD Radeon cải thiện đáng kể đầu ra hình ảnh và tăng cường hiệu suất tổng thể RAM 16 GB cùng ổ cứng 512 GB SSD rộng rãi, lưu trữ nhiều file, tài liệu Bàn phím Chiclet tích hợp cảm biến vân tay hỗ trợ bảo mật thông tin hiệu quả', 18490000, 999, 4, '35.87 x 24.95 x 1.99 ~ 1.99 cm (W x H x D)', '1.88 kg', 'Bạc', 'text_d_i_3_2.webp', '16GB DDR4', 'Windows 11', 'AMD Ryzen 7 7730U (2.0GHz, 8 lõi / 16 luồng, 16MB cache, up to 4.5 GHz max boost)', '720p HD với màn trập camera', 'None', '42WHrs, 3S1P, 3-cell Li-ion', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 13990000, '2024-07-30 00:00:00', '2024-09-07 00:00:00', 'có', 30, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '16.0 inch', 24, 2),
(39, 'Laptop Lenovo Ideapad Flex 5 14ALC7 82R900ECVN', 'Laptop Lenovo Ideapad Flex 5 14ALC7 82R900ECVN', 'Thiết kế thanh mãng, thời thượng với trọng lượng nhe chỉ 1.55 kg. Màn hình 14 inch cùng độ phân giải WUXGA, mang đến hình ảnh hiển thị mượt êm, rõ nét. CPU AMD Ryzen 7 5700U cho tốc độ phản hồi nhanh và xử lý đa nhiệm, tiết kiệm điện tối ưu, làm việc trơn tru. RAM 16GB đảm bảo cho người dùng làm việc một các mượt mà với các ứng dụng mà không bị xảy ra tình trạng giật lag. Ổ cứng SSD 512GB giúp quá trình khởi động máy hay sao chép dữ liệu trở nên nhanh chóng hơn.', 16990000, 999, 4, ' 313.1 x 224.9 x 17.8 mm (W x D x H)', '1.55 kg', 'xám', 'laptop-lenovo-ideapad-flex-5-14alc7-82r900ecvn.webp', '16GB-LPDDR4x-4266 Onboard', 'Windows 11', 'AMD Ryzen 7 5700U (8 lõi / 16 luồng, 1.8 / 4.3GHz, 4MB L2 / 8MB L3)', ' FHD 1080p với màn trập camera', 'Không', '52.5Wh', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 14990000, NULL, NULL, 'không', 33, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '14 inchs', 12, 12),
(40, 'Laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN', 'Laptop Lenovo Ideapad Slim 5 14IAH8 83BF002NVN', 'Sở hữu thiết kế tinh tế với lớp vỏ nhôm sáng bóng, sang trọng Màn hình 14 inch WUXGA cực sắc nét, hỗ trợ làm việc, giải trí dễ dàng CPU Intel Core i5-12450H mạnh mẽ, giải quyết nhanh mọi tác vụ học tập, văn phòng RAM 16GB cùng ổ cứng 512GB SSD đa nhiệm, mở máy, mở ứng dụng cực nhanh Độ sáng lên đến 300nits hỗ trợ làm việc ở nơi có ánh sáng yếu', 17290000, 999, 4, '312 x 221 x 17.9 mm (W x D x H)', '1.46 kg', 'Xám', 'text_ng_n_8__1_91.webp', '16GB - LPDDR5-4800 Onboard', 'Windows 11', 'Intel Core i5-12450H (8 lõi: (4P + 4E) / 12 luồng: P-core 2.0 / 4.4GHz, E-core 1.5 / 3.3GHz, 12MB)', 'FHD 1080p với màn trập camera', 'Không', '56.6Wh', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 15490000, '2024-07-30 00:00:00', '2024-08-30 00:00:00', 'không', 33, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '14 inchs WUXGA', 10, 8),
(41, 'iPad Gen 10 10.9 inch 2022 Wifi 64GB I Chính hãng Apple Việt Nam', 'iPad Gen 10 10.9 inch 2022 Wifi 64GB I Chính hãng Apple Việt Nam', 'Kiểu dáng mỏng nhẹ, phong cách hiện đại - Khung viền và mặt lưng kim loại, mỏng chỉ 7 mm Hiệu năng đỉnh xử lí mọi tác vụ - Apple A14 Bionic với tốc độ tối đa 3.1 GHz, RAM 4 GB Mang đến thế giới hình ảnh sắc nét, sống động - Màn hình Retina IPS LCD kích thước 10.9 inch Đồng hành cùng bạn trong thời gian dài - Pin lớn trên 7000 mAh, sạc nhanh tối ưu thời gian', 12990000, 998, 5, '248.6 x 179.5 x 7 mm', '477g', 'Bạc', 'ipad-10-9-inch-2022.webp', '4 GB ', 'iPadOS 16', 'Apple A14 Bionic 6 nhân', 'Camera góc siêu rộng: 12MP, 122°, ƒ/2.4', 'Camera góc rộng: 12MP, ƒ/1.8', '28.6 Wh (~ 7587 mAh)', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 9690000, '2024-08-05 00:00:00', '2024-08-22 00:00:00', 'không', 39, 'Máy mới 100% , chính hãng Apple Việt Nam. CellphoneS hiện là đại lý bán lẻ uỷ quyền iPhone chính hãng VN/A của Apple Việt Nam', '10.9 inchs', 25, 9),
(42, 'Xiaomi Pad 6 8GB 128GB - Chỉ có tại CellphoneS', 'Xiaomi Pad 6 8GB 128GB - Chỉ có tại CellphoneS', 'Thiết kế kim loại nguyên khối - Nhỏ gọn, sang trọng với hai gam màu hiện đại. Snapdragon 870 - Hiệu suất cao hàng đầu trong phân khúc. Dung lượng pin lớn 8840 mAh - Đáp ứng tốt được nhu cầu làm việc cả ngày dài. Thoải thích đắm chìm trong các bộ phim với màn hình hiển thị sắc nét độ phân giải 2,8K; mượt mà với tốc độ làm mới 144Hz. Tận hưởng âm thanh thực sự đắm chìm với Quad Speakers cùng ánh xạ kênh giúp điều chỉnh đầu ra âm thanh theo hướng màn hình của bạn.', 9490000, 111, 5, '253.95 x 165.18 x 6.51 mm', '490 g', 'Xanh Dương', 'mi-pad-6-cps-doc-quyen.png.webp', '8 GB', 'Android 13', 'Qualcomm Snapdragon 870 5G (7 nm)', ' 8 MP, f/2.2, 1/4\", 1.12µm', '13 MP, f/2.2, PDAF', '8840 mAh', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '', 8150000, '2024-07-29 00:00:00', '2024-09-05 00:00:00', 'không', 41, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '11 inches', 14, 2),
(43, 'Samsung Galaxy Tab S9 FE Plus WIFI 8GB 128GB', 'Samsung Galaxy Tab S9 FE Plus WIFI 8GB 128GB', 'Tần số quét 90 Hz giúp người dùng có những phút giây trải nghiệm hình ảnh sinh động và vô cùng chân thật. Có khả năng kháng nước, bụi đạt chuẩn IP68 giúp người dùng yên tâm sử dụng. Kết hợp với bút S - Pen siêu tiện lợi - Giúp người dùng tăng cường năng suất làm việc. Thiết kế cao cấp, sang trọng được hoàn thiện bằng chất liệu kim loại nguyên khối.', 13990000, 110, 5, '285.4 x 185.4 x 6.5 mm', '627 g', 'Trắng', 'samsung-galaxy-tab-s9-fe-plus-wifi_1_.webp', '8 GB', 'Android 13', 'Exynos 1380', '12 MP (góc siêu rộng)', '8 MP + 8 MP (góc siêu rộng)', '10,090 mAh', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 12990000, '2024-08-06 00:00:00', '2024-08-31 00:00:00', 'không', 43, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '12.4 inches  2560 x 1600 (WQXGA)', 7, 2),
(44, 'Máy Tính Bảng Lenovo Tab M11 8GB 128GB ZADB0162VN', 'Máy Tính Bảng Lenovo Tab M11 8GB 128GB ZADB0162VN', 'Màn hình IPS LCD, 11 inch, độ phân giải cao - Cho hình ảnh sắc nét và màu sắc chân thực, góc nhìn hình ảnh rộng. Đáp ứng tốt các nhu cầu đa nhiệm và giải trí với chipset MediaTek Helio G88 và GPU Mali-G52 MC2. Pin dung lượng lớn 7040 mAh cung cấp năng lượng đảm bảo sử dụng suốt cả ngày. Hệ thống âm thanh Dolby Atmos chất lượng cao, mang đến trải nghiệm đắm chìm vào các không gian giải trí tuyệt vời.', 6690000, 999, 5, '255.26 x 166.31 x 7.15 mm', '465 g', 'Xám', 'Máy Tính Bảng Lenovo Tab M8.webp', '8 GB', 'Android™ 13', 'MediaTek Helio G88', 'None', 'None', '7040 mAh', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 6490000, NULL, NULL, 'không', 42, '', '11 inches 1920 x 1200 pixels (WUXGA)', 3, 0),
(45, 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', 'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', 'Phản hồi nhanh hơn và tiết kiệm năng lượng nhờ vào con chip Apple H1 Thiết kế sang trọng, gọn nhẹ tạo cảm giác thoải mái khi đeo hàng giờ liền Tích hợp 2 micro khử tiếng ồn cho chất lượng âm thanh tốt khi đàm thoại Hỗ trợ công nghệ sạc nhanh, chỉ mất 15 phút là đã có ngay 3 giờ sử dụng', 3990000, 999, 6, 'Tai nghe: 16.5 x 18.0 x 40.5 mm Hộp sạc: 44.3 x 21.3 x 53.5 mm', 'Tai nghe: 4 gr Hộp sạc: 38.2 gr', 'Trắng', 'Tai nghe Bluetooth True Wireless JBL Wave Beam.webp', 'none', 'none', '', 'None', 'None', ' Tai nghe: Dùng 5 giờ Hộp sạc: Dùng 24 giờ', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 2690000, NULL, NULL, 'không', 44, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'None', 33, 7),
(46, 'Tai nghe Bluetooth Apple AirPods 3 MagSafe | Chính hãng Apple Việt Nam', 'Tai nghe Bluetooth Apple AirPods 3 MagSafe | Chính hãng Apple Việt Nam', 'Thời lượng pin siêu tốt, có thể hoạt động lên đến 30 giờ khi dùng kèm hộp sạc Chất lượng âm thanh đỉnh cao khi được xử lý bởi con chip Apple H1 độc quyền Hỗ trợ sạc không dây Magsafe giúp cho việc nạp đầy pin trở nên vô cùng tiện lợi Yên tâm khi luyện tập thể thao, đi mưa nhờ vào trang bị chuẩn kháng nước IPX4', 4790000, 111, 6, 'Tai nghe: 30.79 x 18.26 x 19.21 mm Hộp sạc: 46.40 mm x 54.40 mm x 21.38 mm', 'Tai nghe: 4.28 gram Hộp sạc: 37.91 gram', 'Trắng', 'Tai nghe Bluetooth True Wireless Redmi Buds 4 Lite.webp', 'none', 'none', 'None', 'None', 'None', ' Tai nghe: Dùng 6 giờ Hộp sạc: Dùng 30 giờ', '1 ĐỔI 1 trong 30 ngày nếu có lỗi phần cứng nhà sản xuất. Bảo hành 12 tháng tại trung tâm bảo hành chính hãng Apple: CareS.vn(xem chi tiết)', '5.3', 4390000, NULL, NULL, 'không', 44, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'none', 6, 1),
(47, 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 3', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 3', 'Chống ồn chủ động ANC cho bạn thoải sức đắm chìm trong không gian âm nhạc Âm thanh Hi-Fi 24 bit giúp trải nghiệm âm thanh chi tiết và sống động như thật Thời lượng pin dài lên đến 30 giờ khi tắt ANC, sẵn sàng nghe nhạc cả ngày dài Công nghệ Bluetooth 5.4 giúp kết nối nhanh và ổn định với các thiết bị của bạn', 3990000, 1111, 6, 'Tai nghe: 18.1 x 20.4 x 31.9mm Hộp sạc: 58.9 x 48.7 x 24.4mm', 'Tai nghe: 4.7g Hộp sạc: 46.5g', 'Xám', 'Tai nghe Bluetooth True Wireless Redmi Buds 4 Lite.webp', 'none', 'none', 'None', 'None', 'None', 'Tai nghe:6 giờ (Tắt ANC) / 5 giờ (Bật ANC) Hộp sạc: 30 giờ (Tắt ANC) / 24 giờ (Bật ANC)', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 3890000, NULL, NULL, 'không', 44, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'none', 1, 1),
(48, 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 'Tai nghe Bluetooth chụp tai Sony WH-1000XM5', 'Công nghệ Auto NC Optimizer tự động khử tiếng ồn dựa theo môi trường Trải nghiệm nghe chân thật, sống động nhờ tính năng 360 Reality Audio Thiết kế sang trọng, trọng lượng nhẹ với phần da mềm mại, ôm khít đầu Năng lượng cho cả ngày dài với thời lượng sử dụng pin lên đến 40 giờ', 7990000, 200, 6, '1.2m', '250 g', 'Bạc', 'Tai nghe Bluetooth chụp tai Sony WH-CH520.webp', 'none', 'none', 'None', 'None', 'Không', 'Tắt chống ồn ANC: Dùng 40 giờ Bật chống ồn ANC: Dùng 30 giờ', 'Bảo hành 24 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 6640000, NULL, NULL, 'không', 47, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'none', 17, 0),
(49, 'Đồng hồ thông minh Huawei Watch GT4 dây da', 'Đồng hồ thông minh Huawei Watch GT4 dây da', 'Đàm thoại dễ dàng với tính năng nghe gọi trên đồng hồ Lưu trữ nhạc trên đồng hồ và thưởng thức thông qua loa ngoài hoặc tai nghe bluetooth Thời lượng pin sử dụng đến 14 ngày cho bạn thỏa thích sử dụng Phát hiện sớm các nguy cơ về sức khoẻ với tính năng cảnh báo nhịp tim bất thường Theo dõi lượng calo tiêu thụ trong ngày thông qua ứng dụng Stay Fit Thiết kế dây vải sang trọng cùng vòng benzel chắc hắn sẽ giúp bạn trông nổi bật hơn', 6490000, 1111, 7, '120 - 190 cm', 'Khoảng 37 g', 'Nâu', 'Đồng hồ thông minh Huawei Watch GT 5 Dây Vải.webp', 'none', 'HarmonyOS', 'None', 'None', 'None', 'Chế độ tiết kiệm pin: 7 ngày Sử dụng pin thông thường lên đến 4 ngày Bật AOD: lên đến 2 ngày', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 4590000, NULL, NULL, 'không', 53, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '1.32 inchMàn hình AMOLED', 29, 0),
(51, 'Vòng đeo tay thông minh Xiaomi Mi Band 8', 'Vòng đeo tay thông minh Xiaomi Mi Band 8', 'Màn hình 1.62\'\' AMOLED cho chất lượng hiển thị sắc nét Thời lượng pin lên đến 16 ngày sử dụng - thoả sức tập luyện mà không lo hết pin Bảo vệ sức khoẻ hằng ngày với tính năng đo nhịp tim, SpO2, giấc ngủ, VO2 max Kháng nước chuẩn 5ATM, không ngại trời mưa hay nước bắn Nâng cao hiệu quả tập luyện với hơn 150 chế độ thể thao', 990000, 1111, 7, '13 - 21cm', '27g', 'Đen', 'Đồng hồ Samsung Galaxy Watch6 44mm.webp', 'none', 'Android 6.0 và iOS10', 'None', 'None', 'None', '16 ngày', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 690000, NULL, NULL, 'không', 55, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', '1.62 inch AMOLED', 30, 31),
(52, 'Đồng hồ thông minh trẻ em Myalo KidsPhone K84', 'Đồng hồ thông minh trẻ em Myalo KidsPhone K84', 'Thực hiện cuộc thông thường hay video call với sim 4G Nút liên lạc khẩn cấp tự động gửi vị trí cùng một bản ghi âm 30 giây tới các số được lưu sẵn Ghi lại lịch sử di chuyển với định vị GPS Thao tác thuận tiện với màng hình 1.3 inch Không ngại mưa rơi hay nước bắn với kháng nước chuẩn IP67', 2990000, 111, 7, 'None', 'none', 'Hồng', 'Apple Watch Series 9 41mm (4G) viền nhôm dây cao su.webp', 'none', 'none', 'None', 'None', 'None', 'none', 'Bảo hành 12 tháng tại trung tâm bảo hành Chính hãng. 1 đổi 1 trong 30 ngày nếu có lỗi phần cứng từ nhà sản xuất. (xem chi tiết)', '5.3', 2490000, NULL, NULL, 'không', 56, 'Không phí chuyển đổi khi trả góp 0% qua thẻ tín dụng kỳ hạn 3-6 tháng', 'none', 10, 0);

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
(5, 'iphone 15', 'anh01.webp', 1, 'iphone 15'),
(6, 'poco', 'anh02.webp', 1, 'poco'),
(7, 's24 ultra', 'anh05.webp', 1, 's24 ultra'),
(8, 'Asus Rog StriX', 'anh03.webp', 1, 'Asus Rog StriX'),
(9, 'Huawei Watch', 'anh04.webp', 1, 'Huawei Watch'),
(11, 'm55-right-banner-11-7-2024', 'm55-right-banner-11-7-2024.webp', 2, 'm55-right-banner-11-7-2024'),
(12, 'b2s-2024-right-banner-laptop', 'b2s-2024-right-banner-laptop.webp', 2, 'b2s-2024-right-banner-laptop'),
(13, 'right-banner-macbook-b2s-23-07-neww-new', 'right-banner-macbook-b2s-23-07-neww-new.webp', 2, 'right-banner-macbook-b2s-23-07-neww-new'),
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
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `username`, `password`, `name`, `phone_number`, `email`, `birthday`, `gender`) VALUES
(6, 'huy', '123', 'Trần Văn Huy', '0987654321', 'Huy@gmail.com', '2024-11-05', 'Nữ'),
(15, 'chung', '123456', 'Nguyễn Thành Chung', '0987654321', 'trangtntph51960@gmail.com', NULL, NULL),
(39, 'Chinhpd5', '1234567', 'Nguyễn Văn C', '0987654321', 'C@gmail.com', '2024-10-29', 'Nam');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `Order_detail_id` int NOT NULL AUTO_INCREMENT COMMENT 'id chi tiết hóa đơn', AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `Order_id` int NOT NULL AUTO_INCREMENT COMMENT 'id hóa đơn', AUTO_INCREMENT=189;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm', AUTO_INCREMENT=55;

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
