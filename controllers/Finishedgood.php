<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgood extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '成品管理'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('finishedGoodView');
        $this->load->view('footer');
    }

    public function addFinishedGood()
    {
        $this->load->model('finishedgoodmodel');

        $finishedGoodData['finishedGoodID'] = $this->input->post('finishedGoodID');
        $finishedGoodData['finishedGoodType'] = $this->input->post('finishedGoodType');
        $finishedGoodData['unitWeight'] = $this->input->post('unitWeight');
        $finishedGoodData['packageNumberOfPallet'] = $this->input->post('packageNumberOfPallet');

        $result = $this->finishedgoodmodel->insertFinishedGoodData($finishedGoodData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function queryFinishedGood()
    {
        $this->load->model('finishedgoodmodel');

        // useless
        $selectedColumn = $this->input->post('queryMaterialColumn');
        $value = $this->input->post('queryMaterialValue');
        $queryData = array($selectedColumn => $value);
        // useless

        $query = $this->finishedgoodmodel->queryFinishedGoodData($queryData);
        //print_r($query->result_array());
        foreach($query->result() as $row)
        {
            echo $row->finishedGoodID;
            echo $row->finishedGoodType;
            echo $row->unitWeight;
            echo $row->packageNumberOfPallet;
            echo $row->totalPackageNumber;
            echo $row->totalWeight;
            echo "<br>";
        }
    }
}
