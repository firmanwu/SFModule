<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class materialRequisitionModel extends CI_Model {

    public function insertMaterialRequisitionData($materialRequisitionData)
    {
        $result = $this->db->insert('materialrequisition', $materialRequisitionData);

        return $result;
    }

//------------------------------------------------
    public function deleteUserData($userData)
    {
        $this->db->where('userID', $userData['userID']);
        $result = $this->db->delete('account');

        return $result;
    }

    public function updatePasswordData($userData)
    {
        // Get ID from session data
        $passwordData = array(
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT)
        );
        //$userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        $this->db->where('userID', $userData['userID']);
        $result = $this->db->update('account', $passwordData);

        return $result;
    }
}