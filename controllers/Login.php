<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Login page',
            'message' => 'Login page!!!'
        );

        $this->load->view('header', $data);
        $this->load->view('loginView');
        $this->load->view('footer');
    }

    public function validateLogin()
    {
        $this->load->model('loginmodel');

        $loginData['userID'] = $this->input->post('userName');
        $loginData['password'] = $this->input->post('password');

        $isValid = $this->loginmodel->isLoginValid($loginData);
        if (true == $isValid) {
            echo "<h1>It is valid!!</h1>";
        }
        else {
            echo "<h1>It is NOT valid!!</h1>";
        }
    }
}
