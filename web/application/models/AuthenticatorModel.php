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
     *
     * @throws Exception
     */
    public function getApiCredentials($email)
    {
        $result = $this->db->select('*')
            ->from('user_credentials')
            ->where(['Email' => $email])
            ->get();

        if ($result->first_row() != NULL) {
            return $result->first_row();
        } else {
            throw new \Exception("Invalid email. Can't provide api credentials for it");
        }
    }
}
