<?php

class SampleStoreModel extends CI_Model
{
    /**
     * @return array
     */
    public function getAllProducts()
    {
        $result = $this->db->select(['ProductName', 'Price', 'IdProduct', 'Currency'])
            ->from('products')
            ->get()
            ->result_array();

        return $result;
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
}
