<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_suplier extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_suplier_model');
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
        $tb_suplier = $this->Tb_suplier_model->get_all();

        $data = array(
            'tb_suplier_data' => $tb_suplier
        );

        $this->template->load('template','suplier/tb_suplier_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_suplier_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_suplier' => $row->id_suplier,
		'nama_suplier' => $row->nama_suplier,
	    );
            $this->template->load('template','suplier/tb_suplier_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_suplier'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_suplier/create_action'),
	    'id_suplier' => set_value('id_suplier'),
	    'nama_suplier' => set_value('nama_suplier'),
	);
        $this->template->load('template','suplier/tb_suplier_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_suplier' => $this->input->post('nama_suplier',TRUE),
	    );

            $this->Tb_suplier_model->insert($data);
            $this->My_model->dataLog('Tambah data Supplier');
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_suplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_suplier_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_suplier/update_action'),
                'id_suplier' => set_value('id_suplier', $row->id_suplier),
                'nama_suplier' => set_value('nama_suplier', $row->nama_suplier),
	    );
            $this->template->load('template','suplier/tb_suplier_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_suplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_suplier', TRUE));
        } else {
            $data = array(
		        'nama_suplier' => $this->input->post('nama_suplier',TRUE),
	    );

            $this->Tb_suplier_model->update($this->input->post('id_suplier', TRUE), $data);
            $this->My_model->dataLog('Update data Supplier');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_suplier'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_suplier_model->get_by_id($id);

        if ($row) {
            $this->Tb_suplier_model->delete($id);
            $this->My_model->dataLog('Delete data Supplier Sukses');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_suplier'));
        } else {
            $this->My_model->dataLog('Delete data Supplier Gagal');
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_suplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_suplier', 'nama suplier', 'trim|required');
	$this->form_validation->set_rules('id_suplier', 'id_suplier', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_suplier.xls";
        $judul = "tb_suplier";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama suplier");

	foreach ($this->Tb_suplier_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_suplier);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_suplier.doc");

        $data = array(
            'tb_suplier_data' => $this->Tb_suplier_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_suplier_doc',$data);
    }

}

/* End of file Tb_suplier.php */
/* Location: ./application/controllers/Tb_suplier.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */