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
            'title' => 'Material Usage page',
            'message' => 'Material Usage page!!!'
        );

        $this->load->view('header', $data);
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
