<?php

class Register extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('session');

        $this->smartyci->setCompileCheck(false);

        $this->smartyci->display('Register/RegisterView.tpl');
    }
}
