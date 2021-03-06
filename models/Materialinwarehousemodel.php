<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialinwarehousemodel extends CI_Model {

    public function insertMaterialInWarehouseData($materialEntryData)
    {
        $materialInWarehouseData['material'] = $materialEntryData['material'];
        $materialInWarehouseData['materialEntry'] = $materialEntryData['materialEntryID'];
        $materialInWarehouseData['supplier'] = $materialEntryData['supplier'];
        $materialInWarehouseData['packagingID'] = $materialEntryData['packagingID'];
        $materialInWarehouseData['storedArea'] = $materialEntryData['expectedStoredArea'];
        // For Taiwan GMT+8
        $currentDateTime = gmdate("Y-m-d H:i:s", (time() + (28800)));
        $materialInWarehouseData['storedDate'] = $currentDateTime;
        $materialInWarehouseData['storedPackageNumber'] = $materialEntryData['expectedStoredPackageNumber'];
        
        $materialInWarehouseData['storedWeight'] = $materialEntryData['expectedStoredWeight'];
        $materialInWarehouseData['storedMoney'] = $materialEntryData['expectedStoredMoney'];
        $materialInWarehouseData['remainingPackageNumber'] = $materialInWarehouseData['storedPackageNumber'];
        $materialInWarehouseData['remainingMoney'] = $materialInWarehouseData['storedMoney'];
        $result = $this->db->insert('materialinwarehouse', $materialInWarehouseData);

        return $materialInWarehouseData;
    }

    public function queryMaterialInWarehouseData()
    {
        $this->db->select('
            materialinwarehouse.material,
            material.materialName,
            materialinwarehouse.materialEntry,
            supplier.supplierName,
            packaging.packaging,
            materialinwarehouse.storedArea,
            materialinwarehouse.storedDate,
            materialinwarehouse.storedPackageNumber,
            materialinwarehouse.storedWeight,
            materialinwarehouse.storedMoney,
            materialinwarehouse.remainingPackageNumber,
            materialinwarehouse.remainingMoney');
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->order_by('materialinwarehouse.storedDate', 'ASC');
        $this->db->where('materialinwarehouse.remainingPackageNumber >', 0);
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialInWarehouseDataByStoredMaterialID($storedMaterialID)
    {
        $this->db->select('
            materialinwarehouse.material,
            material.materialName,
            materialinwarehouse.supplier,
            supplier.supplierName,
            supplier.unitPrice,
            materialinwarehouse.packagingID,
            packaging.packaging,
            packaging.unitWeight,
            materialinwarehouse.storedArea');
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->where('materialinwarehouse.storedMaterialID', $storedMaterialID);
        $result = $this->db->get();

        return $result->row_array();
    }

    public function queryMaterialNameIDInWarehouseData()
    {
        $this->db->select('
            materialinwarehouse.material,
            material.materialName');
        $this->db->distinct();
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->where('materialinwarehouse.remainingPackageNumber >', 0);
         $this->db->order_by('materialinwarehouse.material', 'ASC');
        $result = $this->db->get();

        return $result;
    }

    public function querySupplierNameIDInWareHouseByMaterialIDData($materialID)
    {
        $this->db->select('
            materialinwarehouse.supplier,
            supplier.supplierName');
        $this->db->distinct();
        $this->db->from('materialinwarehouse');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->where('materialinwarehouse.material', $materialID);
        $result = $this->db->get();

        return $result;
    }

    public function queryPackagingNameIDInWareHouseByMaterialSupplierIDData($materialID, $supplierID)
    {
        $this->db->select('
            materialinwarehouse.packagingID,
            packaging.packaging');
        $this->db->distinct();
        $this->db->from('materialinwarehouse');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->where('materialinwarehouse.material', $materialID);
        $this->db->where('materialinwarehouse.supplier', $supplierID);
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialInWarehouseDataByMaterialSupplierIDData(
        $materialID,
        $supplierID)
    {
        $this->db->select('
            materialinwarehouse.storedMaterialID,
            materialinwarehouse.materialEntry,
            materialinwarehouse.material,
            material.materialName,
            supplier.supplierName,
            packaging.packaging,
            materialinwarehouse.storedArea,
            materialinwarehouse.storedPackageNumber,
            materialinwarehouse.storedWeight,
            materialinwarehouse.remainingPackageNumber');
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->where('materialinwarehouse.material', $materialID);
        if ("0" != $supplierID) {
            $this->db->where('materialinwarehouse.supplier', $supplierID);
        }
        $this->db->where('materialinwarehouse.remainingPackageNumber >', 0);
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialInWarehouseDataByMaterialSupplierPackagingIDData(
        $materialID,
        $supplierID,
        $packagingID)
    {
        $this->db->select('
            materialinwarehouse.materialEntry,
            material.materialName,
            supplier.supplierName,
            packaging.packaging,
            materialinwarehouse.storedArea,
            materialinwarehouse.storedPackageNumber,
            materialinwarehouse.remainingPackageNumber');
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->where('materialinwarehouse.material', $materialID);
        $this->db->where('materialinwarehouse.supplier', $supplierID);
        $this->db->where('materialinwarehouse.packagingID', $packagingID);
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialInWarehouseDataByMaterialSupplierPackagingAreaData(
        $materialID,
        $supplierID,
        $packagingID,
        $area)
    {
        $this->db->select('
            materialinwarehouse.storedMaterialID,
            materialinwarehouse.materialEntry,
            material.materialName,
            supplier.supplierName,
            packaging.packaging,
            materialinwarehouse.storedArea,
            materialinwarehouse.storedPackageNumber,
            materialinwarehouse.remainingPackageNumber');
        $this->db->from('materialinwarehouse');
        $this->db->join('material', 'materialinwarehouse.material = material.materialID');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $this->db->where('materialinwarehouse.material', $materialID);
        $this->db->where('materialinwarehouse.supplier', $supplierID);
        $this->db->where('materialinwarehouse.packagingID', $packagingID);
        $this->db->where('materialinwarehouse.storedArea', $area);
        $this->db->where('materialinwarehouse.remainingPackageNumber >', 0);
        $result = $this->db->get();

        return $result;
    }

    public function queryAreaInWarehouseByMaterialSupplierPackagingIDData(
        $materialID,
        $supplierID,
        $packagingID)
    {
        $this->db->select('materialinwarehouse.storedArea');
        $this->db->from('materialinwarehouse');
        $this->db->where('material', $materialID);
        $this->db->where('supplier', $supplierID);
        $this->db->where('packagingID', $packagingID);
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialInWareHouseStoredPackageNumberWeightMoney(
        $material,
        $supplier,
        $packaging)
    {
        $this->db->select('storedPackageNumber, storedWeight, storedMoney');
        $this->db->from('materialinwarehouse');
        $this->db->where('material', $material);
        $this->db->where('supplier', $supplier);
        $this->db->where('packagingID', $packaging);
        $result = $this->db->get();

        return $result->row_array();
    }

    public function updateMaterialInWareHouseQuantityData(
        $material,
        $supplier,
        $packaging,
        $packageNumber,
        $weight,
        $money)
    {
        $this->db->set('storedPackageNumber', 'storedPackageNumber + ' . $packageNumber, FALSE);
        $this->db->set('storedWeight', 'storedWeight + ' . $weight, FALSE);
        $this->db->set('storedMoney', 'storedMoney + ' . $money, FALSE);
        $this->db->where('material', $material);
        $this->db->where('supplier', $supplier);
        $this->db->where('packagingID', $packaging);
        $result = $this->db->update('materialinwarehouse');
    }

    public function updateRemainingPackageNumberData($storedMaterialID, $packageNumber, $money)
    {
        $this->db->set('remainingPackageNumber', 'remainingPackageNumber + ' . $packageNumber, FALSE);
        $this->db->set('remainingMoney', 'remainingMoney + ' . $money, FALSE);
        $this->db->where('storedMaterialID', $storedMaterialID);
        $result = $this->db->update('materialinwarehouse');
    }

    public function calculateRemainingMoneyData()
    {
        $this->db->select('
            materialinwarehouse.storedMaterialID,
            materialinwarehouse.remainingPackageNumber,
            supplier.unitPrice,
            packaging.unitWeight');
        $this->db->from('materialinwarehouse');
        $this->db->join('supplier', 'materialinwarehouse.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialinwarehouse.packagingID = packaging.packagingID');
        $result = $this->db->get();

        foreach($result->result_array() as $row)
        {
            if (0 == $row['remainingPackageNumber']) {
                continue;
            }

            $money = $row['remainingPackageNumber'] * $row['unitWeight'] * $row['unitPrice'];
            $this->db->set('remainingMoney', $money, FALSE);
            $this->db->where('storedMaterialID', $row['storedMaterialID']);
            $result = $this->db->update('materialinwarehouse');
        }
    }

    public function updateStoredAreaData($materialEntry, $storedArea)
    {
        $this->db->set('storedArea', $storedArea);
        $this->db->where('materialEntry', $materialEntry);
        $result = $this->db->update('materialinwarehouse');
    }
}