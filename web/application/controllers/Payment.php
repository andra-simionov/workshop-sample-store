<?php


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

//        $idUser = $this->input->get('idUser');
//        $idProduct = $this->input->get('idProduct');

        $userInfo = $this->UserModel->getUserData($idUser);
        $email = $userInfo->Email;

        try {
            $productInfo = $this->SampleStoreModel->getProductDetails($idProduct);
            $this->PaymentModel->saveOrder($idUser, $idProduct);
            $apiCredentials = $this->AuthenticatorModel->getApiCredentials($email);
            $this->sendOrder($apiCredentials, $email, $productInfo->Price, $productInfo->Currency);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

     }

    /**
     * @param stdClass $apiCredentials
     * @param string $email
     * @param int $price
     * @param string $currency
     *
     * @throws Exception
     */
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

        $this->load->library('HttpClient',
                [
                    'headers' => $headers,
                    'data' => json_encode($data),
                    'url' => 'http://192.168.24.20/SoldController/sold/format/json'
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
