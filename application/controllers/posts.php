<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller {

    /**
     * __construct method     
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('PostModel');
        $this->load->model('UserModel');
    }

    /**
     * index method     
     * @return void
     */
    public function index() {

        $data['posts'] = $this->PostModel->listing();
        $data['main'] = '/posts/index';
        $this->load->view('layouts/default', $data);
    }

    /**
     * add method     
     * @return void
     */
    public function add() {
        //fetch data from user table as dropdown
        $data['user'] = $this->UserModel->dropdown_list();
        //set form validation
        $this->form_validation->set_rules(array(
            array('field' => 'user_id', 'label' => 'Author', 'rules' => 'required'),
            array('field' => 'title', 'label' => 'Post Title', 'rules' => 'required'),
            array('field' => 'body', 'label' => 'Post Body', 'rules' => 'required')
        ));
        //if validation not run, just show form
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = '/posts/add';
            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'user_id' => $this->input->post('user_id'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
            );
            $this->PostModel->create($data); //load model
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'The post has been saved', 'class' => 'success')); //danger or success            
            redirect('posts/index'); // back to the index
        }
    }

    /**
     * edit method     
     * @param string post_id
     */
    public function edit($post_id = null) {

        //Cheching data is not empty
        if (!empty($post_id) && !$this->PostModel->exists($post_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('posts/index'); // back to the index
        }

        //fetch post record for the given employee no
        $data['post'] = $this->PostModel->read($post_id);
        //fetch data from user table as dropdown
        $data['user'] = $this->UserModel->dropdown_list();
        //set form validation
        $this->form_validation->set_rules(array(
            array('field' => 'user_id', 'label' => 'Author', 'rules' => 'required'),
            array('field' => 'title', 'label' => 'Post Title', 'rules' => 'required'),
            array('field' => 'body', 'label' => 'Post Body', 'rules' => 'required')
        ));
        //if validation not run, just show form
        if ($this->form_validation->run() == FALSE) {
            $data['main'] = '/posts/edit';
            $this->load->view('layouts/default', $data);
        } else {
            $data = array(
                'post_id' => $this->input->post('post_id'),
                'user_id' => $this->input->post('user_id'),
                'title' => $this->input->post('title'),
                'body' => $this->input->post('body')
            );
            $this->PostModel->modified($data); //load model
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'The post has been saved', 'class' => 'success')); //danger or success            
            redirect('posts/index'); // back to the index
        }
    }

    /**
     * view method     
     * @param string post_id
     */
    public function view($post_id) {
        //Cheching data is not empty
        if (!$this->PostModel->exists($post_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('posts/index'); // back to the index
        }

        $data['post'] = $this->PostModel->read($post_id);
        $data['main'] = '/posts/view';
        $this->load->view('layouts/default', $data);
    }

    /**
     * delete method     
     * @param string post_id
     */
    public function delete($post_id) {
        //Cheching data is not empty
        if (!$this->PostModel->exists($post_id)) {
            $this->session->set_flashdata('item', array('message' => 'Invalid or Data not found!', 'class' => 'danger')); //danger or success            
            redirect('posts/index'); // back to the index
        }

        if ($this->PostModel->delete($post_id)) {
            //set flash message
            $this->session->set_flashdata('item', array('message' => 'Post deleted', 'class' => 'success')); //danger or success            
            redirect('posts/index'); // back to the index
        }
        #$this->session->set_flashdata('item', array('message' => 'Post was not deleted', 'class' => 'danger')); //danger or success            
        #redirect('posts/index'); // back to the index    
    }

}
