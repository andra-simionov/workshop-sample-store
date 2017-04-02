<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SampleStore extends CI_Controller
{
    public function index()
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->load->library('Smartyci');

        $idUser = $this->session->all_userdata()['IdUser'];

        $allProducts = $this->SampleStoreModel->getAllProducts();

        $this->smartyci->assign("products", $allProducts);

        $this->smartyci->assign("idUser", $idUser);
        $this->smartyci->display('SampleStore.tpl');
    }

}




