<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index($page = "welcome_message") {
        $data['title'] = ucfirst($page); // Capitalize the first letter            
        $this->load->view('layouts/default', $data);
    }

}
