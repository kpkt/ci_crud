<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Posts extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Post_model');
    }

    public function index() {
        $data['posts'] = $this->Post_model->listing();
        $data['main'] = '/posts/index';
        $this->load->view('layouts/default', $data);
    }

}
