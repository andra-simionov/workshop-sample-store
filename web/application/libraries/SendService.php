<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class SendService
{
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('ApiClient');
    }

}
