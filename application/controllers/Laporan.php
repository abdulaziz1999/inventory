<?php
class Laporan extends CI_Controller{

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

        $this->template->load('template', 'laporan/laporan',$data);
    }

    function ajax($s, $e, $u){
        $draw 	= intval($this->input->get("draw"));
        $start 	= intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
               
                $this->db->join('tb_stok st','tb_barang.id_barang = st.id_barang');
                $this->db->join('tb_satuan s','tb_barang.satuan = s.id_satuan');
                $this->db->join('tb_kategori k','tb_barang.kategori = k.id_kategori');
                $this->db->join('tb_brand br','tb_barang.brand = br.id_brand');
                $this->db->join('tb_receiving_item r','tb_barang.id_barang = r.id_barang');
                $this->db->join('tb_receiving r2','r.id_receiving = r2.id_receiving');
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
                $row->supplier
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

     function receiving_report($s,$e){
        $data['rev'] = $this->model_my->laporan_rev($s,$e); 

        $mpdf = new \Mpdf\Mpdf(['format' => 'A4-P','orientation' => 'P']);
		$html = $this->load->view('laporan/laporan_rev_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output();
    }
}