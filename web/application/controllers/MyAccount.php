<?php

class MyAccount extends CI_Controller
{
    function index()
    {
        exit('No direct script access allowed');
    }

    function getUserHistory($idUser)
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('session');
        $this->load->library('form_validation');

        $userData = $this->MyAccountModel->getUserData($idUser);
        $userOrders = $this->MyAccountModel->getUserOrders($idUser);

        $this->smartyci->assign("idUser", $idUser);
        $this->smartyci->assign("email", $userData->Email);
        $this->smartyci->assign("username", $userData->Username);
        $this->smartyci->assign("orders", $userOrders);

        $this->smartyci->display('MyAccountView.tpl');


    }
}
