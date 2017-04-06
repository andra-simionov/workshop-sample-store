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

}
