<?php

class AuthenticatorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $email
     * @return stdClass
     */
    public function getApiCredentials($email)
    {
        $result = $this->db->select('*')
            ->from('user_credentials')
            ->where(['Email' => $email])
            ->get();

        return $result->first_row();
    }
}
