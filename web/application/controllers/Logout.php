<?php

class Logout extends CI_Controller
{
    function index()
    {
        $this->load->helper(['form', 'url']);

        $this->load->library('Smartyci');
        $smartyci = new Smartyci();

        $this->session->sess_destroy();
        $smartyci->display('Homepage.tpl');
    }
}




