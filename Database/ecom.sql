-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2021 lúc 08:02 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_contact` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_job` text NOT NULL,
  `admin_about` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(11, 'HIEU ', 'dinhngocminhhieu3@gmail.com', 'Hieu123', 'pro-nu-2.jpg', '0329156861', 'Việt Nam', 'STUDENT', 'hyrhfdojkbjfdjndfokfngofpklnmkfsodv fregh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(14, 'MAN', 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum    '),
(15, 'WOMEN', ' Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                     '),
(16, 'KIDS', ' Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `code`, `updated_time`) VALUES
(18, 'dinh ngoc minh hieu', 'dinhngocminhhieu4@gmail.com', 'Taoladaica41', 'Việt Nam', 'Hồ Chí Minh', '0329156861', '297/42/15 Phan Huy Ích, phường 14, Quận Gò Vấp, 828 nguyen chi thnh', 'user-1.jpeg', '::1', '1EBVZRND7G', '2021-10-26 14:48:12'),
(19, 'dinh ngoc minh hieu', 'dinhngocminhhieu5@gmail.com', 'Minhhieu123', 'Việt Nam', 'Hồ Chí Minh', '0984624854', '297/42/15 Phan Huy Ích, phường 14, Quận Gò Vấp, 828 nguyen chi thnh', 'FIRST IMAGE FOR FIRST DATE.PNG', '::1', 'L6XF5ETCAQ', '2021-10-26 14:35:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(100) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(79, 18, 82, 890000, 1410928879, 1, 'S', '2021-10-26 08:20:02', 'COMPLETE'),
(80, 18, 84, 480000, 1410928879, 1, 'S', '2021-10-26 08:05:43', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(41, 1231231, 2200000, 'Bank Account', 2147483647, '0000-00-00'),
(42, 1410928879, 2200000, 'Bank Account', 2147483647, '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_desc1` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_desc1`, `product_keywords`) VALUES
(42, 16, 15, '2021-10-24 13:16:24', 'V-NECK SHIRT MS 16M6692', 'somi(n)1.png', 'somi(n)2.png', 'somi(n)3.png', 999999, '                                                                                                                                                                                                                                                 V-neck shirt, diagonal front flap. Short sleeves with flip hem. <br>\r\nYoung and dynamic bear bo shirt style. Diverse color gamut. Soft and airy silk material brings a comfortable and pleasant feeling to the wearer. With this iteam, if you combine it with shorts, white sneakers or pants, you already have an old hack outfit.                                                                                                                                                                                                                                                                                                                         ', '                                                                                                                                                                                                                                                                                                                   * Products need to be washed immediately without soaking to avoid color fading, distinguish colors and fabrics to avoid fading. Do not wash the product with strong detergents, it should be washed with diluted soap. <br>\r\n* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', 'V-NECK SHIRT WOMEN .'),
(43, 16, 15, '2021-10-24 08:57:57', 'HAND-STYLE SILK SHIRT MS 16M6589', 'somi(n)4.png', 'somi(n)5.png', 'somi(n)6.png', 890000, 'Silk shirt with round neck, short sleeves, styled. Dress down. <br>\r\nOn a glossy silk background, the thickness is moderate, creating a pleasant feeling on your skin. She can combine this shirt with long pants and pants to create her own charm, and enough for her to become very attractive when going down the street, and to the office. This is the item you should own this season.                                               ', '*Products need to be washed immediately without soaking to avoid color fading, distinguish colors and fabrics to avoid fading. Do not wash the product with strong detergents, it should be washed with diluted soap. <br>\r\n* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.                                          ', 'HAND-STYLE SILK SHIRT WOMEN'),
(44, 16, 15, '2021-10-24 09:01:20', 'LACE-TRIMMED SILK SHIRT MS 16M6479', 'somi(n)7.png', 'somi(n)8.png', 'somi(n)9.png', 780000, ' Lace-lined silk shirt V-neck silk shirt with elastic waistband. There are decorative fabric front buttons. Waistless shirt with bow tie. <br>\r\n\r\nThe shirt is designed with elegant V-neck details and a novel design. Soft, shiny silk material feels light and smooth, creating comfort in all her activities all day long.                    ', ' *Products need to be washed immediately without soaking to avoid color fading, distinguish colors and fabrics to avoid fading. Do not wash the product with strong detergents, it should be washed with diluted soap. <br>\r\n* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.', 'LACE-TRIMMED SILK SHIRT WOMEN'),
(45, 16, 15, '2021-10-24 09:14:37', 'CHECKED SHIRT MS 16M5441', 'somi(n)11.png', 'somi(n)12.png', 'somi(n)10.png', 690000, '                                  Silk shirt with round neck, short sleeves, styled. Dress down.\r\nOn a glossy silk background, the thickness is moderate, creating a pleasant feeling on your skin. She can combine this shirt with long pants and pants to create her own charm, and enough for her to become very attractive when going down the street, and to the office. This is the item you should own this season.                                                                                                       ', '                                                        *Products need to be washed immediately without soaking to avoid color fading, distinguish colors and fabrics to avoid fading. Do not wash the product with strong detergents, it should be washed with diluted soap. <br>\r\n* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.                                                                                                                                     ', 'CHECKED SHIRT WOMEN'),
(46, 17, 15, '2021-10-24 13:02:06', 'STARIGHT-LEG JEANS MS 25B8845', 'quanjean(n)1.jpg', 'quanjean(n)2.jpg', 'quanjean(n)3.jpg', 990000, '                        High-waisted jeans with leeches. Loose fit, with front pocket and 2 rear square pockets. Zipper and metal button fastening. <br>\r\n\r\nMaterial with more than 95% cotton is soft, breathable & safe for the most sensitive skin. The jeans can be said that anyone can wear this product line, whether going out, going to school, or going to work.                                           ', '                            \r\n* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.                                        ', 'STARIGHT-LEG JEANS WOMEN PANT '),
(47, 17, 15, '2021-10-24 09:21:32', 'SILVER BAGGY JEANS MS 25B8014', 'quanjean(n)4.jpg', 'quanjean(n)5.jpg', 'quanjean(n)6.jpg', 790000, 'Baggy jeans with 4 pockets. Stand tube, flip bear. The belt has leeches. Double button fastening and front metal zipper. Embossed white border creates accents.<br>\r\n\r\nThe product is finished with high precision with thick, careful seams. The pants form is comfortable and flattering when worn with high-quality denim fabric with good elasticity to help the pants retain their form many times of washing.', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.              ', 'SILVER BAGGY JEANS WOMEN PANT'),
(48, 17, 15, '2021-10-24 09:24:51', 'BLACK STRAIGHT-LEG JEANS MS 25B8844', 'quanjean(n)7.jpg', 'quanjean(n)8.jpg', 'quanjean(n)9.jpg', 1090000, 'Leggings use metal buckles and buttons. Straight leg pants. There are 5 bags.<br>\r\n\r\n- Main ingredients cotton: Soft, safe for the most sensitive skin<br>\r\n- Do not use colorants, toxic chemicals. When buying jeans, customers are given a desiccant package for optimal product preservation                    ', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.            ', 'BLACK STRAIGHT-LEG JEANS WOMEN PANT'),
(49, 17, 15, '2021-10-24 09:25:57', 'BLACK STRAIGHT-LEG JEANS  MS 25B8846', 'quanjean(n)12.jpg', 'quanjean(n)11.jpg', 'quanjean(n)10.jpg', 690000, 'Black, high-waisted jeans with leeches. Loose fit, with front pocket and 2 rear square pockets. Zipper and metal button fastening. Straight pipes are easy to coordinate.<br>\r\n\r\nMaterial with more than 95% cotton is soft, breathable & safe for the most sensitive skin. The jeans can be said that anyone can wear this product line, whether going out, going to school, or going to work.                   ', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.                ', 'BLACK STRAIGHT-LEG JEANS WOMEN PANT'),
(50, 18, 15, '2021-10-24 09:28:42', 'HIGH-FASHION SUNGLASSES MS 87A1280 ', 'phukien(n)2.jpg', 'phukien(n)1.jpg', 'phukien(n)3.jpg', 1100000, 'Possesses a high-class, trendy style. The version is designed by high-quality plastic material over time, bringing unique experiences such as: long-term use value, beautiful glossy glass, tough, good resistance to the impact of the environment, …                  ', '- When not wearing glasses, you should put them in the box to avoid bumps, scratches or dust...<br>\r\n- Do not leave the glass in a place where the temperature is too high or too low like the trunk of a motorbike.                     ', 'HIGH-FASHION SUNGLASSES WOMEN ACCESSORIES'),
(51, 18, 15, '2021-10-24 12:20:46', 'HIGH-FASHION SUNGLASSES  MS 87A1284', 'phukien(n)5.jpg', 'phukien(n)4.jpg', 'phukien(n)6.jpg', 1000000, 'Possessing a trendy, trendy form. The version is designed by high-quality plastic material that is durable over time, bringing unique experiences such as: long-term use value, beautiful glossy glass, difficult to rust, good resistance to the impact of the environment. school,                     ', '- When not wearing glasses, you should put them in the box to avoid bumps, scratches or dust...<br>\r\n- Do not leave the glass in a place where the temperature is too high or too low like the trunk of a motorbike.                    ', 'HIGH-FASHION SUNGLASSES WOMEN ACCESSORIES'),
(52, 18, 15, '2021-10-24 12:22:30', 'HIGH-FASHION SUNGLASSES MS 87A1280', 'phukien(n)8.jpg', 'phukien(n)7.jpg', 'phukien(n)9.jpg', 999999, 'Possessing a trendy, trendy form. The version is designed by high-quality plastic material that is durable over time, bringing unique experiences such as: long-term use value, beautiful glossy glass, hard to rust, good resistance to the impact of the environment. school  .                ', '- When not wearing glasses, you should put them in the box to avoid bumps, scratches or dust...<br>\r\n- Do not leave the glass in a place where the temperature is too high or too low like the trunk of a motorbike.                      ', 'HIGH-FASHION SUNGLASSES WOMEN ACCESSORIES'),
(53, 18, 15, '2021-10-24 12:23:37', 'HIGH-FASHION SUNGLASSES  MS 87A1282', 'phukien(n)11.jpg', 'phukien(n)10.jpg', 'phukien(n)12.jpg', 890000, 'Possessing a trendy, trendy form. The version is designed by high-quality plastic material that is durable over time, bringing unique experiences such as: long-term use value, beautiful glossy glass, hard to rust, good resistance to the impact of the environment. school  .                   ', '- When not wearing glasses, you should put them in the box to avoid bumps, scratches or dust...<br>\r\n- Do not leave the glass in a place where the temperature is too high or too low like the trunk of a motorbike.                     ', 'HIGH-FASHION SUNGLASSES WOMEN ACCESSORIES'),
(55, 16, 14, '2021-10-24 12:30:12', 'WHITE SLIM FIT SHIRT MS 17E2867', 'somi(1)m.webp', 'somi(2)m.webp ', 'somi(3)m.webp', 990000, 'German antique shirt. Long sleeves and 2 attached buttons. There is 1 square pocket on the chest. Fasten with hidden front button. <br>\r\n\r\nSlim fit design is designed to hug lightly, respecting the contours of the body. Elegant tones, easy to coordinate with many outfits such as jeans, shorts, trousers... The shirt can be shirtless or loose thanks to the fashionable ruffles.', '* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.\r\n', ' WHITE SLIM FIT SHIRT MAN'),
(56, 16, 14, '2021-10-24 12:45:46', 'LOTUS SOFT STRIPED SHIRT MS 16E2972', 'somi(4)m.jpg', 'somi(5)m.webp', 'somi(6)m.webp', 790000, '                        German collar shirt, short sleeves sewn hem. Plaid fabric. Fasten with front row of buttons.<br>\r\n\r\n* Constantly searching, mobilizing and creating new inspirations. IVY men launches a line of shirts with special materials: Lotus fabric (60% made from lotus leaves & seeds) and Super Soft fabric. Bring breakthrough features:<br>\r\n\r\n- Promotes Collagen, protects and helps skin to be bright and smooth\r\n- Anti-ultraviolet radiation, health protection.<br>\r\n- Anti-wrinkle, good absorption <br>\r\n- Brings a feeling of relaxation to the wearer.                                   ', '                            * Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.                                       ', 'LOTUS SOFT STRIPED SHIRT MAN'),
(57, 16, 14, '2021-10-24 12:53:03', 'BATMAN T-SHIRT MS 57E3045', 'thun(1)m.jpg', 'thun(2)m.jpg', 'thun(3)m.jpg', 250000, '                        High-quality elastic material and eye-catching design, giving you a youthful, dynamic but equally modern look. Besides, the product has a neutral color, making it easy for men to coordinate with other accessories to increase the sophistication of their fashion style.                                                                    ', '                            * Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.                                                              ', 'BATMAN T-SHIRT MAN'),
(60, 16, 14, '2021-10-24 12:56:27', 'ROUND NECK T-SHIRT MS 57E2969', 'thun(4)m.jpg', 'thun(5)m.jpg ', 'thun(6)m.webp', 200000, 'Basic round neck t-shirt. Short sleeves. Dress down. Printed letters in different colors on the front<br>\r\nMade from high quality cotton spandex fabric, which is long fiber cotton (taken from pima cotton), high durability, capable of withstanding many finishing stages, the fabric surface is softer and thicker than ordinary cotton fabric.', '* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.                                                              \r\n', ' ROUND NECK T-SHIRT MAN'),
(61, 18, 14, '2021-10-24 14:06:23', 'OFFICE MEN LEATHER BAG MS 51E2584', 'pk(10)m.webp', 'pk(11)m.webp', 'pk(12)m.webp', 1100000, '                        Handbags, leather shoulder bags, Holds 14 laptops, Ipad 9.7, 7.9 & Tablets of all kinds. Fashionable youthful style. There are 2 zippered side compartments + 1 main compartment (inside there are 2 small compartments and extra compartments)                                              ', '                             * Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.<br>\r\n\r\n* For 100% cotton fabrics, the product should not be dried by a hanger, but should be crossed over the clothesline to avoid stretch marks.                                                ', 'OFFICE MEN LEATHER BAG ACCESSORIES MAN'),
(62, 17, 14, '2021-10-24 13:38:37', 'SLIM FIT JEAN MS 25E2599', 'jean(1)m.jpg', 'jean(2)m.jpg ', 'jean(3)m.jpg', 1020000, 'Sleeveless, ankle-length jeans. Silver style. There are 5 bags. Fasten the front with a zipper and button.<br>\r\n- Main ingredients cotton: Soft, safe for the most sensitive skin<br>\r\n- Do not use colorants, toxic chemicals. When buying jeans, customers are given a desiccant package for optimal product preservation<br>\r\n- High durability, limited fading, fading: YKK buckles, buttons are manufactured separately. The washing process holds the color for a more durable color.', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.', ' SLIM FIT JEAN MAN PANT'),
(63, 18, 14, '2021-10-24 14:04:45', 'MENs CAP', 'pk(4)m.webp', 'pk(5)m.webp', 'pk(6)m.webp', 320000, '                        Smooth cap. Has an adjustable buckle.<br>\r\nThe top of the cap is long: 7cm<br>\r\nColor: Black                         ', '                            * Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.\r\n* 100% cotton fabrics, should not be dried with a hanger, but should be crossed across the clothesline to avoid stretch marks.                        ', 'CAP MAN ACCESSORIES'),
(64, 17, 14, '2021-10-24 13:46:19', 'MEN SOOC JEANS Pants MS 23E2614', 'jean(4)m.jpg', 'jean(5)m.jpg ', 'jean(6)m.jpg', 990000, 'Regular fit black jeans. There are 5 bags. The scale uses metal buckles and buttons, the front is torn personality. Modern black color, suitable for street fashion.<br>\r\nDenim is a cotton woven fabric in which the dyed cotton yarns are woven from 1 colored yarn and 1 white yarn. Denim fabric is extremely durable.', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.', ' Man SOOC JEANS Pants '),
(65, 17, 14, '2021-10-24 13:47:55', 'BLUE SOOC JEANS Pants MS 23E2613', 'jean(7)m.jpg', 'jean(8)m.jpg ', 'jean(9)m.jpg', 850000, 'Shiny front denim shorts. There are 5 bags. Flip bear. The scale uses metal buckles and buttons, the front is torn personality. Regular fit color and design is youthful, modern, suitable for street fashion.<br>\r\n\r\nDenim is a cotton woven fabric in which the dyed cotton yarns are woven from 1 colored yarn and 1 white yarn. Denim fabric is extremely durable.', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.', ' BLUE SOOC JEANS Pants man'),
(66, 17, 14, '2021-10-24 13:50:26', 'MEN JEANS SLIM FIT MS 25E2595.', 'jean(10)m.jpg', 'jean(11)m.jpg ', 'jean(12)m.jpg', 1090000, 'Stand up jeans. Flip bear. There are 5 bags. Bright polished front. Fasten the front with a zipper and button. Slim fit pants are a must have product in your wardrobe because of their high applicability. Fits all body proportions and transforms with nearly all your outfits.', '* Jeans should be limited to washing in the washing machine because it will fade the color of jeans. If washing, turn the product upside down when washing, buttoning, zipping, should not be washed with light colored clothes, to avoid color sticking to the products. is different.', ' MEN JEANS SLIM FIT MAN'),
(67, 18, 14, '2021-10-24 13:59:15', 'MENS BELT MS 35E2604', 'pk(1)m.webp', 'pk(2)m.webp ', 'pk(3)m.webp', 790000, 'Leather back. With metal buckle. Flexible sliding buckle with pants sizes. Easy to combine with office attire, polite. Exquisite sewing lines hidden inside, durable hard plastic rails.', '* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better. <br>\r\n* 100% cotton fabrics, should not be dried with a hanger, but should be crossed across the clothesline to avoid stretch marks.', ' MENS BELT man belt accessories'),
(68, 18, 14, '2021-10-24 14:04:03', 'MENS TIE MS 54E2563 ', 'pk(8)m.jpg', 'pk(7)m.jpg', 'pk(9)m.jpg', 770000, '                        With elegant patterns in a variety of colors, a beautiful tie will be an accessory to help men stand out full of masculinity. High quality silk material is soft and comfortable to wear.<br>\r\n\r\nCoordinate with vest to create a new fashion style, polite and formal                        ', '                            * Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.                        ', 'MENS TIE  man tie Accessories'),
(69, 17, 16, '2021-10-25 05:48:54', 'BRIDGE PANTS MS 21K1259', 'kid(m)1.jpg', 'kid(m)2.jpg ', 'kid(m)3.jpg', 205000, 'Elastic waistband shorts. There are 5 bags. Thigh length, bear folded up. Breathable raw fabric.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.\r\n\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' BRIDGE PANTS kids kid boy'),
(70, 17, 16, '2021-10-25 05:50:15', 'COLORS SOOC Pants MS 20K1205', 'kid(m)4.jpg', 'kid(m)5.jpg ', 'kid(m)6.jpg', 290000, 'Elastic waistband shorts with drawstring. Thigh length, with 2 flap pockets on both sides. Light stretch fabric.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.\r\n\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' COLORS SOOC Pants kids kid boy'),
(71, 17, 16, '2021-10-25 05:52:00', 'PLAID SHORTS PANTS MS 21K1258', 'kid(m)7.jpg', 'kid(m)8.jpg ', 'kid(m)9.jpg', 145000, 'Elastic waistband shorts. There are 5 bags. Thigh length, bear folded up. Breathable raw fabric.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' PLAID SHORTS PANTS kid kids boy'),
(72, 16, 16, '2021-10-25 05:55:10', 'T-shirt BIGGEST DREAM MS 58K1384', 'kid(m)10.jpg', 'kid(m)11.jpg ', 'kid(m)12.jpg', 420000, 'T shirt with round neck, long sleeves. Bo bear. Elasticated hemline at collar, cuffs and hem. Print on the front. Thick cotton fabric helps keep baby warm effectively.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' T shirt BIGGEST DREAM Shirt kid kids boy'),
(73, 16, 16, '2021-10-25 05:58:48', 'T shirt BIGGEST DREAM MS 58K1384', 'kid(m)13.jpg', 'kid(m)14.jpg ', 'kid(m)15.jpg', 420000, 'T shirt with round neck, long sleeves. Bo bear. Elasticated hemline at collar, cuffs and hem. Print on the front. Thick cotton fabric helps keep baby warm effectively.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' T shirt BIGGEST DREAM Shirt kid kids boy'),
(74, 18, 16, '2021-10-25 06:01:16', 'RED SPORTS SHOES  MS 52K0743', 'kid(ma)1.webp', 'kid(ma)2.webp ', 'kid(ma)3.webp', 495000, 'Product Line Accessories<br>\r\nProduct group Shoes<br>\r\nStyle Sports shoes<br>\r\nTexture Smooth<br>\r\nMaterial Other<br>', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' RED SPORTS SHOES KIDS KID BOY'),
(75, 18, 16, '2021-10-25 06:03:31', 'EMBROIDERED CAP MS 81K1263', 'kid(ma)4.webp', 'kid(ma)5.webp ', 'kid(ma)6.webp', 145000, 'Boys cap, embroidered astronaut in different colors on the front. Has an adjustable buckle<br>\r\n\r\nThe top of the cap is 7cm  long', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' EMBROIDERED CAP KID KIDS BOY'),
(76, 17, 16, '2021-10-25 06:05:39', 'FITTING SOOC Pants MS 20G1273', 'kid(n)1.jpg', 'kid(n)2.jpg ', 'kid(n)3.jpg', 390000, 'Shorts with elastic waistband with half stretch in the back. Cross landing front with button fastening. 2 large style pockets with flaps on both sides. Color durable raw fabric, keeps baby active all day.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' FITTING SOOC Pants kid kids girl'),
(77, 17, 16, '2021-10-25 06:07:05', 'FITTING SOOC Pants MS MS 20G1274', 'kid(n)4.jpg', 'kid(n)5.jpg ', 'kid(n)6.jpg', 390000, 'Shorts with elastic waistband with half stretch in the back. Cross landing front with button fastening. 2 large style pockets with flaps on both sides. Color durable raw fabric, keeps baby active all day.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' FITTING SOOC Pants kid kids girl'),
(78, 17, 16, '2021-10-25 06:08:43', 'KAKI SOOC Pants MS 20G1376', 'kid(n)7.jpg', 'kid(n)8.jpg ', 'kid(n)9.jpg', 250000, 'Faux skirt shorts. Elastic waistband. Front pleated. 1 layer raw fabric.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' KAKI SOOC Pants kid kids girl'),
(79, 16, 16, '2021-10-25 06:10:16', 'SET T shirt with polka dots MS 57G1348', 'kid(n)10.webp', 'kid(n)11.jpg ', 'kid(n)12.jpg', 540000, 'T shirt with a round neckline, short sleeves, and a small ruffle. Sleeveless shirt. The same color flared zip comes with an elastic waistband, flared shape and inner pant lining', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing. <br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' SET T shirt with polka dots kid kids girl'),
(80, 16, 16, '2021-10-25 06:12:14', 'ROUND NECK RAW SHIRT MS 16G1319 ', 'kid(n)13.jpg', 'kid(n)14.jpg ', 'kid(n)15.jpg', 420000, 'T shirt with round neck, short sleeves. Two layers of duckweed on both sides of the shoulder. Button the teardrop at the back. Hole pattern coarse fabric.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' ROUND NECK RAW SHIRT kid  kids girl'),
(81, 18, 16, '2021-10-25 06:14:28', 'KIDS COLOR SHOES MS 52G0837', 'kid(na)1.jpg', 'kid(na)2.jpg ', 'kid(na)3.jpg', 790000, 'Girls sports shoes with feminine color schemes are suitable for children to wear many different styles of fashion clothes in a dynamic and healthy style.', '* Machine washable products should only be used in gentle washing mode, medium spin and should be separated into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoid direct sunlight will easily fade, should dry clothes by drying in windy spots will keep the fabric color better', ' KIDS COLOR SHOES ACCESSORIES GIRL KID'),
(82, 18, 16, '2021-10-25 06:17:17', 'BABY GIRL BACKPACK WITH FLOWERS MS 51G0835', 'kid(na)4.webp', 'kid(na)5.webp ', 'kid(na)6.webp', 890000, 'Sew only to create accents. The two rear straps are adjustable, with a hook at the top. The front is decorated with floating flowers of the same color. Has 1 large zippered compartment.', '* Products need to be washed immediately without soaking to avoid color fading, distinguish colors and fabrics to avoid fading. Do not wash the product with strong detergents, it should be washed with diluted soap.<br>\r\n* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.', ' BABY GIRL BACKPACK WITH FLOWERS '),
(83, 16, 16, '2021-10-25 06:21:39', 'LONG Sleeve Shirt  MS 17K1035', 'kid(m)16.jpg', 'kid(m)17.jpg ', 'kid(m)18.jpg', 480000, 'German collar shirt with front buttons. Short sleeves with bears. Printed fabric with plaid effect and texture.', '* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.', ' LONG Sleeve Shirt kid kids boy'),
(84, 16, 16, '2021-10-25 06:22:59', 'PETERPAN KNOCK Shirt MS 16G1223', 'kid(n)16.jpg', 'kid(n)17.jpg ', 'kid(n)18.jpg', 480000, 'Peterpan collar shirt with ruffles. Short sleeve bear. Sleeveless shirt. Fasten with front button. Rough fabric with embossed motifs.', '* Products that can be washed by machine should only be used in gentle washing mode, medium spin and should be classified into products of the same color and type of fabric when washing.<br>\r\n* Should dry the product in a cool place, avoiding direct sunlight will easily fade, so drying clothes by drying in windy spots will keep the fabric color better.', ' PETERPAN KNOCK Shirt kid kids girl');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(16, 'SHIRT', ' Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(17, 'PANT', 'Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.            '),
(18, 'ACCESSORIES', ' Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`) VALUES
(19, 'slider number 5', 'slide-5.jpg'),
(20, 'slider number 1', 'slide-7.jpg'),
(21, 'slider number 2', 'slide-8.jpg'),
(22, 'slider number 9', 'slide-2.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
