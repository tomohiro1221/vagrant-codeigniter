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
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'created_at' => $current_time,
                'updated_at' => $current_time
                );

        return $this->db->insert('User', $data);
    }

    public function get_id_from_username($name)
    {
        $this->db->select('id');
        $this->db->from('User');
        $this->db->where('name', $name);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->id;
        } else {
            return NULL;
        }
    }

    public function get_password_from_username($name)
    {
        $this->db->select('password');
        $this->db->from('User');
        $this->db->where('name', $name);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->password;
        } else {
            return NULL;
        }
    }

    public function post_tweet()
    {
        $current_time = date("Y-m-d H:i:s");
        $username = $this->input->post('username');

        $data = array(
                'user_id' => $this->get_id_from_username($username),
                'content' => $this->input->post('content'),
                'created_at' => $current_time
                );

        return $this->db->insert('Tweet', $data);
    }

    public function load_more_old_tweets()
    {

    }

    public function load_new_tweets()
    {

    }
}
?>