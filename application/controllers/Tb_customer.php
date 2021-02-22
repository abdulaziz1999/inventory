<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_customer extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_customer_model');
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
        $tb_customer = $this->Tb_customer_model->get_all();

        $data = array(
            'tb_customer_data' => $tb_customer
        );

        $this->template->load('template','customer/tb_customer_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_customer_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_customer' => $row->id_customer,
		'nama_customer' => $row->nama_customer,
	    );
            $this->template->load('template','customer/tb_customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_customer/create_action'),
            'id_customer' => set_value('id_customer'),
            'nama_customer' => set_value('nama_customer'),
	);
        $this->template->load('template','customer/tb_customer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_customer' => $this->input->post('nama_customer',TRUE),
	    );

            $this->Tb_customer_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_customer/update_action'),
                'id_customer' => set_value('id_customer', $row->id_customer),
                'nama_customer' => set_value('nama_customer', $row->nama_customer),
	    );
            $this->template->load('template','customer/tb_customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_customer'));
        }
    }
    
    public function update_action() 
    {
        $this->load->helper('log');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_customer', TRUE));
        } else {
            $data = array(
		        'nama_customer' => $this->input->post('nama_customer',TRUE),
	    );

            $this->Tb_customer_model->update($this->input->post('id_customer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->My_model->dataLog('Update custemer');
            redirect(site_url('tb_customer'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_customer_model->get_by_id($id);

        if ($row) {
            $this->Tb_customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_customer', 'nama customer', 'trim|required');
	$this->form_validation->set_rules('id_customer', 'id_customer', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_customer.xls";
        $judul = "tb_customer";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Nama customer");

        foreach ($this->Tb_customer_model->get_all() as $data) {
                $kolombody = 0;

                //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
                xlsWriteNumber($tablebody, $kolombody++, $nourut);
                xlsWriteLabel($tablebody, $kolombody++, $data->nama_customer);

            $tablebody++;
                $nourut++;
            }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_customer.doc");

        $data = array(
            'tb_customer_data' => $this->Tb_customer_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_customer_doc',$data);
    }

}

/* End of file Tb_customer.php */
/* Location: ./application/controllers/Tb_customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:13:26 */
/* http://harviacode.com */