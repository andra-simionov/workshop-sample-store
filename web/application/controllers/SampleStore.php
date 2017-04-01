<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SampleStore extends CI_Controller
{
    function index()
    {
        exit('No direct script access allowed');
    }

    function loggedIn($idUser)
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->load->library('Smartyci');

        $this->session->set_userdata(['IdUser' => $idUser]);

        $smartyci = new Smartyci();

        $allProducts = $this->SampleStoreModel->getProducts();

        $smartyci->assign("products", $allProducts);

        $smartyci->assign("idUser", $idUser);
        $smartyci->display('SampleStore.tpl');
    }
}




