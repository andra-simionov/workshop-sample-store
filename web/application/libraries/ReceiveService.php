<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class ReceiveService
{
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('ApiClient');
        $this->CI->load->library('HttpClient');
    }

}
