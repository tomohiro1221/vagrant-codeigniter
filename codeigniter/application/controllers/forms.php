<?

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

        $this->load->view('templates/header', $data);
        $this->load->view('html/login_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function login_try()
    {
        $data['title'] = 'Log in Twitter';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('html/login_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->view('html/formsuccess', $data);
        }
    }

    public function login_validate()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

            
    }

    public function load_signup_form()
    {
        $data['title'] = 'Sign up for Twitter';

        $this->load->view('templates/header', $data);
        $this->load->view('html/signup_form', $data);
        $this->load->view('templates/footer', $data);       
    }

    public function signup_try()
    {
        $data['title'] = 'Sign up for Twitter';

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password確認', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('html/signup_form', $data);
            $this->load->view('templates/footer', $data);           
        } else {
            $this->user_model->register();
            $this->load->view('html/formsuccess');
        }
    }

}