<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialrequisition extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'title' => 'Material requisition page',
            'message' => 'Material requisition page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('materialRequisitionView');
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

        // Use javascript to cover this condition jugement
        if ('' != $this->input->post('requisitionedWeight')) {
            $materialRequisitionData['requisitionedWeight'] = $this->input->post('requisitionedWeight');
        }
        else {
            $unitWeight = $this->suppliermodel->querySupplierMaterialUnitWeightData($materialRequisitionData['supplier']);
            $materialRequisitionData['requisitionedWeight'] = $materialRequisitionData['requisitionedPackageNumber'] * $unitWeight;
        }

        // Minus the requisitioned package number and weight of material
        $this->materialmodel->updateMaterialQuantityData($materialRequisitionData['material'], (-$materialRequisitionData['requisitionedPackageNumber']), (-$materialRequisitionData['requisitionedWeight']));

        // Get the remaining package number and weight of material
        $queryData = 'SELECT totalPackageNumber, totalWeight FROM material WHERE materialID = \'' . $materialRequisitionData['material'] . '\'';
        $query = $this->materialmodel->queryMaterialSpecificColumn($queryData);

        $materialRequisitionData['remainingPackageNumber'] = $query['totalPackageNumber'];
        $materialRequisitionData['remainingWeight'] = $query['totalWeight'];

        $result = $this->materialrequisitionmodel->insertMaterialRequisitionData($materialRequisitionData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function queryMaterialRequisition()
    {
        $this->load->model('materialrequisitionmodel');

        // useless
        $selectedColumn = $this->input->post('queryMaterialEntryColumn');
        $value = $this->input->post('queryMaterialEntryValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->materialrequisitionmodel->queryMaterialRequisitionData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->materialRequisitionID;
            echo $row->requisitioningDate;
            echo $row->materialName;
            echo $row->requisitioningDepartment;
            echo $row->requisitioningMember;
            echo $row->supplierName;
            echo $row->packaging;
            echo $row->unitWeight;
            echo $row->requisitionedPackageNumber;
            echo $row->requisitionedWeight;
            echo $row->remainingPackageNumber;
            echo $row->remainingWeight;
            echo "<br>";
        }
    }
}
