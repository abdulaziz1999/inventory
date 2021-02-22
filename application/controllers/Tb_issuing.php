<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_issuing extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_issuing_model');
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
        $tb_issuing = $this->Tb_issuing_model->get_all();

        $data = array(
            'tb_issuing_data' => $tb_issuing
        );

        $this->template->load('template','issuing/tb_issuing_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_issuing_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id_issuing' => $row->id_issuing,
                'tgl' => $row->tgl,
                'no_ref' => $row->no_ref,
                'picker' => $row->picker,
                'remarks' => $row->remarks,
	    );
            $this->template->load('template','issuing/tb_issuing_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_issuing'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'        => 'Tambah',
            'action'        => site_url('tb_issuing/create_action'),
            'id_issuing'    => set_value('id_issuing'),
            'tgl'           => set_value('tgl'),
            'no_ref'        => set_value('no_ref'),
            'picker'        => set_value('picker'),
            'remarks'       => set_value('remarks'),
            'nama_proyek'   => set_value('nama_proyek'),
            'ket'           => set_value('ket'),
            'nm_proyek'     => @$this->db->get('tb_proyek'),
            'nm_customer'   => @$this->db->get('tb_customer'),
            'nm_pemesan'    => @$this->db->get('tb_pemesan'),
	);
        $this->template->load('template','issuing/tb_issuing_create', $data);
    }
    
    public function create_action() 
    {
       
            $data = array(
                'tgl'           => $this->input->post('tgl',TRUE),
                'no_ref'        => $this->input->post('no_ref',TRUE),
                'picker'        => $this->input->post('picker',TRUE),
                'remarks'       => $this->input->post('remarks',TRUE),
                'nama_proyek'   => $this->input->post('nama_proyek',TRUE),
                'ket'           => $this->input->post('ket',TRUE),
	    );

            $this->Tb_issuing_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_issuing'));
        
    }
    
    public function update($id) 
    {
        $row = $this->Tb_issuing_model->get_by_id($id);
        $this->db->join('tb_barang tb','tb.id_barang = tb_issuing_item.id_barang');
        $data_Issuing = $this->db->get_where('tb_issuing_item',['id_issuing' => $row->id_issuing]);
        if ($row) {
            $data = array(
                'button'        => 'Ubah',
                'action'        => site_url('tb_issuing/update_action'),
                'id_issuing'    => set_value('id_issuing', $row->id_issuing),
                'tgl'           => set_value('tgl', $row->tgl),
                'no_ref'        => set_value('no_ref', $row->no_ref),
                'picker'        => set_value('picker', $row->picker),
                'remarks'       => set_value('remarks', $row->remarks),
                'nama_proyek'   => set_value('nama_proyek',$row->nama_proyek),
                'ket'           => set_value('ket',$row->ket), 
                'b_issuing'     => $data_Issuing,
                'barang'        => $this->db->get('tb_barang')->result(),
                'nm_proyek'     => @$this->db->get('tb_proyek'),
                'nm_customer'   => @$this->db->get('tb_customer'),
                'nm_pemesan'    => @$this->db->get('tb_pemesan'),
                );
            $this->template->load('template','issuing/tb_issuing_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function update_action() 
    {

            $data = array(
            'tgl'           => $this->input->post('tgl',TRUE),
            'no_ref'        => $this->input->post('no_ref',TRUE),
            'picker'        => $this->input->post('picker',TRUE),
            'remarks'       => $this->input->post('remarks',TRUE),
            'nama_proyek'   => $this->input->post('nama_proyek',TRUE),
            'ket'           => $this->input->post('ket',TRUE),
	    );

            $this->Tb_issuing_model->update($this->input->post('id_issuing', TRUE), $data);
            $this->session->set_flashdata('sukses', 'Update Record Success');
            redirect($_SERVER['HTTP_REFERER']);
        
    }
    
    function simpan_barang($uri){
        $idbarang   = $this->input->post('barang', TRUE);
        $jmlout     = $this->input->post('jumlah', TRUE);
        $stok       = $this->db->get_where('tb_stok',['id_barang' => $idbarang ])->row()->stok;
        $sisa = $stok - $jmlout;
        if($sisa >= 0){
            $data = [
                'id_issuing'    => $uri,
                'id_barang'     => $this->input->post('barang', TRUE),
                'jumlah'        => $this->input->post('jumlah', TRUE)
            ];
            
            $this->db->insert('tb_issuing_item',$data);
    
                          $this->db->select_max('id_itemiss','max');
            $idmax      = $this->db->get('tb_issuing_item')->row()->max;
            $id         = $this->db->get_where('tb_issuing_item',['id_itemiss' => $idmax])->row();
            $jmlstok    = $this->db->get_where('tb_stok',['id_barang' => $id->id_barang])->row()->stok;
            $issuing    = $jmlstok - $id->jumlah;
    
            $data2 = [
                'stok' => $issuing
            ];
    
            $this->db->update('tb_stok', $data2, ['id_barang' =>$id->id_barang]);
            $this->session->set_flashdata('sukses', "Barang Berhasil dikeluarkan");
            redirect($_SERVER['HTTP_REFERER']);
        }elseif($stok == 0 || $sisa < 0){
            $this->session->set_flashdata('gagal', "Jumlah barang tidak mencukupi");
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function deleteitem($id) 
    {
        $idb                = $this->db->get_where('tb_issuing_item',['id_itemiss' => $id])->row();
        $jmlstok            = $this->db->get_where('tb_stok',['id_barang' => $idb->id_barang])->row()->stok;
        $delete_issuing     = $jmlstok + $idb->jumlah;
        
        $data = [
            'stok' => $delete_issuing
        ];
        $this->db->update('tb_stok', $data, ['id_barang' => $idb->id_barang]);
        $this->db->delete('tb_issuing_item',['id_itemiss' => $id]);

        $this->session->set_flashdata('message', 'Delete Record Success');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) 
    {
        $row = $this->Tb_issuing_model->get_by_id($id);

        if ($row) {
            $this->Tb_issuing_model->delete($id);
            $this->db->delete('tb_issuing_item',['id_issuing' => $id]);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_issuing'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_issuing'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tgl', 'tgl', 'trim|required');
	$this->form_validation->set_rules('no_ref', 'no ref', 'trim|required');
	$this->form_validation->set_rules('picker', 'picker', 'trim|required');
	$this->form_validation->set_rules('remarks', 'remarks', 'trim|required');
	$this->form_validation->set_rules('id_issuing', 'id_issuing', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_issuing.xls";
        $judul = "tb_issuing";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Picker");
        xlsWriteLabel($tablehead, $kolomhead++, "Remarks");

	foreach ($this->Tb_issuing_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->tgl);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_ref);
            xlsWriteLabel($tablebody, $kolombody++, $data->picker);
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
        header("Content-Disposition: attachment;Filename=tb_issuing.doc");

        $data = array(
            'tb_issuing_data' => $this->Tb_issuing_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_issuing_doc',$data);
    }

    public function report_iss_picker($uri)
    {

        $data['sup'] = $this->Tb_issuing_model->get_picker($uri);

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('issuing/tb_issuing_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }

}

/* End of file Tb_issuing.php */
/* Location: ./application/controllers/Tb_issuing.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 05:19:36 */
/* http://harviacode.com */