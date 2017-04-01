<?php


class Payment extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');

//        $idUser = $this->input->post('idUser');
//        $idProduct = $this->input->post('idProduct');

        $idUser = $this->input->get('idUser');
        $idProduct = $this->input->get('idProduct');

        $this->session->sess_destroy();
        $this->session->set_userdata(['IdUser' => $idUser]);

        $email = 'diana@yahoo.com';

        $productInfo = $this->PaymentModel->getProductDetails($idProduct);
        $this->PaymentModel->saveOrder($idUser, $idProduct);

        $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
        $this->sendOrder($apiCredentials, $productInfo->Price, $productInfo->Currency);
    }


   function sendOrder($apiCredentials, $price, $currency)
   {
       $headers = [
           'Authorization :' . $apiCredentials->ClientId . ';' . $apiCredentials->SecretKey,
           'Content-Type: application/json',
       ];

       $data = [
           'orderData' => [
               'amount' => $price,
               'currencly' => $currency
           ]
       ];

        $this->load->library('HttpClient',
                [
                    'headers' => $headers,
                    'data' => $data,
                    'url' => 'http://somesite.com/api/1.0'
                ]
           );

       if($this->httpclient->post()){
           var_dump($this->httpclient->getResults());
       } else {
           echo $this->httpclient->getErrorMsg();
       }
   }
}
