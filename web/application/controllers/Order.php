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

        try {

            $userInfo = $this->UserModel->getUserData($idUser);

            $email = $userInfo->Email;

            $productInfo = $this->SampleStoreModel->getProductDetails($idProduct);

            $orderReference = $this->generateOrderReference();
            $this->OrderModel->saveOrder($idUser, $idProduct, $orderReference);

            $response = $this->sendservice->payOrder($userInfo->Token, $email, $productInfo->Price, $productInfo->Currency, $orderReference);

            $this->sendservice->interpretPayApiResponse($response);

            echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

     }

    private function generateOrderReference()
    {
        return rand(10000, 99999);
    }


}
