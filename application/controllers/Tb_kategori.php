<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_kategori extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_kategori_model');
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
        $tb_kategori = $this->Tb_kategori_model->get_all();

        $data = array(
            'tb_kategori_data' => $tb_kategori
        );

        $this->template->load('template','kategori/tb_kategori_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_kategori_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_kategori' => $row->id_kategori,
		'nama_kategori' => $row->nama_kategori,
	    );
            $this->template->load('template','kategori/tb_kategori_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kategori'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_kategori/create_action'),
            'id_kategori' => set_value('id_kategori'),
            'nama_kategori' => set_value('nama_kategori'),
	);
        $this->template->load('template','kategori/tb_kategori_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Tb_kategori_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->My_model->dataLog('Tambah data kategori');
            redirect(site_url('tb_kategori'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_kategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_kategori/update_action'),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
	    );
            $this->template->load('template','kategori/tb_kategori_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kategori'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kategori', TRUE));
        } else {
            $data = array(
		        'nama_kategori' => $this->input->post('nama_kategori',TRUE),
	    );

            $this->Tb_kategori_model->update($this->input->post('id_kategori', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->My_model->dataLog('Update data kategori : '.$this->input->post('nama_kategori',TRUE));
            redirect(site_url('tb_kategori'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_kategori_model->get_by_id($id);

        if ($row) {
            $this->Tb_kategori_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $this->My_model->dataLog('Delete data kategori');
            redirect(site_url('tb_kategori'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_kategori'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'nama kategori', 'trim|required');
	$this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_kategori.xls";
        $judul = "tb_kategori";
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
	    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");

	    foreach ($this->Tb_kategori_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);

	        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_kategori.doc");

        $data = array(
            'tb_kategori_data' => $this->Tb_kategori_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_kategori_doc',$data);
    }

}

/* End of file Tb_kategori.php */
/* Location: ./application/controllers/Tb_kategori.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */