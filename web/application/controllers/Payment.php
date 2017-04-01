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

        $userInfo = $this->MyAccountModel->getUserData($idUser);
        $email = $userInfo->Email;

        try {
            $productInfo = $this->PaymentModel->getProductDetails($idProduct);
            $this->PaymentModel->saveOrder($idUser, $idProduct);
            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $this->sendOrder($apiCredentials, $email, $productInfo->Price, $productInfo->Currency);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

     }


   function sendOrder($apiCredentials, $email, $price, $currency)
   {
       $headers = [
           'Authorization :' . $apiCredentials->ClientId . ',' . $apiCredentials->SecretKey,
           'Content-Type: application/json',
       ];

       $data = [
           'id' => $this->generateUUID(),
           'timestamp' => date('Y-m-d h:i:s'),
           'email' => $email,
           'orderData' => [
               'amount' => $price,
               'currency' => $currency
           ]
       ];

      // var_dump($data); die();

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
           throw new \Exception($this->httpclient->getErrorMsg());
       }
   }

    private function generateUUID()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
