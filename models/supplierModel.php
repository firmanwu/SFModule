<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplierModel extends CI_Model {

    public function insertSupplierData($supplierData)
    {
        $result = $this->db->insert('supplier', $supplierData);

        return $result;
    }

    public function querySupplierData($queryData)
    {
        $this->db->where($queryData);
        $result = $this->db->get('supplier');

        return $result;
    }

    public function querySupplierSpecificColumn($queryData)
    {
        $result = $this->db->query($queryData);

        return $result;
    }

    public function querySupplierMaterialUnitWeightData($supplier)
    {
        $queryData = 'SELECT unitWeight FROM supplier where supplierID = ' . $supplier;
        $query = $this->querySupplierSpecificColumn($queryData);

        $row = $query->row_array();
        if (isset($row)) {
            return $row['unitWeight'];
        }
    }
}