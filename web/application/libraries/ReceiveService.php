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
     * @param string $email
     * @param string $token
     *
     * @return string
     *
     * @throws Exception
     */
    public function getBalance($email, $token)
    {
        $headers = $this->CI->apiclient->getHeaders();

        $data = [
            'requestId' => $this->CI->apiclient->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
            'token' => $token,
        ];

        $this->CI->httpclient->setOptions(
            [
                'headers' => $headers,
                'data' => http_build_query($data),
                'url' => ApiClient::BANK_URL . ApiClient::API_ENDPOINT_GET_BALANCE
            ]);

        if($this->CI->httpclient->get()){

            $response = $this->CI->httpclient->getResults();

            $balance = $this->extractBalanceFromBankResponse($response);
            return $balance;

        } else {
            throw new \Exception($this->CI->httpclient->getErrorMsg());
        }
    }

    /**
     * @param string $email
     * @param string $token
     *
     * @return string
     *
     * @throws Exception
     */
    public function getCardData($email, $token)
    {
        $headers = $this->CI->apiclient->getHeaders();

        $data = [
            'requestId' => $this->CI->apiclient->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
            'token' => $token,
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
            throw new \Exception($this->CI->httpclient->getErrorMsg());
        }
    }


    /**
     * @param string $response
     * @return string
     */
    public function extractBalanceFromBankResponse($response)
    {
        $responseParameters = json_decode($response, true);

        $balance = $responseParameters['userData']['balance'];
        return $balance;
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