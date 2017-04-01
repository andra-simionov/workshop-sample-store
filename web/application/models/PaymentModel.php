<?php

class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $idUser
     * @param int $idProduct
     */
    public function saveOrder($idUser, $idProduct)
    {
        $data = [
            'IdUser' => $idUser,
            'IdProduct' => $idProduct,
            'Date' => gmdate('Y-m-d H:i:s'),
        ];

        $this->db->insert('orders', $data);
    }
}
