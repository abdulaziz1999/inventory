<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cetak_barcode extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_barang_model');
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
        $data['barang'] = $this->db->get('tb_barang')->result_array();
        $data['code_barcodenya'] = $this->input->post('code');
        $this->template->load('template','cetak/cetak_barcode',$data);
    }

    public function allbarcode()
    {
        $data['barang'] = $this->db->get('tb_barang')->result();
        $this->template->load('template','cetak/cetak_all_barcode',$data);
    }
    

}