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

        $this->CI->load->library('HttpClient');
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

        $this->CI->httpclient->setOptions(
            [
                'headers' => $headers,
                'data' => http_build_query($data),
                'url' => ApiClient::BANK_URL . ApiClient::API_ENDPOINT_GET_SOLD
            ]);

        if($this->CI->httpclient->get()){
            $response = $this->CI->httpclient->getResults();

            $sold = $this->extractSoldFromBankResponse($response);
            return $sold;

        } else {
            $soldInfo = $this->CI->httpclient->getErrorMsg();
            return $soldInfo;
        }
    }

    /**
     * @param stdClass $apiCredentials
     * @param string $email
     *
     * @return string
     *
     * @throws Exception
     */
    function getCardData($apiCredentials, $email)
    {
        $headers = $this->CI->apiclient->getHeaders($apiCredentials);

        $data = [
            'requestId' => $this->CI->apiclient->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
        ];

        $this->CI->httpclient->setOptions(
            [
                'headers' => $headers,
                'data' => http_build_query($data),
                'url' => ApiClient::BANK_URL . ApiClient::API_ENDPOINT_GET_CARD_DATA
            ]);

        if($this->CI->httpclient->get()){
            $response = $this->CI->httpclient->getResults();

            $cardData = $this->extractCardDataFromBankResponse($response);
            return $cardData;

        } else {
            return $this->CI->httpclient->getErrorMsg();
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


    /**
     * @param string $response
     * @return array
     */
    public function extractCardDataFromBankResponse($response)
    {
        $responseParameters = json_decode($response, true);

        return $responseParameters['cardData'];
    }



}