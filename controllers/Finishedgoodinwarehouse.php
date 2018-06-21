<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finishedgoodinwarehouse extends CI_Controller {

    public function queryFinishedGoodInWarehouseView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'd',
            'title' => '查詢成品庫存'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryFinishedGoodInWarehouseView');
        $this->load->view('footer');
    }

    public function queryFinishedGoodInWarehouse()
    {
        $this->load->model('finishedgoodinwarehousemodel');

        $query = $this->finishedgoodinwarehousemodel->queryFinishedGoodInWarehouseData();
        echo json_encode($query->result_array());
    }
}
