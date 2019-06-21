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

            //TODO 3: let's handle the response, so we can return something meaningful to the user
            return $response;

        } else {
            throw new \Exception($this->CI->httpclient->getErrorMsg());
        }
    }

    /**
     * @param string $response
     * @return string
     *
     * @throws Exception
     */
    public function extractBalanceFromBankResponse($response)
    {
		//TODO 3: how about that response handling (maybe we can read the balance value from response here?)
    }

}
