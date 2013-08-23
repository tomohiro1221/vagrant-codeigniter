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
        $data['error_exists'] = FALSE;

        $this->load->view('templates/header', $data);
        $this->load->view('html/promotion');
        $this->load->view('html/login_form', $data);
        $this->load->view('templates/footer');
    }

    public function login_try()
    {
        $data['title'] = 'Log in Twitter';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() === FALSE || $this->login_validate() === FALSE) {
            $data['error_exists'] = TRUE;
            $data['error_description'] = "Username or password is incoreect.";
            $this->load->view('templates/header', $data);
            $this->load->view('html/promotion');
            $this->load->view('html/login_form', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('html/formsuccess');
        }
    }

    public function login_validate()
    {
        // return TRUE if log in is successful
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->db->select('name, password');
        $this->db->from('User');
        $this->db->where('name', $username);

        $query = $this->db->query("SELECT `password` FROM `User` WHERE name = '".$username."';");
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $password == $row->password;
        } else {
            return FALSE;
        }
    }

    public function load_signup_form()
    {
        $data['title'] = 'Sign up for Twitter';
        $data['error_exists'] = FALSE;

        $this->load->view('templates/header', $data);
        $this->load->view('html/promotion');
        $this->load->view('html/signup_form', $data);
        $this->load->view('templates/footer');       
    }

    public function signup_try()
    {
        $data['title'] = 'Sign up for Twitter';

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[User.name]');
        $this->form_validation->set_rules('password', 'Password', 'required|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'Password確認', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[User.email]');

        if ($this->form_validation->run() === FALSE) {
            $data['error_exists'] = TRUE;

            $this->load->view('templates/header', $data);
            $this->load->view('html/promotion');
            $this->load->view('html/signup_form', $data);
            $this->load->view('templates/footer');           
        } else {
            $this->user_model->register();
            $this->load->view('html/formsuccess');
        }
    }
}
?>