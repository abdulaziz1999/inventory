<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_unit extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_unit_model');
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
        $tb_unit = $this->Tb_unit_model->get_all();

        $data = array(
            'tb_unit_data' => $tb_unit
        );

        $this->template->load('template','unit/tb_unit_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_unit_model->get_by_id($id);
        if ($row) {
            $data = array(
            'id_unit' => $row->id_unit,
            'nama_unit' => $row->nama_unit,
	    );
            $this->template->load('template','unit/tb_unit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_unit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_unit/create_action'),
	    'id_unit' => set_value('id_unit'),
	    'nama_unit' => set_value('nama_unit'),
	);
        $this->template->load('template','unit/tb_unit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_unit' => $this->input->post('nama_unit',TRUE),
	    );

            $this->Tb_unit_model->insert($data);
            $this->My_model->dataLog('Tambah data unit');
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_unit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_unit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_unit/update_action'),
                'id_unit' => set_value('id_unit', $row->id_unit),
                'nama_unit' => set_value('nama_unit', $row->nama_unit),
	    );
            $this->template->load('template','unit/tb_unit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_unit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_unit', TRUE));
        } else {
            $data = array(
		        'nama_unit' => $this->input->post('nama_unit',TRUE),
	    );

            $this->Tb_unit_model->update($this->input->post('id_unit', TRUE), $data);
            $this->My_model->dataLog('Update data unit');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_unit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_unit_model->get_by_id($id);

        if ($row) {
            $this->Tb_unit_model->delete($id);
            $this->My_model->dataLog('Delete data unit Sukses');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_unit'));
        } else {
            $this->My_model->dataLog('Delete data unit gagal');
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_unit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_unit', 'nama unit', 'trim|required');
	$this->form_validation->set_rules('id_unit', 'id_unit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_unit.xls";
        $judul = "tb_unit";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama unit");

	foreach ($this->Tb_unit_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_unit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_unit.doc");

        $data = array(
            'tb_unit_data' => $this->Tb_unit_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_unit_doc',$data);
    }

}

/* End of file Tb_unit.php */
/* Location: ./application/controllers/Tb_unit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */