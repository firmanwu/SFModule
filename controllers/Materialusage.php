<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materialusage extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'b',
            'title' => '使用單位管理'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('materialUsageView');
        $this->load->view('footer');
    }

    public function addMaterialUsage()
    {
        $this->load->model('materialusagemodel');

        $materialUsageData['material'] = $this->input->post('material');
        $materialUsageData['usingDepartment'] = $this->input->post('usingDepartment');

        $result = $this->materialusagemodel->insertMaterialUsageData($materialUsageData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }
}
