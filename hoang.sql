-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2022 lúc 06:22 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hoang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `phone_number`, `level`, `status`) VALUES
(1, 'QuacchXuanHoang', 'admin', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '0935413317', 2, 0),
(2, 'quachHoangVIp', 'quachhoang2002', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '231123123', 0, 0),
(4, 'quachHoangVIp', 'HoangVipPro', '*6BB4837EB74329105EE4568DDA7DC67ED2CA2AD9', '0935413317', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `price`, `quantity`, `image`, `user_id`, `product_id`) VALUES
(195, 'Banh3', '12500', 1, '1652869355p40-pro-silver.png', 1, 8),
(196, 'Banh Chien Kem Custard', '25000', 2, '1653489653Bánh chiên kem Custard.jpg', 1, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `Type`) VALUES
(1, 'Bánh Mì'),
(2, 'Bánh Kem'),
(3, 'Banh Ngot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacture`
--

CREATE TABLE `manufacture` (
  `Ma` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacture`
--

INSERT INTO `manufacture` (`Ma`, `name`, `phone`, `Country`) VALUES
(1, 'TOUS les JOURS', '02323324', 'My'),
(58, 'ABC', '09341231231', 'VietNam'),
(59, 'Duc Phat', '09245432', 'Viet Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name_receiver` varchar(50) NOT NULL,
  `phone_receiver` varchar(50) NOT NULL,
  `address_receiver` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name_receiver`, `phone_receiver`, `address_receiver`, `status`, `time`, `total_price`) VALUES
(56, 1, 'quach xuan hoang', '0935413317', '56U D', 1, '2022-04-09 21:03:06', 3000),
(57, 1, 'quach xuan hoang', '087979', 'quachhoang@asd.com', 1, '2022-04-15 08:37:01', 10050),
(58, 1, 'HoangVipPro', '21312321321', 'Binh Phu P10 Q6', 0, '2022-04-16 08:37:01', 5000),
(59, 1, 'quach xuan hoang', '0935413317', '56 u d', 1, '2022-05-21 21:36:35', 290005),
(60, 1, 'HoangVipPro', 'Binh Phu P10 Q6', '0935413145', 0, '2022-05-25 10:41:27', 22500),
(61, 40, 'Xuan Hoang', '56 U D ', '0935413317', 1, '2022-05-25 15:55:22', 40500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `product_id`, `quantity`) VALUES
(56, 4, 1),
(56, 7, 1),
(57, 7, 1),
(57, 9, 2),
(58, 7, 2),
(59, 16, 3),
(59, 19, 5),
(59, 22, 2),
(60, 8, 2),
(61, 7, 1),
(61, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `product_type` int(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `manufacture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `Name`, `Price`, `product_type`, `Image`, `description`, `manufacture_id`) VALUES
(4, 'Banh Mi Lua Mach Den', 22000, 1, '1653490183Bánh mì lúa mạch đen.jpg', 'Bánh mì đen lúa mạch được làm từ sự kết hợp giữa hạt và bột lúa mạch đen. Hiện nay, có nhiều loại bánh mì đen lúa mạch khác nhau, tùy thuộc vào các công thức kết hợp riêng của từng loại bánh', 58),
(7, 'Banh Chien Kem Custard', 25000, 1, '1653489653Bánh chiên kem Custard.jpg', 'Món kem custard chiên chưa hẳn được nhiều người biết đến. Hôm nay Bách hóa XANH sẽ hướng dẫn các bạn cách làm món kem custard chiên cực kỳ thơm ngon nhé.', 1),
(8, 'Banh Chien Xoan', 20000, 1, '1653489816Bánh chiên xoắn.jpg', 'Bánh chiên xoắn quẩy này thực ra cũng chỉ có một sự thay đổi nho nhỏ trong thành phần thôi nhưng chính điều này lại làm nên sự khác biệt đấy các bạn ạ!      ', 1),
(9, 'Banh Lop Sung Trau', 15000, 1, '1653489808Bánh lớp sừng trâu.jpg', 'Bữa sáng sẽ thật tuyệt vời khi được thưởng thức một chiếc bánh sừng trâu (croissant) trứng muối với lớp vỏ giòn tan cùng phần nhân béo ngậy cực hấp dẫn', 1),
(16, 'Banh Pate Chaud', 15000, 1, '1653490341Bánh pate chaud.jpg', 'Bánh Pateso ngàn lớp được biết đến là một món bánh quen thuộc ở Pháp với tên gọi paté chaud', 1),
(17, 'Banh Mi Sandwich sua', 10000, 1, '1653490231Bánh mì sandwich sữa.jpg', 'Bánh mì sandwich nhìn cứ tưởng khó nhưng thực tế cách làm lại vô cùng đơn giản. Chỉ với vài nguyên liệu cơ bản là có ngay những lát bánh mì dai mềm, trắng mịn thơm ngon để ăn sáng', 58),
(18, 'Banh Mi Xuc Xich', 25000, 1, '1653490278Bánh mì xúc xích.jpg', 'Bánh mì cuộn xúc xích là món bánh cực kỳ lý tưởng và bổ dưỡng cho gia đình bạn vào mỗi buổi sáng. Từng thớ bánh mì dai mềm, thơm béo quyện cùng xúc xích bùi bùi chắc chắn sẽ khiến mọi người thích mê. Vào bếp cùng Điện máy XANH xem ngay 2 công thức sau đây nhé!', 58),
(19, 'Corn Chesse', 150000, 2, '1653491950Corn Cheese Mousse 2.jpeg', 'Mang không khí Noel đến từng chiếc bánh chính là điểm nhấn đặc biệt trong bộ sưu tập Christmas Cake lần này của Tour Les Jour. Cùng thưởng thức vị bánh ngọt ngào bên cạnh người thân yêu và chào đón một mùa giáng sinh thật an lành và ấm áp bạn nhé!      ', 59),
(20, 'Banh Mi Kep Thit Nguoi', 22000, 1, '1653489914Bánh mì kẹp thịt nguội.jpg', 'Một loại bánh mì ăn ngon, bổ dưỡng lại rất được phổ biến ở Mỹ, vừa có thể ăn sáng, ăn xế hoặc dùng trong các buổi tiệc nhẹ cho cả người lớn và trẻ em', 58),
(21, 'Banh Mi Lua Mi Bot Den & Bot Mi Nguyen Cam', 17000, 1, '1653490044Bánh mì lúa mạch đen & bột mì nguyên cám.jpg', 'Để làm nên những chiếc bánh mì thơm ngon bổ dưỡng, nguyên liệu bắt buộc phải có chính là bột mì. Bột mì được làm từ lúa mì - loại ngũ cốc được sử dụng nhiều nhất tính đến nay. Một hạt lúa mì nguyên vẹn bao gồm 3 phần: cám, nội nhũ, mầm.', 1),
(22, 'Banh Tart Trung', 22000, 1, '1653491931bánh tart trứng.jpeg', 'Bánh tart trứng là một trong những món ăn được yêu thích trên toàn thế giới. Món bánh này có thể được dùng cho bữa ăn sáng hoặc làm món tráng miệng      ', 59),
(23, 'Creamy Tiramisu ', 80000, 2, '1653490601Creamy Tiramisu Mousse 2.jpeg', ' Tiramisu Việt Nam được viết ra trong một công thức gọn gàng và đơn giản hơn nhưng hương vị thì vẫn nguyên vẹn như những gì mà người ta biết về tiramisu truyền thống   ', 1),
(24, 'Fruit Red Jewe', 120000, 2, '1653490687Fruit Red Jewelry Mousse 1.jpg', 'Lớp gel lấp lánh với những lát dâu tây mọng nước ngọt ngào.   Bánh đẹp với cái tên cũng thật đẹp', 1),
(25, 'Opera Cake', 200000, 2, '1653490725Opera Cake 2.jpg', 'Bánh Opera là một kiểu bánh ngọt Pháp. Nó được làm từ nhiều lớp bánh xốp hạnh nhân ngâm trong si rô cà phê, làm lớp với ganache hoặc kem bơ cà phê và dùng một lớp sô cô la chảy để đổ mặt bánh      ', 1),
(26, 'StrawBerry Yogurt', 170000, 2, '1653490845Strawberry Yogurt Fresh 2.jpeg', ' Hương vị sữa chua nhẹ ngọt lịm khi được kết hợp với hương thơm đặc trưng của dâu tây là sự kết hợp hoàn hảo.', 1),
(27, 'Almond Ring Donut', 30000, 3, '1653490931Almond Ring Donut.jpeg', ' Bánh donut chiên phủ hạnh nhân & sô cô la', 1),
(28, 'Choco Ball Donut', 26000, 3, '1653490980Choco Ball Donut.jpeg', 'Bánh donut tròn chiên phủ sô cô la nhiều vị (5 pcs/pack)', 1),
(29, 'Green Tea Ring Donut', 31000, 3, '1653491023Green Tea Ring Donut.jpeg', ' Green Tea Ring Donut . Bánh donut chiên phủ sô cô la vị trà xanh. Tiệm bánh - Quốc tế - Gia đình, Giới văn phòng, Cặp đôi.', 1),
(30, 'StrawBerry Ring Donut', 28000, 3, '1653491078Strawberry Ring Donut.jpeg', ' Strawberry Ring Donut. Bánh donut chiên phủ sô cô la vị dâu. Tiệm bánh - Pháp - Sinh viên, Gia đình, Giới văn phòng, Cặp đôi', 58),
(31, 'White Cat Donut', 24000, 3, '1653491121White Cat Donut.jpeg', ' Bánh donut chiên phủ sô cô la trang trí hình mèo ngộ nghinhx là một sản phẩm của TOUS les JOURS - Panorama', 58);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test1`
--

CREATE TABLE `test1` (
  `Ma` int(11) NOT NULL,
  `Ten` varchar(200) NOT NULL,
  `noi_dung` text NOT NULL,
  `hinh_anh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `test1`
--

INSERT INTO `test1` (`Ma`, `Ten`, `noi_dung`, `hinh_anh`) VALUES
(38, '     quach xuan hoang                    ', '    HoangVipPRO1       ', 'https://estnn.com/wp-content/uploads/2021/06/lee-sin-nightbringer.jpeg          '),
(39, 'quach xuan hoang', '213123123', 'https://cdn.tgdd.vn/2020/08/content/maxresdefault(3)-800x450.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT '1652869355p40-pro-silver.png',
  `token` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `fullname`, `phone`, `username`, `address`, `password`, `email`, `image`, `token`, `status`) VALUES
(1, 'Quach Xuan Hoang', '0935413317', 'quachhoang2002', 'Binh Phu P10 Q6', 'e10adc3949ba59abbe56e057f20f883e', 'quachhoang2002@gmail.com', '1653491254Almond Ring Donut.jpeg', '', 0),
(18, 'HoangVipPro', '03541358', 'HoangVipPro', '57 TTD', 'e10adc3949ba59abbe56e057f20f883e', 'hoang@gmail.com', '', '', 0),
(36, 'Quach Xuan Hoang', '0935123123', 'quachhoa123123', 'Binh Phu P10 Q6', '3dfd5ffcdfaa9c2e89360319021f08b1', 'quachhoa1232@gmail.com', '1652869355p40-pro-silver.png', '', 0),
(37, 'Xuan Hoang', '0935123311', 'hoang2002', 'Binh Phu P10 Q 6', '3dfd5ffcdfaa9c2e89360319021f08b1', 'quachhoa12322@gmail.com', '1652869355p40-pro-silver.png', '', 0),
(38, 'Quach Xuan Hoang', '0935333311', 'quach12345', 'Binh Phu P10 Q6', '1cd7468ff66caa87fc209f6cd07fd9c6', 'quachh1232@gmail.com', '1652869355p40-pro-silver.png', '', 0),
(39, 'Xuan Hoang Yasuo', '0123445566', 'yasuo2002', 'Binh Phu P10 Q6', 'd5b6582c34afb81fc4d02f9c2abe35af', 'yasuo@gmail.com', '1652869355p40-pro-silver.png', '', 0),
(40, 'Xuan Hoang', '0935413147', 'leesin', 'Binh Phu P10 Q6', '3dfd5ffcdfaa9c2e89360319021f08b1', 'quachhoang1202@gmail.com', '1652869355p40-pro-silver.png', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `discount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `code`, `discount`) VALUES
(1, 'GIAM10', 10),
(3, 'Giam15', 15);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacture`
--
ALTER TABLE `manufacture`
  ADD PRIMARY KEY (`Ma`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_manufacture` (`manufacture_id`),
  ADD KEY `product_type` (`product_type`);

--
-- Chỉ mục cho bảng `test1`
--
ALTER TABLE `test1`
  ADD PRIMARY KEY (`Ma`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `manufacture`
--
ALTER TABLE `manufacture`
  MODIFY `Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `test1`
--
ALTER TABLE `test1`
  MODIFY `Ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_type`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_manufacture` FOREIGN KEY (`manufacture_id`) REFERENCES `manufacture` (`Ma`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
