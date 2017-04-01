<?php

class Authenticator extends CI_Controller
{
    function index()
    {
        exit('No direct script access allowed');
    }

    /**
     * @param string $email
     * @return stdClass
     */
    function getApiCredentials($email)
    {
        $credentials = $this->AuthenticatorModel->getApiCredentials($email);
        redirect('Payment/sendApiCredentials/' . $credentials->ClientId . '/' . $credentials->SecretKey);
    }
}
