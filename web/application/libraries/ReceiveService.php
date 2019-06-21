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
     * @param string $response
     * @return string
     *
     * @throws Exception
     */
    public function extractBalanceFromBankResponse($response)
    {
		//TODO: better validate response (HTTP response code, valid json)
        $responseParameters = json_decode($response, true);

        if ($responseParameters['meta']['status'] == 'Ok') {
            $balance = $responseParameters['userData']['balance'];
        } else {
            throw new \Exception($responseParameters['meta']['message']);
        }

        return $balance;
    }

}
