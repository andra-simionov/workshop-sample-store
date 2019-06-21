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
     *
     * @return bool
     */
    public function registerUser($username, $password, $email): bool
    {
        $userData = [
            'Username' => $username,
            'Password' => $this->hashPassword($password),
            'Email' => $email,
        ];

        return $this->db->insert('users', $userData);
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function isUserRegistered(array $data): bool
    {
        $username = $data['username'];
        $password = $data['password'];

        $result = $this->db->select('*')
            ->from('users')
            ->where(['Username' => $username, 'Password' => $password])
            ->get()
            ->result_array();

        return count($result) > 0;
    }

    /**
     * @param int $idUser
     * @param string $token
     *
     * @return bool
     */
    public function updateToken($idUser, $token): bool
    {
        $token = trim($token);

        $this->db->where('IdUser', $idUser)
            ->update('users', ['Token' => $token]);

        return $this->db->affected_rows() > 0;
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function emailAlreadyExists($email): bool
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where(['Email' => $email])
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
     *
     * @throws Exception
     */
    public function getUserData($idUser): stdClass
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.IdUser', $idUser)
            ->get();

        if ($result->first_row() != NULL) {
            return $result->first_row();
        } else {
            throw new \Exception("Invalid user!");
        }
    }

    /**
     * @param string $username
     * @return stdClass
     *
     * @throws Exception
     */
    public function getUserInfoByUsername($username): stdClass
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.Username', $username)
            ->get();

        if ($result->first_row() != NULL) {
            return $result->first_row();
        } else {
            throw new \Exception("Invalid user!");
        }
    }

    /**
     * @param string $password
     * @return string
     */
    public function hashPassword($password): string
    {
        $salt = $this->generateSalt();
        return $salt . '.' . md5($salt . $password);
    }

    /**
     * @param string $password
     * @param string $hashedPassword
     * @return bool
     */
    public function checkPassword($password, $hashedPassword): bool
    {
        list($salt, $hash) = explode('.', $hashedPassword);
        $hashedFormPassword = $salt . '.' . md5($salt . $password);
        return ($hashedPassword == $hashedFormPassword);
    }

    /**
     * @param int $length
     * @return string
     */
    private function generateSalt($length = 10): string
    {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 0;
        $salt = "";
        while ($i < $length) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
    }


}
