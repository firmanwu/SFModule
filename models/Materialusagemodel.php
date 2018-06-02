<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialusagemodel extends CI_Model {

    public function insertMaterialUsageData($materialUsageData)
    {
        $result = $this->db->insert('materialusage', $materialUsageData);

        return $result;
    }

    public function queryMaterialUsageData()
    {
        $this->db->select('
            materialusage.materialUsageID,
            material.materialName,
            materialusage.usingDepartment');
        $this->db->from('materialusage');
        $this->db->join('material', 'materialusage.material = material.materialID');
        $result = $this->db->get();

        return $result;
    }

    public function deleteMaterialUsageData($materialUsageData)
    {
        $this->db->where('materialUsageID', $materialUsageData['materialUsageID']);
        $result = $this->db->delete('materialusage');

        return $result;
    }
}