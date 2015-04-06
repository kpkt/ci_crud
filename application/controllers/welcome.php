<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {

        $data['title'] = ucfirst("welcome_message"); // Capitalize the first letter    
        $data['main'] = 'welcome_message';
        $this->load->view('layouts/default', $data);
    }

}
