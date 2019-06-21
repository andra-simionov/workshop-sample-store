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
    public function getUserOrders($idUser): array
    {
        $result = $this->db->select('*')
            ->from('orders')
            ->join('products', 'products.IdProduct = orders.IdProduct', 'inner')
            ->where('orders.IdUser', $idUser)
			->order_by('orders.Date', 'DESC')
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
    public function saveOrder($idUser, $idProduct, $orderReference): bool
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
	 * @param string $orderReference
	 * @param string $status
	 *
	 * @return bool
	 */
	public function updateOrderStatus($orderReference, $status): bool
	{
		$this->db->where('OrderReference', $orderReference)
			->update('orders', ['OrderStatus' => $status]);

		return $this->db->affected_rows() > 0;
	}
}
