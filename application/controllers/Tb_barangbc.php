<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tb_barangbc extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_barangbc_model');
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
        $kategori   = $this->input->get('k', TRUE);
        $unit       = $this->input->get('u', TRUE);
        $tb_barang = $this->Tb_barangbc_model->get_all();

        $data['kode']           = $this->Tb_barangbc_model->kode();
        $data['unit']           = @$this->db->get('tb_unit');
        $data['kategori']       = @$this->db->get('tb_kategori');

        if($kategori == TRUE && $unit == TRUE){
            $this->db->where(['kategori' => $kategori,'unit_id' => $unit]);                           
        }elseif($kategori == TRUE && $unit == FALSE){
            $this->db->where(['kategori' => $kategori]);                                                
        }elseif($kategori == FALSE && $unit == TRUE){
            $this->db->where(['unit_id' => $unit]);                                                
        }
        $data['tb_barang_data'] = @$this->db->get('tb_barang')->result();
        // $this->output->enable_profiler(TRUE);

        $this->template->load('template','barangbc/tb_barangbc_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tb_barangbc_model->get_by_id($id);
        if ($row) {
            $data = array(
                    'id_barang'     => $row->id_barang,
                    'part_number'   => $row->part_number,
                    'kode_barcode'  => $row->kode_barcode,
                    'nama_barang'   => $row->nama_barang,
                    'kategori'      => $row->kategori,
                    'brand'         => $row->brand,
                    'satuan'        => $row->satuan,
                    'harga_beli'    => $row->harga_beli,
                    'harga_jual'    => $row->harga_jual,
                    'ket'           => $row->ket,
                    'unit_id'       => $row->unit_id,
                    'min_stok'      => $row->min_stok,
	    );
            $this->template->load('template','barangbc/tb_barangbc_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barang'));
        }
    }

    public function create() 
    {
        $kode = $this->Tb_barangbc_model->kode();
        $data = array(
                'button'        => '<i class="fa fa-plus"></i> Tambah',
                'action'        => site_url('tb_barangbc/create_action'),
                'id_barang'     => set_value('id_barang'),
                'part_number'   => set_value('part_number'),
                'kode_barcode'  => set_value('kode_barcode'),
                'nama_barang'   => set_value('nama_barang'),
                'kategori'      => set_value('kategori'),
                'brand'         => set_value('brand'),
                'satuan'        => set_value('satuan'),
                'harga_beli'    => set_value('harga_beli'),
                'harga_jual'    => set_value('harga_jual'),
                'ket'           => set_value('ket'),
                'unit_id'       => set_value('unit_id'),
                'min_stok'      => set_value('min_stok'),
                'satuan'        => @$this->db->get('tb_satuan'),
                'brand'         => @$this->db->get('tb_brand'),
                'kategori'      => @$this->db->get('tb_kategori'),
                'unit'          => @$this->db->get('tb_unit'),
                'kode'          => $this->Tb_barangbc_model->kode()
    );
    
        $this->template->load('template','barangbc/tb_barangbc_form', $data);
    }
    
    public function create_action() 
    {
        $kode = $this->Tb_barangbc_model->kode();

            $data = array(
                'part_number'   => $kode,
                'nama_barang'   => $this->input->post('nama_barang',TRUE),
                'kode_barcode'  => $this->input->post('kode_barcode',TRUE),
                'kategori'      => $this->input->post('kategori',TRUE),
                'brand'         => $this->input->post('brand',TRUE),
                'satuan'        => $this->input->post('satuan',TRUE),
                'harga_beli'    => str_replace('.','',$this->input->post('harga_beli',TRUE)),
                'harga_jual'    => str_replace('.','',$this->input->post('harga_jual',TRUE)),
                'ket'           => $this->input->post('ket',TRUE),
                'min_stok'      => $this->input->post('min_stok',TRUE),
                'unit_id'       => $this->input->post('unit_id',TRUE),
        );
        // print_r($data);
        $this->Tb_barangbc_model->insert($data);
        
        $this->db->select_max('id_barang','idmax');
        $idmax = $this->db->get('tb_barang')->row()->idmax;
        $data1 = [
            'id_barang' => $idmax,
            'stok'      => ''
        ];
            $this->db->insert('tb_stok',$data1);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_barangbc'));
    }

    public function save() 
    {
        $kode = $this->Tb_barangbc_model->kode();
        $scan = $this->db->get_where('tb_data_scan',['kode' => $this->input->post('kode',TRUE)])->row();
        $cekKode = $this->db->get_where('tb_barang',['kode_barcode' => $this->input->post('kode',TRUE)])->num_rows();
        if($cekKode == 1){
            $this->session->set_flashdata('gagal', 'Data Barang Sudah Ada');
            redirect(site_url('tb_barangbc'));
        }else{
            $data = array(
                'part_number'   => $kode,
                'nama_barang'   => $scan->nama_barang,
                'kategori'      => '',
                'brand'         => '',
                'satuan'        => '',
                'harga_beli'    => $scan->harga,
                'harga_jual'    => '',
                'ket'           => '',
                'kode_barcode'  =>$scan->kode
        );

        $this->Tb_barangbc_model->insert($data);
        
        $this->db->select_max('id_barang','idmax');
        $idmax = $this->db->get('tb_barang')->row()->idmax;
        $data1 = [
            'id_barang' => $idmax,
            'stok'      => ''
        ];
            $this->db->insert('tb_stok',$data1);
            
            $this->session->set_flashdata('sukses', 'Data Barang Berhasil di Input');
            redirect(site_url('tb_barangbc'));
    }
        
    }
    
    public function update($id) 
    {
        $row = $this->Tb_barangbc_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button'        => '<i class="fa fa-pencil"></i> Update',
                'action'        => site_url('tb_barangbc/update_action'),
                'id_barang'     => set_value('id_barang', $row->id_barang),
                'part_number'   => set_value('part_number', $row->part_number),
                'kode_barcode'  => set_value('kode_barcode', $row->kode_barcode),
                'nama_barang'   => set_value('nama_barang', $row->nama_barang),
                'kategori'      => set_value('kategori', $row->kategori),
                'brand'         => set_value('brand', $row->brand),
                'satuan'        => set_value('satuan', $row->satuan),
                'harga_beli'    => set_value('harga_beli', $row->harga_beli),
                'harga_jual'    => set_value('harga_jual', $row->harga_jual),
                'ket'           => set_value('ket', $row->ket),
                'min_stok'      => set_value('min_stok',$row->min_stok),
                'unit_id'       => set_value('unit_id',$row->unit_id),
                'satuan'        => @$this->db->get('tb_satuan'),
                'brand'         => @$this->db->get('tb_brand'),
                'kategori'      => @$this->db->get('tb_kategori'),
                'unit'          => @$this->db->get('tb_unit'),
                'idkategori'    => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->kategori,
                'idbrand'       => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->brand,
                'idsatuan'      => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->satuan,
                'idunit'        => @$this->db->get_where('tb_barang',['id_barang' => $this->uri->segment(3)])->row()->unit_id
	    );
            $this->template->load('template','barangbc/tb_barangbc_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barangbc'));
        }
    }
    
    public function update_action() 
    {
        
            $data = array(
                'part_number'   => $this->input->post('part_number',TRUE),
                'kode_barcode'  => $this->input->post('kode_barcode',TRUE),
                'nama_barang'   => $this->input->post('nama_barang',TRUE),
                'kategori'      => $this->input->post('kategori',TRUE),
                'brand'         => $this->input->post('brand',TRUE),
                'satuan'        => $this->input->post('satuan',TRUE),
                'harga_beli'    => str_replace('.','',$this->input->post('harga_beli',TRUE)),
                'harga_jual'    => str_replace('.','',$this->input->post('harga_jual',TRUE)),
                'ket'           => $this->input->post('ket',TRUE),
                'min_stok'      => $this->input->post('min_stok',TRUE),
                'unit_id'       => $this->input->post('unit_id',TRUE),
	    );
            // print_r($data);
            $this->Tb_barangbc_model->update($this->input->post('id_barang', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_barangbc'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_barangbc_model->get_by_id($id);

        if ($row) {
            $this->Tb_barangbc_model->delete($id);
            $this->db->delete('tb_stok',['id_barang' => $id]);
            // $this->db->delete('tb_receiving_item',['id_barang' => $id]);
            // $this->db->delete('tb_issuing_item',['id_barang' => $id]);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_barangbc'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_barangbc'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_barang', 'nama_barang', 'trim|required');
	$this->form_validation->set_rules('kode_barcode', 'kode_barcode', 'trim|required');
	$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
	$this->form_validation->set_rules('brand', 'brand', 'trim|required');
	$this->form_validation->set_rules('satuan', 'satuan', 'trim|required');
	$this->form_validation->set_rules('harga_beli', 'harga_beli', 'trim|required');
	$this->form_validation->set_rules('harga_jual', 'harga_jual', 'trim|required');
	$this->form_validation->set_rules('ket', 'ket', 'trim|required');
	$this->form_validation->set_rules('unit_id', 'unit_id', 'trim|required');
	$this->form_validation->set_rules('min_stok', 'min_stok', 'trim|required');
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

	foreach ($this->Tb_barangbc_model->get_all() as $data) {
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
            'tb_barang_data' => $this->Tb_barangbc_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tb_barang_doc',$data);
    }

    function pdf(){
        $data = array(
            'tb_barang_data' => $this->Tb_barangbc_model->get_all(),
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