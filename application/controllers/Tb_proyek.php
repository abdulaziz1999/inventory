<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_proyek extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_proyek_model');
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
        $tb_proyek = $this->Tb_proyek_model->get_all();

        $data = array(
            'tb_proyek_data' => $tb_proyek
        );

        $this->template->load('template','proyek/tb_proyek_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_proyek_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_proyek' => $row->id_proyek,
		'nama_proyek' => $row->nama_proyek,
	    );
            $this->template->load('template','proyek/tb_proyek_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_proyek'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_proyek/create_action'),
            'id_proyek' => set_value('id_proyek'),
            'nama_proyek' => set_value('nama_proyek'),
	);
        $this->template->load('template','proyek/tb_proyek_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_proyek' => $this->input->post('nama_proyek',TRUE),
	    );

            $this->Tb_proyek_model->insert($data);
            $this->My_model->dataLog('Tambah data nama proyek');
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_proyek'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_proyek_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_proyek/update_action'),
                'id_proyek' => set_value('id_proyek', $row->id_proyek),
                'nama_proyek' => set_value('nama_proyek', $row->nama_proyek),
	    );
            $this->template->load('template','proyek/tb_proyek_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_proyek'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_proyek', TRUE));
        } else {
            $data = array(
		        'nama_proyek' => $this->input->post('nama_proyek',TRUE),
	    );

            $this->Tb_proyek_model->update($this->input->post('id_proyek', TRUE), $data);
            $this->My_model->dataLog('Update data nama proyek');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_proyek'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_proyek_model->get_by_id($id);

        if ($row) {
            $this->Tb_proyek_model->delete($id);
            $this->My_model->dataLog('Delete data Supplier sukses');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_proyek'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_proyek'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_proyek', 'nama proyek', 'trim|required');
	$this->form_validation->set_rules('id_proyek', 'id_proyek', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_proyek.xls";
        $judul = "tb_proyek";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama proyek");

	foreach ($this->Tb_proyek_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_proyek);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_proyek.doc");

        $data = array(
            'tb_proyek_data' => $this->Tb_proyek_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_proyek_doc',$data);
    }

}

/* End of file Tb_proyek.php */
/* Location: ./application/controllers/Tb_proyek.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */