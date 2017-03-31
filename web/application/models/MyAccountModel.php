<?php

class MyAccountModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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
     * @param string $idUser
     * @return array
     */
    public function getUserOrders($idUser)
    {
        $result = $this->db->select('*')
            ->from('orders')
            ->join('products', 'products.IdProduct = orders.IdProduct', 'inner')
            ->where('orders.IdUser', $idUser)
            ->get()
            ->result_array();

        return $result;
    }

    /**
     * @param string $username
     * @return mixed
     */
    public function getUserInfo($username)
    {
        $result = $this->db->select('*')
            ->from('users')
            ->where('users.Username', $username)
            ->get();

        return $result->first_row();
    }
}
