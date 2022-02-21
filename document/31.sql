-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2022 at 03:45 PM
-- Server version: 8.0.27
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
  `id` int NOT NULL,
  `admin_id` int NOT NULL,
  `activity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `object` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `object_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `admin_id`, `activity`, `object`, `object_name`, `time`) VALUES
(1, 2, 'thêm', 'nhà cung cấp', 'Toshiba', '2022-02-21 14:08:53'),
(2, 2, 'thêm', 'nhà cung cấp', 'Điện máy xanh', '2022-02-21 14:11:26'),
(3, 2, 'thêm', 'nhà cung cấp', 'Tefal', '2022-02-21 14:19:02'),
(4, 2, 'thêm', 'nhà cung cấp', 'Hafaco', '2022-02-21 14:22:57'),
(5, 2, 'thêm', 'sản phẩm', 'Cây lau nhà tự vắt thông minh HAMA', '2022-02-21 14:28:01'),
(6, 2, 'thêm', 'thẻ', '', '2022-02-21 14:28:01'),
(7, 2, 'thêm', 'sản phẩm', 'Cây lau nhà tự vắt thông minh HAMA', '2022-02-21 14:29:36'),
(8, 2, 'thêm', 'nhà cung cấp', 'SunHouse', '2022-02-21 14:32:49'),
(9, 2, 'đổi tên', 'thẻ', ' thành Cây lau nhà', '2022-02-21 14:35:23'),
(10, 2, 'thêm', 'sản phẩm', 'Cây Lau Nhà Xoay 360 Độ Sunhouse Ks-Mo350I', '2022-02-21 14:35:42'),
(11, 2, 'thêm', 'sản phẩm', 'Cây lau nhà DMX CL004', '2022-02-21 14:39:14'),
(12, 2, 'thêm', 'nhà cung cấp', 'Parroti', '2022-02-21 14:42:28'),
(13, 2, 'thêm', 'sản phẩm', 'Bộ Cây Lau Nhà Tự Vắt Thông Minh 2 Ngăn Parroti Pro PR01', '2022-02-21 14:44:41'),
(14, 2, 'thêm', 'sản phẩm', 'Parroti Bin BN01/BIN01', '2022-02-21 14:46:03'),
(15, 2, 'thêm', 'thẻ', 'Thùng rác', '2022-02-21 14:46:03'),
(16, 2, 'cập nhật', 'sản phẩm', 'Cọ Bồn Cầu Toilet, Cọ Vệ Sinh Cao Cấp - Parroti Silicon SL01', '2022-02-21 14:47:43'),
(17, 2, 'thêm', 'sản phẩm', 'Cọ Bồn Cầu Toilet, Cọ Vệ Sinh Cao Cấp - Parroti Silicon SL01', '2022-02-21 14:48:57'),
(18, 2, 'thêm', 'thẻ', 'Hút bồn cầu', '2022-02-21 14:48:57'),
(19, 2, 'thêm', 'sản phẩm', 'Găng tay cao su siêu dai rửa bát, bao tay cao su rửa chén, vệ sinh nhà cửa, an toàn, không mùi hôi Parroti Active AT01', '2022-02-21 14:50:14'),
(20, 2, 'thêm', 'thẻ', 'Găng tay', '2022-02-21 14:50:14'),
(21, 2, 'thêm', 'sản phẩm', 'Nồi Cơm Nắp Gài Toshiba RC-18JFM(H)VN (1.8L) - Hàng chính hãng', '2022-02-21 14:53:57'),
(22, 2, 'thêm', 'thẻ', '', '2022-02-21 14:53:57'),
(23, 2, 'thêm', 'sản phẩm', 'Bình đun siêu tốc Toshiba 1.7 lít KT-17SH2NV - HÀNG CHÍNH HÃNG', '2022-02-21 14:55:56'),
(24, 2, 'thêm', 'thẻ', 'Bình đun', '2022-02-21 14:55:56'),
(25, 2, 'thêm', 'sản phẩm', 'Bình đun siêu tốc Toshiba KT-15DS1NV - Hàng Chính Hãng', '2022-02-21 14:57:18'),
(26, 2, 'thêm', 'sản phẩm', 'Máy xay sinh tố và làm sữa hạt đa năng Tefal BL967B66- - 1300W - Lưỡi dao với công nghệ Powelix - Hàng chính hãng', '2022-02-21 14:58:46'),
(27, 2, 'thêm', 'thẻ', 'Máy xay', '2022-02-21 14:58:46'),
(28, 2, 'đổi tên', 'thẻ', ' thành Nồi cơm', '2022-02-21 14:59:51'),
(29, 2, 'cập nhật', 'sản phẩm', 'Bình đun siêu tốc Toshiba KT-15DS1NV - Hàng Chính Hãng', '2022-02-21 15:01:04'),
(30, 2, 'thêm', 'sản phẩm', 'Nồi chiên không dầu Tefal XL Ultra Fry EY111B15 - 4.2L - Hàng chính hãng', '2022-02-21 15:05:40'),
(31, 2, 'thêm', 'thẻ', 'Nồi chiên', '2022-02-21 15:05:40'),
(32, 2, 'cập nhật', 'sản phẩm', 'Nồi chiên không dầu Tefal XL Ultra Fry EY111B15 - 4.2L - Hàng chính hãng', '2022-02-21 15:05:55'),
(33, 2, 'thêm', 'sản phẩm', 'Bông lau nhà 15.7 cm DMX B-16', '2022-02-21 15:10:54'),
(34, 2, 'thêm', 'thẻ', 'Phụ kiện', '2022-02-21 15:10:54'),
(35, 2, 'thêm', 'sản phẩm', 'Khẩu Trang Y Tế Hafaco 4 lớp ( Hộp 50 cái)', '2022-02-21 15:13:35'),
(36, 2, 'thêm', 'thẻ', 'Khẩu trang', '2022-02-21 15:13:35'),
(37, 2, 'thêm', 'nhà cung cấp', 'Sennai', '2022-02-21 15:17:10'),
(38, 2, 'thêm', 'sản phẩm', 'Chổi Cọ Nhà Vệ Sinh Bồn Cầu Toilet Không Dây Đa Năng SENNAI Pin 4000mAh - Hàng Chính Hãng', '2022-02-21 15:17:46'),
(39, 2, 'thêm', 'sản phẩm', 'Thùng rác inox 15 lít đạp vuông thấp thùng rác nhà bếp', '2022-02-21 15:19:27'),
(40, 2, 'thêm', 'sản phẩm', 'Nồi Cơm Điện Tử Sharp KS-COM186EV-GL (1.8L) - Hàng chính hãng', '2022-02-21 15:24:44'),
(41, 2, 'duyệt', 'đơn hàng', 'số 32', '2022-02-21 15:30:09'),
(42, 2, 'duyệt', 'đơn hàng', 'số 33', '2022-02-21 15:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `dob`, `email`, `password`, `token`) VALUES
(15, 'Nguyễn Thành Long', 'male', '2000-02-21', 'nguyenthanhlong@gmail.com', 'Long1234', 'user_62139bad15e9e4.734555381645452205'),
(16, 'Bùi Hữu Lộc', 'male', '2003-05-10', 'huulok03@gmail.com', 'Huuloc123', 'user_6213b09d2c86e2.638907961645457565'),
(17, 'Nguyễn Văn Mạnh', 'male', '2022-02-01', 'nguyenvanmanh@gmail.com', 'NguyenVan123', 'user_6213b213360c24.159560881645457939'),
(18, 'Trần Châu Linh', 'female', '2022-02-01', 'chouchou@gmail.com', 'ChouChou582', 'user_6213b2466f0797.228307611645457990');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `phone`, `image`) VALUES
(15, 'Toshiba', 'Quận 1, TP Hồ Chí Minh', '0984159478', 'https://printgo.vn/uploads/file-logo/1/512x512.59f0fcf188437e6ffe6a15a44d891286.ai.1.png'),
(16, 'Điện máy xanh', 'Quận Tân Bình, TP Hồ Chí Minh', '0984123465', 'https://play-lh.googleusercontent.com/V8u376-kuoSqylPxK8QDl6zQ7m5Pp4Er2Fn1nUWkKtXdHuZ2lvqkODqmlsRIzQteJMoT'),
(17, 'Tefal', 'Pháp', '0984654789', 'https://logoeps.com/wp-content/uploads/2012/11/tefal-vector-logo.png'),
(18, 'Hafaco', 'Quận 5, TP Hồ Chí Minh', '0984654780', 'https://cdn.mywork.com.vn/company-logo-medium/201610/3bd0b70c95be.png'),
(19, 'SunHouse', 'Quận Cầu Giấy, Hà Nội', '0984654789', 'https://cdn.nhanlucnganhluat.vn/uploads/images/DEAD02B6/logo/2018-12/logo.png'),
(20, 'Parroti', 'Trung Quốc', '0984654789', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTv5ODtwE0WIF1mpF4GKYNmCvUMQeR8rwjzUtD7Z-OAggJL6yjRFqBYhD47tdimbvJr3M&usqp=CAU'),
(21, 'Sennai', 'Việt Nam', '0984654789', 'https://www.seekpng.com/png/detail/222-2227869_logo-senai-vector-download-free-logo-senai-png.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `manufacturer_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `manufacturer_id`) VALUES
(35, 'Cây lau nhà tự vắt thông minh HAMA', 'Cây lau nhà thông minh Hama có tính năng ƯU VIỆT:\r\n	 Siêu gọn nhẹ, có kèm thùng lau nhà, bông lau, mua về là sử dụng ngay\r\n	 Bàn lau tự vắt khi nghiêng 1 góc khi đang lau nhà có thể xoay 360 độ\r\n	 Chổi lau nhà khi giặt chỉ cần một tay đưa lên và xuống\r\n	 Ngăn giặt và vắt khô riêng biệt giúp bạn không phải đụng tay để giặt bông lau\r\n	 Chổi lau nhà siêu sạch nhờ Bông lau sợi Microfiber tiên tiến giúp lấy hết rác, tóc và giảm tĩnh điện cho mặt sàn\r\n	 Thùng lau nhà thông minh có lỗ thoát nước tiện lợi để xả nước giặt sau khi sử dụng', 184999, 'images/1645453776.jpg', 18),
(36, 'Cây Lau Nhà Xoay 360 Độ Sunhouse Ks-Mo350I', 'Cây lau nhà xoay 360 độ SUNHOUSE KS-MO350I có cán làm bằng inox 201 với tay cầm bằng nhựa PP cao cấp, chắc chắn, không bị han gỉ và có thể tháo lắp dễ dàng khi sử dụng. Cây lau có thể điều chỉnh độ dài 950-1200mm giúp bạn dễ dàng lau dọn cả những nơi ẩn khuất như gầm giường, tủ hay những vị trí cao không với tới.\r\nNhựa PP có đặc điểm là khá dẻo. Sử dụng nhựa PP cho phần lắp ráp giữa đầu cây lau và đĩa bông giúp sản phẩm không bị vỡ giòn khi thay lắp như các loại cây lau khác và dễ dàng thao tác.\r\nCây lau nhà xoay 360 độ SUNHOUSE KS-MO350I được thiết kế bộ chuyển động với thanh dẫn động bằng thép hợp kim và cơ cấu tạo chuyển động bằng nhựa POM chống mài mòn tốt, tạo chuyển động nhẹ nhàng, giúp bạn không cần tốn quá nhiều công sức để giặt hay vắt. Bạn chỉ cần đặt cây lau đúng vị trí và nhấn theo theo chiều thẳng đứng là có thể dễ dàng giặt hoặc vắt bông lau. Bên cạnh đó, hệ thống giảm chấn động bằng cao su giúp tăng độ bền của sản phẩm, với thao tác vắt lên tới 60.000 lần.', 168300, 'images/1645454142.jpg', 19),
(37, 'Cây lau nhà DMX CL004', 'Cây lau nhà có thân bằng inox bền bỉ, bóng đẹp, tiện dụng.\r\nỞ cuối thân cây lau nhà có lỗ nhỏ, tiện treo, móc lên tường, kệ.\r\nBông lau nhà bằng sợi cotton dai chắc, khả năng thấm hút tốt.\r\nThương hiệu DMX - độc quyền Điện máy XANH, sản xuất tại Việt Nam.', 35000, 'images/1645454354.jpg', 16),
(38, 'Bộ Cây Lau Nhà Tự Vắt Thông Minh 2 Ngăn Parroti Pro PR01', '- Có ngăn giặt sạch nhanh và vắt cực khô\r\n- Cây lau dài bằng inox không rỉ\r\n- Tay cầm bằng mút mềm không đau tay\r\n- Vải lau thấm hút tốt và giữ được tóc, lông động vật\r\n- Bàn lau lớn có thể xoay 360 độ\r\n- Thiết kế thông minh, gọn gàng và tinh tế, tiết kiệm không gian\r\n- Lau nhà mà tay không phải chạm nước và hóa chất tẩy rửa, bảo vệ da tay', 449000, 'images/1645454681.jpg', 20),
(39, 'Cọ Bồn Cầu Toilet, Cọ Vệ Sinh Cao Cấp - Parroti Silicon SL01', '- Có ngăn giặt sạch nhanh và vắt cực khô\r\n- Cây lau dài bằng inox không rỉ\r\n- Tay cầm bằng mút mềm không đau tay\r\n- Vải lau thấm hút tốt và giữ được tóc, lông động vật\r\n- Bàn lau lớn có thể xoay 360 độ\r\n- Thiết kế thông minh, gọn gàng và tinh tế, tiết kiệm không gian\r\n- Lau nhà mà tay không phải chạm nước và hóa chất tẩy rửa, bảo vệ da tay', 189000, 'images/1645454763.jpg', 20),
(40, 'Cọ Bồn Cầu Toilet, Cọ Vệ Sinh Cao Cấp - Parroti Silicon SL01', '- Đầu cọ mềm làm sạch nhanh và không xước men bồn cầu\r\n- Tay cầm to, chắc chắn và không đau tay\r\n- Có nhíp gắp tóc cực tiện dụng\r\n- Cốc đựng sang trọng và tinh tế\r\n- Thân cọ làm bằng inox không rỉ', 119000, 'images/1645454937.jpg', 20),
(41, 'Găng tay cao su siêu dai rửa bát, bao tay cao su rửa chén, vệ sinh nhà cửa, an toàn, không mùi hôi Parroti Active AT01', '- Làm tư vật liệu Nitrile siêu dai, siêu bền, chống trơn trượt\r\n\r\n- An toàn cho da và cho nấu nướng, đặc biệt với da dị ứng\r\n\r\n- Không mùi nhựa hóa chất, không có bột nhựa như loại thông thường\r\n\r\n- Dễ giặt sạch\r\n\r\n- Đa năng: găng tay cao su Parroti dùng để rửa chén, nấu ăn, giặt giũ hoặc vệ sinh nhà cửa', 55000, 'images/1645455014.jpg', 20),
(42, 'Nồi Cơm Nắp Gài Toshiba RC-18JFM(H)VN (1.8L) - Hàng chính hãng', 'Nồi Cơm Nắp Gài Toshiba RC-18JFM(H)VN sở hữu kiểu dáng đẹp mắt, màu sắc nổi bật, phù hợp với mọi không gian nội thất nhà bếp. Thiết kế chốt gài trên nắp nồi tiện lợi, giúp bạn thuận tiện xách di chuyển đến nhiều vị trí khác nhau.\r\nLòng nồi được làm từ chất liệu hợp kim cao cấp, có phủ lớp chống dính, giúp cơm được nấu thơm ngon hơn và dễ dàng cho bạn khi chùi rửa. Chất liệu nồi bền, có khả năng chịu nhiệt, chịu lực cao, khó móp méo khi bị va chạm. Lớp men chống dính dày, khó bong và hoàn toàn an toàn cho người sử dụng.\r\nNồi cơm điện nắp gài Toshiba có dung tích 1.8L, thích hợp sử dụng cho gia đình đông người có từ 2-3 thành viên. Đảm bảo cung cấp cho cả gia đình bạn một bữa cơm thơm ngon, no căng bụng.\r\nCông nghệ 3 mâm nhiệt, hơi nóng tỏa từ đáy, nắp và thân nồi giúp hạt cơm chín đều và đặc biệt là không lo cơm bị nhão cho bữa cơm gia đình thật thơm ngon.\r\n\r\n\r\n', 790000, 'images/1645455237.jpg', 15),
(43, 'Bình đun siêu tốc Toshiba 1.7 lít KT-17SH2NV - HÀNG CHÍNH HÃNG', 'Bình đun siêu tốc Toshiba 1.7 lít KT-17SH2NV có thân và ruột ấm làm bằng Inox SUS 304 cao cấp, sáng bóng, không xỉn màu và đặc biệt là không để lại cặn dưới đáy ấm sau thời gian dài sử dụng. Dung tích 1.7L phù hợp với gia đình có từ 3 - 4 thành viên.\r\nSản phẩm được thiết kế với miệng ấm lớn giúp bạn dễ dàng lau chùi bên trong và châm nước mỗi khi cần sử dụng. Ấm được thiết kế với dáng đứng thon gọn, với tay cầm bằng nhựa cao cấp chịu nhiệt tốt, rất tiện cầm nắm và di chuyển dễ dàng.\r\nĐế tiếp điện được thiết kế độc lập, tách rời khỏi thân ấm, giúp việc đổ nước Tiếp nước dễ dàng, linh hoạt. Ấm có thể xoay 360 độ trên đế tiếp điện, người dùng có thể đặt ấm lên hay nhấc ấm ra khỏi đế ở bất cứ góc nào mà không phải lo lắng đến vấn đề phải đặt sao cho khớp.\r\nCông suất mạnh 1850 - 2200 W cho thời gian nấu nước nhanh chóng, giúp tiết kiệm thời gian và điện năng tối đa.\r\nẤm có chế độ ngắt tự động khi nước sôi hoặc cạn nước, đảm bảo an toàn tối đa cho người sử dụng (quên/bận rộn công việc khác). Chức năng này còn giúp làm tăng tuổi thọ sản phẩm và phòng chống cháy nổ.\r\nĐèn sáng đỏ từ khi bắt đầu cho đến khi kết thúc quá trình đun sôi nước, giúp người sử dụng dễ dàng nhận biết nước đã sôi hay chưa mà không cần mở nắp.\r\n\r\n\r\n\r\n\r\n', 590000, 'images/1645455356.jpg', 15),
(44, 'Bình đun siêu tốc Toshiba KT-15DS1NV - Hàng Chính Hãng', 'Bình đun siêu tốc Toshiba KT-15DS1NV với màu đen mạnh mẽ, kết cấu chắc chắn, góp phần làm tăng tính thẩm mỹ cho gian bếp gia đình. Bình có dung tích 1.5 lít, tương đương với 8 ly nước, bình đun cung cấp đủ nước nóng mỗi ngày cho 1 người dùng.\r\nBình đun siêu tốc có vỏ bằng nhựa PP cao cấp không chứa BPA, ruột bằng inox 304 đúc nguyên khối bền tốt, đun nước an toàn, dễ vệ sinh. Lớp trong của nắp làm bằng inox 304 tăng khả năng truyền nhiệt cho nước mau sôi hơn. Bên cạnh đó, thân bình trang bị 2 lớp cách nhiệt chống nóng, đảm bảo bạn không bị bỏng tay khi cầm nắm, di chuyển và thao tác với bình. Lưới lọc cặn giúp loại bỏ tạp chất cho nước rót ra sạch trong, tốt với sức khỏe hơn.\r\nĐế tiếp điện bằng nhựa chống cháy PP 5VA, bình xoay 360 độ linh hoạt, nhấc và đặt bình vào đế nhanh gọn. Mặt dưới của đế bình đun siêu tốc có lõi quấn dây điện cho bạn bảo quản thiết bị đơn giản. Thiết kế bộ gia nhiệt cao cấp Strix của Anh Quốc bền, đun sôi hiệu quả. Trang bị tính năng tự ngắt điện khi nước sôi hoặc khi bình cạn nước tăng tuổi thọ cho bình đun.\r\nCông suất mạnh 1800 - 2150 W cho thời gian nấu nước nhanh chóng, giúp tiết kiệm thời gian và điện năng tối đa.\r\n2 góc mở nắp là 45 độ và 75 độ. Trong đó góc mở nắp 45 độ giữ hơi nóng ngưng tụ ở nắp trong, tránh gây bỏng, nóng cho người dùng mở nắp đột ngột. Còn góc 75 độ giúp việc thêm nước vào bình, vệ sinh tiện lợi hơn.\r\n\r\n\r\n', 890000, 'images/1645455664.jpg', 15),
(45, 'Máy xay sinh tố và làm sữa hạt đa năng Tefal BL967B66- - 1300W - Lưỡi dao với công nghệ Powelix - Hàng chính hãng', 'Công suất : 1300W (heat) - 1000W (blend)\r\nDung tích  1,75L\r\nChất liệu : thủy tinh\r\nLưỡi dao 6 cánh xay nhuyễn mịn\r\nDễ dàng chùi rửa sau khi sử dụng\r\nChức năng làm sạch nhanh riêng biệt \r\nDễ dàng chế biến các thực phẩm nóng và lạnh : cháo, sữa ,súp …', 2879000, 'images/1645455526.jpg', 17),
(46, 'Nồi chiên không dầu Tefal XL Ultra Fry EY111B15 - 4.2L - Hàng chính hãng', 'Công suất: 1630 W\r\nBảng điều khiển: Cảm ứng, đèn sáng mỗi chức năng, dễ sử dụng và thao tác\r\nCông nghệ khí nóng đa chiều, không cần đảo khi nấu\r\nNồi chiên 8 chức năng cài đặt sẵn (khoai tây chiên, bánh bông lan, pizza, bánh mì nướng, gà, các loại thịt, tôm, cá)\r\nLồng nồi bằng thép không rỉ phủ chống dính\r\nVỏ ngoài bằng nhựa chịu nhiệt cao\r\nCó khả năng tự động ngắt điện, chuông báo khi thức ăn đã chín\r\nHẹn giờ lên đến 60 phút, nhiệt độ lên đến 200 độ C\r\nDung tích lớn dùng được cho 6 người, 4.2L\r\nMàu sắc: Bạc\r\nXuất xứ: Trung Quốc', 1979000, 'images/1645455940.jpg', 17),
(47, 'Bông lau nhà 15.7 cm DMX B-16', 'Bông lau nhà bằng sợi Microfiber bền dai, thấm hút tốt, vắt nước nhanh ráo, tiện giặt sạch.\r\nĐường kính đĩa gắn bông lau 15.7 cm phù hợp với bộ lau nhà DMX BL001, DMX-X4, MH-X2,...\r\nCó cấu tạo xoay 360 độ, tháo lắp linh hoạt, nhanh chóng. \r\nSản xuất tại Việt Nam, sản phẩm chất lượng tốt, sử dụng lau nhà tiện lợi, hiệu quả.', 21000, 'images/1645456254.jpg', 16),
(48, 'Khẩu Trang Y Tế Hafaco 4 lớp ( Hộp 50 cái)', '- Khẩu trang HAFACO sử dụng công nghệ vải không dệt ( Non - Woven ) SMS đầu tiên trong ngành khẩu trang hiện nay. Đặc biệt khẩu trang HAFACO không thấm nước, không mùi và cho độ mềm mịn khi đeo.\r\n- Khẩu trang HAFACO được tích hợp với 03 chức năng vào 1 chiếc khẩu trang như: chống thấm nước, lọc bụi, lọc khuẩn. Nhằm bảo vệ sức khỏe, các bệnh qua đường hô hấp cho người sử dụng một cách tuyệt đối.\r\n- Các khẩu trang của HAFACO cam kết nguyên liệu được nhập 100% trong nước, đảm bảo tính ổn định, chất lượng sản phẩm cho quý khách hàng và người sử dụng.', 70000, 'images/1645456415.jpg', 18),
(49, 'Chổi Cọ Nhà Vệ Sinh Bồn Cầu Toilet Không Dây Đa Năng SENNAI Pin 4000mAh - Hàng Chính Hãng', 'Chổi Cọ Nhà Vệ Sinh Bồn Cầu Toilet Không Dây Đa Năng SENNAI Công Suất 25W Pin 4000mAh - Hàng Chính Hãng - MẪU MỚI NHẤT VỪA RA MẮT\r\nCHỔI CỌ NHÀ VỆ SINH BỒN CẦU TOILET KHÔNG DÂY ĐA NĂNG SENNAI, tích hợp nhiều công dụng trong 1 sản phẩm, thiết kế mới mẻ, công năng đầy đủ sẽ giúp chị em tiết kiệm được vô số thời gian cũng như công sức trong việc dọn dẹp hằng ngày. Nhất là đối với chị em đang mang thai, các chị em có tiền sử đau lưng, mỏi gối, da tay hay bị bong tróc do tiếp xúc với chất tẩy rửa thường xuyên hay đơn giản là không muốn tiếp xúc với vết bẩn thì chắc hẳn không thể bỏ qua sản phẩm này.\r\nCHỔI CỌ NHÀ VỆ SINH BỒN CẦU TOILET KHÔNG DÂY ĐA NĂNG SENNAI sử dụng công nghệ pin Lithium thân thiện với môi trường, dung lượng cức lớn lên đến 4000mAh giúp bạn thỏa sức dọn dẹp nhà cửa chỉ với 1 lần xạc. Thời gian sử dụng của Cây Chà Điện Vệ Sinh Làm Sạch Nhà Cửa Đa Năng SENNAI lên đến 100 phút (không tải), 65 - 70 phút khi sử dụng liên tục thoải mái đáp ứng mọi nhu cầu hằng ngày. Chuẩn kháng nước IPX4/IPX6 kết hợp động cơ điện không chổi than giúp máy không bị nóng lên trong quá trình sử dụng cũng như kéo dài tuổi thọ của sản phẩm lên tới 5 năm. Tốc độ quay 320 vòng/1 phút, công suất 25w sẽ đáp ứng đủ nhu cầu dọn dẹp hằng ngày, với tốc độ quay ổn định, nước sẽ không bị văng lên mỗi khi cọ rửa, hạn chế vết bẩn bắn lên người. Lực nén môtơ cực đại 10,5kg (tương đương việc bạn sử dụng ngón tay trỏ đè thẳng vào cân đồng hồ và kim hiển thị mức 10,5kg - cân 100kg) thì máy sẽ tự động ngắt để bảo vệ động cơ chống quá tải.', 935700, 'images/1645456666.jpg', 21),
(50, 'Thùng rác inox 15 lít đạp vuông thấp thùng rác nhà bếp', 'Thùng rác FITIS cao cấp\r\nVỏ thùng được làm bằng Inox cao cấp, phủ nano chống vân tay bền bỉ và sang trọng.\r\nNắp kháng khuẩn thông minh có thể diệt trừ đến 99% các loại vi khuẩn như Ecoli, cầu khuẩn.\r\nNgăn đựng sáp dưới nắp thùng mang lại hiệu quả chống côn trùng tối ưu.\r\nCông nghệ giảm chấn giúp kiểm soát chuyển động đóng/mở nhẹ nhàng.\r\nTặng Sáp chống côn trùng,\r\nTặng cuộn 20 túi nilon có giây rút\r\nLoại 15L (30 x 26 x 44 cm\r\nHiện nay ngoài loại inox cơ bản còn có thêm màu sơn Đen và Trắng,', 615000, 'images/1645456767.jpg', 16),
(51, 'Nồi Cơm Điện Tử Sharp KS-COM186EV-GL (1.8L) - Hàng chính hãng', 'Nồi Cơm Điện Tử Sharp KS-COM186EV-GL có kiểu dáng hiện đại, sang trọng kết hợp với gam màu gold tinh tế nổi bật, có quai xách tiện lợi dễ dàng khi di chuyển. Nồi cơm điện dung tích lớn lên đến 1.8L, thích hợp dành cho gia đình có 3 - 5 thành viên.\r\nNồi sử dụng chất chống dính cao cấp, không chất độc hại đảm bảo an toàn sức khỏe và giúp cơm không bám vào thành nồi gây cháy mà lại dễ chùi rửa. Tay nắm bằng nhựa đặc biệt giúp lấy nồi ra dễ dàng ngay cả khi nồi còn rất nóng.\r\nĐặc biệt, thiết bị được trang bị đồng hồ kỹ thuật số cho phép người dùng chọn giờ nấu cơm trước từ 1 tới 15 giờ. Rất thuận tiện và luôn có sẵn cơm khi cần dùng. Bên cạnh đó, nồi có khả năng giữ ấm tối đa 12 giờ với nắp trong của nồi có đĩa nhiệt giúp giữ cơm ấm và mềm. Đồng thời không làm hơi nước rơi trở lại lên cơm.\r\nNồi cơm điện tử Sharp KS-COM186EV-GL được tích hợp đa chức năng nấu, như: Nấu cháo, làm bánh, nấu súp, canh, nước lè giúp tiết kiệm thời gian. Với thiết kế bảng điều khiển điện tử dễ dàng quan sát, thao tác nhanh chóng.\r\n\r\n\r\n', 1249000, 'images/1645457084.jpg', 16);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_id` int NOT NULL,
  `type_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_id`, `type_id`) VALUES
(35, 40),
(36, 40),
(37, 40),
(38, 40),
(47, 40),
(39, 41),
(50, 41),
(40, 42),
(49, 42),
(41, 43),
(42, 44),
(51, 44),
(43, 45),
(44, 45),
(45, 46),
(46, 47),
(47, 48),
(48, 49);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `receiver_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` int NOT NULL,
  `total` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `customer_id`, `order_time`, `receiver_id`, `note`, `status`, `total`) VALUES
(32, 15, '2022-02-21 15:29:41', '1', '								', 4, 837299),
(33, 15, '2022-02-21 15:30:25', '2', '								', 4, 1480000),
(34, 15, '2022-02-21 15:30:57', '1', '								', 2, 1329000),
(35, 16, '2022-02-21 15:33:52', '2', '								', 2, 723297),
(36, 16, '2022-02-21 15:34:14', '1', '								', 2, 6341000),
(37, 16, '2022-02-21 15:37:52', '1', '								', 2, 8067000),
(38, 17, '2022-02-21 15:39:00', '1', NULL, 1, 703999),
(39, 18, '2022-02-21 15:40:59', '1', '								', 2, 5993700);

-- --------------------------------------------------------

--
-- Table structure for table `receipt_detail`
--

CREATE TABLE `receipt_detail` (
  `receipt_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt_detail`
--

INSERT INTO `receipt_detail` (`receipt_id`, `product_id`, `quantity`) VALUES
(32, 35, 1),
(32, 36, 1),
(32, 37, 1),
(32, 38, 1),
(33, 43, 1),
(33, 44, 1),
(34, 37, 1),
(34, 38, 1),
(34, 41, 1),
(34, 42, 1),
(35, 35, 3),
(35, 36, 1),
(36, 46, 1),
(36, 50, 1),
(36, 51, 3),
(37, 45, 1),
(37, 46, 3),
(37, 50, 2),
(38, 35, 1),
(38, 37, 2),
(38, 38, 1),
(39, 38, 2),
(39, 44, 1),
(39, 46, 1),
(39, 47, 2),
(39, 49, 1),
(39, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

CREATE TABLE `receivers` (
  `customer_id` int NOT NULL,
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`customer_id`, `id`, `name`, `phone`, `address`, `status`) VALUES
(15, 1, 'Nguyễn Thành Long', '0984123456', 'Hà Nội', 0),
(15, 2, 'Anh của Long', '0984987963', 'Hà Nội', 0),
(16, 1, 'Mao Leng', '0984789321', 'Tuy Hòa, Phú Yên', 0),
(16, 2, 'Lao Meng', '0984654963', 'Mỹ', 0),
(17, 1, 'Nguyễn Văn Mạnh', '0984654123', 'Hà Nội', 1),
(18, 1, 'Châu chấu đá xe', '0985123654', 'Linh Trung Thủ Đức Hồ Chí Minh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`) VALUES
(45, 'Bình đun'),
(40, 'Cây lau nhà'),
(43, 'Găng tay'),
(42, 'Hút bồn cầu'),
(49, 'Khẩu trang'),
(46, 'Máy xay'),
(47, 'Nồi chiên'),
(44, 'Nồi cơm'),
(48, 'Phụ kiện'),
(41, 'Thùng rác');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

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
  ADD CONSTRAINT `product_type_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_type_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
