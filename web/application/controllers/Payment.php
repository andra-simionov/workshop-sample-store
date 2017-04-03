<?php


class Payment extends CI_Controller
{
    const ORDER_STATUS_FAILED = "FAILED";
    const ORDER_STATUS_PAID = "PAID";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

//        $idUser = $this->input->post('idUser');
//        $idProduct = $this->input->post('idProduct');

        $idUser = $this->input->get('idUser');
        $idProduct = $this->input->get('idProduct');

        try {

            $userInfo = $this->UserModel->getUserData($idUser);
            $email = $userInfo->Email;

            $productInfo = $this->SampleStoreModel->getProductDetails($idProduct);

            $orderReference = $this->generateOrderReference();
            $this->OrderModel->saveOrder($idUser, $idProduct, $orderReference);

            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $response = $this->sendservice->sendOrder($apiCredentials, $email, $productInfo->Price, $productInfo->Currency, $orderReference);

            $this->interpretApiResponse($response);

            echo $response;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

     }

     private function interpretApiResponse($response)
     {
         $responseParameters = json_decode($response, true);

         $orderReference = $responseParameters['orderData']['reference'];

         if ($responseParameters['meta']['status'] == 'OK') {
             $this->OrderModel->updateOrderStatus($orderReference, self::ORDER_STATUS_PAID);
         } else {
             $this->OrderModel->updateOrderStatus($orderReference, self::ORDER_STATUS_FAILED);
         }
     }

    private function generateOrderReference()
    {
        return rand(10000, 99999);
    }


}
