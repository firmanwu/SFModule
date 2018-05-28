<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodrequisition extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/
    }

    public function addFinishedGoodRequisitionView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '新增出庫'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addFinishedGoodRequisitionView');
        $this->load->view('footer');
    }

    public function addFinishedGoodRequisition()
    {
        $this->load->model('finishedgoodrequisitionmodel');
        $this->load->model('finishedgoodmodel');

        $finishedGoodRequisitionData['finishedGoodRequistionID'] = $this->input->post('finishedGoodRequistionID');
        $finishedGoodRequisitionData['product'] = $this->input->post('product');
        $finishedGoodRequisitionData['requisitioningDate'] = $this->input->post('requisitioningDate');
        $finishedGoodRequisitionData['requisitioningDepartment'] = $this->input->post('requisitioningDepartment');
        $finishedGoodRequisitionData['requisitioningMember'] = $this->input->post('requisitioningMember');
        $finishedGoodRequisitionData['requisitionedPackageNumber'] = $this->input->post('requisitionedPackageNumber');

        // Get package number of 1 pallet and unit weight
        $queryData = 'SELECT unitWeight, packageNumberOfPallet FROM finishedgood WHERE finishedGoodID = \'' . $finishedGoodRequisitionData['product'] . '\'';
        $query = $this->finishedgoodmodel->queryFinishedGoodSpecificColumn($queryData);
        $unitWeight = $query['unitWeight'];
        $packageNumberOfPallet = $query['packageNumberOfPallet'];

        $finishedGoodRequisitionData['requisitionedPalletNumber'] = $finishedGoodRequisitionData['requisitionedPackageNumber'] / $packageNumberOfPallet;
        $finishedGoodRequisitionData['requisitionedWeight'] = $finishedGoodRequisitionData['requisitionedPackageNumber'] * $unitWeight;

        // Minus the requisitioned package number and weight of material
        $this->finishedgoodmodel->updateFinishedGoodQuantityData($finishedGoodRequisitionData['product'], (-$finishedGoodRequisitionData['requisitionedPackageNumber']), (-$finishedGoodRequisitionData['requisitionedWeight']));

        // Get the remaining package number and weight of finished good
        $queryData = 'SELECT totalPackageNumber, totalWeight FROM finishedgood WHERE finishedGoodID = \'' . $finishedGoodRequisitionData['product'] . '\'';
        $query = $this->finishedgoodmodel->queryFinishedGoodSpecificColumn($queryData);

        $finishedGoodRequisitionData['remainingPackageNumber'] = $query['totalPackageNumber'];
        $finishedGoodRequisitionData['remainingWeight'] = $query['totalWeight'];

        $result = $this->finishedgoodrequisitionmodel->insertFinishedGoodRequisitionData($finishedGoodRequisitionData);
        if (true == $result) {
            echo json_encode($finishedGoodRequisitionData);
        }
    }

    public function queryFinishedGoodRequisitionView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '查詢出庫'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryFinishedGoodRequisitionView');
        $this->load->view('footer');
    }

    public function queryFinishedGoodRequisition()
    {
        $this->load->model('finishedgoodrequisitionmodel');

        $query = $this->finishedgoodrequisitionmodel->queryFinishedGoodRequisitionData();
        echo json_encode($query->result_array());
    }

    public function deleteFinishedGoodRequisition($finishedGoodRequisitionID)
    {
        $this->load->model('finishedgoodrequisitionmodel');

        $finishedGoodRequisitionData['finishedGoodRequisitionID'] = $finishedGoodRequisitionID;
        $result = $this->finishedgoodrequisitionmodel->deleteFinishedGoodRequisitionData($finishedGoodRequisitionData);
    }
}
