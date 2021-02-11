<?php
class Laporan_issuing extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('My_model','model_my');
        $this->load->library('session');
        if($this->session->userdata('true') != 'oke'){
            redirect(base_url());
        }
      
    }

    function index(){
        $start = $this->input->get('s', TRUE);
        $end = $this->input->get('e', TRUE);
        $data['unit'] = @$this->db->get('tb_unit');
        if($start && $end != NULL){

        }else{
            $start = date('Y-m-d h:i:s');
            $end = date('Y-m-d h:i:s');
        }

        $this->template->load('template', 'laporan/laporan_issuing',$data);
    }

    function ajax($s, $e, $u){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
               
        $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
        $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
        $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
        $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
        $this->db->join('tb_issuing_item i','tb_barang.id_barang = i.id_barang');
        $this->db->join('tb_issuing i2','i.id_issuing = i2.id_issuing');
        $this->db->where('tgl >=', $s);
		$this->db->where('tgl <=', $e);
		$this->db->where('unit_id =', $u);
        $get =	$this->db->get('tb_barang');

        $data = array();
        $no = 1;

        foreach($get->result() as $row){
            $data[] = [
                $no++,
                $row->tgl,
                $row->no_ref,
                $row->nama_barang,
                $row->remarks,
                $row->jumlah,
                $row->picker
            ];
        }

        $output = [
            "draw"              => $draw,
            "recordsTotal"      => $get->num_rows(),
            "recordsFiltered"   => $get->num_rows(),
            "data"              => $data
		];
		
		echo json_encode($output);
        exit();
    }

    function issuing_report($s,$e){
        $data['iss'] = $this->model_my->laporan_iss($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_iss_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }

}