<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisitiondepartmentmodel extends CI_Model {

    public function insertRequisitionDepartmentData($requisitionDepartmentData)
    {
        $result = $this->db->insert('requisitiondepartment', $requisitionDepartmentData);

        return $result;
    }

    public function queryRequisitionMemberData()
    {
        $this->db->select('requisitionDepartment, requisitionMember');
        $this->db->from('requisitiondepartment');
        $result = $this->db->get();

        return $result;
    }

    public function queryRequisitionMemberByDepartmentData($department)
    {
        $this->db->select('requisitionMember');
        $this->db->from('requisitiondepartment');
        $this->db->where('requisitionDepartment', urldecode($department));
        $result = $this->db->get();

        return $result;
    }

    public function queryUsingDepartmentByMaterialUsageID($materialUsageID)
    {
        $this->db->select('usingDepartment');
        $this->db->from('materialusage');
        $this->db->where('materialUsageID', $materialUsageID);
        $result = $this->db->get();

        return $result->row_array();
    }
}