<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class finishedGoodModel extends CI_Model {

    public function insertFinishedGoodData($finishedGoodData)
    {
        $result = $this->db->insert('finishedgood', $finishedGoodData);

        return $result;
    }

    public function queryFinishedGoodData($queryData)
    {
        /*$this->db->select('
            material.materialID,
            material.materialName,
            supplier.supplierName,
            supplier.packaging,
            supplier.unitWeight,
            materialusage.usingDepartment,
            supplier.price');
        $this->db->from('material');
        $this->db->join('supplier', 'material.materialID = supplier.product');
        $this->db->join('materialusage', 'material.materialID = materialusage.material');*/
        $result = $this->db->get('finishedgood');

        return $result;
    }

    public function queryFinishedGoodSpecificColumn($queryData)
    {
        $result = $this->db->query($queryData);

        return $result->row_array();
    }

    public function updateFinishedGoodQuantityData($product, $packageNumber, $weight)
    {
        $this->db->set('totalPackageNumber', 'totalPackageNumber + ' . $packageNumber, FALSE);
        $this->db->set('totalWeight', 'totalWeight + ' . $weight, FALSE);
        $this->db->where('finishedGoodID', $product);
        $this->db->update('finishedgood');
    }
}