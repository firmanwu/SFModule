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

        $data = array(
            'title' => 'Fnished good requisition page',
            'message' => 'Fnished good requisition page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('finishedGoodRequisitionView');
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

        // Use javascript to cover this condition jugement
        if ('' != $this->input->post('requisitionedWeight')) {
            $finishedGoodRequisitionData['requisitionedWeight'] = $this->input->post('requisitionedWeight');
        }
        else {
            // Get package number of 1 pallet and unit weight
            $queryData = 'SELECT unitWeight, packageNumberOfPallet FROM finishedgood WHERE finishedGoodID = \'' . $finishedGoodRequisitionData['product'] . '\'';
            $query = $this->finishedgoodmodel->queryFinishedGoodSpecificColumn($queryData);
            $unitWeight = $query['unitWeight'];
            $packageNumberOfPallet = $query['packageNumberOfPallet'];

            $finishedGoodRequisitionData['requisitionedPalletNumber'] = $finishedGoodRequisitionData['requisitionedPackageNumber'] / $packageNumberOfPallet;
            $finishedGoodRequisitionData['requisitionedWeight'] = $finishedGoodRequisitionData['requisitionedPackageNumber'] * $unitWeight;
        }

        // Minus the requisitioned package number and weight of material
        $this->finishedgoodmodel->updateFinishedGoodQuantityData($finishedGoodRequisitionData['product'], (-$finishedGoodRequisitionData['requisitionedPackageNumber']), (-$finishedGoodRequisitionData['requisitionedWeight']));

        // Get the remaining package number and weight of finished good
        $queryData = 'SELECT totalPackageNumber, totalWeight FROM finishedgood WHERE finishedGoodID = \'' . $finishedGoodRequisitionData['product'] . '\'';
        $query = $this->finishedgoodmodel->queryFinishedGoodSpecificColumn($queryData);

        $finishedGoodRequisitionData['remainingPackageNumber'] = $query['totalPackageNumber'];
        $finishedGoodRequisitionData['remainingWeight'] = $query['totalWeight'];

        $result = $this->finishedgoodrequisitionmodel->insertFinishedGoodRequisitionData($finishedGoodRequisitionData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function queryFinishedGoodRequisition()
    {
        $this->load->model('finishedgoodrequisitionmodel');

        // useless
        $selectedColumn = $this->input->post('queryMaterialEntryColumn');
        $value = $this->input->post('queryMaterialEntryValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->finishedgoodrequisitionmodel->queryFinishedGoodRequisitionData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->finishedGoodRequistionID;
            echo $row->requisitioningDate;
            echo $row->product;
            echo $row->finishedGoodType;
            echo $row->requisitioningDepartment;
            echo $row->requisitioningMember;
            echo $row->requisitionedPackageNumber;
            echo $row->unitWeight;
            echo $row->requisitionedPalletNumber;
            echo $row->requisitionedWeight;
            echo $row->remainingPackageNumber;
            echo $row->remainingWeight;
            echo "<br>";
        }
    }
}
