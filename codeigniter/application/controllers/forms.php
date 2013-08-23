<?

class Forms extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function load_login_form()
	{
		$data['title'] = 'Log in Twitter';

		$this->load->view('templates/header', $data);
		$this->load->view('html/login_form', $data);
		$this->load->view('templates/footer', $data);
	}

	public function login_validate()
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

	public function load_signup_form()
	{

	}

	public function signup_validate()
	{

	}
}