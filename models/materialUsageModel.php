<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materialUsageModel extends CI_Model {

    public function insertMaterialUsageData($materialUsageData)
    {
        $result = $this->db->insert('materialusage', $materialUsageData);

        return $result;
    }
}