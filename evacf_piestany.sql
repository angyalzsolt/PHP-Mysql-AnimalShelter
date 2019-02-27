-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Gép: localhost:3306
-- Létrehozás ideje: 2019. Jan 21. 11:55
-- Kiszolgáló verziója: 5.7.25
-- PHP verzió: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `evacf_piestany`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adaption`
--

CREATE TABLE `adaption` (
  `adoption_id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `kind` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `other_pets` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `kind_of_pets` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `telephone_number1` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `telephone_number2` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `fk_cat_id` int(11) DEFAULT NULL,
  `fk_dog_id` int(11) DEFAULT NULL,
  `verify` tinyint(4) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `adaption`
--

INSERT INTO `adaption` (`adoption_id`, `name`, `kind`, `address`, `email`, `other_pets`, `kind_of_pets`, `telephone_number1`, `telephone_number2`, `fk_cat_id`, `fk_dog_id`, `verify`, `req_date`) VALUES
(1, 'Lorem Ipsum', 'outside', '223', 'lorem@impsum.com', 'no', '2123', 'wq12', '2121', NULL, 107, 1, '2019-01-09 09:27:39'),
(2, 'Eva', 'inside & outside', '21334 New York', 'nico@add.com', 'yes', '1 cat', '0123456', '01234', NULL, 110, 2, '2019-01-20 14:34:57');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `annual_report`
--

