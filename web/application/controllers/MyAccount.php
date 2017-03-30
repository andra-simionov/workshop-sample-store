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

        //todo - check if isset
        $idUser = 1; //$this->session->all_userdata()['IdUser'];
        $userData = $this->MyAccountModel->getUserData($idUser);

        $userOrders = $this->MyAccountModel->getUserOrders($idUser);

        $smartyci->assign("email", $userData->Email);
        $smartyci->assign("username", $userData->Username);

        $smartyci->assign("orders", $userOrders);

        $smartyci->display('MyAccountView.tpl');
    }
}
