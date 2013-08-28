<?php

class Users extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session', 'javascript'));
		$this->load->model(array('user_model', 'tweet_model'));
	}

	public function home()
	{
		if ($this->session->userdata('logged_in')) {
			$username = $this->session->userdata('username');

			$data['title'] = 'twitter home - '.$username;
			$data['username'] = $username;
			$data['link'] = 'Log out';
			$data['link_address'] = 'users/logout';

			$this->render(array('html/user_home'), $data);
		} else { // if the user haven't logged in
			redirect('forms/load_login_form');
		}
	}

	public function logout()
	{
		$this->session->set_userdata('logged_in', false);
		redirect('forms/load_login_form');
	}

	public function tweet()
	{
		$this->tweet_model->process_new_tweet($this->session->userdata('username'), $this->input->post('content'));
	}

	public function load_latest_tweets()
	{
		$this->tweet_model->get_tweets($this->session->userdata('username'), 10, 0);
	}

	public function load_older_tweets()
	{
		$this->tweet_model->get_tweets($this->session->userdata('username'), 10, $this->input->post('tweets'));
		//$this->tweet_model->get_tweets();
	}


}
?>