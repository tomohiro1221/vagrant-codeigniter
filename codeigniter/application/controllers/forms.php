<?php

class Forms extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('user_model');
    }

    public function login_setup()
    {
        $data['title'] = 'Log in Twitter';
        $data['username'] = null;
        $data['link'] = 'Sign up now!';
        $data['link_address'] = 'forms/load_signup_form';
        $data['error_exists'] = false;

        return $data;
    }

    public function load_login_form()
    {
        /*$data['title'] = 'Log in Twitter';
        $data['username'] = null;
        $data['link'] = 'Sign up now!';
        $data['link_address'] = 'forms/load_signup_form';*/

        $data['error_exists'] = false;
        $data = $this->login_setup();
        $this->render(array('templates/promotion', 'html/login_form'), $data);
    }

    public function login_try()
    {
        /*$data['title'] = 'Log in Twitter';
        $data['username'] = null;
        $data['link'] = 'Sign up now!';
        $data['link_address'] = 'forms/load_signup_form';*/
        $data = $this->login_setup();
        /*$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');*/
        
        // see config/form_validation for rules
        if ($this->form_validation->run('login') === false || $this->login_validate() === false) {
            $data['error_exists'] = true;
            $data['error_description'] = "Username or password is incoreect.";

            $this->render(array('templates/promotion', 'html/login_form'), $data);
        } else { // Log in success!
            $username = $this->input->post('username');
            $this->_login($username);
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

    public function signup_setup()
    {
        $data['title'] = 'Sign up for Twitter';
        $data['link'] = 'Log in now!';
        $data['link_address'] = 'forms/load_login_form';
        $data['username'] = null;
        $data['error_exists'] = false;

        return $data;
    }

    public function load_signup_form()
    {
        /*$data['title'] = 'Sign up for Twitter';
        $data['link'] = 'Log in now!';
        $data['link_address'] = 'forms/load_login_form';
        $data['username'] = null;
        $data['error_exists'] = false;*/
        $data = $this->signup_setup();
        $this->render(array('templates/promotion', 'html/signup_form'), $data); 
    }

    public function signup_try()
    {
        //$data['title'] = 'Sign up for Twitter';

        $data = $this->signup_setup();
        // see config/form_validations for rules
        if ($this->form_validation->run('signup') === false) {
            /*$data['title'] = 'Sign up for Twitter';
            $data['username'] = null;
            $data['link'] = 'Log in now!';
            $data['link_address'] = 'forms/load_login_form';  */          

            $data['error_exists'] = true;
            $data['error_description'] = $this->error_description_for_signup();

            $this->render(array('templates/promotion', 'html/signup_form'), $data);    
        } else {
            $username = $this->input->post('username');
            $data['username'] = $username;
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $this->user_model->register($data);

            $this->_login($username);
        }
    }

    public function error_description_for_signup()
    {
        // get the most relevant error
        if (form_error('email')) $error = 'That does not look like a valid email address.';
        if (form_error('passconf') || form_error('password')) $error = 'Oops, Password does not match.'; 
        if (form_error('username')) $error = 'That username is too short/long or has already taken.';

        return $error;
    }

    private function _login($username)
    {
        $user_data = array(
                     'username' => $username,
                     'logged_in' => true
                     );
        
        $this->session->set_userdata($user_data);
        redirect('users/home');
    }
}
?>