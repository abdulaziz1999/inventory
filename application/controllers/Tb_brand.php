<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_brand extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_brand_model');
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
        $tb_brand = $this->Tb_brand_model->get_all();

        $data = array(
            'tb_brand_data' => $tb_brand
        );

        $this->template->load('template','brand/tb_brand_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_brand_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_brand' => $row->id_brand,
		'nama_brand' => $row->nama_brand,
	    );
            $this->template->load('template','brand/tb_brand_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_brand'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_brand/create_action'),
	        'id_brand' => set_value('id_brand'),
	        'nama_brand' => set_value('nama_brand'),
	);
        $this->template->load('template','brand/tb_brand_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		        'nama_brand' => $this->input->post('nama_brand',TRUE),
	    );

            $this->Tb_brand_model->insert($data);
            $this->session->set_flashdata('sukses', 'Create Record Success');
            $this->My_model->dataLog('Tambah data brand');
            redirect(site_url('tb_brand'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_brand_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_brand/update_action'),
                'id_brand' => set_value('id_brand', $row->id_brand),
                'nama_brand' => set_value('nama_brand', $row->nama_brand),
	    );
            $this->template->load('template','brand/tb_brand_form', $data);
        } else {
            $this->session->set_flashdata('gagal', 'Record Not Found');
            redirect(site_url('tb_brand'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_brand', TRUE));
        } else {
            $data = array(
		'nama_brand' => $this->input->post('nama_brand',TRUE),
	    );

            $this->Tb_brand_model->update($this->input->post('id_brand', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            $this->My_model->dataLog('Update data brand');
            redirect(site_url('tb_brand'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_brand_model->get_by_id($id);

        if ($row) {
            $this->Tb_brand_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $this->My_model->dataLog('Sukses Delete data brand');
            redirect(site_url('tb_brand'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            $this->My_model->dataLog('Gagal Delete data brand');
            redirect(site_url('tb_brand'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_brand', 'nama brand', 'trim|required');

	$this->form_validation->set_rules('id_brand', 'id_brand', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_brand.xls";
        $judul = "tb_brand";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Brand");

	foreach ($this->Tb_brand_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_brand);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_brand.doc");

        $data = array(
            'tb_brand_data' => $this->Tb_brand_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_brand_doc',$data);
    }

}

/* End of file Tb_brand.php */
/* Location: ./application/controllers/Tb_brand.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:14:26 */
/* http://harviacode.com */