<?php

class UserModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $username
     * @param string $password
     * @param string $email
     * @return bool
     */
    public function registerUser($username, $password, $email)
    {
        $userData = [
            'Username' => $username,
            'Password' => $password,
            'Email' => $email,
        ];

        $this->db->insert('users', $userData);
    }

    /**
     * @param array $data
     *
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
     * @param int $idUser
     * @return stdClass
     */
    public function getUserData($idUser)
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.IdUser', $idUser)
            ->get();

        return $result->first_row();
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function getUserInfoByUsername($username)
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.Username', $username)
            ->get();

        return $result->first_row();
    }

}
