<?php

class OrderModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $idUser
     *
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
     * @param int $idUser
     * @param int $idProduct
     * @param string $orderReference
     *
     * @return bool
     */
    public function saveOrder($idUser, $idProduct, $orderReference)
    {
        $data = [
            'IdUser' => $idUser,
            'IdProduct' => $idProduct,
            'OrderReference' => $orderReference,
            'Date' => gmdate('Y-m-d H:i:s'),
        ];

        $this->db->insert('orders', $data);

        return $this->db->affected_rows() > 0;
    }

    /**
     * @param $orderReference
     * @return mixed
     */
    public function getOrderDataByOrderReference($orderReference)
    {
        $result = $this->db->select('products.Price, products.Currency')
            ->from('orders')
            ->where('orders.OrderReference', $orderReference)
            ->join('products', 'orders.IdProduct = products.IdProduct')
            ->get()
            ->first_row();

        return $result;
    }

}
