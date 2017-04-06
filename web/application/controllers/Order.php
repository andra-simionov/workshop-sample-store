<?php


class Order extends CI_Controller
{
    const ORDER_STATUS_PAID = "PAID";
    const ORDER_STATUS_FAILED = "FAILED";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');

        $userInfo = $this->UserModel->getUserData($idUser);

        $orderReference = $this->generateOrderReference();
        $this->OrderModel->saveOrder($idUser, $idProduct, $orderReference);
     }

    private function generateOrderReference()
    {
        return rand(10000, 99999);
    }


}
