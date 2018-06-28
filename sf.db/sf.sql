-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2018 at 06:28 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.2.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sf`
--
CREATE DATABASE IF NOT EXISTS `sf` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sf`;

-- --------------------------------------------------------

--
-- Table structure for table `finishedgood`
--

CREATE TABLE `finishedgood` (
  `finishedGoodID` varchar(256) NOT NULL,
  `finishedGoodType` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finishedgood`
--

INSERT INTO `finishedgood` (`finishedGoodID`, `finishedGoodType`) VALUES
('CHC-142', '鑄鐵塗模劑'),
('CML-105', '鑄鋼鋯基塗模劑'),
('CML-105A', '鑄鋼鋯基塗模劑'),
('CML-105CB', '鑄鋼鋯基塗模劑'),
('CML-105G', '鑄鋼鋯基塗模劑'),
('CML-205', '鑄鋼鋯基塗模劑'),
('CML-3000', '鑄鋼鋯基塗模劑'),
('CML-3000G', '鑄鋼鋯基塗模劑'),
('CML-3000L', '鑄鋼鋯基塗模劑'),
('CML-3000M1', '鑄鋼鋯基塗模劑'),
('CML-3000TC', '鑄鋼鋯基塗模劑'),
('CML-381', '塗模劑'),
('CMP-A', '砂心修補膏'),
('CMP-B', '砂心修補膏'),
('CMP-C', '砂心修補膏'),
('CMP-D', '砂心修補膏'),
('CMP-E', '砂心修補膏'),
('DF-920T', '呋喃樹脂'),
('DYP-56', '鑄鐵塗模劑'),
('DYP-62', '鑄鐵塗模劑'),
('EP-824', '水性塗模劑'),
('EP-824A', '水性塗模劑'),
('EW-1005', '消失模塗模劑'),
('EW-1005T', '消失模塗模劑'),
('EW-424', '糰狀水性保麗龍塗模劑'),
('EW-424J', '糰狀水性保麗龍塗模劑'),
('EW-424Q', '糰狀水性保麗龍塗模劑'),
('EW-510', '塗模劑'),
('FL-125', '酒精性塗模劑'),
('FL-70', '鑄鐵砂模模劑'),
('FL-70G', '鑄鐵砂模模劑'),
('ISM-300', '酒精性鋯基塗模劑'),
('ISM-340', '酒精性鋯基塗模劑'),
('ISM-860', '防硫塗模劑'),
('ISM-860A', '防滲硫塗模劑'),
('ISM-860B', '防滲硫塗模劑'),
('LBX-28', '鑄鋁潤滑劑'),
('LBX-3', '耐高溫潤滑劑'),
('LBX-83', '鑄鋁潤滑劑'),
('MC-25', '砂模塗劑原膠'),
('MC-50', '塗模劑'),
('MC-688', '鑄鐵砂模塗劑'),
('MK-110', '塗模劑'),
('MK-820B', '鑄鐵塗模劑'),
('MOP-58', '高錳鋼塗模劑'),
('R-45', '鋁用被覆劑'),
('SEP-105', '離型液'),
('SEP-105A', '離型液'),
('SEP-105C', '離型液'),
('SEP-717', '離型液'),
('SIY-28', '潤滑劑'),
('SIY-28E', '潤滑劑'),
('SIY-28L', '潤滑劑'),
('SIY-28S', '石墨棒'),
('SPC-47', '木模用離型劑'),
('STR-565', '鑄鐵消失模塗模劑'),
('SW-1', '鑄鐵塗模劑'),
('SW-1005', '鑄鐵塗模劑'),
('SW-1005A', '塗模劑'),
('SW-1005S', '鑄鐵塗模劑'),
('SW-1005TC', '鑄鐵塗模劑'),
('SW-1112', '鑄鐵塗模劑'),
('SW-1112A', '鑄鐵塗模劑'),
('SW-1112G', '鑄鐵塗模劑'),
('SW-1230', '鑄鐵塗模劑'),
('SW-1230KY', '鑄鐵塗模劑'),
('SW-1230P', '鑄鐵塗模劑'),
('SW-129', '塗模劑'),
('SW-1650', '塗模劑'),
('SW-1650A', '塗模劑'),
('SW-1650A1', '塗模劑'),
('SW-202P', '塗模劑'),
('SW-202PA', '塗模劑'),
('SW-202PB', '塗模劑'),
('SW-202PC', '塗模劑'),
('SW-202PD', '塗模劑'),
('SW-230', '鑄鐵塗模劑'),
('SW-279R', '鑄鐵塗模劑'),
('SW-305G', '塗模劑'),
('SW-305T3', '塗模劑'),
('SW-313', '塗模劑'),
('SW-325', '鑄鋼消失模塗模劑'),
('SW-327', '鑄鐵塗模劑'),
('SW-331GA', '鑄鐵塗模劑'),
('SW-503', '塗模劑'),
('SW-506', '塗模劑'),
('SW-519', '鑄鋼塗模劑'),
('SW-519N', '塗模劑'),
('SW-526', '鑄鐵塗模劑'),
('SW-526A', '鑄鐵塗模劑'),
('SW-565', '鑄鐵消失模塗模劑'),
('SW-58', '高錳鋼塗模劑'),
('SW-701', '鑄鐵塗模劑'),
('SW-708', '鑄鐵塗模劑'),
('SW-721', '鑄鐵塗模劑'),
('SW-726', '鑄鐵塗模劑'),
('SW-728', '塗模劑'),
('SW-808', '鑄鐵塗模劑'),
('SW-808A', '鑄鐵塗模劑'),
('SW-808A-Y', '鑄鐵塗模劑'),
('SW-808G1', '塗模劑'),
('SW-808GS', '塗模劑'),
('SW-812', '塗模劑'),
('SW-821A', '塗模劑'),
('SW-821B', '鑄鐵塗模劑'),
('SW-828C', '鑄鐵塗模劑'),
('SW-912', '鑄鐵塗模劑'),
('SW-912C', '鑄鐵塗模劑'),
('SW-912M', '鑄鐵塗模劑'),
('TG-6010', '呋喃樹脂'),
('TG-6010S', '呋喃樹脂'),
('TG-6015', '呋喃樹脂'),
('TG-6020', '呋喃樹脂'),
('TG-6020ABC', '呋喃樹脂'),
('TG-6020S', '呋喃樹脂'),
('TG-6020S1', '呋喃樹脂'),
('TG-6030', '呋喃樹脂'),
('TG-6030ABC', '呋喃樹脂'),
('TG-6040', '呋喃樹脂'),
('TG-6040ABC', '呋喃樹脂'),
('TG-6050', '呋喃樹脂'),
('TG-6050ABC', '呋喃樹脂'),
('TG-6060', '呋喃樹脂'),
('TG-7010', '綠色呋喃樹脂'),
('TG-7015', '綠色呋喃樹脂'),
('TG-7020', '綠色呋喃樹脂'),
('TG-7020B', '綠色呋喃樹脂'),
('TG-7020S', '綠色呋喃樹脂'),
('TG-7020S1', '綠色呋喃樹脂'),
('TG-7030', '綠色呋喃樹脂'),
('TG-7030B', '綠色呋喃樹脂'),
('TG-7030B-1', '綠色呋喃樹脂'),
('TG-7030YJF', '綠色呋喃樹脂'),
('TG-7030YJF-A', '綠色呋喃樹脂'),
('TG-7031YJF-1', '綠色呋喃樹脂'),
('TG-7031YJF-B', '綠色呋喃樹脂'),
('TG-7032YJF1', '綠色呋喃樹脂'),
('TG-7040', '綠色呋喃樹脂'),
('TNO-327', '鑄鐵塗模劑'),
('TNO-701', '鑄鐵塗模劑'),
('TNO-726', '鑄鐵塗模劑'),
('TNO-808A', '鑄鐵塗模劑'),
('TNO-912', '鑄鐵塗模劑'),
('TP-160', '水性鋯基塗模劑'),
('TP-327', '水性糰狀鋯基塗模劑'),
('TP-327P', '水性鋯基塗模劑(糊狀)'),
('TP-384', '水性鋯基塗模劑'),
('TP-824', '水性糰狀塗模劑'),
('TP-831', '水性鋯基塗模劑'),
('TP160A', '水性鋯基塗模劑'),
('　SW-305', '鑄鐵塗模劑');

-- --------------------------------------------------------

--
-- Table structure for table `finishedgoodentry`
--

CREATE TABLE `finishedgoodentry` (
  `finishedGoodEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `packaging` int(16) UNSIGNED NOT NULL,
  `status` varchar(256) NOT NULL,
  `expectedStoredArea` varchar(8) NOT NULL,
  `expectedStoredDate` date NOT NULL,
  `palletNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `expectedStoredPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `expectedStoredWeight` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `notEnteredPalletNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `notEnteredPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finishedgoodinwarehouse`
--

CREATE TABLE `finishedgoodinwarehouse` (
  `storedFinishedGoodID` int(16) UNSIGNED NOT NULL,
  `finishedGoodEntry` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `packagingID` int(16) UNSIGNED NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `storedDate` datetime NOT NULL,
  `storedPalletNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `storedPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `storedWeight` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `remainingPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finishedgoodoutwarehouse`
--

CREATE TABLE `finishedgoodoutwarehouse` (
  `takenOutFinishedGoodID` int(16) UNSIGNED NOT NULL,
  `inWarehouseID` int(16) UNSIGNED NOT NULL,
  `finishedGoodRequisition` varchar(256) NOT NULL,
  `takenOutArea` varchar(8) NOT NULL,
  `takenOutDate` datetime NOT NULL,
  `takingOutDepartment` varchar(256) NOT NULL,
  `takingOutMember` varchar(256) NOT NULL,
  `takenOutPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `finishedgoodpackaging`
--

CREATE TABLE `finishedgoodpackaging` (
  `finishedGoodPackagingID` int(16) UNSIGNED NOT NULL,
  `product` varchar(256) NOT NULL,
  `packaging` varchar(256) NOT NULL,
  `unitWeight` int(16) UNSIGNED NOT NULL,
  `packageNumberOfPallet` int(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finishedgoodpackaging`
--

INSERT INTO `finishedgoodpackaging` (`finishedGoodPackagingID`, `product`, `packaging`, `unitWeight`, `packageNumberOfPallet`) VALUES
(1, 'DF-920T', '小桶', 230, 4),
(2, 'DF-920T', '噸桶', 1000, 1),
(3, 'SIY-28', '大桶', 15, 30),
(4, 'SIY-28', '大桶', 150, 4),
(5, 'SIY-28', '小桶', 15, 24),
(6, 'SIY-28S', '小桶', 25, 30),
(7, 'SIY-28S', '小桶', 25, 24),
(8, 'SIY-28L', '小桶', 15, 30),
(9, 'SIY-28L', '小桶', 15, 24);

-- --------------------------------------------------------

--
-- Table structure for table `finishedgoodrequisition`
--

CREATE TABLE `finishedgoodrequisition` (
  `finishedGoodRequisitionID` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `packagingID` int(16) UNSIGNED NOT NULL,
  `requisitioningDate` date NOT NULL,
  `requisitioningDepartment` varchar(256) NOT NULL,
  `requisitioningMember` varchar(256) NOT NULL,
  `requisitionedPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `notOutPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `materialID` varchar(256) NOT NULL,
  `materialName` varchar(256) NOT NULL,
  `totalPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `totalWeight` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `totalMoney` int(16) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`materialID`, `materialName`, `totalPackageNumber`, `totalWeight`, `totalMoney`) VALUES
('006', '硫酸鋁', 0, 0, 0),
('007', '檸檬酸', 0, 0, 0),
('011', '水玻璃', 0, 0, 0),
('012A', '輕鹼', 0, 0, 0),
('012B', '重鹼', 0, 0, 0),
('013A', '精鹽', 0, 0, 0),
('014A', '氯化鉀(白)', 0, 0, 0),
('014B', '氯化鉀(紅)', 0, 0, 0),
('015A', '芒硝(進口)', 0, 0, 0),
('017A', '氟化鈉', 0, 0, 0),
('018', '碳酸鈣', 0, 0, 0),
('019', '硝酸鉀', 0, 0, 0),
('023', '流平劑 CSL-7001', 0, 0, 0),
('027', '平光粉 SILMAT1200', 0, 0, 0),
('092', '磷酸', 0, 0, 0),
('097', '福馬林', 0, 0, 0),
('111', '矽酸膠液', 0, 0, 0),
('112', '胺', 0, 0, 0),
('113', '尿素膠', 0, 0, 0),
('113A', '尿素膠#555', 0, 0, 0),
('114', '偶聯劑 NCSA-2120', 0, 0, 0),
('115', '尿素', 0, 0, 0),
('117', '醋酸(調)', 0, 0, 0),
('128', '淀粉', 0, 0, 0),
('129', '矽酸鈣', 0, 0, 0),
('150', '矽酸鎂鋁Attagel-50', 0, 0, 0),
('153A', '氧化?空心球#100', 0, 0, 0),
('168', '白碳黑EH-5', 0, 0, 0),
('200', '松子油', 0, 0, 0),
('202', '蠟石粉', 0, 0, 0),
('208', '硬脂酸鎂', 0, 0, 0),
('209', '硬脂酸鋁', 0, 0, 0),
('212', '硬脂酸', 0, 0, 0),
('213', '蓖麻油', 0, 0, 0),
('214', '煤油', 0, 0, 0),
('215', '鐵屑', 0, 0, 0),
('216', '煉鋼促進劑', 0, 0, 0),
('216A', '煉鋼促進劑', 0, 0, 0),
('216C', '煉鋼促進劑', 0, 0, 0),
('216F', '煉鋼促進劑', 0, 0, 0),
('217', '鋁粉', 0, 0, 0),
('217A', '進口鋁粉', 0, 0, 0),
('217C', '金屬鋁80~120目', 0, 0, 0),
('219A', '二甲苯', 0, 0, 0),
('228A', '漂珠', 0, 0, 0),
('228B', '漂珠50目', 0, 0, 0),
('320', '機油(R-90)', 0, 0, 0),
('321', '碳化矽', 0, 0, 0),
('321A', '碳化矽(20~80MM)', 0, 0, 0),
('322A', '三杯脂', 0, 0, 0),
('322B', '獅牌牛油', 0, 0, 0),
('323', '白雲石粉', 0, 0, 0),
('324', '螢石粉', 0, 0, 0),
('325B', '氟矽酸鈉', 0, 0, 0),
('331', '珍珠岩粉', 0, 0, 0),
('332', '焦炭粉', 0, 0, 0),
('340', '搖變助劑 S1500', 0, 0, 0),
('420', '乙醇', 0, 0, 0),
('430', '木精', 0, 0, 0),
('431A', '滑石粉', 0, 0, 0),
('432', '馬來粉', 0, 0, 0),
('432A', '莫來石35S', 0, 0, 0),
('432B', '藍晶石#20', 0, 0, 0),
('433C', '鋯粉200mesh', 0, 0, 0),
('433D', '鋯粉325mesh', 0, 0, 0),
('434A', '磷狀黑鉛(細)-385', 0, 0, 0),
('434B', '磷狀黑鉛(粗)-185', 0, 0, 0),
('434C', '膨脹石墨', 0, 0, 0),
('435', '土狀黑鉛', 0, 0, 0),
('435B', '土狀黑鉛(填充組)', 0, 0, 0),
('436', '球狀瀝青', 0, 0, 0),
('437A', '葡萄糖粉', 0, 0, 0),
('439A', '氧化鐵', 0, 0, 0),
('439B', '黃色氧化鐵', 0, 0, 0),
('439C', '圓型黑氧化鐵FineOx 270', 0, 0, 0),
('439D', '圓型黑氧化鐵Sphere Ox200', 0, 0, 0),
('507', '水性PU壓克力樹脂', 0, 0, 0),
('508', 'K-90水溶液(PVP)', 0, 0, 0),
('513', '磷酸三丁酯', 0, 0, 0),
('540-3', '矽砂30MM', 0, 0, 0),
('540-4', '4號矽砂', 0, 0, 0),
('542', '雲母粉', 0, 0, 0),
('543', '氟化鋁', 0, 0, 0),
('544G', '日本粘土', 0, 0, 0),
('545', '硝酸鈉', 0, 0, 0),
('546', '冰晶石粉', 0, 0, 0),
('546B', '冰晶石粉(保溫套)', 0, 0, 0),
('548', '二氧化錳', 0, 0, 0),
('549', '氟矽化鉀', 0, 0, 0),
('551', '氟鋁酸鉀', 0, 0, 0),
('650', '碳酸鉀', 0, 0, 0),
('651', '氯化鎂', 0, 0, 0),
('654A', '鍛燒氧化鋁', 0, 0, 0),
('654AB', '鍛燒氧化鋁200M', 0, 0, 0),
('654B', '高鋁粉325MESH', 0, 0, 0),
('654C', '高鋁粉200MESH', 0, 0, 0),
('654H', '棕剛玉', 0, 0, 0),
('655', '硫鉬滑脂', 0, 0, 0),
('657', '657高嶺土', 0, 0, 0),
('657A', '657A高嶺土', 0, 0, 0),
('657B', '高嶺土PK-100', 0, 0, 0),
('658', '美國粘土', 0, 0, 0),
('659', '659矽鐵粒', 0, 0, 0),
('659C', '659C矽鐵粉', 0, 0, 0),
('660', '硅粉', 0, 0, 0),
('760A', '氧化鎂(進)', 0, 0, 0),
('760B', '氧化鎂(本)', 0, 0, 0),
('765', '石英粉 特A101', 0, 0, 0),
('765B', '石英粉 10T', 0, 0, 0),
('766A', '糊精', 0, 0, 0),
('767A', '粉狀樹脂PVP(K90)', 0, 0, 0),
('767B', '酚醛樹脂(進)', 0, 0, 0),
('767C', '鹼性酚醛樹脂', 0, 0, 0),
('767D', '低水液體酚醛樹脂', 0, 0, 0),
('767F', '液體酚醛樹脂', 0, 0, 0),
('767T', '酚醛樹脂(台)', 0, 0, 0),
('768', '松香', 0, 0, 0),
('769', '銀漿', 0, 0, 0),
('871', '南寶樹脂', 0, 0, 0),
('874C', '藍色染料', 0, 0, 0),
('874F', '鹼性品綠', 0, 0, 0),
('877', '異丙醇', 0, 0, 0),
('980', '矽灰粉', 0, 0, 0),
('981', '橄欖粉', 0, 0, 0),
('986', '黃原膠', 0, 0, 0),
('988', '碳化稻殼(黑)', 0, 0, 0),
('988A', '碳化稻殼(白)', 0, 0, 0),
('988C', '碳化稻殼(白粗)', 0, 0, 0),
('990', '消泡劑', 0, 0, 0),
('992', '氫氧化鉀', 0, 0, 0),
('994', '糠醇 FA', 0, 0, 0),
('999A', '散棉', 0, 0, 0),
('999A2', '1260℃粉碎散棉-台', 0, 0, 0),
('999A6', '陶瓷散棉1600℃', 0, 0, 0),
('999M', '可溶棉', 0, 0, 0),
('999M3', '可溶棉(5目粉碎細)', 0, 0, 0),
('999MB', '999MB可溶棉', 0, 0, 0),
('A04', 'A04隔板', 0, 0, 0),
('A05', 'A05隔板', 0, 0, 0),
('A06', 'A06隔板', 0, 0, 0),
('A10', 'A10隔板', 0, 0, 0),
('A11', '棧板隔板', 0, 0, 0),
('A19', 'A19隔板', 0, 0, 0),
('A45-2', 'SLD隔板-16孔', 0, 0, 0),
('A60', 'A60隔板', 0, 0, 0),
('A71', 'A71隔板', 0, 0, 0),
('A71-1', '天板', 0, 0, 0),
('A72', '12孔洞板', 0, 0, 0),
('A72-1', '天板', 0, 0, 0),
('B01', 'B01紙箱', 0, 0, 0),
('B03', 'B03紙箱', 0, 0, 0),
('B04', 'B04紙箱', 0, 0, 0),
('B05', 'B05紙箱', 0, 0, 0),
('B05C', 'B05C紙箱', 0, 0, 0),
('B05S', 'B05S紙箱', 0, 0, 0),
('B16', 'B16紙箱', 0, 0, 0),
('B16N', 'B16N紙箱', 0, 0, 0),
('B16S', 'B16S紙箱', 0, 0, 0),
('B30S', 'B30S紙箱', 0, 0, 0),
('B35S', 'B35S紙箱', 0, 0, 0),
('B60', 'B60紙箱', 0, 0, 0),
('F00', '鐵桶', 0, 0, 0),
('F02', '四角鐵桶', 0, 0, 0),
('F03', '1加侖鐵桶', 0, 0, 0),
('F04', '開口桶', 0, 0, 0),
('F04A', '密封鐵桶', 0, 0, 0),
('F07', '大鐵桶', 0, 0, 0),
('F08', '加高鐵桶', 0, 0, 0),
('F09', 'F09噸桶', 0, 0, 0),
('H01', 'H01紙箱', 0, 0, 0),
('H02', 'H02紙箱', 0, 0, 0),
('H04', 'H04紙箱', 0, 0, 0),
('H05', 'H05紙箱', 0, 0, 0),
('H05A', 'H05A紙箱', 0, 0, 0),
('H05C', 'H05C紙箱', 0, 0, 0),
('H05D', 'H05D紙箱', 0, 0, 0),
('H06', 'H06紙箱', 0, 0, 0),
('H10', 'H10紙箱', 0, 0, 0),
('H16', 'H16紙箱', 0, 0, 0),
('H18', 'H18紙箱', 0, 0, 0),
('H23', 'H23紙箱', 0, 0, 0),
('H25', 'H25紙箱', 0, 0, 0),
('H28', 'H28紙箱', 0, 0, 0),
('H35', 'H35紙箱', 0, 0, 0),
('H45', 'H45紙箱', 0, 0, 0),
('H71', 'H71紙箱', 0, 0, 0),
('H72', 'H72紙箱', 0, 0, 0),
('HT99', '粗卷', 0, 0, 0),
('O03', '糊仔罐', 0, 0, 0),
('P01-1', '塑膠桶蓋子', 0, 0, 0),
('P02', '塑膠桶加高', 0, 0, 0),
('P04', '1加侖塑膠桶', 0, 0, 0),
('test001', 'rm001', 320, 6400, 128000),
('test002', 'rm002', 160, 3200, 70400),
('test003', 'rm003', 120, 2400, 55200),
('test004', 'rm004', 80, 1600, 38400),
('test005', 'rm005', 64, 1280, 32000);

-- --------------------------------------------------------

--
-- Table structure for table `materialentry`
--

CREATE TABLE `materialentry` (
  `materialEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `purchaseOrder` varchar(256) NOT NULL,
  `QRCode` blob,
  `expectedStoredArea` varchar(8) NOT NULL,
  `expectedStoredDate` date NOT NULL,
  `packageNumberOfPallet` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `palletNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `expectedStoredPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `expectedStoredWeight` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `expectedStoredMoney` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `confirmation` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materialentry`
--

INSERT INTO `materialentry` (`materialEntryID`, `serialNumber`, `purchaseOrder`, `QRCode`, `expectedStoredArea`, `expectedStoredDate`, `packageNumberOfPallet`, `palletNumber`, `expectedStoredPackageNumber`, `expectedStoredWeight`, `expectedStoredMoney`, `confirmation`) VALUES
('B20180629001', '20180629001', 'A20180629001', NULL, 'A', '2018-06-29', 4, 5, 20, 400, 8000, 0),
('B20180629002', '20180629002', 'A20180629002', NULL, 'B', '2018-06-29', 4, 10, 40, 800, 17600, 0),
('B20180629003', '20180629003', 'A20180629003', NULL, 'C', '2018-06-29', 4, 15, 60, 1200, 27600, 0),
('B20180629004', '20180629004', 'A20180629004', NULL, 'A', '2018-06-29', 4, 4, 16, 320, 7680, 0),
('B20180629005', '20180629005', 'A20180629005', NULL, 'B', '2018-06-29', 4, 8, 32, 640, 16000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `materialinwarehouse`
--

CREATE TABLE `materialinwarehouse` (
  `storedMaterialID` int(16) UNSIGNED NOT NULL,
  `material` varchar(256) NOT NULL,
  `materialEntry` varchar(256) NOT NULL,
  `supplier` int(16) UNSIGNED NOT NULL,
  `packagingID` int(16) UNSIGNED NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `storedDate` datetime NOT NULL,
  `storedPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `storedWeight` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `storedMoney` int(16) UNSIGNED NOT NULL DEFAULT '0',
  `remainingPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materialoutwarehouse`
--

CREATE TABLE `materialoutwarehouse` (
  `tookOutMaterialID` int(16) UNSIGNED NOT NULL,
  `materialInWarehouseID` int(16) UNSIGNED NOT NULL,
  `materialRequisition` varchar(256) NOT NULL,
  `outWarehouseArea` varchar(8) NOT NULL,
  `outWarehouseDate` datetime NOT NULL,
  `outWarehouseDepartment` varchar(256) NOT NULL,
  `outWarehouseMember` varchar(256) NOT NULL,
  `outWarehousePackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materialrequisition`
--

CREATE TABLE `materialrequisition` (
  `materialRequisitionID` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `supplier` int(16) UNSIGNED NOT NULL,
  `packaging` int(16) UNSIGNED NOT NULL,
  `requisitioningDate` date NOT NULL,
  `requisitioningDepartment` varchar(256) NOT NULL,
  `requisitioningMember` varchar(256) NOT NULL,
  `requisitionedPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `notOutPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `materialusage`
--

CREATE TABLE `materialusage` (
  `materialUsageID` int(16) UNSIGNED NOT NULL,
  `material` varchar(256) NOT NULL,
  `usingDepartment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `materialusage`
--

INSERT INTO `materialusage` (`materialUsageID`, `material`, `usingDepartment`) VALUES
(1, '013A', '混合組'),
(2, '113', '樹脂區'),
(3, '217', '混合組'),
(4, '219A', '塗模劑'),
(5, '435', '塗模劑'),
(6, '439A', '混合組'),
(7, '439A', '塗模劑'),
(8, '012A', ''),
(9, 'test001', '測試單位1'),
(10, 'test003', '測試單位1'),
(11, 'test002', '測試單位1'),
(12, 'test004', '測試單位2'),
(13, 'test005', '測試單位2'),
(14, '006', '打料區'),
(15, '007', '研發部'),
(16, '011', '填充組'),
(17, '012A', '混合組'),
(18, '013A', '混合組');

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `packagingID` int(16) UNSIGNED NOT NULL,
  `material` varchar(256) NOT NULL,
  `packaging` varchar(256) NOT NULL,
  `unitWeight` int(16) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packaging`
--

INSERT INTO `packaging` (`packagingID`, `material`, `packaging`, `unitWeight`) VALUES
(1, '013A', '包', 25),
(2, '217', '噸袋', 800),
(3, '219A', '桶', 172),
(4, '435', '噸袋', 1000),
(5, '439A', '噸袋', 850),
(6, '113', '噸桶', 1000),
(7, '113', '桶', 240),
(8, '200', '桶', 180),
(9, '006', '包', 40),
(10, '007', '包', 25),
(11, '012A', '包', 25),
(12, '012B', '包', 25),
(13, '013A', '包', 25),
(14, '014A', '包', 50),
(15, '014B', '包', 40),
(16, '015A', '包', 25),
(17, '017A', '包', 25),
(18, '018', '包', 25),
(19, '019', '包', 25),
(20, '023', '桶', 18),
(21, '027', '包', 10),
(22, '092', '桶', 35),
(23, '097', '噸桶', 1000),
(24, '111', '噸桶', 1000),
(25, '112', '桶', 25),
(26, '113', '噸桶', 1000),
(27, '113A', '噸桶', 1000),
(28, '114', '桶', 200),
(29, '115', '包', 40),
(30, '117', '桶', 30),
(31, '128', '包', 25),
(32, '129', '包', 25),
(33, '150', '包', 23),
(34, '153A', '包', 25),
(35, '168', '包', 10),
(36, '200', '桶', 180),
(37, '202', '噸袋', 1000),
(38, '208', '包', 25),
(39, '209', '包', 10),
(40, '212', '包', 25),
(41, '213', '桶', 200),
(42, '214', '桶', 200),
(43, '215', '噸袋', 1000),
(44, '216', '噸袋', 750),
(45, '216A', '噸袋', 1000),
(46, '216C', '噸袋', 1000),
(47, '217', '噸袋', 800),
(48, '217A', '桶', 25),
(49, '217C', '包', 25),
(50, '219A', '桶', 172),
(51, '228A', '噸袋', 400),
(52, '228B', '噸袋', 400),
(53, '320', '桶', 176),
(54, '321', '包', 25),
(55, '321A', '包', 25),
(56, '322A', '桶', 180),
(57, '322B', '桶', 14),
(58, '323', '包', 30),
(59, '324', '包', 25),
(60, '325B', '包', 25),
(61, '331', '噸袋', 25),
(62, '332', '包', 25),
(63, '340', '包', 15),
(64, '431A', '包', 25),
(65, '432', '包', 25),
(66, '432A', '包', 25),
(67, '432B', '包', 50),
(68, '433C', '噸袋', 1000),
(69, '433D', '噸袋', 1000),
(70, '434A', '噸袋', 1000),
(71, '434B', '噸袋', 1000),
(72, '434C', '噸袋', 25),
(73, '435', '噸袋', 1000),
(74, '435B', '噸袋', 20),
(75, '436', '包', 25),
(76, '437A', '包', 20),
(77, '439A', '噸袋', 850),
(78, '439B', '包', 20),
(79, '439C', '包', 25),
(80, '439D', '包', 25),
(81, '540-3', '包', 25),
(82, '540-4', '包', 25),
(83, '542', '包', 20),
(84, '543', '包', 25),
(85, '544G', '包', 23),
(86, '545', '包', 25),
(87, '546', '包', 25),
(88, '546B', '包', 25),
(89, '548', '包', 25),
(90, '549', '包', 25),
(91, '551', '包', 25),
(92, '650', '包', 25),
(93, '651', '包', 25),
(94, '654A', '包', 25),
(95, '654AB', '包', 25),
(96, '654B', '噸袋', 1250),
(97, '654C', '噸袋', 1250),
(98, '654H', '噸袋', 25),
(99, '655', '桶', 15),
(100, '657', '包', 25),
(101, '657A', '包', 25),
(102, '657B', '包', 25),
(103, '658', '包', 46),
(104, '659', '噸袋', 1000),
(105, '659C', '噸袋', 1000),
(106, '660', '包', 25),
(107, '760A', '包', 25),
(108, '765', '噸袋', 1000),
(109, '765B', '包', 30),
(110, '766A', '包', 25),
(111, '767A', '包', 10),
(112, '767B', '包', 25),
(113, '767C', '桶', 240),
(114, '767D', '噸桶', 1000),
(115, '767F', '噸桶', 1000),
(116, '767T', '包', 20),
(117, '768', '包', 25),
(118, '769', '桶', 25),
(119, '871', '桶', 50),
(120, '874C', '包', 10),
(121, '874F', '包', 25),
(122, '877', '桶', 160),
(123, '980', '包', 20),
(124, '981', '噸袋', 1000),
(125, '986', '包', 25),
(126, '988', '包', 8),
(127, '988A', '噸袋', 500),
(128, '988C', '包', 30),
(129, '990', '桶', 30),
(130, '992', '包', 25),
(131, '994', '槽車', 25000),
(132, '999A', '包', 20),
(133, '999A2', '箱', 15),
(134, '999A6', '箱', 15),
(135, '999M', '箱', 15),
(136, '999M3', '箱', 15),
(137, '999MB', '包', 20),
(139, '430', '槽車', 0),
(140, 'test001', '包', 20),
(141, 'test002', '包', 20),
(142, 'test003', '包', 20),
(143, 'test004', '包', 20),
(144, 'test005', '包', 20),
(145, 'test003', '包', 24);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorder`
--

CREATE TABLE `purchaseorder` (
  `purchaseOrderID` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `supplier` int(16) UNSIGNED NOT NULL,
  `packaging` int(16) UNSIGNED NOT NULL,
  `purchaseCondition` varchar(256) NOT NULL,
  `purchasedPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0',
  `notEnteredPackageNumber` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchaseorder`
--

INSERT INTO `purchaseorder` (`purchaseOrderID`, `material`, `supplier`, `packaging`, `purchaseCondition`, `purchasedPackageNumber`, `notEnteredPackageNumber`) VALUES
('A20180629001', 'test001', 932, 140, '一般', 20, 0),
('A20180629002', 'test002', 935, 141, '一般', 40, 0),
('A20180629003', 'test003', 934, 142, '一般', 60, 0),
('A20180629004', 'test004', 937, 143, '一般', 16, 0),
('A20180629005', 'test005', 938, 144, '一般', 32, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(16) UNSIGNED NOT NULL,
  `supplierName` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `unitPrice` int(8) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `material`, `unitPrice`) VALUES
(1, '建鹽', '013A', 4),
(2, '冠佳', '013A', 4),
(3, '弘竹', '217', 43),
(4, '鮮豐', '217', 43),
(5, '興龍銓', '219A', 26),
(6, '南方石墨', '435', 14),
(7, '潤優', '435', 14),
(8, '青島泛化', '435', 14),
(9, '晟邦', '435', 14),
(10, '穗曄', '439A', 16),
(11, '佳欣', '113', 16),
(12, ' 欣和', '113', 16),
(205, '協明', '6', 14),
(206, '協明', '7', 32),
(207, '高矽', '11', 7),
(208, '協明', '012A', 11),
(209, '協明', '012B', 11),
(211, '新生', '014A', 36),
(212, '新生', '014B', 12),
(213, '協明', '015A', 6),
(214, '協明', '017A', 45),
(215, '培林', '18', 4),
(216, '協明', '19', 44),
(217, '淳政', '23', 599),
(218, '淳政', '27', 160),
(219, '協明', '92', 36),
(220, '協明', '97', 18),
(221, '永弘沅', '111', 15),
(222, '勝日', '112', 181),
(224, '佳欣', '113A', 16),
(225, '淳政', '114', 210),
(226, '新生', '115', 12),
(227, '協明', '117', 25),
(228, '太倉', '128', 50),
(229, '培林', '129', 16),
(230, '台亨', '150', 54),
(231, '洛陽強業', '153A', 132),
(232, '培林', '168', 350),
(233, '鴻益', '200', 88),
(234, '大佳順', '202', 5),
(235, '協明', '208', 75),
(236, '協明', '209', 80),
(237, '協明', '212', 58),
(238, '健城', '213', 71),
(239, '興龍銓', '214', 25),
(240, '弘竹', '215', 4),
(241, '弘竹', '216', 5),
(663, '太倉', '216A', 0),
(664, '弘竹', '216C', 16),
(665, '弘竹', '216F', 0),
(667, '弘友', '217A', 110),
(668, '弘友', '217C', 100),
(670, 'G.A.', '228A', 38),
(671, '新蘭諾', '228B', 32),
(672, '興龍銓', '320', 54),
(673, '見得行', '321', 40),
(674, '厚健', '321A', 42),
(675, '興龍銓', '322A', 50),
(676, '興龍銓', '322B', 53),
(677, '品興', '323', 6),
(678, '磊盈', '324', 32),
(679, '日耀', '325B', 14),
(680, '見得行', '331', 14),
(681, '潤優', '332', 14),
(682, '勤和', '340', 155),
(683, '興龍銓', '420', 80),
(684, '皇霖', '430', 13),
(685, '培林', '431A', 9),
(686, '忠正', '432', 14),
(687, '金宏', '432A', 14),
(688, '太倉', '432B', 24),
(689, '東佑', '433C', 50),
(690, '東佑', '433D', 50),
(691, '海達', '434A', 24),
(692, '海達', '434B', 18),
(693, 'G.A.', '434C', 50),
(695, '潤優', '435B', 9),
(696, '見得行', '436', 42),
(697, '三福', '437A', 30),
(699, '台灣聚酫', '439B', 40),
(700, '宏邦', '439C', 25),
(701, '宏邦', '439D', 25),
(702, '泓垣霖', '507', 49),
(703, '惠民', '508', 100),
(704, '', '513', 0),
(705, '志純', '540-3', 2),
(706, '凰瑋', '540-4', 2),
(707, '培林', '542', 28),
(708, '協明', '543', 35),
(709, '培林', '544G', 50),
(710, '協明', '545', 20),
(711, '雲南', '546', 32),
(712, '協明', '546B', 33),
(713, '湖南青沖', '548', 27),
(714, '', '549', 25),
(715, '雲南氟業', '551', 25),
(716, '協明', '650', 22),
(717, '', '651', 9),
(718, '培林', '654A', 42),
(719, '培林', '654AB', 40),
(720, '金宏', '654B', 9),
(721, '金宏', '654C', 83),
(722, '金宏', '654H', 25),
(723, '興龍銓', '655', 195),
(724, '培林', '657', 8),
(725, '磊盈', '657A', 11),
(726, '培林', '657B', 8),
(727, '聖騰', '658', 14),
(728, '珪昌', '659', 49),
(729, '仁豐行', '659C', 37),
(730, '太倉', '660', 75),
(731, '忠正', '760A', 35),
(732, '寬易', '760B', 14),
(733, '金晶', '765', 3),
(734, '金晶', '765B', 3),
(735, '仁豐', '766A', 34),
(736, '惠民', '767A', 650),
(737, '聖泉', '767B', 49),
(738, '金隆', '767C', 60),
(739, '佳欣', '767D', 50),
(740, '佳欣', '767F', 50),
(741, '欣和', '767T', 54),
(742, '台灣聚酫', '768', 60),
(743, '合記', '769', 160),
(744, '合富行 ', '871', 32),
(745, '銘陽', '874C', 375),
(746, '太倉', '874F', 460),
(747, '興龍銓', '877', 35),
(748, '培林', '980', 32),
(749, '宏軒', '981', 9),
(750, '太倉', '986', 205),
(751, '太盟', '988', 7),
(752, '太盟', '988A', 13),
(754, '建鴻', '990', 33),
(755, '全', '992', 90),
(756, '一諾', '994', 87),
(757, '金焰', '999A', 28),
(758, '汎遠', '999A2', 38),
(759, '碩揚', '999A6', 100),
(760, '汎遠', '999M', 40),
(761, '汎遠', '999M3', 38),
(762, '魯陽', '999MB', 0),
(763, '達員', 'A04', 2),
(764, '達員', 'A05', 5),
(765, '達員', 'A06', 3),
(766, '達員', 'A10', 6),
(767, '達員', 'A11', 12),
(768, '達員', 'A19', 5),
(769, '達員', 'A45-2', 12),
(770, '達員', 'A60', 5),
(771, '達員', 'A71', 14),
(772, '達員', 'A71-1', 6),
(773, '達員', 'A72', 20),
(774, '達員', 'A72-1', 8),
(775, '達員', 'B01', 24),
(776, '達員', 'B03', 18),
(777, '達員', 'B04', 17),
(778, '達員', 'B05', 22),
(779, '達員', 'B05C', 15),
(780, '達員', 'B05S', 12),
(781, '達員', 'B16', 11),
(782, '達員', 'B16N', 18),
(783, '達員', 'B16S', 10),
(784, '達員', 'B30S', 10),
(785, '達員', 'B35S', 10),
(786, '達員', 'B60', 6),
(787, '協振', 'F00', 110),
(788, '協振', 'F02', 65),
(789, '協振', 'F03', 26),
(790, '朝和', 'F04', 500),
(791, '朝和', 'F04A', 400),
(792, '興龍銓', 'F07', 350),
(793, '協振', 'F08', 115),
(794, '朝和', 'F09', 2600),
(795, '達員', 'H01', 24),
(796, '達員', 'H02', 18),
(797, '達員', 'H04', 17),
(798, '達員', 'H05', 20),
(799, '群穎', 'H05A', 24),
(800, '達員', 'H05C', 15),
(801, '達員', 'H05D', 14),
(802, '達員', 'H06', 13),
(803, '群穎', 'H10', 21),
(804, '達員', 'H16', 10),
(805, '群穎', 'H18', 20),
(806, '達員', 'H23', 14),
(807, '達員', 'H25', 12),
(808, '達員', 'H28', 13),
(809, '達員', 'H35', 11),
(810, '達員', 'H45', 11),
(811, '達員', 'H71', 29),
(812, '達員', 'H72', 35),
(813, '達員', 'HT99', 600),
(814, '惟中', 'O03', 2),
(815, '良器', 'P01-1', 20),
(816, '良器', 'P02', 80),
(817, '良器', 'P04', 24),
(819, '今冠', '015A', 6),
(820, '今冠', '092', 36),
(821, '裕民', '111', 15),
(823, '欣和', '113A', 16),
(824, '青島愛森', '114', 210),
(825, '今冠', '117', 25),
(826, '亞而', '150', 54),
(827, '見得行', '202', 5),
(828, '隆傑', '216C', 16),
(830, '玉禮', '228A', 38),
(831, '裕民', '325B', 14),
(832, '皇裕', '430', 13),
(833, '晉榮', '433C', 50),
(834, '晉榮', '433D', 50),
(835, '金宏', '434A', 24),
(836, '金宏', '434B', 18),
(837, '青島南墅', '434C', 50),
(839, '見得行', '435B', 9),
(840, '鉅倞', '544G', 50),
(841, '金益', '545', 20),
(842, '金益', '546B', 33),
(843, '磊盈', '548', 27),
(844, '玉禮', '654B', 9),
(845, '卓越', '654C', 83),
(846, '峰達', '654H', 25),
(847, '培林', '657A', 11),
(848, '永駿興', '659', 49),
(849, '開化方元', '660', 75),
(850, '弘友', '760A', 35),
(851, '艾門諦', '767B', 49),
(852, '台菱', '767F', 50),
(853, '艾門諦', '767T', 54),
(854, '冠佳', '768', 60),
(855, '佳欣', '871', 32),
(856, '見得行', '981', 9),
(857, '協新', '988A', 13),
(858, '宏業', '994', 87),
(859, '汎遠', '999A', 28),
(860, '宏欣', 'F04', 500),
(861, '宏欣', 'F04A', 400),
(862, '宏欣', 'F09', 2600),
(863, '達員', 'H10', 21),
(864, '奕大', 'P02', 80),
(867, '今冠', '92', 36),
(884, '青島南墅', '434C', 50),
(907, '宏欣', 'F04', 500),
(911, '奕大', 'P02', 80),
(912, '皇鏵', '111', 15),
(913, '安徽矽寶', '114', 210),
(914, '新蘭諾', '228A', 38),
(915, '瀚升', '430', 13),
(916, '見得行', '434A', 24),
(917, '見得行', '434B', 18),
(918, '青島興和', '434C', 50),
(920, '裕民', '545', 20),
(921, '卓越', '654B', 9),
(922, '玉禮', '654C', 83),
(923, '見得行', '760A', 35),
(925, '青島泛化', '994', 87),
(927, '協明', '006', 14),
(928, '協明', '007', 32),
(929, '高矽', '011', 7),
(930, '凱瑞', '430', 13),
(931, '啟琳', '430', 13),
(932, 'SPY001', 'test001', 20),
(933, 'SPY001', 'test002', 20),
(934, 'SPY002', 'test003', 23),
(935, 'SPY002', 'test002', 22),
(936, 'SPY002', 'test002', 21),
(937, 'SPY003', 'test004', 24),
(938, 'SPY003', 'test005', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `authority` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `password`, `authority`) VALUES
('admin', 'System Administrator', '$2y$10$VIBa5Ziq56jFt5HjI83EKOzG7618HQ9vVp7N3cSB.HJiNMvcCs2ay', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finishedgood`
--
ALTER TABLE `finishedgood`
  ADD PRIMARY KEY (`finishedGoodID`);

--
-- Indexes for table `finishedgoodentry`
--
ALTER TABLE `finishedgoodentry`
  ADD PRIMARY KEY (`finishedGoodEntryID`),
  ADD KEY `entryFinishedGood` (`product`),
  ADD KEY `finishedGoodEntryPackagingID` (`packaging`);

--
-- Indexes for table `finishedgoodinwarehouse`
--
ALTER TABLE `finishedgoodinwarehouse`
  ADD PRIMARY KEY (`storedFinishedGoodID`),
  ADD KEY `storedFinishedGoodEntryID` (`finishedGoodEntry`),
  ADD KEY `storedFinishedGoodID` (`product`),
  ADD KEY `storedFinishedGoodPackagingID` (`packagingID`);

--
-- Indexes for table `finishedgoodoutwarehouse`
--
ALTER TABLE `finishedgoodoutwarehouse`
  ADD PRIMARY KEY (`takenOutFinishedGoodID`),
  ADD KEY `outFinishedGoodRequisitionID` (`finishedGoodRequisition`),
  ADD KEY `outFinishedGoodInWarehouseID` (`inWarehouseID`);

--
-- Indexes for table `finishedgoodpackaging`
--
ALTER TABLE `finishedgoodpackaging`
  ADD PRIMARY KEY (`finishedGoodPackagingID`),
  ADD KEY `finishedGoodPackagingProductID` (`product`);

--
-- Indexes for table `finishedgoodrequisition`
--
ALTER TABLE `finishedgoodrequisition`
  ADD PRIMARY KEY (`finishedGoodRequisitionID`),
  ADD KEY `requisitionProduct` (`product`),
  ADD KEY `requisitionPackaging` (`packagingID`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`materialID`);

--
-- Indexes for table `materialentry`
--
ALTER TABLE `materialentry`
  ADD PRIMARY KEY (`materialEntryID`),
  ADD KEY `entryPurchaseOrder` (`purchaseOrder`);

--
-- Indexes for table `materialinwarehouse`
--
ALTER TABLE `materialinwarehouse`
  ADD PRIMARY KEY (`storedMaterialID`),
  ADD KEY `storedMaterialID` (`material`),
  ADD KEY `storedMaterialPackagingID` (`packagingID`),
  ADD KEY `storedMaterialEntryID` (`materialEntry`),
  ADD KEY `storedSupplierID` (`supplier`);

--
-- Indexes for table `materialoutwarehouse`
--
ALTER TABLE `materialoutwarehouse`
  ADD PRIMARY KEY (`tookOutMaterialID`),
  ADD KEY `outWarehouseMaterialRequisitionID` (`materialRequisition`),
  ADD KEY `outWarehouseMaterialInWarehouseID` (`materialInWarehouseID`);

--
-- Indexes for table `materialrequisition`
--
ALTER TABLE `materialrequisition`
  ADD PRIMARY KEY (`materialRequisitionID`),
  ADD KEY `requisitionMaterial` (`material`),
  ADD KEY `requisitionSupplierID` (`supplier`),
  ADD KEY `requisitionPackagingID` (`packaging`);

--
-- Indexes for table `materialusage`
--
ALTER TABLE `materialusage`
  ADD PRIMARY KEY (`materialUsageID`),
  ADD KEY `materialUsageMaterialID` (`material`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`packagingID`),
  ADD KEY `packagingMaterialID` (`material`);

--
-- Indexes for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD PRIMARY KEY (`purchaseOrderID`),
  ADD KEY `purchaseOrderMaterialID` (`material`),
  ADD KEY `purchaseOrderSupplierID` (`supplier`),
  ADD KEY `purchaseOrderPackagingID` (`packaging`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD KEY `supplierMaterial` (`material`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finishedgoodinwarehouse`
--
ALTER TABLE `finishedgoodinwarehouse`
  MODIFY `storedFinishedGoodID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `finishedgoodoutwarehouse`
--
ALTER TABLE `finishedgoodoutwarehouse`
  MODIFY `takenOutFinishedGoodID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `finishedgoodpackaging`
--
ALTER TABLE `finishedgoodpackaging`
  MODIFY `finishedGoodPackagingID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `materialinwarehouse`
--
ALTER TABLE `materialinwarehouse`
  MODIFY `storedMaterialID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `materialoutwarehouse`
--
ALTER TABLE `materialoutwarehouse`
  MODIFY `tookOutMaterialID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materialusage`
--
ALTER TABLE `materialusage`
  MODIFY `materialUsageID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `packagingID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=939;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `finishedgoodentry`
--
ALTER TABLE `finishedgoodentry`
  ADD CONSTRAINT `finishedGoodEntryPackagingID` FOREIGN KEY (`packaging`) REFERENCES `finishedgoodpackaging` (`finishedGoodPackagingID`),
  ADD CONSTRAINT `finishedGoodEntryProductID` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`);

--
-- Constraints for table `finishedgoodinwarehouse`
--
ALTER TABLE `finishedgoodinwarehouse`
  ADD CONSTRAINT `storedFinishedGoodEntryID` FOREIGN KEY (`finishedGoodEntry`) REFERENCES `finishedgoodentry` (`finishedGoodEntryID`),
  ADD CONSTRAINT `storedFinishedGoodID` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`),
  ADD CONSTRAINT `storedFinishedGoodPackagingID` FOREIGN KEY (`packagingID`) REFERENCES `finishedgoodpackaging` (`finishedGoodPackagingID`);

--
-- Constraints for table `finishedgoodoutwarehouse`
--
ALTER TABLE `finishedgoodoutwarehouse`
  ADD CONSTRAINT `outFinishedGoodInWarehouseID` FOREIGN KEY (`inWarehouseID`) REFERENCES `finishedgoodinwarehouse` (`storedFinishedGoodID`),
  ADD CONSTRAINT `outFinishedGoodRequisitionID` FOREIGN KEY (`finishedGoodRequisition`) REFERENCES `finishedgoodrequisition` (`finishedGoodRequisitionID`);

--
-- Constraints for table `finishedgoodpackaging`
--
ALTER TABLE `finishedgoodpackaging`
  ADD CONSTRAINT `finishedGoodPackagingProductID` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`);

--
-- Constraints for table `finishedgoodrequisition`
--
ALTER TABLE `finishedgoodrequisition`
  ADD CONSTRAINT `requisitionPackaging` FOREIGN KEY (`packagingID`) REFERENCES `finishedgoodpackaging` (`finishedGoodPackagingID`),
  ADD CONSTRAINT `requisitionProduct` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`);

--
-- Constraints for table `materialentry`
--
ALTER TABLE `materialentry`
  ADD CONSTRAINT `entryPurchaseOrder` FOREIGN KEY (`purchaseOrder`) REFERENCES `purchaseorder` (`purchaseOrderID`);

--
-- Constraints for table `materialinwarehouse`
--
ALTER TABLE `materialinwarehouse`
  ADD CONSTRAINT `storedMaterialEntryID` FOREIGN KEY (`materialEntry`) REFERENCES `materialentry` (`materialEntryID`),
  ADD CONSTRAINT `storedMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  ADD CONSTRAINT `storedMaterialPackagingID` FOREIGN KEY (`packagingID`) REFERENCES `packaging` (`packagingID`),
  ADD CONSTRAINT `storedSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`);

--
-- Constraints for table `materialoutwarehouse`
--
ALTER TABLE `materialoutwarehouse`
  ADD CONSTRAINT `outWarehouseMaterialInWarehouseID` FOREIGN KEY (`materialInWarehouseID`) REFERENCES `materialinwarehouse` (`storedMaterialID`),
  ADD CONSTRAINT `outWarehouseMaterialRequisitionID` FOREIGN KEY (`materialRequisition`) REFERENCES `materialrequisition` (`materialRequisitionID`);

--
-- Constraints for table `materialrequisition`
--
ALTER TABLE `materialrequisition`
  ADD CONSTRAINT `requisitionMaterial` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  ADD CONSTRAINT `requisitionPackagingID` FOREIGN KEY (`packaging`) REFERENCES `packaging` (`packagingID`),
  ADD CONSTRAINT `requisitionSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`);

--
-- Constraints for table `materialusage`
--
ALTER TABLE `materialusage`
  ADD CONSTRAINT `materialUsageMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`);

--
-- Constraints for table `packaging`
--
ALTER TABLE `packaging`
  ADD CONSTRAINT `packagingMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`);

--
-- Constraints for table `purchaseorder`
--
ALTER TABLE `purchaseorder`
  ADD CONSTRAINT `purchaseOrderMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  ADD CONSTRAINT `purchaseOrderPackagingID` FOREIGN KEY (`packaging`) REFERENCES `packaging` (`packagingID`),
  ADD CONSTRAINT `purchaseOrderSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplierMaterial` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
