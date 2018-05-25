<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class supplierModel extends CI_Model {

    public function insertSupplierData($supplierData)
    {
        $result = $this->db->insert('supplier', $supplierData);

        return $result;
    }

    public function querySupplierData()
    {
        $result = $this->db->get('supplier');

        return $result;
    }

    public function deleteSupplierData($supplierData)
    {
        $this->db->where('supplierID', $supplierData['supplierID']);
        $result = $this->db->delete('supplier');

        return $result;
    }

    public function querySupplierSpecificColumn($queryData)
    {
        $result = $this->db->query($queryData);

        return $result->row_array();
    }

    public function querySupplierMaterialUnitWeightData($supplier)
    {
        $queryData = 'SELECT unitWeight FROM supplier where supplierID = ' . $supplier;
        $query = $this->querySupplierSpecificColumn($queryData);

        if (isset($query)) {
            return $query['unitWeight'];
        }
    }
}