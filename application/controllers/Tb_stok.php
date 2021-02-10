<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_stok extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_stok_model');
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
        $tb_stok = $this->Tb_stok_model->get_all();

        $data = array(
            'tb_stok_data'  => $tb_stok,
            'jmlstok'       => $this->db->get('tb_stok')->num_rows()
        );

        $this->template->load('template','stok/tb_stok_list', $data);
    }

    public function warning()
    {
        $tb_stok = $this->Tb_stok_model->get_all();
        $this->db->join('tb_barang tb','tb.id_barang = st.id_barang');
                $this->db->where("`stok` <= min_stok");
        $count = $this->db->get('tb_stok st')->num_rows();
        $data = array(
            'tb_stok_data'  => $tb_stok
        );

        $this->template->load('template','stok/tb_stok_warning', $data);
        // $this->output->enable_profiler(TRUE);
        
    }

    public function read($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_barang' => $row->id_barang,
		'stok' => $row->stok,
		'amount' => $row->amount,
	    );
            $this->template->load('template','stok/tb_stok_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_stok/create_action'),
            'id_barang' => set_value('id_barang'),
            'stok' => set_value('stok'),
            'amount' => set_value('amount'),
	);
        $this->template->load('template','stok/tb_stok_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'stok' => $this->input->post('stok',TRUE),
		'amount' => $this->input->post('amount',TRUE),
	    );

            $this->Tb_stok_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_stok'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_stok/update_action'),
		'id_barang' => set_value('id_barang', $row->id_barang),
		'stok' => set_value('stok', $row->stok),
		'amount' => set_value('amount', $row->amount),
	    );
            $this->template->load('template','stok/tb_stok_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
		'stok' => $this->input->post('stok',TRUE),
		'amount' => $this->input->post('amount',TRUE),
	    );

            $this->Tb_stok_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_stok'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_stok_model->get_by_id($id);

        if ($row) {
            $this->Tb_stok_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_stok'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_stok'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('stok', 'stok', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');

	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_stok.xls";
        $judul = "tb_stok";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Stok");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");

	foreach ($this->Tb_stok_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stok);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_stok.doc");

        $data = array(
            'tb_stok_data' => $this->Tb_stok_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_stok_doc',$data);
    }

    public function pdf()
    {

        $data = array(
            'tb_stok_data' => $this->Tb_stok_model->get_print_stok(),
            'start' => 0
        );
        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'L']);
		$html = $this->load->view('stok/tb_stok_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
        
        // $this->load->view('stok/tb_stok_pdf',$data);
    }

    public function tes(){
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand b','tb_barang.brand = b.id_brand');
        $data = $this->db->get('tb_barang');

        print_r($data->result());
    }

}

/* End of file Tb_stok.php */
/* Location: ./application/controllers/Tb_stok.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 04:34:26 */
/* http://harviacode.com */