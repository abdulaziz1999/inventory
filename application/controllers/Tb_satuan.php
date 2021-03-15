<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_satuan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_satuan_model');
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
        $tb_satuan = $this->Tb_satuan_model->get_all();

        $data = array(
            'tb_satuan_data' => $tb_satuan
        );

        $this->template->load('template','satuan/tb_satuan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_satuan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_satuan' => $row->id_satuan,
                'nama_satuan' => $row->nama_satuan,
                'ket' => $row->ket,
	    );
            $this->template->load('template','satuan/tb_satuan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_satuan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_satuan/create_action'),
            'id_satuan' => set_value('id_satuan'),
            'nama_satuan' => set_value('nama_satuan'),
            'ket' => set_value('ket'),
	);
        $this->template->load('template','satuan/tb_satuan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_satuan' => $this->input->post('nama_satuan',TRUE),
                'ket' => $this->input->post('ket',TRUE),
	    );

            $this->Tb_satuan_model->insert($data);
            $this->My_model->dataLog('Tambah data satuan');
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_satuan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_satuan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_satuan/update_action'),
                'id_satuan' => set_value('id_satuan', $row->id_satuan),
                'nama_satuan' => set_value('nama_satuan', $row->nama_satuan),
                'ket' => set_value('ket', $row->ket),
	    );
            $this->template->load('template','satuan/tb_satuan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_satuan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_satuan', TRUE));
        } else {
            $data = array(
                'nama_satuan'   => $this->input->post('nama_satuan',TRUE),
                'ket'           => $this->input->post('ket',TRUE),
	    );

            $this->Tb_satuan_model->update($this->input->post('id_satuan', TRUE), $data);
            $this->My_model->dataLog('Update data satuan');
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_satuan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_satuan_model->get_by_id($id);

        if ($row) {
            $this->Tb_satuan_model->delete($id);
            $this->My_model->dataLog('Delete data satuan sukses');
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_satuan'));
        } else {
            $this->My_model->dataLog('Delete data satuan gagal');
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_satuan'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('nama_satuan', 'nama satuan', 'trim|required');
        $this->form_validation->set_rules('ket', 'ket', 'trim|required');
        $this->form_validation->set_rules('id_satuan', 'id_satuan', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_satuan.xls";
        $judul = "tb_satuan";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Satuan");
        xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tb_satuan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_satuan);
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
        header("Content-Disposition: attachment;Filename=tb_satuan.doc");

        $data = array(
            'tb_satuan_data' => $this->Tb_satuan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_satuan_doc',$data);
    }

}

/* End of file Tb_satuan.php */
/* Location: ./application/controllers/Tb_satuan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:15:06 */
/* http://harviacode.com */