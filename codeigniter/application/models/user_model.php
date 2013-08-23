<?
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function register()
    {
        $current_time = date("Y-m-d H:i:s");

        $data = array(
                'name' => $this->input->post('username'),
                'email' => $this->input->post('eamil'),
                'password' => $this->input->post('password'),
                'created_at' => $current_time,
                'updated_at' => $current_time
                );

        return $this->db->insert('User', $data);
    }
}