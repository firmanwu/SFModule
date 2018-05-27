<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class finishedGoodEntryModel extends CI_Model {

    public function insertFinishedGoodEntryData($finishedGoodEntryData)
    {
        $result = $this->db->insert('finishedgoodentry', $finishedGoodEntryData);

        return $result;
    }

    public function queryFinishedGoodEntryData()
    {
        $this->db->select('
            finishedgoodentry.finishedGoodEntryID,
            finishedgoodentry.storedArea,
            finishedgoodentry.serialNumber,
            finishedgoodentry.status,
            finishedgoodentry.product,
            finishedgood.finishedGoodType,
            finishedgoodentry.storedDate,
            finishedgoodentry.batchNumber,
            finishedgoodentry.storedPackageNumber,
            finishedgood.unitWeight,
            finishedgoodentry.palletNumber,
            finishedgoodentry.storedWeight');
        $this->db->from('finishedgoodentry');
        $this->db->join('finishedgood', 'finishedgoodentry.product = finishedgood.finishedGoodID');
        $result = $this->db->get();

        return $result;
    }


    public function deleteFinishedGoodEntryData($finishedGoodEntryData)
    {
        $this->db->where('finishedGoodEntryID', $finishedGoodEntryData['finishedGoodEntryID']);
        $result = $this->db->delete('finishedgoodentry');

        return $result;
    }
}