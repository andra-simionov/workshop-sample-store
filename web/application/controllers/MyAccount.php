<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MyAccount extends CI_Controller
{
    public function index()
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('form_validation');
        $this->load->library('ReceiveService');

        $idUser = $this->getIdOfCurrentUser();

        $userData = $this->UserModel->getUserData($idUser);
        $userOrders = $this->OrderModel->getUserOrders($idUser);
        $email = $userData->Email;

        //TODO 3: let's get the user's balance from bank

        $this->smartyci->assign("idUser", $idUser);
        $this->smartyci->assign("email", $email);
        $this->smartyci->assign("token", $userData->Token);
        $this->smartyci->assign("username", $userData->Username);
        $this->smartyci->assign("orders", $userOrders);

        $this->smartyci->display('MyAccountView.tpl');
    }

    /**
     * @return bool
     */
    public function updateToken()
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');

        $token = $this->input->post('token');
        $idUser = $this->getIdOfCurrentUser();

        $this->UserModel->updateToken($idUser, $token);

        $this->index();
    }

    /**
     * @return int
     */
    private function getIdOfCurrentUser()
    {
        $this->load->library('session');
        return $this->session->all_userdata()['IdUser'];
    }

}
