<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_barang extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_barang_model');
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
        $tb_barang = $this->Tb_barang_model->get_all();

        $data = array(
            'tb_barang_data' => $tb_barang,
            'kode' => $this->Tb_barang_model->kode()
        );
        // print_r($data['kode']);
        $this->template->load('template','barang/tb_barang_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_barang_model->get_by_id($id);
        if ($row) {
            $data = array(
                    'id_barang' => $row->id_barang,
                    'part_number' => $row->part_number,
                    'nama_barang' => $row->nama_barang,
                    'kategori' => $row->kategori,
                    'brand' => $row->brand,
                    'satuan' => $row->satuan,
                    'ket' => $row->ket,
	    );
            $this->template->load('template','barang/tb_barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barang'));
        }
    }

    public function create() 
    {
        $kode = $this->Tb_barang_model->kode();
        $data = array(
                'button' => 'Create',
                'action' => site_url('tb_barang/create_action'),
                'id_barang' => set_value('id_barang'),
                'part_number' => set_value('part_number'),
                'nama_barang' => set_value('nama_barang'),
                'kategori' => set_value('kategori'),
                'brand' => set_value('brand'),
                'satuan' => set_value('satuan'),
                'harga_beli' => set_value('harga_beli'),
                'harga_jual' => set_value('harga_jual'),
                'ket' => set_value('ket'),
                'satuan' => @$this->db->get('tb_satuan'),
                'brand' => @$this->db->get('tb_brand'),
                'kategori' => @$this->db->get('tb_kategori'),
                'kode' => $this->Tb_barang_model->kode()
    );
    
        $this->template->load('template','barang/tb_barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $kode = $this->Tb_barang_model->kode();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'part_number' => $kode,
                'nama_barang' => $this->input->post('nama_barang',TRUE),
                'kategori' => $this->input->post('kategori',TRUE),
                'brand' => $this->input->post('brand',TRUE),
                'satuan' => $this->input->post('satuan',TRUE),
                'harga_beli' => $this->input->post('harga_beli',TRUE),
                'harga_jual' => $this->input->post('harga_jual',TRUE),
                // 'gambar' => $this->input->post('gambar',TRUE),
                'ket' => $this->input->post('ket',TRUE),
        );

        $this->Tb_barang_model->insert($data);
        
        $this->db->select_max('id_barang','idmax');
        $idmax = $this->db->get('tb_barang')->row()->idmax;
        $data1 = [
            'id_barang' => $idmax,
            'stok'      => ''
        ];
            $this->db->insert('tb_stok',$data1);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_barang/update_action'),
                'id_barang' => set_value('id_barang', $row->id_barang),
                'part_number' => set_value('part_number', $row->part_number),
                'nama_barang' => set_value('nama_barang', $row->nama_barang),
                'kategori' => set_value('kategori', $row->kategori),
                'brand' => set_value('brand', $row->brand),
                'satuan' => set_value('satuan', $row->satuan),
                'harga_beli' => set_value('harga_beli', $row->harga_beli),
                'harga_jual' => set_value('harga_jual', $row->harga_jual),
                'ket' => set_value('ket', $row->ket),
                'satuan' => @$this->db->get('tb_satuan'),
                'brand' => @$this->db->get('tb_brand'),
                'kategori' => @$this->db->get('tb_kategori'),
                'idkategori' => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->kategori,
                'idbrand' => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->brand,
                'idsatuan' => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->satuan
	    );
            $this->template->load('template','barang/tb_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_barang', TRUE));
        } else {
            $data = array(
                'part_number' => $this->input->post('part_number',TRUE),
                'nama_barang' => $this->input->post('nama_barang',TRUE),
                'kategori' => $this->input->post('kategori',TRUE),
                'brand' => $this->input->post('brand',TRUE),
                'satuan' => $this->input->post('satuan',TRUE),
                'harga_beli' => $this->input->post('harga_beli',TRUE),
                'harga_jual' => $this->input->post('harga_jual',TRUE),
                // 'gambar' => $this->input->post('gambar',TRUE),
                'ket' => $this->input->post('ket',TRUE),
	    );
            // print_r($data);
            $this->Tb_barang_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_barang_model->get_by_id($id);

        if ($row) {
            $this->Tb_barang_model->delete($id);
            $this->db->delete('tb_stok',['id_barang' => $id]);
            // $this->db->delete('tb_receiving_item',['id_barang' => $id]);
            // $this->db->delete('tb_issuing_item',['id_barang' => $id]);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('brand', 'brand', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('id_barang', 'id_barang', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tb_barang.xls";
        $judul = "tb_barang";
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
            xlsWriteLabel($tablehead, $kolomhead++, "Part Number");
            xlsWriteLabel($tablehead, $kolomhead++, "nama_barang");
            xlsWriteLabel($tablehead, $kolomhead++, "Kategori");
            xlsWriteLabel($tablehead, $kolomhead++, "Brand");
            xlsWriteLabel($tablehead, $kolomhead++, "Satuan");
            xlsWriteLabel($tablehead, $kolomhead++, "Move Tipe");
            xlsWriteLabel($tablehead, $kolomhead++, "Cur Harga");
            xlsWriteLabel($tablehead, $kolomhead++, "Harga");
            xlsWriteLabel($tablehead, $kolomhead++, "Gambar");
            xlsWriteLabel($tablehead, $kolomhead++, "Ket");

	foreach ($this->Tb_barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->part_number);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
            xlsWriteNumber($tablebody, $kolombody++, $data->kategori);
            xlsWriteNumber($tablebody, $kolombody++, $data->brand);
            xlsWriteNumber($tablebody, $kolombody++, $data->satuan);
            xlsWriteLabel($tablebody, $kolombody++, $data->move_tipe);
            xlsWriteLabel($tablebody, $kolombody++, $data->cur_harga);
            xlsWriteNumber($tablebody, $kolombody++, $data->harga);
            xlsWriteLabel($tablebody, $kolombody++, $data->gambar);
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
        header("Content-Disposition: attachment;Filename=tb_barang.doc");

        $data = array(
            'tb_barang_data' => $this->Tb_barang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_barang_doc',$data);
    }

    function pdf(){
        $data = array(
            'tb_barang_data' => $this->Tb_barang_model->get_all(),
            'start' => 0
        );
        $this->load->view('tb_barang_pdf',$data);
    }

}

/* End of file Tb_barang.php */
/* Location: ./application/controllers/Tb_barang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-11-10 03:37:04 */
/* http://harviacode.com */