<?php

class Post_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * senarai post
     * @return array of post
     */
    public function listing() {
        $this->db->join('users', 'users.user_id = posts.user_id');
        $query = $this->db->get('posts');
       
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

}
