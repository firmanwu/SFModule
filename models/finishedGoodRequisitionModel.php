<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class finishedGoodRequisitionModel extends CI_Model {

    public function insertFinishedGoodRequisitionData($finishedGoodRequisitionData)
    {
        $result = $this->db->insert('finishedgoodrequisition', $finishedGoodRequisitionData);

        return $result;
    }

    public function queryFinishedGoodRequisitionData()
    {
        $this->db->select('
            finishedgoodrequisition.finishedGoodRequistionID,
            finishedgoodrequisition.requisitioningDate,
            finishedgoodrequisition.product,
            finishedgood.finishedGoodType,
            finishedgoodrequisition.requisitioningDepartment,
            finishedgoodrequisition.requisitioningMember,
            finishedgoodrequisition.requisitionedPackageNumber,
            finishedgood.unitWeight,
            finishedgoodrequisition.requisitionedPalletNumber,
            finishedgoodrequisition.requisitionedWeight,
            finishedgoodrequisition.remainingPackageNumber,
            finishedgoodrequisition.remainingWeight');
        $this->db->from('finishedgoodrequisition');
        $this->db->join('finishedgood', 'finishedgoodrequisition.product = finishedgood.finishedGoodID');
        $result = $this->db->get();

        return $result;
    }

    public function deleteFinishedGoodRequisitionData($finishedGoodEntryData)
    {
        $this->db->where('finishedGoodRequistionID', $finishedGoodEntryData['finishedGoodRequistionID']);
        $result = $this->db->delete('finishedgoodrequisition');

        return $result;
    }
}