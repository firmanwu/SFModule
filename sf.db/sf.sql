-- --------------------------------------------------------
-- 主機:                           localhost
-- 伺服器版本:                        10.2.13-MariaDB-log - mariadb.org binary distribution
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 sf 的資料庫結構
CREATE DATABASE IF NOT EXISTS `sf` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sf`;

-- 傾印  表格 sf.finishedgood 結構
CREATE TABLE IF NOT EXISTS `finishedgood` (
  `finishedGoodID` varchar(256) NOT NULL,
  `finishedGoodType` varchar(256) NOT NULL,
  `unitWeight` int(8) NOT NULL,
  `packageNumberOfPallet` int(8) NOT NULL,
  `totalPackageNumber` int(8) NOT NULL DEFAULT 0,
  `totalWeight` int(16) NOT NULL DEFAULT 0,
  PRIMARY KEY (`finishedGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.finishedgood 的資料：~3 rows (大約)
/*!40000 ALTER TABLE `finishedgood` DISABLE KEYS */;
REPLACE INTO `finishedgood` (`finishedGoodID`, `finishedGoodType`, `unitWeight`, `packageNumberOfPallet`, `totalPackageNumber`, `totalWeight`) VALUES
	('xo-12', '樹脂', 1000, 2, 4, 4000),
	('xx-11', '塗模劑', 300, 4, 8, 2400),
	('xx-13', '塗模劑', 300, 3, 7, 2100);
/*!40000 ALTER TABLE `finishedgood` ENABLE KEYS */;

