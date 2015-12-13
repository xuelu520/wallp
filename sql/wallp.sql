-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-12-13 12:10:48
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='壁纸表' AUTO_INCREMENT=20 ;

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
(19, 1, '/1/b017b405208efa24c7f34f54e0ef26c4.jpg', 1449845965, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COMMENT='套图表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wgroup`
--

INSERT INTO `wgroup` (`id`, `name`, `create_time`, `status`, `admin_uid`, `admin_name`) VALUES
(1, '主页巨无霸轮播', 1449851776, 1, 1, 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `wg_items`
--

CREATE TABLE IF NOT EXISTS `wg_items` (
  `wg_id` int(11) NOT NULL COMMENT '套图ID',
  `wall_id` int(11) NOT NULL COMMENT '壁纸ID',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '有效状态：1-有效，0-无效',
  KEY `wg_id` (`wg_id`,`wall_id`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='套图对应壁纸';

--
-- 转存表中的数据 `wg_items`
--

INSERT INTO `wg_items` (`wg_id`, `wall_id`, `status`) VALUES
(1, 11, 1),
(1, 12, 1),
(1, 13, 1),
(1, 14, 1),
(1, 15, 1),
(1, 16, 1),
(1, 17, 1),
(1, 18, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