CREATE TABLE `annual_report` (
  `annual_report_id` int(11) NOT NULL,
  `annual_report` text NOT NULL,
  `annual_report_name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `annual_report`
--

INSERT INTO `annual_report` (`annual_report_id`, `annual_report`, `annual_report_name`) VALUES
(19, 'ANNUAL.5c44eb9dc6f4e3.02373950.pdf', 'asASas');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `auction_bid`
--

CREATE TABLE `auction_bid` (
  `bid_id` int(11) NOT NULL,
  `nick_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `full_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `bid_price` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `bid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telephone` varchar(55) COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin,
  `fk_auction_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `auction_bid`
--

INSERT INTO `auction_bid` (`bid_id`, `nick_name`, `full_name`, `bid_price`, `email`, `address`, `bid_date`, `telephone`, `comment`, `fk_auction_product_id`) VALUES
(2, 'Heisenberg', 'Donald Duck', 400, 'john@doe.com', 'New York, Main str. 65', '2019-01-08 22:05:18', '12345666', '', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `auction_image`
--

CREATE TABLE `auction_image` (
  `auction_image_id` int(11) NOT NULL,
  `auction_product_image` text COLLATE utf8_bin NOT NULL,
  `fk_auction_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `auction_image`
--

INSERT INTO `auction_image` (`auction_image_id`, `auction_product_image`, `fk_auction_product_id`) VALUES
(1, 'AUCTIONS.5c2b9925001241.94074468.jpg', 1),
(4, 'AUCTIONS.5c34eadf72d5d9.47194429.jpg', 4),
(5, 'AUCTIONS.5c351f57eaf9d8.56493492.jpg', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `auction_product`
--

CREATE TABLE `auction_product` (
  `auction_product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `descr` text COLLATE utf8_bin NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` date NOT NULL,
  `conditionn` varchar(200) COLLATE utf8_bin NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `auction_product`
--

INSERT INTO `auction_product` (`auction_product_id`, `price`, `name`, `descr`, `post_date`, `end_date`, `conditionn`, `valid`) VALUES
(1, 99, 'dd', 'sadas', '2019-01-01 16:45:15', '2019-01-10', 'new', 0),
(4, 17, 'Mariena', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', '2019-01-08 18:24:19', '2017-10-29', 'used', 0),
(5, 66, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', '2019-01-08 22:08:12', '2021-03-03', 'new', 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cat`
--

CREATE TABLE `cat` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `born_date` date DEFAULT NULL,
  `castration` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `height` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `cat_desc` mediumtext COLLATE utf8_bin NOT NULL,
  `type` varchar(55) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `in_memoriam` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `cat`
--

INSERT INTO `cat` (`cat_id`, `cat_name`, `post_date`, `born_date`, `castration`, `height`, `weight`, `cat_desc`, `type`, `gender`, `in_memoriam`) VALUES
(20, 'Snowball', '2019-01-15 15:39:39', '2014-09-27', 'no', '45cm', '5 kg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'European shorthair', 'female', 1),
(21, 'Fluffy', '2019-01-08 20:59:51', '2015-08-28', 'yes', '34 cm', '7 kg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Persa', 'male', 1),
(22, 'Chuck', '2019-01-13 10:59:45', '2016-08-27', 'no', '27 cm', '4 kg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Cute', 'female', 2),
(23, 'Test Cat', '2019-01-08 21:02:03', '2012-06-26', 'no', '70cm', '10 kg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Very big', 'female', 1),
(24, 'NO IMAGE CAT', '2019-01-08 21:03:30', '2010-08-26', 'no', '23', '200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Novell', 'female', 1),
(32, 'Candy', '2019-01-17 17:26:10', '1999-01-16', 'no', '80 cm', '13 kg', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'european short hair', 'male', 1),
(33, 'Foxy', '2019-01-17 17:29:07', '2019-01-01', 'yes', '80 cm', '13 kg', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'red', 'female', 1),
(34, 'Kukorica', '2019-01-17 17:29:55', '2018-08-08', 'no', '30 cm', '4 kg', 'cute', 'red', 'male', 1),
(35, 'Kitty', '2019-01-17 17:30:23', '2018-11-15', 'yes', '30 cm', '4 kg', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'european short hair', 'male', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `counter`
--

CREATE TABLE `counter` (
  `counter_id` int(11) NOT NULL,
  `numberr` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `counter`
--

INSERT INTO `counter` (`counter_id`, `numberr`) VALUES
(1, 436);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `dog`
--

CREATE TABLE `dog` (
  `dog_id` int(5) NOT NULL,
  `dog_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `born_date` date DEFAULT NULL,
  `castration` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `height` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dog_desc` mediumtext COLLATE utf8_bin NOT NULL,
  `type` varchar(55) COLLATE utf8_bin NOT NULL,
  `gender` varchar(10) COLLATE utf8_bin NOT NULL,
  `in_memoriam` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `dog`
--

INSERT INTO `dog` (`dog_id`, `dog_name`, `post_date`, `born_date`, `castration`, `height`, `weight`, `dog_desc`, `type`, `gender`, `in_memoriam`) VALUES
(103, 'Wolfi', '2019-01-08 21:07:30', '2019-01-09', 'no', '200 cm', '30 kg', 'Random text\' with \"some \'con\'tent', 'market', 'female', 1),
(104, 'Boby', '2019-01-08 21:56:49', '2018-09-04', 'no', '80 cm', '13 kg', 'Lorem ipsum ,john doe', 'mexican', 'male', 2),
(107, 'Johnny', '2019-01-08 21:04:35', '2014-09-27', 'no', '100 cm', '23 kg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'German sheperd ', 'male', 1),
(110, 'Bownie', '2019-01-15 21:29:48', '2017-10-29', 'no', '23', '200', 'test desc', 'Novell', 'female', 1),
(124, 'Xara', '2019-01-16 10:39:04', '2017-01-07', 'no', '30 cm', '8,35 kg', 'MladÃ¡ fenka sa pohybovala viac ako tÃ½Å¾deÅˆ v obci DolnÃ½ chotÃ¡r a zaÄiatkom roka dokonca porodila Å¡teniatka. Boli vonku a hrozilo, Å¾e zamrznÃº, nÃ¡lezca hÄ¾adal pre ne pomoc na FB. Zohnali sme hneÄ ochotnÃ½ch Ä¾udÃ­ na prevoz, ktorÃ½m veÄ¾mi Äakujeme a fenka je uÅ¾ v bezpeÄÃ­ u nÃ¡s aj so Å¡teniatkami. MajÃº len 8 dnÃ­, z toho 4 psÃ­kovia a 1 sleÄna, eÅ¡te sÃº slepÃ© a mamina je veÄ¾mi dobruÄkÃ¡, doslova malÃ½ poklad.  Å teniatka rastÃº ako z vody, otvorili oÄkÃ¡ a Xara je skvelÃ¡ a veÄ¾mi starostlivÃ¡ mamina. ', 'KrÃ­Å¾enec hrubosrstÃ©ho jazveÄÃ­ka', 'female', 1),
(128, 'Moon', '2019-01-17 17:21:24', '2001-01-02', 'yes', '80 cm', '30 kg', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'Labrador', 'male', 1),
(129, 'Wallie', '2019-01-17 17:23:05', '2010-01-10', 'no', '200 cm', '30 kg', 'nice', 'Black', 'female', 1),
(130, 'Rain', '2019-01-17 17:24:37', '2002-01-27', 'yes', '80 cm', '30 kg', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'wolf', 'male', 1),
(131, 'Test Dog', '2019-01-17 18:52:00', '2018-11-30', 'no', '100', '200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'vitara', 'female', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eshop`
--

CREATE TABLE `eshop` (
  `eshop_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `conditionn` varchar(40) COLLATE utf8_bin NOT NULL,
  `quantityy` int(11) NOT NULL,
  `product_type` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `eshop`
--

INSERT INTO `eshop` (`eshop_id`, `name`, `price`, `description`, `post_date`, `conditionn`, `quantityy`, `product_type`) VALUES
(3, 'dd', 99, 'heavy metal', '2018-12-29 13:25:42', 'used', 1, 'cloth 45cm'),
(5, 'cake', 99, 'heavy metal', '2019-01-02 14:52:48', 'new', 1, 'cloth 35cm');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eshop_customer`
--

CREATE TABLE `eshop_customer` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `address` varchar(155) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(100) COLLATE utf8_bin NOT NULL,
  `fk_eshop_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `status` varchar(55) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `eshop_customer`
--

INSERT INTO `eshop_customer` (`customer_id`, `full_name`, `email`, `address`, `telephone`, `fk_eshop_id`, `comment`, `status`) VALUES
(16, 'asdasd', 'vbhnjkml@ho.bo', 'hgj', '34567', 5, 'gfhj 6', 'in progress'),
(17, 'Kenobi', 'vbhnjkml@ho.bo', 'hgj', '34567', 3, 'gfhj 6', 'in progress'),
(18, 'Kenobi', 'vbhnjkml@ho.bo', 'hgj', '34567', 3, 'gfhj 6', 'waiting'),
(19, 'asdasd', 'vbhnjkml@ho.bo', 'hgj', '34567', 3, 'gfhj 6', 'waiting'),
(20, 'asdasd', 'vbhnjkml@ho.bo', 'hgj', '34567', 5, 'gfhj 6', 'waiting');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eshop_image`
--

CREATE TABLE `eshop_image` (
  `eshop_image_id` int(11) NOT NULL,
  `eshop_image` text COLLATE utf8_bin NOT NULL,
  `fk_eshop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `eshop_image`
--

INSERT INTO `eshop_image` (`eshop_image_id`, `eshop_image`, `fk_eshop_id`) VALUES
(3, 'ESHOP.5c2775d9d37f27.82095650.jpg', 3),
(5, 'ESHOP.5c2cd0479b03f4.84905167.jpg', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `how_adopt`
--

CREATE TABLE `how_adopt` (
  `how_adopt_id` int(11) NOT NULL,
  `adopt_title` varchar(200) COLLATE utf8_bin NOT NULL,
  `adopt_text` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `how_adopt`
--

INSERT INTO `how_adopt` (`how_adopt_id`, `adopt_title`, `adopt_text`) VALUES
(1, 'About Adoptions', 'Adopting a puppy can be exciting. You are choosing a new companion for many years to come. Before adopting a puppy, pick a breed or type of dog that works for your lifestyle. Then, visit a variety of shelters to find a reputable shelter in your price range. After you\'ve completed the adoption, you can bring your new companion home.\r\n\r\nThink about your household members. If you have small kids in your house, you need to take this into consideration when selecting a puppy. If you don\'t have kids, think about yourself and other housemates and your activity level and schedule. Some dog breeds require less time and attention than others.[1]\r\nChildren under the age of 7 generally don\'t do well with puppies under 5 months. This is because children of this age do not understand boundaries and may handle a puppy aggressively, causing biting. Puppies, especially smaller puppies, can also be harmed if a child handles them too roughly.\r\nThink about who will primarily take care of the dog. Make sure that person is willing and able to care for a puppy. If you\'re caring for the puppy yourself, make sure you have the time and energy for training. If a spouse, child, or other household member will be taking care of the puppy, make sure they are ready for the time commitment.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `how_support`
--

CREATE TABLE `how_support` (
  `how_support_id` int(11) NOT NULL,
  `support_title` varchar(200) COLLATE utf8_bin NOT NULL,
  `support_text` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `how_support`
--

INSERT INTO `how_support` (`how_support_id`, `support_title`, `support_text`) VALUES
(1, 'About supporting', 'Supporting a puppy can be exciting. You are choosing a new companion for many years to come. Before supporting a puppy, pick a breed or type of dog that works for your lifestyle. Then, visit a variety of shelters to find a reputable shelter in your price range. After you\'ve completed the supportion, you can bring your new companion home.\r\n\r\nThink about your household members. If you have small kids in your house, you need to take this into consideration when selecting a puppy. If you don\'t have kids, think about yourself and other housemates and your activity level and schedule. Some dog breeds require less time and attention than others.[1] Children under the age of 7 generally don\'t do well with puppies under 5 months. This is because children of this age do not understand boundaries and may handle a puppy aggressively, causing biting. Puppies, especially smaller puppies, can also be harmed if a child handles them too roughly. Think about who will primarily take care of the dog. Make sure that person is willing and able to care for a puppy. If you\'re caring for the puppy yourself, make sure you have the time and energy for training. If a spouse, child, or other household member will be taking care of the puppy, make sure they are ready for the time commitment.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `image_cat`
--

CREATE TABLE `image_cat` (
  `image_cat_id` int(5) NOT NULL,
  `image_cat` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `fk_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `image_cat`
--

INSERT INTO `image_cat` (`image_cat_id`, `image_cat`, `fk_cat_id`) VALUES
(28, 'CAT.5c350f1f52de87.88144713.jpg', 20),
(29, 'CAT.5c350f1f7f42c8.28466447.jpg', 20),
(30, 'CAT.5c350f1fadaeb4.21861466.jpg', 20),
(31, 'CAT.5c350f60889865.48939072.jpg', 21),
(32, 'CAT.5c350f60b43464.76376974.jpg', 21),
(33, 'CAT.5c350fa52e8494.46621074.jpg', 22),
(34, 'CAT.5c350fa5582b39.54367511.jpg', 22),
(35, 'CAT.5c350fe80a2738.53060300.jpg', 23),
(36, 'CAT.5c350fe8315459.98140516.jpg', 23),
(47, 'CAT.5c40bb5424c426.04250232.jpg', 32),
(48, 'CAT.5c40bb542583e5.92290436.jpg', 32),
(49, 'CAT.5c40bb7d74f604.98049554.jpg', 33),
(50, 'CAT.5c40bb9deb6ce3.94389506.jpg', 34);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `image_dog`
--

CREATE TABLE `image_dog` (
  `image_dog_id` int(11) NOT NULL,
  `image_dog` varchar(1500) COLLATE utf8_bin NOT NULL,
  `fk_dog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `image_dog`
--

INSERT INTO `image_dog` (`image_dog_id`, `image_dog`, `fk_dog_id`) VALUES
(188, 'DOG.5c2b90a9aa42c0.05097965.jpg', 103),
(190, 'DOG.5c2fb1eed28c02.25284373.jpg', 104),
(191, 'DOG.5c2fb1ef01dd49.11786436.jpg', 104),
(195, 'DOG.5c35107e95cf39.63030033.jpg', 107),
(196, 'DOG.5c35107ebfa0c4.24108007.jpg', 107),
(198, 'DOG.5c3b1a85a4dde1.54782604.jpg', 110),
(199, 'DOG.5c3b1a85f18903.03528758.jpg', 110),
(210, 'DOG.5c3f09eb7825f2.02126826.jpg', 124),
(211, 'DOG.5c3f09eb78a152.01853865.jpg', 124),
(212, 'DOG.5c3f09eb794387.65377968.jpg', 124),
(217, 'DOG.5c40b9ceb2f710.98461664.jpg', 128),
(218, 'DOG.5c40b9ceb3d559.19228000.jpg', 128),
(219, 'DOG.5c40ba220e1eb5.89214630.jpg', 129),
(220, 'DOG.5c40ba220edee6.90527274.jpg', 129),
(221, 'DOG.5c40ba7432e7f4.78437126.jpg', 130),
(222, 'DOG.5c40ba743688a0.20909735.jpg', 130),
(224, 'DOG.5c40ceb6a19a55.60850571.jpg', 103),
(225, 'DOG.5c40cefdb7d398.11043621.jpg', 131),
(226, 'DOG.5c40cf8a6c2cf8.06969295.jpg', 131);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `main_image_cat`
--

CREATE TABLE `main_image_cat` (
  `main_image_id` int(11) NOT NULL,
  `main_image` varchar(1500) COLLATE utf8_bin NOT NULL,
  `fk_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `main_image_cat`
--

INSERT INTO `main_image_cat` (`main_image_id`, `main_image`, `fk_cat_id`) VALUES
(17, 'CAT.5c350f06ea30d9.02697527.jpg', 20),
(18, 'CAT.5c350f512f9ca5.77578997.jpg', 21),
(19, 'CAT.5c350f95cf9f94.51296083.jpg', 22),
(20, 'CAT.5c350fda643140.14447236.jpg', 23),
(26, 'CAT.5c40bb4393a227.26468104.jpg', 32),
(27, 'CAT.5c40bb6ac44d66.68531947.jpg', 33),
(28, 'CAT.5c40bb990a8d25.54194114.jpg', 34),
(29, 'CAT.5c40bbbe7f7890.94633987.jpg', 35);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `main_image_dog`
--

CREATE TABLE `main_image_dog` (
  `main_image_id` int(11) NOT NULL,
  `main_image_dog` varchar(1500) COLLATE utf8_bin NOT NULL,
  `fk_dog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `main_image_dog`
--

INSERT INTO `main_image_dog` (`main_image_id`, `main_image_dog`, `fk_dog_id`) VALUES
(142, 'DOG.5c2b909c009a13.53334483.jpg', 103),
(143, 'DOG.5c2fb1e7b21d12.22675332.jpg', 104),
(146, 'DOG.5c35106d226bc8.07492145.jpg', 107),
(148, 'DOG.5c3b1a5f7cf174.86189602.jpg', 110),
(162, 'DOG.5c3f09d33755f7.64006479.jpg', 124),
(166, 'DOG.5c40b9c2072396.89378242.jpg', 128),
(167, 'DOG.5c40ba0ba465f9.13555171.jpg', 129),
(168, 'DOG.5c40ba682244f0.22535919.jpg', 130);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mission`
--

CREATE TABLE `mission` (
  `mission_id` int(11) NOT NULL,
  `mission_title` varchar(200) COLLATE utf8_bin NOT NULL,
  `mission_text` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `mission`
--

INSERT INTO `mission` (`mission_id`, `mission_title`, `mission_text`) VALUES
(1, 'O nÃ¡s', '<br>Ãštulok v PieÅ¡Å¥anoch vznikol v roku 1999 ako reakcia na nepriaznivÃº situÃ¡ciu v tomto meste, kedy bolo s tÃºlavÃ½mi zvieratami zaobchÃ¡dzanÃ© nehumÃ¡nne a vÃ¤ÄÅ¡ina z nich bola zabÃ­janÃ¡. Rozhodli sme sa, Å¾e takto to nemÃ´Å¾e zostaÅ¥, veÄ kaÅ¾dÃ½ Å¾ivÃ½ tvor mÃ¡ nÃ¡rok na Å¾ivot!<br>\r\n<br>\r\nPreto sme zaÄali \"bojovaÅ¥\" za ich prÃ¡va. ZÃ­skali sme prvÃ½ch sponzorov, podporu mesta, informovali sme prostrednÃ­ctvom lokÃ¡lnych mÃ©diÃ­ obyvateÄ¾ov mesta, zaÄali sme s vÃ½stavbou ... pomaly sa to rozbehlo.<br>\r\nCieÄ¾om je nÃ¡jdenie novÃ©ho, dobrÃ©ho domova pre tÃ½ch, Äo sÃº na ulici a dosiahnutie zodpovednÃ©ho prÃ­stupu majiteÄ¾ov zvierat â€“ aby Ãºtulky jednÃ©ho dÅˆa neboli potrebnÃ©. Nebolo a ani to nie je Ä¾ahkÃ©, denne sa stretÃ¡vame so skoro nerieÅ¡iteÄ¾nÃ½mi problÃ©mami, ale tieÅ¾ s oddanou vÄakou zvierat a pomocnÃ½mi rukami tÃ½ch, Äo chcÃº pomÃ¡haÅ¥ rovnako ako my â€“ pridajte sa k nÃ¡m !<br>'),
(2, 'Ako nÃ¡m pomÃ´cÅ¥?', '<br>ZvieratÃ¡ skutoÄne potrebujÃº pomoc nÃ¡s vÅ¡etkÃ½ch. Bez podpory verejnosti by organizÃ¡cie akou je aj nÃ¡Å¡ Ãštulok pre zvieratÃ¡ neboli schopnÃ© pracovaÅ¥. PomÃ´Å¾te preto aj vy! Aj keÄ sa necÃ­tite materiÃ¡lne bohatÃ½, iste si vyberiete z moÅ¾nostÃ­ ako podporiÅ¥ zÃ¡chranu zvierat:<br>\r\n<br><br><br>\r\n- prispejte vecnÃ½m darom<br>\r\n- prispejte finanÄne<br>\r\n- prispejte bezplatnou sluÅ¾bou<br>\r\n- aktivista<br>\r\n<br>\r\nIste doma alebo v prÃ¡ci nÃ¡jdete veci, ktorÃ© uÅ¾ nepotrebujete, alebo sa ich dokÃ¡Å¾ete vzdaÅ¥. Darujte nÃ¡m ich! Potrebujeme najmÃ¤: krmivo pre zvieratÃ¡, vodÃ­tka, obojky, Äistiace a dezinfekÄnÃ© prostriedky, lieky pre zvieratÃ¡, metly, lopaty, vedrÃ¡, handry, stavebnÃ½ materiÃ¡l na dobudovanie Ãºtulku, pracovnÃ© obleÄenie, rukavice, kancelÃ¡rske potreby â€“ perÃ¡, obÃ¡lky, papier, fixky, farby ...\r\n<br>\r\nVÃ¡Å¡ dar bude prijatÃ½ s veÄ¾kou vÄakou. Peniaze budÃº pouÅ¾itÃ© na ÄinnosÅ¥ a prevÃ¡dzku Ãºtulku RegionÃ¡lneho centra Slobody zvierat PieÅ¡Å¥any. PrispieÅ¥ mÃ´Å¾ete prostrednÃ­ctvom poÅ¡tovej poukÃ¡Å¾ky na nÃ¡Å¡ ÃºÄet v Tatra banke : IBAN SK5011000000002926886043 alebo priamo cez PayPal na utulok@utulok-piestany.sk. FinanÄnÃ½ dar nÃ¡m mÃ´Å¾ete darovaÅ¥ aj osobne, prÃ­padne mÃ´Å¾ete prispieÅ¥ na konkrÃ©tnu vec (vÃ½stavba koterca, lieÄenie konkrÃ©tneho psÃ­ka, ...) PrispieÅ¥ mÃ´Å¾ete aj v rÃ¡mci darovania 2% z dane (aktuÃ¡lne tlaÄivo na stiahnutie bÃ½va umiestnenÃ© na hlavnej strÃ¡nke v obdobÃ­ odovzdÃ¡vania daÅˆovÃ½ch priznanÃ­).<br>\r\n<br>\r\nAk ste majiteÄ¾om firmy, alebo odbornÃ­k na niektorÃº z nasledujÃºcich Äi inÃ½ch oblastÃ­, vyuÅ¾ite to na poskytnutie bezplatnej prÃ¡ce v prospech zvierat v Ãºtulku!<br>\r\n<br>\r\nPotrebujeme pomoc pri:<br>\r\n- stavebnÃ© prÃ¡ce pri dobudovanÃ­ Ãºtulku<br>\r\n- stolÃ¡rske prÃ¡ce<br>\r\n- zvÃ¡raÄskÃ© prÃ¡ce<br>\r\n- zÃ¡hradnÃ­cke prÃ¡ce<br>\r\n- grafickÃ© prÃ¡ce a tlaÄ informaÄnÃ½ch materiÃ¡lov<br>\r\n- oprava auta<br>\r\n<br>\r\nAk ste z PieÅ¡Å¥an alebo blÃ­zkeho okolia â€“ staÅˆte sa aktivistom, ÄiÅ¾e Älovekom, ktorÃ½ vo svojom voÄ¾nom Äase dobrovoÄ¾ne a neziÅ¡tne pomÃ¡ha vo vÅ¡etkÃ½ch oblastiach Äinnosti organizÃ¡cie â€“ Äo predstavuje naprÃ­klad pomoc v Ãºtulku â€“ venÄenie psÃ­kov, pomoc pri akciÃ¡ch, hÄ¾adanie sponzorov, kontroly adoptovanÃ½ch psÃ­kov, doÄasnÃº opateru chorÃ½ch zvierat a Å¡teniatok v rÃ¡mci PieÅ¡Å¥an, prednÃ¡Å¡ky na ZÅ ... UÅ¾ teraz sa teÅ¡Ã­me na naÅ¡u spoloÄnÃº prÃ¡cu pre zÃ¡chranu zvierat!<br>\r\n<br>\r\nV prÃ­pade zÃ¡ujmu nÃ¡s mÃ´Å¾ete kontaktovaÅ¥ na utulok@utulok-piestany.sk. ');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `place`
--

CREATE TABLE `place` (
  `place_id` int(5) NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `place`
--

INSERT INTO `place` (`place_id`, `url`) VALUES
(29, 'SHELTER.5c3f0dd07d5357.27820806.jpg'),
(30, 'SHELTER.5c3f0dd07e4905.15864481.jpg'),
(31, 'SHELTER.5c3f0dd07f9960.18825450.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reports`
--

CREATE TABLE `reports` (
  `reports_id` int(5) NOT NULL,
  `reports_date` date DEFAULT NULL,
  `reports_descriptions` mediumtext COLLATE utf8_bin,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `keywords` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `reports`
--

INSERT INTO `reports` (`reports_id`, `reports_date`, `reports_descriptions`, `name`, `keywords`) VALUES
(14, '2018-12-20', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.', 'First Report', 'first report 2018'),
(16, '2018-12-14', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', 'Second Report', 'second report 2018 Second Report dog cat'),
(17, '2018-12-28', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Gamef Thrones', 'angyal'),
(18, '2018-12-08', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Test Report', 'report december '),
(19, '2018-12-20', 'Lorem  is   \'ipsum this \'is a test  ', '\'This is a \"long try', 'key words report'),
(21, '2016-09-10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Test Report', 'zsolt angyal'),
(22, '2019-01-01', 'ZdravÃ­, lÃ¡sku, pohodu a kapiÄku Å¡tÄ›stÃ­ VÃ¡m i VaÅ¡im chrÃ¡nÄ›ncÅ¯m. Pejsci aÅ¥ najdou co nejdÅ™Ã­ve novÃ© domovy a hodnÃ© rodiny, kteÅ™Ã­ je budou tak milovat, jako my naÅ¡eho EdÃ­ka a Dorotku.', 'FoxÃ­k-EdÃ­k pozdravuje', 'foxik, edik'),
(23, '2019-01-19', 'test test', 'testing', 'asd assad DS'),
(24, '2019-01-29', 'heavy metal', 'About Supporting', 'asd assad DS'),
(25, '2019-01-12', 'heavy metal', 'About Supporting', 'asd assad DS'),
(26, '2019-01-12', 'TEST EDIT', 'What we do?', 'asd assad DS'),
(27, '2019-01-12', 'heavy metal', 'About Supporting', 'asd assad DS'),
(28, '2017-10-29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus', 'Lord of the Rings', 'test'),
(29, '2019-01-15', 'heavy metal', 'About Supporting', 'heavy'),
(30, '2019-01-01', 'ZdravÃ­, lÃ¡sku, pohodu a kapiÄku Å¡tÄ›stÃ­ VÃ¡m i VaÅ¡im chrÃ¡nÄ›ncÅ¯m.   Pejsci aÅ¥ najdou co nejdÅ™Ã­ve novÃ© domovy a hodnÃ© rodiny, kteÅ™Ã­ je budou tak milovat, jako my naÅ¡eho EdÃ­ka a Dorotku', 'FoxÃ­k-EdÃ­k pozdravuje', 'foxik, edik, foxterier');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `reports_image`
--

CREATE TABLE `reports_image` (
  `reports_image_id` int(11) NOT NULL,
  `reports_image` text COLLATE utf8_bin NOT NULL,
  `fk_reports_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `reports_image`
--

INSERT INTO `reports_image` (`reports_image_id`, `reports_image`, `fk_reports_id`) VALUES
(5, 'REPORTS.5c1b9d6b819024.48984077.jpg', 14),
(7, 'REPORTS.5c1e583c0c1780.60036225.jpg', 16),
(8, 'REPORTS.5c1f5b92772643.32718467.jpg', 17),
(9, 'REPORTS.5c23edde4421a8.29779197.png', 18),
(10, 'REPORTS.5c260b100b93c6.55639463.jpg', 19),
(12, 'REPORTS.5c3512ccc90ba7.05482912.jpg', 21),
(13, 'REPORTS.5c3e20ad9aa622.35814476.jpg', 24),
(14, 'REPORTS.5c3e52f5eeb9e3.34893129.jpg', 27),
(15, 'REPORTS.5c3e5363a22fc7.27220283.png', 28),
(16, 'REPORTS.5c3e53d56a5f25.58505971.jpg', 29),
(17, 'REPORTS.5c3f0d5bc43610.36565317.jpg', 30);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsors_id` int(5) NOT NULL,
  `sponsors_address` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `sponsors_email` text COLLATE utf8_bin NOT NULL,
  `sponsors_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `sponsors`
--

INSERT INTO `sponsors` (`sponsors_id`, `sponsors_address`, `sponsors_email`, `sponsors_name`) VALUES
(21, 'Kettenbrueckengasse 23 / 2 / 12, 1050 Wien', 'test@email.com', 'Sponsor One'),
(23, 'New York, Main str. 65', 'angyal.zsolt@hotmail.hu', 'Mariena'),
(24, 'Test City, test street', 'angyal.zsolt@hotmail.hu', 'Mariena'),
(26, 'New York, Main str. 65', 'lorem@ipsum.com', 'John Doe'),
(28, 'Brighton, UK', 'dsfds', 'tesco');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sponsors_image`
--

CREATE TABLE `sponsors_image` (
  `sponsors_image_id` int(11) NOT NULL,
  `sponsors_image` varchar(350) COLLATE utf8_bin NOT NULL,
  `fk_sponsors_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `sponsors_image`
--

INSERT INTO `sponsors_image` (`sponsors_image_id`, `sponsors_image`, `fk_sponsors_id`) VALUES
(2, 'SPONSOR.5c23ea2e1128a1.99787328.jpg', 21),
(4, 'SPONSOR.5c34e0df5e39e7.02385685.jpg', 23),
(5, 'SPONSOR.5c34e8482fdc44.42055784.jpg', 24),
(7, 'SPONSOR.5c35127ab291c3.38023323.jpg', 26),
(8, 'SPONSOR.5c3dff9a11efc7.48099155.png', 28);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `supporter`
--

CREATE TABLE `supporter` (
  `supporter_id` int(5) NOT NULL,
  `city` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `street` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `zip` int(10) DEFAULT NULL,
  `tel` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(55) COLLATE utf8_bin NOT NULL,
  `fk_cat_id` int(11) DEFAULT NULL,
  `fk_dog_id` int(11) DEFAULT NULL,
  `verify` tinyint(4) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `supporter`
--

INSERT INTO `supporter` (`supporter_id`, `city`, `street`, `zip`, `tel`, `email`, `name`, `fk_cat_id`, `fk_dog_id`, `verify`, `req_date`) VALUES
(8, 'Szombathely', 'Ernuszt Kelemen 48', 15, '+3620 48 231214', 'john@doe.com', 'Lorem Ipsum', 20, NULL, 2, '2019-01-09 10:28:35'),
(9, 'Szombathely', 'sdvsdvdvs', 19, '1203213123', 'ahadfsd@sdfk.com', 'JOzsef', 21, NULL, 2, '2019-01-09 11:22:05');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `team`
--

CREATE TABLE `team` (
  `team_id` int(5) NOT NULL,
  `name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `position` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `team`
--

INSERT INTO `team` (`team_id`, `name`, `position`, `description`) VALUES
(4, 'Team Member1', 'Leader', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus'),
(5, 'Team Member2', 'Trainer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus'),
(8, 'Lorem Ipsum', 'Director', 'Lor\'em i\"psu\"m;SELECT * FROM dog do//;lor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus'),
(9, 'Test Team', 'King of universe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque et nunc dolor. Aenean nec aliquam urna. Integer purus mauris, viverra eu erat quis, aliquet iaculis augue. Etiam id nunc risus. Sed accumsan ultricies ligula ut porta. Sed ornare sollicitudin lacus et congue. Proin luctus mi at nunc ultrices porttitor. Fusce metus metus, vehicula at porttitor vulputate, finibus at risus'),
(10, 'eva', 'actor', 'Lorem ipsum dolor sit amet, eu mundi ornatus scaevola cum, autem incorrupte ne duo. Eos dicant munere ex. Solet iracundia in vim, ne vis porro equidem gubergren, no mei errem utinam. Modus nullam graeco ei vis, latine consectetuer et mei. Ad denique electram vim, in purto magna iuvaret nam.  Sit odio option fabulas at. Ad vis mundi postulant dignissim. Per in sonet delicata, vix te vidit atqui repudiandae. Offendit noluisse persecuti no ius, has zril salutatus imperdiet ex. Legimus atomorum mediocrem eu sed.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `team_image`
--

CREATE TABLE `team_image` (
  `team_image_id` int(11) NOT NULL,
  `team_image` text COLLATE utf8_bin NOT NULL,
  `fk_team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `team_image`
--

INSERT INTO `team_image` (`team_image_id`, `team_image`, `fk_team_id`) VALUES
(2, 'TEAM.5c23e9655940f5.52794592.png', 4),
(3, 'TEAM.5c23e98ea93c31.98951018.jpg', 5),
(6, 'TEAM.5c35117ab59d65.01022089.png', 8),
(7, 'TEAM.5c3511aacf2000.01332406.jpg', 9),
(8, 'TEAM.5c3f2c39d9ae21.30144587.jpg', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `users_id` int(5) NOT NULL,
  `users_email` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `users_name` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `users_pass` longtext COLLATE utf8_bin,
  `users_role` varchar(25) COLLATE utf8_bin DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`users_id`, `users_email`, `users_name`, `users_pass`, `users_role`) VALUES
(1, 'test@test.com', 'testtest', '$2y$10$ysVuzgRwMl85toBd8tOsF.boovkPaIwdcIKxSkbxWybQ6lopwQVKW', '1'),
(5, 'eva@eva.hu', 'eva', '$2y$10$2/eI/E3e0uDXpCw/XtJm7.oMBd9UgbghbCVnh5ohzj8mshCvG4./C', '0'),
(6, 'adam@adam.hu', 'adam', '$2y$10$IGsVtCbYIV7Xk9g5//8GqecVFCRiVvctIY.XM7kHQZbb.6cFXMWFu', '0'),
(7, 'john@doe.com', 'test User2', '$2y$10$cLrFb3xa1YNIJs9n61L.juHdP8qhMQ0QUdCRQ2O9m2u5PRW1QRGHm', '0');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `videos`
--

INSERT INTO `videos` (`video_id`, `url`, `title`) VALUES
(1, '8j741TUIET0', 'test'),
(2, '0-7IHOXkiV8', 'test2');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `visitors`
--

CREATE TABLE `visitors` (
  `ip_id` int(11) NOT NULL,
  `ip_address` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- A tábla adatainak kiíratása `visitors`
--

INSERT INTO `visitors` (`ip_id`, `ip_address`) VALUES
(1, '::1'),
(2, '54:54:54'),
(3, '1');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adaption`
--
ALTER TABLE `adaption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `fk_cat_id` (`fk_cat_id`),
  ADD KEY `fk_dog_id` (`fk_dog_id`);

--
-- A tábla indexei `annual_report`
--
ALTER TABLE `annual_report`
  ADD PRIMARY KEY (`annual_report_id`);

--
-- A tábla indexei `auction_bid`
--
ALTER TABLE `auction_bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `fk_auction_product_id` (`fk_auction_product_id`);

--
-- A tábla indexei `auction_image`
--
ALTER TABLE `auction_image`
  ADD PRIMARY KEY (`auction_image_id`),
  ADD KEY `fk_auction_product_id` (`fk_auction_product_id`);

--
-- A tábla indexei `auction_product`
--
ALTER TABLE `auction_product`
  ADD PRIMARY KEY (`auction_product_id`);

--
-- A tábla indexei `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- A tábla indexei `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`counter_id`);

--
-- A tábla indexei `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`dog_id`);

--
-- A tábla indexei `eshop`
--
ALTER TABLE `eshop`
  ADD PRIMARY KEY (`eshop_id`);

--
-- A tábla indexei `eshop_customer`
--
ALTER TABLE `eshop_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_eshop_id` (`fk_eshop_id`);

--
-- A tábla indexei `eshop_image`
--
ALTER TABLE `eshop_image`
  ADD PRIMARY KEY (`eshop_image_id`),
  ADD KEY `fk_eshop_id` (`fk_eshop_id`);

--
-- A tábla indexei `how_adopt`
--
ALTER TABLE `how_adopt`
  ADD PRIMARY KEY (`how_adopt_id`);

--
-- A tábla indexei `how_support`
--
ALTER TABLE `how_support`
  ADD PRIMARY KEY (`how_support_id`);

--
-- A tábla indexei `image_cat`
--
ALTER TABLE `image_cat`
  ADD PRIMARY KEY (`image_cat_id`),
  ADD KEY `fk_cat_id` (`fk_cat_id`);

--
-- A tábla indexei `image_dog`
--
ALTER TABLE `image_dog`
  ADD PRIMARY KEY (`image_dog_id`),
  ADD KEY `fk_dog_id` (`fk_dog_id`);

--
-- A tábla indexei `main_image_cat`
--
ALTER TABLE `main_image_cat`
  ADD PRIMARY KEY (`main_image_id`),
  ADD KEY `fk_cat_id` (`fk_cat_id`);

--
-- A tábla indexei `main_image_dog`
--
ALTER TABLE `main_image_dog`
  ADD PRIMARY KEY (`main_image_id`),
  ADD KEY `fk_dog_id` (`fk_dog_id`);

--
-- A tábla indexei `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`mission_id`);

--
-- A tábla indexei `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`place_id`);

--
-- A tábla indexei `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reports_id`);

--
-- A tábla indexei `reports_image`
--
ALTER TABLE `reports_image`
  ADD PRIMARY KEY (`reports_image_id`),
  ADD KEY `fk_reports_id` (`fk_reports_id`);

--
-- A tábla indexei `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsors_id`);

--
-- A tábla indexei `sponsors_image`
--
ALTER TABLE `sponsors_image`
  ADD PRIMARY KEY (`sponsors_image_id`),
  ADD KEY `fk_sponsors_id` (`fk_sponsors_id`);

--
-- A tábla indexei `supporter`
--
ALTER TABLE `supporter`
  ADD PRIMARY KEY (`supporter_id`),
  ADD KEY `fk_cat_id` (`fk_cat_id`),
  ADD KEY `fk_dog_id` (`fk_dog_id`),
  ADD KEY `fk_cat_id_2` (`fk_cat_id`);

--
-- A tábla indexei `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- A tábla indexei `team_image`
--
ALTER TABLE `team_image`
  ADD PRIMARY KEY (`team_image_id`),
  ADD KEY `fk_team_id` (`fk_team_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- A tábla indexei `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- A tábla indexei `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`ip_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adaption`
--
ALTER TABLE `adaption`
  MODIFY `adoption_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `annual_report`
--
ALTER TABLE `annual_report`
  MODIFY `annual_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT a táblához `auction_bid`
--
ALTER TABLE `auction_bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `auction_image`
--
ALTER TABLE `auction_image`
  MODIFY `auction_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `auction_product`
--
ALTER TABLE `auction_product`
  MODIFY `auction_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `cat`
--
ALTER TABLE `cat`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT a táblához `counter`
--
ALTER TABLE `counter`
  MODIFY `counter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `dog`
--
ALTER TABLE `dog`
  MODIFY `dog_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT a táblához `eshop`
--
ALTER TABLE `eshop`
  MODIFY `eshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `eshop_customer`
--
ALTER TABLE `eshop_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `eshop_image`
--
ALTER TABLE `eshop_image`
  MODIFY `eshop_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `how_adopt`
--
ALTER TABLE `how_adopt`
  MODIFY `how_adopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `how_support`
--
ALTER TABLE `how_support`
  MODIFY `how_support_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT a táblához `image_cat`
--
ALTER TABLE `image_cat`
  MODIFY `image_cat_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT a táblához `image_dog`
--
ALTER TABLE `image_dog`
  MODIFY `image_dog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT a táblához `main_image_cat`
--
ALTER TABLE `main_image_cat`
  MODIFY `main_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `main_image_dog`
--
ALTER TABLE `main_image_dog`
  MODIFY `main_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT a táblához `mission`
--
ALTER TABLE `mission`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `place`
--
ALTER TABLE `place`
  MODIFY `place_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `reports`
--
ALTER TABLE `reports`
  MODIFY `reports_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT a táblához `reports_image`
--
ALTER TABLE `reports_image`
  MODIFY `reports_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsors_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT a táblához `sponsors_image`
--
ALTER TABLE `sponsors_image`
  MODIFY `sponsors_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `supporter`
--
ALTER TABLE `supporter`
  MODIFY `supporter_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT a táblához `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `team_image`
--
ALTER TABLE `team_image`
  MODIFY `team_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `visitors`
--
ALTER TABLE `visitors`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `adaption`
--
ALTER TABLE `adaption`
  ADD CONSTRAINT `adaption_ibfk_1` FOREIGN KEY (`fk_cat_id`) REFERENCES `cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `adaption_ibfk_2` FOREIGN KEY (`fk_dog_id`) REFERENCES `dog` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `auction_bid`
--
ALTER TABLE `auction_bid`
  ADD CONSTRAINT `auction_bid_ibfk_1` FOREIGN KEY (`fk_auction_product_id`) REFERENCES `auction_product` (`auction_product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `auction_image`
--
ALTER TABLE `auction_image`
  ADD CONSTRAINT `auction_image_ibfk_1` FOREIGN KEY (`fk_auction_product_id`) REFERENCES `auction_product` (`auction_product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `eshop_customer`
--
ALTER TABLE `eshop_customer`
  ADD CONSTRAINT `eshop_customer_ibfk_1` FOREIGN KEY (`fk_eshop_id`) REFERENCES `eshop` (`eshop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `eshop_image`
--
ALTER TABLE `eshop_image`
  ADD CONSTRAINT `eshop_image_ibfk_1` FOREIGN KEY (`fk_eshop_id`) REFERENCES `eshop` (`eshop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `image_cat`
--
ALTER TABLE `image_cat`
  ADD CONSTRAINT `image_cat_ibfk_1` FOREIGN KEY (`fk_cat_id`) REFERENCES `cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `image_dog`
--
ALTER TABLE `image_dog`
  ADD CONSTRAINT `image_dog_ibfk_1` FOREIGN KEY (`fk_dog_id`) REFERENCES `dog` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `main_image_cat`
--
ALTER TABLE `main_image_cat`
  ADD CONSTRAINT `main_image_cat_ibfk_1` FOREIGN KEY (`fk_cat_id`) REFERENCES `cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `main_image_dog`
--
ALTER TABLE `main_image_dog`
  ADD CONSTRAINT `main_image_dog_ibfk_1` FOREIGN KEY (`fk_dog_id`) REFERENCES `dog` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `reports_image`
--
ALTER TABLE `reports_image`
  ADD CONSTRAINT `reports_image_ibfk_1` FOREIGN KEY (`fk_reports_id`) REFERENCES `reports` (`reports_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `sponsors_image`
--
ALTER TABLE `sponsors_image`
  ADD CONSTRAINT `sponsors_image_ibfk_1` FOREIGN KEY (`fk_sponsors_id`) REFERENCES `sponsors` (`sponsors_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `supporter`
--
ALTER TABLE `supporter`
  ADD CONSTRAINT `supporter_ibfk_1` FOREIGN KEY (`fk_dog_id`) REFERENCES `dog` (`dog_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supporter_ibfk_2` FOREIGN KEY (`fk_cat_id`) REFERENCES `cat` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `team_image`
--
ALTER TABLE `team_image`
  ADD CONSTRAINT `team_image_ibfk_1` FOREIGN KEY (`fk_team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
