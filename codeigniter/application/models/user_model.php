<?php
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register($data)
    {
        $current_time = date("Y-m-d H:i:s");

        $data = array(
                'name' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'created_at' => $current_time,
                'updated_at' => $current_time
                );

        return $this->db->insert('User', $data);
    }

    public function get_user_information($info, $name)
    {
        $this->db->select($info);
        $this->db->from('User');
        $this->db->where('name', $name);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->$info;
        } else {
            return null;
        }
    }

    public function get_id_from_username($name)
    {
        return $this->get_user_information('id', $name);
    }

    public function get_password_from_username($name)
    {
        return $this->get_user_information('password', $name);
    }
}