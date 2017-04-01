<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SampleStore extends CI_Controller
{
    public function index()
    {
        exit('No direct script access allowed');
    }

    public function loggedIn($idUser)
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->load->library('Smartyci');

        $this->session->set_userdata(['IdUser' => $idUser]);

        $allProducts = $this->SampleStoreModel->getProducts();

        $this->smartyci->assign("products", $allProducts);

        $this->smartyci->assign("idUser", $idUser);
        $this->smartyci->display('SampleStore.tpl');
    }
}




