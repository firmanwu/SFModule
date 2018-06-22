<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialrequisitionmodel extends CI_Model {

    public function insertMaterialRequisitionData($materialRequisitionData)
    {
        $result = $this->db->insert('materialrequisition', $materialRequisitionData);

        return $result;
    }

    public function queryMaterialRequisitionData()
    {
        $this->db->select('
            materialrequisition.materialRequisitionID,
            material.materialName,
            supplier.supplierName,
            packaging.packaging,
            materialrequisition.requisitioningDate,
            materialusage.usingDepartment,
            materialrequisition.requisitioningMember,
            materialrequisition.requisitionedPackageNumber,
            materialrequisition.notOutPackageNumber');
        $this->db->from('materialrequisition');
        $this->db->join('material', 'materialrequisition.material = material.materialID');
        $this->db->join('supplier', 'materialrequisition.supplier = supplier.supplierID');
        $this->db->join('packaging', 'materialrequisition.packaging = packaging.packagingID');
        $this->db->join('materialusage', 'materialrequisition.material = materialusage.material');
        $result = $this->db->get();

        return $result;
    }

    public function queryMaterialRequisitionIDData()
    {
        $this->db->select('materialRequisitionID');
        $this->db->from('materialrequisition');
        $result = $this->db->get();

        return $result;
    }

    public function deleteMaterialRequisitionData($materialRequisitionData)
    {
        $this->db->where('materialRequisitionID', $materialRequisitionData['materialRequisitionID']);
        $result = $this->db->delete('materialrequisition');

        return $result;
    }
}