<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materialRequisitionModel extends CI_Model {

    public function insertMaterialRequisitionData($materialRequisitionData)
    {
        $result = $this->db->insert('materialrequisition', $materialRequisitionData);

        return $result;
    }

    public function queryMaterialRequisitionData($queryData)
    {
        $this->db->select('
            materialrequisition.materialRequisitionID,
            materialrequisition.requisitioningDate,
            material.materialName,
            materialrequisition.requisitioningDepartment,
            materialrequisition.requisitioningMember,
            supplier.supplierName,
            supplier.packaging,
            supplier.unitWeight,
            materialrequisition.requisitionedPackageNumber,
            materialrequisition.requisitionedWeight,
            materialrequisition.remainingPackageNumber,
            materialrequisition.remainingWeight');
        $this->db->from('materialrequisition');
        $this->db->join('material', 'materialrequisition.material = material.materialID');
        $this->db->join('supplier', 'materialrequisition.supplier = supplier.supplierID');
        $result = $this->db->get();

        return $result;
    }
}