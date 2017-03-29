<?php

class Login extends CI_Controller
{
    function index()
    {

        parent::__construct();
        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('session');
        $this->load->library('form_validation');
        //$this->load->model('LoginModel');
        $smartyci = new Smartyci();
        $smartyci->setCompileCheck(false);

        $config =  [
            [
                'field'   => 'username',
                'label'   => 'Username',
                'rules'   => 'trim|required|min_length[5]'
            ],
            [
                'field'   => 'password',
                'label'   => 'Password',
                'rules'   => 'trim|required|min_length[5]'
            ]
        ];

//        var_dump($this->input->post); die();
//        var_dump($this->input->post('username'));
//        var_dump($this->input->post('password')); die();


        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE && !isset($this->session->all_userdata()['Username'])) {
            $smartyci->display('LoginView.tpl');
        } else if ($this->form_validation->run() == TRUE && !isset($this->session->all_userdata()['Username'])) {
            $data = [
                'username' => $this->input->post('username'),
                'userpassword' => $this->input->post('password')
            ];

            var_dump($data); die();

            $result = $this->LoginModel->login($data);

            if ($result != TRUE) {
                $smartyci->assign('eroare', 'Invalid username or password');
                $smartyci->display('LoginError.tpl');
            } else {
                $data = $this->input->post('username');
                $result = $this->LoginModel->getUserInfo($data);
                $this->LoginModel->updateLastLogin($result['Id']);

                $this->session->set_userdata($result);

                $smartyci->display('LoginSuccess.tpl',$data);

            }
        } else {

            $smartyci->display('LoginSuccess.tpl');


        }
    }
}


