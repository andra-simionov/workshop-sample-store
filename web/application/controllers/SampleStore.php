<?php

class SampleStore extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->load->library('Smartyci');
        $smartyci = new Smartyci();

        $allProducts = $this->SampleStoreModel->getProducts();
        $smartyci->assign("products", $allProducts);

        $idUser = 1; //todo -session
        $smartyci->assign("idUser", $idUser);

        $smartyci->display('SampleStore.tpl');
    }
}




