<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


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
        $this->load->library('ReceiveService');


        $userData = $this->UserModel->getUserData($idUser);
        $userOrders = $this->OrderModel->getUserOrders($idUser);
        $email = $userData->Email;

        $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);

        try {
            $response = $this->receiveservice->getSold($apiCredentials, $email);
            var_dump($response);
        }  catch (\Exception $e) {
            var_dump($e->getMessage()); die();
            echo $e->getMessage();
        }

        $this->smartyci->assign("idUser", $idUser);
        $this->smartyci->assign("email", $email);
        $this->smartyci->assign("username", $userData->Username);
        $this->smartyci->assign("orders", $userOrders);

        $this->smartyci->display('MyAccountView.tpl');
    }
}
