<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class finishedGoodEntryModel extends CI_Model {

    public function insertFinishedGoodEntryData($finishedGoodEntryData)
    {
        $result = $this->db->insert('finishedgoodentry', $finishedGoodEntryData);

        return $result;
    }

    public function queryFinishedGoodEntryData($queryData)
    {
        $this->db->select('
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
}