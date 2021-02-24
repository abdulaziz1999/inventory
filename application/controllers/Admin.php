<?php
class Admin extends CI_Controller{

	function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model');
        $this->load->model('Admin_model','admin');
        $this->load->library('session');
        
        if($this->session->userdata('true') != 'oke'){
            redirect(base_url());
        }
    }

	function index(){

        // $this->output->enable_profiler(true);
        $data = [
            'barang_max' => $this->admin->barang_max(),
            'barang_min' => $this->admin->barang_min(),
            'chart_iss'  => $this->My_model->chart_iss(),
            'chart_rev'  => $this->My_model->chart_rev(),
        ];

		$this->template->load('template','v_admin',$data);
        // $this->output->enable_profiler(TRUE);
        
    }
    
    function grap(){
                $this->db->select('count(id_brand) as jml,stok,nama_brand');
                $this->db->from('tb_barang');
                $this->db->join('tb_stok s','s.id_barang = tb_barang.id_barang');
                $this->db->group_by('brand');   
        $data1 = $this->db->get()->result();
        

        $this->db->select('count(id_brand) as jml,stok,nama_brand,nama_kategori');
        $this->db->from('tb_barang');
        $this->db->join('tb_brand b','b.id_brand = tb_barang.brand');
        $this->db->join('tb_kategori k','k.id_kategori = tb_barang.kategori');
        $this->db->join('tb_stok s','s.id_barang = tb_barang.id_barang');
        $this->db->group_by('brand');   
        $data = $this->db->get()->result();
                print_r($data);
    }

    
}
?>