<?php

class MyAccount extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('session');
        $this->load->library('form_validation');

        $smartyci = new Smartyci();

        //todo check if isset
        $username = 'diana'; //$this->session->all_userdata()['Username'];
        $userData = $this->MyAccountModel->getUserData($username);
        $userData = [
            'Email' => 'ddddddd',
            'CardNumber' => '1231',
            'CardExpDate' => '17.03.2195',
            'Cvv' => '123',
            'Username' => 'dummy'
        ];

        $smartyci->assign("email", $userData['Email']);
        $smartyci->assign("username", $userData['Username']);
        $smartyci->assign("cardNumber", $userData['CardNumber']);
        $smartyci->assign("cardExpDate", $userData['CardExpDate']);
        $smartyci->assign("cvv", $userData['Cvv']);

        $smartyci->display('MyAccountView.tpl');
    }
}
