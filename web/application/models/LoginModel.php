<?php

class LoginModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function isUserRegistered(array $data)
    {
        $username = $data['username'];
        $password = $data['password'];

        $result = $this->db->select('*')
            ->from('users')
            ->where(['Username' => $username, 'Password' => $password])
            ->get()
            ->result_array();

        if (count($result) > 0) {
            return true;
        }

        return false;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function getUserInfo(array $data)
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where(['Username' => $data['username'], 'Password' => $data['password']])
            ->get()
            ->result_array();

        return $result;
    }
}
