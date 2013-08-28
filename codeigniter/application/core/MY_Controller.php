<?php
class MY_Controller extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

    public function render($files_to_view, $data)
    {
        // adds header at the top and footer at the bottom
        $this->load->view('templates/header', $data);
        foreach ($files_to_view as $file) {
            $this->load->view($file, $data);
        }
        $this->load->view('templates/footer');
    }
}