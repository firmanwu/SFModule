<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'title' => 'Material page',
            'message' => 'Material page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('materialView');
        $this->load->view('footer');
    }

    public function addMaterial()
    {
        $this->load->model('materialmodel');

        $materialData['materialID'] = $this->input->post('materialID');
        $materialData['materialName'] = $this->input->post('materialName');
        $materialData['purchaseCondition'] = $this->input->post('purchaseCondition');
        $materialData['usingDepartment'] = $this->input->post('usingDepartment');
        $materialData['totalPackageNumber'] = $this->input->post('totalPackageNumber');
        $materialData['totalWeight'] = $this->input->post('totalWeight');

        $result = $this->materialmodel->insertMaterialData($materialData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function queryMaterial()
    {
        $this->load->model('materialmodel');

        $selectedColumn = $this->input->post('queryMaterialColumn');
        $value = $this->input->post('queryMaterialValue');
        $queryData = array($selectedColumn => $value);

        $query = $this->materialmodel->queryMaterialData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->materialID;
            echo $row->materialName;
            echo $row->purchaseCondition;
            echo $row->usingDepartment;
            echo $row->totalPackageNumber;
            echo $row->totalWeight;
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
