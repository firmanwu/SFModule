<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialentry extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome');
            return;
        }*/
    }

    public function addMaterialEntryView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '新增入料'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addMaterialEntryView');
        $this->load->view('footer');
    }

    public function addMaterialEntry()
    {
        $this->load->model('materialentrymodel');
        $this->load->model('suppliermodel');
        $this->load->model('materialmodel');

        $materialEntryData['materialEntryID'] = $this->input->post('materialEntryID');
        $materialEntryData['serialNumber'] = $this->input->post('serialNumber');
        $materialEntryData['purchaseOrder'] = $this->input->post('purchaseOrder');
        $materialEntryData['storedArea'] = $this->input->post('storedArea');
        //$materialEntryData['QRCode'] = $this->input->post('QRCode');
        $materialEntryData['material'] = $this->input->post('material');
        $materialEntryData['batchNumber'] = $this->input->post('batchNumber');
        $materialEntryData['storedDate'] = $this->input->post('storedDate');
        $materialEntryData['supplier'] = $this->input->post('supplier');
        $materialEntryData['packageNumberOfPallet'] = $this->input->post('packageNumberOfPallet');
        $materialEntryData['palletNumber'] = $this->input->post('palletNumber');
        $materialEntryData['storedPackageNumber'] = $materialEntryData['packageNumberOfPallet'] * $materialEntryData['palletNumber'];

        $unitWeight = $this->suppliermodel->querySupplierMaterialUnitWeightData($materialEntryData['supplier']);
        $materialEntryData['storedWeight'] = $materialEntryData['storedPackageNumber'] * $unitWeight;

        $result = $this->materialentrymodel->insertMaterialEntryData($materialEntryData);
        if (true == $result) {
            echo json_encode($materialEntryData);
        }

        $this->materialmodel->updateMaterialQuantityData($materialEntryData['material'], $materialEntryData['storedPackageNumber'], $materialEntryData['storedWeight']);
    }

    public function queryMaterialEntryView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '查詢入料'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryMaterialEntryView');
        $this->load->view('footer');
    }

    public function queryMaterialEntry()
    {
        $this->load->model('materialentrymodel');

        $query = $this->materialentrymodel->queryMaterialEntryData();
        echo json_encode($query->result_array());
    }

    public function deleteMaterialEntry($materialEntryID)
    {
        $this->load->model('materialentrymodel');

        $materialEntryData['materialEntryID'] = $materialEntryID;
        $result = $this->materialentrymodel->deleteMaterialEntryData($materialEntryData);
    }
}
