<?php

class Register extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $smartyci = new Smartyci();

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

        $this->RegisterModel->registerUser($username, $password, $email);

        $smartyci->display('RegisterView.tpl');
    }
}
