<?php

class PostModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * exists post
     * @return void
     * @desc This function use for checking whether data exists or not
     */
    public function exists($post_id) {
        $this->db->where('post_id', $post_id);
        $Q = $this->db->get('posts');
        if ($Q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
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

    /**
     * insert new data
     * @return void
     */
    public function create($data) {
        $this->db->set('created', date("Y-m-d H:i:s")); //set datetime for created
        $this->db->set('modified', date("Y-m-d H:i:s")); //set datetime for modified
        $this->db->insert('posts', $data);
    }

    /**
     * read exist data     
     * @param int post_id 
     * @return void
     */
    public function read($post_id) {
         $this->db->join('users', 'posts.user_id = users.user_id');
        $this->db->where('post_id', $post_id);
        
        $Q = $this->db->get('posts');
        if ($Q->num_rows() > 0) {
            return $Q->row_array();
        }
    }

    /**
     * modified exist data     
     * @param int post_id 
     * @return void
     */
    public function modified($data) {
        $this->db->where('post_id', $data['post_id']);
        $this->db->set('modified', date("Y-m-d H:i:s"));  //set datetime for modified
        $this->db->update('posts', $data);
    }

    /**
     * delete  exist data      
     * @param int post_id
     */
    public function delete($post_id) {
        $this->db->where('post_id', $post_id);
        $this->db->delete('posts');
        return TRUE;
    }

}
