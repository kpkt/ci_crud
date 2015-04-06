<?php

class UserModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * exists user
     * @return void
     * @desc This function use for checking whether data exists or not
     */
    public function exists($user_id) {
        $this->db->where('user_id', $user_id);
        $Q = $this->db->get('users');
        if ($Q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * senarai user
     * @return void
     * @desc This function use for checking whether data exists or not
     */
    function listing() {
        $Q = $this->db->get('users');
        if ($Q->num_rows() > 0) {
            return $Q->result_array();
        }
    }

    /**
     * insert new data
     * @return void
     */
    public function create($data) {
        $this->db->set('created', date("Y-m-d H:i:s")); //set datetime for created
        $this->db->set('modified', date("Y-m-d H:i:s")); //set datetime for modified
        $this->db->insert('users', $data);
    }

    /**
     * read exist data     
     * @param int user_id 
     * @return void
     */
    public function read($user_id) {
        $this->db->where('user_id', $user_id);
        $Q = $this->db->get('users');
        if ($Q->num_rows() > 0) {
            return $Q->row_array();
        }
    }

    /**
     * modified exist data     
     * @param int user_id 
     * @return void
     */
    public function modified($data) {
        $this->db->where('user_id', $data['user_id']);
        $this->db->set('modified', date("Y-m-d H:i:s"));  //set datetime for modified
        $this->db->update('users', $data);
    }

    /**
     * delete  exist data      
     * @param int user_id
     */
    public function delete($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('users');
        return TRUE;
    }

}
