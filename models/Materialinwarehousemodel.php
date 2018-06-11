<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialinwarehousemodel extends CI_Model {

    public function insertMaterialInWarehouseData($materialEntryData)
    {
        $materialInWarehouseData['material'] = $materialEntryData['material'];
        $materialInWarehouseData['materialEntry'] = $materialEntryData['materialEntryID'];
        $materialInWarehouseData['packaging'] = $materialEntryData['packagingID'];
        $materialInWarehouseData['storedArea'] = $materialEntryData['expectedStoredArea'];
        // For Taiwan GMT+8
        $currentDateTime = gmdate("Y-m-d H:i:s", (time() + (28800)));
        $materialInWarehouseData['storedDate'] = $currentDateTime;
        $materialInWarehouseData['storedPackageNumber'] = $materialEntryData['expectedStoredPackageNumber'];
        $materialInWarehouseData['storedWeight'] = $materialEntryData['expectedStoredWeight'];
        $materialInWarehouseData['storedMoney'] = $materialEntryData['expectedStoredMoney'];
        $result = $this->db->insert('materialinwarehouse', $materialInWarehouseData);

        return $materialInWarehouseData;
    }
}