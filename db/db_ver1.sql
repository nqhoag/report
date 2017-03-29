-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 12:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ver1`
--

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20170329082122, 'Initial', '2017-03-29 01:21:22', '2017-03-29 01:21:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL COMMENT 'mã báo cáo',
  `school_id` int(11) NOT NULL,
  `phienbanbaocao` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phiên bản báo cáo',
  `solop` int(11) NOT NULL COMMENT 'tổng số lớp học của trường',
  `hocsinhnam` int(11) NOT NULL COMMENT 'số học sinh nam',
  `hocsinhnu` int(11) NOT NULL COMMENT 'số học sinh nữ',
  `dansotrongdotuoi` int(11) NOT NULL COMMENT 'dân số trong độ tuổi',
  `hocsinhmienhocphi` int(11) NOT NULL COMMENT 'sô hs đươc miễn học phí',
  `sotienmien` int(11) NOT NULL COMMENT 'tổng số tiền miễn học phí',
  `hocsinhgiamhocphi` int(11) NOT NULL COMMENT 'số hs được giảm học phí',
  `sotiengiam` int(11) NOT NULL COMMENT 'tổng số tiền giảm học phí',
  `hocsinhnhanhocbong` int(11) NOT NULL COMMENT 'số hs nhận học bổng',
  `sotiennhanhocbong` int(11) NOT NULL COMMENT 'tổng số tiền trao học bổng',
  `hocsinhgiam` int(11) NOT NULL COMMENT 'số lượng học sinh giảm so với đầu năm học',
  `lydogiam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lý do giảm',
  `hocsinhbohoc` int(11) NOT NULL COMMENT 'số học sinh bỏ học',
  `lydobo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'lý do bỏ học',
  `bohocnu` int(11) NOT NULL COMMENT 'học sinh nữ bỏ học',
  `bohocdantoc` int(11) NOT NULL COMMENT 'học sinh dân tộc bỏ học',
  `hocsinhluuban` int(11) NOT NULL COMMENT 'hs lưu ban',
  `hocsinhluubannu` int(11) NOT NULL COMMENT 'hs lưu ban nữ',
  `hocsinhluubandantoc` int(11) NOT NULL COMMENT 'hs lưu ban dân tộc',
  `hsduthitotnghiep` int(11) NOT NULL COMMENT 'hs dự thi tốt nghiệp',
  `hstotnghiep` int(11) NOT NULL COMMENT 'hs được tốt nghiệp',
  `hstotnghiepkhagioi` int(11) NOT NULL COMMENT 'hs tốt nghiệp khá giỏi',
  `conhanchamsocdtlsvh` tinyint(1) NOT NULL COMMENT 'có nhận chăm sóc di tích lịch sử, văn hóa tại địa phương ?',
  `tendtlsvh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên di tích lịch sử, văn hóa tại địa phương được trường nhận chăm sóc',
  `diachidtlsvh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ di tích lịch sử, văn hóa được đơn vị nhận chăm sóc',
  `ghichudtlsvh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chu di tích lịch sử, văn hóa được đơn vị nhận chăm sóc',
  `cointernet` int(11) NOT NULL COMMENT 'có internet ?',
  `nhamang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `congnghe` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caphoc` int(11) NOT NULL COMMENT '0: mẫu giáo, mầm non. 1: cấp 1. 2: cấp 2. 3: cấp 3. 4: bổ túc , GDTX',
  `loaitruong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namthanhlap` int(4) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `ten`, `diachi`, `caphoc`, `loaitruong`, `namthanhlap`, `email`, `sodienthoai`) VALUES
(1, 'Hoàn mĩ', '123 nguyễn tất thành ', 0, 'Mầm non ', 1990, 'hoanmi@mn.edu.vn', '01648761166');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'mã báo cáo';
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
