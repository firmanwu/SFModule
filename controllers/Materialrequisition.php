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
            'title' => '新增領料'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addMaterialRequisitionView');
        $this->load->view('footer');
    }

    public function addMaterialRequisition()
    {
        $this->load->model('materialrequisitionmodel');
        $this->load->model('suppliermodel');
        $this->load->model('materialmodel');

        $materialRequisitionData['materialRequisitionID'] = $this->input->post('materialRequisitionID');
        $materialRequisitionData['material'] = $this->input->post('material');
        $materialRequisitionData['supplier'] = $this->input->post('supplier');
        $materialRequisitionData['requisitioningDate'] = $this->input->post('requisitioningDate');
        $materialRequisitionData['requisitioningDepartment'] = $this->input->post('requisitioningDepartment');
        $materialRequisitionData['requisitioningMember'] = $this->input->post('requisitioningMember');
        $materialRequisitionData['requisitionedPackageNumber'] = $this->input->post('requisitionedPackageNumber');

        $unitWeight = $this->suppliermodel->querySupplierMaterialUnitWeightData($materialRequisitionData['supplier']);
        $materialRequisitionData['requisitionedWeight'] = $materialRequisitionData['requisitionedPackageNumber'] * $unitWeight;

        // Minus the requisitioned package number and weight of material
        $this->materialmodel->updateMaterialQuantityData($materialRequisitionData['material'], (-$materialRequisitionData['requisitionedPackageNumber']), (-$materialRequisitionData['requisitionedWeight']));

        // Get the remaining package number and weight of material
        $queryData = 'SELECT totalPackageNumber, totalWeight FROM material WHERE materialID = \'' . $materialRequisitionData['material'] . '\'';
        $query = $this->materialmodel->queryMaterialSpecificColumn($queryData, true);

        $materialRequisitionData['remainingPackageNumber'] = $query['totalPackageNumber'];
        $materialRequisitionData['remainingWeight'] = $query['totalWeight'];

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
            'title' => '查詢領料'
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
