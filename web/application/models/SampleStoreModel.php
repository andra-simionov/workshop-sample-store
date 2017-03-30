<?php

class SampleStoreModel extends CI_Model
{
    /**
     * @return array
     */
    public function getProducts()
    {
        $result = $this->db->select(['ProductName', 'Price'])
            ->from('products')
            ->get()
            ->result_array();

        return $result;
    }
}
