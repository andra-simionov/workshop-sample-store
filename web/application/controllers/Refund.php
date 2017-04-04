<?php


class Refund extends CI_Controller
{
    const ORDER_STATUS_REFUNDED = "REFUNDED";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $orderReference = $this->input->post('orderReference');
        $email = $this->input->post('email');

        try {
            $orderInfo = $this->OrderModel->getOrderDataByOrderReference($orderReference);

            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $response = $this->sendservice->sendOrder($apiCredentials, $email, $orderInfo['products.Price'], $orderInfo['products.Currency'], $orderReference);

            $this->sendservice->interpretApiResponse($response, self::ORDER_STATUS_REFUNDED);

            echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
     }
}
