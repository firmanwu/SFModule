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
}