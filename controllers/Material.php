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

        // useless
        $selectedColumn = $this->input->post('queryMaterialColumn');
        $value = $this->input->post('queryMaterialValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->materialmodel->queryMaterialData($queryData);
        //print_r($query->result_array());
        foreach($query->result() as $row)
        {
            echo $row->materialID;
            echo $row->materialName;
            echo $row->purchaseCondition;
            echo $row->supplierName;
            echo $row->packaging;
            echo $row->unitWeight;
            echo $row->usingDepartment;
            echo $row->price;
            echo "<br>";
        }
    }
}
