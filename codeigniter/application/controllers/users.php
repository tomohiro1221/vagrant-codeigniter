<?php

class Users extends MY_Controller
{
	protected $TWEETS_PER_LOAD = 10;

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session', 'javascript'));
		$this->load->model(array('user_model', 'tweet_model'));
	}

	public function home()
	{
		if ($this->session->userdata('user_id')) {
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
		$this->session->sess_destroy();
		redirect('forms/load_login_form');
	}

	public function tweet()
	{
		$this->process_new_tweet($this->session->userdata('user_id'),
								 $this->session->userdata('username'),
								 $this->input->post('content'));
	}

	public function load_latest_tweets()
	{
		$this->output_json($this->tweet_model->get_tweets_data($this->session->userdata('user_id'), 
													           $this->session->userdata('username'),
													           $this->TWEETS_PER_LOAD,
													           0));
	}

	public function load_older_tweets()
	{
		$this->output_json($this->tweet_model->get_tweets_data($this->session->userdata('user_id'),
															   $this->session->userdata('username'),
															   $this->TWEETS_PER_LOAD,
															   $this->input->get('tweets')));
		//$this->input->post('tweets')
		echo($this->input->post('tweets'));
	}

	public function process_new_tweet($user_id, $username, $content)
    {
        $current_time = date("Y-m-d H:i:s");

        $this->post_tweet($user_id, $content, $current_time);
        $this->output_json(array('username' => $username,
                                               'content' => $content,
                                               'posted_time' => $current_time));
    }

    public function post_tweet($user_id, $content, $current_time)
    {
    	if ($content) {
	        $data = array(
	                'user_id' => $user_id,
	                'content' => $content,
	                'created_at' => $current_time
	                );

	        $this->db->insert('Tweet', $data);
    	}
    }

    public function output_json($data)
    {
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));

        $this->output->get_output();
    }
}