<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suppliermodel extends CI_Model {

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

    public function querySupplierSpecificColumn($queryData, $isOneRow)
    {
        $result = $this->db->query($queryData);

        if (true == $isOneRow) {
            return $result->row_array();
        }
        else {
            return $result;
        }
    }

    public function querySupplierMaterialUnitWeightData($supplier)
    {
        $queryData = 'SELECT unitWeight FROM supplier where supplierID = ' . $supplier;
        $query = $this->querySupplierSpecificColumn($queryData, true);

        if (isset($query)) {
            return $query['unitWeight'];
        }
    }
}