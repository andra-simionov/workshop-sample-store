<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class RegisterForm extends CI_Controller
{
    function index()
    {
        parent::__construct();

        $this->load->helper(['form', 'url']);
        $this->load->library('Smartyci');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->smartyci->setCompileCheck(false);

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');

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
            ],
            [
                'field'   => 'email',
                'label'   => 'Email',
                'rules'   => 'trim|required|min_length[5]'
            ],


        ];

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == TRUE) {
//            if ($this->UserModel->emailAlreadyExists($email)) {
//                $this->smartyci->display('Register/RegisterErrorView.tpl');
//            }
            $this->UserModel->registerUser($username, $password, $email);
        }

        $this->smartyci->display('Register/RegisterSuccessView.tpl');
    }
}
