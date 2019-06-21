<?php


class Refund extends CI_Controller
{
    const ORDER_STATUS_REFUNDED = "REFUNDED";
    const ORDER_STATUS_REJECTED = "REJECTED";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $orderReference = $this->input->post('orderReference');
        $idUser = $this->input->post('idUser');

        try {
            $userInfo = $this->UserModel->getUserData($idUser);
            $email = $userInfo->Email;

            $orderInfo = $this->OrderModel->getOrderDataByOrderReference($orderReference);

            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $response = $this->sendservice->refundOrder($apiCredentials, $email, $orderInfo->Price, $orderInfo->Currency, $orderReference);

            $this->sendservice->interpretRefundApiResponse($response);

            echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
     }
}
