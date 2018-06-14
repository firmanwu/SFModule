<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialrequisition extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome');
            return;
        }*/
    }

    public function addMaterialRequisitionView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '新增領料單'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addMaterialRequisitionView');
        $this->load->view('footer');
    }

    public function addMaterialRequisition()
    {
        $this->load->model('materialrequisitionmodel');
        $this->load->model('packagingmodel');
        $this->load->model('suppliermodel');
        $this->load->model('materialinwarehousemodel');

        $materialRequisitionData['materialRequisitionID'] = $this->input->post('materialRequisitionID');
        $materialRequisitionData['material'] = $this->input->post('material');
        $materialRequisitionData['supplier'] = $this->input->post('supplier');
        $materialRequisitionData['packaging'] = $this->input->post('packaging');
        $materialRequisitionData['requisitioningDate'] = $this->input->post('requisitioningDate');
        $materialRequisitionData['requisitioningDepartment'] = $this->input->post('requisitioningDepartment');
        $materialRequisitionData['requisitioningMember'] = $this->input->post('requisitioningMember');
        $materialRequisitionData['requisitionedPackageNumber'] = $this->input->post('requisitionedPackageNumber');

        // Get unit weight by packaging ID
        $queryData = $this->packagingmodel->queryPackagingUnitWeightByPackagingID($materialRequisitionData['packaging']);
        $unitWeight = $queryData['unitWeight'];

        // Get unit price by supplier ID and material ID
        $queryData = $this->suppliermodel->querySupplierUnitPriceBySupplierID($materialRequisitionData['supplier']);
        $unitPrice = $queryData['unitPrice'];

        // Calculate requisitioned wegiht and money
        $materialRequisitionData['requisitionedWeight'] = $materialRequisitionData['requisitionedPackageNumber'] * $unitWeight;
        $requisitionedMoney = $materialRequisitionData['requisitionedWeight'] * $unitPrice;

        // Minus the requisitioned package number, weight of material and money
        $this->materialinwarehousemodel->updateMaterialInWareHouseQuantityData(
            $materialRequisitionData['material'],
            $materialRequisitionData['supplier'],
            $materialRequisitionData['packaging'],
            (-$materialRequisitionData['requisitionedPackageNumber']),
            (-$materialRequisitionData['requisitionedWeight']),
            (-$requisitionedMoney));

        // Get the remaining package number, weight and money in warehouse
        $materialInWarehouseData = $this->materialinwarehousemodel->queryMaterialInWareHouseStoredPackageNumberWeightMoney(
            $materialRequisitionData['material'],
            $materialRequisitionData['supplier'],
            $materialRequisitionData['packaging']);

        $materialRequisitionData['remainingPackageNumber'] = $materialInWarehouseData['storedPackageNumber'];
        $materialRequisitionData['remainingWeight'] = $materialInWarehouseData['storedWeight'];
        $materialRequisitionData['remainingMoney'] = $materialInWarehouseData['storedMoney'];

        $result = $this->materialrequisitionmodel->insertMaterialRequisitionData($materialRequisitionData);
        if (true == $result) {
            echo json_encode($materialRequisitionData);
        }
    }

    public function queryMaterialRequisitionView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '查詢領料單'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryMaterialRequisitionView');
        $this->load->view('footer');
    }

    public function queryMaterialRequisition()
    {
        $this->load->model('materialrequisitionmodel');

        $query = $this->materialrequisitionmodel->queryMaterialRequisitionData();
        echo json_encode($query->result_array());
    }

    public function deleteMaterialRequisition($materialRequisitionID)
    {
        $this->load->model('materialrequisitionmodel');

        $materialRequisitionData['materialRequisitionID'] = $materialRequisitionID;
        $result = $this->materialrequisitionmodel->deleteMaterialRequisitionData($materialRequisitionData);
    }
}
