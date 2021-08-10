<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_cutoff extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_cutoff_model');
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
        $tb_cutoff = $this->Tb_cutoff_model->get_all();

        $data = array(
            'tb_cutoff_data' => $tb_cutoff
        );

        $this->template->load('template','cutoff/tb_cutoff_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_cutoff_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_cutoff' => $row->id_cutoff,
                'start'     => $row->start,
                'end'       => $row->end,
                'status'    => $row->status,
	    );
            $this->template->load('template','cutoff/tb_cutoff_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_cutoff'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_cutoff/create_action'),
            'id_cutoff' => set_value('id_cutoff'),
            'start' => set_value('start'),
            'end' => set_value('end'),
            'status' => set_value('status'),
	);
        $this->template->load('template','cutoff/tb_cutoff_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'start' => $this->input->post('start',TRUE),
                'end'   => $this->input->post('end',TRUE),
                'status'=> $this->input->post('status',TRUE),
	    );

            $this->Tb_cutoff_model->insert($data);
            $this->My_model->dataLog('Tambah data cutoff');
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_cutoff'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_cutoff_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_cutoff/update_action'),
                'id_cutoff' => set_value('id_cutoff', $row->id_cutoff),
                'start' => set_value('start', $row->start),
                'end' => set_value('end', $row->end),
                'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','cutoff/tb_cutoff_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_cutoff'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_cutoff', TRUE));
        } else {
            $data = array(
                'start' => $this->input->post('start',TRUE),
                'end'   => $this->input->post('end',TRUE),
                'status'=> $this->input->post('status',TRUE),
	    );

            $this->Tb_cutoff_model->update($this->input->post('id_cutoff', TRUE), $data);
            $this->My_model->dataLog('Update data cutoff');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_cutoff'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_cutoff_model->get_by_id($id);

        if ($row) {
            $this->Tb_cutoff_model->delete($id);
            $this->My_model->dataLog('Delete data cutoff sukses');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_cutoff'));
        } else {
            $this->My_model->dataLog('Delete data cutoff gagal');
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_cutoff'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('start', 'start', 'trim|required');
        $this->form_validation->set_rules('end', 'end', 'trim|required');
        $this->form_validation->set_rules('id_cutoff', 'id_cutoff', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_cutoff.xls";
        $judul = "tb_cutoff";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama cutoff");
        xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tb_cutoff_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_cutoff);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ket);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_cutoff.doc");

        $data = array(
            'tb_cutoff_data' => $this->Tb_cutoff_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_cutoff_doc',$data);
    }

}

/* End of file Tb_cutoff.php */
/* Location: ./application/controllers/Tb_cutoff.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:15:06 */
/* http://harviacode.com */