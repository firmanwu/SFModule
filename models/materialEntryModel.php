<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materialEntryModel extends CI_Model {

    public function insertMaterialEntryData($materialEntryData)
    {
        $result = $this->db->insert('materialentry', $materialEntryData);

        return $result;
    }
}