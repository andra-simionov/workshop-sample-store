<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class GetService
{
    /**
     * @param stdClass $apiCredentials
     * @param string $email
     *
     * @return array
     *
     * @throws Exception
     */
    function getSold($apiCredentials, $email)
    {
        $CI = & get_instance();

        $headers = [
            'Authorization :' . $apiCredentials->ClientId . ',' . $apiCredentials->SecretKey,
            'Content-Type: application/json',
        ];

        $data = [
            'requestId' => $this->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
        ];

        $CI->load->library('HttpClient',
            [
                'headers' => $headers,
                'data' => json_encode($data),
                'url' => MyAccount::GET_SOLD_URL
            ]
        );

        if($CI->httpclient->get()){
            return $CI->httpclient->getResults();
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