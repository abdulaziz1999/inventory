<?php
class Login extends CI_Controller{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model');
        $this->load->library('session');
        
    }

    function index(){
        $this->load->view('login');
    }

    function cek_login(){
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->My_model->cek_login($u,$p);
        if ($cek){
            foreach ($cek as $row) {
                $this->session->set_userdata('id_pengguna',$row->id_pengguna);
                $this->session->set_userdata('username',$row->username);
                $this->session->set_userdata('level',$row->level);
                $this->session->set_userdata('nama',$row->nama);
                $this->session->set_userdata('true','oke');
            }
            if ($this->session->userdata('true') == TRUE) {
                $this->My_model->dataLog('Login Apps');
                redirect('admin');
            }elseif($this->session->userdata('true') == TRUE && $this->session->userdata('level') == 'superuser'){
                $this->My_model->dataLog('Login Apps');
                redirect('admin');
            }elseif($this->session->userdata('true') == TRUE && $this->session->userdata('level') == 'staff'){
                $this->My_model->dataLog('Login Apps');
                redirect('admin');
            }
        } else{ 
            //untuk menendcode kata
            $this->My_model->dataLog('Gagal Login Apps');
            redirect('login?e='.base64_encode('Username dan Password tidak sesuai'));
        } 
    }

    function logout(){
        $this->session->sess_destroy();
        $this->My_model->dataLog('Logout Apps');
        redirect('login');
    }

}