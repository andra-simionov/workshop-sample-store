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

        $this->smartyci->setCompileCheck(false);

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

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE && !isset($this->session->all_userdata()['IdUser'])) {
            $this->smartyci->display('Login/LoginView.tpl');
        } else if ($this->form_validation->run() == TRUE && !isset($this->session->all_userdata()['IdUser'])) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $userData = $this->UserModel->getUserInfoByUsername($username);

            if ($userData == NULL) {
                $correctCredentials = FALSE;
            } else {
                $correctCredentials = $this->UserModel->checkPassword($password, $userData->Password);
            }

            if ($correctCredentials != TRUE) {
                $this->smartyci->assign('error', 'Invalid username or password');
                $this->smartyci->display('Login/LoginError.tpl');
            } else {
                $userInfo = $this->UserModel->getUserInfoByUsername($username);

                $userId = $userInfo->IdUser;
                $this->session->set_userdata(['IdUser' => $userId]);

                redirect('SampleStore');
            }
        } else {
            redirect('SampleStore');
         }
    }
}


