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

        $data = array(
            'theme' => 'd',
            'title' => '入貨'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('finishedGoodEntryView');
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
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }

        $this->finishedgoodmodel->updateFinishedGoodQuantityData($finishedGoodEntryData['product'], $finishedGoodEntryData['storedPackageNumber'], $finishedGoodEntryData['storedWeight']);
    }

    public function queryFinishedGoodEntry()
    {
        $this->load->model('finishedgoodentrymodel');

        // useless
        $selectedColumn = $this->input->post('queryMaterialEntryColumn');
        $value = $this->input->post('queryMaterialEntryValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->finishedgoodentrymodel->queryFinishedGoodEntryData($queryData);
        foreach($query->result() as $row)
        {
            echo $row->storedArea;
            echo $row->serialNumber;
            echo $row->status;
            echo $row->product;
            echo $row->finishedGoodType;
            echo $row->storedDate;
            echo $row->batchNumber;
            echo $row->storedPackageNumber;
            echo $row->unitWeight;
            echo $row->palletNumber;
            echo $row->storedWeight;
            echo "<br>";
        }
    }
}
