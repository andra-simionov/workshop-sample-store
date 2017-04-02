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
     * @param string $orderReference
     * @param string $status
     *
     * @return bool
     */
    public function updateOrderStatus($orderReference, $status)
    {
        $this->db->where('OrderReference', $orderReference)
            ->update('orders', ['OrderStatus' => $status]);

        return $this->db->affected_rows() > 0;
    }

}
