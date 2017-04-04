<?php

class ApiClient
{
    function __construct()
    {
        $this->CI = &get_instance();
    }

    const BANK_URL = "http://192.168.24.20/api/v1/";

    const API_ENDPOINT_PAY = "pay";
    const API_ENDPOINT_REFUND = "refund";
    const API_ENDPOINT_GET_BALANCE = "getBalance";
    const API_ENDPOINT_GET_CARD_DATA = "getCardData";

    public function generateUUID()
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

    /**
     * @return array
     */
    public function getHeaders()
    {
        $apiCredentials = $this->CI->AuthenticatorModel->getApiCredentials();

        $headers = [
            'Authorization :' . $apiCredentials->ClientId . ',' . $apiCredentials->SecretKey,
            'Content-Type: application/json',
        ];

        return $headers;
    }


}
