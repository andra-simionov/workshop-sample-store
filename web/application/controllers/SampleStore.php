<?php

class SampleStore extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);

        $this->load->library('Smartyci');
        $this->load->library('session');
        $smartyci = new Smartyci();

        $allProducts = $this->HomepageModel->getProducts();
        $smartyci->assign("products", $allProducts);

        $smartyci->display('SampleStore.tpl');
    }
}




