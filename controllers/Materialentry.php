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
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }

        $this->materialmodel->updateMaterialQuantityData($materialEntryData['material'], $materialEntryData['storedPackageNumber'], $materialEntryData['storedWeight'], true);
    }

    public function queryMaterialEntry()
    {
        $this->load->model('materialentrymodel');

        // useless
        $selectedColumn = $this->input->post('queryMaterialEntryColumn');
        $value = $this->input->post('queryMaterialEntryValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->materialentrymodel->queryMaterialEntryData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->materialEntryID;
            echo $row->serialNumber;
            echo $row->purchaseOrder;
            echo $row->storedArea;
            echo $row->QRCode;
            echo $row->material;
            echo $row->materialName;
            echo $row->batchNumber;
            echo $row->purchaseCondition;
            echo $row->storedDate;
            echo $row->supplierName;
            echo $row->packaging;
            echo $row->unitWeight;
            echo $row->packageNumberOfPallet;
            echo $row->palletNumber;
            echo $row->storedPackageNumber;
            echo $row->storedWeight;
            echo $row->usingDepartment;
            echo $row->price;
            echo "<br>";
        }
    }
}
