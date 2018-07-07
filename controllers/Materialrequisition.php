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

    public function addMaterialRequisition(
        $storedMaterialID,
        $materialRequisitionID,
        $requisitioningDepartment,
        $requisitioningMember,
        $requisitionedPackageNumber
    )
    {
        $this->load->model('materialrequisitionmodel');
        $this->load->model('materialinwarehousemodel');
        $this->load->model('materialusagemodel');

        $materialRequisitionData['materialRequisitionID'] = $materialRequisitionID;
        $materialRequisitionData['materialInWarehouseID'] = $storedMaterialID;

        $queryData = $this->materialinwarehousemodel->queryMaterialInWarehouseDataByStoredMaterialID($storedMaterialID);
        $materialRequisitionData['material'] = $queryData['material'];
        $materialRequisitionData['supplier'] = $queryData['supplier'];
        $materialRequisitionData['packaging'] = $queryData['packagingID'];
        $materialRequisitionData['storedArea'] = $queryData['storedArea'];
        // For Taiwan GMT+8
        $currentDateTime = gmdate("Y-m-d H:i:s", (time() + (28800)));
        $materialRequisitionData['requisitioningDate'] = $currentDateTime;;
        $materialRequisitionData['requisitioningDepartment'] = urldecode($requisitioningDepartment);
        $materialRequisitionData['requisitioningMember'] = urldecode($requisitioningMember);
        $materialRequisitionData['requisitionedPackageNumber'] = $requisitionedPackageNumber;

        $result = $this->materialrequisitionmodel->insertMaterialRequisitionData($materialRequisitionData);

        $this->materialinwarehousemodel->updateRemainingPackageNumberData($storedMaterialID, (-$requisitionedPackageNumber));

        $materialRequisitionData['material'] = $queryData['materialName'] . "(" . $queryData['material'] . ")";
        $materialRequisitionData['supplier'] = $queryData['supplierName'];
        $materialRequisitionData['packaging'] = $queryData['packaging'];
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

    public function queryMaterialRequisitionID()
    {
        $this->load->model('materialrequisitionmodel');

        $query = $this->materialrequisitionmodel->queryMaterialRequisitionIDData();
        echo json_encode($query->result_array());
    }

    public function queryMaterialRequisitionByRequisitionID($materialRequisitionID)
    {
        $this->load->model('materialrequisitionmodel');

        $query = $this->materialrequisitionmodel->queryMaterialRequisitionByRequisitionIDData($materialRequisitionID);
        echo json_encode($query->result_array());
    }

    public function deleteMaterialRequisition($materialRequisitionID)
    {
        $this->load->model('materialrequisitionmodel');

        $materialRequisitionData['materialRequisitionID'] = $materialRequisitionID;
        $result = $this->materialrequisitionmodel->deleteMaterialRequisitionData($materialRequisitionData);
    }
}
