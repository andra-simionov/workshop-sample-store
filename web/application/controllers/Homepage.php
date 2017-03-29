<?php

class Homepage extends CI_Controller
{
    function index()
    {
        $this->load->helper(['form', 'url']);

        $this->load->library('Smartyci');
        $this->load->library('session');
        $smartyci = new Smartyci();

        $result = $this->HomepageModel->getProducts();

        $smartyci->assign("products", $result);

        $smartyci->display('Homepage.tpl');
    }
}




