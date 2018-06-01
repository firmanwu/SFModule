<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialentrymodel extends CI_Model {

    public function insertMaterialEntryData($materialEntryData)
    {
        $result = $this->db->insert('materialentry', $materialEntryData);

        return $result;
    }

    public function queryMaterialEntryData($isConfirmed)
    {
        $this->db->select('
            materialentry.materialEntryID,
            materialentry.serialNumber,
            materialentry.purchaseOrder,
            materialentry.storedArea,
            materialentry.QRCode,
            materialentry.material,
            material.materialName,
            materialentry.batchNumber,
            purchaseorder.purchaseCondition,
            materialentry.storedDate,
            supplier.supplierName,
            supplier.packaging,
            supplier.unitWeight,
            materialentry.packageNumberOfPallet,
            materialentry.palletNumber,
            materialentry.storedPackageNumber,
            materialentry.storedWeight,
            materialusage.usingDepartment,
            supplier.price,
            materialentry.confirmation');
        $this->db->from('materialentry');
        $this->db->join('material', 'materialentry.material = material.materialID');
        $this->db->join('purchaseorder', 'materialentry.purchaseOrder = purchaseorder.purchaseOrderID');
        $this->db->join('supplier', 'materialentry.supplier = supplier.supplierID');
        $this->db->join('materialusage', 'materialentry.material = materialusage.material');
        $this->db->where('materialentry.confirmation', $isConfirmed);
        $result = $this->db->get();

        return $result;
    }

    public function deleteMaterialEntryData($materialEntryData)
    {
        $this->db->where('materialEntryID', $materialEntryData['materialEntryID']);
        $result = $this->db->delete('materialentry');

        return $result;
    }
}