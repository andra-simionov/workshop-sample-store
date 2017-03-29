<?php

class HomepageModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts()
    {
        $result = $this->db->select(['ProductName', 'Price'])
            ->from('products')
            ->get()
            ->result_array();

        return $result;
    }
}
