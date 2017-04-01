<?php

class Payment extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');

        $this->session->sess_destroy();
        $this->session->set_userdata(['IdUser' => $idUser]);

        $this->PaymentModel->saveOrder($idUser, $idProduct);
       }
}
