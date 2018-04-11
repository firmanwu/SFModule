<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'User page',
            'message' => 'User page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('userView');
        $this->load->view('footer');
    }

    public function addUserAccount()
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

    public function deleteUserAccount()
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
