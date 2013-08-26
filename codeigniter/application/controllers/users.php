<?php

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}

	public function load_user_homepage()
	{

		$this->load->view('templates/header', $data);
		$this->load->view('html/user_home');
		$this->load->view('templates/footer');
	}

	public function tweet()
	{
		$this->user_model->post_tweet();
	}
}