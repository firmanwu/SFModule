<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialrequisition extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'title' => 'Material requisition page',
            'message' => 'Material requisition page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('materialRequisitionView');
        $this->load->view('footer');
    }

    public function addMaterialRequisition()
    {
        $this->load->model('materialrequisitionmodel');

        $materialRequisitionData['materialRequisitionID'] = $this->input->post('materialRequisitionID');
        $materialRequisitionData['material'] = $this->input->post('material');
        $materialRequisitionData['requisitionDate'] = $this->input->post('requisitionDate');
        $materialRequisitionData['requisitionDepartment'] = $this->input->post('requisitionDepartment');
        $materialRequisitionData['requisitionMember'] = $this->input->post('requisitionMember');
        $materialRequisitionData['requisitionPackageNumber'] = $this->input->post('requisitionPackageNumber');
        $materialRequisitionData['requistionWeight'] = $this->input->post('requistionWeight');

        $result = $this->materialrequisitionmodel->insertMaterialRequisitionData($materialRequisitionData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

//--------------------------------------
    public function deleteUserAccount()
    {
        $this->load->model('usermodel');

        $userData['userID'] = $this->input->post('userName');

        $result = $this->usermodel->deleteUserData($userData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function updateUserPassword()
    {
        $this->load->model('usermodel');

        // get userID from session
        $userData['userID'] = $this->input->post('userName');
        $userData['password'] = $this->input->post('password');

        $result = $this->usermodel->updatePasswordData($userData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }
}
