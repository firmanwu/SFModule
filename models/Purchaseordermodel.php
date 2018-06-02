<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaseordermodel extends CI_Model {

    public function insertPurchaseOrderData($purchaseOrderData)
    {
        $result = $this->db->insert('purchaseorder', $purchaseOrderData);

        return $result;
    }

    public function queryPurchaseOrderData()
    {
        $result = $this->db->get('purchaseorder');

        return $result;
    }

    public function deletePurchaseOrderData($purchaseOrderData)
    {
        $this->db->where('purchaseOrderID', $purchaseOrderData['purchaseOrderID']);
        $result = $this->db->delete('purchaseorder');

        return $result;
    }

    public function queryPurchaseOrderSpecificColumn($queryData, $isOneRow)
    {
        $result = $this->db->query($queryData);

        if (true == $isOneRow) {
            return $result->row_array();
        }
        else {
            return $result;
        }
    }
}