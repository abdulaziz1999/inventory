<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_receiving extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_receiving_model');
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
        $tb_receiving = $this->Tb_receiving_model->get_all();

        $data = array(
            'tb_receiving_data' => $tb_receiving
        );

        $this->template->load('template','receiving/tb_receiving_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_receiving_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_receiving' => $row->id_receiving,
		'tgl' => $row->tgl,
		'no_ref' => $row->no_ref,
		'supplier' => $row->supplier,
		'remarks' => $row->remarks,
	    );
            $this->template->load('template','receiving/tb_receiving_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_receiving'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Create',
            'action'        => site_url('tb_receiving/create_action'),
            'id_receiving'  => set_value('id_receiving'),
            'tgl'           => set_value('tgl'),
            'no_ref'        => set_value('no_ref'),
            'supplier'      => set_value('supplier'),
            'remarks'       => set_value('remarks'),
            // 'b_receiving'   => $this->db->get_where('tb_receiving_item',['id_receiving' => ]),
            'barang'        => $this->db->get('tb_barang')->result(),
	);
        $this->template->load('template','receiving/tb_receiving_create', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'tgl' => $this->input->post('tgl',TRUE),
            'no_ref' => $this->input->post('no_ref',TRUE),
            'supplier' => $this->input->post('supplier',TRUE),
            'remarks' => $this->input->post('remarks',TRUE),
	    );

            $this->Tb_receiving_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_receiving'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_receiving_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => 'Update',
                'action'        => site_url('tb_receiving/update_action'),
                'id_receiving'  => set_value('id_receiving', $row->id_receiving),
                'b_receiving'   => $this->db->get_where('tb_receiving_item',['id_receiving' => $row->id_receiving]),
                'tgl'           => set_value('tgl', $row->tgl),
                'no_ref'        => set_value('no_ref', $row->no_ref),
                'supplier'      => set_value('supplier', $row->supplier),
                'remarks'       => set_value('remarks', $row->remarks),
                'barang'        => $this->db->get('tb_barang')->result(),
	    );
            $this->template->load('template','receiving/tb_receiving_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_receiving'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_receiving', TRUE));
        } else {
            $data = array(
		'tgl' => $this->input->post('tgl',TRUE),
		'no_ref' => $this->input->post('no_ref',TRUE),
		'supplier' => $this->input->post('supplier',TRUE),
		'remarks' => $this->input->post('remarks',TRUE),
	    );

            $this->Tb_receiving_model->update($this->input->post('id_receiving', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function simpan_barang($uri){
        $data = [
            'id_receiving'  => $uri,
            'id_barang'     => $this->input->post('barang', TRUE),
            'jumlah'        => $this->input->post('jumlah', TRUE)
        ];
        
        $this->db->insert('tb_receiving_item',$data);

                      $this->db->select_max('id_item','max');
        $idmax      = $this->db->get('tb_receiving_item')->row()->max;
        $id         = $this->db->get_where('tb_receiving_item',['id_item' => $idmax])->row();
        $jmlstok    = $this->db->get_where('tb_stok',['id_barang' => $id->id_barang])->row()->stok;
        $receiving  = $id->jumlah + $jmlstok;

        $data2 = [
            'stok' => $receiving
        ];

        $this->db->update('tb_stok', $data2, ['id_barang' =>$id->id_barang]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('sukses', "Barang Masuk Berhasil Ditambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('gagal', "Barang Masuk Gagal Ditambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function deleteitem($id) 
    {
        $idb                = $this->db->get_where('tb_receiving_item',['id_item' => $id])->row();
        $jmlstok            = $this->db->get_where('tb_stok',['id_barang' => $idb->id_barang])->row()->stok;
        $delete_receiving   = $jmlstok - $idb->jumlah;
        
        $data = [
            'stok' => $delete_receiving
        ];
        $this->db->update('tb_stok', $data, ['id_barang' => $idb->id_barang]);
        $this->db->delete('tb_receiving_item',['id_item' => $id]);

        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) 
    {
        $row = $this->Tb_receiving_model->get_by_id($id);

        if ($row) {
            $this->Tb_receiving_model->delete($id);
            $this->db->delete('tb_receiving_item',['id_receiving' => $id]);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_receiving'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_receiving'));
        }
    }

    public function _rules() 
    {
            $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
            $this->form_validation->set_rules('no_ref', 'no ref', 'trim|required');
            $this->form_validation->set_rules('supplier', 'supplier', 'trim|required');
            $this->form_validation->set_rules('remarks', 'remarks', 'trim|required');
            $this->form_validation->set_rules('id_receiving', 'id_receiving', 'trim');
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_receiving.xls";
        $judul = "tb_receiving";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Tgl");
        xlsWriteLabel($tablehead, $kolomhead++, "No Ref");
        xlsWriteLabel($tablehead, $kolomhead++, "Supplier");
        xlsWriteLabel($tablehead, $kolomhead++, "Remarks");

	foreach ($this->Tb_receiving_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_ref);
            xlsWriteLabel($tablebody, $kolombody++, $data->supplier);
            xlsWriteLabel($tablebody, $kolombody++, $data->remarks);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tb_receiving.doc");

        $data = array(
            'tb_receiving_data' => $this->Tb_receiving_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('receiving/tb_receiving_doc',$data);
    }

    public function report_rev_supplier($uri)
    {

        $data['sup'] = $this->Tb_receiving_model->get_sup($uri);

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('receiving/tb_receiving_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }

    public function pdf_rev()
    {

        $data = array(
            'tb_receiving_data' => $this->Tb_receiving_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('receiving/tb_receiving_doc',$data);
    }

}

/* End of file Tb_receiving.php */
/* Location: ./application/controllers/Tb_receiving.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 05:18:36 */
/* http://harviacode.com */