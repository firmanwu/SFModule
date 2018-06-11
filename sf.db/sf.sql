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
	('013A', '精鹽', 30, 750, 3000),
	('113', '尿素膠', 60, 14400, 230400),
	('217', '鋁粉', 0, 0, 0),
	('219A', '二甲苯', 0, 0, 0),
	('435', '土狀黑鉛', 6, 6000, 84000),
	('439A', '氧化鐵', 0, 0, 0);
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

-- 傾印  表格 sf.materialentry 結構
CREATE TABLE IF NOT EXISTS `materialentry` (
  `materialEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `purchaseOrder` varchar(256) NOT NULL,
  `QRCode` blob DEFAULT NULL,
  `expectedStoredArea` varchar(8) NOT NULL,
  `expectedStoredDate` date NOT NULL,
  `packageNumberOfPallet` int(16) NOT NULL,
  `palletNumber` int(16) NOT NULL,
  `expectedStoredPackageNumber` int(8) NOT NULL,
  `expectedStoredWeight` int(16) NOT NULL,
  `expectedStoredMoney` int(16) NOT NULL,
  `confirmation` tinyint(4) NOT NULL,
  PRIMARY KEY (`materialEntryID`),
  KEY `entryPurchaseOrder` (`purchaseOrder`),
  CONSTRAINT `entryPurchaseOrder` FOREIGN KEY (`purchaseOrder`) REFERENCES `purchaseorder` (`purchaseOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialentry 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `materialentry` DISABLE KEYS */;
REPLACE INTO `materialentry` (`materialEntryID`, `serialNumber`, `purchaseOrder`, `QRCode`, `expectedStoredArea`, `expectedStoredDate`, `packageNumberOfPallet`, `palletNumber`, `expectedStoredPackageNumber`, `expectedStoredWeight`, `expectedStoredMoney`, `confirmation`) VALUES
	('EN001', '20180611001', 'PO001', NULL, 'A', '2018-06-11', 10, 3, 30, 750, 3000, 1),
	('EN002', '20180611002', 'PO002', NULL, 'B', '2018-06-11', 7, 4, 28, 28000, 448000, 0),
	('EN003', '20180611003', 'PO003', NULL, 'F', '2018-06-11', 6, 3, 18, 14400, 619200, 0),
	('EN004', '20180611004', 'PO004', NULL, 'D', '2018-06-11', 2, 4, 8, 1376, 35776, 0),
	('EN005', '20180611005', 'PO005', NULL, 'C', '2018-06-11', 2, 3, 6, 6000, 84000, 1),
	('EN006', '20180611006', 'PO004', NULL, 'A', '2018-06-11', 6, 2, 12, 2064, 53664, 0),
	('EN007', '20180611007', 'PO007', NULL, 'C', '2018-06-11', 15, 4, 60, 14400, 230400, 1);
/*!40000 ALTER TABLE `materialentry` ENABLE KEYS */;

-- 傾印  表格 sf.materialinwarehouse 結構
CREATE TABLE IF NOT EXISTS `materialinwarehouse` (
  `storedMaterialID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(256) NOT NULL,
  `materialEntry` varchar(256) NOT NULL,
  `packaging` int(16) unsigned NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `storedDate` datetime NOT NULL,
  `storedPackageNumber` int(8) NOT NULL,
  `storedWeight` int(16) NOT NULL,
  `storedMoney` int(16) NOT NULL,
  PRIMARY KEY (`storedMaterialID`),
  KEY `storedMaterialID` (`material`),
  KEY `storedMaterialPackagingID` (`packaging`),
  KEY `storedMaterialEntryID` (`materialEntry`),
  CONSTRAINT `storedMaterialEntryID` FOREIGN KEY (`materialEntry`) REFERENCES `materialentry` (`materialEntryID`),
  CONSTRAINT `storedMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  CONSTRAINT `storedMaterialPackagingID` FOREIGN KEY (`packaging`) REFERENCES `packaging` (`packagingID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.materialinwarehouse 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `materialinwarehouse` DISABLE KEYS */;
REPLACE INTO `materialinwarehouse` (`storedMaterialID`, `material`, `materialEntry`, `packaging`, `storedArea`, `storedDate`, `storedPackageNumber`, `storedWeight`, `storedMoney`) VALUES
	(1, '013A', 'EN001', 1, 'A', '2018-06-11 17:17:52', 30, 750, 3000),
	(2, '113', 'EN007', 7, 'C', '2018-06-11 17:19:39', 60, 14400, 230400),
	(3, '435', 'EN005', 4, 'C', '2018-06-11 17:58:19', 6, 6000, 84000);
/*!40000 ALTER TABLE `materialinwarehouse` ENABLE KEYS */;

-- 傾印  表格 sf.materialrequisition 結構
CREATE TABLE IF NOT EXISTS `materialrequisition` (
  `materialRequisitionID` varchar(256) NOT NULL,
  `material` varchar(256) NOT NULL,
  `supplier` int(8) unsigned NOT NULL,
  `requisitioningDate` date NOT NULL,
  `requisitioningDepartment` varchar(256) NOT NULL,
  `requisitioningMember` varchar(256) NOT NULL,
  `requisitionedPackageNumber` int(8) NOT NULL DEFAULT 0,
  `requisitionedWeight` int(16) NOT NULL DEFAULT 0,
  `remainingPackageNumber` int(8) NOT NULL DEFAULT 0,
  `remainingWeight` int(16) NOT NULL DEFAULT 0,
  `remainingMoney` int(16) NOT NULL DEFAULT 0,
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
  `purchasedPackageNumber` int(16) NOT NULL DEFAULT 0,
  `notEnteredPackageNumber` int(16) NOT NULL DEFAULT 0,
  PRIMARY KEY (`purchaseOrderID`),
  KEY `purchaseOrderMaterialID` (`material`),
  KEY `purchaseOrderSupplierID` (`supplier`),
  KEY `purchaseOrderPackagingID` (`packaging`),
  CONSTRAINT `purchaseOrderMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`),
  CONSTRAINT `purchaseOrderPackagingID` FOREIGN KEY (`packaging`) REFERENCES `packaging` (`packagingID`),
  CONSTRAINT `purchaseOrderSupplierID` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`supplierID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  sf.purchaseorder 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `purchaseorder` DISABLE KEYS */;
REPLACE INTO `purchaseorder` (`purchaseOrderID`, `material`, `supplier`, `packaging`, `purchaseCondition`, `purchasedPackageNumber`, `notEnteredPackageNumber`) VALUES
	('PO001', '013A', 1, 1, '一般', 50, 20),
	('PO002', '113', 12, 6, '特採', 40, 68),
	('PO003', '217', 3, 2, '回收料', 30, 12),
	('PO004', '219A', 5, 3, '一般', 20, 0),
	('PO005', '435', 8, 4, '特採', 10, 4),
	('PO006', '439A', 10, 5, '回收料', 60, 60),
	('PO007', '113', 11, 7, '特採', 80, 20);
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

-- 正在傾印表格  sf.supplier 的資料：~12 rows (大約)
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

-- 正在傾印表格  sf.user 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`userID`, `userName`, `password`, `authority`) VALUES
	('admin', 'System Administrator', '$2y$10$VIBa5Ziq56jFt5HjI83EKOzG7618HQ9vVp7N3cSB.HJiNMvcCs2ay', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
