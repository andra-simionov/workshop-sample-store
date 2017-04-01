<?php

class Logout extends CI_Controller
{
    function index()
    {
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        $this->load->library('Smartyci');

        $this->session->sess_destroy();
        $this->smartyci->display('Homepage.tpl');
    }
}




