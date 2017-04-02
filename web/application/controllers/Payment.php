<?php


class Payment extends CI_Controller
{
    const BANK_URL = "http://192.168.24.20/SoldController/sold/format/json";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');

//        $idUser = $this->input->get('idUser');
//        $idProduct = $this->input->get('idProduct');

        $userInfo = $this->UserModel->getUserData($idUser);
        $email = $userInfo->Email;

        try {

            $productInfo = $this->SampleStoreModel->getProductDetails($idProduct);

            $orderReference = $this->generateOrderReference();
            $this->PaymentModel->saveOrder($idUser, $idProduct, $orderReference);

            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $this->sendservice->sendOrder($apiCredentials, $email, $productInfo->Price, $productInfo->Currency, $orderReference);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

     }

     private function generateOrderReference()
     {
         return rand(10000, 99999);
     }

}
