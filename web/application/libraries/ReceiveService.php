<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ReceiveService
{
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('ApiClient');
    }

    /**
     * @param stdClass $apiCredentials
     * @param string $email
     *
     * @return string
     *
     * @throws Exception
     */
    function getSold($apiCredentials, $email)
    {
        $headers = $this->CI->apiclient->getHeaders($apiCredentials);

        $data = [
            'requestId' => $this->CI->apiclient->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
        ];

        $this->CI->load->library('HttpClient',
            [
                'headers' => $headers,
                'data' => http_build_query($data),
                'url' => ApiClient::BANK_URL . ApiClient::API_ENDPOINT_GET_SOLD
            ]
        );

        if($this->CI->httpclient->get()){
            $result = $this->CI->httpclient->getResults();

            $sold = $this->extractSoldFromBankResponse($result);
            return $sold;

        } else {
            var_dump($this->CI->httpclient->getErrorMsg()); die();
            throw new \Exception($this->CI->httpclient->getErrorMsg());
        }
    }

    /**
     * @param string $response
     * @return string
     */
    public function extractSoldFromBankResponse($response)
    {
        $responseParameters = json_decode($response, true);

        $sold = $responseParameters['userData']['sold'];
        return $sold;
    }


}