<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodentry extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/
    }

    public function addFinishedGoodEntryView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '新增入庫'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addFinishedGoodEntryView');
        $this->load->view('footer');
    }

    public function addFinishedGoodEntry()
    {
        $this->load->model('finishedgoodentrymodel');
        $this->load->model('finishedgoodmodel');

        $finishedGoodEntryData['finishedGoodEntryID'] = $this->input->post('finishedGoodEntryID');
        $finishedGoodEntryData['serialNumber'] = $this->input->post('serialNumber');
        $finishedGoodEntryData['status'] = $this->input->post('status');
        $finishedGoodEntryData['storedArea'] = $this->input->post('storedArea');
        $finishedGoodEntryData['product'] = $this->input->post('product');
        $finishedGoodEntryData['batchNumber'] = $this->input->post('batchNumber');
        $finishedGoodEntryData['storedDate'] = $this->input->post('storedDate');
        $finishedGoodEntryData['storedPackageNumber'] = $this->input->post('storedPackageNumber');

        // Get package number of 1 pallet and unit weight
        $queryData = 'SELECT unitWeight, packageNumberOfPallet FROM finishedgood WHERE finishedGoodID = \'' . $finishedGoodEntryData['product'] . '\'';
        $query = $this->finishedgoodmodel->queryFinishedGoodSpecificColumn($queryData);
        $unitWeight = $query['unitWeight'];
        $packageNumberOfPallet = $query['packageNumberOfPallet'];

        $finishedGoodEntryData['palletNumber'] = $finishedGoodEntryData['storedPackageNumber'] / $packageNumberOfPallet;

        $finishedGoodEntryData['storedWeight'] = $finishedGoodEntryData['storedPackageNumber'] * $unitWeight;

        $result = $this->finishedgoodentrymodel->insertFinishedGoodEntryData($finishedGoodEntryData);
        if (true == $result) {
            echo json_encode($finishedGoodEntryData);
        }

        $this->finishedgoodmodel->updateFinishedGoodQuantityData($finishedGoodEntryData['product'], $finishedGoodEntryData['storedPackageNumber'], $finishedGoodEntryData['storedWeight']);
    }

    public function queryFinishedGoodEntryView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '查詢入庫'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryFinishedGoodEntryView');
        $this->load->view('footer');
    }

    public function queryFinishedGoodEntry()
    {
        $this->load->model('finishedgoodentrymodel');

        $query = $this->finishedgoodentrymodel->queryFinishedGoodEntryData();
        echo json_encode($query->result_array());
    }


    public function deleteFinishedGoodEntry($finishedGoodEntryID)
    {
        $this->load->model('finishedgoodentrymodel');

        $finishedGoodEntryData['finishedGoodEntryID'] = $finishedGoodEntryID;
        $result = $this->finishedgoodentrymodel->deleteFinishedGoodEntryData($finishedGoodEntryData);
    }
}
