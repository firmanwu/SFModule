<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodpackagingmodel extends CI_Model {

    public function insertFinishedGoodPackagingData($finishedGoodPackagingData)
    {
        $result = $this->db->insert('finishedgoodpackaging', $finishedGoodPackagingData);

        return $result;
    }

    public function queryFinishedGoodPackagingData()
    {
        $result = $this->db->get('finishedgoodpackaging');

        return $result;
    }

    public function deleteFinishedGoodPackagingData($packagingData)
    {
        $this->db->where('packagingID', $packagingData['packagingID']);
        $result = $this->db->delete('packaging');

        return $result;
    }

    public function queryFinishedGoodPackagingSpecificColumn($queryData, $isOneRow)
    {
        $result = $this->db->query($queryData);

        if (true == $isOneRow) {
            return $result->row_array();
        }
        else {
            return $result;
        }
    }

    public function queryFinishedGoodPackagingByPackagingID($packagingID)
    {
        $this->db->select('packaging');
        $this->db->from('packaging');
        $this->db->where('packagingID', $packagingID);
        $result = $this->db->get();

        return $result->row_array();
    }

    public function queryFinishedGoodPackagingUnitWeightByPackagingID($packagingID)
    {
        $this->db->select('unitWeight');
        $this->db->from('packaging');
        $this->db->where('packagingID', $packagingID);
        $result = $this->db->get();

        return $result->row_array();
    }
}