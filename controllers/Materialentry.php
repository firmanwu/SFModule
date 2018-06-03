<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialentry extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome');
            return;
        }*/
    }

    public function addMaterialEntryView()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '新增入料'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('addMaterialEntryView');
        $this->load->view('footer');
    }

    public function addMaterialEntry()
    {
        $this->load->model('materialentrymodel');
        $this->load->model('purchaseordermodel');
        $this->load->model('materialmodel');

        $materialEntryData['materialEntryID'] = $this->input->post('materialEntryID');
        $materialEntryData['serialNumber'] = $this->input->post('serialNumber');
        $materialEntryData['purchaseOrder'] = $this->input->post('purchaseOrder');
        $materialEntryData['storedArea'] = $this->input->post('storedArea');
        //$materialEntryData['QRCode'] = $this->input->post('QRCode');
        $materialEntryData['batchNumber'] = $this->input->post('batchNumber');
        $materialEntryData['storedDate'] = $this->input->post('storedDate');
        $materialEntryData['packageNumberOfPallet'] = $this->input->post('packageNumberOfPallet');
        $materialEntryData['palletNumber'] = $this->input->post('palletNumber');
        $materialEntryData['storedPackageNumber'] = $materialEntryData['packageNumberOfPallet'] * $materialEntryData['palletNumber'];

        $purchaseOrderData = $this->purchaseordermodel->queryPurchaseOrderForUnitWeightUnitPrice($materialEntryData['purchaseOrder']);
        $materialEntryData['storedWeight'] = $materialEntryData['storedPackageNumber'] * $purchaseOrderData['unitWeight'];
        $materialEntryData['storedMoney'] = $materialEntryData['storedWeight'] * $purchaseOrderData['unitPrice'];

        $this->materialmodel->updateMaterialQuantityData(
            $purchaseOrderData['material'],
            $materialEntryData['storedPackageNumber'],
            $materialEntryData['storedWeight'],
            $materialEntryData['storedMoney']
        );

        $this->purchaseordermodel->updatePurchaseOrderQuantityData(
            $materialEntryData['purchaseOrder'],
            (-$materialEntryData['storedPackageNumber'])
        );

        $result = $this->materialentrymodel->insertMaterialEntryData($materialEntryData);
        if (true == $result) {
            echo json_encode($materialEntryData);
        }
    }

    public function queryMaterialEntryView($isConfirmed)
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b'
        );

        if (true == $isConfirmed) {
            $data['title'] = "查詢已確認入料";
            $data['confirmedTheme'] = 'd';
            $data['unconfirmedTheme'] = 'c';
            $data['buttonCaption'] = '已確認入料查詢';
            $data['queryFunction'] = 'queryMaterialEntry(1)';
        }
        else {
            $data['title'] = "查詢未確認入料";
            $data['confirmedTheme'] = 'c';
            $data['unconfirmedTheme'] = 'd';
            $data['buttonCaption'] = '未確認入料查詢';
            $data['queryFunction'] = 'queryMaterialEntry(0)';
        }

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('queryMaterialEntryView', $data);
        $this->load->view('footer');
    }

    public function queryMaterialEntry($isConfirmed)
    {
        $this->load->model('materialentrymodel');

        $query = $this->materialentrymodel->queryMaterialEntryData($isConfirmed);
        echo json_encode($query->result_array());
    }

    public function deleteMaterialEntry($materialEntryID)
    {
        $this->load->model('materialentrymodel');

        $materialEntryData['materialEntryID'] = $materialEntryID;
        $result = $this->materialentrymodel->deleteMaterialEntryData($materialEntryData);
    }

    public function confirmMaterialEntry($materialEntryID)
    {
        $this->load->model('materialentrymodel');

        $this->materialentrymodel->updateMaterialEntryConfirmationData($materialEntryID);
    }

    public function getSerialNumber()
    {
        $this->load->helper('file');
        $this->load->helper('date');
        $this->load->helper('string');

        $dateString = '%Y%m%d';
        $time = time();
        $currentDate = mdate($dateString, $time);
        $fileName = 'EntrySN';
        if (TRUE == file_exists($fileName)) {
            $currentSerialNumber = read_file($fileName);
            if (FALSE == strstr($currentSerialNumber, $currentDate)) {
                $newSerialNumber = $currentDate . "001";
                write_file($fileName, $newSerialNumber);

                echo $newSerialNumber;
            }
            else {
                echo $currentSerialNumber;
            }
        }
        else {
            $newSerialNumber = $currentDate . "001";
            write_file($fileName, $newSerialNumber);

            echo $newSerialNumber;
        }
    }

    public function increaseSerialNumber()
    {
        $this->load->helper('file');
        $this->load->helper('date');
        $this->load->helper('string');

        $dateString = '%Y%m%d';
        $time = time();
        $currentDate = mdate($dateString, $time);
        $fileName = 'EntrySN';
        if (TRUE == file_exists($fileName)) {
            $currentSerialNumber = read_file($fileName);
            if (FALSE == strstr($currentSerialNumber, $currentDate)) {
                $newSerialNumber = $currentDate . "001";
            }
            else {
                $newSerialNumber = increment_string($currentSerialNumber, '');
            }
            write_file($fileName, $newSerialNumber);
        }
        else {
            $newSerialNumber = $currentDate . "001";
            write_file($fileName, $newSerialNumber);
        }
    }
}
