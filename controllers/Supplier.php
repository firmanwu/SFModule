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

    public function querySupplier()
    {
        $this->load->model('suppliermodel');

        $selectedColumn = $this->input->post('querySupplierColumn');
        $value = $this->input->post('querySupplierValue');
        $queryData = array($selectedColumn => $value);

        $query = $this->suppliermodel->querySupplierData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->supplierID;
            echo $row->supplierName;
            echo $row->product;
            echo $row->packaging;
            echo $row->unitWeight;
            echo $row->price;
            echo "<br>";
        }
    }
}
