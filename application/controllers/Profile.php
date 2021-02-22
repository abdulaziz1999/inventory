<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model');
        $this->load->library('session');

        if($this->session->userdata('true') != 'oke'){
            redirect(base_url());
        }
    }

    public function index()
    {
       

        $this->template->load('template','profile');
    }

}