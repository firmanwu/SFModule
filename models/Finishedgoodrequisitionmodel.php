<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodrequisitionmodel extends CI_Model {

    public function insertFinishedGoodRequisitionData($finishedGoodRequisitionData)
    {
        $result = $this->db->insert('finishedgoodrequisition', $finishedGoodRequisitionData);

        return $result;
    }

    public function queryFinishedGoodRequisitionData()
    {
        $result = $this->db->get('finishedgoodrequisition');

        return $result;
    }

    public function deleteFinishedGoodRequisitionData($finishedGoodEntryData)
    {
        $this->db->where('finishedGoodRequisitionID', $finishedGoodEntryData['finishedGoodRequisitionID']);
        $result = $this->db->delete('finishedgoodrequisition');

        return $result;
    }
}
