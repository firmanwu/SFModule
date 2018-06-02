<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packagingmodel extends CI_Model {

    public function insertPackagingData($packagingData)
    {
        $result = $this->db->insert('packaging', $packagingData);

        return $result;
    }

    public function queryPackagingData()
    {
        $result = $this->db->get('packaging');

        return $result;
    }

    public function deletePackagingData($packagingData)
    {
        $this->db->where('packagingID', $packagingData['packagingID']);
        $result = $this->db->delete('packaging');

        return $result;
    }

    public function queryPackagingSpecificColumn($queryData, $isOneRow)
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