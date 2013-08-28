<?php

class Tweet_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->model('user_model');
    }

    public function get_tweets($username, $limit, $offset)
    {
        // return n tweets
        $user_id = $this->user_model->get_id_from_username($username);

        $this->db->from('Tweet');
        $this->db->where('user_id', $user_id);
        
        $this->db->order_by("created_at", "asc");
        $this->db->limit($limit, $offset);
        
        $query = $this->db->get();

        $data = array();
        foreach ($query->result() as $row) {
            array_push($data, array('username' => $username, 'content' => $row->content, 'posted_time' => $row->created_at));
        }

        $this->output_json($data);
    }


    public function process_new_tweet($username, $content)
    {
        $current_time = date("Y-m-d H:i:s");

        $this->post_tweet($username, $content, $current_time);
        $this->output_json(array('username' => $username,
                                            'content' => $content,
                                            'posted_time' => $posted_time));
    }

    public function post_tweet($username, $content, $current_time)
    {
        $data = array(
                'user_id' => $this->user_model->get_id_from_username($username),
                'content' => $content,
                'created_at' => $current_time
                );

        $this->db->insert('Tweet', $data);
    }

    public function output_json($data)
    {
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($data));

        $this->output->get_output();
    }
}
?>