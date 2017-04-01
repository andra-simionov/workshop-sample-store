<?php

class PaymentModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @param int $idProduct
     * @return stdClass
     *
     * @throws Exception
     */
    public function getProductDetails($idProduct)
    {
        $result = $this->db->select('*')
            ->from('products')
            ->where('products.IdProduct', $idProduct)
            ->get();

        if ($result->first_row() != NULL) {
            return $result->first_row();
        } else {
            throw new \Exception("Invalid product. Can't provide details for it!");
        }
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
