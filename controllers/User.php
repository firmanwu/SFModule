<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        /*
        if (false == isset($_SESSION['userID'])) {
            redirect('welcome/iframeContent');
            return;
        }*/

        $data = array(
            'theme' => 'f',
            'title' => '使用者管理'
        );

        $this->load->view('header');
        $this->load->view('panel', $data);
        $this->load->view('userView');
        $this->load->view('footer');
    }

    public function addUser()
    {
        $this->load->model('usermodel');

        $userData['userID'] = $this->input->post('userName');
        $userData['password'] = $this->input->post('password');

        $result = $this->usermodel->insertUserData($userData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function queryUser()
    {
        $this->load->model('usermodel');

        $query = $this->usermodel->queryUserData();
        echo json_encode($query->result_array());
    }

    public function deleteUser()
    {
        $this->load->model('usermodel');

        $userData['userID'] = $this->input->post('userName');

        $result = $this->usermodel->deleteUserData($userData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }

    public function updateUserPassword()
    {
        $this->load->model('usermodel');

        // get userID from session
        $userData['userID'] = $this->input->post('userName');
        $userData['password'] = $this->input->post('password');

        $result = $this->usermodel->updatePasswordData($userData);
        if (true == $result) {
            echo "<h1>success!!</h1>";
        }
        else {
            echo "<h1>NOT success!!</h1>";
        }
    }
}
