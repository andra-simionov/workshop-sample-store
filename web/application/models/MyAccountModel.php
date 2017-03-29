<?php

class MyAccountModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $username
     * @return array
     */
    public function getUserData($username)
    {
        $result = $this->db->select('*')
            ->from('credit_cards')
            ->join('users', 'users.IdUser = credit_cards.IdUser', 'inner')
            ->where('users.Username', $username)
            ->get()
            ->result_array();

        return $result;
    }

}
