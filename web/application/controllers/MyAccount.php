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

        $smartyci = new Smartyci();
        $userData = $this->MyAccountModel->getUserData($idUser);
        $userOrders = $this->MyAccountModel->getUserOrders($idUser);

        $smartyci->assign("idUser", $idUser);
        $smartyci->assign("email", $userData->Email);
        $smartyci->assign("username", $userData->Username);
        $smartyci->assign("orders", $userOrders);

        $smartyci->display('MyAccountView.tpl');


    }
}
