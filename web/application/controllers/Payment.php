<?php

class Payment extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');

        $idUser = $this->input->post('idUser');
        $idProduct = $this->input->post('idProduct');

        $this->PaymentModel->saveOrder($idUser, $idProduct);

       }
}
