<?php

class Forms extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

    public function load_login_form()
    {
        $data['title'] = 'Log in Twitter';
        $data['username'] = NULL;
        $data['link'] = 'Sign up now!';
        $data['link_address'] = '../forms/load_signup_form';

        $data['error_exists'] = FALSE;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/promotion');
        $this->load->view('html/login_form', $data);
        $this->load->view('templates/footer');
    }

    public function login_try()
    {
        $data['title'] = 'Log in Twitter';
        $data['username'] = NULL;
        $data['link'] = 'Sign up now!';
        $data['link_address'] = '../forms/load_signup_form';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        // see -> config/form_validation for rules
        if ($this->form_validation->run() === FALSE || $this->login_validate() === FALSE) {
            $data['error_exists'] = TRUE;
            $data['error_description'] = "Username or password is incoreect.";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/promotion');
            $this->load->view('html/login_form', $data);
            $this->load->view('templates/footer');
        } else {
            $data['username'] = $this->input->post('username');
            $data['link'] = 'Log out';
            $data['link_address'] = '#';

            $this->load->view('templates/header', $data);
            $this->load->view('html/user_home');
            $this->load->view('templates/footer');
        }
    }

    public function login_validate()
    {
        // return TRUE if log in is successful
        $username = $this->input->post('username');
        $input_password = $this->input->post('password');

        $real_password = $this->user_model->get_password_from_username($username);
        return $real_password && $real_password === $input_password;
    }

    public function load_signup_form()
    {
        $data['title'] = 'Sign up for Twitter';

        $data['link'] = 'Log in now!';
        $data['link_address'] = '../forms/load_login_form';
        $data['username'] = NULL;
        $data['error_exists'] = FALSE;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/promotion');
        $this->load->view('html/signup_form', $data);
        $this->load->view('templates/footer');       
    }

    public function signup_try()
    {
        $data['title'] = 'Sign up for Twitter';

        // see -> config/form_validations for rules
        if ($this->form_validation->run('signup') === FALSE) {
            $data['title'] = 'Sign up for Twitter';
            $data['username'] = NULL;
            $data['link'] = 'Log in now!';
            $data['link_address'] = '../forms/load_login_form';            

            $data['error_exists'] = TRUE;
            $data['error_description'] = $this->error_description_for_signup();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/promotion');
            $this->load->view('html/signup_form', $data);
            $this->load->view('templates/footer');           
        } else {
            $this->user_model->register();
            $this->load->view('html/formsuccess');
        }
    }

    public function error_description_for_signup()
    {
        // get the most relevant error
        if (form_error('email')) $erorr = 'That does not look like a valid email address.';
        if (form_error('passconf') || form_error('password')) $error = 'Oops, Password does not match.'; 
        if (form_error('username')) $error = 'That username is too short/long or has already taken.';

        return $error;
    }
}
?>