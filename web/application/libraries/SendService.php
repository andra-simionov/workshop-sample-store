<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class SendService
{
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
        $CI = & get_instance();

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

        $CI->load->library('HttpClient',
            [
                'headers' => $headers,
                'data' => json_encode($data),
                'url' => Payment::BANK_URL
            ]
        );

        // todo - add logic for upddating order status
        if($CI->httpclient->post()){
            var_dump($CI->httpclient->getResults());
        } else {
            throw new \Exception($CI->httpclient->getErrorMsg());
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