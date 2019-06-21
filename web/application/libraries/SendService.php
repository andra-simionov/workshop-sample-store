<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SendService
{
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('ApiClient');
    }

    /**
     * @param string $token
     * @param string $email
     * @param int $price
     * @param string $currency
     * @param string $orderReference
     *
     * @return array
     *
     * @throws Exception
     */
    function payOrder($token, $email, $price, $currency, $orderReference)
    {
        $headers = $this->CI->apiclient->getHeaders();

        $data = [
            'requestId' => $this->CI->apiclient->generateUUID(),
            'timestamp' => date('Y-m-d h:i:s'),
            'email' => $email,
            'token' => $token,
            'orderData' => [
                'reference' => $orderReference,
                'amount' => $price,
                'currency' => $currency
            ]
        ];

        $this->CI->load->library('HttpClient',
            [
                'headers' => $headers,
                'data' => json_encode($data),
                'url' => ApiClient::BANK_URL . ApiClient::API_ENDPOINT_PAY
            ]
        );

        if ($this->CI->httpclient->post()){
            return $this->CI->httpclient->getResults();
        } else {
            throw new \Exception($this->CI->httpclient->getErrorMsg());
        }
    }

    /**
     * @param string $response
     */
    public function interpretPayApiResponse($response)
    {
        $responseParameters = $this->parseApiResponse($response);

        $orderReference = $responseParameters['orderData']['reference'];

        if ($responseParameters['meta']['status'] == 'Ok') {
            $this->CI->OrderModel->updateOrderStatus($orderReference, Order::ORDER_STATUS_PAID);
        } else {
            $this->CI->OrderModel->updateOrderStatus($orderReference, Order::ORDER_STATUS_FAILED);
        }
    }

    /**
     * @param $response
     * @return mixed
     */
    private function parseApiResponse($response)
    {
        return $responseParameters = json_decode($response, true);
    }
}