-- 傾印  表格 sf.finishedgoodentry 結構
CREATE TABLE IF NOT EXISTS `finishedgoodentry` (
  `finishedGoodEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `product` varchar(256) NOT NULL,
  `batchNumber` varchar(256) NOT NULL,
  `storedDate` date NOT NULL,
  `storedPackageNumber` int(16) NOT NULL,
  `palletNumber` int(16) NOT NULL,
  `storedWeight` int(16) NOT NULL,
  PRIMARY KEY (`finishedGoodEntryID`),
  KEY `entryFinishedGood` (`product`),
  CONSTRAINT `entryFinishedGood` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.finishedgoodentry 的資料：~3 rows (大約)
/*!40000 ALTER TABLE `finishedgoodentry` DISABLE KEYS */;
REPLACE INTO `finishedgoodentry` (`finishedGoodEntryID`, `serialNumber`, `status`, `storedArea`, `product`, `batchNumber`, `storedDate`, `storedPackageNumber`, `palletNumber`, `storedWeight`) VALUES
	('PD001', '20180505001', '正常', 'E', 'xx-11', '20180505001', '2018-05-06', 20, 5, 6000),
	('PD002', '20180505002', '正常', 'E', 'xo-12', '20180505002', '2018-05-07', 12, 6, 12000),
	('PD003', '20180505003', '急貨', 'X', 'xx-13', '20180505003', '2018-05-10', 16, 5, 4800);
/*!40000 ALTER TABLE `finishedgoodentry` ENABLE KEYS */;

-- 傾印  表格 sf.finishedgoodrequisition 結構
CREATE TABLE IF NOT EXISTS `finishedgoodrequisition` (
  `finishedGoodRequistionID` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `requisitioningDate` date NOT NULL,
  `requisitioningDepartment` varchar(256) NOT NULL,
  `requisitioningMember` varchar(256) NOT NULL,
  `requisitionedPackageNumber` int(16) NOT NULL,
  `requisitionedPalletNumber` int(16) NOT NULL,
  `requisitionedWeight` int(16) NOT NULL,
  `remainingPackageNumber` int(8) NOT NULL,
  `remainingWeight` int(16) NOT NULL,
  PRIMARY KEY (`finishedGoodRequistionID`),
  KEY `requisitionProduct` (`product`),
  CONSTRAINT `requisitionProduct` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.finishedgoodrequisition 的資料：~3 rows (大約)
/*!40000 ALTER TABLE `finishedgoodrequisition` DISABLE KEYS */;
REPLACE INTO `finishedgoodrequisition` (`finishedGoodRequistionID`, `product`, `requisitioningDate`, `requisitioningDepartment`, `requisitioningMember`, `requisitionedPackageNumber`, `requisitionedPalletNumber`, `requisitionedWeight`, `remainingPackageNumber`, `remainingWeight`) VALUES
	('RF001', 'xx-11', '2018-05-06', '二課', '甲員', 12, 3, 3600, 8, 2400),
	('RF002', 'xo-12', '2018-05-07', '二課', '甲員', 8, 4, 8000, 4, 4000),
	('RF003', 'xx-13', '2018-05-10', '二課', '甲員', 9, 3, 2700, 7, 2100);
/*!40000 ALTER TABLE `finishedgoodrequisition` ENABLE KEYS */;

-- 傾印  表格 sf.material 結構
CREATE TABLE IF NOT EXISTS `material` (
  `materialID` varchar(256) NOT NULL,
  `materialName` varchar(256) NOT NULL,
  `totalPackageNumber` int(8) NOT NULL DEFAULT 0,
  `totalWeight` int(16) NOT NULL DEFAULT 0,
  PRIMARY KEY (`materialID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.material 的資料：~5 rows (大約)
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
REPLACE INTO `material` (`materialID`, `materialName`, `totalPackageNumber`, `totalWeight`) VALUES
	('xo-12', '石英粉', 140, 2800),
	('xx-11', '氧化鐵', 5, 5000),
	('xy-02', '鋁粉', 2, 1000),
	('yo-01', '黑鉛', 1, 1000),
	('yo-03', '鹽', 105, 2625);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

-- 傾印  表格 sf.materialentry 結構
CREATE TABLE IF NOT EXISTS `materialentry` (
  `materialEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `purchaseOrder` varchar(256) NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `QRCode` blob DEFAULT NULL,
  `material` varchar(256) NOT NULL,
  `batchNumber` varchar(256) DEFAULT NULL,
  `storedDate` date NOT NULL,
  `supplier` int(8) unsigned NOT NULL,
  `packageNumberOfPallet` int(16) NOT NULL,
  `palletNumber` int(16) NOT NULL,
  `storedPackageNumber` int(8) NOT NULL,
  `storedWeight` int(16) NOT NULL,
  PRIMARY KEY (`materialEntryID`),
  KEY `warehousingEntryMaterial` (`material`),
  KEY `entrySupplierID` (`supplier`),
  KEY `entryPurchaseOrder` (`purchaseOrder`),
  CONSTRAINT `entryMaterial` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  CONSTRAINT `entryPurchaseOrder` FOREIGN KEY (`purchaseOrder`) REFERENCES `purchaseorder` (`purchaseOrderID`),
  CONSTRAINT `entrySupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialentry 的資料：~5 rows (大約)
/*!40000 ALTER TABLE `materialentry` DISABLE KEYS */;
REPLACE INTO `materialentry` (`materialEntryID`, `serialNumber`, `purchaseOrder`, `storedArea`, `QRCode`, `material`, `batchNumber`, `storedDate`, `supplier`, `packageNumberOfPallet`, `palletNumber`, `storedPackageNumber`, `storedWeight`) VALUES
	('EN001', '20180506001', 'PO001', 'A', NULL, 'xx-11', '20180506001', '2018-05-06', 1, 1, 10, 10, 10000),
	('EN002', '20180506002', 'PO002', 'A', NULL, 'xy-02', '20180506002', '2018-05-07', 2, 2, 12, 24, 12000),
	('EN003', '20180506003', 'PO003', 'B', NULL, 'yo-01', '20180506003', '2018-05-08', 3, 1, 1, 1, 1000),
	('EN004', '20180506004', 'PO004', 'B', NULL, 'xo-12', '20180506004', '2018-05-09', 4, 20, 8, 160, 3200),
	('EN005', '20180506005', 'PO005', 'C', NULL, 'yo-03', '20180506005', '2018-05-10', 5, 20, 10, 200, 5000);
/*!40000 ALTER TABLE `materialentry` ENABLE KEYS */;

-- 傾印  表格 sf.materialrequisition 結構
CREATE TABLE IF NOT EXISTS `materialrequisition` (
  `materialRequisitionID` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `supplier` int(8) unsigned NOT NULL,
  `requisitioningDate` date NOT NULL,
  `requisitioningDepartment` varchar(256) NOT NULL,
  `requisitioningMember` varchar(256) NOT NULL,
  `requisitionedPackageNumber` int(8) NOT NULL,
  `requisitionedWeight` int(16) NOT NULL,
  `remainingPackageNumber` int(8) NOT NULL,
  `remainingWeight` int(16) NOT NULL,
  PRIMARY KEY (`materialRequisitionID`),
  KEY `requisitionMaterial` (`material`),
  KEY `requisitionSupplierID` (`supplier`),
  CONSTRAINT `requisitionMaterial` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  CONSTRAINT `requisitionSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialrequisition 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `materialrequisition` DISABLE KEYS */;
REPLACE INTO `materialrequisition` (`materialRequisitionID`, `material`, `supplier`, `requisitioningDate`, `requisitioningDepartment`, `requisitioningMember`, `requisitionedPackageNumber`, `requisitionedWeight`, `remainingPackageNumber`, `remainingWeight`) VALUES
	('RQ001', 'xx-11', 1, '2018-05-10', '二課', '甲員', 5, 5000, 5, 5000),
	('RQ002', 'xy-02', 2, '2018-05-11', '一課', '乙員', 10, 5000, 14, 7000),
	('RQ003', 'xy-02', 2, '2018-05-12', '一課', '乙員', 12, 6000, 2, 1000),
	('RQ007', 'xo-12', 4, '2018-05-16', '一課', '乙員', 20, 400, 140, 2800),
	('RQ008', 'yo-03', 5, '2018-05-17', '一課', '乙員', 25, 625, 175, 4375),
	('RQ009', 'yo-03', 5, '2018-05-18', '一課', '乙員', 30, 750, 145, 3625),
	('RQ010', 'yo-03', 5, '2018-05-19', '一課', '乙員', 40, 1000, 105, 2625);
/*!40000 ALTER TABLE `materialrequisition` ENABLE KEYS */;

-- 傾印  表格 sf.materialusage 結構
CREATE TABLE IF NOT EXISTS `materialusage` (
  `materialUsageID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(256) NOT NULL DEFAULT '0',
  `usingDepartment` varchar(256) NOT NULL DEFAULT '0',
  PRIMARY KEY (`materialUsageID`),
  KEY `materialUsageMaterialID` (`material`),
  CONSTRAINT `materialUsageMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialusage 的資料：~6 rows (大約)
/*!40000 ALTER TABLE `materialusage` DISABLE KEYS */;
REPLACE INTO `materialusage` (`materialUsageID`, `material`, `usingDepartment`) VALUES
	(1, 'xx-11', '二課'),
	(2, 'xy-02', '一課'),
	(3, 'xy-02', '二課'),
	(4, 'yo-01', '一課'),
	(5, 'xo-12', '一課'),
	(6, 'yo-03', '一課');
/*!40000 ALTER TABLE `materialusage` ENABLE KEYS */;

-- 傾印  表格 sf.purchaseorder 結構
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `purchaseOrderID` varchar(256) NOT NULL,
  `purchaseCondition` varchar(256) NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`purchaseOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.purchaseorder 的資料：~6 rows (大約)
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
REPLACE INTO `purchaseorder` (`purchaseOrderID`, `purchaseCondition`) VALUES
	('PO001', 'normal'),
	('PO002', 'normal'),
	('PO003', 'normal'),
	('PO004', 'special'),
	('PO005', 'normal'),
	('PO006', 'normal');
/*!40000 ALTER TABLE `purchaseorder` ENABLE KEYS */;

-- 傾印  表格 sf.supplier 結構
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `packaging` varchar(256) NOT NULL,
  `unitWeight` int(16) NOT NULL,
  `price` varchar(4) NOT NULL,
  PRIMARY KEY (`supplierID`),
  KEY `supplierMaterial` (`product`),
  CONSTRAINT `supplierMaterial` FOREIGN KEY (`product`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.supplier 的資料：~5 rows (大約)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
REPLACE INTO `supplier` (`supplierID`, `supplierName`, `product`, `packaging`, `unitWeight`, `price`) VALUES
	(1, 'a供應商', 'xx-11', '噸裝', 1000, 'B'),
	(2, 'd供應商', 'xy-02', '噸裝', 500, 'A'),
	(3, 'c供應商', 'yo-01', '噸裝', 1000, 'B'),
	(4, 'b供應商', 'xo-12', '袋裝', 20, 'C'),
	(5, 'e供應商', 'yo-03', '袋裝', 25, 'C');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- 傾印  表格 sf.user 結構
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `authority` char(8) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.user 的資料：~2 rows (大約)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`userID`, `userName`, `password`, `authority`) VALUES
	('admin', 'System Administrator', '$2y$10$VIBa5Ziq56jFt5HjI83EKOzG7618HQ9vVp7N3cSB.HJiNMvcCs2ay', 'admin'),
	('chen', '陳三', '$2y$10$5uxs0M2xC8BPCoG6fpRa4ed34W13abvrQVJYkylOZqHzV2FUsZ9tW', 'normal'),
	('wang', '王二', '$2y$10$22tEDfluV8Y9cCsBKd418.6BQhmwScwkc696gD6AKMwXeKUiwm5xm', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
