-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2022 at 11:01 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `31`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `object` varchar(50) NOT NULL,
  `object_name` varchar(250) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `admin_id`, `activity`, `object`, `object_name`, `time`) VALUES
(1, 1, 'thêm', 'sản phẩm', 'Cây lau nhà', '2022-02-17 03:15:13'),
(2, 1, 'cập nhật', 'đơn hàng', 'số 3', '2022-02-17 03:15:13'),
(3, 2, 'thêm', 'nhà cung cấp', 'sản sản', '2022-02-17 03:27:51'),
(4, 2, 'xóa', 'nhà cung cấp', '', '2022-02-17 03:37:44'),
(5, 2, 'thêm', 'nhà cung cấp', 'cascsacacasccacascas', '2022-02-17 03:40:32'),
(6, 2, 'xóa', 'nhà cung cấp', 'cascsacacasccacascas', '2022-02-17 03:40:39'),
(7, 2, 'cập nhật', 'nhà cung cấp', 'số 3', '2022-02-17 03:43:45'),
(8, 2, 'thêm', 'sản phẩm', 'Sản phẩm mới nhất', '2022-02-17 03:47:39'),
(9, 2, 'thêm', 'sản phẩm', 'Cây chổi new', '2022-02-17 03:49:57'),
(10, 2, 'thêm', 'thẻ', 'thẻ mới', '2022-02-17 03:49:57'),
(11, 2, 'thêm', 'thẻ', 'thẻ oke', '2022-02-17 03:49:57'),
(12, 2, 'cập nhật', 'nhà cung cấp', 'Fisslerrrr', '2022-02-17 04:04:01'),
(13, 2, 'cập nhật', 'sản phẩm', 'Cây lau nh5555555 ', '2022-02-17 04:04:34'),
(14, 2, 'xóa', 'sản phẩm', 'Cây chổi new', '2022-02-17 04:05:44'),
(15, 2, 'duyệt', 'đơn hàng', 'số 10', '2022-02-17 04:08:46'),
(16, 2, 'hoàn thành', 'đơn hàng', 'số 10', '2022-02-17 04:08:52'),
(17, 2, 'hủy', 'đơn hàng', 'số 12', '2022-02-17 04:08:58'),
(18, 2, 'xóa', 'thẻ', 'khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 04:16:30'),
(19, 2, 'xóa', 'thẻ', '', '2022-02-17 04:19:07'),
(20, 2, 'xóa', 'thẻ', 'thẻ mới', '2022-02-17 04:19:19'),
(21, 2, 'xóa', 'sản phẩm', 'Cây chổi new', '2022-02-17 04:19:22'),
(22, 2, 'xóa', 'thẻ', 'khỏi sản phẩm Cây chổi new', '2022-02-17 04:19:25'),
(23, 2, 'xóa', 'sản phẩm', 'Cây chổi new', '2022-02-17 04:20:33'),
(24, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:21:17'),
(25, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:21:23'),
(26, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:21:23'),
(27, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:21:23'),
(28, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:21:23'),
(29, 2, 'xóa', 'sản phẩm', 'san pham moi', '2022-02-17 04:30:25'),
(30, 2, 'xóa', 'thẻ', 'khỏi sản phẩm san pham moi', '2022-02-17 04:34:01'),
(31, 2, 'xóa', 'thẻ', '', '2022-02-17 04:40:15'),
(32, 2, 'xóa', 'thẻ', 'cacsac', '2022-02-17 04:42:01'),
(33, 2, 'xóa', 'thẻ', 'cacsac khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 04:42:06'),
(34, 2, 'xóa', 'thẻ', '', '2022-02-17 04:42:15'),
(35, 2, 'xóa', 'thẻ', 'cs khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 04:43:46'),
(36, 2, 'xóa', 'thẻ', '', '2022-02-17 04:43:50'),
(37, 2, 'xóa', 'thẻ', '', '2022-02-17 04:47:30'),
(38, 2, 'xóa', 'thẻ', 'sc khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 04:48:11'),
(39, 2, 'xóa', 'thẻ', 'sc', '2022-02-17 04:48:19'),
(40, 2, 'đổi tên', 'thẻ', ' thành Vật dụng WCC', '2022-02-17 04:58:28'),
(41, 2, 'đổi tên', 'thẻ', ' thành Vật dụng WC', '2022-02-17 04:58:48'),
(42, 2, 'đổi tên', 'thẻ', 'Vật dụng WC thành Vật dụng WCCCCC', '2022-02-17 04:59:36'),
(43, 2, 'đổi tên', 'thẻ', 'Vật dụng WCCCCC thành Vật dụng WC', '2022-02-17 04:59:41'),
(44, 2, 'xóa', 'thẻ', 'ác', '2022-02-17 05:05:36'),
(45, 2, 'xóa', 'thẻ', 'ác khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 05:05:39'),
(46, 2, 'xóa', 'thẻ', 'ác', '2022-02-17 05:05:45'),
(47, 2, 'xóa', 'thẻ', 'sacasc khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 05:12:02'),
(48, 2, 'xóa', 'thẻ', 'sacasc', '2022-02-17 05:12:05'),
(49, 2, 'xóa', 'thẻ', 'sac khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 05:12:08'),
(50, 2, 'xóa', 'thẻ', 'sac', '2022-02-17 05:12:10'),
(51, 2, 'xóa', 'thẻ', 'csa', '2022-02-17 05:12:51'),
(52, 2, 'xóa', 'thẻ', 'sa', '2022-02-17 05:12:51'),
(53, 2, 'xóa', 'thẻ', 'asc', '2022-02-17 05:12:52'),
(54, 2, 'xóa', 'thẻ', 'cnasjkcnajcc', '2022-02-17 05:12:53'),
(55, 2, 'xóa', 'thẻ', 'csa', '2022-02-17 05:14:14'),
(56, 2, 'xóa', 'thẻ', 'as', '2022-02-17 05:14:14'),
(57, 2, 'thêm', 'thẻ', 'sac', '2022-02-17 05:16:16'),
(58, 2, 'thêm', 'thẻ', 'sac vào Cây lau nh5555555 ', '2022-02-17 05:16:16'),
(59, 2, 'thêm', 'thẻ', 'sa vào Cây lau nh5555555 ', '2022-02-17 05:16:16'),
(60, 2, 'thêm', 'thẻ', 'ca vào Cây lau nh5555555 ', '2022-02-17 05:16:16'),
(61, 2, 'thêm', 'thẻ', 'Nhà bếp vào Nồi cơm điện Sunhouse 1.8L SHD8602', '2022-02-17 05:25:01'),
(62, 2, 'xóa', 'thẻ', 'Nhà bếp khỏi sản phẩm Cây lau nh5555555 ', '2022-02-17 05:28:41'),
(63, 2, 'thêm', 'thẻ', 'Nhà bếp vào Cây lau nh5555555 ', '2022-02-17 05:30:28'),
(64, 2, 'xóa', 'thẻ', 'Nhà bếp khỏi sản phẩm Cây lau nhà COTONG 90CM SIÊU SẠCH BODOCA', '2022-02-17 05:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` mediumtext NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'qwer1234', 0),
(2, 'superadmin', 'superadmin@gmail.com', 'qwer1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `token`) VALUES
(1, 'Hydra', 'male', '2021-12-15', 'longthanh@gmail.com', 'Long1234', ''),
(2, 'hydra', 'male', '2000-09-02', 'longthanh1@gmail.com', 'Long1234', ''),
(3, 'My Mi', 'male', '2021-11-29', 'abc@abc.abc', 'Abcd1234', 'user_61cbc3291fd306.214497391640743721'),
(4, 'My My', 'male', '2022-01-19', 'admin123@gmail.com', 'Admin123', 'user_61d014557d9238.626900311641026645'),
(5, 'Ma Ma', 'male', '2018-06-08', 'njknjkn@gmail.com', '$Gl123456789', ''),
(10, 'Tài Khoản Mới', 'male', '2022-01-31', 'taikhoanmoi@gmail.com', '$Glnjkjnjk@', ''),
(11, 'Hydra', 'male', '2022-02-10', 'longthanh22@gmail.com', 'Long1234!', '');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `phone`, `image`) VALUES
(3, 'Fissler', 'Đức', '0984654789', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/49/Fissler_Logo.svg/2560px-Fissler_Logo.svg.png'),
(4, 'Silit', 'Đức', '0987654321', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Silit-logo.svg/2560px-Silit-logo.svg.png'),
(6, 'Minh Châu', 'Việt Nam', '0147258369', 'https://suminhchau.vn/wp-content/uploads/2019/11/su-minh-chau-fav-400x400.png'),
(7, 'Bodoca', 'Việt Nam', '0369258147', 'https://thietbimiennam.com/wp-content/uploads/2016/10/logo-bodoca.png'),
(8, 'Điện máy xanh', 'Việt Nam', '095184762', 'https://prices.vn/photos/7/store/ma-giam-gia-dienmayxanh.png'),
(9, 'SunHouse', 'Việt Nam', '0159236478', 'https://upload.wikimedia.org/wikipedia/vi/e/ed/Logo_cong_ty_sunhouse.png'),
(10, 'csacsacsac', 'sacsa', '0132456789894', 'asc'),
(11, 'cascasc', 'cascsa', 'csacsa', 'csa'),
(12, 'test', 'cas56c1as6c51sa6c5a1s', '0984564987', 'https://upload.wikimedia.org/wikipedia/commons/4/43/Latin_letter_A_with_acute.svg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `manufacturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `manufacturer_id`) VALUES
(2, 'Cây lau nhà DMX CL005515', 'Cây lau nhà có thân bằng inox cứng cáp, chiều dài 128 cm dễ sử dụng.\r\nTay cầm bọc nhựa chống trơn trượt, thân cây có khóa chắc chắn, có móc treo cất giữ.\r\nBông lau nhà bằng sợi cotton bền chắc, thấm hút tốt, giặt rửa dễ dàng.\r\nThương hiệu DMX - độc quyền Điện máy XANH, sản xuất tại Việt Nam.', 40000, 'images/1639849341.jpg', 8),
(4, 'Nồi từ FISSLER PROOO COLLECTION HIGH STOCK POT 28CM 14L', 'Nhập khẩu nguyên chiếc CHLB Đức - Made in Germany\r\nNồi từ Fissler làm từ vật liệu thép không gỉ chất lượng cao 18/10 dày, đặc, truyền nhiệt hiệu quả\r\nĐáy nồi Cookstar Allstove, nấu được trên mọi loại bếp, kể cả bếp từ, hạn chế cháy cục bộ, không cong vênh, lồi lõm\r\nLõi nhôm dày hoa lỏng ở 600ºC trước khi dập các lớp với nhau bởi một lực 1500 tấn\r\nĐường kính nồi 28cm\r\nTổng dung tích 14L\r\nTrọng lượng nồi 4.97Kg\r\nChiều cao nồi 24cm\r\nThước đo mực nước đến 12.5L\r\nVung inox thiết kế lõm lòng chảo giúp đối lưu hơi nước, chịu được 220ºC\r\nTay cầm cách nhiệt, thiết kế thẩm mỹ dạng đũa, cầm nắm thoải mái, chịu lực 150Kg\r\nMiệng rót chống tràn hiệu quả, cực khít với vung\r\nHiệu quả đun nấu nhanh, bảo toàn dinh dưỡng\r\nNồi nấu được trong lò nướng và vệ sinh an toàn với máy rửa bát.', 11500000, 'images/1639849625.jpg', 3),
(5, 'Bộ nồi chảo Silit Pisa 10 Món', 'Nắp vung kính cường lực bền đẹp thuận tiện quan sát đồ ăn\r\nPhù hợp với mọi loại: bếp từ, bếp hồng ngoại…\r\nTỏa nhiệt đều, giữ nhiệt lâu\r\nAn toàn cho sức khỏe\r\nĐáy 3 lớp bắt từ nhanh giúp tiết kiệm điện\r\nXuất xứ: Nhập khẩu từ Đức', 6540000, 'images/1639849720.1000x1000', 4),
(6, 'Cây lau nhà COTONG 90CM SIÊU SẠCH BODOCA', 'Xuất xứ: hàng Việt Nam\r\n\r\nBao gồm: cán, khung và giẻ\r\n\r\n– Chất liệu:\r\n\r\n+ Cán bằng inox, đầu kẹp inox\r\n\r\n+ Khung giẻ nhựa tối\r\n\r\n+ Giẻ bằng sợi Sợi Microfiber mềm, sợi cattong\r\n\r\n– Kích thước:\r\n\r\n+Cán: dài 1,5m\r\n\r\n+ Giẻ : (L)900mm x (H) 150 mm', 250000, 'images/1639849881.jpg', 7),
(7, 'Nồi cơm điện Sunhouse 1.8L SHD8602', 'Thân nồi làm bằng tôn phủ nhũ in hoa chống gỉ bền bỉ \r\nLòng nồi đúc từ hợp kim nhôm phủ lớp chống dính Whitford\r\nMâm nhiệt lớn cùng công suất 700W giúp nhiệt tỏa đều\r\nDung tích 1.8L, phù hợp với gia đình 4 – 6 thành viên\r\n2 chế độ Nấu (cook) và Hâm nóng (warm) dễ dàng sử dụng\r\nThiết kế nhỏ gọn, không chiếm nhiều diện tích', 399000, 'images/1639922713.jpg', 9),
(8, 'Nồi cơm điện KALITE KL-618 đa chức năng', '2 chức năng nấu và giữ ẩm\r\nChất liệu nắp và đáy nhựa ABS\r\nThân vỏ chất liệu hợp kim cao cấp\r\nChất liệu mâm nhiệt cong bền bỉ\r\nLòng niêu truyền nhiệt nhanh, giữ nhiệt đều\r\nĐai ủ trong 8h\r\nQuai sách thường, nắp phụ\r\nNút bấm cơ kiểu dáng mới\r\nDung tích 1.8L', 800000, 'images/1639990119.jpg', 9),
(9, 'Nồi cơm điện 1.8L E2RC1-320W', 'Lòng nồi bằng hợp kim nhôm tráng men chống dính, dễ vệ sinh\r\nXửng hấp đi kèm tiện dụng', 569000, 'images/1639990163.jpg', 8),
(10, 'Bơm Thông hút bồn cầu', 'Sản phẩm là 1 cái bơm\r\nDùng để Thông tắc bồn cầu\r\nKhi bồn cầu bị tắc bạn cần đổ 1 gói Thông cống vào để khoảng 1-2 tiếng xả nước rồi cho bơm vào bơm\r\nĐảm bảo hết tắc\r\nNếu vẫn tắc bạn cần đổ 2 chai CoCa cô la vào để qua đêm, rồi dùng bơm hút sẽ hết tắc', 80000, 'images/1639990223.jpg', 8),
(11, 'Máy hút bụi không túi FC9351/01', 'Máy hút bụi không túi Philips Dòng 3000 với kích cỡ nhỏ gọn, sử dụng công nghệ PowerCyclone 5 và đầu hút MultiClean cho hiệu suất hút cao giúp bạn vệ sinh sạch sẽ mọi ngóc ngách bên trong nhà', 3499000, 'images/1639990283.jpg', 8),
(12, 'Tủ 2 Cửa 1 Ngăn Kéo Modulo Home KAI1334-2', 'Tủ 2 Cửa 1 Ngăn Kéo Modulo Home KAI1334-2 được làm hoàn toàn bằng chất liệu gỗ công nghiệp cao cấp phủ giấy PU vân gỗ, không cong vênh, không co ngót, có độ bền cao và rất thân thiện với môi trường. Qua quá trình xử lý, bề mặt tủ có độ bóng đẹp và nhẵn mịn, các góc cạnh được gia công kỹ lưỡng để không gây trầy xước cho người dùng trong suốt quá trình sử dụng.\r\nTủ được thiết kế với 3 ngăn (trong đó có 01 ngăn kéo phía trên, 2 ngăn dưới kèm cửa đóng) tiện lợi để bạn có thể phân loại và sắp xếp đồ đạc phù hợp với nhiều mục đích sử dụng khác nhau. Bạn có thể sử dụng các ngăn tủ để cất giữ những bộ quần áo, lưu trữ sách, các loại băng đĩa hay đồ lưu niệm một cách gọn gàng và trang nhã. Mỗi ngăn kéo, cửa tủ đều có một tay cầm nhỏ gọn và chắc chắn, đóng mở rất chắc chắn và dễ dàng.\r\nTủ Modulo Home Kai - 1334-2 có màu nâu tự nhiên của gỗ mang đến vẻ đẹp sang trọng. Bạn có thể kết hợp tủ với bàn, ghế hay kệ cùng tông màu để không gian nội thất trong nhà thêm sang trọng, hiện đại.\r\nSản phẩm được giao hàng tháo rời, đóng gói trong thùng carton. Khách hàng lắp ráp sản phẩm tại nhà theo hướng dẫn lắp ráp kèm theo bao bì. Dịch vụ lắp ráp tại nhà có thu phí khu vực Tp. HCM, điện thoại 028 2223 7788', 1250000, 'images/1639990377.jpg', 7),
(13, 'Đèn ngủ LED di động TaoTronics TT-DL23, pin 4000mAh, 110 giờ sử dụng, ánh sáng 360 độ', 'Đèn ngủ di động cao cấp ánh sáng 360 độ.\r\nThiết kế không dây an toàn và di động: Đèn sử dụng bộ điều khiển tích hợp sẵn để có thêm tính di động ở nhà, trong văn phòng và ngay cả khi không có ổ cắm điện xung quanh, như cắm trại và dã ngoại ngoài trời.\r\nPin 110 giờ: Được hưởng lợi từ pin sạc có thể sạc lại với dung lượng lên tới 4000mAh sẽ vượt xa nhu cầu và mong đợi của bạn - lên tới 110 giờ với ánh sáng luôn ở độ sáng tối thiểu.\r\nÁnh sáng 360 ° thân thiện với mắt: Đừng lo lắng về việc đánh thức người đang ngủ bên cạnh bạn (bao gồm cả em bé của bạn) Với bảng điều khiển 360 ° cung cấp tia sáng đồng đều và tinh tế hơn.\r\nĐiều chỉnh độ sáng: Đặt ngón tay của bạn trên bảng điều khiển cảm ứng và tùy chỉnh độ sáng. Tận hưởng nhiều lựa chọn hơn mà không cần phải cài đặt trước.\r\nĐiều khiển một chạm: Dễ dàng bật / tắt đèn bằng cách nhấn một lần bảng điều khiển cảm ứng được đặt ở phía trên cùng của đèn.\r\nSản phẩm chính hãng thương hiệu TaoTronics (Mỹ) bảo hành 12 tháng toàn quốc.', 390000, 'images/1639991046.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_id`, `type_id`) VALUES
(2, 33),
(6, 33),
(2, 34),
(10, 34),
(4, 35),
(5, 35),
(7, 35),
(8, 35),
(9, 35),
(2, 36),
(6, 36),
(10, 36),
(11, 36),
(12, 37),
(13, 37);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiver_name` varchar(50) DEFAULT NULL,
  `receiver_phone` varchar(20) DEFAULT NULL,
  `receiver_address` varchar(200) DEFAULT NULL,
  `note` mediumtext,
  `status` int(11) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `customer_id`, `order_time`, `receiver_name`, `receiver_phone`, `receiver_address`, `note`, `status`, `total`) VALUES
(15, 2, '2022-01-11 14:02:19', NULL, NULL, NULL, NULL, 2, 2000),
(16, 2, '2022-01-04 14:02:19', NULL, NULL, NULL, NULL, 2, 900000),
(17, 3, '2022-01-05 14:02:19', NULL, NULL, NULL, NULL, 2, 500000),
(18, 4, '2022-01-10 14:02:19', NULL, NULL, NULL, NULL, 2, 330000),
(19, 1, '2022-01-11 15:28:03', NULL, NULL, NULL, '							', 7, 11580000),
(20, 1, '2022-01-11 15:28:24', NULL, NULL, NULL, '							', 7, 6540000),
(21, 1, '2022-01-30 08:25:46', NULL, NULL, NULL, NULL, 5, 18330000),
(22, 10, '2022-02-10 08:58:34', NULL, NULL, NULL, '								', 2, 11540000),
(23, 10, '2022-02-10 08:59:43', NULL, NULL, NULL, '								', 2, 6540000),
(24, 1, '2022-02-17 14:30:04', NULL, NULL, NULL, 'a				', 7, 6540000),
(25, 1, '2022-02-17 14:39:41', NULL, NULL, NULL, '								', 7, 11500000),
(26, 1, '2022-02-17 14:54:50', NULL, NULL, NULL, NULL, 1, 11500000);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `receipt_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`receipt_id`, `product_id`, `quantity`) VALUES
(19, 2, 2),
(19, 4, 1),
(20, 5, 1),
(21, 2, 1),
(21, 4, 1),
(21, 5, 1),
(21, 6, 1),
(22, 2, 3),
(22, 4, 6),
(23, 5, 1),
(24, 5, 1),
(25, 4, 1),
(26, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `customer_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`customer_id`, `id`, `name`, `phone`, `address`, `status`) VALUES
(1, 1, 'Mi Miaaa', '0951847632', 'Le Loi', 1),
(1, 2, 'Mi Mi1', '0951847632', 'Le Loi', 0),
(3, 1, '1', '1', '1', 0),
(3, 2, '2', '2', '2', 0),
(4, 1, 'Bui Huu Loc', '0987614523', 'Le Loi', 0),
(4, 2, 'Nguyen Nguyen', '0369258147', 'Nguyen Trai', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(33, 'Cây lau nhà'),
(34, 'Dụng cụ WC'),
(35, 'Nồi'),
(37, 'Trang trí'),
(36, 'Vệ sinh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manufacturer_id` (`manufacturer_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_id`,`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD PRIMARY KEY (`receipt_id`,`product_id`),
  ADD KEY `receipt_detail_ibfk_1` (`product_id`);

--
-- Indexes for table `receivers`
--
ALTER TABLE `receivers`
  ADD PRIMARY KEY (`customer_id`,`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`);

--
-- Constraints for table `product_type`
--
ALTER TABLE `product_type`
  ADD CONSTRAINT `product_type_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `product_type_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `receipts`
--
ALTER TABLE `receipts`
  ADD CONSTRAINT `receipts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `receipt_detail`
--
ALTER TABLE `receipt_detail`
  ADD CONSTRAINT `receipt_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `receipt_detail_ibfk_2` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`);

--
-- Constraints for table `receivers`
--
ALTER TABLE `receivers`
  ADD CONSTRAINT `receivers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
