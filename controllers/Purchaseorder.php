<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchaseorder extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/
    }

    public function addPurchaseOrderView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '新增採購單'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addPurchaseOrderView');
        $this->load->view('footer');
    }

    public function addPurchaseOrder()
    {
        $this->load->model('purchaseordermodel');

        $purchaseOrderData['purchaseOrderID'] = $this->input->post('purchaseOrderID');
        $purchaseOrderData['material'] = $this->input->post('material');
        $purchaseOrderData['purchaseCondition'] = $this->input->post('purchaseCondition');

        $result = $this->purchaseordermodel->insertPurchaseOrderData($purchaseOrderData);
        if (true == $result) {
            echo json_encode($purchaseOrderData);
        }
    }

    public function queryPurchaseOrderView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '查詢採購單'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryPurchaseOrderView');
        $this->load->view('footer');
    }

    public function queryPurchaseOrder()
    {
        $this->load->model('purchaseordermodel');

        $query = $this->purchaseordermodel->queryPurchaseOrderData();
        echo json_encode($query->result_array());
    }

    public function queryPurchaseOrderIDbyMaterialID($materialID)
    {
        $this->load->model('purchaseordermodel');

        $queryData = 'SELECT purchaseOrderID FROM purchaseorder WHERE material = ' . "\"" . $materialID . "\"";
        $query = $this->purchaseordermodel->queryPurchaseOrderSpecificColumn($queryData, false);
        echo json_encode($query->result_array());
    }

    public function deletePurchaseOrder($purchaseOrderID)
    {
        $this->load->model('purchaseordermodel');

        $purchaseOrderData['purchaseOrderID'] = $purchaseOrderID;
        $result = $this->purchaseordermodel->deletePurchaseOrderData($purchaseOrderData);
    }
}
