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

    private function getMaterialUnitWeight($supplier)
    {
        $this->load->model('suppliermodel');

        $queryData = 'SELECT unitWeight from supplier where supplierID = ' . $supplier;
        $query = $this->suppliermodel->querySupplierSpecificColumn($queryData);

        $row = $query->row_array();
        if (isset($row)) {
            return $row['unitWeight'];
        }
    }

    private function updateMaterialQuantity($material, $packageNumber, $weight)
    {
        $this->load->model('materialmodel');

        $totalPackageNumber = 'totalPackageNumber + ' . $packageNumber;
        $totalWeight = 'totalWeight + ' . $weight;
        $updateData = array(
            'material' => $material,
            'totalPackageNumber' => $totalPackageNumber,
            'totalWeight' => $totalWeight
        );
        $this->materialmodel->updateMaterialQuantityData($updateData);
    }

    public function addMaterialEntry()
    {
        $this->load->model('materialentrymodel');

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

        $unitWeight = $this->getMaterialUnitWeight($materialEntryData['supplier']);
        $materialEntryData['storedWeight'] = $materialEntryData['storedPackageNumber'] * $unitWeight;

        $result = $this->materialentrymodel->insertMaterialEntryData($materialEntryData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
        $this->updateMaterialQuantity($materialEntryData['material'], $materialEntryData['palletNumber'], $materialEntryData['storedWeight']);
    }
}
