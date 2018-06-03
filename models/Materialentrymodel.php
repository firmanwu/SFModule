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
            purchaseorder.material,
            material.materialName,
            materialentry.batchNumber,
            purchaseorder.purchaseCondition,
            materialentry.storedDate,
            supplier.supplierName,
            packaging.packaging,
            packaging.unitWeight,
            materialentry.packageNumberOfPallet,
            materialentry.palletNumber,
            materialentry.storedPackageNumber,
            materialentry.storedWeight,
            materialusage.usingDepartment,
            supplier.unitPrice,
            materialentry.storedMoney,
            materialentry.confirmation');
        $this->db->from('materialentry');
        $this->db->join('purchaseorder', 'materialentry.purchaseOrder = purchaseorder.purchaseOrderID');
        $this->db->join('material', 'purchaseOrder.material = material.materialID');
        $this->db->join('supplier', 'purchaseOrder.supplier = supplier.supplierID');
        $this->db->join('packaging', 'purchaseOrder.packaging = packaging.packagingID');
        $this->db->join('materialusage', 'purchaseOrder.material = materialusage.material');
        $this->db->where('materialentry.confirmation', $isConfirmed);
        $this->db->order_by('materialentry.materialEntryID', 'ASC');
        $result = $this->db->get();

        return $result;
    }

    // To update totalPackageNumber, totalWeight and totalMoney by material ID
    public function queryMaterialEntryDataToUpdateMaterial($materialEntryID)
    {
        $this->db->select('
            purchaseorder.material,
            materialentry.storedPackageNumber,
            materialentry.storedWeight,
            materialentry.storedMoney');
        $this->db->from('materialentry');
        $this->db->join('purchaseorder', 'materialentry.purchaseOrder = purchaseorder.purchaseOrderID');
        $this->db->where('materialentry.materialEntryID', $materialEntryID);
        $result = $this->db->get();

        return $result->row_array();
    }

    public function deleteMaterialEntryData($materialEntryData)
    {
        $this->db->where('materialEntryID', $materialEntryData['materialEntryID']);
        $result = $this->db->delete('materialentry');

        return $result;
    }

    public function updateMaterialEntryConfirmationData($materialEntryID)
    {
        $this->db->set('confirmation', 1, FALSE);
        $this->db->where('materialEntryID', $materialEntryID);
        $this->db->update('materialentry');
    }

    public function updateMaterialEntryPackageNumberData(
        $materialEntryID,
        $packageNumberOfPallet,
        $palletNumber,
        $storedPackageNumber,
        $storedWeight,
        $storedMoney
    )
    {
        $this->db->set('packageNumberOfPallet', 'packageNumberOfPallet + ' . $packageNumberOfPallet, FALSE);
        $this->db->set('palletNumber', 'palletNumber + ' . $palletNumber, FALSE);
        $this->db->set('storedPackageNumber', 'storedPackageNumber + ' . $storedPackageNumber, FALSE);
        $this->db->set('storedWeight', 'storedWeight + ' . $storedWeight, FALSE);
        $this->db->set('storedMoney', 'storedMoney + ' . $storedMoney, FALSE);
        $this->db->where('materialEntryID', $materialEntryID);
        $this->db->update('materialentry');
    }
}