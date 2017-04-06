<?php


class Refund extends CI_Controller
{
    const ORDER_STATUS_REFUNDED = "REFUNDED";
    const ORDER_STATUS_REJECTED = "REJECTED";

    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('SendService');

        $orderReference = $this->input->post('orderReference');
        $idUser = $this->input->post('idUser');
     }
}
