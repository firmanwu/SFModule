<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialentry extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'title' => 'Material entry page',
            'message' => 'Material entry page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('materialEntryView');
        $this->load->view('footer');
    }

    public function addMaterialEntry()
    {
        $this->load->model('materialentrymodel');

        $materialEntryData['materialEntryID'] = $this->input->post('materialEntryID');
        $materialEntryData['purchaseOrder'] = $this->input->post('purchaseOrder');
        $materialEntryData['storedArea'] = $this->input->post('storedArea');
        $materialEntryData['serialNumber'] = $this->input->post('serialNumber');
        //$materialEntryData['QRCode'] = $this->input->post('QRCode');
        $materialEntryData['material'] = $this->input->post('material');
        $materialEntryData['batchNumber'] = $this->input->post('batchNumber');
        $materialEntryData['storedDate'] = $this->input->post('storedDate');
        $materialEntryData['packageNumberOfPallet'] = $this->input->post('packageNumberOfPallet');
        $materialEntryData['palletNumber'] = $this->input->post('palletNumber');
        $materialEntryData['storedPackageNumber'] = $this->input->post('storedPackageNumber');
        $materialEntryData['storedWeight'] = $this->input->post('storedWeight');

        $result = $this->materialentrymodel->insertMaterialEntryData($materialEntryData);
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
