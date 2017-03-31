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

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == FALSE && !isset($this->session->all_userdata()['IdUser'])) {
            $smartyci->display('LoginView.tpl');
        } else if ($this->form_validation->run() == TRUE && !isset($this->session->all_userdata()['IdUser'])) {

            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ];

            $result = $this->LoginModel->isUserRegistered($data);

            if ($result != TRUE) {
                $smartyci->assign('error', 'Invalid username or password');
                $smartyci->display('LoginError.tpl');
            } else {
                $userInfo = $this->MyAccountModel->getUserInfo($data['username']);

                $userId = $userInfo->IdUser;
                $this->session->set_userdata(['IdUser' => $userId]);

                redirect('SampleStore/loggedIn/' . $userId);
            }
        } else {
            $userId = $this->session->all_userdata()['IdUser'];
            redirect('SampleStore/loggedIn/' . $userId);

            //$smartyci->display('Homepage.tpl');
         }
    }
}


