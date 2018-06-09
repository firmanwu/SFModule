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

-- 取消選取資料匯出。
-- 傾印  表格 sf.finishedgoodentry 結構
CREATE TABLE IF NOT EXISTS `finishedgoodentry` (
  `finishedGoodEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `storedArea` varchar(8) NOT NULL,
  `batchNumber` varchar(256) NOT NULL,
  `product` varchar(256) NOT NULL,
  `storedDate` date NOT NULL,
  `storedPackageNumber` int(16) NOT NULL,
  `palletNumber` int(16) NOT NULL,
  `storedWeight` int(16) NOT NULL,
  PRIMARY KEY (`finishedGoodEntryID`),
  KEY `entryFinishedGood` (`product`),
  CONSTRAINT `entryFinishedGood` FOREIGN KEY (`product`) REFERENCES `finishedgood` (`finishedGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 取消選取資料匯出。
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

-- 取消選取資料匯出。
-- 傾印  表格 sf.material 結構
CREATE TABLE IF NOT EXISTS `material` (
  `materialID` varchar(256) NOT NULL,
  `materialName` varchar(256) NOT NULL,
  `totalPackageNumber` int(8) NOT NULL DEFAULT 0,
  `totalWeight` int(16) NOT NULL DEFAULT 0,
  `totalMoney` int(16) NOT NULL DEFAULT 0,
  PRIMARY KEY (`materialID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 取消選取資料匯出。
-- 傾印  表格 sf.materialentry 結構
CREATE TABLE IF NOT EXISTS `materialentry` (
  `materialEntryID` varchar(256) NOT NULL,
  `serialNumber` varchar(256) NOT NULL,
  `purchaseOrder` varchar(256) NOT NULL,
  `QRCode` blob DEFAULT NULL,
  `storedArea` varchar(8) NOT NULL,
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

-- 取消選取資料匯出。
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

-- 取消選取資料匯出。
-- 傾印  表格 sf.materialusage 結構
CREATE TABLE IF NOT EXISTS `materialusage` (
  `materialUsageID` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `material` varchar(256) NOT NULL DEFAULT '0',
  `usingDepartment` varchar(256) NOT NULL DEFAULT '0',
  PRIMARY KEY (`materialUsageID`),
  KEY `materialUsageMaterialID` (`material`),
  CONSTRAINT `materialUsageMaterialID` FOREIGN KEY (`material`) REFERENCES `material` (`materialID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 取消選取資料匯出。
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

-- 取消選取資料匯出。
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

-- 取消選取資料匯出。
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

-- 取消選取資料匯出。
-- 傾印  表格 sf.user 結構
CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(256) NOT NULL,
  `userName` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `authority` char(8) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 取消選取資料匯出。
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
