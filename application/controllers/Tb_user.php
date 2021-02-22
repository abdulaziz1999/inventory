<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_user extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_user_model');
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
        $tb_user = $this->Tb_user_model->get_all();

        $data = array(
            'tb_user_data' => $tb_user
        );

        $this->template->load('template','user/tb_user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengguna' => $row->id_pengguna,
		'nama' => $row->nama,
		'username' => $row->username,
		'level' => $row->level,
	    );
            $this->template->load('template','user/tb_user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_user/create_action'),
            'id_pengguna' => set_value('id_pengguna'),
            'nama' => set_value('nama'),
            'username' => set_value('username'),
            'level' => set_value('level'),
	);
        $this->template->load('template','user/tb_user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama' => $this->input->post('nama',TRUE),
		'username' => $this->input->post('username',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->Tb_user_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_user/update_action'),
                'id_pengguna' => set_value('id_pengguna', $row->id_pengguna),
                'nama' => set_value('nama', $row->nama),
                'username' => set_value('username', $row->username),
                'level' => set_value('level', $row->level),
	    );
            $this->template->load('template','user/tb_user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengguna', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'username' => $this->input->post('username',TRUE),
                'level' => $this->input->post('level',TRUE),
	    );

            $this->Tb_user_model->update($this->input->post('id_pengguna', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_user_model->get_by_id($id);

        if ($row) {
            $this->Tb_user_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama user', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('level', 'hak akses', 'trim|required');
	$this->form_validation->set_rules('avatar', 'avatar', 'trim|required');

	$this->form_validation->set_rules('id_pengguna', 'id_pengguna', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_user.xlsx";
        $judul = "tb_user";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 1");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama User");
        xlsWriteLabel($tablehead, $kolomhead++, "username");
        xlsWriteLabel($tablehead, $kolomhead++, "Hak Akses");
        xlsWriteLabel($tablehead, $kolomhead++, "Avatar");

	    foreach ($this->Tb_user_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->level);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_user.docx");

        $data = array(
            'tb_user_data' => $this->Tb_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/tb_user_doc',$data);
    }

    public function pdf()
    {

        $data = array(
            'tb_user_data' => $this->Tb_user_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('user/tb_user_pdf',$data);
    }

}

/* End of file Tb_user.php */
/* Location: ./application/controllers/Tb_user.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 05:21:03 */
/* http://harviacode.com */