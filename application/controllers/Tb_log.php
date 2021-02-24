<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_log extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_log_model');
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
        $tb_log = $this->Tb_log_model->get_all();

        $data = array(
            'tb_log_data' => $tb_log
        );

        $this->template->load('template','log/tb_log_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_log' => $row->id_log,
		'nama_log' => $row->nama_log,
	    );
            $this->template->load('template','log/tb_log_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_log/create_action'),
	    'id_log' => set_value('id_log'),
	    'nama_log' => set_value('nama_log'),
	);
        $this->template->load('template','log/tb_log_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_log' => $this->input->post('nama_log',TRUE),
	    );

            $this->Tb_log_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_log'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_log/update_action'),
                'id_log' => set_value('id_log', $row->id_log),
                'nama_log' => set_value('nama_log', $row->nama_log),
	    );
            $this->template->load('template','log/tb_log_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_log', TRUE));
        } else {
            $data = array(
		        'nama_log' => $this->input->post('nama_log',TRUE),
	    );

            $this->Tb_log_model->update($this->input->post('id_log', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_log'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_log_model->get_by_id($id);

        if ($row) {
            $this->Tb_log_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_log'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_log'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_log', 'nama log', 'trim|required');
	$this->form_validation->set_rules('id_log', 'id_log', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_log.xls";
        $judul = "tb_log";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama log");

	foreach ($this->Tb_log_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_log);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_log.doc");

        $data = array(
            'tb_log_data' => $this->Tb_log_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_log_doc',$data);
    }

}

/* End of file Tb_log.php */
/* Location: ./application/controllers/Tb_log.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */