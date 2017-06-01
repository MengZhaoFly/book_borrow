-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-01-05 09:26:25
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- 表的结构 `adminreplay`
--

CREATE TABLE `adminreplay` (
  `name` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `adminreplay`
--

INSERT INTO `adminreplay` (`name`, `date`, `msg`) VALUES
('test1', '2017-01-04', '好的 会更新'),
('test1', '2017-01-04', 'ok,thank for your tips'),
('test4', '2017-01-06', 'thank'),
('test4', '2017-01-28', 'also sjakjfda'),
('test5', '2017-01-12', 'ok okok '),
('test6', '2017-01-06', '你的回复也很好'),
('test1', '0000-00-00', 'jiba');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(20) NOT NULL,
  `publish` varchar(10) DEFAULT NULL,
  `author` varchar(10) NOT NULL,
  `press` varchar(10) DEFAULT NULL,
  `publish_at` date DEFAULT NULL,
  `price` double NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`b_id`, `b_name`, `publish`, `author`, `press`, `publish_at`, `price`, `number`) VALUES
(1, 'java从入门到放弃', 'sb110', '李广', '弥明出版社', '2016-12-24', 56.99, 9),
(2, '软件工程', 'ecit110', '匿名', '匿名出版社', '2016-12-24', 50, 29),
(4, '安卓应用程序设计', 'msn199', '飞蛾', '机械工业出版社', '2016-12-17', 20, 2),
(8, 'UNIX初级教程', 'msn23', 'Mani SB', '电子工业出版社', '2016-12-24', 50, 27),
(9, '数据库从删库到跑路', 'sql55', 'JSON', '人民邮电出版社', '2016-12-24', 30, 9),
(10, '高等数学', 'high', '乐欣', '同级大学出版社', '2016-12-24', 30, 18),
(12, 'JEE程序设计', 'no.111', '李玉', '李玉出版社', '2017-01-21', 33, 27),
(13, 'c++ primer plus', 'c++', 'TOM', '人民邮电出版社', '2017-01-19', 44, 23),
(14, 'Javascript高级程序', 'JS111', '(Nicholas ', '电子工业出版社', '2017-01-20', 99, 30),
(15, 'AJax技术', 'ajax1', '赵猛', '赵猛出版社', '2017-01-06', 45, 1),
(16, '大学英语', 'tom1', 'tom', 'tom出版社', '2017-01-20', 45, 2);

-- --------------------------------------------------------

--
-- 表的结构 `list`
--

CREATE TABLE `list` (
  `uname` varchar(10) NOT NULL,
  `b_id` int(30) NOT NULL,
  `begin` date NOT NULL,
  `end` date NOT NULL,
  `rest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `list`
--

INSERT INTO `list` (`uname`, `b_id`, `begin`, `end`, `rest`) VALUES
('test5', 10, '2017-01-04', '2017-03-11', 66),
('test10', 1, '2017-01-04', '2017-01-13', 9),
('test10', 4, '2017-01-04', '2017-02-18', 45),
('test1', 1, '2017-01-05', '2017-01-12', 7),
('test1', 15, '2017-01-05', '2017-02-18', 44),
('test1', 16, '2017-01-05', '2017-01-20', 15),
('test1', 12, '2017-01-05', '2017-02-26', 52),
('test1', 9, '2017-01-05', '2017-01-14', 9);

-- --------------------------------------------------------

--
-- 表的结构 `msg`
--

CREATE TABLE `msg` (
  `u_name` varchar(10) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `msg`
--

INSERT INTO `msg` (`u_name`, `msg`) VALUES
('test1', 'I am tom,thanks for your book,'),
('test1', '书本太少了'),
('test2', 'thank you'),
('test4', 'OK\n'),
('test4', 'thank your support'),
('test5', 'oh'),
('test6', '你的书太好了 谢谢'),
('test10', 'gccjhh');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `u_name` varchar(10) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `sex` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`u_name`, `pwd`, `email`, `sex`) VALUES
('test1', '5a105e8b9d40e1329780d62ea2265d8a', 'sjakd@qq.com', '1'),
('test10', 'c1a8e059bfd1e911cf10b626340c9a54', 'dodidl@qq.com', '1'),
('test2', 'ad0234829205b9033196ba818f7a872b', 'sjasj@qq.com', '0'),
('test4', '86985e105f79b95d6bc918fb45ec7727', '', '1'),
('test5', 'd7180e8e853deba5a8715c242be711a3', '', '1'),
('test6', 'zmzm', '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminreplay`
--
ALTER TABLE `adminreplay`
  ADD KEY `name` (`name`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD KEY `b_id` (`b_id`),
  ADD KEY `b_id_2` (`b_id`),
  ADD KEY `list_u_name` (`uname`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD KEY `u_name` (`u_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- 限制导出的表
--

--
-- 限制表 `adminreplay`
--
ALTER TABLE `adminreplay`
  ADD CONSTRAINT `admin_replay` FOREIGN KEY (`name`) REFERENCES `user` (`u_name`);

--
-- 限制表 `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_b_id` FOREIGN KEY (`b_id`) REFERENCES `book` (`b_id`),
  ADD CONSTRAINT `list_u_name` FOREIGN KEY (`uname`) REFERENCES `user` (`u_name`);

--
-- 限制表 `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `mag_name` FOREIGN KEY (`u_name`) REFERENCES `user` (`u_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
