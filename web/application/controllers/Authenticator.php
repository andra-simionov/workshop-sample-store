<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Authenticator extends CI_Controller
{
    public function index()
    {
        exit('No direct script access allowed');
    }

    /**
     * @param string $email
     * @return stdClass
     */
    public function getApiCredentials($email)
    {
        $credentials = $this->AuthenticatorModel->getApiCredentials($email);
        redirect('Payment/sendApiCredentials/' . $credentials->ClientId . '/' . $credentials->SecretKey);
    }
}
