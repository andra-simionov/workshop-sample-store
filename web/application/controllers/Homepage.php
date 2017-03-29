<?php

class Homepage extends CI_Controller
{
    function index()
    {
        $this->load->helper(['form', 'url']);

        $this->load->library('Smartyci');
        $this->load->library('session');
        $smartyci = new Smartyci();

        $smartyci->assign("products",
            ['product1' => 'Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis',
                'product2' => '2Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisi'
            ]);

        $smartyci->display('Homepage.tpl');
    }
}




