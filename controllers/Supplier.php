<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'title' => 'Supplier page',
            'message' => 'Supplier page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('supplierView');
        $this->load->view('footer');
    }

    public function addSupplier()
    {
        $this->load->model('suppliermodel');

        $supplierData['supplierID'] = $this->input->post('supplierID');
        $supplierData['supplierName'] = $this->input->post('supplierName');
        $supplierData['product'] = $this->input->post('product');
        $supplierData['packaging'] = $this->input->post('packaging');
        $supplierData['unitWeight'] = $this->input->post('unitWeight');
        $supplierData['price'] = $this->input->post('price');

        $result = $this->suppliermodel->insertSupplierData($supplierData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

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
