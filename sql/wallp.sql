-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-19 20:07:42
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wallp`
--

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `username` varchar(100) NOT NULL COMMENT '用户名',
  `pwd` varchar(100) NOT NULL COMMENT '密码',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态：1-有效，2-无效',
  PRIMARY KEY (`id`),
  KEY `username` (`username`,`pwd`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `username`, `pwd`, `create_time`, `status`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1447487000, 1);

-- --------------------------------------------------------

--
-- 表的结构 `walls`
--

CREATE TABLE IF NOT EXISTS `walls` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `url` varchar(255) NOT NULL COMMENT '图片地址',
  `create_time` int(11) NOT NULL COMMENT '上传时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态：1-正常，0-失效',
  `category` int(11) NOT NULL DEFAULT '0' COMMENT '壁纸类型',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`create_time`,`status`,`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='壁纸表' AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `walls`
--

INSERT INTO `walls` (`id`, `uid`, `url`, `create_time`, `status`, `category`) VALUES
(2, 1, '/1/601679ab977b6eeb485b3d271b75fb61.jpg', 1448646740, 1, 0),
(3, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1448647308, 1, 0),
(4, 1, '/1/40a87bb88bf724eb6f872029793dad99.jpg', 1448647498, 1, 0),
(5, 1, '/1/a1959e85c0752ac55fe0e32725a482ee.jpg', 1448647890, 1, 0),
(6, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1448648020, 1, 0),
(7, 1, '/1/499bc4b7dd19fe6cbadf70a5b328af5a.jpg', 1449845877, 1, 0),
(8, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1449845879, 1, 0),
(9, 1, '/1/40a87bb88bf724eb6f872029793dad99.jpg', 1449845882, 1, 0),
(10, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1449845891, 1, 0),
(11, 1, '/1/5cf4d35656406090a51080a93ef7fe3d.jpg', 1449845894, 1, 0),
(12, 1, '/1/1352c1d71b032a60f6bfab5a600d330b.jpg', 1449845901, 1, 0),
(13, 1, '/1/bf9db004c2fd5d2ec57a804fca9ab0a0.jpg', 1449845909, 1, 0),
(14, 1, '/1/acd88036882c391d3817464f8f70fdc7.jpg', 1449845910, 1, 0),
(15, 1, '/1/e805ba533d6a3a6aa4a41b0ce2a1fa99.jpg', 1449845934, 1, 0),
(16, 1, '/1/82140f82fe294b26ab2a84ac082d4e03.jpg', 1449845959, 1, 0),
(17, 1, '/1/32f96867b582d257fe5fc143b7a2078c.jpg', 1449845960, 1, 0),
(18, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1449845962, 1, 0),
(19, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1449845965, 1, 0),
(20, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1450104946, 1, 0),
(21, 1, '/1/499bc4b7dd19fe6cbadf70a5b328af5a.jpg', 1450104947, 1, 0),
(22, 1, '/1/40a87bb88bf724eb6f872029793dad99.jpg', 1450105004, 1, 0),
(23, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1450105006, 1, 0),
(24, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1450105152, 1, 0),
(25, 1, '/1/32f96867b582d257fe5fc143b7a2078c.jpg', 1450105153, 1, 0),
(26, 1, '/1/5d84ad7e84acc54bda679602b7b3e820.jpg', 1450105154, 1, 0),
(27, 1, '/1/32f96867b582d257fe5fc143b7a2078c.jpg', 1450105355, 1, 0),
(28, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1450105356, 1, 0),
(29, 1, '/1/acd88036882c391d3817464f8f70fdc7.jpg', 1450105356, 1, 0),
(30, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1450105417, 1, 0),
(31, 1, '/1/40a87bb88bf724eb6f872029793dad99.jpg', 1450105418, 1, 0),
(32, 1, '/1/7bafd65376656911296e0069cedfea90.jpg', 1450106144, 1, 0),
(33, 1, '/1/a1959e85c0752ac55fe0e32725a482ee.jpg', 1450106146, 1, 0),
(34, 1, '/1/a1959e85c0752ac55fe0e32725a482ee.jpg', 1450107896, 1, 0),
(35, 1, '/1/40a87bb88bf724eb6f872029793dad99.jpg', 1450107896, 1, 0),
(36, 1, '/1/5cf4d35656406090a51080a93ef7fe3d.jpg', 1450530190, 1, 0),
(37, 1, '/1/8f78966ec5a0c6be6781a125b3bcf225.jpg', 1450530194, 1, 0),
(38, 1, '/1/1352c1d71b032a60f6bfab5a600d330b.jpg', 1450530197, 1, 0),
(39, 1, '/1/ad1b456ed204bec87401fced0dd6f94c.jpg', 1450530203, 1, 0),
(40, 1, '/1/0238ea0c024392c3cc8537b9f1f68871.jpg', 1450530206, 1, 0),
(41, 1, '/1/4f96a54038c5477f398181de2e8f7c5d.jpg', 1450531465, 1, 0),
(42, 1, '/1/3bf7ae43b8839e79d4866ee47b3da0bf.jpeg', 1450531573, 1, 0),
(43, 1, '/1/48cd0714fbd13cde0fb1557efaf74d00.jpg', 1450531579, 1, 0),
(44, 1, '/1/a279eaaebfb2fe0903637e77eccbc5aa.jpg', 1450531674, 1, 0),
(45, 1, '/1/3606b6be5394493feb06587968345e41.jpg', 1450531676, 1, 0),
(46, 1, '/1/cce702292b0e2f7688bb9be69cb0fae9.jpg', 1450531678, 1, 0),
(48, 1, '/1/947ebc1e004300c2d4bcadfc5afcd0c8.jpg', 1450531682, 1, 0),
(49, 1, '/1/003545f83f2ca8fcea66f8fb3e0d0083.jpg', 1450531685, 1, 0),
(50, 1, '/1/ad8847a7f41e65faa66665aad88da694.jpg', 1450531689, 1, 0),
(51, 1, '/1/4ada889739cd60ec945f91c48a38cf37.jpg', 1450531692, 1, 0),
(52, 1, '/1/ebe283ea7c5617ce7ae9beeb22a68b64.jpg', 1450531693, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wg_items`
--

CREATE TABLE IF NOT EXISTS `wg_items` (
  `wg_id` int(11) NOT NULL COMMENT '套图ID',
  `wall_id` int(11) NOT NULL COMMENT '壁纸ID',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '有效状态：1-有效，0-无效',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `wg_id` (`wg_id`,`wall_id`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='套图对应壁纸' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `wg_items`
--

INSERT INTO `wg_items` (`wg_id`, `wall_id`, `status`, `id`) VALUES
(1, 46, 1, 1),
(1, 48, 1, 2),
(1, 49, 1, 3),
(1, 50, 1, 4),
(1, 51, 1, 5),
(1, 52, 1, 6);

-- --------------------------------------------------------

--
-- 表的结构 `wgroup`
--

CREATE TABLE IF NOT EXISTS `wgroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(255) NOT NULL COMMENT '套图名称',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '有效状态：0-无效，1-有效',
  `admin_uid` int(11) NOT NULL COMMENT '管理员ID',
  `admin_name` varchar(255) NOT NULL COMMENT '管理员名称',
  PRIMARY KEY (`id`),
  KEY `admin_uid` (`admin_uid`,`admin_name`(191))
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COMMENT='套图表' AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `wgroup`
--

INSERT INTO `wgroup` (`id`, `name`, `create_time`, `status`, `admin_uid`, `admin_name`) VALUES
(1, '主页巨无霸轮播', 1449851776, 1, 1, 'admin'),
(2, '首页主栏目1', 1450360178, 1, 1, 'admin'),
(3, '首页主栏目2', 1450360231, 1, 1, 'admin'),
(4, '首页主栏目3', 1450360292, 1, 1, 'admin'),
(5, '首页主栏目4', 1450360341, 0, 1, 'admin'),
(6, '首页主栏目5', 1450360388, 1, 1, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
