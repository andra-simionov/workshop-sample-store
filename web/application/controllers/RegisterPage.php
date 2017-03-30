<?php

class RegisterPage extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('session');

        $smartyci = new Smartyci();

        $smartyci->display('RegisterView.tpl');
    }
}
