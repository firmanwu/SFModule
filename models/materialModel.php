<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materialModel extends CI_Model {

    public function insertMaterialData($materialData)
    {
        $result = $this->db->insert('material', $materialData);

        return $result;
    }

    public function queryMaterialData($queryData)
    {
        /*
        $this->db->where($queryData);
        $result = $this->db->get('material');*/
        $this->db->select('material.materialID, material.materialName, supplier.supplierName, supplier.packaging, supplier.unitWeight, materialusage.usingDepartment, supplier.price');
        $this->db->from('material');
        $this->db->join('supplier', 'material.materialID = supplier.product');
        $this->db->join('materialusage', 'material.materialID = materialusage.material');
        $result = $this->db->get();

        return $result;
    }
}