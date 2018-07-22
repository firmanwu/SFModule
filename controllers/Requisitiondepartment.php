<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisitiondepartment extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/
    }

    public function addRequisitionDepartmentView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '新增領料單位人員'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addRequisitionDepartmentView');
        $this->load->view('footer');
    }

    public function addRequisitionDepartment()
    {
        $this->load->model('requisitiondepartmentmodel');

        $requisitionDepartmentData['requisitionDepartment'] = $this->input->post('requisitionDepartment');
        $requisitionDepartmentData['requisitionMember'] = $this->input->post('requisitionMember');

        $result = $this->requisitiondepartmentmodel->insertRequisitionDepartmentData($requisitionDepartmentData);
        if (true == $result) {
            echo json_encode($requisitionDepartmentData);
        }
    }

    public function queryRequisitionDepartmentView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '查詢領料單位人員'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryRequisitionDepartmentView');
        $this->load->view('footer');
    }

    public function queryRequisitionDepartment()
    {
        $this->load->model('requisitiondepartmentmodel');

        $query = $this->requisitiondepartmentmodel->queryRequisitionMemberData();
        echo json_encode($query->result_array());
    }

    public function queryRequisitionMemberByDepartment($department)
    {
        $this->load->model('requisitiondepartmentmodel');

        $query = $this->requisitiondepartmentmodel->queryRequisitionMemberByDepartmentData($department);
        echo json_encode($query->result_array());
    }
}
