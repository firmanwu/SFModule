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

-- 正在傾印表格  sf.finishedgood 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `finishedgood` DISABLE KEYS */;
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

-- 正在傾印表格  sf.finishedgoodentry 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `finishedgoodentry` DISABLE KEYS */;
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

-- 正在傾印表格  sf.finishedgoodrequisition 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `finishedgoodrequisition` DISABLE KEYS */;
/*!40000 ALTER TABLE `finishedgoodrequisition` ENABLE KEYS */;

-- 傾印  表格 sf.material 結構
CREATE TABLE IF NOT EXISTS `material` (
  `materialID` varchar(256) NOT NULL,
  `materialName` varchar(256) NOT NULL,
  `totalPackageNumber` int(8) NOT NULL DEFAULT 0,
  `totalWeight` int(16) NOT NULL DEFAULT 0,
  `totalMoney` int(16) NOT NULL DEFAULT 0,
  PRIMARY KEY (`materialID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.material 的資料：~6 rows (大約)
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
REPLACE INTO `material` (`materialID`, `materialName`, `totalPackageNumber`, `totalWeight`, `totalMoney`) VALUES
	('013A', '精鹽', 0, 0, 0),
	('113', '尿素膠', 100, 100000, 1600000),
	('217', '鋁粉', 0, 0, 0),
	('219A', '二甲苯', 0, 0, 0),
	('435', '土狀黑鉛', 0, 0, 0),
	('439A', '氧化鐵', 0, 0, 0);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

-- 傾印  表格 sf.materialentry 結構
CREATE TABLE IF NOT EXISTS `materialentry` (
  `materialEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `purchaseOrder` varchar(256) NOT NULL,
  `QRCode` blob DEFAULT NULL,
  `storedArea` varchar(8) NOT NULL,
  `batchNumber` varchar(256) DEFAULT NULL,
  `storedDate` date NOT NULL,
  `packageNumberOfPallet` int(16) NOT NULL,
  `palletNumber` int(16) NOT NULL,
  `storedPackageNumber` int(8) NOT NULL,
  `storedWeight` int(16) NOT NULL,
  `storedMoney` int(16) NOT NULL,
  `confirmation` tinyint(4) NOT NULL,
  PRIMARY KEY (`materialEntryID`),
  KEY `entryPurchaseOrder` (`purchaseOrder`),
  CONSTRAINT `entryPurchaseOrder` FOREIGN KEY (`purchaseOrder`) REFERENCES `purchaseorder` (`purchaseOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialentry 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `materialentry` DISABLE KEYS */;
REPLACE INTO `materialentry` (`materialEntryID`, `serialNumber`, `purchaseOrder`, `QRCode`, `storedArea`, `batchNumber`, `storedDate`, `packageNumberOfPallet`, `palletNumber`, `storedPackageNumber`, `storedWeight`, `storedMoney`, `confirmation`) VALUES
	('EN001', '20180602001', 'PO001', NULL, 'A', '20180506001', '2018-06-02', 10, 10, 100, 100000, 1600000, 0);
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

-- 正在傾印表格  sf.materialrequisition 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `materialrequisition` DISABLE KEYS */;
/*!40000 ALTER TABLE `materialrequisition` ENABLE KEYS */;

-- 傾印  表格 sf.materialusage 結構
CREATE TABLE IF NOT EXISTS `materialusage` (
  `materialUsageID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(256) NOT NULL DEFAULT '0',
  `usingDepartment` varchar(256) NOT NULL DEFAULT '0',
  PRIMARY KEY (`materialUsageID`),
  KEY `materialUsageMaterialID` (`material`),
  CONSTRAINT `materialUsageMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialusage 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `materialusage` DISABLE KEYS */;
REPLACE INTO `materialusage` (`materialUsageID`, `material`, `usingDepartment`) VALUES
	(1, '013A', '混合組'),
	(2, '113', '樹脂區'),
	(3, '217', '混合組'),
	(4, '219A', '塗模劑'),
	(5, '435', '塗模劑'),
	(6, '439A', '混合組'),
	(7, '439A', '塗模劑');
/*!40000 ALTER TABLE `materialusage` ENABLE KEYS */;

-- 傾印  表格 sf.packaging 結構
CREATE TABLE IF NOT EXISTS `packaging` (
  `packagingID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(256) NOT NULL,
  `packaging` varchar(256) NOT NULL,
  `unitWeight` int(16) NOT NULL,
  PRIMARY KEY (`packagingID`),
  KEY `packagingMaterialID` (`material`),
  CONSTRAINT `packagingMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.packaging 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `packaging` DISABLE KEYS */;
REPLACE INTO `packaging` (`packagingID`, `material`, `packaging`, `unitWeight`) VALUES
	(1, '013A', '包', 25),
	(2, '217', '噸袋', 800),
	(3, '219A', '桶', 172),
	(4, '435', '噸袋', 1000),
	(5, '439A', '噸袋', 850),
	(6, '113', '噸桶', 1000),
	(7, '113', '桶', 240);
/*!40000 ALTER TABLE `packaging` ENABLE KEYS */;

-- 傾印  表格 sf.purchaseorder 結構
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `purchaseOrderID` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `supplier` int(16) unsigned NOT NULL,
  `packaging` int(16) unsigned NOT NULL,
  `purchaseCondition` varchar(256) NOT NULL,
  PRIMARY KEY (`purchaseOrderID`),
  KEY `purchaseOrderMaterialID` (`material`),
  KEY `purchaseOrderSupplierID` (`supplier`),
  KEY `purchaseOrderPackagingID` (`packaging`),
  CONSTRAINT `purchaseOrderMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  CONSTRAINT `purchaseOrderPackagingID` FOREIGN KEY (`packaging`) REFERENCES `packaging` (`packagingID`),
  CONSTRAINT `purchaseOrderSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.purchaseorder 的資料：~1 rows (大約)
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
REPLACE INTO `purchaseorder` (`purchaseOrderID`, `material`, `supplier`, `packaging`, `purchaseCondition`) VALUES
	('PO001', '113', 11, 6, '一般');
/*!40000 ALTER TABLE `purchaseorder` ENABLE KEYS */;

-- 傾印  表格 sf.supplier 結構
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplierID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `supplierName` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `unitPrice` varchar(4) NOT NULL,
  PRIMARY KEY (`supplierID`),
  KEY `supplierMaterial` (`material`),
  CONSTRAINT `supplierMaterial` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.supplier 的資料：~10 rows (大約)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
REPLACE INTO `supplier` (`supplierID`, `supplierName`, `material`, `unitPrice`) VALUES
	(1, '建鹽', '013A', '4'),
	(2, '冠佳', '013A', '4'),
	(3, '弘竹', '217', '43'),
	(4, '鮮豐', '217', '43'),
	(5, '興龍銓', '219A', '26'),
	(6, '南方石墨', '435', '14'),
	(7, '潤優', '435', '14'),
	(8, '青島泛化', '435', '14'),
	(9, '晟邦', '435', '14'),
	(10, '穗曄', '439A', '16'),
	(11, '佳欣', '113', '16'),
	(12, ' 欣和', '113', '16');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- 傾印  表格 sf.user 結構
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `authority` char(8) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.user 的資料：~1 rows (大約)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`userID`, `userName`, `password`, `authority`) VALUES
	('admin', 'System Administrator', '$2y$10$VIBa5Ziq56jFt5HjI83EKOzG7618HQ9vVp7N3cSB.HJiNMvcCs2ay', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
