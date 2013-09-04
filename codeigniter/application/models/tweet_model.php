<?php

class Tweet_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->model('user_model');
    }

    public function get_tweets_data($user_id, $username, $limit, $offset)
    {
        // return n tweets

        $this->db->from('Tweet');
        $this->db->where('user_id', $user_id);
        
        $this->db->order_by("created_at", "desc");
        $this->db->limit($limit, $offset);
        
        $query = $this->db->get();

        $data = array();
        foreach ($query->result() as $row) {
            array_push($data, array('username' => $username, 'content' => $row->content, 'posted_time' => $row->created_at));
        }

        return $data;
    }
}