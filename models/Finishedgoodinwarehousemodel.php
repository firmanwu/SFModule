<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodinwarehousemodel extends CI_Model {

    public function insertFinishedGoodInWarehouseData($finishedGoodEntryData)
    {
        $result = $this->db->insert('finishedgoodinwarehouse', $finishedGoodEntryData);

        return $result;
    }

    public function queryFinishedGoodInWarehouseData()
    {
        $this->db->select('
            finishedgoodinwarehouse.finishedGoodEntry,
            finishedgoodentry.product,
            finishedgood.finishedGoodType,
            finishedgoodpackaging.packaging,
            finishedgoodpackaging.unitWeight,
            finishedgoodpackaging.packageNumberOfPallet,
            finishedgoodinwarehouse.storedArea,
            finishedgoodinwarehouse.storedDate,
            finishedgoodinwarehouse.storedPalletNumber,
            finishedgoodinwarehouse.storedPackageNumber,
            finishedgoodinwarehouse.storedWeight');
        $this->db->from('finishedgoodinwarehouse');
        $this->db->join('finishedgoodentry', 'finishedgoodinwarehouse.finishedGoodEntry = finishedgoodentry.finishedGoodEntryID');
        $this->db->join('finishedgood', 'finishedgoodentry.product = finishedgood.finishedGoodID');
        $this->db->join('finishedgoodpackaging', 'finishedgoodentry.packaging = finishedgoodpackaging.finishedGoodPackagingID');
        $result = $this->db->get();

        return $result;
    }
}