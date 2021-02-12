<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_pemesan extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_pemesan_model');
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
        $tb_pemesan = $this->Tb_pemesan_model->get_all();

        $data = array(
            'tb_pemesan_data' => $tb_pemesan
        );

        $this->template->load('template','pemesan/tb_pemesan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_pemesan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemesan' => $row->id_pemesan,
		'nama_pemesan' => $row->nama_pemesan,
	    );
            $this->template->load('template','pemesan/tb_pemesan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_pemesan/create_action'),
	    'id_pemesan' => set_value('id_pemesan'),
	    'nama_pemesan' => set_value('nama_pemesan'),
	);
        $this->template->load('template','pemesan/tb_pemesan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
	    );

            $this->Tb_pemesan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_pemesan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_pemesan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_pemesan/update_action'),
                'id_pemesan' => set_value('id_pemesan', $row->id_pemesan),
                'nama_pemesan' => set_value('nama_pemesan', $row->nama_pemesan),
	    );
            $this->template->load('template','pemesan/tb_pemesan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemesan', TRUE));
        } else {
            $data = array(
		        'nama_pemesan' => $this->input->post('nama_pemesan',TRUE),
	    );

            $this->Tb_pemesan_model->update($this->input->post('id_pemesan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_pemesan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_pemesan_model->get_by_id($id);

        if ($row) {
            $this->Tb_pemesan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_pemesan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_pemesan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pemesan', 'nama pemesan', 'trim|required');
	$this->form_validation->set_rules('id_pemesan', 'id_pemesan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_pemesan.xls";
        $judul = "tb_pemesan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama pemesan");

	foreach ($this->Tb_pemesan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pemesan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_pemesan.doc");

        $data = array(
            'tb_pemesan_data' => $this->Tb_pemesan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_pemesan_doc',$data);
    }

}

/* End of file Tb_pemesan.php */
/* Location: ./application/controllers/Tb_pemesan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */