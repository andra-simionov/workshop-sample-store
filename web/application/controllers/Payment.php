<?php

use GuzzleHttp\Psr7\Request;

class Payment extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');

        $this->session->sess_destroy();
        $this->session->set_userdata(['IdUser' => $idUser]);

        $email = 'diana@yahoo.com';

        $productInfo = $this->PaymentModel->getProductDetails($idProduct);
        $this->PaymentModel->saveOrder($idUser, $idProduct);

        $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
        $this->sendSold($apiCredentials, $productInfo->Price, $productInfo->Currency);
    }


       function sendSold($apiCredentials, $price, $currency)
       {
           $data = [
               'orderData' => [
                   'amount' => $price,
                   'currency' => $currency
               ]
           ];

           $body = json_encode($data);
           $request = new Request('POST', 'http://dummyurl', $headers = [], $body);
           $request = $request->withHeader('Authorization', 'secretKey ' . $apiCredentials->SecretKey);

           $client = new GuzzleHttp\Client();
           var_dump($request); die();

           $response = $client->send($request);
       }
}
